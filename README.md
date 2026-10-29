# 🚌 Bus-Book — Online Bus Ticket Booking & Reservation

DEPLOYED : https://bus-booking.nfy.fyi/

A modern, responsive online bus reservation and management platform built with **Laravel** and the **Aria Theme**, featuring real-time seat selection and an **AI Travel Assistant**.

---

## ✨ Key Features

- **Interactive Seat Selection & Booking**: Real-time visual seat map supporting individual seat selection, instant state toggling, and multi-passenger bookings.
- **Dynamic Route & Date Filtering**: Automatically discovers available buses based on selected travel source, destination, and departure date.
- **Operator & Bus Registration**: Easy onboarding flow for bus operators to register fleet details, routes, fares, and capacity.
- **Admin Dashboard**: Manage bus fleets, activate/deactivate routes, monitor user accounts, and review passenger seat bookings.

---

## 🤖 Feature Highlight: AI Travel Assistant (Chatbot)

Bus-Book includes an **intelligent, floating AI Assistant** designed to guide visitors 24/7 without agent intervention.

### 🌟 What Makes It Special?

1. **Live Database Grounding**:
   - The chatbot pulls the active fleet catalog (routes, fares, travel duration, capacity) straight from the database.
   - It only answers with verified, real-time bus inventory—no hallucinated routes or fake prices.

2. **Strict Domain Guardrails (`instruction.md`)**:
   - Programmed with strict system boundaries: assists **only** with routes, fares, bus schedules, and booking navigation.
   - Politely rejects out-of-scope requests (e.g., general trivia, weather, coding, jokes) using fast pre-flight pattern checks and system prompt constraints.

3. **Smooth User Experience**:
   - Floating widget with pulse animation, quick-tap suggestion chips, and live typing indicators.
   - Fully responsive for both desktop and mobile devices.

4. **Configurable OpenRouter Integration**:
   - Connects to OpenRouter API (defaults to free, fast inference models such as `nvidia/nemotron-3-ultra-550b-a55b:free` or any preferred model).

---

## 🛠️ Tech Stack

- **Backend**: Laravel 8+, PHP 7.4+ / 8.x, MySQL
- **Frontend**: Blade Templates, Bootstrap 4, jQuery, FontAwesome 5
- **AI / LLM**: OpenRouter API via `ChatbotService` + cURL
- **Styling**: Aria Landing Page Theme with custom bus seat layouts

---

## 🚀 Quick Start Guide

### 1. Clone & Install Dependencies
```bash
git clone https://github.com/your-username/laravel-bus-booking.git
cd laravel-bus-booking
composer install
```

### 2. Environment Configuration
Copy `.env.example` to `.env`:
```bash
cp .env.example .env
php artisan key:generate
```

Configure your database and AI chatbot credentials in `.env`:
```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=bus_booking
DB_USERNAME=root
DB_PASSWORD=

# AI Chatbot Configuration
OPENROUTER_API_KEY=your_openrouter_api_key_here
CHATBOT_MODEL=nvidia/nemotron-3-ultra-550b-a55b:free
```

### 3. Run Migrations & Seed
```bash
php artisan migrate
```

### 4. Start the Application
```bash
php artisan serve
```
Visit `http://127.0.0.1:8000` in your browser.

---

## 📁 AI Chatbot Architecture Overview

```text
├── app/
│   ├── Http/Controllers/ChatbotController.php   # Handles incoming message requests & CSRF
│   └── Services/ChatbotService.php              # Guardrails, DB catalog injection & OpenRouter API cURL
├── config/
│   └── chatbot.php                              # Chatbot configurations (API keys, models, timeouts)
├── resources/views/frontend/aria_includes/
│   └── chatbot.blade.php                        # Floating widget, bubble UI & AJAX script
└── storage/app/chatbot/
    └── instruction.md                           # System prompt rules & domain grounding
```

---

## 📄 License
This project is open-source and available under the [MIT License](LICENSE).


