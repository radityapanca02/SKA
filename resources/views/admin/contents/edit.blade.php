@extends('admin.layout')
@section('title', 'Edit Konten & Asset')

@section('content')
<div class="p-4 sm:p-6 lg:p-8">
    <div class="mb-6 sm:mb-8">
        <div class="flex justify-center items-center gap-4">
            <div class="w-12 h-12 sm:w-14 sm:h-14 bg-gradient-to-br from-blue-500 to-cyan-500 rounded-2xl flex items-center justify-center shadow-lg">
                <i class="fas fa-edit text-white text-lg sm:text-xl"></i>
            </div>
            <div>
                <h1 class="text-2xl sm:text-3xl lg:text-4xl font-bold text-gray-800">Edit Konten</h1>
                <p class="text-gray-600 text-sm sm:text-base mt-1">Perbarui informasi konten dan asset</p>
            </div>
        </div>
    </div>

    <div class="max-w-2xl mx-auto">
        <div class="bg-white/80 backdrop-blur-lg rounded-2xl sm:rounded-3xl shadow-lg sm:shadow-xl border border-gray-200/50 overflow-hidden">
            <div class="bg-gradient-to-r from-blue-50 to-cyan-50/80 px-6 py-4 border-b border-gray-200/60">
                <div class="flex items-center gap-3">
                    <div class="w-10 h-10 bg-gradient-to-br from-blue-400 to-cyan-500 rounded-xl flex items-center justify-center text-white font-semibold shadow-md">
                        <i class="fas fa-folder text-white"></i>
                    </div>
                    <div>
                        <h3 class="font-semibold text-gray-900">{{ $content->title }}</h3>
                        <p class="text-sm text-gray-600 capitalize">{{ $content->folder }} • ID: {{ $content->id }}</p>
                    </div>
                </div>
            </div>

            <!-- Error Messages -->
            @if ($errors->any())
                <div class="mx-6 mt-6 p-4 bg-red-50 border border-red-200 rounded-xl">
                    <div class="flex items-center gap-2 text-red-800 mb-2">
                        <i class="fas fa-exclamation-circle text-red-500"></i>
                        <span class="font-medium">Terjadi kesalahan:</span>
                    </div>
                    <ul class="text-sm text-red-700 space-y-1">
                        @foreach ($errors->all() as $error)
                            <li class="flex items-center gap-2">
                                <i class="fas fa-circle text-[4px] text-red-500"></i>
                                {{ $error }}
                            </li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('admin.assets.update', $content->id) }}" method="POST" enctype="multipart/form-data" class="p-6 sm:p-8">
                @csrf
                @method('PUT')
                
                <div class="space-y-6">
                    <div class="group">
                        <label for="folder" class="flex items-center gap-2 text-sm font-medium text-gray-700 mb-2">
                            <i class="fas fa-folder text-blue-500 text-xs"></i>
                            Pilih Folder
                        </label>
                        <div class="relative">
                            <select name="folder" 
                                    id="folder"
                                    class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all duration-200 bg-white/50 backdrop-blur-sm group-hover:bg-white/80 appearance-none">
                                <option value="alumni" {{ $content->folder == 'alumni' ? 'selected' : '' }}>Alumni</option>
                                <option value="berita" {{ $content->folder == 'berita' ? 'selected' : '' }}>Berita</option>
                                <option value="kegiatan" {{ $content->folder == 'kegiatan' ? 'selected' : '' }}>Kegiatan</option>
                                <option value="ssb" {{ $content->folder == 'ssb' ? 'selected' : '' }}>SSB</option>
                                <option value="ekstrakulikuler" {{ $content->folder == 'ekstrakulikuler' ? 'selected' : '' }}>Ekstrakulikuler</option>
                                <option value="prestasi" {{ $content->folder == 'prestasi' ? 'selected' : '' }}>Prestasi</option>
                                <option value="prestasi2" {{ $content->folder == 'prestasi2' ? 'selected' : '' }}>Prestasi Card2</option>
                                <option value="kepsek" {{ $content->folder == 'kepsek' ? 'selected' : '' }}>Foto Kepsek</option>
                            </select>
                            <div class="absolute inset-y-0 right-0 flex items-center pr-3">
                                <i class="fas fa-chevron-down text-gray-400 group-focus-within:text-blue-500"></i>
                            </div>
                        </div>
                    </div>

                    <!-- Judul Field -->
                    <div class="group">
                        <label for="title" class="flex items-center gap-2 text-sm font-medium text-gray-700 mb-2">
                            <i class="fas fa-heading text-blue-500 text-xs"></i>
                            Judul Konten
                        </label>
                        <div class="relative">
                            <input type="text" 
                                   name="title" 
                                   id="title" 
                                   value="{{ old('title', $content->title) }}"
                                   class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all duration-200 bg-white/50 backdrop-blur-sm group-hover:bg-white/80"
                                   placeholder="Masukkan judul konten">
                            <div class="absolute inset-y-0 right-0 flex items-center pr-3">
                                <i class="fas fa-heading text-gray-400 group-focus-within:text-blue-500"></i>
                            </div>
                        </div>
                    </div>

                    <!-- Isi Konten Field -->
                    <div class="group">
                        <label for="body" class="flex items-center gap-2 text-sm font-medium text-gray-700 mb-2">
                            <i class="fas fa-align-left text-blue-500 text-xs"></i>
                            Isi Konten
                        </label>
                        <div class="relative">
                            <textarea name="body" 
                                      id="body" 
                                      rows="6"
                                      class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all duration-200 bg-white/50 backdrop-blur-sm group-hover:bg-white/80 resize-none"
                                      placeholder="Tulis isi konten di sini...">{{ old('body', $content->body) }}</textarea>
                            <div class="absolute top-3 right-3">
                                <i class="fas fa-align-left text-gray-400 group-focus-within:text-blue-500"></i>
                            </div>
                        </div>
                    </div>

                    <!-- Author Field -->
                    <div class="group">
                        <label for="credit" class="flex items-center gap-2 text-sm font-medium text-gray-700 mb-2">
                            <i class="fas fa-user-edit text-blue-500 text-xs"></i>
                            Author
                        </label>
                        <div class="relative">
                            <input type="text" 
                                   name="credit" 
                                   id="credit" 
                                   value="{{ old('credit', $content->credit) }}"
                                   class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all duration-200 bg-white/50 backdrop-blur-sm group-hover:bg-white/80"
                                   placeholder="Nama penulis konten">
                            <div class="absolute inset-y-0 right-0 flex items-center pr-3">
                                <i class="fas fa-user-edit text-gray-400 group-focus-within:text-blue-500"></i>
                            </div>
                        </div>
                    </div>

                    <!-- Gambar Field -->
                    <div class="group">
                        <label class="flex items-center gap-2 text-sm font-medium text-gray-700 mb-2">
                            <i class="fas fa-image text-blue-500 text-xs"></i>
                            Gambar
                        </label>

                        @if ($content->folder === 'ssb')
                            <!-- SSB Multiple Images -->
                            <div class="space-y-4">
                                <div class="relative">
                                    <input type="file" 
                                           name="images[]" 
                                           multiple
                                           class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all duration-200 bg-white/50 backdrop-blur-sm group-hover:bg-white/80 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100">
                                    <div class="absolute inset-y-0 right-0 flex items-center pr-3">
                                        <i class="fas fa-upload text-gray-400 group-focus-within:text-blue-500"></i>
                                    </div>
                                </div>
                                
                                <!-- Upload Info -->
                                <div class="p-3 bg-blue-50 rounded-lg border border-blue-200">
                                    <p class="text-xs font-medium text-blue-800 flex items-center gap-2 mb-1">
                                        <i class="fas fa-info-circle text-blue-500"></i>
                                        Untuk folder SSB:
                                    </p>
                                    <p class="text-xs text-blue-700">Kamu dapat mengunggah lebih dari 3 gambar</p>
                                </div>

                                <!-- Existing SSB Images -->
                                @php
                                    $ssbImages = json_decode($content->image, true) ?? [];
                                @endphp

                                @if (!empty($ssbImages))
                                    <div>
                                        <p class="text-sm font-medium text-gray-700 mb-2">Gambar Saat Ini:</p>
                                        <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 gap-3">
                                            @foreach ($ssbImages as $img)
                                                <div class="relative group/image">
                                                    <img src="{{ asset('assets/ssb/' . $img) }}" 
                                                         class="w-full h-20 object-cover rounded-xl shadow-sm border border-gray-200">
                                                    <div class="absolute inset-0 bg-black bg-opacity-0 group-hover/image:bg-opacity-20 rounded-xl transition-all duration-200 flex items-center justify-center">
                                                        <span class="text-white text-xs opacity-0 group-hover/image:opacity-100 transition-opacity duration-200">Existing</span>
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                @endif
                            </div>
                        @else
                            <!-- Single Image Upload -->
                            <div class="space-y-4">
                                <div class="flex flex-col sm:flex-row items-start sm:items-center gap-4">
                                    @if ($content->image)
                                        <div class="flex-shrink-0">
                                            <div class="relative group/image">
                                                <img src="{{ asset('assets/' . $content->folder . '/' . $content->image) }}" 
                                                     alt="Preview"
                                                     class="w-24 h-24 object-cover rounded-xl shadow-sm border border-gray-200">
                                                <div class="absolute inset-0 bg-black bg-opacity-0 group-hover/image:bg-opacity-20 rounded-xl transition-all duration-200 flex items-center justify-center">
                                                    <span class="text-white text-xs opacity-0 group-hover/image:opacity-100 transition-opacity duration-200">Current</span>
                                                </div>
                                            </div>
                                        </div>
                                    @endif
                                    <div class="flex-1">
                                        <div class="relative">
                                            <input type="file" 
                                                   name="image"
                                                   class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all duration-200 bg-white/50 backdrop-blur-sm group-hover:bg-white/80 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100">
                                            <div class="absolute inset-y-0 right-0 flex items-center pr-3">
                                                <i class="fas fa-upload text-gray-400 group-focus-within:text-blue-500"></i>
                                            </div>
                                        </div>
                                        @if ($content->image)
                                            <p class="text-xs text-gray-500 mt-2">
                                                Biarkan kosong jika tidak ingin mengubah gambar
                                            </p>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        @endif
                    </div>
                </div>

                <!-- Action Buttons -->
                <div class="flex flex-col sm:flex-row gap-3 sm:gap-4 pt-6 mt-8 border-t border-gray-200/60">
                    <a href="{{ route('admin.contents.index') }}" 
                       class="flex-1 inline-flex items-center justify-center gap-2 px-6 py-3 text-gray-700 bg-gray-100 hover:bg-gray-200 rounded-xl font-medium transition-all duration-200 group">
                        <i class="fas fa-times text-gray-500 group-hover:text-gray-700"></i>
                        Batal
                    </a>
                    <button type="submit" 
                            class="flex-1 inline-flex items-center justify-center gap-2 px-6 py-3 bg-gradient-to-r from-blue-500 to-cyan-500 hover:from-blue-600 hover:to-cyan-600 text-white rounded-xl font-medium shadow-lg hover:shadow-xl transition-all duration-200 group">
                        <i class="fas fa-save group-hover:scale-110 transition-transform"></i>
                        Simpan Perubahan
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<style>
.group:focus-within label {
    color: #3b82f6;
}
.group:focus-within .fa-folder,
.group:focus-within .fa-heading,
.group:focus-within .fa-align-left,
.group:focus-within .fa-user-edit,
.group:focus-within .fa-image,
.group:focus-within .fa-eye,
.group:focus-within .fa-chevron-down,
.group:focus-within .fa-upload {
    color: #3b82f6;
}
</style>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const folderSelect = document.getElementById('folder');
    const folderPreview = document.getElementById('folderPreview');
    const uploadTypePreview = document.getElementById('uploadTypePreview');

    function updateFolderPreview() {
        const selectedFolder = folderSelect.value;
        const folderNames = {
            'alumni': 'Alumni',
            'berita': 'Berita',
            'kegiatan': 'Kegiatan',
            'ssb': 'SSB',
            'ekstrakulikuler': 'Ekstrakulikuler',
            'prestasi': 'Prestasi',
            'prestasi2': 'Prestasi Card2'
        };
        
        folderPreview.textContent = folderNames[selectedFolder];
        
        // Update upload type info
        if (selectedFolder === 'ssb') {
            uploadTypePreview.textContent = 'Multiple image upload';
        } else {
            uploadTypePreview.textContent = 'Single image upload';
        }
    }

    folderSelect.addEventListener('change', updateFolderPreview);
});
</script>
@endsection