<?php

namespace App\Services;

class GeminiChatService
{
    use ChatbotTrait;

    protected string $endpoint;

    public function __construct()
    {
        $this->endpoint = env('GEMINI_ENDPOINT').env('GEMINI_API_KEY');
    }

    public function ask(string $prompt): string
    {
        $context = $this->getContext();
        $systemPrompt = $this->getSystemPrompt($context);

        $response = $this->getHttpClient()->post($this->endpoint, [
            'contents' => [
                [
                    'role' => 'user',
                    'parts' => [
                        ['text' => $systemPrompt."\n\nPertanyaan pengguna:\n".$prompt],
                    ],
                ],
            ],
        ]);

        if ($response->successful()) {
            $data = $response->json();

            return $data['candidates'][0]['content']['parts'][0]['text'] ?? 'Maaf, saya tidak tahu jawabannya.';
        }

        return 'Terjadi kesalahan: '.$response->body();
    }
}
