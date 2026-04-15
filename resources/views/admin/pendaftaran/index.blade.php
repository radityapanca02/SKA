<x-admin-layout>
    <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center mb-6 gap-4">
        <h1 class="text-xl sm:text-2xl font-bold text-gray-800">Data Pendaftaran Siswa</h1>

        @if(auth()->user()->canCreate())
        <a href="{{ route('admin.pendaftaran.create') }}"
            class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 flex items-center text-sm">
            <i class="fas fa-plus mr-2"></i>Tambah Data Pendaftaran
        </a>
        @endif
    </div>

    @if (session('success'))
    <div class="bg-green-100 text-green-800 p-3 rounded mb-4 text-sm">
        {{ session('success') }}
    </div>
    @endif

    <div class="overflow-x-auto bg-white shadow rounded-lg">
        <table class="min-w-full border-collapse">
            <thead class="bg-gray-100 text-gray-700">
                <tr>
                    <th class="p-2 sm:p-3 text-left text-xs sm:text-sm">Tahun</th>
                    <th class="p-2 sm:p-3 text-left text-xs sm:text-sm">Jumlah Pendaftar</th>
                    <th class="p-2 sm:p-3 text-left text-xs sm:text-sm">Jumlah Diterima</th>
                    <th class="p-2 sm:p-3 text-center text-xs sm:text-sm">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($pendaftarans as $pendaftaran)
                <tr class="border-b hover:bg-gray-50">
                    <td class="p-2 sm:p-3 font-semibold text-xs sm:text-sm">{{ $pendaftaran->tahun }}</td>
                    <td class="p-2 sm:p-3 text-gray-700 text-xs sm:text-sm">{{ $pendaftaran->jumlah_pendaftar }}</td>
                    <td class="p-2 sm:p-3 text-gray-700 text-xs sm:text-sm">{{ $pendaftaran->jumlah_diterima }}</td>
                    <td class="p-2 sm:p-3 text-center">
                        @if(auth()->user()->isEditor())
                            <!-- EDITOR hanya bisa edit -->
                            <div class="flex justify-center space-x-1 sm:space-x-2">
                                @if(auth()->user()->canEdit())
                                <a href="{{ route('admin.pendaftaran.edit', $pendaftaran->id) }}"
                                    class="text-blue-600 hover:underline text-xs sm:text-sm">
                                    <i class="fas fa-edit mr-0.5 sm:mr-1"></i><span class="hidden sm:inline">Edit</span>
                                </a>
                                @endif
                                <span class="text-gray-400 text-xs sm:text-sm">|</span>
                                <span class="text-gray-400 text-xs sm:text-sm">No Delete</span>
                            </div>
                        @else
                            <!-- ADMIN dan SUPERADMIN bisa edit & hapus -->
                            <div class="flex justify-center space-x-1 sm:space-x-2">
                                @if(auth()->user()->canEdit())
                                <a href="{{ route('admin.pendaftaran.edit', $pendaftaran->id) }}"
                                    class="text-blue-600 hover:underline text-xs sm:text-sm">
                                    <i class="fas fa-edit mr-0.5 sm:mr-1"></i><span class="hidden sm:inline">Edit</span>
                                </a>
                                @endif

                                @if(auth()->user()->canDelete())
                                <form action="{{ route('admin.pendaftaran.destroy', $pendaftaran->id) }}" method="POST"
                                    class="inline"
                                    onsubmit="return confirm('Yakin ingin menghapus data pendaftaran tahun ini?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-600 hover:underline text-xs sm:text-sm">
                                        <i class="fas fa-trash mr-0.5 sm:mr-1"></i><span class="hidden sm:inline">Hapus</span>
                                    </button>
                                </form>
                                @else
                                <span class="text-gray-400 text-xs sm:text-sm">|</span>
                                <span class="text-gray-400 text-xs sm:text-sm">No Delete</span>
                                @endif
                            </div>
                        @endif
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="4" class="p-3 sm:p-4 text-center text-gray-500 text-xs sm:text-sm">
                        Belum ada data pendaftaran
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div class="mt-4" id="pagination-container">
        {{ $pendaftarans->links() }}
    </div>
</x-admin-layout>
