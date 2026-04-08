<x-admin-layout>
    <h1 class="text-2xl font-bold mb-4">Tambah Prestasi</h1>

    @if ($errors->any())
    <div class="bg-red-100 text-red-700 p-3 rounded mb-4">
        <ul class="list-disc pl-5">
            @foreach ($errors->all() as $err)
            <li>{{ $err }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <form action="{{ route('admin.prestasi.store') }}" method="POST" enctype="multipart/form-data"
        class="space-y-4 bg-white p-6 rounded shadow">
        @csrf

        <div>
            <label class="block mb-1">Nama</label>
            <input type="text" name="nama" value="{{ old('nama') }}" class="w-full border rounded p-2" required
                maxlength="50">
        </div>

        <div>
            <label class="block mb-1">Subjudul</label>
            <input type="text" name="subjudul" value="{{ old('subjudul') }}" class="w-full border rounded p-2" required
                maxlength="100">
        </div>

        <div>
            <label class="block mb-1">Gambar</label>
            <input type="file" name="gambar" class="border rounded p-2 w-full" accept="image/*" required>
        </div>

        <div class="flex space-x-4">
            <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
                <i class="fas fa-save mr-2"></i>Simpan
            </button>
            <a href="{{ route('admin.prestasi.index') }}"
                class="bg-gray-600 text-white px-4 py-2 rounded hover:bg-gray-700">
                <i class="fas fa-arrow-left mr-2"></i>Kembali
            </a>
        </div>
    </form>
</x-admin-layout>
