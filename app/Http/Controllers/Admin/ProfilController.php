<?php
// app/Http/Controllers/Admin/ProfilController.php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Profil;
use App\Models\Misi;
use Illuminate\Support\Facades\Storage;

class ProfilController extends Controller
{
    public function index()
    {
        $profil = Profil::with('misis')->first();

        if (!$profil) {
            $profil = $this->createDefaultProfil();
        }

        return view('admin.profil.index', compact('profil'));
    }

    public function edit()
    {
        $profil = Profil::with('misis')->firstOrFail();
        return view('admin.profil.edit', compact('profil'));
    }

    public function update(Request $request)
    {
        $profil = Profil::with('misis')->firstOrFail();

        $request->validate([
            'heroImage' => 'nullable|image|mimes:jpg,jpeg,png,svg,webp|max:3072',
            'heroTitle' => 'required|max:30',

            'profilImage1' => 'nullable|image|mimes:jpg,jpeg,png,svg,webp|max:3072',
            'profilImage2' => 'nullable|image|mimes:jpg,jpeg,png,svg,webp|max:3072',
            'profilImage3' => 'nullable|image|mimes:jpg,jpeg,png,svg,webp|max:3072',
            'profilDesc' => 'required|max:500',

            'visiImage' => 'nullable|image|mimes:jpg,jpeg,png,svg,webp|max:3072',
            'visiImageName' => 'required|max:200',
            'visiDesc' => 'required|max:500',

            'youtubeSrc' => 'required|url',

            // Validation for misi (array)
            'misiImage.*' => 'nullable|image|mimes:jpg,jpeg,png,svg,webp|max:3072',
            'misiTitle.*' => 'required|max:40',
            'misiDesc.*' => 'required|max:500',
            'misiColor.*' => 'required|in:BLUE,GREEN,ORANGE,RED',
            'misiId.*' => 'nullable|exists:misis,id'
        ]);

        // Update main profil data
        $data = $request->only([
            'heroTitle', 'profilDesc', 'visiImageName', 'visiDesc', 'youtubeSrc'
        ]);

        // Handle file uploads for profil
        $profilImageFields = [
            'heroImage', 'profilImage1', 'profilImage2', 'profilImage3', 'visiImage'
        ];

        foreach ($profilImageFields as $field) {
            if ($request->hasFile($field)) {
                if ($profil->$field && $profil->$field !== 'default.svg') {
                    Storage::disk('public')->delete($profil->$field);
                }
                $data[$field] = $request->file($field)->store('profil', 'public');
            }
        }

        $profil->update($data);

        // Update or create misi data
        if ($request->has('misiTitle')) {
            foreach ($request->misiTitle as $index => $title) {
                $misiData = [
                    'misiTitle' => $title,
                    'misiDesc' => $request->misiDesc[$index],
                    'misiColor' => $request->misiColor[$index],
                    'order' => $index
                ];

                // Handle misi image upload
                if ($request->hasFile("misiImage.{$index}")) {
                    $misi = $profil->misis->get($index);
                    if ($misi && $misi->misiImage && $misi->misiImage !== 'default.svg') {
                        Storage::disk('public')->delete($misi->misiImage);
                    }
                    $misiData['misiImage'] = $request->file("misiImage.{$index}")->store('profil/misi', 'public');
                }

                // Update existing or create new misi
                if (isset($request->misiId[$index])) {
                    $profil->misis()->where('id', $request->misiId[$index])->update($misiData);
                } else {
                    $profil->misis()->create($misiData);
                }
            }
        }

        return redirect()->route('admin.profil.index')->with('success', 'Profil berhasil diperbarui!');
    }

    private function createDefaultProfil()
    {
        $profil = Profil::create([
            'heroImage' => 'default.svg',
            'heroTitle' => 'Selamat Datang di SMK PGRI 3 Malang',
            'profilImage1' => 'default.svg',
            'profilImage2' => 'default.svg',
            'profilImage3' => 'default.svg',
            'profilDesc' => 'SMK PGRI 3 Malang adalah sekolah kejuruan yang berkomitmen untuk menghasilkan lulusan yang kompeten dan siap kerja.',
            'visiImage' => 'default.svg',
            'visiImageName' => 'Visi Sekolah',
            'visiDesc' => 'Menjadi sekolah kejuruan unggulan yang menghasilkan lulusan berkompetensi tinggi dan berkarakter kuat.',
            'youtubeSrc' => 'https://www.youtube.com/embed/dQw4w9WgXcQ'
        ]);

        // Create default 4 misi
        $defaultMisis = [
            ['Misi Pendidikan', 'Menyelenggarakan pendidikan berkualitas dengan kurikulum relevan.', 'BLUE'],
            ['Misi Karakter', 'Membentuk karakter siswa yang berintegritas dan bertanggung jawab.', 'GREEN'],
            ['Misi Teknologi', 'Mengintegrasikan teknologi dalam proses pembelajaran.', 'ORANGE'],
            ['Misi Industri', 'Menjalin kemitraan dengan dunia industri dan dunia kerja.', 'RED']
        ];

        foreach ($defaultMisis as $index => $misi) {
            $profil->misis()->create([
                'misiImage' => 'default.svg',
                'misiTitle' => $misi[0],
                'misiDesc' => $misi[1],
                'misiColor' => $misi[2],
                'order' => $index
            ]);
        }

        return $profil;
    }
}
