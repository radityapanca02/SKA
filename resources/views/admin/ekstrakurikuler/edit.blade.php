<x-admin-layout>
    <h1 class="text-xl sm:text-2xl font-bold mb-4">Edit Ekstrakurikuler</h1>

    @if ($errors->any())
    <div class="bg-red-100 text-red-700 p-3 rounded mb-4 text-sm">
        <ul class="list-disc pl-5">
            @foreach ($errors->all() as $err)
            <li>{{ $err }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <form action="{{ route('admin.ekskul.update', $ekskul->id) }}" method="POST" enctype="multipart/form-data"
        class="space-y-4 bg-white p-4 sm:p-6 rounded shadow">
        @csrf
        @method('PUT')

        <div>
            <label class="block mb-1 text-sm font-medium">Judul</label>
            <input type="text" name="title" value="{{ old('title', $ekskul->title) }}" class="w-full border rounded p-2 text-sm"
                required maxlength="255">
        </div>

        <div>
            <label class="block mb-1 text-sm font-medium">Deskripsi</label>
            <textarea name="desc" rows="3 sm:rows-4" class="w-full border rounded p-2 text-sm" required>{{ old('desc', $ekskul->desc) }}</textarea>
        </div>

        <div>
            <label class="block mb-1 text-sm font-medium">Gambar saat ini</label>
            <div class="mb-2">
                <img src="{{ $ekskul->image && $ekskul->image !== 'default.svg' ? asset('storage/' . $ekskul->image) : 'https://placehold.co/50x50' }}"
                    class="h-16 sm:h-24 rounded" alt="">
            </div>
            <input type="file" name="image" class="border rounded p-2 w-full text-sm" accept="image/*">
        </div>

        <div class="flex flex-col sm:flex-row space-y-2 sm:space-y-0 sm:space-x-4">
            <button type="submit" class="bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700 text-sm">
                <i class="fas fa-save mr-2"></i>Update
            </button>
            <a href="{{ route('admin.ekskul.index') }}" class="bg-gray-600 text-white px-4 py-2 rounded hover:bg-gray-700 text-sm text-center">
                <i class="fas fa-arrow-left mr-2"></i>Kembali
            </a>
        </div>
    </form>
</x-admin-layout>
