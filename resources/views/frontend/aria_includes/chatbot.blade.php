<!-- AI Chatbot Floating Widget -->
<div id="busbook-chatbot-container">
    <!-- Floating Launcher Button -->
    <button id="chatbot-toggle-btn" class="chatbot-launcher" aria-label="Open AI Assistant"
        title="Need help? Ask our AI Assistant!">
        <div class="launcher-pulse"></div>
        <div class="launcher-icon">
            <i class="fas fa-robot chat-open-icon"></i>
            <i class="fas fa-times chat-close-icon d-none"></i>
        </div>
        <span class="launcher-badge d-none d-md-inline-block">Ask AI</span>
    </button>

    <!-- Chat Window Card -->
    <div id="chatbot-window" class="chatbot-window">
        <!-- Header -->
        <div class="chatbot-header">
            <div class="chatbot-header-info">
                <div class="chatbot-avatar">
                    <i class="fas fa-robot"></i>
                    <span class="online-indicator"></span>
                </div>
                <div>
                    <h6 class="chatbot-name mb-0">Bus-Book AI Helper</h6>
                    <span class="chatbot-status">Online • Travel Assistant</span>
                </div>
            </div>
            <div class="chatbot-header-actions">
                <button id="chatbot-close-btn" class="chatbot-btn-close" aria-label="Close Chat" title="Close">
                    <i class="fas fa-times"></i>
                </button>
            </div>
        </div>

        <!-- Chat Messages Container -->
        <div id="chatbot-messages" class="chatbot-messages">
            <!-- Initial Bot Message -->
            <div class="chat-message bot-message">
                <div class="message-avatar">
                    <i class="fas fa-robot"></i>
                </div>
                <div class="message-bubble">
                    <p class="mb-1">Hello! 👋 I'm your Bus-Book AI Assistant.</p>
                    <p class="mb-0">Ask me about <strong>routes</strong>, <strong>schedules</strong>,
                        <strong>fares</strong>, or <strong>booking tickets</strong>!
                    </p>
                </div>
            </div>

            <!-- Suggestion Chips -->
            <div id="chatbot-suggestions" class="chatbot-suggestions">
                <span class="suggestion-chip" data-query="What buses are available from Nashik to Pune?">
                    🚌 Nashik to Pune
                </span>
                <span class="suggestion-chip" data-query="What are the bus fares and travel times?">
                    💰 Fares & times
                </span>
                <span class="suggestion-chip" data-query="How do I book a seat on Bus-Book?">
                    🎫 How to book
                </span>
                <span class="suggestion-chip" data-query="How can bus operators register their bus?">
                    🤝 Register bus
                </span>
            </div>
        </div>

        <!-- Typing Indicator -->
        <div id="chatbot-typing" class="chatbot-typing d-none">
            <div class="typing-bubble">
                <span class="dot"></span>
                <span class="dot"></span>
                <span class="dot"></span>
            </div>
            <span class="typing-text">AI is replying...</span>
        </div>

        <!-- Input Bar -->
        <div class="chatbot-footer">
            <form id="chatbot-form" class="chatbot-input-form">
                @csrf
                <div class="input-wrapper">
                    <input type="text" id="chatbot-input" class="chatbot-input"
                        placeholder="Ask about routes, fares, booking..." autocomplete="off" maxlength="1000" required>
                    <button type="submit" id="chatbot-send-btn" class="chatbot-send-btn" aria-label="Send Message"
                        title="Send">
                        <i class="fas fa-paper-plane"></i>
                    </button>
                </div>
            </form>
            <div class="chatbot-disclaimer">
                <span><i class="fas fa-shield-alt mr-1"></i> Official Bus-Book Travel Assistant</span>
            </div>
        </div>
    </div>
</div>

