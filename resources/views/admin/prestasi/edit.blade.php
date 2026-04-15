<x-admin-layout>
    <h1 class="text-xl sm:text-2xl font-bold mb-4">Edit Prestasi</h1>

    @if ($errors->any())
    <div class="bg-red-100 text-red-700 p-3 rounded mb-4 text-sm">
        <ul class="list-disc pl-5">
            @foreach ($errors->all() as $err)
            <li>{{ $err }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <form action="{{ route('admin.prestasi.update', $prestasi->id) }}" method="POST" enctype="multipart/form-data"
        class="space-y-4 bg-white p-4 sm:p-6 rounded shadow">
        @csrf
        @method('PUT')

        <div>
            <label class="block mb-1 text-sm font-medium">Nama</label>
            <input type="text" name="nama" value="{{ old('nama', $prestasi->nama) }}" class="w-full border rounded p-2 text-sm"
                required maxlength="50">
        </div>

        <div>
            <label class="block mb-1 text-sm font-medium">Subjudul</label>
            <input type="text" name="subjudul" value="{{ old('subjudul', $prestasi->subjudul) }}" class="w-full border rounded p-2 text-sm"
                required maxlength="100">
        </div>

        <div>
            <label class="block mb-1 text-sm font-medium">Gambar saat ini</label>
            <div class="mb-2">
                <img src="{{ $prestasi->gambar && $prestasi->gambar !== 'default.svg' ? asset('storage/' . $prestasi->gambar) : 'https://placehold.co/50x50' }}"
                    class="h-16 sm:h-24 rounded" alt="">
            </div>
            <input type="file" name="gambar" class="border rounded p-2 w-full text-sm" accept="image/*">
        </div>

        <div class="flex flex-col sm:flex-row space-y-2 sm:space-y-0 sm:space-x-4">
            <button type="submit" class="bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700 text-sm">
                <i class="fas fa-save mr-2"></i>Update
            </button>
            <a href="{{ route('admin.prestasi.index') }}" class="bg-gray-600 text-white px-4 py-2 rounded hover:bg-gray-700 text-sm text-center">
                <i class="fas fa-arrow-left mr-2"></i>Kembali
            </a>
        </div>
    </form>
</x-admin-layout>
