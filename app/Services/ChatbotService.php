<?php

namespace App\Services;

use App\Models\Bus;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Schema;

class ChatbotService
{
    /**
     * Rejection message for out-of-scope questions.
     */
    protected string $rejectionMessage;

    /**
     * OpenRouter API key.
     */
    protected string $apiKey;

    /**
     * AI Model identifier.
     */
    protected string $model;

    /**
     * OpenRouter completions endpoint.
     */
    protected string $apiUrl;

    public function __construct()
    {
        $this->apiKey = trim(config('chatbot.api_key', ''));
        $this->model = config('chatbot.model', 'nvidia/nemotron-3-ultra-550b-a55b:free');
        $this->apiUrl = config('chatbot.api_url', 'https://openrouter.ai/api/v1/chat/completions');
        $this->rejectionMessage = config(
            'chatbot.rejection_message',
            'Sorry, I can only assist with Bus-Book travel, bus schedules, routes, fares, and ticket reservations.'
        );
    }

    /**
     * Process a user question and return a response.
     *
     * @param string $question
     * @return array
     */
    public function ask(string $question): array
    {
        $question = trim($question);

        if ($question === '') {
            return [
                'success' => false,
                'reply' => 'Please enter a question regarding our bus routes or bookings.',
            ];
        }

        if (mb_strlen($question) > 2000) {
            return [
                'success' => false,
                'reply' => 'Your question is too long. Please keep it under 2,000 characters.',
            ];
        }

        // 1. Fast local check: Simple greetings
        if (preg_match('/^(hi|hello|hey|good morning|good afternoon|good evening|namaste)[\s!.?]*$/i', $question)) {
            return [
                'success' => true,
                'reply' => 'Hello! I am your Bus-Book Travel Assistant. I can help you with available bus routes, ticket fares, seat bookings, and operator registration. What would you like to know?',
            ];
        }

        // 2. Fast local check: Clearly off-topic queries
        $unrelatedPatterns = [
            '/\btaj mahal\b/i',
            '/\bweather\b/i',
            '/\bforecast\b/i',
            '/\bworld war\b/i',
            '/\bcapital of\b/i',
            '/\btell me a joke\b/i',
            '/\bwrite (a )?poem\b/i',
            '/\bwrite (me )?(a )?(python|php|javascript|java|sql|c\+\+|html|css) (program|script|code)\b/i',
            '/\bwho is the president\b/i',
            '/\bwho won the\b/i',
            '/\brecipe for\b/i',
            '/\bhomework\b/i',
            '/\bmovies?\b/i',
        ];

        foreach ($unrelatedPatterns as $pattern) {
            if (preg_match($pattern, $question)) {
                return [
                    'success' => true,
                    'reply' => $this->rejectionMessage,
                ];
            }
        }

        // 3. Check for API key presence
        if ($this->apiKey === '' || $this->apiKey === '{sec_key}' || $this->apiKey === 'your_openrouter_api_key_here') {
            return [
                'success' => true,
                'reply' => 'The AI Chatbot is ready! Please configure your OpenRouter API key in the .env file (`OPENROUTER_API_KEY=your_key`) to enable live model queries. You can currently check routes and book seats via the "Book Now" menu.',
            ];
        }

        // 4. Load instructions from instruction.md
        $instructionsPath = config('chatbot.instructions_path');
        $instructions = '';

        if (file_exists($instructionsPath)) {
            $instructions = file_get_contents($instructionsPath);
        }

        if (empty($instructions)) {
            $instructions = "You are the Bus-Book AI Assistant. Answer solely questions regarding bus booking, routes, fares, and website navigation. Strictly reject off-topic questions with: \"{$this->rejectionMessage}\"";
        }

        // 5. Load dynamic bus catalog from database
        $busCatalog = $this->getActiveBusCatalog();

        // 6. Build OpenRouter API Payload
        $input = json_encode([
            'user_question' => $question,
            'active_buses_catalog' => $busCatalog,
        ], JSON_UNESCAPED_UNICODE | JSON_INVALID_UTF8_SUBSTITUTE);

        $payload = [
            'model' => $this->model,
            'messages' => [
                [
                    'role' => 'system',
                    'content' => $instructions,
                ],
                [
                    'role' => 'user',
                    'content' => $input,
                ],
            ],
            'temperature' => 0.2,
            'max_tokens' => 500,
        ];

        $requestBody = json_encode($payload);

        // 7. Execute cURL request to OpenRouter
        if (!function_exists('curl_init')) {
            return [
                'success' => false,
                'reply' => 'Server error: PHP cURL extension is not enabled.',
            ];
        }

        $ch = curl_init($this->apiUrl);

        curl_setopt_array($ch, [
            CURLOPT_POST => true,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_CONNECTTIMEOUT => 15,
            CURLOPT_TIMEOUT => 45,
            CURLOPT_SSL_VERIFYPEER => false,
            CURLOPT_HTTPHEADER => [
                'Content-Type: application/json',
                'Authorization: Bearer ' . $this->apiKey,
                'HTTP-Referer: http://localhost',
                'X-Title: Bus-Book AI Assistant',
            ],
            CURLOPT_POSTFIELDS => $requestBody,
        ]);

        $response = curl_exec($ch);
        $httpCode = (int) curl_getinfo($ch, CURLINFO_HTTP_CODE);
        $curlError = curl_error($ch);
        curl_close($ch);

        if ($response === false) {
            Log::error('OpenRouter Chatbot cURL Error: ' . $curlError);
            return [
                'success' => false,
                'reply' => 'Connection error: Unable to connect to AI server. Please try again shortly.',
            ];
        }

        $result = json_decode($response, true);

        if ($httpCode < 200 || $httpCode >= 300) {
            $errorMessage = $result['error']['message'] ?? "HTTP Error {$httpCode}";
            Log::error("OpenRouter API Error (HTTP {$httpCode}): {$errorMessage}");

            return [
                'success' => false,
                'reply' => 'AI Service temporarily unavailable: ' . $errorMessage,
            ];
        }

        $answer = $result['choices'][0]['message']['content'] ?? null;

        if (!is_string($answer) || trim($answer) === '') {
            return [
                'success' => false,
                'reply' => 'Sorry, I did not receive a clear answer. Please try rephrasing your question.',
            ];
        }

        return [
            'success' => true,
            'reply' => trim($answer),
        ];
    }

    /**
     * Retrieve active buses from the database as an array.
     *
     * @return array
     */
    protected function getActiveBusCatalog(): array
    {
        try {
            $query = Bus::query();

            if (Schema::hasColumn('bus', 'is_active')) {
                $query->where('is_active', 1);
            }

            return $query->get([
                'id',
                'bus_name',
                'bus_source',
                'bus_desti',
                'bus_fare',
                'bus_distance',
                'bus_travel_time',
                'bus_total_seats',
            ])->toArray();
        } catch (\Throwable $e) {
            Log::warning('Chatbot could not fetch buses from DB: ' . $e->getMessage());
            return [];
        }
    }
}
