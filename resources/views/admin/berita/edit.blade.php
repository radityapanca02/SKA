<x-admin-layout>
    <h1 class="text-2xl font-bold mb-4">Edit Berita</h1>

    @if ($errors->any())
    <div class="bg-red-100 text-red-700 p-3 rounded mb-4">
        <ul class="list-disc pl-5">
            @foreach ($errors->all() as $err)
            <li>{{ $err }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <form action="{{ route('admin.berita.update', $berita->id) }}" method="POST" enctype="multipart/form-data"
        class="space-y-4 bg-white p-6 rounded shadow">
        @csrf
        @method('PUT')

        <div>
            <label class="block mb-1">Judul</label>
            <input type="text" name="title" value="{{ old('title', $berita->title) }}" class="w-full border rounded p-2"
                required>
        </div>

        <div>
            <label class="block mb-1">Deskripsi</label>
            <textarea name="deskripsi" class="w-full border rounded p-2" maxlength="175"
                required>{{ old('deskripsi', $berita->deskripsi) }}</textarea>
        </div>

        <div>
            <label class="block mb-1">Konten (Content)</label>
            <textarea name="content" rows="6" class="w-full border rounded p-2"
                required>{{ old('content', $berita->content) }}</textarea>
        </div>

        <div>
            <label class="block mb-1">Kategori</label>
            <select name="type" class="border rounded p-2 w-full" required>
                @foreach(['PRESTASI','KEGIATAN','PENGUMUMAN','ACARA'] as $t)
                <option value="{{ $t }}" @selected($berita->type == $t)>{{ $t }}</option>
                @endforeach
            </select>
        </div>

        <div>
            <label class="block mb-1">Gambar saat ini</label>
            <div class="mb-2">
                <img src="{{ $berita->gambar && $berita->gambar !== 'default.svg' ? asset('storage/' . $berita->gambar) : $assetBase . '/images/default.svg' }}"
                    class="h-24 rounded" alt="">
            </div>
            <input type="file" name="gambar" class="border rounded p-2 w-full" accept="image/*">
        </div>

        <button type="submit" class="bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700">Update</button>
    </form>
</x-admin-layout>
