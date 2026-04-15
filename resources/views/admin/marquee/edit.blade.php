{{-- resources/views/admin/marquee/edit.blade.php --}}
<x-admin-layout>
    <h1 class="text-xl sm:text-2xl font-bold mb-4">Edit Logo Marquee</h1>

    @if ($errors->any())
    <div class="bg-red-100 text-red-700 p-3 rounded mb-4 text-sm">
        <ul class="list-disc pl-5">
            @foreach ($errors->all() as $err)
            <li>{{ $err }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <form action="{{ route('admin.marquee.update', $marquee->id) }}" method="POST" enctype="multipart/form-data"
        class="space-y-4 bg-white p-4 sm:p-6 rounded shadow">
        @csrf
        @method('PUT')

        <div>
            <label class="block mb-1 font-medium text-sm">Nama Logo</label>
            <input type="text" name="nama" value="{{ old('nama', $marquee->nama) }}" class="w-full border rounded p-2 text-sm"
                required maxlength="100">
        </div>

        <div>
            <label class="block mb-1 font-medium text-sm">Gambar Saat Ini</label>
            <div class="mb-2">
                <img src="{{ asset('storage/' . $marquee->gambar) }}" class="h-12 sm:h-16 object-contain"
                    alt="{{ $marquee->nama }}">
            </div>
            <input type="file" name="gambar" class="border rounded p-2 w-full text-sm" accept="image/*">
            <p class="text-xs sm:text-sm text-gray-500 mt-1">Kosongkan jika tidak ingin mengubah gambar</p>
        </div>

        <div>
            <label class="block mb-1 font-medium text-sm">Urutan Tampil</label>
            <input type="number" name="urutan" value="{{ old('urutan', $marquee->urutan) }}"
                class="w-full border rounded p-2 text-sm" min="0">
        </div>

        <div class="flex flex-col sm:flex-row justify-end space-y-2 sm:space-y-0 sm:space-x-2">
            <a href="{{ route('admin.marquee.index') }}"
                class="bg-gray-500 text-white px-4 py-2 rounded hover:bg-gray-600 text-sm text-center">Kembali</a>
            <button type="submit" class="bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700 text-sm">Update</button>
        </div>
    </form>
</x-admin-layout>
