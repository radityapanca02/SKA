<x-admin-layout>
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-2xl font-bold text-gray-800">Kelola Marquee Logo</h1>

        @if(auth()->user()->canCreate())
        <a href="{{ route('admin.marquee.create') }}"
            class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 flex items-center">
            <i class="fas fa-plus mr-2"></i>Tambah Logo
        </a>
        @endif
    </div>

    @if(session('success'))
    <div class="bg-green-100 text-green-800 p-3 rounded mb-4">
        {{ session('success') }}
    </div>
    @endif

    <!-- Preview Marquee -->
    <div class="bg-white p-6 rounded-lg shadow mb-6">
        <h2 class="text-lg font-semibold mb-4">Preview Marquee</h2>
        <div class="py-4 overflow-hidden rounded-lg bg-gray-50">
            <div class="w-[200%] flex animate-scroll-right">
                <div class="flex space-x-8 md:space-x-12 pr-12">
                    <!-- First Wave Logos -->
                    @foreach ($marquees as $marquee)
                    <img class="h-6 md:h-10 max-w-[100px] object-contain inline-block"
                        src="{{ asset('storage/' . $marquee->gambar) }}" alt="{{ $marquee->nama }}" loading="lazy">
                    @endforeach

                    <!-- Duplicated Logos -->
                    @foreach ($marquees as $marquee)
                    <img class="h-6 md:h-10 max-w-[100px] object-contain inline-block"
                        src="{{ asset('storage/' . $marquee->gambar) }}" alt="{{ $marquee->nama }}" loading="lazy">
                    @endforeach
                </div>
            </div>
        </div>
    </div>

    <div class="overflow-x-auto bg-white shadow rounded-lg">
        <table class="min-w-full border-collapse">
            <thead class="bg-gray-100 text-gray-700">
                <tr>
                    <th class="p-3 text-left">Logo</th>
                    <th class="p-3 text-left">Nama</th>
                    <th class="p-3 text-left">Urutan</th>
                    <th class="p-3 text-center">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($marquees as $marquee)
                <tr class="border-b hover:bg-gray-50">
                    <td class="p-3">
                        <img src="{{ asset('storage/' . $marquee->gambar) }}" class="h-10 w-16 object-contain"
                            alt="{{ $marquee->nama }}">
                    </td>
                    <td class="p-3 font-semibold">{{ $marquee->nama }}</td>
                    <td class="p-3 text-gray-600">{{ $marquee->urutan }}</td>
                    <td class="p-3 text-center">
                        <!-- EDITOR hanya bisa lihat dan edit, tidak bisa hapus -->
                        @if(auth()->user()->isEditor())
                        <div class="flex justify-center space-x-2">
                            @if(auth()->user()->canEdit())
                            <a href="{{ route('admin.marquee.edit', $marquee->id) }}"
                                class="text-blue-600 hover:underline text-sm">
                                <i class="fas fa-edit mr-1"></i>Edit
                            </a>
                            @endif
                            <span class="text-gray-400 text-sm">|</span>
                            <span class="text-gray-400 text-sm">No Delete</span>
                        </div>
                        @else
                        <div class="flex justify-center space-x-2">
                            @if(auth()->user()->canEdit())
                            <a href="{{ route('admin.marquee.edit', $marquee->id) }}"
                                class="text-blue-600 hover:underline text-sm">
                                <i class="fas fa-edit mr-1"></i>Edit
                            </a>
                            @endif

                            @if(auth()->user()->canDelete())
                            <span class="text-gray-400">|</span>
                            <form action="{{ route('admin.marquee.destroy', $marquee->id) }}" method="POST"
                                class="inline" onsubmit="return confirm('Yakin ingin menghapus logo ini?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-600 hover:underline text-sm">
                                    <i class="fas fa-trash mr-1"></i>Hapus
                                </button>
                            </form>
                            @endif
                        </div>
                        @endif
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="4" class="p-4 text-center text-gray-500">Belum ada logo marquee</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <!-- PAGINATION DENGAN SAFE CHECK -->
    <div class="mt-4">
        @if(method_exists($marquees, 'links'))
        {{ $marquees->links() }}
        @endif
    </div>

    <!-- Quick Stats dengan safe check -->
    <div class="mt-6 grid grid-cols-1 md:grid-cols-3 gap-4">
        <div class="bg-white p-4 rounded-lg shadow">
            <div class="flex items-center">
                <div class="p-2 bg-blue-100 rounded-lg">
                    <i class="fas fa-images text-blue-600"></i>
                </div>
                <div class="ml-4">
                    <p class="text-sm text-gray-500">Total Logo</p>
                    <p class="text-xl font-bold">
                        @if(method_exists($marquees, 'total'))
                        {{ $marquees->total() }}
                        @else
                        {{ $marquees->count() }}
                        @endif
                    </p>
                </div>
            </div>
        </div>

        <div class="bg-white p-4 rounded-lg shadow">
            <div class="flex items-center">
                <div class="p-2 bg-green-100 rounded-lg">
                    <i class="fas fa-sort text-green-600"></i>
                </div>
                <div class="ml-4">
                    <p class="text-sm text-gray-500">Urutan Tertinggi</p>
                    <p class="text-xl font-bold">{{ $marquees->max('urutan') ?? 0 }}</p>
                </div>
            </div>
        </div>

        <div class="bg-white p-4 rounded-lg shadow">
            <div class="flex items-center">
                <div class="p-2 bg-purple-100 rounded-lg">
                    <i class="fas fa-list-ol text-purple-600"></i>
                </div>
                <div class="ml-4">
                    <p class="text-sm text-gray-500">Halaman</p>
                    <p class="text-xl font-bold">
                        @if(method_exists($marquees, 'currentPage'))
                        {{ $marquees->currentPage() }}/{{ $marquees->lastPage() }}
                        @else
                        1/1
                        @endif
                    </p>
                </div>
            </div>
        </div>
    </div>

    <style>
    @keyframes scroll-right {
        0% {
            transform: translateX(0);
        }

        100% {
            transform: translateX(-50%);
        }
    }

    .animate-scroll-right {
        animation: scroll-right 25s linear infinite;
    }
    </style>
</x-admin-layout>
