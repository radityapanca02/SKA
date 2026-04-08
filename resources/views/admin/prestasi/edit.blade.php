<x-admin-layout>
    <h1 class="text-2xl font-bold mb-4">Edit Prestasi</h1>

    @if ($errors->any())
    <div class="bg-red-100 text-red-700 p-3 rounded mb-4">
        <ul class="list-disc pl-5">
            @foreach ($errors->all() as $err)
            <li>{{ $err }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <form action="{{ route('admin.prestasi.update', $prestasi->id) }}" method="POST" enctype="multipart/form-data"
        class="space-y-4 bg-white p-6 rounded shadow">
        @csrf
        @method('PUT')

        <div>
            <label class="block mb-1">Nama</label>
            <input type="text" name="nama" value="{{ old('nama', $prestasi->nama) }}" class="w-full border rounded p-2"
                required maxlength="50">
        </div>

        <div>
            <label class="block mb-1">Subjudul</label>
            <input type="text" name="subjudul" value="{{ old('subjudul', $prestasi->subjudul) }}" class="w-full border rounded p-2"
                required maxlength="100">
        </div>

        <div>
            <label class="block mb-1">Gambar saat ini</label>
            <div class="mb-2">
                <img src="{{ $prestasi->gambar && $prestasi->gambar !== 'default.svg' ? asset('storage/' . $prestasi->gambar) : $assetBase . '/images/default.svg' }}"
                    class="h-24 rounded" alt="">
            </div>
            <input type="file" name="gambar" class="border rounded p-2 w-full" accept="image/*">
        </div>

        <button type="submit" class="bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700">Update</button>
    </form>
</x-admin-layout>
