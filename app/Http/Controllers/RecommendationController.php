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

        $prompt = "Berdasarkan minat berikut: {$keyword}, rekomendasikan 2 jurusan SMK: satu jurusan utama, yang kedua jurusan alternatif yang paling cocok.

⚠️ Aturan:
1. Jika yang di input berhubungan tindak hacking, cybersecurity, jaringan maka akan memilih jurusan TKJ
1.1 Jika yang di input berhubungan dengan Sound maka akan di rujuk ke jurusan TE & AV
2. Jika minat sesuai dengan salah satu jurusan SMK PGRI 3 MALANG berikut:

⚠️ Aturan Utama:
1. Jika user menginput selain jurusan atau hal yang tidak relevan abaikan

** Departemen / Kategori TIK: **
- RPL (Rekayasa Perangkat Lunak)
- DKV (Desain Komunikasi Visual)
- BP (Broadcasting dan Perfilman)
- NIMA (Animasi)
- BDP (Bisnis Digital & Pemasaran)
- TKJ (Teknik Komputer dan Jaringan)

** Departemen / Kategori Kelistrikan: **
- TE & AV (Teknik Elektronika & Audio Video)
- TL (Teknik Pembangkit Tenaga Listrik)
- TEI (Teknik Elektronika Industri)
- TKI (Teknik Kimia Industri)

** Departemen / Kategori Otomotif: **
- TP (Teknik Permesinan)
- TPL (Teknik Pengelasan)
- TBSM (Teknik Bisnis Sepeda Motor)
- TKR (Teknik Kendaraan Ringan)
- BO (Teknik Perbaikan Body Otomotif)

BALAS DENGAN FORMAT JSON BERIKUT:
{
\"jurusan_utama\": {
    \"name\": \"Nama Jurusan\",
    \"department\": \"Kategori\",
    \"description\": \"Penjelasan singkat kenapa cocok\"
},
\"jurusan_alternatif\": {
    \"name\": \"Nama Jurusan\",
    \"department\": \"Kategori\", 
    \"description\": \"Penjelasan singkat kenapa cocok\"
}
}

Jika minat TIDAK relevan, balas dengan:
{
\"jurusan_utama\": {
    \"name\": \"Tidak ditemukan\",
    \"department\": \"N/A\",
    \"description\": \"Penjelasan singkat kenapa tidak relevan\"
},
\"jurusan_alternatif\": null
}

HANYA kembalikan JSON, tanpa teks lain.";

        try {
            $response = Http::timeout(30)->withHeaders([
                'Content-Type' => 'application/json',
            ])->post("https://generativelanguage.googleapis.com/v1beta/models/gemini-2.0-flash:generateContent?key=" . env('GEMINI_API_KEY'), [
                        "contents" => [
                            [
                                "parts" => [["text" => $prompt]]
                            ]
                        ],
                        "generationConfig" => [
                            "temperature" => 0.7,
                            "topK" => 40,
                            "topP" => 0.95,
                            "maxOutputTokens" => 1024,
                        ]
                    ]);

            if ($response->failed()) {
                Log::error('Gemini API Error:', ['response' => $response->body()]);
                return response()->json(['error' => 'Gagal menghubungi AI service'], 500);
            }

            $result = $response->json();
            Log::info('Gemini Response:', $result);

            if (empty($result['candidates'][0]['content']['parts'][0]['text'])) {
                return response()->json([
                    'error' => 'Tidak ada hasil dari Gemini',
                    'debug' => $result
                ], 500);
            }

            $aiText = $result['candidates'][0]['content']['parts'][0]['text'];
            $cleanText = preg_replace('/```(json)?|```/', '', $aiText);
            $cleanText = trim($cleanText);

            $parsed = json_decode($cleanText, true);

            if (json_last_error() === JSON_ERROR_NONE) {
                return response()->json($parsed);
            } else {
                return response()->json([
                    'error' => 'Gagal parsing JSON dari AI',
                    'raw_text' => $cleanText,
                    'json_error' => json_last_error_msg()
                ], 500);
            }

        } catch (\Exception $e) {
            Log::error('Exception in getRecommendation:', ['error' => $e->getMessage()]);
            return response()->json(['error' => 'Terjadi kesalahan sistem: ' . $e->getMessage()], 500);
        }
    }
}