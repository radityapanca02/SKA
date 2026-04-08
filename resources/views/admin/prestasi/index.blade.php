<x-admin-layout>
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-2xl font-bold text-gray-800">Daftar Prestasi</h1>

        <!-- Hanya SUPERADMIN, ADMIN, dan EDITOR yang bisa tambah prestasi -->
        @if(auth()->user()->canCreate())
        <a href="{{ route('admin.prestasi.create') }}" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 flex items-center">
            <i class="fas fa-trophy mr-2"></i>Tambah Prestasi
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
                    <th class="p-3 text-left">Nama</th>
                    <th class="p-3 text-left">Subjudul</th>
                    <th class="p-3 text-left">Gambar</th>
                    <th class="p-3 text-center">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($prestasis as $prestasi)
                <tr class="border-b hover:bg-gray-50">
                    <td class="p-3 font-semibold">{{ $prestasi->nama }}</td>
                    <td class="p-3 text-gray-600">
                        {{ Str::limit($prestasi->subjudul, 80) }}
                    </td>
                    <td class="p-3">
                        <img src="{{ $prestasi->gambar && $prestasi->gambar !== 'default.svg' ? asset('storage/' . $prestasi->gambar) : $assetBase . '/images/default.svg' }}"
                             class="h-12 w-12 rounded object-cover" alt="">
                    </td>
                    <td class="p-3 text-center">
                        <!-- EDITOR hanya bisa lihat dan edit, tidak bisa hapus -->
                        @if(auth()->user()->isEditor())
                        <div class="flex justify-center space-x-2">
                            @if(auth()->user()->canEdit())
                            <a href="{{ route('admin.prestasi.edit', $prestasi->id) }}"
                               class="text-blue-600 hover:underline text-sm">
                                <i class="fas fa-edit mr-1"></i>Edit
                            </a>
                            @endif
                            <span class="text-gray-400 text-sm">|</span>
                            <span class="text-gray-400 text-sm">No Delete</span>
                        </div>
                        @else
                        <div class="flex justify-center space-x-2">
                            <!-- ADMIN dan SUPERADMIN bisa edit -->
                            @if(auth()->user()->canEdit())
                            <a href="{{ route('admin.prestasi.edit', $prestasi->id) }}"
                               class="text-blue-600 hover:underline text-sm">
                                <i class="fas fa-edit mr-1"></i>Edit
                            </a>
                            @endif

                            <!-- Hanya SUPERADMIN dan ADMIN yang bisa hapus -->
                            @if(auth()->user()->canDelete())
                            <form action="{{ route('admin.prestasi.destroy', $prestasi->id) }}" method="POST" class="inline"
                                  onsubmit="return confirm('Yakin ingin menghapus prestasi ini?')">
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
                    <td colspan="4" class="p-4 text-center text-gray-500">Belum ada prestasi</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div class="mt-4">
        {{ $prestasis->links() }}
    </div>

    <!-- Quick Stats -->
    <div class="mt-6 grid grid-cols-1 md:grid-cols-2 gap-4">
        <div class="bg-white p-4 rounded-lg shadow">
            <div class="flex items-center">
                <div class="p-2 bg-blue-100 rounded-lg">
                    <i class="fas fa-trophy text-blue-600"></i>
                </div>
                <div class="ml-4">
                    <p class="text-sm text-gray-500">Total Prestasi</p>
                    <p class="text-xl font-bold">{{ $prestasis->total() }}</p>
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
                        @if(auth()->user()->isSuperadmin())
                        Full Access
                        @elseif(auth()->user()->isAdmin())
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
