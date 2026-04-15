<x-layout title="{{ $berita->title }} - SMK PGRI 3 Malang">
    <div class="bg-[#F8F8F8]">
        <!-- Main Content -->
        <main class="container mx-auto px-4 py-8">
            <div class="flex flex-col lg:flex-row gap-8">
                <!-- Konten -->
                <div class="w-full lg:w-3/4">
                    <div class="bg-white rounded-xl shadow-md overflow-hidden">
                        <!-- Gambar Utama -->
                        <div class="relative">
                            <img src="{{ !is_null($berita->gambar) ? $assetBase . '/storage/' . $berita->gambar : 'https://placehold.co/600x400' }}" alt="{{ $berita->title }}"
                                class="w-full h-48 md:h-64 lg:h-80 xl:h-96 object-cover">
                            <div class="absolute top-4 left-4">
                                <span class="bg-customBlue text-white px-3 py-1 rounded-full text-xs font-medium">
                                    {{ $berita->type }}
                                </span>
                            </div>
                        </div>

                        <!-- Info Berita + Konten -->
                        <div class="p-8">
                            <div class="flex flex-wrap justify-between items-center text-sm text-gray-500 mb-6 gap-2">
                                <div class="flex items-center space-x-4 flex-wrap">
                                    <span><i class="far fa-calendar-alt mr-1"></i>
                                        {{ $berita->created_at->format('d F Y') }}</span>
                                    <span><i class="far fa-eye mr-1"></i> {{ $berita->views }} dilihat</span>
                                </div>
                            </div>

                            <div class="border-b border-gray-200">
                                <h1 class="text-3xl font-bold mb-3 text-gray-800 break-words">{{ $berita->title }}</h1>
                                <p class="text-gray-600 font-semibold text-base break-words mb-4">
                                    {{ Str::limit($berita->deskripsi, 200) }}</p>
                            </div>
                            <!-- Isi Berita -->
                            <article class="max-w-none">
                                <div
                                    class="prose text-gray-700 leading-relaxed whitespace-pre-line break-words overflow-hidden">
                                    {!! $berita->content !!}
                                </div>
                            </article>
                        </div>
                    </div>
                </div>

                <!-- Sidebar -->
                <aside class="w-full lg:w-1/4 lg:pl-8 mt-8 lg:mt-0 animate-fade-in delay-400">
                    <div class="bg-white p-5 rounded-xl shadow-md">
                        <h3 class="font-bold text-xl mb-4 border-b-2 border-customOrange pb-2">Berita Terbaru</h3>
                        <div id="x-sidenews" class="space-y-6">
                            @foreach ($beritaTerbaru->take(3) as $item)
                            <a href="{{ route('berita.show', $item->id) }}">
                                <div
                                    class="sidenews-item cursor-pointer transition-all duration-300 hover:bg-gray-50 p-2 rounded-lg">
                                    <x-sidenews title="{{ $item->title }}" image="{{ !is_null($item->gambar) ? $assetBase . '/storage/' . $item->gambar : 'https://placehold.co/600x400' }}" />
                                </div>
                            </a>
                            @endforeach
                            <a href="/berita">
                                <button
                                    class="mt-6 w-full bg-customOrange text-white py-2 rounded-lg font-medium hover:bg-customBlue transition">
                                    Lihat Berita Lainnya
                                </button>
                            </a>
                        </div>
                    </div>

                    <!-- Quick Links -->
                    <div class="bg-white p-5 rounded-xl shadow-md mt-6">
                        <h3 class="font-bold text-xl mb-4 border-b-2 border-customBlue pb-2">Lainnya</h3>
                        <ul class="space-y-3">
                            <li><a href="http://117.102.78.163/student/"
                                    class="text-blue-600 hover:underline flex items-center break-words"><i
                                        class="fas fa-link mr-2 text-sm"></i>OCS (One Click Service)</a></li>
                            <li><a href="http://117.102.78.163/ocscbt/"
                                    class="text-blue-600 hover:underline flex items-center break-words"><i
                                        class="fas fa-link mr-2 text-sm"></i>CBT (Computer Based Test)</a></li>
                            <li><a href="https://bki-skariga.web.id/kerjasama-industri/"
                                    class="text-blue-600 hover:underline flex items-center break-words"><i
                                        class="fas fa-link mr-2 text-sm"></i>Bidang Kerja Sama Industri</a></li>
                            <li><a href="http://117.102.78.163/portalakademik/"
                                    class="text-blue-600 hover:underline flex items-center break-words"><i
                                        class="fas fa-link mr-2 text-sm"></i>Portal Akademik</a></li>
                        </ul>
                    </div>
                </aside>
            </div>
        </main>
    </div>
</x-layout>
