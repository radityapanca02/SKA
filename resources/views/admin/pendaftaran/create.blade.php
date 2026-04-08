<x-admin-layout>
    <div class="py-8">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <h2 class="font-bold text-2xl text-gray-800 leading-tight">
                Tambah Data Pendaftaran
            </h2>
            <!-- Error Messages -->
            @if ($errors->any())
            <div class="bg-red-100 text-red-700 p-3 rounded mb-4">
                <ul class="list-disc pl-5">
                    @foreach ($errors->any() as $err)
                    <li>{{ $err }}</li>
                    @endforeach
                </ul>
            </div>
            @endif

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <form action="{{ route('admin.pendaftaran.store') }}" method="POST"
                        class="space-y-6 bg-white rounded">
                        @csrf

                        <div>
                            <label class="block mb-1 font-medium">Tahun</label>
                            <input type="number" name="tahun" id="tahun" value="{{ old('tahun') }}"
                                class="w-full border border-gray-300 rounded p-2 focus:ring-2 focus:ring-blue-200 focus:border-blue-500"
                                min="2000" max="2030" placeholder="Masukkan tahun pendaftaran" required>
                            @error('tahun')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label class="block mb-1 font-medium">Jumlah Pendaftar</label>
                            <input type="number" name="jumlah_pendaftar" id="jumlah_pendaftar"
                                value="{{ old('jumlah_pendaftar') }}"
                                class="w-full border border-gray-300 rounded p-2 focus:ring-2 focus:ring-blue-200 focus:border-blue-500"
                                min="0" placeholder="Masukkan jumlah pendaftar" required>
                            @error('jumlah_pendaftar')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label class="block mb-1 font-medium">Jumlah Diterima</label>
                            <input type="number" name="jumlah_diterima" id="jumlah_diterima"
                                value="{{ old('jumlah_diterima') }}"
                                class="w-full border border-gray-300 rounded p-2 focus:ring-2 focus:ring-blue-200 focus:border-blue-500"
                                min="0" placeholder="Masukkan jumlah yang diterima" required>
                            @error('jumlah_diterima')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="flex space-x-4 pt-4 border-t border-gray-200">
                            <button type="submit"
                                class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 transition duration-200 flex items-center">
                                <i class="fas fa-save mr-2"></i>Simpan
                            </button>
                            <a href="{{ route('admin.pendaftaran.index') }}"
                                class="bg-gray-600 text-white px-4 py-2 rounded hover:bg-gray-700 transition duration-200 flex items-center">
                                <i class="fas fa-arrow-left mr-2"></i>Kembali
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-admin-layout>