<!-- Chatbot Stylesheet -->
<style>
    #busbook-chatbot-container {
        position: fixed;
        bottom: 18px;
        right: 18px;
        z-index: 99999;
        font-family: 'Open Sans', -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, sans-serif;
    }

    /* Launcher Button */
    .chatbot-launcher {
        position: relative;
        display: flex;
        align-items: center;
        gap: 6px;
        background: linear-gradient(135deg, #14bf98 0%, #0fa381 100%);
        color: #ffffff;
        border: none;
        border-radius: 50px;
        padding: 7px 14px;
        box-shadow: 0 6px 18px rgba(20, 191, 152, 0.42);
        cursor: pointer;
        transition: all 0.25s ease-in-out;
        outline: none;
    }

    .chatbot-launcher:hover {
        transform: translateY(-2px) scale(1.02);
        box-shadow: 0 8px 22px rgba(20, 191, 152, 0.55);
        color: #ffffff;
    }

    .launcher-icon {
        font-size: 1.05rem;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .launcher-badge {
        font-family: 'Montserrat', sans-serif;
        font-weight: 700;
        font-size: 0.74rem;
        letter-spacing: 0.5px;
        text-transform: uppercase;
    }

    .launcher-pulse {
        position: absolute;
        top: -3px;
        left: -3px;
        right: -3px;
        bottom: -3px;
        border-radius: 50px;
        border: 2px solid #14bf98;
        opacity: 0.65;
        animation: chatbot-pulse 2s infinite ease-out;
        pointer-events: none;
    }

    @keyframes chatbot-pulse {
        0% {
            transform: scale(1);
            opacity: 0.8;
        }

        100% {
            transform: scale(1.1);
            opacity: 0;
        }
    }

    /* Compact, Viewport-Bounded Light Theme Chat Window */
    .chatbot-window {
        position: fixed !important;
        right: 18px !important;
        bottom: 66px !important;
        width: 305px !important;
        max-width: calc(100vw - 32px) !important;
        height: 380px !important;
        max-height: calc(100vh - 84px) !important;
        top: auto !important;
        background: #ffffff !important;
        border-radius: 14px !important;
        box-shadow: 0 12px 35px rgba(0, 0, 0, 0.16), 0 3px 10px rgba(0, 0, 0, 0.08) !important;
        border: 1px solid #e2e8f0 !important;
        display: none !important;
        /* Hidden until opened */
        flex-direction: column !important;
        overflow: hidden !important;
        z-index: 999999 !important;
    }

    .chatbot-window.is-open {
        display: flex !important;
        /* Fully open */
        animation: chat-popup-anim 0.22s cubic-bezier(0.16, 1, 0.3, 1);
    }

    @keyframes chat-popup-anim {
        from {
            opacity: 0;
            transform: translateY(10px) scale(0.97);
        }

        to {
            opacity: 1;
            transform: translateY(0) scale(1);
        }
    }

    /* Header: Emerald Teal Gradient */
    .chatbot-header {
        flex-shrink: 0 !important;
        background: linear-gradient(135deg, #14bf98 0%, #0fa381 100%) !important;
        color: #ffffff;
        padding: 8px 12px !important;
        display: flex;
        justify-content: space-between;
        align-items: center;
        border-bottom: 1px solid rgba(0, 0, 0, 0.05) !important;
    }

    .chatbot-header-info {
        display: flex;
        align-items: center;
        gap: 8px;
    }

    .chatbot-avatar {
        width: 26px !important;
        height: 26px !important;
        border-radius: 50%;
        background: rgba(255, 255, 255, 0.22);
        border: 1.5px solid rgba(255, 255, 255, 0.6);
        color: #ffffff;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 0.78rem !important;
        position: relative;
        flex-shrink: 0;
    }

    .online-indicator {
        position: absolute;
        bottom: -1px;
        right: -1px;
        width: 7px;
        height: 7px;
        background-color: #2ecc71;
        border: 1.5px solid #ffffff;
        border-radius: 50%;
    }

    .chatbot-name {
        font-family: 'Montserrat', sans-serif !important;
        font-size: 0.78rem !important;
        font-weight: 700 !important;
        color: #ffffff !important;
        line-height: 1.2 !important;
        margin-bottom: 0 !important;
    }

    .chatbot-status {
        font-size: 0.60rem !important;
        color: #e6fffa !important;
        display: block;
        line-height: 1.1 !important;
    }

    .chatbot-btn-close {
        background: transparent;
        border: none;
        color: rgba(255, 255, 255, 0.85);
        font-size: 0.85rem !important;
        cursor: pointer;
        transition: all 0.2s;
        padding: 4px;
        border-radius: 4px;
        outline: none;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .chatbot-btn-close:hover {
        color: #ffffff;
        background: rgba(255, 255, 255, 0.18);
    }

    /* Messages Area: Clean Light Slate */
    .chatbot-messages {
        flex: 1 1 auto !important;
        min-height: 0 !important;
        /* Prevents flex overflow */
        padding: 9px 10px !important;
        overflow-y: auto !important;
        background: #f8fafc !important;
        display: flex;
        flex-direction: column;
        gap: 7px !important;
    }

    /* Slim scrollbar */
    .chatbot-messages::-webkit-scrollbar {
        width: 4px;
    }

    .chatbot-messages::-webkit-scrollbar-track {
        background: transparent;
    }

    .chatbot-messages::-webkit-scrollbar-thumb {
        background: #cbd5e1;
        border-radius: 4px;
    }

    .chatbot-messages::-webkit-scrollbar-thumb:hover {
        background: #94a3b8;
    }

    .chat-message {
        display: flex;
        gap: 6px;
        max-width: 90% !important;
        animation: msg-fade-in 0.18s ease;
    }

    @keyframes msg-fade-in {
        from {
            opacity: 0;
            transform: translateY(3px);
        }

        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    .bot-message {
        align-self: flex-start;
    }

    .user-message {
        align-self: flex-end;
        flex-direction: row-reverse;
    }

    .message-avatar {
        width: 22px !important;
        height: 22px !important;
        border-radius: 50%;
        background: #14bf98;
        color: #ffffff;
        font-size: 0.62rem !important;
        display: flex;
        align-items: center;
        justify-content: center;
        flex-shrink: 0;
        margin-top: 1px;
    }

    .user-message .message-avatar {
        background: #0f172a;
    }

    .message-bubble {
        padding: 6px 10px !important;
        border-radius: 9px !important;
        font-size: 0.74rem !important;
        line-height: 1.38 !important;
        word-break: break-word;
    }

    .message-bubble p {
        font-size: 0.74rem !important;
        line-height: 1.38 !important;
        margin-bottom: 0.25rem !important;
    }

    .message-bubble p:last-child {
        margin-bottom: 0 !important;
    }

    .bot-message .message-bubble {
        background-color: #ffffff !important;
        color: #1e293b !important;
        border: 1px solid #e2e8f0 !important;
        border-top-left-radius: 2px !important;
        box-shadow: 0 1px 3px rgba(0, 0, 0, 0.04) !important;
    }

    .bot-message .message-bubble strong {
        color: #0f766e !important;
        font-weight: 700 !important;
    }

    .user-message .message-bubble {
        background: linear-gradient(135deg, #14bf98 0%, #0fa381 100%) !important;
        color: #ffffff !important;
        border-top-right-radius: 2px !important;
        box-shadow: 0 1px 3px rgba(20, 191, 152, 0.2) !important;
    }

    /* Suggestion Chips */
    .chatbot-suggestions {
        display: flex;
        flex-wrap: wrap;
        gap: 4px !important;
        margin-top: 2px;
        padding-left: 28px !important;
    }

    .suggestion-chip {
        background: #f0fdf9 !important;
        border: 1px solid #99f6e4 !important;
        color: #0f766e !important;
        padding: 2px 7px !important;
        border-radius: 12px !important;
        font-size: 0.63rem !important;
        font-weight: 600;
        cursor: pointer;
        transition: all 0.2s ease;
        user-select: none;
    }

    .suggestion-chip:hover {
        background: #14bf98 !important;
        color: #ffffff !important;
        border-color: #14bf98 !important;
        transform: translateY(-1px);
    }

    /* Typing Indicator */
    .chatbot-typing {
        flex-shrink: 0 !important;
        padding: 4px 10px !important;
        background-color: #f8fafc !important;
        display: flex;
        align-items: center;
        gap: 6px;
        border-top: 1px solid #f1f5f9;
    }

    .typing-bubble {
        display: flex;
        align-items: center;
        gap: 3px;
        background: #e2e8f0;
        padding: 3px 6px;
        border-radius: 8px;
    }

    .typing-bubble .dot {
        width: 4px;
        height: 4px;
        background-color: #14bf98;
        border-radius: 50%;
        animation: typing-bounce 1.2s infinite ease-in-out;
    }

    .typing-bubble .dot:nth-child(2) {
        animation-delay: 0.2s;
    }

    .typing-bubble .dot:nth-child(3) {
        animation-delay: 0.4s;
    }

    @keyframes typing-bounce {

        0%,
        80%,
        100% {
            transform: scale(0.6);
            opacity: 0.4;
        }

        40% {
            transform: scale(1);
            opacity: 1;
        }
    }

    .typing-text {
        font-size: 0.64rem !important;
        color: #64748b;
        font-style: italic;
    }

    /* Footer & Input */
    .chatbot-footer {
        flex-shrink: 0 !important;
        padding: 6px 8px !important;
        background-color: #ffffff !important;
        border-top: 1px solid #e2e8f0 !important;
    }

    .input-wrapper {
        display: flex;
        align-items: center;
        background-color: #f1f5f9;
        border: 1px solid #cbd5e1;
        border-radius: 18px;
        padding: 2px 3px 2px 10px;
        transition: all 0.2s;
    }

    .input-wrapper:focus-within {
        border-color: #14bf98;
        background-color: #ffffff;
        box-shadow: 0 0 0 2px rgba(20, 191, 152, 0.2);
    }

    .chatbot-input {
        flex: 1;
        border: none;
        background: transparent;
        font-size: 0.73rem !important;
        color: #1e293b !important;
        outline: none;
        padding: 3px 0;
    }

    .chatbot-input::placeholder {
        color: #94a3b8;
    }

    .chatbot-send-btn {
        width: 25px !important;
        height: 25px !important;
        border-radius: 50%;
        background-color: #14bf98;
        color: #ffffff;
        border: none;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 0.70rem !important;
        cursor: pointer;
        transition: all 0.2s ease;
        outline: none;
        flex-shrink: 0;
    }

    .chatbot-send-btn:hover {
        background-color: #0fa381;
        transform: scale(1.05);
    }

    .chatbot-send-btn:disabled {
        background-color: #cbd5e1;
        cursor: not-allowed;
        transform: none;
    }

    .chatbot-disclaimer {
        text-align: center;
        font-size: 0.58rem !important;
        color: #64748b;
        margin-top: 3px;
    }

    /* Small Screen Responsive Fitting */
    @media (max-width: 480px) {
        #busbook-chatbot-container {
            bottom: 12px;
            right: 12px;
        }

        .chatbot-window {
            right: 10px !important;
            left: 10px !important;
            width: auto !important;
            max-width: none !important;
            height: 360px !important;
            bottom: 58px !important;
            max-height: calc(100vh - 72px) !important;
        }
    }
</style>

<!-- Chatbot Client-Side Logic -->
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const toggleBtn = document.getElementById('chatbot-toggle-btn');
        const closeBtn = document.getElementById('chatbot-close-btn');
        const chatWindow = document.getElementById('chatbot-window');
        const chatForm = document.getElementById('chatbot-form');
        const chatInput = document.getElementById('chatbot-input');
        const chatMessages = document.getElementById('chatbot-messages');
        const chatTyping = document.getElementById('chatbot-typing');
        const sendBtn = document.getElementById('chatbot-send-btn');
        const chatEndpoint = "{{ route('chatbot.send') }}";
        const csrfToken = "{{ csrf_token() }}";

        let isChatOpen = false;

        // Open chat window
        function openChat() {
            isChatOpen = true;
            document.body.classList.add('chatbot-open');
            chatWindow.classList.add('is-open');
            toggleBtn.querySelector('.chat-open-icon').classList.add('d-none');
            toggleBtn.querySelector('.chat-close-icon').classList.remove('d-none');
            const badge = toggleBtn.querySelector('.launcher-badge');
            if (badge) badge.textContent = 'Close';
            setTimeout(function() {
                chatInput.focus();
            }, 80);
            scrollToBottom();
        }

        // Close chat window
        function closeChat() {
            isChatOpen = false;
            document.body.classList.remove('chatbot-open');
            chatWindow.classList.remove('is-open');
            toggleBtn.querySelector('.chat-open-icon').classList.remove('d-none');
            toggleBtn.querySelector('.chat-close-icon').classList.add('d-none');
            const badge = toggleBtn.querySelector('.launcher-badge');
            if (badge) badge.textContent = 'Ask AI';
        }

        // Toggle chat window open/close
        function toggleChat(e) {
            if (e) {
                e.preventDefault();
                e.stopPropagation();
            }
            if (isChatOpen) {
                closeChat();
            } else {
                openChat();
            }
        }

        toggleBtn.addEventListener('click', toggleChat);

        closeBtn.addEventListener('click', function(e) {
            e.preventDefault();
            e.stopPropagation();
            closeChat();
        });

        // Close on Escape key press
        document.addEventListener('keydown', function(e) {
            if (e.key === 'Escape' && isChatOpen) {
                closeChat();
            }
        });

        // Close when clicking outside of the chat window and launcher
        document.addEventListener('click', function(e) {
            if (isChatOpen && !chatWindow.contains(e.target) && !toggleBtn.contains(e.target)) {
                closeChat();
            }
        });

        // Auto-scroll messages container to bottom
        function scrollToBottom() {
            chatMessages.scrollTop = chatMessages.scrollHeight;
        }

        // Format message text (convert newlines and basic markdown bullets)
        function formatMessage(text) {
            let escaped = text
                .replace(/&/g, "&amp;")
                .replace(/</g, "&lt;")
                .replace(/>/g, "&gt;");

            // Format bold text **word**
            escaped = escaped.replace(/\*\*(.*?)\*\*/g, '<strong>$1</strong>');
            // Format newlines
            escaped = escaped.replace(/\n/g, '<br>');
            return escaped;
        }

        // Append message bubble to chat window
        function appendMessage(sender, text) {
            const msgDiv = document.createElement('div');
            msgDiv.className = `chat-message ${sender}-message`;

            const avatarDiv = document.createElement('div');
            avatarDiv.className = 'message-avatar';
            avatarDiv.innerHTML = sender === 'bot' ?
                '<i class="fas fa-robot"></i>' :
                '<i class="fas fa-user"></i>';

            const bubbleDiv = document.createElement('div');
            bubbleDiv.className = 'message-bubble';
            bubbleDiv.innerHTML = formatMessage(text);

            msgDiv.appendChild(avatarDiv);
            msgDiv.appendChild(bubbleDiv);
            chatMessages.appendChild(msgDiv);
            scrollToBottom();
        }

        // Send query to backend API
        function submitQuery(messageText) {
            const query = messageText.trim();
            if (!query) return;

            // Render user bubble
            appendMessage('user', query);
            chatInput.value = '';

            // Hide suggestions after first query
            const suggestions = document.getElementById('chatbot-suggestions');
            if (suggestions) {
                suggestions.style.display = 'none';
            }

            // Show typing indicator
            chatTyping.classList.remove('d-none');
            sendBtn.disabled = true;
            chatInput.disabled = true;
            scrollToBottom();

            // Perform AJAX request
            fetch(chatEndpoint, {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8',
                        'Accept': 'application/json'
                    },
                    body: new URLSearchParams({
                        message: query,
                        _token: csrfToken
                    }).toString()
                })
                .then(async function(response) {
                    const responseText = await response.text();

                    let data;

                    try {
                        data = JSON.parse(responseText);
                    } catch (error) {
                        console.error(
                            'Chatbot response was not JSON:',
                            response.status,
                            responseText.substring(0, 300)
                        );

                        throw new Error(
                            'The server returned HTTP ' + response.status +
                            ' instead of a JSON response.'
                        );
                    }

                    if (!response.ok) {
                        throw new Error(data.message || 'HTTP ' + response.status);
                    }
                    return data;
                })
                .then(function(data) {
                    chatTyping.classList.add('d-none');
                    sendBtn.disabled = false;
                    chatInput.disabled = false;
                    chatInput.focus();

                    if (data && data.reply) {
                        appendMessage('bot', data.reply);
                    } else {
                        appendMessage('bot',
                            "Sorry, I couldn't process your request right now. Please try again.");
                    }
                })
                .catch(function(error) {
                    console.error('Chatbot AJAX Error:', error);
                    chatTyping.classList.add('d-none');
                    sendBtn.disabled = false;
                    chatInput.disabled = false;
                    chatInput.focus();
                    appendMessage('bot',
                        "Connection error: Unable to reach AI server. Please verify your internet connection or try again later."
                    );
                });
        }

        // Form submit listener
        chatForm.addEventListener('submit', function(e) {
            e.preventDefault();
            submitQuery(chatInput.value);
        });

        // Quick suggestion chips click listener
        document.querySelectorAll('.suggestion-chip').forEach(function(chip) {
            chip.addEventListener('click', function() {
                const query = this.getAttribute('data-query');
                if (query) {
                    submitQuery(query);
                }
            });
        });
    });
</script>
