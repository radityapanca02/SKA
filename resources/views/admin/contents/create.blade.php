@extends('admin.layout')
@section('title', 'Tambah Konten')

@section('content')
<div class="p-4 sm:p-6 lg:p-8">
    <!-- Header Section -->
    <div class="mb-6 sm:mb-8">
        <div class="flex justify-center items-center gap-4">
            <div class="w-12 h-12 sm:w-14 sm:h-14 bg-gradient-to-br from-blue-500 to-cyan-500 rounded-2xl flex items-center justify-center shadow-lg">
                <i class="fas fa-plus text-white text-lg sm:text-xl"></i>
            </div>
            <div>
                <h1 class="text-2xl sm:text-3xl lg:text-4xl font-bold text-gray-800">Tambah Konten Baru</h1>
                <p class="text-gray-600 text-sm sm:text-base mt-1">Buat konten menarik untuk website</p>
            </div>
        </div>
    </div>

    <!-- Form Section -->
    <div class="max-w-2xl mx-auto">
        <div class="bg-white/80 backdrop-blur-lg rounded-2xl sm:rounded-3xl shadow-lg sm:shadow-xl border border-gray-200/50 overflow-hidden">
            <!-- Form Header -->
            <div class="bg-gradient-to-r from-blue-50 to-cyan-50/80 px-6 py-4 border-b border-gray-200/60">
                <h3 class="font-semibold text-gray-900 flex items-center gap-2">
                    <i class="fas fa-file-alt text-blue-500"></i>
                    Informasi Konten
                </h3>
                <p class="text-sm text-gray-600 mt-1">Isi form berikut untuk membuat konten baru</p>
            </div>

            <!-- Form Content -->
            <form action="{{ route('admin.contents.store') }}" method="POST" enctype="multipart/form-data" class="p-6 sm:p-8">
                @csrf
                
                <div class="space-y-6">
                    <!-- Judul Field -->
                    <div class="group">
                        <label for="title" class="flex items-center gap-2 text-sm font-medium text-gray-700 mb-2">
                            <i class="fas fa-heading text-blue-500 text-xs"></i>
                            Judul Konten
                            <span class="text-red-500">*</span>
                        </label>
                        <div class="relative">
                            <input type="text" 
                                   name="title" 
                                   id="title" 
                                   required
                                   class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all duration-200 bg-white/50 backdrop-blur-sm group-hover:bg-white/80"
                                   placeholder="Masukkan judul konten yang menarik">
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
                                      placeholder="Tulis isi konten di sini..."></textarea>
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
                            <span class="text-red-500">*</span>
                        </label>
                        <div class="relative">
                            <input type="text" 
                                   name="credit" 
                                   id="credit" 
                                   required
                                   class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all duration-200 bg-white/50 backdrop-blur-sm group-hover:bg-white/80"
                                   placeholder="Nama penulis konten">
                            <div class="absolute inset-y-0 right-0 flex items-center pr-3">
                                <i class="fas fa-user-edit text-gray-400 group-focus-within:text-blue-500"></i>
                            </div>
                        </div>
                    </div>

                    <!-- Folder Field -->
                    <div class="group">
                        <label for="folder" class="flex items-center gap-2 text-sm font-medium text-gray-700 mb-2">
                            <i class="fas fa-folder text-blue-500 text-xs"></i>
                            Kategori
                        </label>
                        <div class="relative">
                            <select name="folder" 
                                    id="folder" 
                                    class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all duration-200 bg-white/50 backdrop-blur-sm group-hover:bg-white/80 appearance-none">
                                <option value="general">General</option>
                                <option value="alumni">Alumni</option>
                                <option value="berita">Berita</option>
                                <option value="kegiatan">Kegiatan</option>
                                <option value="ssb">SSB</option>
                                <option value="ekstrakulikuler">Ekstrakulikuler</option>
                                <option value="prestasi">Prestasi</option>
                                <option value="prestasi2">Prestasi Card2</option>
                                <option value="kepsek">Foto Kepsek</option>
                            </select>
                            <div class="absolute inset-y-0 right-0 flex items-center pr-3">
                                <i class="fas fa-chevron-down text-gray-400 group-focus-within:text-blue-500"></i>
                            </div>
                        </div>
                    </div>

                    <!-- Gambar Field -->
                    <div class="group">
                        <label for="image" class="flex items-center gap-2 text-sm font-medium text-gray-700 mb-2">
                            <i class="fas fa-image text-blue-500 text-xs"></i>
                            Gambar
                            <span class="text-red-500">*</span>
                        </label>
                        <div class="relative">
                            <input type="file" 
                                   name="image[]" 
                                   id="image"
                                   multiple
                                   required
                                   class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all duration-200 bg-white/50 backdrop-blur-sm group-hover:bg-white/80 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100">
                            <div class="absolute inset-y-0 right-0 flex items-center pr-3">
                                <i class="fas fa-upload text-gray-400 group-focus-within:text-blue-500"></i>
                            </div>
                        </div>
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
                        Simpan Konten
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
.group:focus-within .fa-heading,
.group:focus-within .fa-align-left,
.group:focus-within .fa-user-edit,
.group:focus-within .fa-folder,
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
    const fileInput = document.querySelector('input[name="image[]"]');
    const folderPreview = document.getElementById('folderPreview');
    const uploadTypePreview = document.getElementById('uploadTypePreview');
    const multipleUploadInfo = document.getElementById('multipleUploadInfo');

    function updateFolderPreview() {
        const selectedFolder = folderSelect.value;
        const folderNames = {
            'general': 'General',
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
        if (selectedFolder === 'ssb' || selectedFolder === 'kegiatan') {
            uploadTypePreview.textContent = 'Multiple image upload available';
            multipleUploadInfo.innerHTML = '<i class="fas fa-check text-green-500 text-xs"></i><span>Multiple upload tersedia untuk <strong>SSB & Kegiatan</strong></span>';
        } else {
            uploadTypePreview.textContent = 'Single image upload';
            multipleUploadInfo.innerHTML = '<i class="fas fa-check text-green-500 text-xs"></i><span>Single upload untuk kategori lainnya</span>';
        }
    }

    folderSelect.addEventListener('change', function() {
        if (this.value === 'ssb' || this.value === 'kegiatan') {
            fileInput.setAttribute('multiple', true);
        } else {
            fileInput.removeAttribute('multiple');
        }
        updateFolderPreview();
    });
    updateFolderPreview();
});
</script>
@endsection