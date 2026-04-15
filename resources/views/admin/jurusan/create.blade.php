<x-admin-layout>
    <h1 class="text-xl sm:text-2xl font-bold mb-4">Tambah Jurusan</h1>

    @if ($errors->any())
    <div class="bg-red-100 text-red-700 p-3 rounded mb-4 text-sm">
        <ul class="list-disc pl-5">
            @foreach ($errors->all() as $err)
            <li>{{ $err }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <form action="{{ route('admin.jurusan.store') }}" method="POST" enctype="multipart/form-data"
        class="space-y-4 bg-white p-4 sm:p-6 rounded shadow">
        @csrf

        <div>
            <label class="block mb-1 text-sm font-medium">Nama Jurusan</label>
            <input type="text" name="jurusan" value="{{ old('jurusan') }}" class="w-full border rounded p-2 text-sm" required
                maxlength="100">
        </div>

        <div>
            <label class="block mb-1 text-sm font-medium">Departemen</label>
            <select name="departemen" class="w-full border rounded p-2 text-sm" required>
                <option value="">Pilih Departemen</option>
                <option value="OTOMOTIF" {{ old('departemen') == 'OTOMOTIF' ? 'selected' : '' }}>OTOMOTIF</option>
                <option value="TIK" {{ old('departemen') == 'TIK' ? 'selected' : '' }}>TIK</option>
                <option value="ELEKTRO" {{ old('departemen') == 'ELEKTRO' ? 'selected' : '' }}>ELEKTRO</option>
                <option value="PEMESINAN" {{ old('departemen') == 'PEMESINAN' ? 'selected' : '' }}>PEMESINAN</option>
            </select>
        </div>

        <div>
            <label class="block mb-1 text-sm font-medium">Deskripsi</label>
            <textarea name="deskripsi" value="{{ old('deskripsi') }}" class="w-full border rounded p-2 text-sm" required
                maxlength="500"></textarea>
        </div>

        <div>
            <label class="block mb-1 text-sm font-medium">Gambar</label>
            <input type="file" name="gambar" class="border rounded p-2 w-full text-sm" accept="image/*" required>
        </div>

        <div class="flex flex-col sm:flex-row space-y-2 sm:space-y-0 sm:space-x-4">
            <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 text-sm">
                <i class="fas fa-save mr-2"></i>Simpan
            </button>
            <a href="{{ route('admin.jurusan.index') }}" class="bg-gray-600 text-white px-4 py-2 rounded hover:bg-gray-700 text-sm text-center">
                <i class="fas fa-arrow-left mr-2"></i>Kembali
            </a>
        </div>
    </form>
</x-admin-layout>
