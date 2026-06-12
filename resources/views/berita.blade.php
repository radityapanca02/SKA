<x-layout title="Berita - SMK PGRI 3 Malang">
    @push('styles')
    <style>
    .font-bebas {
        font-family: 'Bebas Neue', cursive;
    }

    .font-poppins {
        font-family: 'Poppins', sans-serif;
    }

    .scroll-reveal {
        opacity: 0;
        transform: translateY(30px);
        transition: all 0.6s ease;
    }

    .scroll-reveal.revealed {
        opacity: 1;
        transform: translateY(0);
    }
    </style>
    @endpush

    <div class="min-h-screen relative z-0">
        @php
        $beritaArray = $beritas->values();
        $sections = [
        ['title' => 'BERITA TERBARU', 'items' => $beritaArray->slice(0, 3)],
        ['title' => 'BERITA SEKOLAH', 'items' => $beritaArray->slice(3, 3)],
        ['title' => 'BERITA LAINNYA', 'items' => $beritaArray->slice(6, 100)],
        ];
        @endphp

        @foreach ($sections as $section)
        @if ($section['items']->count())
        <section class="py-16 px-4 bg-transparent relative overflow-hidden">
            <div class="absolute inset-0 -z-[1] pointer-events-none">
                <div class="absolute w-96 h-96 bg-orange-100 rounded-full opacity-50 top-20 left-10"></div>
                <div class="absolute w-80 h-80 bg-blue-200 rounded-full opacity-30 top-1/2 right-1/4"></div>
                <div class="absolute w-72 h-72 bg-orange-100 rounded-full opacity-40 bottom-0 left-1/2"></div>
            </div>

            <div class="text-center mb-12 relative">
                <h2
                    class="text-4xl font-bebas bg-gradient-to-r from-gray-800 to-gray-600 bg-clip-text text-transparent inline-block pb-4 relative tracking-wider">
                    {{ $section['title'] }}
                    <span
                        class="absolute bottom-0 left-1/2 -translate-x-1/2 w-24 h-[3px] bg-gradient-to-r from-orange-500 to-orange-300 rounded-full"></span>
                </h2>
            </div>
            <div class="w-[98%] max-w-none mx-auto relative">
                <div class="grid grid-cols-1 lg:grid-cols-3 gap-6 items-stretch">
                    @php $main = $section['items']->first(); @endphp
                    @if ($main)
                    <div
                        class="scroll-reveal col-span-1 lg:col-span-2 lg:row-span-2 flex flex-col lg:flex-row bg-white rounded-2xl overflow-hidden border border-gray-100 shadow-md hover:-translate-y-1 hover:shadow-xl hover:border-orange-500 transition-all duration-300 group">
                        <div class="overflow-hidden w-full lg:w-[45%] h-64 lg:h-full flex-shrink-0">
                            <img src="{{ !is_null($main->gambar) ? $assetBase . '/storage/' . $main->gambar : 'https://placehold.co/600x400' }}"
                                alt="{{ $main->title }}"
                                class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300">
                        </div>
                        <div class="p-6 lg:p-8 flex flex-col justify-between flex-1">
                            <div>
                                <div class="flex items-center gap-2 text-xs text-gray-500 mb-3">
                                    <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z">
                                        </path>
                                    </svg>
                                    {{ $main->created_at->format('d F Y') }}
                                </div>
                                <h4
                                    class="font-poppins font-bold text-xl lg:text-2xl text-gray-800 line-clamp-2 lg:line-clamp-3 mb-4 leading-snug">
                                    {{ $main->title }}</h4>
                                <p
                                    class="font-poppins text-sm lg:text-base text-gray-500 line-clamp-3 lg:line-clamp-6 leading-relaxed">
                                    {{ Str::limit($main->deskripsi, 350) }}</p>
                            </div>
                            <a href="{{ route('berita.show', $main->id) }}"
                                class="font-poppins text-sm font-semibold text-orange-500 hover:underline hover:text-orange-600 mt-6 inline-block">Baca
                                Selengkapnya →</a>
                        </div>
                    </div>
                    @endif
                    @foreach ($section['items']->skip(1)->take(2) as $item)
                    <div
                        class="scroll-reveal col-span-1 flex flex-col sm:flex-row bg-white rounded-2xl overflow-hidden border border-gray-100 shadow-md hover:-translate-y-1 hover:shadow-xl hover:border-orange-500 transition-all duration-300 group">
                        <div class="overflow-hidden w-full sm:w-[180px] md:w-[200px] h-48 sm:h-full flex-shrink-0">
                            <img src="{{ !is_null($item->gambar) ? $assetBase . '/storage/' . $item->gambar : 'https://placehold.co/600x400' }}"
                                alt="{{ $item->title }}"
                                class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300">
                        </div>
                        <div class="p-5 flex flex-col justify-between flex-1">
                            <div>
                                <div class="flex items-center gap-2 text-xs text-gray-500 mb-2">
                                    <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z">
                                        </path>
                                    </svg>
                                    {{ $item->created_at->format('d F Y') }}
                                </div>
                                <h4
                                    class="font-poppins font-semibold text-base text-gray-800 line-clamp-2 mb-2 leading-snug">
                                    {{ $item->title }}</h4>
                                <p
                                    class="font-poppins text-sm text-gray-500 line-clamp-2 sm:line-clamp-3 leading-relaxed">
                                    {{ Str::limit($item->deskripsi, 120) }}</p>
                            </div>
                            <a href="{{ route('berita.show', $item->id) }}"
                                class="font-poppins text-xs font-semibold text-orange-500 hover:underline hover:text-orange-600 mt-4 inline-block">Baca
                                Selengkapnya →</a>
                        </div>
                    </div>
                    @endforeach

                </div>
            </div>
        </section>
        @endif
        @endforeach
    </div>

    <script>
    document.addEventListener('DOMContentLoaded', () => {
        const revealElements = document.querySelectorAll('.scroll-reveal');
        const observer = new IntersectionObserver(entries => {
            entries.forEach(entry => entry.isIntersecting && entry.target.classList.add('revealed'));
        }, {
            threshold: 0.1,
            rootMargin: '0px 0px -50px 0px'
        });
        revealElements.forEach(el => observer.observe(el));
    });
    </script>
</x-layout>
