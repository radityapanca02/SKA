<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class RecommendationController extends Controller
{
    public function getRecommendation(Request $request)
    {
        $keyword = trim($request->input('keyword'));

        if (!$keyword) {
            return response()->json(['error' => 'Keyword wajib diisi'], 400);
        }

        $systemPrompt = 'Pakar rekomendasi jurusan SMK PGRI 3 Malang.
Tugas: Cocokkan minat user (Indo/Eng/singkatan) ke 2 jurusan paling relevan (utama & alternatif).

Daftar Jurusan:
- TIK: RPL, DKV, BP, NIMA, BDP, TKJ (Hacking/Cybersecurity -> TKJ/RPL)
- Kelistrikan: TE & AV (Audio/Sound -> TE & AV), PB, EI, KI
- Otomotif: TP, TL, TBSM, TKR, BO

Aturan:
1. Jika tidak relevan dengan sekolah, jurusan_utama.name="Tidak ditemukan", alternatif=null.
2. Output WAJIB JSON murni tanpa markdown.

JSON Format:
{
  "jurusan_utama": {"name": "", "department": "", "description": ""},
  "jurusan_alternatif": {"name": "", "department": "", "description": ""}
}';

        try {
            $apiKey = config('services.groq.api_key', env('GROQ_API_KEY'));
            $model = config('services.groq.model', env('GROQ_MODEL', 'llama-3.3-70b-versatile'));

            if (empty($apiKey)) {
                return response()->json(['error' => 'GROQ_API_KEY belum dikonfigurasi'], 500);
            }

            $response = Http::retry(2, 1000, function ($exception) {
                return $exception->getCode() === 429;
            })->timeout(15)->withHeaders([
                'Content-Type'  => 'application/json',
                'Authorization' => 'Bearer ' . $apiKey,
            ])->post('https://api.groq.com/openai/v1/chat/completions', [
                'model'           => $model,
                'messages'        => [
                    ['role' => 'system', 'content' => $systemPrompt],
                    ['role' => 'user', 'content' => "Minat: {$keyword}"],
                ],
                'temperature'     => 0.3,
                'max_tokens'      => 350,
                'response_format' => ['type' => 'json_object'],
            ]);

            if ($response->failed()) {
                Log::error('Groq API Error:', ['status' => $response->status(), 'body' => $response->body()]);
                return response()->json(['error' => 'Gagal menghubungi AI service (Rate limit/Service busy)'], 500);
            }

            $result = $response->json();
            $aiText = $result['choices'][0]['message']['content'] ?? null;

            if (!$aiText) {
                return response()->json(['error' => 'Respon AI kosong'], 500);
            }

            $cleanText = trim(preg_replace('/```(json)?|```/', '', $aiText));
            $parsed = json_decode($cleanText, true);

            if (json_last_error() === JSON_ERROR_NONE) {
                return response()->json($parsed);
            }

            Log::error('JSON Parse Error:', ['raw' => $cleanText, 'error' => json_last_error_msg()]);
            return response()->json(['error' => 'Format respon AI tidak valid'], 500);

        } catch (\Exception $e) {
            Log::error('Exception in getRecommendation:', ['error' => $e->getMessage()]);
            return response()->json(['error' => 'Terjadi kesalahan sistem'], 500);
        }
    }
}
