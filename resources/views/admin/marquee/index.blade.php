<x-admin-layout>
    <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center mb-6 gap-4">
        <h1 class="text-xl sm:text-2xl font-bold text-gray-800">Kelola Marquee Logo</h1>

        @if(auth()->user()->canCreate())
        <a href="{{ route('admin.marquee.create') }}"
            class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 flex items-center text-sm">
            <i class="fas fa-plus mr-2"></i>Tambah Logo
        </a>
        @endif
    </div>

    @if(session('success'))
    <div class="bg-green-100 text-green-800 p-3 rounded mb-4 text-sm">
        {{ session('success') }}
    </div>
    @endif

    <!-- Preview Marquee -->
    <div class="bg-white p-4 sm:p-6 rounded-lg mb-6">
        <h2 class="text-lg font-semibold mb-4">Preview Marquee</h2>
            <marquee behavior="" direction="left">
            @foreach ($marquees as $marquee)
                <img class="h-6 md:h-10 max-w-[80px] sm:max-w-[100px] object-contain inline-block scale-110"
                src="{{ asset('storage/' . $marquee->gambar) }}" alt="{{ $marquee->nama }}" loading="lazy">
                @endforeach
            </marquee>
    </div>

    <div class="overflow-x-auto bg-white shadow rounded-lg">
        <table class="min-w-full border-collapse">
            <thead class="bg-gray-100 text-gray-700">
                <tr>
                    <th class="p-2 sm:p-3 text-left text-xs sm:text-sm">Logo</th>
                    <th class="p-2 sm:p-3 text-left text-xs sm:text-sm">Nama</th>
                    <th class="p-2 sm:p-3 text-left text-xs sm:text-sm">Urutan</th>
                    <th class="p-2 sm:p-3 text-center text-xs sm:text-sm">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($marquees as $marquee)
                <tr class="border-b hover:bg-gray-50">
                    <td class="p-2 sm:p-3">
                        <img src="{{ asset('storage/' . $marquee->gambar) }}" class="h-8 sm:h-10 w-12 sm:w-16 object-contain"
                            alt="{{ $marquee->nama }}">
                    </td>
                    <td class="p-2 sm:p-3 font-semibold text-xs sm:text-sm">{{ $marquee->nama }}</td>
                    <td class="p-2 sm:p-3 text-gray-600 text-xs sm:text-sm">{{ $marquee->urutan }}</td>
                    <td class="p-2 sm:p-3 text-center">
                        <!-- EDITOR hanya bisa lihat dan edit, tidak bisa hapus -->
                        @if(auth()->user()->isEditor())
                        <div class="flex justify-center space-x-1 sm:space-x-2">
                            @if(auth()->user()->canEdit())
                            <a href="{{ route('admin.marquee.edit', $marquee->id) }}"
                                class="text-blue-600 hover:underline text-xs sm:text-sm">
                                <i class="fas fa-edit mr-0.5 sm:mr-1"></i><span class="hidden sm:inline">Edit</span>
                            </a>
                            @endif
                            <span class="text-gray-400 text-xs sm:text-sm">|</span>
                            <span class="text-gray-400 text-xs sm:text-sm">No Delete</span>
                        </div>
                        @else
                        <div class="flex justify-center space-x-1 sm:space-x-2">
                            @if(auth()->user()->canEdit())
                            <a href="{{ route('admin.marquee.edit', $marquee->id) }}"
                                class="text-blue-600 hover:underline text-xs sm:text-sm">
                                <i class="fas fa-edit mr-0.5 sm:mr-1"></i><span class="hidden sm:inline">Edit</span>
                            </a>
                            @endif

                            @if(auth()->user()->canDelete())
                            <span class="text-gray-400">|</span>
                            <form action="{{ route('admin.marquee.destroy', $marquee->id) }}" method="POST"
                                class="inline" onsubmit="return confirm('Yakin ingin menghapus logo ini?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-600 hover:underline text-xs sm:text-sm">
                                    <i class="fas fa-trash mr-0.5 sm:mr-1"></i><span class="hidden sm:inline">Hapus</span>
                                </button>
                            </form>
                            @endif
                        </div>
                        @endif
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="4" class="p-3 sm:p-4 text-center text-gray-500 text-xs sm:text-sm">Belum ada logo marquee</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <!-- PAGINATION DENGAN SAFE CHECK -->
    <div class="mt-4" id="pagination-container">
        @if(method_exists($marquees, 'links'))
        {{ $marquees->links() }}
        @endif
    </div>

    <!-- Quick Stats dengan safe check -->
    <div class="mt-6 grid grid-cols-1 sm:grid-cols-3 gap-4">
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
</x-admin-layout>
