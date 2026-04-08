<x-admin-layout>
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-2xl font-bold text-gray-800">Daftar Jurusan</h1>

        @if(Auth::user()->canCreate())
        <a href="{{ route('admin.jurusan.create') }}" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 flex items-center">
            <i class="fas fa-plus mr-2"></i>Tambah Jurusan
        </a>
        @endif
    </div>

    @if(session('success'))
        <div class="bg-green-100 text-green-800 p-3 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif

    <div class="overflow-x-auto bg-white shadow rounded-lg">
        <table class="min-w-full border-collapse">
            <thead class="bg-gray-100 text-gray-700">
                <tr>
                    <th class="p-3 text-left">Jurusan</th>
                    <th class="p-3 text-left">Departemen</th>
                    <th class="p-3 text-left">Gambar</th>
                    <th class="p-3 text-center">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($jurusans as $jurusan)
                <tr class="border-b hover:bg-gray-50">
                    <td class="p-3 font-semibold">{{ $jurusan->jurusan }}</td>
                    <td class="p-3">
                        <span class="px-2 py-1 rounded-full text-xs font-semibold
                            @if($jurusan->departemen == 'OTOMOTIF') bg-blue-100 text-blue-800
                            @elseif($jurusan->departemen == 'TIK') bg-green-100 text-green-800
                            @elseif($jurusan->departemen == 'ELEKTRO') bg-purple-100 text-purple-800
                            @else bg-orange-100 text-orange-800 @endif">
                            {{ $jurusan->departemen }}
                        </span>
                    </td>
                    <td class="p-3">
                        <img src="{{ $jurusan->gambar && $jurusan->gambar !== 'default.svg' ? asset('storage/' . $jurusan->gambar) : $assetBase . '/images/default.svg' }}"
                             class="h-12 w-12 rounded object-cover" alt="{{ $jurusan->jurusan }}">
                    </td>
                    <td class="p-3 text-center">
                        <!-- EDITOR hanya bisa lihat dan edit, tidak bisa hapus -->
                        @if(Auth::user()->isEditor())
                        <div class="flex justify-center space-x-2">
                            @if(Auth::user()->canEdit())
                            <a href="{{ route('admin.jurusan.edit', $jurusan->id) }}"
                               class="text-blue-600 hover:underline text-sm">
                                <i class="fas fa-edit mr-1"></i>Edit
                            </a>
                            @endif
                            <span class="text-gray-400 text-sm">|</span>
                            <span class="text-gray-400 text-sm">No Delete</span>
                        </div>
                        @else
                        <div class="flex justify-center space-x-2">
                            @if(Auth::user()->canEdit())
                            <a href="{{ route('admin.jurusan.edit', $jurusan->id) }}"
                               class="text-blue-600 hover:underline text-sm">
                                <i class="fas fa-edit mr-1"></i>Edit
                            </a>
                            @endif

                            @if(Auth::user()->canDelete())
                            <form action="{{ route('admin.jurusan.destroy', $jurusan->id) }}" method="POST" class="inline"
                                  onsubmit="return confirm('Yakin ingin menghapus jurusan ini?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-600 hover:underline text-sm">
                                    <i class="fas fa-trash mr-1"></i>Hapus
                                </button>
                            </form>
                            @else
                            <span class="text-gray-400 text-sm">|</span>
                            <span class="text-gray-400 text-sm">No Delete</span>
                            @endif
                        </div>
                        @endif
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="4" class="p-4 text-center text-gray-500">Belum ada jurusan</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div class="mt-4">
        {{ $jurusans->links() }}
    </div>

    <!-- Quick Stats -->
    <div class="mt-6 grid grid-cols-1 md:grid-cols-3 gap-4">
        <div class="bg-white p-4 rounded-lg shadow">
            <div class="flex items-center">
                <div class="p-2 bg-blue-100 rounded-lg">
                    <i class="fas fa-graduation-cap text-blue-600"></i>
                </div>
                <div class="ml-4">
                    <p class="text-sm text-gray-500">Total Jurusan</p>
                    <p class="text-xl font-bold">{{ $jurusans->total() }}</p>
                </div>
            </div>
        </div>

        <div class="bg-white p-4 rounded-lg shadow">
            <div class="flex items-center">
                <div class="p-2 bg-green-100 rounded-lg">
                    <i class="fas fa-building text-green-600"></i>
                </div>
                <div class="ml-4">
                    <p class="text-sm text-gray-500">Departemen</p>
                    <p class="text-xl font-bold">4</p>
                </div>
            </div>
        </div>

        <div class="bg-white p-4 rounded-lg shadow">
            <div class="flex items-center">
                <div class="p-2 bg-purple-100 rounded-lg">
                    <i class="fas fa-shield-alt text-purple-600"></i>
                </div>
                <div class="ml-4">
                    <p class="text-sm text-gray-500">Permissions</p>
                    <p class="text-sm font-semibold">
                        @if(Auth::user()->isSuperadmin())
                        Full Access
                        @elseif(Auth::user()->isAdmin())
                        Create, Edit & Delete
                        @else
                        Create & Edit Only
                        @endif
                    </p>
                </div>
            </div>
        </div>
    </div>
</x-admin-layout>
