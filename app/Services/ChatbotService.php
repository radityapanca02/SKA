<?php

namespace App\Services;

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
        $provider = strtoupper(env('CHATBOT_PROVIDER', 'gemini'));

        if ($provider === 'GROQ') {
            return $this->groq->ask($prompt);
        } elseif ($provider === 'GEMINI') {
            return $this->gemini->ask($prompt);
        } else {
            return $this->gemini->ask($prompt);
        }
    }
}
