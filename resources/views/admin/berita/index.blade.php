<x-admin-layout>
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-2xl font-bold text-gray-800">Daftar Berita</h1>

        <!-- Hanya SUPERADMIN, ADMIN, dan EDITOR yang bisa tambah berita -->
        @if(auth()->user()->canCreate())
        <a href="{{ route('admin.berita.create') }}"
            class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 flex items-center">
            <i class="fas fa-plus mr-2"></i>Tambah Berita
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
                    <th class="p-3 text-left">Judul</th>
                    <th class="p-3 text-left">Kategori</th>
                    <th class="p-3 text-left">Gambar</th>
                    <th class="p-3 text-center">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($beritas as $berita)
                <tr class="border-b hover:bg-gray-50">
                    <td class="p-3 font-semibold">{{ $berita->title }}</td>
                    <td class="p-3">{{ $berita->type }}</td>
                    <td class="p-3">
                        <img src="{{ $berita->gambar && $berita->gambar !== 'default.svg' ? asset('storage/' . $berita->gambar) : $assetBase . '/images/default.svg' }}"
                            class="h-12 rounded" alt="">
                    </td>
                    <td class="p-3 text-center">
                        <!-- EDITOR hanya bisa lihat dan edit, tidak bisa hapus -->
                        @if(auth()->user()->isEditor())
                        <div class="flex justify-center space-x-2">
                            @if(auth()->user()->canEdit())
                            <a href="{{ route('admin.berita.edit', $berita->id) }}"
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
                            <a href="{{ route('admin.berita.edit', $berita->id) }}"
                                class="text-blue-600 hover:underline text-sm">
                                <i class="fas fa-edit mr-1"></i>Edit
                            </a>
                            @endif

                            <!-- Hanya SUPERADMIN dan ADMIN yang bisa hapus -->
                            @if(auth()->user()->canDelete())
                            <form action="{{ route('admin.berita.destroy', $berita->id) }}" method="POST" class="inline"
                                onsubmit="return confirm('Yakin ingin menghapus berita ini?')">
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
                    <td colspan="4" class="p-4 text-center text-gray-500">Belum ada berita</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div class="mt-4">
        {{ $beritas->links() }}
    </div>
</x-admin-layout>
