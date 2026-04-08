<x-admin-layout>
    <h1 class="text-2xl font-bold mb-4">Edit Alumni</h1>

    @if ($errors->any())
    <div class="bg-red-100 text-red-700 p-3 rounded mb-4">
        <ul class="list-disc pl-5">
            @foreach ($errors->all() as $err)
            <li>{{ $err }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <form action="{{ route('admin.alumni.update', $alumnus->id) }}" method="POST" enctype="multipart/form-data"
        class="space-y-4 bg-white p-6 rounded shadow">
        @csrf
        @method('PUT')

        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <div>
                <label class="block mb-1">Nama Lengkap</label>
                <input type="text" name="name" value="{{ old('name', $alumnus->name) }}" class="w-full border rounded p-2" required maxlength="100">
            </div>

            <div>
                <label class="block mb-1">Tahun Kelulusan</label>
                <input type="text" name="graduation" value="{{ old('graduation', $alumnus->graduation) }}" class="w-full border rounded p-2" required maxlength="50" placeholder="Alumni TP 2016">
            </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <div>
                <label class="block mb-1">Posisi/Jabatan</label>
                <input type="text" name="position" value="{{ old('position', $alumnus->position) }}" class="w-full border rounded p-2" required maxlength="100">
            </div>

            <div>
                <label class="block mb-1">Perusahaan</label>
                <input type="text" name="company" value="{{ old('company', $alumnus->company) }}" class="w-full border rounded p-2" required maxlength="100">
            </div>
        </div>

        <div>
            <label class="block mb-1">Deskripsi</label>
            <textarea name="description" rows="3" class="w-full border rounded p-2" required>{{ old('description', $alumnus->description) }}</textarea>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <div>
                <label class="block mb-1">Background Color</label>
                <select name="bg_color" class="w-full border rounded p-2" required>
                    <option value="from-[#2ECC71] to-[#27AE60]" @selected(old('bg_color', $alumnus->bg_color) == 'from-[#2ECC71] to-[#27AE60]')>Hijau</option>
                    <option value="from-[#3498DB] to-[#2980B9]" @selected(old('bg_color', $alumnus->bg_color) == 'from-[#3498DB] to-[#2980B9]')>Biru</option>
                    <option value="from-[#9B59B6] to-[#8E44AD]" @selected(old('bg_color', $alumnus->bg_color) == 'from-[#9B59B6] to-[#8E44AD]')>Ungu</option>
                    <option value="from-[#E74C3C] to-[#C0392B]" @selected(old('bg_color', $alumnus->bg_color) == 'from-[#E74C3C] to-[#C0392B]')>Merah</option>
                    <option value="from-[#F39C12] to-[#D35400]" @selected(old('bg_color', $alumnus->bg_color) == 'from-[#F39C12] to-[#D35400]')>Oranye</option>
                </select>
            </div>

            <div>
                <label class="block mb-1">Foto Saat Ini</label>
                <div class="mb-2">
                    <img src="{{ $alumnus->image && $alumnus->image !== 'default.svg' ? asset('storage/' . $alumnus->image) : $assetBase . '/images/default.svg' }}"
                        class="h-24 rounded" alt="">
                </div>
                <input type="file" name="image" class="border rounded p-2 w-full" accept="image/*">
            </div>
        </div>

        <div>
            <label class="block mb-1">Pencapaian (satu per baris)</label>
            <textarea name="achievements" rows="3" class="w-full border rounded p-2" placeholder="Employee of the Year 2020&#10;Peningkatan Produktivitas 35%">
@php
    // Handle achievements dengan aman
    $achievementsText = '';

    if (is_array($alumnus->achievements) && !empty($alumnus->achievements)) {
        $achievementsText = implode("\n", $alumnus->achievements);
    } elseif (is_string($alumnus->achievements)) {
        // Jika masih string JSON, decode dulu
        $decoded = json_decode($alumnus->achievements, true);
        if (is_array($decoded) && !empty($decoded)) {
            $achievementsText = implode("\n", $decoded);
        } else {
            $achievementsText = $alumnus->achievements;
        }
    }

    echo old('achievements', $achievementsText);
@endphp
</textarea>
            <p class="text-sm text-gray-500 mt-1">Masukkan setiap pencapaian dalam baris terpisah</p>
        </div>

        <button type="submit" class="bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700">Update</button>
    </form>
</x-admin-layout>
