@extends('admin.layout')
@section('title', 'Daftar Konten')

@section('content')
<div class="p-4 sm:p-6 lg:p-8">
    <!-- Header Section -->
    <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4 mb-6 sm:mb-8">
        <div>
            <h2 class="text-2xl sm:text-3xl lg:text-4xl font-bold text-gray-800 mb-2">Daftar Konten</h2>
            <p class="text-gray-600 text-sm sm:text-base">Kelola semua konten website dengan mudah</p>
        </div>
        <a href="{{ route('admin.contents.create') }}"
           class="bg-gradient-to-r from-blue-500 to-cyan-500 hover:from-blue-600 hover:to-cyan-600 text-white px-4 sm:px-6 py-2 sm:py-3 rounded-xl sm:rounded-2xl shadow-lg hover:shadow-xl transition-all duration-300 flex items-center gap-2 w-full sm:w-auto justify-center">
            <i class="fas fa-plus text-sm sm:text-base"></i>
            <span class="text-sm sm:text-base font-medium">Tambah Konten</span>
        </a>
    </div>

    <!-- Filter Section -->
    <div class="bg-white/80 backdrop-blur-lg rounded-2xl sm:rounded-3xl shadow-lg sm:shadow-xl border border-gray-200/50 p-4 sm:p-6 mb-6">
        <div class="flex flex-col sm:flex-row gap-4 sm:gap-6 items-start sm:items-end">
            <!-- Category Filter -->
            <div class="flex-1 w-full">
                <label class="flex items-center gap-2 text-sm font-medium text-gray-700 mb-2">
                    <i class="fas fa-filter text-blue-500 text-xs"></i>
                    Filter Kategori
                </label>
                <select id="categoryFilter" 
                        class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all duration-200 bg-white/50 backdrop-blur-sm">
                    <option value="">Semua Kategori</option>
                    <option value="alumni">Alumni</option>
                    <option value="berita">Berita</option>
                    <option value="kegiatan">Kegiatan</option>
                    <option value="ssb">SSB</option>
                    <option value="ekstrakulikuler">Ekstrakulikuler</option>
                    <option value="prestasi">Prestasi</option>
                    <option value="prestasi2">Prestasi Card2</option>
                </select>
            </div>

            <!-- Search Box -->
            <div class="flex-1 w-full">
                <label class="flex items-center gap-2 text-sm font-medium text-gray-700 mb-2">
                    <i class="fas fa-search text-blue-500 text-xs"></i>
                    Cari Konten
                </label>
                <div class="relative">
                    <input type="text" 
                           id="searchInput"
                           placeholder="Cari judul atau deskripsi..."
                           class="w-full px-4 py-3 pl-10 border border-gray-300 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all duration-200 bg-white/50 backdrop-blur-sm">
                    <div class="absolute inset-y-0 left-0 flex items-center pl-3">
                        <i class="fas fa-search text-gray-400"></i>
                    </div>
                </div>
            </div>

            <!-- Action Buttons -->
            <div class="flex gap-3 w-full sm:w-auto">
                <button id="applyFilter" 
                        class="flex-1 sm:flex-none inline-flex items-center justify-center gap-2 px-6 py-3 bg-gradient-to-r from-blue-500 to-cyan-500 hover:from-blue-600 hover:to-cyan-600 text-white rounded-xl font-medium transition-all duration-200">
                    <i class="fas fa-filter"></i>
                    <span class="hidden sm:inline">Terapkan</span>
                </button>
                <button id="resetFilter" 
                        class="flex-1 sm:flex-none inline-flex items-center justify-center gap-2 px-6 py-3 text-gray-700 bg-gray-100 hover:bg-gray-200 rounded-xl font-medium transition-all duration-200">
                    <i class="fas fa-redo"></i>
                    <span class="hidden sm:inline">Reset</span>
                </button>
            </div>
        </div>
    </div>

    <!-- Content Table -->
    <div class="bg-white/80 backdrop-blur-lg rounded-2xl sm:rounded-3xl shadow-lg sm:shadow-xl border border-gray-200/50 overflow-hidden">
        @if($contents->count() > 0)
            <!-- Desktop Table -->
            <div class="hidden lg:block">
                <table class="w-full">
                    <thead class="bg-gradient-to-r from-gray-50 to-gray-100/80 border-b border-gray-200">
                        <tr>
                            <th class="px-6 py-4 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">#</th>
                            <th class="px-6 py-4 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Preview</th>
                            <th class="px-6 py-4 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Judul</th>
                            <th class="px-6 py-4 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Deskripsi</th>
                            <th class="px-6 py-4 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Author</th>
                            <th class="px-6 py-4 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Kategori</th>
                            <th class="px-6 py-4 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200/60">
                        @foreach ($contents as $content)
                            <tr class="hover:bg-gray-50/80 transition-colors duration-200">
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                    @if(method_exists($contents, 'currentPage'))
                                        {{ ($contents->currentPage() - 1) * $contents->perPage() + $loop->iteration }}
                                    @else
                                        {{ $loop->iteration }}
                                    @endif
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    @if($content->image)
                                        <div class="w-16 h-16 rounded-xl overflow-hidden border border-gray-200 shadow-sm">
                                            <img src="{{ asset('assets/' . ($content->folder ? $content->folder . '/' : '') . trim(str_replace(['[', ']', '"'], '', $content->image))) }}"
                                                alt="{{ $content->title ?? 'Gambar Konten' }}" 
                                                class="w-full h-full object-cover hover:scale-105 transition-transform duration-200" />
                                        </div>
                                    @else
                                        <div class="w-16 h-16 bg-gray-100 rounded-xl flex items-center justify-center border border-gray-200">
                                            <i class="fas fa-image text-gray-400 text-lg"></i>
                                        </div>
                                    @endif
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-sm font-medium text-gray-900 max-w-xs truncate">
                                        {{ $content->title }}
                                    </div>
                                </td>
                                <td class="px-6 py-4">
                                    <div class="text-sm text-gray-600 max-w-xs">
                                        {{ Str::limit(strip_tags($content->body), 60, '...') }}
                                    </div>
                                </td>
                                <td class="px-6 py-4">
                                    <div class="text-sm text-gray-600 max-w-xs">
                                        {{ Str::limit(strip_tags($content->credit), 40, '...') }}
                                    </div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium bg-blue-100 text-blue-800 capitalize">
                                        <i class="fas fa-folder mr-1 text-xs"></i>
                                        {{ $content->folder }}
                                    </span>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="flex items-center gap-2">
                                        <a href="{{ route('admin.contents.edit', $content->id) }}" 
                                           class="inline-flex items-center gap-1 px-3 py-2 text-xs font-medium text-blue-700 bg-blue-50 hover:bg-blue-100 rounded-lg transition-colors duration-200">
                                            <i class="fas fa-edit text-xs"></i>
                                            Edit
                                        </a>
                                        <form action="{{ route('admin.contents.destroy', $content->id) }}" method="POST" class="inline" onsubmit="return confirm('Yakin hapus konten ini?')">
                                            @csrf @method('DELETE')
                                            <button type="submit" 
                                                    class="inline-flex items-center gap-1 px-3 py-2 text-xs font-medium text-red-700 bg-red-50 hover:bg-red-100 rounded-lg transition-colors duration-200">
                                                <i class="fas fa-trash text-xs"></i>
                                                Hapus
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <!-- Mobile & Tablet Cards -->
            <div class="lg:hidden p-4 sm:p-6">
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 sm:gap-6">
                    @foreach ($contents as $content)
                        <div class="bg-white rounded-xl sm:rounded-2xl shadow-md border border-gray-200/50 p-4 sm:p-6 hover:shadow-lg transition-all duration-300">
                            <div class="flex items-start gap-3 sm:gap-4">
                                <!-- Preview Image -->
                                <div class="flex-shrink-0">
                                    @if($content->image)
                                        <div class="w-16 h-16 sm:w-20 sm:h-20 rounded-xl overflow-hidden border border-gray-200 shadow-sm">
                                            <img src="{{ asset('assets/' . ($content->folder ? $content->folder . '/' : '') . trim(str_replace(['[', ']', '"'], '', $content->image))) }}"
                                                alt="{{ $content->title ?? 'Gambar Konten' }}" 
                                                class="w-full h-full object-cover" />
                                        </div>
                                    @else
                                        <div class="w-16 h-16 sm:w-20 sm:h-20 bg-gray-100 rounded-xl flex items-center justify-center border border-gray-200">
                                            <i class="fas fa-image text-gray-400 text-lg"></i>
                                        </div>
                                    @endif
                                </div>
                                
                                <!-- Content Info -->
                                <div class="flex-1 min-w-0">
                                    <div class="flex flex-col sm:flex-row sm:items-start sm:justify-between gap-2 mb-3">
                                        <div class="flex-1">
                                            <h3 class="text-sm sm:text-base font-semibold text-gray-900 line-clamp-2 mb-1">
                                                {{ $content->title }}
                                            </h3>
                                            <span class="inline-flex items-center px-2 py-1 rounded-full text-xs font-medium bg-blue-100 text-blue-800 capitalize">
                                                <i class="fas fa-folder mr-1 text-xs"></i>
                                                {{ $content->folder }}
                                            </span>
                                        </div>
                                    </div>
                                    
                                    <!-- Description -->
                                    <div class="mb-3">
                                        <p class="text-xs text-gray-600 mb-1">Deskripsi</p>
                                        <p class="text-sm text-gray-900 line-clamp-2">
                                            {{ Str::limit(strip_tags($content->body), 80, '...') }}
                                        </p>
                                    </div>
                                    
                                    <!-- Author -->
                                    <div class="mb-3">
                                        <p class="text-xs text-gray-600 mb-1">Author</p>
                                        <p class="text-sm text-gray-900">
                                            {{ Str::limit(strip_tags($content->credit), 40, '...') }}
                                        </p>
                                    </div>
                                    
                                    <!-- Actions -->
                                    <div class="flex items-center gap-2 pt-3 border-t border-gray-200/60">
                                        <a href="{{ route('admin.contents.edit', $content->id) }}" 
                                           class="flex-1 inline-flex items-center justify-center gap-1 px-3 py-2 text-xs font-medium text-blue-700 bg-blue-50 hover:bg-blue-100 rounded-lg transition-colors duration-200">
                                            <i class="fas fa-edit text-xs"></i>
                                            Edit
                                        </a>
                                        <form action="{{ route('admin.contents.destroy', $content->id) }}" method="POST" class="flex-1" onsubmit="return confirm('Yakin hapus konten ini?')">
                                            @csrf @method('DELETE')
                                            <button type="submit" 
                                                    class="w-full inline-flex items-center justify-center gap-1 px-3 py-2 text-xs font-medium text-red-700 bg-red-50 hover:bg-red-100 rounded-lg transition-colors duration-200">
                                                <i class="fas fa-trash text-xs"></i>
                                                Hapus
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>

            <!-- Custom Pagination -->
            @if(method_exists($contents, 'links') && $contents->hasPages())
                <div class="px-6 py-4 border-t border-gray-200/60 bg-gray-50/50">
                    <div class="flex flex-col sm:flex-row items-center justify-between gap-4">
                        <!-- Pagination Info -->
                        <div class="text-sm text-gray-700">
                            Menampilkan 
                            <span class="font-medium">{{ ($contents->currentPage() - 1) * $contents->perPage() + 1 }}</span>
                            sampai 
                            <span class="font-medium">{{ min($contents->currentPage() * $contents->perPage(), $contents->total()) }}</span>
                            dari 
                            <span class="font-medium">{{ $contents->total() }}</span> hasil
                        </div>

                        <!-- Custom Pagination Links -->
                        <div class="flex items-center gap-2">
                            <!-- Previous Button -->
                            @if($contents->onFirstPage())
                                <span class="inline-flex items-center gap-2 px-4 py-2 text-gray-400 bg-gray-100 rounded-xl cursor-not-allowed">
                                    <i class="fas fa-chevron-left text-xs"></i>
                                    <span class="hidden sm:inline">Sebelumnya</span>
                                </span>
                            @else
                                <a href="{{ $contents->previousPageUrl() }}" 
                                   class="inline-flex items-center gap-2 px-4 py-2 text-gray-700 bg-white border border-gray-300 rounded-xl hover:bg-gray-50 transition-all duration-200 group">
                                    <i class="fas fa-chevron-left text-xs group-hover:-translate-x-0.5 transition-transform"></i>
                                    <span class="hidden sm:inline">Sebelumnya</span>
                                </a>
                            @endif

                            <!-- Page Numbers -->
                            <div class="flex items-center gap-1">
                                @php
                                    $current = $contents->currentPage();
                                    $last = $contents->lastPage();
                                    $start = max(1, $current - 2);
                                    $end = min($last, $current + 2);
                                    
                                    if ($start > 1) {
                                        echo '<a href="' . $contents->url(1) . '" class="w-10 h-10 flex items-center justify-center text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-xl hover:bg-gray-50 transition-colors duration-200">1</a>';
                                        if ($start > 2) {
                                            echo '<span class="w-10 h-10 flex items-center justify-center text-sm text-gray-400">...</span>';
                                        }
                                    }
                                    
                                    for ($i = $start; $i <= $end; $i++) {
                                        if ($i == $current) {
                                            echo '<span class="w-10 h-10 flex items-center justify-center text-sm font-medium text-white bg-gradient-to-r from-blue-500 to-cyan-500 rounded-xl shadow-md">' . $i . '</span>';
                                        } else {
                                            echo '<a href="' . $contents->url($i) . '" class="w-10 h-10 flex items-center justify-center text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-xl hover:bg-gray-50 transition-colors duration-200">' . $i . '</a>';
                                        }
                                    }
                                    
                                    if ($end < $last) {
                                        if ($end < $last - 1) {
                                            echo '<span class="w-10 h-10 flex items-center justify-center text-sm text-gray-400">...</span>';
                                        }
                                        echo '<a href="' . $contents->url($last) . '" class="w-10 h-10 flex items-center justify-center text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-xl hover:bg-gray-50 transition-colors duration-200">' . $last . '</a>';
                                    }
                                @endphp
                            </div>

                            <!-- Next Button -->
                            @if($contents->hasMorePages())
                                <a href="{{ $contents->nextPageUrl() }}" 
                                   class="inline-flex items-center gap-2 px-4 py-2 text-gray-700 bg-white border border-gray-300 rounded-xl hover:bg-gray-50 transition-all duration-200 group">
                                    <span class="hidden sm:inline">Selanjutnya</span>
                                    <i class="fas fa-chevron-right text-xs group-hover:translate-x-0.5 transition-transform"></i>
                                </a>
                            @else
                                <span class="inline-flex items-center gap-2 px-4 py-2 text-gray-400 bg-gray-100 rounded-xl cursor-not-allowed">
                                    <span class="hidden sm:inline">Selanjutnya</span>
                                    <i class="fas fa-chevron-right text-xs"></i>
                                </span>
                            @endif
                        </div>
                    </div>
                </div>
            @endif
        @else
            <!-- Empty State -->
            <div class="p-8 sm:p-12 text-center">
                <div class="max-w-md mx-auto">
                    <div class="w-20 h-20 sm:w-24 sm:h-24 bg-gradient-to-br from-gray-200 to-gray-300 rounded-2xl flex items-center justify-center mx-auto mb-4">
                        <i class="fas fa-newspaper text-gray-400 text-2xl sm:text-3xl"></i>
                    </div>
                    <h3 class="text-lg sm:text-xl font-semibold text-gray-900 mb-2">Belum ada konten</h3>
                    <p class="text-gray-600 text-sm sm:text-base mb-6">Mulai dengan menambahkan konten pertama Anda</p>
                    <a href="{{ route('admin.contents.create') }}" 
                       class="inline-flex items-center gap-2 bg-blue-500 hover:bg-blue-600 text-white px-6 py-3 rounded-xl shadow-lg hover:shadow-xl transition-all duration-300">
                        <i class="fas fa-plus"></i>
                        <span class="font-medium">Tambah Konten Pertama</span>
                    </a>
                </div>
            </div>
        @endif
    </div>
