@extends('layouts.app')

@push('styles')
    <style>
        .font-bebas {
            font-family: 'Bebas Neue', cursive;
        }

        .font-poppins {
            font-family: 'Poppins', sans-serif;
        }

        /* === BERITA SECTION === */
        .berita-section {
            padding: 4rem 1rem;
            background: transparent;
            position: relative;
        }


        .berita-title {
            font-size: 2.5rem;
            background: linear-gradient(135deg, #1f2937, #374151);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            margin-bottom: 3rem;
            position: relative;
            text-align: center;
        }

        .berita-title::after {
            content: '';
            position: absolute;
            bottom: -10px;
            left: 50%;
            transform: translateX(-50%);
            width: 100px;
            height: 3px;
            background: linear-gradient(90deg, #f97316, #fdba74);
            border-radius: 2px;
        }

        .berita-container {
            width: 98%;
            max-width: none;
            margin: 0 auto;
            position: relative;
        }


        /* Layout Utama */
        .berita-layout {
            display: grid;
            grid-template-columns: 2fr 1fr;
            gap: 2rem;
            align-items: start;
        }

        /* Card Besar Kiri */
        .berita-main-card {
            background: white;
            border-radius: 1.5rem;
            overflow: hidden;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.08);
            transition: all 0.4s ease;
            border: 1px solid #f3f4f6;
            height: fit-content;
            position: relative;
        }

        .berita-main-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.12);
            border-color: #f97316;
        }

        .berita-main-image {
            width: 100%;
            height: 280px;
            object-fit: cover;
            transition: transform 0.4s ease;
        }

        .berita-main-card:hover .berita-main-image {
            transform: scale(1.05);
        }

        .berita-main-content {
            padding: 1.5rem;
        }

        .berita-main-title {
            font-size: 1.5rem;
            font-weight: 700;
            margin-bottom: 1rem;
            color: #1f2937;
            line-height: 1.3;
        }

        .berita-main-excerpt {
            color: #6b7280;
            line-height: 1.6;
            margin-bottom: 1.5rem;
            font-size: 0.95rem;
            /* TAMBAHKAN JIKA INGIN FULL TEKS */
            display: block;
            overflow: visible;
            white-space: normal;
        }

        /* Container Card Kanan */
        .berita-side-container {
            display: flex;
            flex-direction: column;
            gap: 1rem;
            height: 100%;
        }

        /* === SIDEBAR BERITA KANAN (SAMA DENGAN BERITA UTAMA) === */
        .berita-side-container {
            display: flex;
            flex-direction: column;
            gap: 1rem;
        }

        .berita-side-card {
            display: flex;
            height: 245px;
            background: #fff;
            border-radius: 1rem;
            overflow: hidden;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.08);
            border: 1px solid #f3f4f6;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .berita-side-card:hover {
            transform: translateY(-3px);
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.12);
            border-color: #f97316;
        }

        .berita-side-image {
            width: 50%;
            /* Diperlebar dari 45% menjadi 50% */
            min-width: 200px;
            /* Lebar minimum yang lebih besar */
            max-width: 200px;
            /* Lebar maksimum */
            height: 100%;
            object-fit: cover;
            transition: transform 0.3s ease;
            flex-shrink: 0;
            /* Mencegah gambar menyusut */
        }



        .berita-side-card:hover .berita-side-image {
            transform: scale(1.05);
        }

        /* Konten */
        .berita-side-content {
            flex: 1;
            padding: 0.9rem 1rem;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            min-height: 210px;
            /* tambahkan batas tinggi minimum */
        }

        .berita-date {
            display: flex;
            align-items: center;
            gap: 0.4rem;
            font-size: 0.8rem;
            color: #6b7280;
            margin-bottom: 0.3rem;
        }

        .berita-side-title {
            font-weight: 600;
            font-size: 1rem;
            line-height: 1.4;
            display: -webkit-box;
            -webkit-line-clamp: 2;
            /* tampil maksimal 2 baris */
            -webkit-box-orient: vertical;
            overflow: hidden;
        }


        .berita-side-excerpt {
            color: #6b7280;
            line-height: 1.5;
            font-size: 0.875rem;
            margin-bottom: 0.5rem;
            overflow: hidden;
            text-overflow: ellipsis;
            display: -webkit-box;
            -webkit-line-clamp: 3;
            /* tampil maksimal 3 baris */
            -webkit-box-orient: vertical;
        }

        .berita-read-more {
            font-size: 0.85rem;
            color: #f97316;
            font-weight: 600;
            text-decoration: none;
            align-self: flex-start;
            transition: color 0.3s ease;
        }

        .berita-read-more:hover {
            text-decoration: underline;
            color: #ea580c;
        }

        /* Responsif */
        @media (max-width: 1024px) {
            .berita-side-card {
                flex-direction: column;
            }

            .berita-side-image {
                width: 100%;
                height: 180px;
            }
        }



        .berita-side-card:hover {
            transform: translateY(-3px);
            box-shadow: 0 15px 35px rgba(0, 0, 0, 0.12);
            border-color: #f97316;
        }

        .berita-side-image {
            width: 140px;
            height: 100%;
            /* Full height card */
            object-fit: cover;
            flex-shrink: 0;
            transition: transform 0.3s ease;
        }

        .berita-side-card:hover .berita-side-image {
            transform: scale(1.05);
        }

        .berita-side-content {
            padding: 1.25rem;
            flex-grow: 1;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
        }

        .berita-side-title {
            font-size: 1.1rem;
            font-weight: 600;
            margin-bottom: 0.5rem;
            color: #1f2937;
            line-height: 1.4;
        }

        .berita-side-excerpt {
            color: #6b7280;
            line-height: 1.5;
            font-size: 0.875rem;
            margin-bottom: 1rem;
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }

        .berita-read-more {
            display: inline-flex;
            align-items: center;
            color: #f97316;
            font-weight: 600;
            text-decoration: none;
            font-size: 0.875rem;
            transition: all 0.3s ease;
        }

        .berita-read-more:hover {
            color: #ea580c;
            transform: translateX(3px);
        }

        .berita-badge {
            position: absolute;
            top: 1rem;
            left: 1rem;
            background: linear-gradient(135deg, #f97316, #ea580c);
            color: white;
            padding: 0.4rem 0.8rem;
            border-radius: 1.5rem;
            font-size: 0.75rem;
            font-weight: 600;
            z-index: 3;
            box-shadow: 0 4px 15px rgba(249, 115, 22, 0.3);
        }

        .berita-date {
            color: #9ca3af;
            font-size: 0.8rem;
            margin-bottom: 0.75rem;
            display: flex;
            align-items: center;
            gap: 0.4rem;
        }

        /* Section Kedua */
        .berita-section:nth-child(2) {
            padding-top: 0;
        }

        .berita-section:nth-child(2) .berita-title {
            margin-bottom: 2rem;
        }

        /* Animations */
        .scroll-reveal {
            opacity: 0;
            transform: translateY(30px);
            transition: all 0.6s ease;
        }

        .scroll-reveal.revealed {
            opacity: 1;
            transform: translateY(0);
        }

        /* === MENGURANGI GAP UNTUK SEMUA SECTION SETELAH SECTION PERTAMA === */
        .berita-section~.berita-section {
            padding-top: 0;
            /* Hilangkan padding atas untuk semua section setelah section pertama */
            padding-bottom: 2rem;
            /* Kurangi padding bawah */
        }

        .berita-section~.berita-section .berita-title {
            margin-bottom: 2rem;
            /* Kurangi margin bawah judul */
        }

        /* Section pertama tetap normal */
        .berita-section:first-child {
            padding-top: 4rem;
            padding-bottom: 4rem;
        }

        .berita-section:first-child .berita-title {
            margin-bottom: 3rem;
        }

        /* === RESPONSIVE DESIGN === */
        @media (max-width: 1024px) {
            .berita-layout {
                grid-template-columns: 1fr;
                gap: 1.5rem;
            }

            .berita-side-container {
                flex-direction: row;
                gap: 1rem;
            }

            .berita-side-card {
                flex: 1;
                height: auto;
            }

            .berita-side-image {
                width: 120px;
                height: 100%;
            }
        }

        @media (max-width: 768px) {
            .berita-section {
                padding: 3rem 1rem;
            }

            .berita-title {
                font-size: 2rem;
                margin-bottom: 2rem;
            }

            .berita-main-image {
                height: 220px;
            }

            .berita-main-title {
                font-size: 1.3rem;
            }

            .berita-main-content {
                padding: 1.25rem;
            }

            .berita-side-container {
                flex-direction: column;
            }

            .berita-side-card {
                flex-direction: row;
                height: auto;
            }

            .berita-side-image {
                width: 100px;
                height: 100%;
            }

            .berita-side-content {
                padding: 1rem;
            }

            .berita-side-title {
                font-size: 1rem;
            }
        }

        @media (max-width: 480px) {
            .berita-section {
                padding: 2rem 1rem;
            }

            .berita-title {
                font-size: 1.75rem;
            }

            .berita-main-image {
                height: 180px;
            }

            .berita-side-card {
                flex-direction: row;
            }

            .berita-side-image {
                width: 80px;
                height: 100%;
            }
        }

        html,
        body {
            background-color: transparent !important;
            position: relative;
            z-index: 0;
        }

        main {
            position: relative;
            z-index: 1;
        }
    </style>
@endpush

@section('content')
    <div class="min-h-screen relative z-0">



        @php
            // Ubah ke array biar index jelas
            $beritaArray = $berita->values();

            // Pisah data jadi 3 blok
            $sections = [
                ['title' => 'BERITA TERBARU', 'items' => $beritaArray->slice(0, 3)],
                ['title' => 'BERITA SEKOLAH', 'items' => $beritaArray->slice(3, 3)],
                ['title' => 'BERITA LAINNYA', 'items' => $beritaArray->slice(6, 100)],
            ];
        @endphp

        @foreach ($sections as $section)
            @if ($section['items']->count())
                <section class="berita-section relative overflow-hidden">

                    <!-- === CIRCLE BACKGROUND UNTUK SECTION INI === -->
                    <div class="absolute inset-0 -z-[1] pointer-events-none">
                        <div class="absolute w-96 h-96 bg-orange-100 rounded-full opacity-10-top-20 left-1/9"></div>
                        <div class="absolute w-80 h-80 bg-blue-200 rounded-full opacity-30 top-1/2 right-1/4"></div>
                        <div class="absolute w-72 h-72 bg-orange-100 rounded-full opacity-40 bottom-0 left-1/2"></div>
                    </div>

                    <h2 class="berita-title font-bebas">{{ $section['title'] }}</h2>
                    <div class="berita-container">
                        <div class="berita-layout">
                            @php $main = $section['items']->first(); @endphp
                            @php
                                $mainImages = json_decode($main->image, true);
                                $mainImage = is_array($mainImages) ? $mainImages[0] : $main->image;
                            @endphp

                            <!-- Card utama -->
                            <div class="berita-main-card scroll-reveal">
                                <div class="relative overflow-hidden">
                                    <img src="{{ asset('assets/berita/' . $mainImage) }}" alt="{{ $main->title }}"
                                        class="berita-main-image">
                                    <div class="berita-badge">{{ $section['title'] }}</div>
                                </div>
                                <div class="berita-main-content">
                                    <div class="berita-date">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z">
                                            </path>
                                        </svg>
                                        {{ $main->created_at->format('d F Y') }}
                                    </div>
                                    <h3 class="berita-main-title font-poppins">{{ $main->title }}</h3>
                                    <p class="berita-main-excerpt font-poppins">{{ Str::limit($main->body, 150) }}</p>
                                    <a href="{{ route('berita.show', $main->id) }}"
                                        class="berita-read-more font-poppins">Baca Selengkapnya →</a>
                                </div>
                            </div>

                            <!-- Dua card kecil kanan -->
                            <div class="berita-side-container">
                                @foreach ($section['items']->skip(1)->take(2) as $item)
                                    @php
                                        $images = json_decode($item->image, true);
                                        $image = is_array($images) ? $images[0] : $item->image;
                                    @endphp
                                    <div class="berita-side-card scroll-reveal">
                                        <img src="{{ asset('assets/berita/' . $image) }}" alt="{{ $item->title }}"
                                            class="berita-side-image">
                                        <div class="berita-side-content">
                                            <div>
                                                <div class="berita-date">
                                                    <svg class="w-3 h-3" fill="none" stroke="currentColor"
                                                        viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            stroke-width="2"
                                                            d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z">
                                                        </path>
                                                    </svg>
                                                    {{ $item->created_at->format('d F Y') }}
                                                </div>
                                                <h4 class="berita-side-title font-poppins">{{ $item->title }}</h4>
                                                <p class="berita-side-excerpt font-poppins">{{ strip_tags($item->body) }}
                                                </p>
                                            </div>
                                            <a href="{{ route('berita.show', $item->id) }}" class="berita-read-more">
                                                Baca Selengkapnya →
                                            </a>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
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
@endsection
