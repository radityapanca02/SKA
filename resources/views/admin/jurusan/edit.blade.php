<x-admin-layout>
    <h1 class="text-xl sm:text-2xl font-bold mb-4">Edit Jurusan</h1>

    @if ($errors->any())
    <div class="bg-red-100 text-red-700 p-3 rounded mb-4 text-sm">
        <ul class="list-disc pl-5">
            @foreach ($errors->all() as $err)
            <li>{{ $err }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <form action="{{ route('admin.jurusan.update', $jurusan->id) }}" method="POST" enctype="multipart/form-data"
        class="space-y-4 bg-white p-4 sm:p-6 rounded shadow">
        @csrf
        @method('PUT')

        <div>
            <label class="block mb-1 text-sm font-medium">Nama Jurusan</label>
            <input type="text" name="jurusan" value="{{ old('jurusan', $jurusan->jurusan) }}"
                class="w-full border rounded p-2 text-sm" required maxlength="100">
        </div>

        <div>
            <label class="block mb-1 text-sm font-medium">Departemen</label>
            <select name="departemen" class="w-full border rounded p-2 text-sm" required>
                <option value="OTOMOTIF" {{ old('departemen', $jurusan->departemen) == 'OTOMOTIF' ? 'selected' : '' }}>
                    OTOMOTIF</option>
                <option value="TIK" {{ old('departemen', $jurusan->departemen) == 'TIK' ? 'selected' : '' }}>TIK
                </option>
                <option value="ELEKTRO" {{ old('departemen', $jurusan->departemen) == 'ELEKTRO' ? 'selected' : '' }}>
                    ELEKTRO</option>
                <option value="PEMESINAN"
                    {{ old('departemen', $jurusan->departemen) == 'PEMESINAN' ? 'selected' : '' }}>PEMESINAN</option>
            </select>
        </div>

        <div>
            <label class="block mb-1 text-sm font-medium">Deskripsi</label>
            <textarea name="deskripsi"
                class="w-full border rounded p-2 h-24 sm:h-28 text-sm" required maxlength="500">{{ old('deskripsi', html_entity_decode($jurusan->deskripsi)) }}</textarea>
        </div>

        <div>
            <label class="block mb-1 text-sm font-medium">Gambar saat ini</label>
            <div class="mb-2">
                <img src="{{ $jurusan->gambar && $jurusan->gambar !== 'default.svg' ? asset('storage/' . $jurusan->gambar) : 'https://placehold.co/50x50' }}"
                    class="h-16 sm:h-24 rounded" alt="{{ $jurusan->jurusan }}">
            </div>
            <input type="file" name="gambar" class="border rounded p-2 w-full text-sm" accept="image/*">
        </div>

        <div class="flex flex-col sm:flex-row space-y-2 sm:space-y-0 sm:space-x-4">
            <button type="submit" class="bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700 text-sm">
                <i class="fas fa-save mr-2"></i>Update
            </button>
            <a href="{{ route('admin.jurusan.index') }}"
                class="bg-gray-500 text-white px-4 py-2 rounded hover:bg-gray-600 text-sm text-center">Kembali</a>
        </div>
    </form>
</x-admin-layout>
