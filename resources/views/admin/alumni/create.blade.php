<x-admin-layout>
    <h1 class="text-2xl font-bold mb-4">Tambah Alumni</h1>

    @if ($errors->any())
    <div class="bg-red-100 text-red-700 p-3 rounded mb-4">
        <ul class="list-disc pl-5">
            @foreach ($errors->all() as $err)
            <li>{{ $err }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <form action="{{ route('admin.alumni.store') }}" method="POST" enctype="multipart/form-data"
        class="space-y-4 bg-white p-6 rounded shadow">
        @csrf

        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <div>
                <label class="block mb-1">Nama Lengkap</label>
                <input type="text" name="name" value="{{ old('name') }}" class="w-full border rounded p-2" required
                    maxlength="100">
            </div>

            <div>
                <label class="block mb-1">Tahun Kelulusan</label>
                <input type="text" name="graduation" value="{{ old('graduation') }}" class="w-full border rounded p-2"
                    required maxlength="50" placeholder="Alumni TP 2016">
            </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <div>
                <label class="block mb-1">Posisi/Jabatan</label>
                <input type="text" name="position" value="{{ old('position') }}" class="w-full border rounded p-2"
                    required maxlength="100">
            </div>

            <div>
                <label class="block mb-1">Perusahaan</label>
                <input type="text" name="company" value="{{ old('company') }}" class="w-full border rounded p-2"
                    required maxlength="100">
            </div>
        </div>

        <div>
            <label class="block mb-1">Deskripsi</label>
            <textarea name="description" rows="3" class="w-full border rounded p-2"
                required>{{ old('description') }}</textarea>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <div>
                <label class="block mb-1">Background Color</label>
                <select name="bg_color" class="w-full border rounded p-2" required>
                    <option value="">Pilih Warna Background</option>
                    <option value="from-[#2ECC71] to-[#27AE60]" @selected(old('bg_color')=='from-[#2ECC71] to-[#27AE60]'
                        )>Hijau</option>
                    <option value="from-[#3498DB] to-[#2980B9]" @selected(old('bg_color')=='from-[#3498DB] to-[#2980B9]'
                        )>Biru</option>
                    <option value="from-[#9B59B6] to-[#8E44AD]" @selected(old('bg_color')=='from-[#9B59B6] to-[#8E44AD]'
                        )>Ungu</option>
                    <option value="from-[#E74C3C] to-[#C0392B]" @selected(old('bg_color')=='from-[#E74C3C] to-[#C0392B]'
                        )>Merah</option>
                    <option value="from-[#F39C12] to-[#D35400]" @selected(old('bg_color')=='from-[#F39C12] to-[#D35400]'
                        )>Oranye</option>
                </select>
            </div>

            <div>
                <label class="block mb-1">Foto</label>
                <input type="file" name="image" class="border rounded p-2 w-full" accept="image/*" required>
            </div>
        </div>

        <div>
            <label class="block mb-1">Pencapaian (satu per baris)</label>
            <textarea name="achievements" rows="3" class="w-full border rounded p-2"
                placeholder="Employee of the Year 2020&#10;Peningkatan Produktivitas 35%">{{ old('achievements') }}</textarea>
            <p class="text-sm text-gray-500 mt-1">Masukkan setiap pencapaian dalam baris terpisah</p>
        </div>

        <div class="flex space-x-4">
            <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
                <i class="fas fa-save mr-2"></i>Simpan
            </button>
            <a href="{{ route('admin.alumni.index') }}"
                class="bg-gray-600 text-white px-4 py-2 rounded hover:bg-gray-700">
                <i class="fas fa-arrow-left mr-2"></i>Kembali
            </a>
        </div>
    </form>
</x-admin-layout>
