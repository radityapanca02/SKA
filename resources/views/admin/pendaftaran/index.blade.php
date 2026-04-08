<x-admin-layout>
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-2xl font-bold text-gray-800">Data Pendaftaran Siswa</h1>

        @if(auth()->user()->canCreate())
        <a href="{{ route('admin.pendaftaran.create') }}"
            class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 flex items-center">
            <i class="fas fa-plus mr-2"></i>Tambah Data Pendaftaran
        </a>
        @endif
    </div>

    @if (session('success'))
    <div class="bg-green-100 text-green-800 p-3 rounded mb-4">
        {{ session('success') }}
    </div>
    @endif

    <div class="overflow-x-auto bg-white shadow rounded-lg">
        <table class="min-w-full border-collapse">
            <thead class="bg-gray-100 text-gray-700">
                <tr>
                    <th class="p-3 text-left">Tahun</th>
                    <th class="p-3 text-left">Jumlah Pendaftar</th>
                    <th class="p-3 text-left">Jumlah Diterima</th>
                    <th class="p-3 text-center">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($pendaftarans as $pendaftaran)
                <tr class="border-b hover:bg-gray-50">
                    <td class="p-3 font-semibold">{{ $pendaftaran->tahun }}</td>
                    <td class="p-3 text-gray-700">{{ $pendaftaran->jumlah_pendaftar }}</td>
                    <td class="p-3 text-gray-700">{{ $pendaftaran->jumlah_diterima }}</td>
                    <td class="p-3 text-center">
                        @if(auth()->user()->isEditor())
                            <!-- EDITOR hanya bisa edit -->
                            <div class="flex justify-center space-x-2">
                                @if(auth()->user()->canEdit())
                                <a href="{{ route('admin.pendaftaran.edit', $pendaftaran->id) }}"
                                    class="text-blue-600 hover:underline text-sm">
                                    <i class="fas fa-edit mr-1"></i>Edit
                                </a>
                                @endif
                                <span class="text-gray-400 text-sm">|</span>
                                <span class="text-gray-400 text-sm">No Delete</span>
                            </div>
                        @else
                            <!-- ADMIN dan SUPERADMIN bisa edit & hapus -->
                            <div class="flex justify-center space-x-2">
                                @if(auth()->user()->canEdit())
                                <a href="{{ route('admin.pendaftaran.edit', $pendaftaran->id) }}"
                                    class="text-blue-600 hover:underline text-sm">
                                    <i class="fas fa-edit mr-1"></i>Edit
                                </a>
                                @endif

                                @if(auth()->user()->canDelete())
                                <form action="{{ route('admin.pendaftaran.destroy', $pendaftaran->id) }}" method="POST"
                                    class="inline"
                                    onsubmit="return confirm('Yakin ingin menghapus data pendaftaran tahun ini?')">
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
                    <td colspan="4" class="p-4 text-center text-gray-500">
                        Belum ada data pendaftaran
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div class="mt-4">
        {{ $pendaftarans->links() }}
    </div>
</x-admin-layout>
