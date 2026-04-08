<x-admin-layout>
    <h1 class="text-2xl font-bold mb-4">Edit Jurusan</h1>

    @if ($errors->any())
    <div class="bg-red-100 text-red-700 p-3 rounded mb-4">
        <ul class="list-disc pl-5">
            @foreach ($errors->all() as $err)
            <li>{{ $err }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <form action="{{ route('admin.jurusan.update', $jurusan->id) }}" method="POST" enctype="multipart/form-data"
        class="space-y-4 bg-white p-6 rounded shadow">
        @csrf
        @method('PUT')

        <div>
            <label class="block mb-1">Nama Jurusan</label>
            <input type="text" name="jurusan" value="{{ old('jurusan', $jurusan->jurusan) }}"
                class="w-full border rounded p-2" required maxlength="100">
        </div>

        <div>
            <label class="block mb-1">Departemen</label>
            <select name="departemen" class="w-full border rounded p-2" required>
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
            <label class="block mb-1">Deskripsi</label>
            <textarea name="deskripsi"
                class="w-full border rounded p-2 h-28" required maxlength="500">{{ old('deskripsi', html_entity_decode($jurusan->deskripsi)) }}</textarea>
        </div>

        <div>
            <label class="block mb-1">Gambar saat ini</label>
            <div class="mb-2">
                <img src="{{ $jurusan->gambar && $jurusan->gambar !== 'default.svg' ? asset('storage/' . $jurusan->gambar) : $assetBase . '/images/default.svg' }}"
                    class="h-24 rounded" alt="{{ $jurusan->jurusan }}">
            </div>
            <input type="file" name="gambar" class="border rounded p-2 w-full" accept="image/*">
        </div>

        <button type="submit" class="bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700">Update</button>
        <a href="{{ route('admin.jurusan.index') }}"
            class="bg-gray-500 text-white px-4 py-2 rounded hover:bg-gray-600 ml-2">Kembali</a>
    </form>
</x-admin-layout>
