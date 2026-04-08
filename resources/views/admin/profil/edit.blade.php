<x-admin-layout>
    <h1 class="text-2xl font-bold mb-4">Edit Profil Sekolah</h1>

    @if ($errors->any())
    <div class="bg-red-100 text-red-700 p-3 rounded mb-4">
        <ul class="list-disc pl-5">
            @foreach ($errors->all() as $err)
            <li>{{ $err }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <div class="bg-yellow-100 text-yellow-800 p-3 rounded mb-4">
        ⚠️ Hanya bisa upload gambar kurang dari dari 3072 KB
    </div>

    <form action="{{ route('admin.profil.update', $profil->id) }}" method="POST" enctype="multipart/form-data"
        class="space-y-6 bg-white p-6 rounded shadow">
        @csrf
        @method('PUT')

        <!-- Hero Section -->
        <div class="border-b pb-6">
            <h2 class="text-lg font-semibold mb-4 text-gray-700">Hero Section</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div>
                    <label class="block mb-1 font-medium">Hero Image</label>
                    <div class="mb-2">
                        <img src="{{ $profil->heroImage && $profil->heroImage !== 'default.svg' ? asset('storage/' . $profil->heroImage) : $assetBase . '/images/default.svg' }}"
                            class="h-32 rounded" alt="Current Hero Image">
                    </div>
                    <input type="file" name="heroImage" class="border rounded p-2 w-full" accept="image/*">
                </div>
                <div>
                    <label class="block mb-1 font-medium">Hero Title</label>
                    <input type="text" name="heroTitle" value="{{ old('heroTitle', $profil->heroTitle) }}"
                        class="w-full border rounded p-2" required maxlength="30">
                </div>
            </div>
        </div>

        <!-- Profil Section -->
        <div class="border-b pb-6">
            <h2 class="text-lg font-semibold mb-4 text-gray-700">Profil Section</h2>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-4">
                <div>
                    <label class="block mb-1 font-medium">Profil Image 1</label>
                    <div class="mb-2">
                        <img src="{{ $profil->profilImage1 && $profil->profilImage1 !== 'default.svg' ? asset('storage/' . $profil->profilImage1) : $assetBase . '/images/default.svg' }}"
                            class="h-24 rounded" alt="Current Profil Image 1">
                    </div>
                    <input type="file" name="profilImage1" class="border rounded p-2 w-full" accept="image/*">
                </div>
                <div>
                    <label class="block mb-1 font-medium">Profil Image 2</label>
                    <div class="mb-2">
                        <img src="{{ $profil->profilImage2 && $profil->profilImage2 !== 'default.svg' ? asset('storage/' . $profil->profilImage2) : $assetBase . '/images/default.svg' }}"
                            class="h-24 rounded" alt="Current Profil Image 2">
                    </div>
                    <input type="file" name="profilImage2" class="border rounded p-2 w-full" accept="image/*">
                </div>
                <div>
                    <label class="block mb-1 font-medium">Profil Image 3</label>
                    <div class="mb-2">
                        <img src="{{ $profil->profilImage3 && $profil->profilImage3 !== 'default.svg' ? asset('storage/' . $profil->profilImage3) : $assetBase . '/images/default.svg' }}"
                            class="h-24 rounded" alt="Current Profil Image 3">
                    </div>
                    <input type="file" name="profilImage3" class="border rounded p-2 w-full" accept="image/*">
                </div>
            </div>
            <div>
                <label class="block mb-1 font-medium">Deskripsi Profil</label>
                <textarea name="profilDesc" class="w-full border rounded p-2" rows="3" required
                    maxlength="200">{{ old('profilDesc', $profil->profilDesc) }}</textarea>
            </div>
        </div>

        <!-- Visi Section -->
        <div class="border-b pb-6">
            <h2 class="text-lg font-semibold mb-4 text-gray-700">Visi Section</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div>
                    <label class="block mb-1 font-medium">Visi Image</label>
                    <div class="mb-2">
                        <img src="{{ $profil->visiImage && $profil->visiImage !== 'default.svg' ? asset('storage/' . $profil->visiImage) : $assetBase . '/images/default.svg' }}"
                            class="h-32 rounded" alt="Current Visi Image">
                    </div>
                    <input type="file" name="visiImage" class="border rounded p-2 w-full" accept="image/*">
                    <input type="text" name="visiImageName" value="{{ old('visiImageName', $profil->visiImageName) }}"
                        class="w-full border rounded p-2 mt-2" placeholder="Nama Gambar Visi" required maxlength="200">
                </div>
                <div>
                    <label class="block mb-1 font-medium">Deskripsi Visi</label>
                    <textarea name="visiDesc" class="w-full border rounded p-2" rows="3" required
                        maxlength="200">{{ old('visiDesc', $profil->visiDesc) }}</textarea>
                </div>
            </div>
        </div>

        <!-- Misi Section -->
        <div class="border-b pb-6">
            <h2 class="text-lg font-semibold mb-4 text-gray-700">Misi Section (4 Cards)</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                @foreach ($profil->misis as $index => $misi)
                <div class="border rounded-lg p-4 bg-gray-50">
                    <h3 class="font-semibold mb-3 text-gray-700">Misi Card {{ $index + 1 }}</h3>

                    <input type="hidden" name="misiId[{{ $index }}]" value="{{ $misi->id }}">

                    <div class="mb-3">
                        <label class="block mb-1 font-medium">Misi Image {{ $index + 1 }}</label>
                        <div class="mb-2">
                            <img src="{{ $misi->misiImage && $misi->misiImage !== 'default.svg' ? asset('storage/' . $misi->misiImage) : $assetBase . '/images/default.svg' }}"
                                class="h-24 rounded" alt="Current Misi Image {{ $index + 1 }}">
                        </div>
                        <input type="file" name="misiImage[{{ $index }}]" class="border rounded p-2 w-full"
                            accept="image/*">
                    </div>

                    <div class="mb-3">
                        <label class="block mb-1 font-medium">Judul Misi {{ $index + 1 }}</label>
                        <input type="text" name="misiTitle[{{ $index }}]"
                            value="{{ old('misiTitle.'.$index, $misi->misiTitle) }}" class="w-full border rounded p-2"
                            required maxlength="40">
                    </div>

                    <div class="mb-3">
                        <label class="block mb-1 font-medium">Deskripsi Misi {{ $index + 1 }}</label>
                        <textarea name="misiDesc[{{ $index }}]" class="w-full border rounded p-2" rows="2" required
                            maxlength="200">{{ old('misiDesc.'.$index, $misi->misiDesc) }}</textarea>
                    </div>

                    <div>
                        <label class="block mb-1 font-medium">Warna Misi {{ $index + 1 }}</label>
                        <select name="misiColor[{{ $index }}]" class="w-full border rounded p-2" required>
                            <option value="BLUE"
                                {{ old('misiColor.'.$index, $misi->misiColor) == 'BLUE' ? 'selected' : '' }}>BLUE
                            </option>
                            <option value="GREEN"
                                {{ old('misiColor.'.$index, $misi->misiColor) == 'GREEN' ? 'selected' : '' }}>GREEN
                            </option>
                            <option value="ORANGE"
                                {{ old('misiColor.'.$index, $misi->misiColor) == 'ORANGE' ? 'selected' : '' }}>ORANGE
                            </option>
                            <option value="RED"
                                {{ old('misiColor.'.$index, $misi->misiColor) == 'RED' ? 'selected' : '' }}>RED</option>
                        </select>
                    </div>
                </div>
                @endforeach
            </div>
        </div>

        <!-- YouTube Section -->
        <div class="pb-6">
            <h2 class="text-lg font-semibold mb-4 text-gray-700">YouTube Video</h2>
            <div>
                <label class="block mb-1 font-medium">YouTube Embed URL</label>
                <input type="url" name="youtubeSrc" value="{{ old('youtubeSrc', $profil->youtubeSrc) }}"
                    class="w-full border rounded p-2" placeholder="https://www.youtube.com/embed/..." required>
                <p class="text-sm text-gray-500 mt-1">Gunakan format embed URL: https://www.youtube.com/embed/VIDEO_ID
                </p>
            </div>
        </div>

        <div class="flex justify-end space-x-2">
            <a href="{{ route('admin.profil.index') }}"
                class="bg-gray-500 text-white px-4 py-2 rounded hover:bg-gray-600">Kembali</a>
            <button type="submit" class="bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700">Update
                Profil</button>
        </div>
    </form>
</x-admin-layout>