</div>

<style>
.line-clamp-2 {
    display: -webkit-box;
    -webkit-line-clamp: 2;
    -webkit-box-orient: vertical;
    overflow: hidden;
}
</style>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const categoryFilter = document.getElementById('categoryFilter');
    const searchInput = document.getElementById('searchInput');
    const applyFilter = document.getElementById('applyFilter');
    const resetFilter = document.getElementById('resetFilter');

    // Apply Filter
    applyFilter.addEventListener('click', function() {
        const category = categoryFilter.value;
        const search = searchInput.value;
        
        let url = new URL(window.location.href);
        
        if (category) {
            url.searchParams.set('category', category);
        } else {
            url.searchParams.delete('category');
        }
        
        if (search) {
            url.searchParams.set('search', search);
        } else {
            url.searchParams.delete('search');
        }
        
        url.searchParams.delete('page'); // Reset to first page
        window.location.href = url.toString();
    });

    // Reset Filter
    resetFilter.addEventListener('click', function() {
        categoryFilter.value = '';
        searchInput.value = '';
        window.location.href = "{{ route('admin.contents.index') }}";
    });

    // Enter key search
    searchInput.addEventListener('keypress', function(e) {
        if (e.key === 'Enter') {
            applyFilter.click();
        }
    });

    // Set current filter values from URL
    const urlParams = new URLSearchParams(window.location.search);
    if (urlParams.get('category')) {
        categoryFilter.value = urlParams.get('category');
    }
    if (urlParams.get('search')) {
        searchInput.value = urlParams.get('search');
    }
});
</script>
@endsection