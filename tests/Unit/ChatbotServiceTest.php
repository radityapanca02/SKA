<?php

namespace Tests\Unit;

use App\Services\ChatbotService;
use App\Services\ChatbotTrait;
use App\Services\GeminiChatService;
use App\Services\GroqChatService;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Log;
use Tests\TestCase;

class ChatbotServiceTest extends TestCase
{
    use ChatbotTrait;

    public function test_get_context_reads_summary_file_when_present(): void
    {
        $summaryFile = storage_path('app/data/summary_sekolah.txt');
        $this->assertTrue(File::exists($summaryFile));

        $context = $this->getContext();
        $this->assertStringContainsString('Profil SMK PGRI 3 Malang', $context);
    }

    public function test_chatbot_service_failover_on_rate_limit(): void
    {
        $geminiMock = $this->createMock(GeminiChatService::class);
        $groqMock = $this->createMock(GroqChatService::class);

        $groqMock->expects($this->once())
            ->method('ask')
            ->willReturn('Terjadi kesalahan: rate_limit_exceeded (429)');

        $geminiMock->expects($this->once())
            ->method('ask')
            ->with('Halo')
            ->willReturn('Jawaban dari Gemini');

        Log::shouldReceive('warning')
            ->once()
            ->with('Groq Failed/Rate Limited. Falling back to Gemini.');

        $service = new ChatbotService($geminiMock, $groqMock);
        $result = $service->ask('Halo');

        $this->assertEquals('Jawaban dari Gemini', $result);
    }

    public function test_chatbot_service_failover_on_exception(): void
    {
        $geminiMock = $this->createMock(GeminiChatService::class);
        $groqMock = $this->createMock(GroqChatService::class);

        $groqMock->expects($this->once())
            ->method('ask')
            ->willThrowException(new \Exception('Connection timeout'));

        $geminiMock->expects($this->once())
            ->method('ask')
            ->with('Halo')
            ->willReturn('Jawaban dari Gemini');

        Log::shouldReceive('error')
            ->once()
            ->with('Groq Exception: Connection timeout');

        $service = new ChatbotService($geminiMock, $groqMock);
        $result = $service->ask('Halo');

        $this->assertEquals('Jawaban dari Gemini', $result);
    }
}
