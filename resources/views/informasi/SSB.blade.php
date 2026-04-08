@extends('layouts.app')

@push('styles')
    <style>
        /* === FONTS === */
        .font-bebas {
            font-family: 'Bebas Neue', cursive;
        }

        .font-poppins {
            font-family: 'Poppins', sans-serif;
        }

        /* === BACKGROUND CIRCLES === */
        .bg-circle {
            width: 20rem;
            height: 20rem;
            border-radius: 50%;
            position: absolute;
            pointer-events: none;
        }

        .bg-orange-blur {
            background: rgba(255, 179, 132, 0.32);
        }

        .bg-blue-blur {
            background: rgba(174, 219, 228, 0.5);
        }

        /* === HERO SECTION === */
        .hero-section {
            padding: 6rem 1rem 4rem;
            position: relative;
            overflow: hidden;
        }

        .hero-title {
            font-size: 2.5rem;
            background: linear-gradient(135deg, #1f2937, #374151);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            margin-bottom: 1.5rem;
            line-height: 1.2;
        }

        .hero-description {
            font-size: 1.1rem;
            line-height: 1.8;
            color: #6b7280;
            margin-bottom: 2rem;
        }

        .hero-button {
            background: linear-gradient(135deg, #f97316, #ea580c);
            color: white;
            padding: 1rem 2rem;
            border: none;
            border-radius: 0.75rem;
            font-family: 'Poppins', sans-serif;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            box-shadow: 0 4px 15px rgba(249, 115, 22, 0.3);
            text-decoration: none;
            display: inline-block;
        }

        .hero-button:hover {
            transform: translateY(-3px);
            box-shadow: 0 8px 25px rgba(249, 115, 22, 0.4);
        }

        .hero-button-secondary {
            background: linear-gradient(135deg, #3b82f6, #1d4ed8);
        }

        /* === SLIDESHOW === */
        .slideshow-container {
            position: relative;
            width: 100%;
            height: 550px;
            border-radius: 1.5rem;
            overflow: hidden;
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.1);
        }

        .slideshow-slide {
            width: 100%;
            height: 100%;
            position: absolute;
            top: 0;
            left: 0;
            opacity: 0;
            transition: opacity 0.8s ease-in-out;
        }

        .slideshow-slide.active {
            opacity: 1;
        }

        .slideshow-image {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .slideshow-overlay {
            position: absolute;
            inset: 0;
            background: linear-gradient(to bottom, transparent 0%, rgba(0, 0, 0, 0.4) 100%);
            display: flex;
            align-items: flex-end;
            padding: 2rem;
            color: white;
        }

        .slideshow-text {
            font-size: 1.25rem;
            font-weight: 600;
            text-align: center;
            width: 100%;
        }

        /* === SECTION STYLES === */
        .section-title {
            font-size: 3rem;
            background: linear-gradient(135deg, #1f2937, #374151);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            margin-bottom: 3rem;
            text-align: center;
            position: relative;
        }

        .section-title::after {
            content: '';
            position: absolute;
            bottom: -10px;
            left: 50%;
            transform: translateX(-50%);
            width: 150px;
            height: 3px;
            background: linear-gradient(90deg, #f97316, #fdba74);
            border-radius: 2px;
        }

        /* === REGISTRATION CARD === */
        .registration-card {
            background: white;
            border-radius: 1.5rem;
            overflow: hidden;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.08);
            transition: all 0.4s ease;
            border: 1px solid #f3f4f6;
            position: relative;
        }

        .registration-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 25px 50px rgba(0, 0, 0, 0.15);
        }

        .registration-badge {
            position: absolute;
            top: 1rem;
            right: 1rem;
            background: linear-gradient(135deg, #f97316, #ea580c);
            color: white;
            padding: 0.5rem 1rem;
            border-radius: 2rem;
            font-size: 0.8rem;
            font-weight: 600;
        }

        .registration-badge.blue {
            background: linear-gradient(135deg, #3b82f6, #1d4ed8);
        }

        /* === CHART SECTION === */
        .chart-container {
            background: white;
            border-radius: 1.5rem;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.08);
            padding: 2rem;
        }
    </style>
@endpush

@section('content')
    <div class="relative bg-white overflow-hidden min-h-screen">

        <!-- Background Circles -->
        <div class="absolute inset-0 pointer-events-none z-0">
            <div class="bg-blue-blur bg-circle -left-32 -top-20"></div>
            <div class="bg-blue-blur bg-circle -left-28 top-1/3"></div>
            <div class="bg-orange-blur bg-circle -right-32 top-24"></div>
            <div class="bg-orange-blur bg-circle -right-28 bottom-40"></div>
        </div>

        <!-- 🧩 HERO SECTION (DINAMIS DARI DATABASE) -->
        <section class="hero-section">
            <div class="container mx-auto px-4">
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">

                    <!-- Text -->
                    <div class="text-center lg:text-left">
                        @foreach ($ssb2 as $s2)
                            <h1 class="hero-title font-bebas">
                                {{ $s2->title }}
                            </h1>
                            <p class="hero-description font-poppins">
                                {{ $s2->body }}
                            </p>
                        @endforeach

                        <div class="flex flex-col gap-4 justify-center lg:justify-start">
                            <!-- Tombol Daftar Sekarang (Lebih Besar) -->
                            <a href="{{ route('kontak') }}"
                                class="hero-button font-poppins text-lg py-3 px-8 text-center w-fit mx-auto lg:mx-0">
                                Daftar Sekarang
                            </a>

                            <!-- Container untuk tombol tata cara (Lebih Kecil) -->
                            <div class="flex flex-col sm:flex-row gap-4">
                                <button
                                    onclick="document.getElementById('offline-registration').scrollIntoView({behavior: 'smooth'})"
                                    class="hero-button hero-button-secondary font-poppins text-sm py-4 px-8">
                                    Tata Cara Pendaftaran Offline
                                </button>
                                <button
                                    onclick="document.getElementById('online-registration').scrollIntoView({behavior: 'smooth'})"
                                    class="hero-button hero-button-secondary font-poppins text-sm py-4 px-8">
                                    Tata Cara Pendaftaran Online
                                </button>
                            </div>
                        </div>
                    </div>

                    <!-- Slideshow (Dinamis) -->
                    <div class="slideshow-container">
                        @php $slideIndex = 0; @endphp
                        @foreach ($ssb as $item)
                            @php
                                $images = json_decode($item->image, true);
                                if (!is_array($images)) {
                                    $images = [$item->image];
                                }
                            @endphp

                            @foreach ($images as $img)
                                <div class="slideshow-slide {{ $slideIndex === 0 ? 'active' : '' }}">
                                    <img src="{{ asset('assets/ssb/' . $img) }}" alt="{{ $item->title }}"
                                        class="slideshow-image">
                                    <div class="slideshow-overlay"></div>
                                </div>
                                @php $slideIndex++; @endphp
                            @endforeach
                        @endforeach
                    </div>

                </div>
            </div>
        </section>

        <!-- 🧩 OFFLINE REGISTRATION -->
        <section id="offline-registration" class="relative py-16 lg:py-24">
            <div class="container mx-auto px-4">
                <h2 class="section-title font-bebas">
                    Tata Cara Pendaftaran <span class="text-orange-500">Offline</span>
                </h2>

                <div class="max-w-4xl mx-auto">
                    <div class="registration-card">
                        <div class="relative overflow-hidden">
                            <img src="{{ asset('assets/Steps1.png') }}" alt="Tata Cara Pendaftaran Offline"
                                class="w-full h-auto">
                            <div class="registration-badge">OFFLINE</div>
                        </div>
                        <div class="p-6 text-center">
                            <p class="font-poppins text-gray-600">
                                Ikuti langkah-langkah pada infografis untuk pendaftaran offline di SMK PGRI 3 Malang.
                                Pastikan setiap tahapan dilakukan dengan benar agar proses berjalan lancar.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- 🧩 ONLINE REGISTRATION -->
        <section id="online-registration" class="relative py-16 lg:py-24">
            <div class="container mx-auto px-4">
                <h2 class="section-title font-bebas">
                    Tata Cara Pendaftaran <span class="text-blue-600">Online</span>
                </h2>

                <div class="max-w-4xl mx-auto">
                    <div class="registration-card">
                        <div class="relative overflow-hidden">
                            <img src="{{ asset('assets/Steps2.png') }}" alt="Tata Cara Pendaftaran Online"
                                class="w-full h-auto">
                            <div class="registration-badge blue">ONLINE</div>
                        </div>
                        <div class="p-6 text-center">
                            <p class="font-poppins text-gray-600">
                                Pendaftaran online dapat dilakukan dari mana saja dengan mengikuti langkah-langkah pada
                                infografis di atas.
                                Hubungi kami jika membutuhkan bantuan selama proses berlangsung.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- 🧩 STATISTICS SECTION -->
        <section class="relative py-16 lg:py-24">
            <div class="container mx-auto px-4">
                <h2 class="section-title font-bebas">Data Jumlah Peserta Diterima Setiap Tahun</h2>

                <div class="max-w-5xl mx-auto">
                    <div class="chart-container">
                        <h3 class="text-center font-bebas text-xl mb-4">Statistik Pendaftaran SMK PGRI 3 Malang</h3>
                        <canvas id="myChart" class="w-full h-[400px]"></canvas>
                    </div>

                    <p class="text-center text-gray-600 mt-8 max-w-2xl mx-auto font-poppins">
                        Data di atas menunjukkan peningkatan jumlah pendaftar dan peserta diterima dari tahun ke tahun.
                    </p>
                </div>
            </div>
        </section>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        // === Slideshow ===
        document.addEventListener("DOMContentLoaded", function() {
            let currentSlide = 0;
            const slides = document.querySelectorAll('.slideshow-slide');
            const totalSlides = slides.length;

            function showSlide(i) {
                slides.forEach(slide => slide.classList.remove('active'));
                slides[i].classList.add('active');
            }
            setInterval(() => {
                currentSlide = (currentSlide + 1) % totalSlides;
                showSlide(currentSlide);
            }, 3500);
        });

        // === Chart.js ===
        const ctx = document.getElementById('myChart');
        new Chart(ctx, {
            type: 'bar',
            data: {
                labels: ["2021", "2022", "2023", "2024", "2025"],
                datasets: [{
                        label: "Pendaftar",
                        data: [800, 700, 860, 870, 980],
                        backgroundColor: "rgba(253, 136, 58, 0.8)"
                    },
                    {
                        label: "Diterima",
                        data: [750, 680, 820, 830, 920],
                        backgroundColor: "rgba(54, 162, 235, 0.8)"
                    }
                ]
            },
            options: {
                responsive: true,
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    </script>
@endsection
