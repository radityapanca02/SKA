<x-admin-layout>
    <h1 class="text-xl sm:text-2xl font-bold mb-4">Edit Berita</h1>

    @if ($errors->any())
    <div class="bg-red-100 text-red-700 p-3 rounded mb-4 text-sm">
        <ul class="list-disc pl-5">
            @foreach ($errors->all() as $err)
            <li>{{ $err }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <form action="{{ route('admin.berita.update', $berita->id) }}" method="POST" enctype="multipart/form-data"
        class="space-y-4 bg-white p-4 sm:p-6 rounded shadow">
        @csrf
        @method('PUT')

        <div>
            <label class="block mb-1 text-sm font-medium">Judul</label>
            <input type="text" name="title" value="{{ old('title', $berita->title) }}" class="w-full border rounded p-2 text-sm"
                required>
        </div>

        <div>
            <label class="block mb-1 text-sm font-medium">Deskripsi</label>
            <textarea name="deskripsi" class="w-full border rounded p-2 text-sm" maxlength="175"
                required>{{ old('deskripsi', $berita->deskripsi) }}</textarea>
        </div>

        <div>
            <label class="block mb-1 text-sm font-medium">Konten (Content)</label>
            <textarea name="content" rows="4 sm:rows-6" class="w-full border rounded p-2 text-sm"
                required>{{ old('content', $berita->content) }}</textarea>
        </div>

        <div>
            <label class="block mb-1 text-sm font-medium">Kategori</label>
            <select name="type" class="border rounded p-2 w-full text-sm" required>
                @foreach(['PRESTASI','KEGIATAN','PENGUMUMAN','ACARA'] as $t)
                <option value="{{ $t }}" @selected($berita->type == $t)>{{ $t }}</option>
                @endforeach
            </select>
        </div>

        <div>
            <label class="block mb-1 text-sm font-medium">Gambar saat ini</label>
            <div class="mb-2">
                <img src="{{ $berita->gambar && $berita->gambar !== 'default.svg' ? asset('storage/' . $berita->gambar) : 'https://placehold.co/50x50' }}"
                    class="h-16 sm:h-24 rounded" alt="">
            </div>
            <input type="file" name="gambar" class="border rounded p-2 w-full text-sm" accept="image/*">
        </div>

        <div class="flex flex-col sm:flex-row space-y-2 sm:space-y-0 sm:space-x-4">
            <button type="submit" class="bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700 text-sm">
                <i class="fas fa-save mr-2"></i>Update
            </button>
            <a href="{{ route('admin.berita.index') }}" class="bg-gray-600 text-white px-4 py-2 rounded hover:bg-gray-700 text-sm text-center">
                <i class="fas fa-arrow-left mr-2"></i>Kembali
            </a>
        </div>
    </form>
</x-admin-layout>
