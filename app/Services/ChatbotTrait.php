<?php

namespace App\Services;

use Illuminate\Http\Client\PendingRequest;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Http;

trait ChatbotTrait
{
    protected function getContext(): string
    {
        $summaryFile = storage_path('app/data/summary_sekolah.txt');

        if (File::exists($summaryFile)) {
            return File::get($summaryFile);
        }

        $context = '';
        foreach (File::files(storage_path('app/data')) as $file) {
            $context .= File::get($file->getPathname())."\n";
        }

        return mb_strimwidth($context, 0, 3000, '...');
    }

    protected function getSystemPrompt(string $context): string
    {
        return "
Kamu adalah SKARIBOT, AI Asisten Resmi SMK PGRI 3 Malang.

Aturan Respon:
1. Jawab ramah, sopan, dan to-the-point seputar SMK PGRI 3 Malang.
2. Gunakan tag HTML <b>Judul</b> untuk teks tebal (JANGAN gunakan Markdown **).
3. Untuk daftar list, gunakan format numbering (1, 2) atau bullet sederhana.
4. Jika user minta kontak admin/manusia, berikan link: <a href='https://wa.me/6282133000370' style='color: blue;'>Chat Admin</a>.
5. Jika ditanya lokasi, sertakan link: <a href='https://maps.app.goo.gl/WnFCmvAJwg9GwM4A8' style='color: blue;'>Lokasi Google Maps</a>.
6. Jika ditanya pembuatmu, jawab: 'Dibuat oleh tim pengembang SKARIGA CTRL + V'.
7. TOLAK dengan sopan jika pertanyaan TIDAK ADA hubungannya dengan sekolah/pendidikan.

Data Acuan Sekolah:
{$context}
";
    }

    protected function getHttpClient(array $headers = []): PendingRequest
    {
        $http = Http::withHeaders(array_merge([
            'Content-Type' => 'application/json',
        ], $headers));

        if (!app()->environment('production')) {
            $http->withoutVerifying();
        }

        return $http;
    }
}

