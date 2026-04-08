@extends('layouts.app')

@push('styles')
    <style>
        .font-bebas {
            font-family: 'Bebas Neue', cursive;
        }
        /* === Style-mu tetap dipertahankan === */
        .bg-circle-fix div {
            position: absolute;
            border-radius: 50%;
        }

        .gallery-card {
            position: relative;
            overflow: hidden;
            border-radius: 1rem;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.15);
            transition: transform 0.3s;
        }

        .gallery-card:hover {
            transform: translateY(-6px);
        }

        .gallery-image-container {
            position: relative;
            height: 420px;
            overflow: hidden;
        }

        .gallery-image {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: scale 0.5s;
        }

        .gallery-card:hover .gallery-image {
            scale: 1.05;
        }

        .gallery-overlay {
            position: absolute;
            inset: 0;
            background: linear-gradient(to top, rgba(0, 0, 0, 0.7), rgba(0, 0, 0, 0));
            opacity: 0;
            transition: opacity 0.3s;
        }

        .gallery-card:hover .gallery-overlay {
            opacity: 1;
        }

        .gallery-card-title {
            position: absolute;
            bottom: 2.5rem;
            left: 1rem;
            color: white;
            font-weight: 600;
            font-size: 1.1rem;
            line-height: 1.3;
            max-width: 90%;
            text-shadow: 1px 1px 2px rgba(0,0,0,0.8);
        }

        .gallery-card-date {
            position: absolute;
            bottom: 1rem;
            left: 1rem;
            color: #e5e7eb;
            font-size: 0.85rem;
            text-shadow: 1px 1px 2px rgba(0,0,0,0.8);
        }

        .slideshow-card {
            position: relative;
            overflow: hidden;
            border-radius: 1rem;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.15);
            height: 420px;
        }

        .slideshow-container {
            position: relative;
            width: 100%;
            height: 100%;
        }

        .slideshow-slide {
            position: absolute;
            inset: 0;
            opacity: 0;
            transition: opacity 1s ease-in-out;
        }

        .slideshow-slide.active {
            opacity: 1;
        }

        .slideshow-slide img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .slideshow-overlay {
            position: absolute;
            inset: 0;
            background: linear-gradient(to top, rgba(0, 0, 0, 0.65), rgba(0, 0, 0, 0.1));
            pointer-events: none;
        }

        .slideshow-title {
            position: absolute;
            bottom: 2.5rem;
            left: 2rem;
            color: white;
            font-size: 1.5rem;
            font-weight: 700;
            line-height: 1.3;
            max-width: 90%;
            text-shadow: 2px 2px 4px rgba(0,0,0,0.8);
            pointer-events: none;
        }

        .slideshow-date {
            position: absolute;
            bottom: 1rem;
            left: 2rem;
            color: #e5e7eb;
            text-shadow: 1px 1px 2px rgba(0,0,0,0.8);
            pointer-events: none;
        }

        .gallery-title {
            text-align: center;
            font-size: 3rem;
            font-weight: bold;
            color: #333;
            margin-top: 4rem;
            margin-bottom: 2rem;
        }

        .fade {
            animation: fadeEffect 1s;
        }

        @keyframes fadeEffect {
            from {
                opacity: 0.3;
            }
            to {
                opacity: 1;
            }
        }
    </style>
@endpush

