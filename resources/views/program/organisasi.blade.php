@extends('layouts.app')

@section('content')
    <div class="min-h-screen">

        <!-- Background Circles -->
        <div class="fixed inset-0 -z-10 overflow-hidden pointer-events-none">
            <div class="absolute w-96 h-96 bg-blue-200 rounded-full opacity-30 -top-40 -left-40"></div>
            <div class="absolute w-72 h-72 bg-orange-200 rounded-full opacity-30 top-40 left-20"></div>
            <div class="absolute w-80 h-80 bg-blue-100 rounded-full opacity-30 bottom-40 right-40"></div>
            <div class="absolute w-64 h-64 bg-orange-100 rounded-full opacity-40 bottom-20 right-10"></div>
            <div class="absolute w-64 h-64 bg-blue-300 rounded-full opacity-20 top-1/3 left-1/3"></div>
            <div class="absolute w-56 h-56 bg-orange-300 rounded-full opacity-20 bottom-1/3 right-1/3"></div>
        </div>

        <!-- Section: Organisasi OSIS -->
        <section class="py-24 md:py-16 px-4 relative overflow-hidden">
            <div
                class="max-w-4xl mx-auto bg-white rounded-3xl p-8 md:p-12 shadow-2xl border border-gray-100 relative overflow-hidden">
                <!-- Animated background gradient -->
                <div
                    class="absolute -top-1/2 -left-1/2 w-full h-full bg-gradient-to-r from-orange-100/20 via-blue-100/20 to-orange-100/20 animate-spin-slow">
                </div>

                <div class="w-48 h-48 mx-auto mb-8 relative z-10">
                    <img src="{{ asset('assets/osis.png') }}" alt="Foto OSIS"
                        class="w-full h-full object-cover rounded-full border-4 border-orange-500 transition-transform duration-300 hover:scale-105">
                </div>

                <h2
                    class="text-4xl md:text-5xl font-bebas text-center mb-4 bg-gradient-to-br from-gray-800 to-gray-700 bg-clip-text text-transparent relative z-10">
                    ORGANISASI OSIS
                </h2>

                <p class="text-lg text-gray-600 leading-relaxed text-center max-w-3xl mx-auto relative z-10 font-poppins">
                    Organisasi Siswa Intra Sekolah (OSIS) SMK PGRI 3 Malang adalah wadah resmi bagi siswa untuk
                    merealisasikan aspirasi, mengembangkan bakat dan minat, serta melatih kepemimpinan dan tanggung jawab.
                    OSIS aktif mengadakan berbagai program sekolah, baik di bidang akademik, olahraga, seni, maupun sosial
                    kemasyarakatan.
                </p>
            </div>
        </section>

        <!-- Section: Ekstrakurikuler -->
        <section id="ekskul-section" class="py-16 md:py-20 px-4">
            <h2
                class="text-4xl md:text-5xl font-bebas text-center mb-12 bg-gradient-to-br from-gray-800 to-gray-700 bg-clip-text text-transparent relative">
                EKSTRAKURIKULER
                <span
                    class="absolute -bottom-3 left-1/2 transform -translate-x-1/2 w-24 h-1 bg-gradient-to-r from-orange-500 to-orange-300 rounded"></span>
            </h2>

            <!-- Content -->
            <div id="ekskul-content">
                <!-- Grid untuk ekstrakurikuler -->
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 max-w-7xl mx-auto">
                    @forelse ($eks as $item)
                        @php
                            $images = json_decode($item->image, true);
                            if (!is_array($images) || empty($images)) {
                                $images = [$item->image];
                            }
                            $firstImage = $images[0];
                        @endphp
                        <div 
                            class="bg-white rounded-2xl overflow-hidden shadow-xl transition-all duration-400 border border-gray-100 hover:-translate-y-3 hover:shadow-2xl hover:border-orange-500 relative scroll-reveal"
                            style="opacity: 0; transform: translateY(20px);"
                        >
                            <div class="relative h-64 overflow-hidden">
                                <img src="{{ asset('assets/ekstrakulikuler' . '/' . $firstImage) }}"
                                    alt="{{ $item->title }}"
                                    class="w-full h-full object-cover transition-transform duration-400 ease-in-out hover:scale-105">
                                <div class="absolute inset-0 bg-gradient-to-b from-transparent to-black/70"></div>
                                <div
                                    class="absolute top-4 right-4 bg-gradient-to-br from-orange-500 to-orange-600 text-white px-4 py-2 rounded-full text-sm font-semibold shadow-lg shadow-orange-500/30 z-10">
                                    EKSTRAKURIKULER
                                </div>
                            </div>
                            <div class="absolute bottom-0 left-0 right-0 p-6 text-white z-10">
                                <h3 class="text-2xl font-bebas font-bold mb-2">{{ $item->title }}</h3>
                                <p class="text-gray-100 text-sm leading-relaxed opacity-90 font-poppins line-clamp-3">
                                    {{ $item->body }}
                                </p>
                            </div>
                        </div>
                    @empty
                        <div class="col-span-3 text-center py-12">
                            <p class="text-gray-500 text-lg">Belum ada data ekstrakurikuler.</p>
                        </div>
                    @endforelse
                </div>
                
                <!-- Pagination -->
                @if($eks->hasPages())
                <div class="ekskul-navigation flex justify-center items-center mt-12 gap-6">
                    <!-- Previous Button -->
                    <button 
                        class="nav-button {{ $eks->onFirstPage() ? 'nav-button--disabled' : '' }}"
                        {{ $eks->onFirstPage() ? 'disabled' : '' }}
                        data-url="{{ $eks->previousPageUrl() }}"
                    >
                        ← Sebelumnya
                    </button>

                    <!-- Page Indicator -->
                    <div class="page-indicator">
                        <div class="page-numbers">
                            <span class="current-page">{{ $eks->currentPage() }}</span>
                            <span class="page-slash">/</span>
                            <span class="total-pages">{{ $eks->lastPage() }}</span>
                        </div>
                    </div>

                    <!-- Next Button -->
                    <button 
                        class="nav-button {{ !$eks->hasMorePages() ? 'nav-button--disabled' : '' }}"
                        {{ !$eks->hasMorePages() ? 'disabled' : '' }}
                        data-url="{{ $eks->nextPageUrl() }}"
                    >
                        Selanjutnya →
                    </button>
                </div>
                @endif
            </div>
        </section>

    </div>

    <script>
        // Scroll reveal animation
        function initScrollReveal() {
            const revealElements = document.querySelectorAll('.scroll-reveal');

            const observer = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        entry.target.style.opacity = '1';
                        entry.target.style.transform = 'translateY(0)';
                        // Stop observing after animation
                        observer.unobserve(entry.target);
                    }
                });
            }, {
                threshold: 0.1,
                rootMargin: '0px 0px -50px 0px'
            });

            revealElements.forEach(element => {
                observer.observe(element);
            });
        }

        // Custom animation for pagination button hover
        function initPaginationButtonEffects() {
            const buttons = document.querySelectorAll('.nav-button:not(.nav-button--disabled)');
            
            buttons.forEach(button => {
                button.addEventListener('mouseenter', function() {
                    if (!this.disabled && !this.classList.contains('nav-button--disabled')) {
                        // Create shine effect
                        const shine = document.createElement('div');
                        shine.style.cssText = `
                            position: absolute;
                            top: 0;
                            left: -100%;
                            width: 100%;
                            height: 100%;
                            background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.3), transparent);
                            transition: transform 0.6s ease;
                            z-index: 1;
                        `;
                        this.style.position = 'relative';
                        this.style.overflow = 'hidden';
                        this.appendChild(shine);

                        // Trigger animation
                        setTimeout(() => {
                            shine.style.transform = 'translateX(200%)';
                        }, 10);

                        // Clean up
                        setTimeout(() => {
                            if (this.contains(shine)) {
                                this.removeChild(shine);
                            }
                        }, 600);
                    }
                });
            });
        }

        // AJAX Pagination
        function initAjaxPagination() {
            document.addEventListener('click', function(e) {
                // Cek jika klik berasal dari pagination button
                if (e.target.matches('.nav-button') && !e.target.disabled && !e.target.classList.contains('nav-button--disabled')) {
                    e.preventDefault();
                    
                    const url = e.target.getAttribute('data-url');
                    if (!url) return;

                    loadEkskulPage(url);
                }
            });
        }

        function loadEkskulPage(url) {
            // Show loading state
            const ekskulContent = document.getElementById('ekskul-content');
            const originalContent = ekskulContent.innerHTML;
            
            ekskulContent.innerHTML = `
                <div class="flex justify-center items-center py-12">
                    <div class="animate-spin rounded-full h-12 w-12 border-b-2 border-orange-500"></div>
                    <span class="ml-3 text-gray-600">Memuat...</span>
                </div>
            `;

            // Scroll ke section ekskul untuk feedback visual
            document.getElementById('ekskul-section').scrollIntoView({
                behavior: 'smooth',
                block: 'start'
            });

            // AJAX request
            fetch(url, {
                headers: {
                    'X-Requested-With': 'XMLHttpRequest',
                    'Accept': 'text/html'
                }
            })
            .then(response => {
                if (!response.ok) {
                    throw new Error('Network response was not ok');
                }
                return response.text();
            })
            .then(html => {
                // Parse HTML response dan ekstrak hanya bagian ekskul-content
                const parser = new DOMParser();
                const doc = parser.parseFromString(html, 'text/html');
                const newContent = doc.getElementById('ekskul-content');
                
                if (newContent) {
                    ekskulContent.innerHTML = newContent.innerHTML;
                    
                    // Re-initialize animations and effects
                    initScrollReveal();
                    initPaginationButtonEffects();
                    
                    // Update URL tanpa reload page
                    window.history.pushState({}, '', url);
                } else {
                    throw new Error('Invalid response format');
                }
            })
            .catch(error => {
                console.error('Error loading page:', error);
                ekskulContent.innerHTML = originalContent;
                
                // Show error message
                const errorDiv = document.createElement('div');
                errorDiv.className = 'text-center py-4 text-red-500';
                errorDiv.textContent = 'Terjadi kesalahan saat memuat data. Silakan coba lagi.';
                ekskulContent.prepend(errorDiv);
            });
        }

        // Handle browser back/forward buttons
        window.addEventListener('popstate', function() {
            loadEkskulPage(window.location.href);
        });

        // Initialize when page loads
        document.addEventListener('DOMContentLoaded', function() {
            initScrollReveal();
            initPaginationButtonEffects();
            initAjaxPagination();
            
            // Add hover effects for cards
            const cards = document.querySelectorAll('.scroll-reveal');
            cards.forEach(card => {
                const img = card.querySelector('img');
                if (img) {
                    card.addEventListener('mouseenter', () => {
                        img.style.transform = 'scale(1.05)';
                    });
                    card.addEventListener('mouseleave', () => {
                        img.style.transform = 'scale(1)';
                    });
                }
            });
        });
    </script>

    <style>
        .font-bebas {
            font-family: 'Bebas Neue', cursive;
        }

        .font-poppins {
            font-family: 'Poppins', sans-serif;
        }

        /* Line clamp untuk text */
        .line-clamp-3 {
            display: -webkit-box;
            -webkit-line-clamp: 3;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }

        /* === PAGINATION STYLES === */
        .ekskul-navigation {
            display: flex;
            justify-content: center;
            align-items: center;
            margin-top: 4rem;
            gap: 1.5rem;
            flex-wrap: wrap;
        }

        /* Reset dan styling dasar */
        .ekskul-navigation .nav-button {
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
        .ekskul-navigation .nav-button:not(.nav-button--disabled):not(:disabled):hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(249, 115, 22, 0.35) !important;
        }

        /* Disabled state */
        .ekskul-navigation .nav-button.nav-button--disabled,
        .ekskul-navigation .nav-button:disabled {
            background: linear-gradient(135deg, #e5e7eb, #d1d5db) !important;
            color: #9ca3af !important;
            cursor: not-allowed;
            transform: none;
            box-shadow: 0 2px 6px rgba(0, 0, 0, 0.1) !important;
        }

        .ekskul-navigation .nav-button.nav-button--disabled:hover,
        .ekskul-navigation .nav-button:disabled:hover {
            transform: none;
            box-shadow: 0 2px 6px rgba(0, 0, 0, 0.1) !important;
        }

        /* Page indicator */
        .ekskul-navigation .page-indicator {
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

        .ekskul-navigation .page-numbers {
            display: flex;
            gap: 0.5rem;
            align-items: center;
        }

        .ekskul-navigation .current-page {
            color: #f97316;
            font-size: 1.1rem;
        }

        .ekskul-navigation .total-pages {
            color: #64748b;
        }

        .ekskul-navigation .page-slash {
            color: #cbd5e1;
        }

        /* Custom animations */
        @keyframes spin-slow {
            from {
                transform: rotate(0deg);
            }
            to {
                transform: rotate(360deg);
            }
        }

        .animate-spin-slow {
            animation: spin-slow 20s linear infinite;
        }

        /* Card animations */
        .scroll-reveal {
            transition: all 0.6s cubic-bezier(0.25, 0.46, 0.45, 0.94);
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            .ekskul-navigation {
                gap: 1rem;
                flex-direction: column;
            }

            .ekskul-navigation .nav-button {
                min-width: 140px;
                padding: 10px 20px;
            }

            .ekskul-navigation .page-indicator {
                order: -1;
            }
            
            .grid {
                gap: 1.5rem;
            }
        }

        @media (max-width: 480px) {
            .ekskul-navigation .nav-button {
                font-size: 0.9rem;
                padding: 8px 16px;
                min-width: 120px;
            }
        }
    </style>
@endsection