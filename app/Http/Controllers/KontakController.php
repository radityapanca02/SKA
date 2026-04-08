<?php

namespace App\Http\Controllers;

use App\Mail\KontakMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\PesanKontak;
use Illuminate\Support\Facades\Validator;

class KontakController extends Controller
{
    public function index()
    {
        return view('kontak');
    }

    public function kirim(Request $request)
    {
        // Validasi input
        $validator = Validator::make($request->all(), [
            'nama' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'subjek' => 'required|string|max:255',
            'pesan' => 'required|string|min:10'
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        try {
            $dataPesan = [
                'nama' => $request->nama,
                'email' => $request->email,
                'subjek' => $request->subjek,
                'pesan' => $request->pesan,
                'waktu' => now()->format('d F Y H:i:s')
            ];

            Mail::to('smkpgri3malangg@gmail.com')
                ->send(new KontakMail($dataPesan));

            return redirect()->back()
                ->with('success', 'Pesan Anda telah berhasil dikirim!');

        } catch (\Exception $e) {
            \Log::error('Email error: ' . $e->getMessage());
            
            return redirect()->back()
                ->with('error', 'Maaf, gagal mengirim pesan: ' . $e->getMessage())
                ->withInput();
        }
    }
}