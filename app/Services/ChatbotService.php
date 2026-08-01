<?php

namespace App\Services;

use Illuminate\Support\Facades\Log;

class ChatbotService
{
    protected $gemini;

    protected $groq;

    public function __construct(
        GeminiChatService $gemini,
        GroqChatService $groq
    ) {
        $this->gemini = $gemini;
        $this->groq = $groq;
    }

    public function ask(string $prompt): string
    {
        $primaryProvider = strtoupper(env('CHATBOT_PROVIDER', 'GROQ'));

        if ($primaryProvider === 'GROQ') {
            try {
                $response = $this->groq->ask($prompt);

                if (
                    str_contains($response, 'Terjadi kesalahan') ||
                    str_contains($response, 'rate_limit') ||
                    str_contains($response, '429') ||
                    str_contains($response, 'rate_limit_exceeded')
                ) {
                    Log::warning('Groq Failed/Rate Limited. Falling back to Gemini.');
                    return $this->gemini->ask($prompt);
                }

                return $response;
            } catch (\Exception $e) {
                Log::error('Groq Exception: ' . $e->getMessage());
                return $this->gemini->ask($prompt);
            }
        }

        return $this->gemini->ask($prompt);
    }
}

