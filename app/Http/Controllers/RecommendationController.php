<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Throwable;

class RecommendationController extends Controller
{
    public function getRecommendation(Request $request)
    {
        $keyword = trim($request->input('keyword') ?? $request->input('minat') ?? '');

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
            $apiKey = env('GROQ_API_KEY');
            $model = env('GROQ_MODEL', 'llama-3.3-70b-versatile');

            if (empty($apiKey)) {
                return response()->json(['error' => 'GROQ_API_KEY belum dikonfigurasi di file .env'], 500);
            }

            $response = Http::withoutVerifying()->withHeaders([
                'Authorization' => 'Bearer '.$apiKey,
                'Content-Type'  => 'application/json',
            ])->post('https://api.groq.com/openai/v1/chat/completions', [
                'model' => $model,
                'messages' => [
                    [
                        'role'    => 'system',
                        'content' => $systemPrompt,
                    ],
                    [
                        'role'    => 'user',
                        'content' => "Minat: {$keyword}",
                    ],
                ],
                'temperature' => 0.3,
                'max_tokens'  => 350,
            ]);

            if ($response->successful()) {
                $data = $response->json();
                $aiText = $data['choices'][0]['message']['content'] ?? null;

                if (!$aiText) {
                    return response()->json(['error' => 'Respon AI kosong'], 500);
                }

                $cleanText = trim(preg_replace('/```(json)?|```/', '', $aiText));
                $parsed = json_decode($cleanText, true);

                if (json_last_error() === JSON_ERROR_NONE) {
                    return response()->json($parsed);
                }

                return response()->json(['error' => 'Format respon AI tidak valid'], 500);
            }

            Log::error('Groq Error in Recommendation:', ['status' => $response->status(), 'body' => $response->body()]);
            return response()->json([
                'error'   => 'Gagal menghubungi AI service',
                'details' => $response->json() ?? $response->body(),
            ], $response->status());

        } catch (Throwable $e) {
            Log::error('Exception in getRecommendation:', [
                'message' => $e->getMessage(),
                'file'    => $e->getFile(),
                'line'    => $e->getLine(),
            ]);

            return response()->json([
                'error'   => 'Terjadi kesalahan sistem',
                'message' => $e->getMessage(),
            ], 500);
        }
    }
}
