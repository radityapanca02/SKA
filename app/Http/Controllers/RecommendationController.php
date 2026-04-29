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

        // 1. System Prompt (Berisi instruksi, aturan, dan struktur output)
        $systemPrompt = "Anda adalah AI sistem pakar perekomendasi jurusan SMK PGRI 3 MALANG.
Tugas Anda adalah merekomendasikan jurusan berdasarkan input minat siswa.

⚠️ ATURAN UTAMA:
1. HANYA balas dengan format JSON valid tanpa teks pengantar, penutup, atau markdown block.
2. Jika input berhubungan dengan hacking, cybersecurity, atau jaringan -> rujuk ke TKJ.
3. Jika input berhubungan dengan Sound/Audio -> rujuk ke TE & AV.
4. Jika input selain jurusan atau hal yang tidak relevan dengan sekolah, abaikan minat tersebut dan kembalikan JSON 'Tidak ditemukan' dan alternatif null.

** Kategori TIK: **
- RPL (Rekayasa Perangkat Lunak)(ini ya rpl, comsci, pemrograman, algoritma)
- DKV (Desain Komunikasi Visual)(ini bagian seperti desain logo, pixel, 2d/3d, digital/handdrawing)
- BP (Broadcasting dan Perfilman)(ini bagian bisa broadcasting acara/tv dan produksi perfilman)
- NIMA (Animasi)(ini yang menggunakan blender, dan animasi gitu lah)
- BDP (Bisnis Digital & Pemasaran)(ini pemasaran, nanti seperti di alfamart atau menjadi sales seperti itu)
- TKJ (Teknik Komputer dan Jaringan)(networking, cybsec, desain kabel fiber, wifi router gitu-gitu lah)

** Kategori Kelistrikan: **
- TE & AV (Teknik Elektronika & Audio Video)(ini berhubungan dengan elektronik gitu lah khususnya di audio-video)
- PB (Teknik Pembangkit Tenaga Listrik)(ini seperti di PLN gitu)
- EI (Teknik Elektronika Industri)(ini yang seperti robotika, pcb, dan arduino)
- KI (Teknik Kimia Industri)(kimia, nanti bisa ke apoteker, farmarin, dll (medis))

** Kategori Otomotif: **
- TP (Teknik Permesinan)(bagian pemesinan seperti CNC dan CADD)
- TL (Teknik Pengelasan)(ini ya ngelas, welding lah)
- TBSM (Teknik Bisnis Sepeda Motor)(ini berhubungan dengan sepeda motor maupun motor listrik)
- TKR (Teknik Kendaraan Ringan)(Ini mobil ya, kalau motor ke TBSM)
- BO (Teknik Perbaikan Body Otomotif)(Seperti berhubungan dengan body-livery kendaraan lah)

FORMAT JSON YANG DIHARAPKAN:
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
}";

        // 2. User Prompt (Hanya berisi input spesifik dari user)
        $userPrompt = "Minat saya: {$keyword}";

        try {
            // 3. Request ke Groq menggunakan pattern OpenAI
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
                'response_format' => ['type' => 'json_object'] // FITUR PRO: Memaksa model Groq mengembalikan JSON murni
            ]);

            if ($response->failed()) {
                Log::error('Groq API Error:', ['response' => $response->body()]);
                return response()->json(['error' => 'Gagal menghubungi AI service'], 500);
            }

            $result = $response->json();

            // 4. Parsing response menggunakan struktur OpenAI/Groq (choices -> message -> content)
            if (empty($result['choices'][0]['message']['content'])) {
                Log::error('Empty AI Response:', $result);
                return response()->json([
                    'error' => 'Tidak ada hasil dari Groq AI',
                    'debug' => $result
                ], 500);
            }

            $aiText = $result['choices'][0]['message']['content'];

            // 5. Pembersihan teks (Berjaga-jaga jika AI masih menyelipkan markdown ```json)
            $cleanText = preg_replace('/```(json)?|```/', '', $aiText);
            $cleanText = trim($cleanText);

            $parsed = json_decode($cleanText, true);

            // 6. Validasi dan Return JSON ke Frontend
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
