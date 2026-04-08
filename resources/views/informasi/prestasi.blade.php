@extends('layouts.app')

@push('styles')
<style>
    /* === GLOBAL STYLES === */
    .font-bebas {
        font-family: 'Bebas Neue', cursive;
    }

    .font-poppins {
        font-family: 'Poppins', sans-serif;
    }

    /* === PRESTASI SECTION === */
    .prestasi-section {
        padding: 4rem 1rem 6rem;
        position: relative;
        overflow: hidden;
    }

   /* BACKGROUND CIRCLES ZIG-ZAG POSITION - TANPA BLUR */
.prestasi-section::before {
    content: '';
    position: absolute;
    width: 28rem;
    height: 28rem;
    background: linear-gradient(135deg, #FFD2A0, #FFA94D);
    border-radius: 50%;
    opacity: 0.3;
    top: -8rem;
    left: -5rem;
    z-index: -1;
}

.prestasi-section::after {
    content: '';
    position: absolute;
    width: 24rem;
    height: 24rem;
    background: linear-gradient(135deg, #B0E0FF, #87CEEB);
    border-radius: 50%;
    opacity: 0.3;
    bottom: -6rem;
    right: -4rem;
    z-index: -1;
}

/* ADDITIONAL CIRCLES FOR ZIG-ZAG EFFECT - TANPA BLUR */
.prestasi-section .circle-1 {
    position: absolute;
    width: 18rem;
    height: 18rem;
    background: linear-gradient(135deg, #FFE5B4, #FFB74D);
    border-radius: 50%;
    opacity: 0.25;
    top: 40%;
    left: 60%;
    z-index: -1;
}

.prestasi-section .circle-2 {
    position: absolute;
    width: 16rem;
    height: 16rem;
    background: linear-gradient(135deg, #A7D8FF, #4FC3F7);
    border-radius: 50%;
    opacity: 0.25;
    bottom: 20%;
    left: 10%;
    z-index: -1;
}

.prestasi-section .circle-3 {
    position: absolute;
    width: 14rem;
    height: 14rem;
    background: linear-gradient(135deg, #FFCCBC, #FF8A65);
    border-radius: 50%;
    opacity: 0.2;
    top: 15%;
    right: 15%;
    z-index: -1;
}

.prestasi-section .circle-4 {
    position: absolute;
    width: 12rem;
    height: 12rem;
    background: linear-gradient(135deg, #C8E6C9, #81C784);
    border-radius: 50%;
    opacity: 0.15;
    bottom: 40%;
    right: 25%;
    z-index: -1;
}
    .prestasi-title {
        font-size: 2.5rem;
        background: linear-gradient(135deg, #1f2937, #374151);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        background-clip: text;
        margin-bottom: 3rem;
        position: relative;
        text-align: center;
        display: block;
        width: 100%;
    }

    .prestasi-title::after {
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

    /* === PAGINATION SYSTEM === */
    .prestasi-section .prestasi-navigation {
        display: flex;
        justify-content: center;
        align-items: center;
        margin-top: 4rem;
        gap: 1.5rem;
        flex-wrap: wrap;
    }

    /* Reset dan styling dasar dengan specificity tinggi */
    .prestasi-section .prestasi-navigation .nav-button {
        /* Reset semua style default */
        appearance: none;
        -webkit-appearance: none;
        -moz-appearance: none;
        background: none;
        border: none;
        outline: none;
        margin: 0;
        font: inherit;
        color: inherit;
        text-align: inherit;
        text-decoration: none;
        cursor: pointer;
        box-sizing: border-box;
        
        /* Style dasar */
        display: inline-block;
        padding: 12px 24px;
        background: linear-gradient(135deg, #f97316, #ea580c) !important;
        color: white !important;
        border: none !important;
        border-radius: 12px;
        font-family: 'Poppins', sans-serif !important;
        font-weight: 600;
        font-size: 0.95rem;
        transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        box-shadow: 0 4px 12px rgba(249, 115, 22, 0.25) !important;
        position: relative;
        overflow: hidden;
        min-width: 120px;
        text-align: center;
        line-height: 1.5;
    }

    /* Hover effects */
    .prestasi-section .prestasi-navigation .nav-button:hover {
        transform: translateY(-2px);
        box-shadow: 0 6px 20px rgba(249, 115, 22, 0.35) !important;
    }

    /* Shine effect */
    .prestasi-section .prestasi-navigation .nav-button::after {
        content: '';
        position: absolute;
        top: 0;
        left: -100%;
        width: 100%;
        height: 100%;
        background: linear-gradient(90deg, 
            transparent, 
            rgba(255, 255, 255, 0.3), 
            transparent);
        transition: left 0.6s ease;
    }

    .prestasi-section .prestasi-navigation .nav-button:hover::after {
        left: 100%;
    }

    /* Disabled state */
    .prestasi-section .prestasi-navigation .nav-button.nav-button--disabled,
    .prestasi-section .prestasi-navigation .nav-button:disabled {
        background: linear-gradient(135deg, #e5e7eb, #d1d5db) !important;
        color: #9ca3af !important;
        cursor: not-allowed;
        transform: none;
        box-shadow: 0 2px 6px rgba(0, 0, 0, 0.1) !important;
    }

    .prestasi-section .prestasi-navigation .nav-button.nav-button--disabled:hover,
    .prestasi-section .prestasi-navigation .nav-button:disabled:hover {
        transform: none;
        box-shadow: 0 2px 6px rgba(0, 0, 0, 0.1) !important;
    }

    .prestasi-section .prestasi-navigation .nav-button.nav-button--disabled::after,
    .prestasi-section .prestasi-navigation .nav-button:disabled::after {
        display: none;
    }

    /* Page indicator */
    .prestasi-section .prestasi-navigation .page-indicator {
        display: flex;
        align-items: center;
        gap: 1rem;
        background: #f8fafc;
        padding: 10px 20px;
        border-radius: 10px;
        border: 1px solid #e2e8f0;
        font-family: 'Poppins', sans-serif;
        font-weight: 600;
        color: #475569;
    }

    .prestasi-section .prestasi-navigation .page-numbers {
        display: flex;
        gap: 0.5rem;
        align-items: center;
    }

    .prestasi-section .prestasi-navigation .current-page {
        color: #f97316;
        font-size: 1.1rem;
    }

    .prestasi-section .prestasi-navigation .total-pages {
        color: #64748b;
    }

    .prestasi-section .prestasi-navigation .page-slash {
        color: #cbd5e1;
    }

    /* Page Transitions */
    .prestasi-content-wrapper {
        position: relative;
        min-height: 600px;
    }

    .prestasi-page {
        opacity: 0;
        transform: translateY(20px);
        transition: all 0.5s ease-in-out;
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        pointer-events: none;
    }

    .prestasi-page--active {
        opacity: 1;
        transform: translateY(0);
        position: relative;
        pointer-events: all;
    }

    /* Loading State */
    .prestasi-loading {
        display: none;
        text-align: center;
        padding: 2rem;
        color: #6b7280;
        font-family: 'Poppins', sans-serif;
    }

    .prestasi-loading--visible {
        display: block;
    }

/* === DUAL ACHIEVEMENT LAYOUT === */
.achievement-container {
    display: flex;
    flex-direction: column;
    gap: 2.5rem;
    max-width: 1400px;
    margin: 0 auto;
    position: relative;
    z-index: 10;
}

.achievement-pair {
    display: flex;
    justify-content: space-between;
    flex-wrap: wrap;
    gap: 2rem;
    align-items: stretch; /* Ubah dari flex-start menjadi stretch */
}

/* Card dasar dengan tinggi tetap */
.achievement-item {
    display: flex;
    align-items: stretch;
    flex: 1 1 48%;
    background: white;
    border-radius: 1.5rem;
    box-shadow: 0 15px 35px rgba(0, 0, 0, 0.1);
    padding: 2rem;
    transition: all 0.4s ease;
    border: 1px solid #f3f4f6;
    position: relative;
    overflow: hidden;
    min-height: 400px; /* Tinggi minimum yang sama untuk semua card */
    height: auto; /* Biarkan tinggi menyesuaikan konten */
    max-height: 500px; /* Tinggi maksimum */
}

.achievement-item::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    height: 4px;
    background: linear-gradient(90deg, #f97316, #fdba74);
    opacity: 0;
    transition: opacity 0.3s ease;
}

.achievement-item:hover::before {
    opacity: 1;
}

.achievement-item:hover {
    transform: translateY(-8px);
    box-shadow: 0 25px 50px rgba(0, 0, 0, 0.15);
    border-color: #f97316;
}

/* Layout kiri */
.achievement-item.left-layout {
    flex-direction: row;
    text-align: left;
}

.achievement-item.left-layout .achievement-image-container {
    margin-right: 1.5rem;
}

/* Layout kanan */
.achievement-item.right-layout {
    flex-direction: row-reverse;
    text-align: right;
}

.achievement-item.right-layout .achievement-image-container {
    margin-left: 1.5rem;
}

/* CONTAINER GAMBAR BESAR - Ukuran tetap */
.achievement-image-container {
    flex: 0 0 45%;
    position: relative;
    display: flex;
    align-items: center;
    justify-content: center;
    min-height: 260px; /* Tinggi minimum gambar */
}

/* GAMBAR BESAR - Ukuran konsisten */
.achievement-image {
    width: 100%;
    height: 100%;
    max-width: 260px;
    max-height: 260px;
    min-width: 220px;
    min-height: 220px;
    object-fit: cover;
    border-radius: 1rem;
    box-shadow: 0 8px 25px rgba(0,0,0,0.15);
    transition: all 0.4s ease;
    border: 3px solid white;
    position: relative;
    z-index: 2;
}

.achievement-image:hover {
    transform: scale(1.05);
    box-shadow: 0 12px 30px rgba(0,0,0,0.2);
}

/* Konten teks dengan scroll */
.achievement-content {
    flex: 1;
    position: relative;
    z-index: 2;
    display: flex;
    flex-direction: column;
    justify-content: flex-start; /* Ubah dari center menjadi flex-start */
    overflow: hidden; /* Sembunyikan overflow */
}

.achievement-content h3 {
    font-family: 'Bebas Neue', cursive;
    font-size: 2rem;
    margin-bottom: 0.5rem;
    background: linear-gradient(135deg, #1f2937, #374151);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    background-clip: text;
    position: relative;
    letter-spacing: 1px;
    line-height: 1.2;
    flex-shrink: 0; /* Judul tidak mengecil */
}

.achievement-content h3::after {
    content: "";
    position: absolute;
    bottom: -0.4rem;
    left: 0;
    width: 50px;
    height: 3px;
    background: linear-gradient(90deg, #f97316, #fdba74);
    border-radius: 2px;
}

.achievement-item.right-layout .achievement-content h3::after {
    left: auto;
    right: 0;
}

.achievement-content h4 {
    font-family: 'Bebas Neue', cursive;
    font-size: 1.5rem;
    color: #f97316;
    margin-bottom: 0.8rem;
    letter-spacing: 0.5px;
    line-height: 1.2;
    flex-shrink: 0; /* Credit tidak mengecil */
}

/* Container untuk teks dengan scroll */
.achievement-text-container {
    flex: 1;
    overflow-y: auto; /* Scroll vertikal */
    max-height: 200px; /* Tinggi maksimum untuk teks */
    margin-top: 0.8rem;
    padding-right: 8px; /* Ruang untuk scrollbar */
}

/* Style scrollbar */
.achievement-text-container::-webkit-scrollbar {
    width: 6px;
}

.achievement-text-container::-webkit-scrollbar-track {
    background: #f1f1f1;
    border-radius: 3px;
}

.achievement-text-container::-webkit-scrollbar-thumb {
    background: #c1c1c1;
    border-radius: 3px;
}

.achievement-text-container::-webkit-scrollbar-thumb:hover {
    background: #a8a8a8;
}

.achievement-content p {
    font-family: 'Poppins', sans-serif;
    font-size: 0.95rem;
    color: #6b7280;
    line-height: 1.6;
    margin: 0;
}

/* Indikator scroll (opsional) */
.achievement-text-container::after {
    content: '';
    position: absolute;
    bottom: 0;
    left: 0;
    right: 8px;
    height: 20px;
    background: linear-gradient(transparent, white);
    pointer-events: none;
    opacity: 0;
    transition: opacity 0.3s ease;
}

.achievement-text-container.scrollable::after {
    opacity: 1;
}

/* === RESPONSIVE DESIGN === */
@media (max-width: 768px) {
    .achievement-pair {
        flex-direction: column;
        gap: 1.5rem;
    }

    .achievement-item {
        flex-direction: column !important;
        text-align: center !important;
        padding: 1.5rem;
        min-height: auto !important;
        max-height: none !important;
        margin-top: 0 !important;
        height: auto;
    }

    .achievement-item .achievement-image-container {
        margin: 0 0 1rem 0 !important;
        flex: 0 0 auto;
        min-height: 200px;
    }

    .achievement-content h3::after {
        left: 50% !important;
        transform: translateX(-50%);
    }

    .achievement-image {
        width: 200px;
        height: 200px;
        max-width: none;
        max-height: none;
    }
    
    .achievement-content {
        padding: 0;
    }

    .achievement-text-container {
        max-height: 150px; /* Lebih kecil di mobile */
    }
}
    @media (max-width: 480px) {
        .prestasi-title {
            font-size: 2rem;
        }

        .prestasi-section .prestasi-navigation .nav-button {
            font-size: 0.9rem;
            padding: 8px 16px;
        }

        .achievement-image {
            width: 180px;
            height: 180px;
        }
    }
    /* Zig-zag pattern murni dengan CSS */
.achievement-pair:nth-child(odd) .achievement-item:first-child {
    margin-top: 0;
    transform: translateY(-10px);
}

.achievement-pair:nth-child(odd) .achievement-item:last-child {
    margin-top: 30px;
    transform: translateY(0);
}

.achievement-pair:nth-child(even) .achievement-item:first-child {
    margin-top: 30px;
    transform: translateY(0);
}

.achievement-pair:nth-child(even) .achievement-item:last-child {
    margin-top: 0;
    transform: translateY(-10px);
}
</style>
@endpush

@section('content')
    <div class="min-h-screen">

        <!-- HERO SECTION -->
        <section class="pt-4 pb-5 relative overflow-hidden bg-transparent">
            <!-- === BACKGROUND CIRCLE HERO === -->
            <div class="absolute inset-0 -z-[1] pointer-events-none overflow-visible">
                <div class="absolute w-[30rem] h-[30rem] bg-[#FFD2A0] rounded-full opacity-30 -top-40 -left-40 ]"></div>
                <div class="absolute w-[25rem] h-[25rem] bg-[#B0E0FF] rounded-full opacity-30 -top-20 -right-32 "></div>
            </div>

            <div class="container mx-auto flex flex-col items-center text-center gap-4 px-4 md:px-16">
                <!-- Text -->
                <div class="hero-text">
                    <h1 class="text-orange-500 text-5xl md:text-6xl font-bebas leading-tight">
                        SKAriga
                    </h1>
                    <h2 class="text-black text-4xl md:text-5xl font-bebas leading-tight">
                        sekolahnya murid berprestasi
                    </h2>
                </div>

                <!-- Image Stack -->
<!-- Image Stack -->
<!-- Sekarang dinamis: ambil 3 foto pertama dari $allPrestasi -->
<div id="image-stack" class="relative flex items-center justify-center w-full h-96 md:h-[26rem]">
    @php
        // Ambil hanya 3 prestasi pertama yang punya gambar
        $topPrestasi = $allPrestasi->filter(fn($item) => !empty($item->image))->take(3);
    @endphp

    @forelse($topPrestasi as $index => $prestasi)
        <img src="{{ asset('assets/' . $prestasi->folder . '/' . $prestasi->image) }}"
            alt="{{ $prestasi->title ?? 'Prestasi ' . ($index + 1) }}"
            class="absolute w-3/4 sm:w-1/2 md:w-[30%] h-80 md:h-[26rem] object-cover rounded-xl shadow-lg transition-all duration-500 ease-custom"
        >
    @empty
        {{-- Jika tidak ada data, tampilkan 3 fallback gambar default --}}
        <img src="{{ asset('assets/prestasi/default1.jpg') }}"
            alt="Prestasi Default 1"
            class="absolute w-3/4 sm:w-1/2 md:w-[30%] h-80 md:h-[26rem] object-cover rounded-xl shadow-lg transition-all duration-500 ease-custom">
        <img src="{{ asset('assets/prestasi/default2.jpg') }}"
            alt="Prestasi Default 2"
            class="absolute w-3/4 sm:w-1/2 md:w-[30%] h-80 md:h-[26rem] object-cover rounded-xl shadow-lg transition-all duration-500 ease-custom">
        <img src="{{ asset('assets/prestasi/default3.jpg') }}"
            alt="Prestasi Default 3"
            class="absolute w-3/4 sm:w-1/2 md:w-[30%] h-80 md:h-[26rem] object-cover rounded-xl shadow-lg transition-all duration-500 ease-custom">
    @endforelse
</div>

        </section>

        <!-- PRESTASI SECTION -->
        <section class="prestasi-section">
            <h2 class="prestasi-title font-bebas">PRESTASI TERBARU</h2>
            
            <!-- Loading State -->
            <div class="prestasi-loading" id="prestasiLoading">
                <p>Memuat prestasi...</p>
            </div>

            <!-- Content Wrapper -->
            <div class="prestasi-content-wrapper" id="prestasiContent">
                @php
                    $itemsPerPage = 6; // 3 pairs per page
                    $calculatedTotalPages = ceil($allPrestasi->count() / $itemsPerPage);
                @endphp
                
                @if($allPrestasi->count() > 0)
                    @for($i = 0; $i < $calculatedTotalPages; $i++)
                        <div class="prestasi-page {{ $i === 0 ? 'prestasi-page--active' : '' }}" 
                             data-page="{{ $i + 1 }}"
                             id="prestasiPage{{ $i + 1 }}">
                            <div class="achievement-container slide-in">
                                @php
                                    $pagePrestasi = $allPrestasi->slice($i * $itemsPerPage, $itemsPerPage);
                                    $chunkedPrestasi = $pagePrestasi->chunk(2);
                                @endphp
                                
                                @foreach($chunkedPrestasi as $index => $pair)
    <div class="achievement-pair">
        @foreach($pair as $pairIndex => $prestasi)
            @php
                // Layout sederhana berdasarkan pairIndex
                $layoutClass = $pairIndex == 0 ? 'left-layout' : 'right-layout';
            @endphp
            
            <div class="achievement-item {{ $layoutClass }}">
                <div class="achievement-image-container">
                    <img src="{{ asset('assets/' . $prestasi->folder . '/' . $prestasi->image) }}" 
                         alt="{{ $prestasi->title }}" 
                         class="achievement-image">
                </div>
                <div class="achievement-content">
                    <h3 class="font-bebas">{{ $prestasi->title }}</h3>
                    <h4 class="font-bebas">{{ $prestasi->credit }}</h4>
                    <p class="font-poppins">{{ $prestasi->body }}</p>
                </div>
            </div>
        @endforeach
    </div>
@endforeach
                            </div>
                        </div>
                    @endfor
                @else
                    <div class="prestasi-page prestasi-page--active">
                        <p class="text-center text-gray-500 font-poppins">Belum ada data prestasi.</p>
                    </div>
                @endif
            </div>

            <!-- Navigation - Only show if there are multiple pages -->
            @if($calculatedTotalPages > 1)
                <div class="prestasi-navigation">
                    <button 
                        id="prevButton" 
                        data-action="prev"
                        class="nav-button"
                        disabled
                    >
                        ← Sebelumnya
                    </button>

                    <div class="page-indicator">
                        <div class="page-numbers">
                            <span class="current-page" id="currentPage">1</span>
                            <span class="page-slash">/</span>
                            <span class="total-pages" id="totalPages">{{ $calculatedTotalPages }}</span>
                        </div>
                    </div>

                    <button 
                        id="nextButton" 
                        data-action="next"
                        class="nav-button"
                    >
                        Selanjutnya →
                    </button>
                </div>
            @endif
        </section>
    </div>
@endsection

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Elements
        const prestasiContent = document.getElementById('prestasiContent');
        const prestasiLoading = document.getElementById('prestasiLoading');
        const prevButton = document.getElementById('prevButton');
        const nextButton = document.getElementById('nextButton');
        const currentPageEl = document.getElementById('currentPage');
        const totalPagesEl = document.getElementById('totalPages');
        
        // State - AMBIL TOTAL PAGES DARI ELEMENT HTML
        let currentPage = 1;
        const totalPages = totalPagesEl ? parseInt(totalPagesEl.textContent) : 1;
        let isAnimating = false;

        // Initialize
        function initPagination() {
            if (totalPages <= 1) {
                if (prevButton) prevButton.style.display = 'none';
                if (nextButton) nextButton.style.display = 'none';
                return;
            }

            updateNavigation();
            hideLoading();
        }

        // Navigation functions
        function goToPage(page) {
            if (isAnimating || page < 1 || page > totalPages) return;
            
            showLoading();
            isAnimating = true;

            // Hide current page
            const currentPageElement = document.querySelector('.prestasi-page--active');
            if (currentPageElement) {
                currentPageElement.classList.remove('prestasi-page--active');
            }

            // Update current page
            currentPage = page;

            // Show new page after a short delay for smooth transition
            setTimeout(() => {
                const newPageElement = document.getElementById(`prestasiPage${page}`);
                if (newPageElement) {
                    newPageElement.classList.add('prestasi-page--active');
                }
                
                updateNavigation();
                hideLoading();
                isAnimating = false;
            }, 300);
        }

        function updateNavigation() {
            // Update page indicator
            if (currentPageEl) {
                currentPageEl.textContent = currentPage;
            }

            // Update button states
            if (prevButton) {
                prevButton.disabled = currentPage === 1;
                prevButton.classList.toggle('nav-button--disabled', currentPage === 1);
            }
            
            if (nextButton) {
                nextButton.disabled = currentPage === totalPages;
                nextButton.classList.toggle('nav-button--disabled', currentPage === totalPages);
            }
        }

        function showLoading() {
            if (prestasiLoading) {
                prestasiLoading.classList.add('prestasi-loading--visible');
            }
            if (prestasiContent) {
                prestasiContent.style.opacity = '0.5';
            }
        }

        function hideLoading() {
            if (prestasiLoading) {
                prestasiLoading.classList.remove('prestasi-loading--visible');
            }
            if (prestasiContent) {
                prestasiContent.style.opacity = '1';
            }
        }

        // Event listeners
        if (prevButton) {
            prevButton.addEventListener('click', function() {
                if (!this.disabled) {
                    goToPage(currentPage - 1);
                }
            });
        }

        if (nextButton) {
            nextButton.addEventListener('click', function() {
                if (!this.disabled) {
                    goToPage(currentPage + 1);
                }
            });
        }

        // Keyboard navigation
        document.addEventListener('keydown', function(event) {
            if (event.key === 'ArrowLeft' && currentPage > 1) {
                goToPage(currentPage - 1);
            } else if (event.key === 'ArrowRight' && currentPage < totalPages) {
                goToPage(currentPage + 1);
            }
        });

        // Initialize pagination
        initPagination();

        // Add animation to cards when they become visible
        const observerOptions = {
            threshold: 0.1,
            rootMargin: '0px 0px -50px 0px'
        };

        const observer = new IntersectionObserver(function(entries) {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('slide-in');
                }
            });
        }, observerOptions);

        // Observe all achievement items
        document.querySelectorAll('.achievement-item').forEach(card => {
            observer.observe(card);
        });

        // Image stack animation
        const stack = document.querySelectorAll("#image-stack img");
        let index = 0;

        setTimeout(() => cycleImages(), 400);

        function cycleImages() {
            const order = [
                stack[index % stack.length],
                stack[(index + 1) % stack.length],
                stack[(index + 2) % stack.length],
            ];

            stack.forEach(img => {
                img.style.transition = "all 0.6s cubic-bezier(0.55, 0.085, 0.68, 0.53)";
                img.style.opacity = 0.7;
                img.style.zIndex = 10;
                img.style.transform = "translateY(8px) scale(0.85)";
            });

            const screenWidth = window.innerWidth;
            let offset = screenWidth < 640 ? 6 : screenWidth < 1024 ? 10 : 14;

            order[2].style.transform = `translateX(-${offset}rem) translateY(4px) scale(0.85) rotateY(8deg)`;
            order[2].style.opacity = 0.75;
            order[2].style.zIndex = 15;

            order[1].style.transform = `translateX(${offset}rem) translateY(4px) scale(0.85) rotateY(-8deg)`;
            order[1].style.opacity = 0.75;
            order[1].style.zIndex = 20;

            order[0].style.transition = "all 0.8s cubic-bezier(0.25, 1, 0.5, 1)";
            order[0].style.opacity = 1;
            order[0].style.zIndex = 30;
            order[0].style.transform = "translateX(0) translateY(0) scale(1) rotateY(0deg)";

            index++;
            setTimeout(cycleImages, 2500);
        }
    });
</script>
@endpush