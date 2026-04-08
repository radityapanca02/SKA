<x-admin-layout>
    <h1 class="text-2xl font-bold mb-4">Edit Ekstrakurikuler</h1>

    @if ($errors->any())
    <div class="bg-red-100 text-red-700 p-3 rounded mb-4">
        <ul class="list-disc pl-5">
            @foreach ($errors->all() as $err)
            <li>{{ $err }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <form action="{{ route('admin.ekskul.update', $ekskul->id) }}" method="POST" enctype="multipart/form-data"
        class="space-y-4 bg-white p-6 rounded shadow">
        @csrf
        @method('PUT')

        <div>
            <label class="block mb-1">Judul</label>
            <input type="text" name="title" value="{{ old('title', $ekskul->title) }}" class="w-full border rounded p-2"
                required maxlength="255">
        </div>

        <div>
            <label class="block mb-1">Deskripsi</label>
            <textarea name="desc" rows="4" class="w-full border rounded p-2" required>{{ old('desc', $ekskul->desc) }}</textarea>
        </div>

        <div>
            <label class="block mb-1">Gambar saat ini</label>
            <div class="mb-2">
                <img src="{{ $ekskul->image && $ekskul->image !== 'default.svg' ? asset('storage/' . $ekskul->image) : $assetBase . '/images/default.svg' }}"
                    class="h-24 rounded" alt="">
            </div>
            <input type="file" name="image" class="border rounded p-2 w-full" accept="image/*">
        </div>

        <button type="submit" class="bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700">Update</button>
    </form>
</x-admin-layout>
