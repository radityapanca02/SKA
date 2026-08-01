<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class RecommendationController extends Controller
{
    public function getRecommendation(Request $request)
    {
        $keyword = $request->input('keyword');

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
        
        $userPrompt = "Minat saya: {$keyword}";

        try {
            $response = Http::timeout(30)->withHeaders([
                'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . env('GROQ_API_KEY'),
            ])->post('https://api.groq.com/openai/v1/chat/completions', [
                'model' => env('GROQ_MODEL', 'llama-3.3-70b-versatile'),
                'messages' => [
                    [
                        'role' => 'system',
                        'content' => $systemPrompt,
                    ],
                    [
                        'role' => 'user',
                        'content' => $userPrompt,
                    ],
                ],
                'temperature' => 0.7,
                'max_tokens' => 1024,
                'response_format' => ['type' => 'json_object']
            ]);

            if ($response->failed()) {
                Log::error('Groq API Error:', ['response' => $response->body()]);
                return response()->json(['error' => 'Gagal menghubungi AI service'], 500);
            }

            $result = $response->json();

            if (empty($result['choices'][0]['message']['content'])) {
                Log::error('Empty AI Response:', $result);
                return response()->json([
                    'error' => 'Tidak ada hasil dari Groq AI',
                    'debug' => $result
                ], 500);
            }

            $aiText = $result['choices'][0]['message']['content'];

            $cleanText = preg_replace('/```(json)?|```/', '', $aiText);
            $cleanText = trim($cleanText);

            $parsed = json_decode($cleanText, true);

            if (json_last_error() === JSON_ERROR_NONE) {
                return response()->json($parsed);
            } else {
                Log::error('JSON Parse Error:', ['raw_text' => $cleanText, 'error' => json_last_error_msg()]);
                return response()->json([
                    'error' => 'Gagal parsing JSON dari AI',
                    'json_error' => json_last_error_msg()
                ], 500);
            }
        } catch (\Exception $e) {
            Log::error('Exception in getRecommendation:', ['error' => $e->getMessage()]);
            return response()->json(['error' => 'Terjadi kesalahan sistem: ' . $e->getMessage()], 500);
        }
    }
}
