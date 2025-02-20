# Ollama API Management System

This project is an API management system that acts as a proxy for an AI model server (Ollama). It is built using Laravel and provides features such as authentication, rate limiting, logging, and error handling.

## Features

- **Authentication**: Uses API keys or JWT for secure access.
- **Proxy Requests**: Forwards user requests to the internal Ollama server without exposing its URL.
- **Rate Limiting**: Limits each user to a configurable number of requests per minute.
- **Logging**: Logs request details for monitoring usage.
- **Error Handling**: Returns appropriate error responses for invalid API keys, rate limits exceeded, and internal server errors.
- **Admin Dashboard**: Provides API endpoints to manage users, API keys, and logs.

## Endpoints

- `POST /api/generate`: Accepts a JSON request with a prompt and returns the AI-generated response from Ollama.
- `POST /api/auth/register`: Registers a new user and generates an API key.
- `POST /api/auth/login`: Authenticates a user and provides a JWT.
- `GET /api/usage`: Returns API usage statistics (for logged-in users).
- `GET /api/admin/logs` (Admin only): Returns system logs and API usage data.

## Tech Stack

- **Backend Framework**: Laravel
- **Authentication**: Laravel Sanctum
- **Rate Limiting**: Redis or database counters
- **Logging**: Database or external tools like Logstash

## Security Considerations

- Do not expose the internal Ollama API URL.
- Implement authentication middleware for every endpoint.
- Enforce request rate limits per API key.
- Use HTTPS for secure data transmission.

## Installation and Setup

1. **Clone the Repository**:
   ```sh
   git clone <repository-url>
   cd ollama-api-management-system
   ```

2. **Install Dependencies**:
   ```sh
   composer install
   ```

3. **Set Up Environment Variables**:
   ```sh
   cp .env.example .env
   nano .env
   ```

4. **Generate Application Key**:
   ```sh
   php artisan key:generate
   ```

5. **Run Migrations**:
   ```sh
   php artisan migrate
   ```

6. **Serve the Application**:
   ```sh
   php artisan serve
   ```

## Usage

- Use the provided endpoints to interact with the API management system.
- Ensure you have a valid API key or JWT for authentication.
- Monitor usage and logs through the admin endpoints.

## License

This project is licensed under the MIT License.
