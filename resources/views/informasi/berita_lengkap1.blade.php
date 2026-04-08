@extends('layouts.app')
@push('styles')
    <style>
        .font-bebas {
            font-family: 'Bebas Neue', cursive;
        }

        .font-poppins {
            font-family: 'Poppins', sans-serif;
        }

        /* === BERITA LENGKAP SECTION === */
        .berita-lengkap-section {
            padding: 4rem 1rem;
            background: linear-gradient(180deg, #fafafa 0%, #fff 100%);
            position: relative;
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

        /* Konten Berita Utama */
        .berita-utama {
            background: white;
            border-radius: 1.5rem;
            padding: 2rem;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.08);
            border: 1px solid #f3f4f6;
            height: fit-content;
        }

        .berita-gambar-utama {
            display: block;
            width: 100%;
            height: 450px;
            object-fit: cover;
            border-radius: 1rem;
            margin-bottom: 2rem;
        }

        .berita-judul {
            font-size: 2rem;
            font-weight: 700;
            color: #1f2937;
            line-height: 1.3;
            margin-bottom: 1.5rem;
            font-family: 'Poppins', sans-serif;
        }

        .berita-meta {
            display: flex;
            align-items: center;
            gap: 1rem;
            margin-bottom: 2rem;
            padding-bottom: 1.5rem;
            border-bottom: 1px solid #e5e7eb;
        }

        .berita-date {
            color: #9ca3af;
            font-size: 0.9rem;
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .berita-kategori {
            background: linear-gradient(135deg, #f97316, #ea580c);
            color: white;
            padding: 0.4rem 0.8rem;
            border-radius: 1.5rem;
            font-size: 0.75rem;
            font-weight: 600;
        }

        .berita-konten {
            color: #374151;
            line-height: 1.8;
            font-size: 1.1rem;
            text-align: justify;
            font-family: 'Poppins', sans-serif;
        }

        .berita-konten p {
            margin-bottom: 1.5rem;
        }

        .sidebar-title {
            font-size: 1.5rem;
            font-weight: 700;
            color: #1f2937;
            margin-bottom: 1rem;
            font-family: 'Bebas Neue', cursive;
            background: linear-gradient(135deg, #1f2937, #374151);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        /* Breadcrumb */
        .breadcrumb {
            display: flex;
            align-items: center;
            gap: 0.5rem;
            margin-bottom: 2rem;
            font-family: 'Poppins', sans-serif;
            font-size: 0.9rem;
            color: #6b7280;
        }

        .breadcrumb a {
            color: #f97316;
            text-decoration: none;
            transition: color 0.3s ease;
        }

        .breadcrumb a:hover {
            color: #ea580c;
        }

        /* Container untuk card samping - mengikuti tinggi konten */
        .side-cards-container {
            display: flex;
            flex-direction: column;
            gap: 1rem;
            position: sticky;
            top: 2rem;
        }

        /* === STYLE BARU YANG KONSISTEN UNTUK SEMUA CARD SAMPING === */
        .berita-side-container {
            display: flex;
            flex-direction: column;
            gap: 1rem;
            height: 100%;
        }

        /* Card Samping - STYLE UNIFORM UNTUK SEMUA */
        .berita-side-card-large {
            background: white;
            border-radius: 1rem;
            overflow: hidden;
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.08);
            transition: all 0.3s ease;
            border: 1px solid #f3f4f6;
            display: flex;
            height: 160px;
            /* TINGGI KONSISTEN */
            width: 100%;
            /* LEBAR PENUH */
        }

        .berita-side-card-large:hover {
            transform: translateY(-3px);
            box-shadow: 0 15px 35px rgba(0, 0, 0, 0.12);
            border-color: #f97316;
        }

        /* CONTAINER GAMBAR YANG KONSISTEN */
        .berita-side-image-container {
            width: 200px;
            /* LEBAR GAMBAR KONSISTEN */
            height: 100%;
            /* TINGGI MENGIKUTI CARD */
            flex-shrink: 0;
            position: relative;
            overflow: hidden;
            display: flex;
            align-items: stretch;
        }

        /* GAMBAR YANG KONSISTEN */
        .berita-side-image-large {
            width: 100%;
            height: 100%;
            object-fit: cover;
            object-position: center;
            transition: transform 0.3s ease;
            display: block;
        }

        .berita-side-card-large:hover .berita-side-image-large {
            transform: scale(1.05);
        }

        /* KONTEN YANG KONSISTEN */
        .berita-side-content-large {
            padding: 1.5rem;
            flex-grow: 1;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            min-width: 0;
            /* MENCEGAH OVERFLOW */
        }

        .berita-side-title-large {
            font-size: 1.2rem;
            font-weight: 600;
            margin-bottom: 0.5rem;
            color: #1f2937;
            line-height: 1.4;
            font-family: 'Poppins', sans-serif;
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }

        .berita-side-excerpt-large {
            color: #6b7280;
            line-height: 1.5;
            font-size: 0.9rem;
            margin-bottom: 1rem;
            /* HAPUS SEMUA PEMBATASAN BARIS */
            display: block;
            overflow: visible;
            white-space: normal;
            max-height: none;
            height: auto;
            -webkit-line-clamp: unset;
            -webkit-box-orient: unset;
            text-overflow: unset;
        }

        .berita-read-more {
            display: inline-flex;
            align-items: center;
            color: #f97316;
            font-weight: 600;
            text-decoration: none;
            font-size: 0.875rem;
            transition: all 0.3s ease;
            font-family: 'Poppins', sans-serif;
        }

        .berita-read-more:hover {
            color: #ea580c;
            transform: translateX(3px);
        }

        .berita-date-small {
            color: #9ca3af;
            font-size: 0.8rem;
            margin-bottom: 0.75rem;
            display: flex;
            align-items: center;
            gap: 0.4rem;
        }

        /* Badge untuk card samping */
        .berita-badge-side {
            position: absolute;
            top: 0.75rem;
            left: 0.75rem;
            background: linear-gradient(135deg, #f97316, #ea580c);
            color: white;
            padding: 0.3rem 0.6rem;
            border-radius: 1rem;
            font-size: 0.7rem;
            font-weight: 600;
            z-index: 3;
            box-shadow: 0 2px 10px rgba(249, 115, 22, 0.3);
        }

        /* === RESPONSIVE DESIGN === */
        @media (max-width: 1024px) {
            .berita-layout {
                grid-template-columns: 1fr;
                gap: 2rem;
            }

            .berita-side-card-large {
                height: 150px;
            }

            .berita-side-image-container {
                width: 180px;
            }

            .side-cards-container {
                position: static;
            }

            .berita-side-container {
                flex-direction: row;
                flex-wrap: wrap;
                gap: 1rem;
            }

            .berita-side-card-large {
                flex: 1 1 calc(50% - 0.5rem);
                min-width: 300px;
            }
        }

        @media (max-width: 768px) {
            .berita-lengkap-section {
                padding: 2rem 1rem;
            }

            .berita-utama {
                padding: 1.5rem;
            }

            .berita-gambar-utama {
                height: 250px;
            }

            .berita-judul {
                font-size: 1.5rem;
            }

            .berita-meta {
                flex-direction: column;
                align-items: flex-start;
                gap: 0.5rem;
            }

            .berita-side-card-large {
                height: 140px;
            }

            .berita-side-image-container {
                width: 140px;
            }

            .berita-side-content-large {
                padding: 1rem;
            }

            .berita-side-title-large {
                font-size: 1.1rem;
            }

            .berita-side-container {
                flex-direction: column;
            }

            .berita-side-card-large {
                flex: 1 1 100%;
            }
        }

        @media (max-width: 480px) {
            .berita-lengkap-section {
                padding: 1.5rem 1rem;
            }

            .berita-utama {
                padding: 1rem;
            }

            .berita-gambar-utama {
                height: 200px;
            }

            .berita-judul {
                font-size: 1.3rem;
            }

            .berita-konten {
                font-size: 1rem;
            }

            .berita-side-card-large {
                height: 120px;
                flex-direction: column;
            }

            .berita-side-image-container {
                width: 100%;
                height: 80px;
            }

            .berita-side-content-large {
                padding: 0.75rem;
            }

            .berita-side-title-large {
                font-size: 1rem;
            }

            .berita-side-excerpt-large {
                -webkit-line-clamp: 2;
            }
        }
    </style>
@endpush

@section('content')
    <div class="min-h-screen">
        <section class="berita-lengkap-section">
            <div class="berita-container">

                <!-- Breadcrumb -->
                <div class="breadcrumb">
                    <a href="/">Beranda</a>
                    <span>></span>
                    <a href="/informasi/berita">Berita</a>
                    <span>></span>
                    <span>{{ $berita->title }}</span>
                </div>

                <div class="berita-layout">
                    <!-- Konten Berita Utama -->
                    <div class="berita-utama">
                        <img src="{{ asset('assets/berita/' . trim(str_replace(['[', ']', '"'], '', $berita->image))) }}"
                            alt="{{ $berita->title }}" class="berita-gambar-utama">

                        <div class="berita-meta">
                            <div class="berita-date">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z">
                                    </path>
                                </svg>
                                {{ $berita->created_at->translatedFormat('d F Y') }}
                            </div>
                            <div class="berita-kategori">
                                {{ strtoupper($berita->category ?? 'BERITA') }}
                            </div>
                        </div>

                        <h1 class="berita-judul">{{ $berita->title }}</h1>

                        <div class="berita-konten">
                            {{ $berita->body }}
                        </div>
                    </div>

                    <!-- Sidebar Berita Lain -->
                    <div class="side-cards-container">
                        <h3 class="sidebar-title">BERITA LAINNYA</h3>
                        <div class="berita-side-container">
                            @foreach ($beritaLain as $item)
                                <div class="berita-side-card-large">
                                    <!-- GAMBAR DENGAN CONTAINER YANG KONSISTEN -->
                                    <div class="berita-side-image-container"> <!-- TAMBAHKAN INI -->
                                        <img src="{{ asset('assets/berita/' . trim(str_replace(['[', ']', '"'], '', $item->image))) }}"
                                            class="berita-side-image-large">
                                        <div class="berita-badge-side">{{ strtoupper($item->category ?? 'BERITA') }}</div>
                                    </div>

                                    <div class="berita-side-content-large">
                                        <div>
                                            <div class="berita-date-small">
                                                <svg class="w-3 h-3" fill="none" stroke="currentColor"
                                                    viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                        d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z">
                                                    </path>
                                                </svg>
                                                {{ $item->created_at->translatedFormat('d F Y') }}
                                            </div>
                                            <h4 class="berita-side-title-large">{{ $item->title }}</h4>
                                            <p class="berita-side-excerpt-large">
                                                {{ $item->content}}
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
            </div>
        </section>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const revealElements = document.querySelectorAll('.berita-side-card-large');
            const observer = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        entry.target.style.opacity = '1';
                        entry.target.style.transform = 'translateY(0)';
                    }
                });
            }, {
                threshold: 0.1
            });

            revealElements.forEach(element => {
                element.style.opacity = '0';
                element.style.transform = 'translateY(20px)';
                element.style.transition = 'all 0.6s ease';
                observer.observe(element);
            });
        });
    </script>
@endsection
