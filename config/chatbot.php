<?php

return [
    /*
    |--------------------------------------------------------------------------
    | OpenRouter AI Chatbot Configuration
    |--------------------------------------------------------------------------
    */

    'api_key' => env('OPENROUTER_API_KEY', ''),
    'model' => env('OPENROUTER_MODEL', 'nvidia/nemotron-3-ultra-550b-a55b:free'),
    'api_url' => env('OPENROUTER_API_URL', 'https://openrouter.ai/api/v1/chat/completions'),

    'instructions_path' => storage_path('app/chatbot/instruction.md'),

    'rejection_message' => 'Sorry, I can only assist with Bus-Book travel, bus schedules, routes, fares, and ticket reservations.',
];
