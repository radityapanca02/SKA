<x-admin-layout>
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-2xl font-bold text-gray-800">Kelola Profil Sekolah</h1>

        @if(auth()->user()->canEdit())
        <a href="{{ route('admin.profil.edit', $profil->id) }}"
            class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 flex items-center">
            <i class="fas fa-edit mr-2"></i>Edit Profil
        </a>
        @endif
    </div>

    @if(session('success'))
    <div class="bg-green-100 text-green-800 p-3 rounded mb-4">
        {{ session('success') }}
    </div>
    @endif

    <div class="bg-white shadow rounded-lg overflow-hidden">
        <!-- Hero Section -->
        <div class="border-b p-6">
            <h2 class="text-lg font-semibold mb-4 text-gray-700">Hero Section</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <img src="{{ $profil->heroImage && $profil->heroImage !== 'default.svg' ? asset('storage/' . $profil->heroImage) : $assetBase . '/images/default.svg' }}"
                        class="w-full h-48 object-cover rounded" alt="Hero Image">
                </div>
                <div>
                    <h3 class="font-semibold text-gray-800">Hero Title</h3>
                    <p class="text-gray-600">{{ $profil->heroTitle }}</p>
                </div>
            </div>
        </div>

        <!-- Profil Section -->
        <div class="border-b p-6">
            <h2 class="text-lg font-semibold mb-4 text-gray-700">Profil Section</h2>
            <div class="grid grid-cols-1 md:grid-cols-4 gap-4">
                <div class="col-span-3">
                    <h3 class="font-semibold text-gray-800">Deskripsi Profil</h3>
                    <p class="text-gray-600">{{ $profil->profilDesc }}</p>
                </div>
                <div class="grid grid-cols-3 gap-2">
                    <img src="{{ $profil->profilImage1 && $profil->profilImage1 !== 'default.svg' ? asset('storage/' . $profil->profilImage1) : $assetBase . '/images/default.svg' }}"
                        class="w-full h-20 object-cover rounded" alt="Profil Image 1">
                    <img src="{{ $profil->profilImage2 && $profil->profilImage2 !== 'default.svg' ? asset('storage/' . $profil->profilImage2) : $assetBase . '/images/default.svg' }}"
                        class="w-full h-20 object-cover rounded" alt="Profil Image 2">
                    <img src="{{ $profil->profilImage3 && $profil->profilImage3 !== 'default.svg' ? asset('storage/' . $profil->profilImage3) : $assetBase . '/images/default.svg' }}"
                        class="w-full h-20 object-cover rounded" alt="Profil Image 3">
                </div>
            </div>
        </div>

        <!-- Visi Section -->
        <div class="border-b p-6">
            <h2 class="text-lg font-semibold mb-4 text-gray-700">Visi Section</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <img src="{{ $profil->visiImage && $profil->visiImage !== 'default.svg' ? asset('storage/' . $profil->visiImage) : $assetBase . '/images/default.svg' }}"
                        class="w-full h-48 object-cover rounded" alt="Visi Image">
                    <p class="text-sm text-gray-500 mt-2">{{ $profil->visiImageName }}</p>
                </div>
                <div>
                    <h3 class="font-semibold text-gray-800">Deskripsi Visi</h3>
                    <p class="text-gray-600">{{ $profil->visiDesc }}</p>
                </div>
            </div>
        </div>

        <!-- Misi Section -->
        <div class="border-b p-6">
            <h2 class="text-lg font-semibold mb-4 text-gray-700">Misi Section (4 Cards)</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4">
                @foreach ($profil->misis as $misi)
                <div class="bg-white border rounded-lg p-4 shadow-sm">
                    <img src="{{ $misi->misiImage && $misi->misiImage !== 'default.svg' ? asset('storage/' . $misi->misiImage) : $assetBase . '/images/default.svg' }}"
                        class="w-full h-32 object-cover rounded mb-3" alt="{{ $misi->misiTitle }}">
                    <h3 class="font-semibold text-gray-800 mb-2">{{ $misi->misiTitle }}</h3>
                    <p class="text-gray-600 text-sm mb-3">{{ $misi->misiDesc }}</p>
                    <span class="px-2 py-1 rounded-full text-xs font-semibold
                @if($misi->misiColor == 'BLUE') bg-blue-100 text-blue-800
                @elseif($misi->misiColor == 'GREEN') bg-green-100 text-green-800
                @elseif($misi->misiColor == 'ORANGE') bg-orange-100 text-orange-800
                @else bg-red-100 text-red-800 @endif">
                        {{ $misi->misiColor }}
                    </span>
                </div>
                @endforeach
            </div>
        </div>

        <!-- YouTube Section -->
        <div class="p-6">
            <h2 class="text-lg font-semibold mb-4 text-gray-700">YouTube Video</h2>
            <div class="bg-gray-100 p-4 rounded">
                <p class="text-sm text-gray-600 mb-2">Embed URL:</p>
                <code class="bg-gray-200 p-2 rounded text-sm break-all">{{ $profil->youtubeSrc }}</code>
            </div>
        </div>
    </div>

    <!-- Quick Stats -->
    <div class="mt-6 grid grid-cols-1 md:grid-cols-2 gap-4">
        <div class="bg-white p-4 rounded-lg shadow">
            <div class="flex items-center">
                <div class="p-2 bg-blue-100 rounded-lg">
                    <i class="fas fa-image text-blue-600"></i>
                </div>
                <div class="ml-4">
                    <p class="text-sm text-gray-500">Total Images</p>
                    <p class="text-xl font-bold">6</p>
                </div>
            </div>
        </div>

        <div class="bg-white p-4 rounded-lg shadow">
            <div class="flex items-center">
                <div class="p-2 bg-green-100 rounded-lg">
                    <i class="fas fa-film text-green-600"></i>
                </div>
                <div class="ml-4">
                    <p class="text-sm text-gray-500">YouTube Video</p>
                    <p class="text-sm font-semibold text-green-600">Configured</p>
                </div>
            </div>
        </div>
    </div>
</x-admin-layout>
