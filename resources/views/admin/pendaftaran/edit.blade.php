<x-admin-layout>
    <h1 class="text-2xl font-bold mb-4">Edit Data Pendaftaran</h1>

    {{-- Error handling --}}
    @if ($errors->any())
        <div class="bg-red-100 text-red-700 p-3 rounded mb-4">
            <ul class="list-disc pl-5">
                @foreach ($errors->all() as $err)
                    <li>{{ $err }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    {{-- Form edit --}}
    <form action="{{ route('admin.pendaftaran.update', $pendaftaran->id) }}" method="POST"
        class="space-y-4 bg-white p-6 rounded shadow">
        @csrf
        @method('PUT')

        <div>
            <label for="tahun" class="block mb-1 font-semibold">Tahun</label>
            <input type="number" name="tahun" id="tahun"
                value="{{ old('tahun', $pendaftaran->tahun) }}"
                class="w-full border rounded p-2" required min="2000" max="2099">
        </div>

        <div>
            <label for="jumlah_pendaftar" class="block mb-1 font-semibold">Jumlah Pendaftar</label>
            <input type="number" name="jumlah_pendaftar" id="jumlah_pendaftar"
                value="{{ old('jumlah_pendaftar', $pendaftaran->jumlah_pendaftar) }}"
                class="w-full border rounded p-2" required min="0">
        </div>

        <div>
            <label for="jumlah_diterima" class="block mb-1 font-semibold">Jumlah Diterima</label>
            <input type="number" name="jumlah_diterima" id="jumlah_diterima"
                value="{{ old('jumlah_diterima', $pendaftaran->jumlah_diterima) }}"
                class="w-full border rounded p-2" required min="0">
        </div>

        <div class="flex justify-between items-center mt-6">
            <a href="{{ route('admin.pendaftaran.index') }}"
                class="text-gray-600 hover:underline">← Kembali</a>

            <button type="submit"
                class="bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700">
                Update Data
            </button>
        </div>
    </form>
</x-admin-layout>
