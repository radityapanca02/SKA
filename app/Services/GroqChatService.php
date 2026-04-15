<?php

namespace App\Services;

class GroqChatService
{
    use ChatbotTrait;

    protected string $endpoint;

    protected string $apiKey;

    protected string $model;

    public function __construct()
    {
        $this->apiKey = env('GROQ_API_KEY');
        $this->endpoint = 'https://api.groq.com/openai/v1/chat/completions';
        $this->model = env('GROQ_MODEL', 'llama-3.3-70b-versatile');
    }

    public function ask(string $prompt): string
    {
        $context = $this->getContext();
        $systemPrompt = $this->getSystemPrompt($context);

        $response = $this->getHttpClient([
            'Authorization' => 'Bearer '.$this->apiKey,
        ])->post($this->endpoint, [
            'model' => $this->model,
            'messages' => [
                [
                    'role' => 'system',
                    'content' => $systemPrompt,
                ],
                [
                    'role' => 'user',
                    'content' => $prompt,
                ],
            ],
            'temperature' => 0.7,
            'max_tokens' => 1024,
        ]);

        if ($response->successful()) {
            $data = $response->json();

            return $data['choices'][0]['message']['content'] ?? 'Maaf, saya tidak tahu jawabannya.';
        }

        return 'Terjadi kesalahan: '.$response->body();
    }
}