@section('content')
    <div class="relative w-full min-h-screen overflow-hidden bg-gray-50">

        {{-- Background --}}
        <div class="bg-circle-fix inset-0">
            <div class="absolute w-96 h-96 bg-orange-200 opacity-40 -top-40 -left-40"></div>
            <div class="absolute w-80 h-80 bg-blue-200 opacity-30 -top-32 -right-32"></div>
            <div class="absolute w-72 h-72 bg-orange-100 opacity-40 top-1/3 left-1/4"></div>
            <div class="absolute w-64 h-64 bg-blue-100 opacity-30 top-1/2 right-1/3"></div>
            <div class="absolute w-80 h-80 bg-orange-300 opacity-20 bottom-40 left-20"></div>
            <div class="absolute w-96 h-96 bg-blue-300 opacity-25 bottom-48 right-32"></div>
        </div>

        <div class="absolute inset-0 bg-white bg-opacity-35 -z-0"></div>

        <div class="relative container mx-auto px-4 pt-10 md:pt-32 lg:pt-20 pb-12 z-20">

            {{-- === FALLBACK === --}}
            @if ($empty)
                <div class="flex flex-col items-center justify-center h-[60vh] text-center">
                    <h2 class="text-2xl font-semibold text-gray-700">📭 Belum ada data kegiatan</h2>
                    <p class="text-gray-500 mt-2">Tambahkan konten baru untuk melihat galeri kegiatan di sini.</p>
                </div>
            @else
                {{-- === SECTION 1: 3 slide utama === --}}
                <div class="flex justify-center">
                    <div class="grid grid-cols-1 lg:grid-cols-[300px_700px_300px] gap-6">
                        {{-- Left Card --}}
                        @if (isset($slides[1]))
                            @php
                                $leftImages = json_decode($slides[1]->image, true);
                                if (!is_array($leftImages)) {
                                    $leftImages = [$slides[1]->image];
                                }
                            @endphp
                            <div class="gallery-card">
                                <div class="gallery-image-container">
                                    <img src="{{ asset('assets/kegiatan/' . $leftImages[0]) }}"
                                        alt="{{ $slides[1]->title }}" class="gallery-image">
                                    <div class="gallery-overlay">
                                        <h3 class="gallery-card-title">{{ $slides[1]->title }}</h3>
                                        <p class="gallery-card-date">{{ $slides[1]->created_at->translatedFormat('d F Y') }}</p>
                                    </div>
                                </div>
                            </div>
                        @endif

                        {{-- Slideshow Tengah - 3 DATA TERBARU --}}
                        @if ($slides->count() >= 3)
                            <div class="slideshow-card">
                                <div class="slideshow-container">
                                    @php $slideIndex = 0; @endphp
                                    @foreach ($slides->take(3) as $slide)
                                        @php
                                            $slideImages = json_decode($slide->image, true);
                                            if (!is_array($slideImages)) {
                                                $slideImages = [$slide->image];
                                            }
                                        @endphp
                                        <div class="slideshow-slide {{ $slideIndex === 0 ? 'active' : '' }}"
                                             data-title="{{ $slide->title }}" 
                                             data-date="{{ $slide->created_at->translatedFormat('d F Y') }}">
                                            <img src="{{ asset('assets/kegiatan/' . $slideImages[0]) }}" 
                                                 alt="{{ $slide->title }}"
                                                 class="w-full h-full object-cover">
                                            <div class="slideshow-overlay"></div>
                                        </div>
                                        @php $slideIndex++; @endphp
                                    @endforeach
                                </div>
                                <div class="slideshow-overlay">
                                    <h3 id="slideTitle" class="slideshow-title">{{ $slides[0]->title }}</h3>
                                    <p id="slideDate" class="slideshow-date">{{ $slides[0]->created_at->translatedFormat('d F Y') }}</p>
                                </div>
                            </div>
                        @elseif ($slides->count() > 0)
                            {{-- Fallback jika kurang dari 3 data --}}
                            @php
                                $mainImages = json_decode($slides[0]->image, true);
                                if (!is_array($mainImages)) {
                                    $mainImages = [$slides[0]->image];
                                }
                            @endphp
                            <div class="slideshow-card">
                                <div class="slideshow-container">
                                    @foreach ($mainImages as $img)
                                        <div class="slideshow-slide {{ $loop->first ? 'active' : '' }}">
                                            <img src="{{ asset('assets/kegiatan/' . $img) }}" 
                                                 alt="{{ $slides[0]->title }}"
                                                 class="w-full h-full object-cover">
                                            <div class="slideshow-overlay"></div>
                                        </div>
                                    @endforeach
                                </div>
                                <div class="slideshow-overlay">
                                    <h3 id="slideTitle" class="slideshow-title">{{ $slides[0]->title }}</h3>
                                    <p id="slideDate" class="slideshow-date">{{ $slides[0]->created_at->translatedFormat('d F Y') }}</p>
                                </div>
                            </div>
                        @endif

                        {{-- Right Card --}}
                        @if (isset($slides[2]))
                            @php
                                $rightImages = json_decode($slides[2]->image, true);
                                if (!is_array($rightImages)) {
                                    $rightImages = [$slides[2]->image];
                                }
                            @endphp
                            <div class="gallery-card">
                                <div class="gallery-image-container">
                                    <img src="{{ asset('assets/kegiatan/' . $rightImages[0]) }}"
                                        alt="{{ $slides[2]->title }}" class="gallery-image">
                                    <div class="gallery-overlay">
                                        <h3 class="gallery-card-title">{{ $slides[2]->title }}</h3>
                                        <p class="gallery-card-date">{{ $slides[2]->created_at->translatedFormat('d F Y') }}</p>
                                    </div>
                                </div>
                            </div>
                        @endif
                    </div>
                </div>

                {{-- === SECTION 2: GALERI KEGIATAN === --}}
                <h1 class="gallery-title font-bebas">GALERI KEGIATAN</h1>

                @foreach ($gallerySections as $section)
                    <div class="container mx-auto px-4 py-6 md:py-8 lg:py-10">
                        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                            @foreach ($section as $item)
                                @php
                                    $images = json_decode($item->image, true);
                                    if (!is_array($images)) {
                                        $images = [$item->image];
                                    }
                                @endphp
                                <div class="gallery-card">
                                    <div class="gallery-image-container">
                                        <img src="{{ asset('assets/kegiatan/' . $images[0]) }}" 
                                             alt="{{ $item->title }}"
                                             class="gallery-image">
                                        <div class="gallery-overlay">
                                            <h3 class="gallery-card-title">{{ $item->title }}</h3>
                                            <p class="gallery-card-date">{{ $item->created_at->translatedFormat('d F Y') }}</p>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                @endforeach
            @endif
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        document.addEventListener("DOMContentLoaded", () => {
            const slides = document.querySelectorAll(".slideshow-slide");
            const slideTitle = document.getElementById("slideTitle");
            const slideDate = document.getElementById("slideDate");
            let currentIndex = 0;

            function showSlide(index) {
                // Hide all slides
                slides.forEach(s => s.classList.remove("active"));
                
                // Show current slide
                slides[index].classList.add("active");
                
                // Update title and date
                if (slideTitle && slideDate) {
                    slideTitle.textContent = slides[index].dataset.title;
                    slideDate.textContent = slides[index].dataset.date;
                }
            }

            // Auto slide every 4 seconds
            if (slides.length > 0) {
                setInterval(() => {
                    currentIndex = (currentIndex + 1) % slides.length;
                    showSlide(currentIndex);
                }, 4000);
            }
        });
    </script>
@endpush