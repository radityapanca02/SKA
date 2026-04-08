@extends('layouts.app')

@section('content')
<div class="min-h-screen bg-white-100 py-4 md:py-8">
    <!-- Background Circles (tanpa blur) -->
    <div class="fixed inset-0 -z-10 overflow-hidden pointer-events-none">
        <!-- Circle 1 - Orange (Top Left) -->
        <div class="absolute w-64 h-64 md:w-96 md:h-96 bg-orange-200 rounded-full opacity-40 -top-20 -left-20 md:-top-40 md:-left-40"></div>

        <!-- Circle 2 - Blue (Top Right) -->
        <div class="absolute w-56 h-56 md:w-80 md:h-80 bg-blue-200 rounded-full opacity-30 -top-16 -right-16 md:-top-32 md:-right-32"></div>

        <!-- Circle 3 - Orange (Bottom Left) -->
        <div class="absolute w-48 h-48 md:w-72 md:h-72 bg-orange-100 rounded-full opacity-50 bottom-16 left-16 md:bottom-32 md:left-32"></div>

        <!-- Circle 4 - Blue (Bottom Right) -->
        <div class="absolute w-64 h-64 md:w-96 md:h-96 bg-blue-100 rounded-full opacity-30 bottom-24 right-24 md:bottom-48 md:right-48"></div>

        <!-- Tambahan untuk kedalaman -->
        <div class="absolute w-40 h-40 md:w-64 md:h-64 bg-orange-300 rounded-full opacity-20 top-1/4 left-1/4"></div>
        <div class="absolute w-36 h-36 md:w-56 md:h-56 bg-blue-300 rounded-full opacity-20 top-1/3 right-1/3"></div>
    </div>

    <div class="max-w-7xl mx-auto px-3 sm:px-4">
        <h2 class="text-center text-3xl sm:text-4xl md:text-5xl font-bebas text-gray-800 mb-6 md:mb-8">DEPARTEMEN UNGGULAN SKARIGA</h2>

        <!-- Search Bar -->
        <div class="mb-6 md:mb-8 max-w-2xl mx-auto relative z-30">
            <div class="relative">
                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                    <i class="fas fa-search text-gray-400 text-sm md:text-base"></i>
                </div>
                <input 
                    type="text" 
                    id="searchInput"
                    placeholder="Cari jurusan berdasarkan nama, keterampilan, atau bidang pekerjaan..."
                    class="w-full pl-10 pr-10 py-3 md:py-4 border border-gray-300 rounded-xl focus:ring-2 focus:ring-orange-500 focus:border-transparent transition-all duration-300 shadow-sm text-sm md:text-base"
                >
                <div class="absolute inset-y-0 right-0 pr-3 flex items-center">
                    <button 
                        id="clearSearch"
                        class="hidden text-gray-400 hover:text-gray-600 transition-colors p-1"
                    >
                        <i class="fas fa-times text-sm md:text-base"></i>
                    </button>
                </div>
            </div>
            <div id="searchResults" class="absolute left-0 right-0 mt-1 bg-white border border-gray-200 rounded-xl shadow-lg max-h-60 overflow-y-auto z-40 hidden"></div>
        </div>

        <!-- Banner Rekomendasi -->
        <div id="recommendationBanner" class="hidden mb-6 md:mb-8 bg-gradient-to-r from-orange-50 to-blue-50 border-l-4 border-orange-500 p-4 md:p-6 rounded-lg relative z-20">
            <div class="flex items-center justify-between">
                <div class="flex-1">
                    <h3 class="text-lg md:text-xl font-bold text-gray-800 mb-2">
                        <i class="fas fa-star text-orange-500 mr-2"></i>
                        Jurusan Rekomendasi untuk Anda
                    </h3>
                    <p class="text-gray-600 text-sm md:text-base" id="recommendedMajorText"></p>
                </div>
                <button onclick="closeRecommendationBanner()" class="text-gray-400 hover:text-gray-600 transition-colors flex-shrink-0 ml-2">
                    <i class="fas fa-times text-lg md:text-xl"></i>
                </button>
            </div>
        </div>

        <div class="space-y-6 md:space-y-8 relative z-10">
            @foreach($departments as $deptKey => $dept)
            <div class="relative bg-white rounded-2xl overflow-hidden shadow-xl md:shadow-2xl min-h-[300px] md:min-h-[400px] z-0" id="department-{{ $deptKey }}">

                {{-- COVER DEPARTEMEN --}}
                <div id="cover-{{ $deptKey }}" class="transition-all duration-500 ease-in-out z-0">
                    <div onclick="showFirstMajor('{{ $deptKey }}')" class="cursor-pointer h-full relative">
                        <img src="{{ $dept['cover'] }}" alt="{{ $dept['title'] }}" class="w-full h-[300px] md:h-[400px] object-cover">
                        <div class="absolute inset-0 bg-black/50 flex flex-col justify-center items-start px-4 md:px-8">
                            <span class="text-white text-sm md:text-lg mb-1 md:mb-2 font-medium">Departemen</span>
                            <h3 class="text-white text-2xl md:text-4xl font-bold mb-2 md:mb-3">{{ strtoupper($dept['title']) }}</h3>
                            <p class="text-white text-xs md:text-base">Klik untuk melihat jurusan →</p>
                        </div>
                    </div>
                </div>

                {{-- DETAIL JURUSAN --}}
                <div id="detail-{{ $deptKey }}" 
                     class="absolute inset-0 bg-white rounded-2xl z-50 opacity-0 pointer-events-none transition-all duration-500 overflow-hidden">

                    {{-- CARD JURUSAN --}}
                    <div class="department-card h-full" id="department-card-{{ $deptKey }}"></div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>

<script src="https://unpkg.com/lucide@latest"></script>

<script>
const departmentData = @json($departments);
const activeMajors = {};
let isTransitioning = false;

// Search functionality
let searchTimeout = null;

document.addEventListener('DOMContentLoaded', function() {
    initializeSearch();
    checkRecommendedMajor();
    scrollToSelectedDepartment();
});

function initializeSearch() {
    const searchInput = document.getElementById('searchInput');
    const clearSearch = document.getElementById('clearSearch');
    const searchResults = document.getElementById('searchResults');

    searchInput.addEventListener('input', function(e) {
        const query = e.target.value.trim();
        
        // Toggle clear button
        if (query.length > 0) {
            clearSearch.classList.remove('hidden');
        } else {
            clearSearch.classList.add('hidden');
            searchResults.classList.add('hidden');
            return;
        }

        // Debounce search
        clearTimeout(searchTimeout);
        searchTimeout = setTimeout(() => {
            performSearch(query);
        }, 300);
    });

    clearSearch.addEventListener('click', function() {
        searchInput.value = '';
        clearSearch.classList.add('hidden');
        searchResults.classList.add('hidden');
        searchInput.focus();
    });

    // Hide results when clicking outside
    document.addEventListener('click', function(e) {
        if (!searchInput.contains(e.target) && !searchResults.contains(e.target)) {
            searchResults.classList.add('hidden');
        }
    });

    // Handle enter key
    searchInput.addEventListener('keypress', function(e) {
        if (e.key === 'Enter') {
            const query = e.target.value.trim();
            if (query.length > 0) {
                performSearch(query, true);
            }
        }
    });

    // Handle escape key
    searchInput.addEventListener('keydown', function(e) {
        if (e.key === 'Escape') {
            searchResults.classList.add('hidden');
            searchInput.blur();
        }
    });
}

function performSearch(query, isEnter = false) {
    const searchResults = document.getElementById('searchResults');
    
    if (query.length < 2) {
        searchResults.classList.add('hidden');
        return;
    }

    const results = searchMajors(query);
    
    if (results.length > 0) {
        displaySearchResults(results);
        searchResults.classList.remove('hidden');
    } else {
        searchResults.innerHTML = `
            <div class="p-4 text-center text-gray-500">
                <i class="fas fa-search mb-2 text-gray-400 text-lg"></i>
                <p class="text-sm">Tidak ditemukan jurusan dengan kata kunci "${query}"</p>
            </div>
        `;
        searchResults.classList.remove('hidden');
    }

    // Jika enter ditekan dan ada hasil, buka hasil pertama
    if (isEnter && results.length > 0) {
        openSearchResult(results[0]);
    }
}

function searchMajors(query) {
    const results = [];
    const lowerQuery = query.toLowerCase();

    // Search through all departments and majors
    for (const [deptKey, dept] of Object.entries(departmentData)) {
        const majors = dept.majors || [];
        
        for (let i = 0; i < majors.length; i++) {
            const major = majors[i];
            let matchScore = 0;

            // Check name match (highest priority)
            if (major.name.toLowerCase().includes(lowerQuery)) {
                matchScore += 100;
            }

            // Check description match
            if (major.desc && major.desc.toLowerCase().includes(lowerQuery)) {
                matchScore += 50;
            }

            // Check skills match
            if (major.skills && major.skills.toLowerCase().includes(lowerQuery)) {
                matchScore += 30;
            }

            // Check careers match
            if (major.careers && major.careers.toLowerCase().includes(lowerQuery)) {
                matchScore += 20;
            }

            // Check department name match
            if (dept.title.toLowerCase().includes(lowerQuery)) {
                matchScore += 10;
            }

            if (matchScore > 0) {
                results.push({
                    deptKey,
                    deptName: dept.title,
                    majorIndex: i,
                    major: major,
                    matchScore: matchScore
                });
            }
        }
    }

    // Sort by match score (highest first)
    return results.sort((a, b) => b.matchScore - a.matchScore);
}

function displaySearchResults(results) {
    const searchResults = document.getElementById('searchResults');
    
    searchResults.innerHTML = results.map(result => `
        <div class="search-result-item p-3 border-b border-gray-100 hover:bg-orange-50 cursor-pointer transition-all duration-200"
             onclick="openSearchResult(${JSON.stringify(result).replace(/"/g, '&quot;')})">
            <div class="flex justify-between items-start mb-1">
                <h4 class="font-semibold text-gray-800 text-sm">${result.major.name}</h4>
                <span class="text-xs bg-blue-100 text-blue-800 px-2 py-1 rounded-full whitespace-nowrap ml-2">${result.deptName}</span>
            </div>
            <p class="text-xs text-gray-600 line-clamp-2 mb-1">${result.major.desc || ''}</p>
            <div class="flex items-center text-xs text-gray-500">
                <i class="fas fa-arrow-right mr-1 text-orange-500"></i>
                <span>Klik untuk membuka jurusan</span>
            </div>
        </div>
    `).join('');

    // Add "clear results" option if many results
    if (results.length > 5) {
        searchResults.innerHTML += `
            <div class="p-2 text-center border-t border-gray-100 bg-gray-50">
                <button onclick="clearSearchResults()" class="text-xs text-orange-600 hover:text-orange-700 font-medium">
                    <i class="fas fa-times mr-1"></i>
                    Hapus Pencarian
                </button>
            </div>
        `;
    }
}

function openSearchResult(result) {
    const searchInput = document.getElementById('searchInput');
    const searchResults = document.getElementById('searchResults');
    
    // Hide search results dan clear input
    searchResults.classList.add('hidden');
    searchInput.value = '';
    document.getElementById('clearSearch').classList.add('hidden');
    
    console.log('Opening search result:', result);
    
    // Scroll to department terlebih dahulu
    const departmentElement = document.getElementById(`department-${result.deptKey}`);
    if (departmentElement) {
        departmentElement.scrollIntoView({ 
            behavior: 'smooth', 
            block: 'center'
        });

        // Tunggu scroll selesai, lalu buka departemen dan langsung ke jurusan spesifik
        setTimeout(() => {
            // Buka departemen dan langsung tampilkan jurusan yang dicari
            showSpecificMajor(result.deptKey, result.majorIndex);
            
            // Highlight jurusan yang dicari
            highlightSearchedMajor(result.deptKey);
        }, 800);
    }
}

function clearSearchResults() {
    const searchInput = document.getElementById('searchInput');
    const searchResults = document.getElementById('searchResults');
    const clearSearch = document.getElementById('clearSearch');
    
    searchInput.value = '';
    searchResults.classList.add('hidden');
    clearSearch.classList.add('hidden');
}

function highlightSearchedMajor(deptKey) {
    const card = document.getElementById(`department-card-${deptKey}`);
    if (card) {
        // Hapus animasi sebelumnya
        card.style.animation = 'none';
        
        // Trigger reflow
        void card.offsetWidth;
        
        // Apply animasi baru
        card.style.animation = 'searchHighlight 2s ease-in-out';
        
        const inner = card.querySelector('.major-inner');
        if (inner) {
            inner.style.boxShadow = '0 0 0 3px rgba(59, 130, 246, 0.5)';
            inner.style.transition = 'box-shadow 0.3s ease';
            
            setTimeout(() => {
                inner.style.boxShadow = '0 20px 40px rgba(0,0,0,0.1)';
            }, 3000);
        }
    }
}

// Check for recommended major on page load
let countdownInterval = null;

function checkRecommendedMajor() {
    const selectedMajor = localStorage.getItem('selectedMajor');
    const recommendedMajorsStr = localStorage.getItem('recommendedMajors');
    
    if (selectedMajor && recommendedMajorsStr) {
        try {
            const recommendedMajors = JSON.parse(recommendedMajorsStr);
            
            if (recommendedMajors && recommendedMajors.timestamp) {
                const currentTime = Date.now();
                const timeElapsed = currentTime - recommendedMajors.timestamp;
                const expiresIn = recommendedMajors.expiresIn || 15000; // 15 detik
                
                if (timeElapsed < expiresIn) {
                    // Data masih valid, tampilkan rekomendasi dengan countdown
                    showRecommendationBanner(selectedMajor, recommendedMajors);
                    
                    // Auto-scroll dan buka jurusan yang sesuai setelah delay
                    setTimeout(() => {
                        scrollToRecommendedMajor(selectedMajor);
                    }, 1000);

                    // Start countdown timer
                    startCountdownTimer(expiresIn - timeElapsed);
                    
                    return;
                }
            }
        } catch (error) {
            console.error('Error parsing recommendation data:', error);
        }
    }
    
    // Jika data tidak valid atau sudah kedaluwarsa, hapus dari localStorage
    removeRecommendation();
}

function removeRecommendation() {
    // Hentikan countdown
    if (countdownInterval) {
        clearInterval(countdownInterval);
        countdownInterval = null;
    }
    
    const banner = document.getElementById('recommendationBanner');
    if (banner) {
        banner.classList.add('hidden');
    }
    
    // Hapus data dari localStorage
    localStorage.removeItem('selectedMajor');
    localStorage.removeItem('recommendedMajors');
    
    console.log('Rekomendasi jurusan telah direset');
}

window.addEventListener('beforeunload', removeRecommendation);

document.addEventListener('visibilitychange', function() {
    if (document.hidden) {
        removeRecommendation();
    }
});

function showRecommendationBanner(selectedMajor, majorsData) {
    const banner = document.getElementById('recommendationBanner');
    const bannerText = document.getElementById('recommendedMajorText');
    
    if (!banner || !bannerText) return;
    
    let recommendationText = `Berdasarkan minat Anda, kami merekomendasikan: <strong>${selectedMajor}</strong>`;
    
    if (majorsData.utama && majorsData.utama.description) {
        recommendationText += ` - ${majorsData.utama.description.substring(0, 100)}...`;
    }
    
    // Initial countdown display akan diupdate oleh startCountdownTimer
    const initialTimeLeft = Math.ceil((majorsData.expiresIn - (Date.now() - majorsData.timestamp)) / 1000);
    recommendationText += `<br><small class="recommendation-timer">⏰ Rekomendasi ini akan hilang dalam <strong>${initialTimeLeft}</strong> detik</small>`;
    
    bannerText.innerHTML = recommendationText;
    banner.classList.remove('hidden');
}

function closeRecommendationBanner() {
    const banner = document.getElementById('recommendationBanner');
    banner.classList.add('hidden');
    localStorage.removeItem('selectedMajor');
    localStorage.removeItem('recommendedMajors');
}

function scrollToRecommendedMajor(majorName) {
    console.log('Mencari jurusan:', majorName);
    
    let foundDepartment = null;
    let foundMajorIndex = -1;

    // Cari jurusan yang cocok di semua department
    for (const [deptKey, dept] of Object.entries(departmentData)) {
        const majors = dept.majors || [];
        
        for (let i = 0; i < majors.length; i++) {
            const major = majors[i];
            // Cek kesamaan nama jurusan (case insensitive, partial match)
            if (major.name.toLowerCase().includes(majorName.toLowerCase()) || 
                majorName.toLowerCase().includes(major.name.toLowerCase())) {
                
                foundDepartment = deptKey;
                foundMajorIndex = i;
                console.log('Jurusan ditemukan:', major.name, 'di department:', deptKey, 'index:', i);
                break;
            }
        }
        
        if (foundDepartment) break;
    }

    if (foundDepartment !== null && foundMajorIndex !== -1) {
        // Scroll ke department yang sesuai
        const departmentElement = document.getElementById(`department-${foundDepartment}`);
        if (departmentElement) {
            departmentElement.scrollIntoView({ 
                behavior: 'smooth', 
                block: 'center'
            });

            // Auto-buka department dan tampilkan jurusan yang sesuai
            setTimeout(() => {
                showSpecificMajor(foundDepartment, foundMajorIndex);
            }, 800);
        }
    } else {
        console.log('Jurusan tidak ditemukan, membuka halaman normal');
    }
}

/* === SHOW SPECIFIC MAJOR === */
function showSpecificMajor(deptId, majorIndex) {
    const cover = document.getElementById(`cover-${deptId}`);
    const detail = document.getElementById(`detail-${deptId}`);
    
    // Sembunyikan cover dan tampilkan detail
    cover.style.opacity = '0';
    cover.style.pointerEvents = 'none';
    detail.classList.remove('opacity-0', 'pointer-events-none');
    detail.classList.add('opacity-100');
    
    // Set state dan render jurusan yang spesifik
    activeMajors[deptId] = majorIndex;
    renderMajorDetail(deptId, majorIndex);

    // Highlight card yang direkomendasikan
    setTimeout(() => {
        highlightRecommendedCard(deptId);
    }, 500);
}

function highlightRecommendedCard(deptId) {
    const card = document.getElementById(`department-card-${deptId}`);
    if (card) {
        card.style.animation = 'pulseHighlight 2s ease-in-out';
        
        // Tambahkan border highlight
        const inner = card.querySelector('.major-inner');
        if (inner) {
            inner.style.boxShadow = '0 0 0 3px rgba(249, 115, 22, 0.5)';
            inner.style.transition = 'box-shadow 0.3s ease';
            
            // Hapus highlight setelah beberapa detik
            setTimeout(() => {
                inner.style.boxShadow = '0 20px 40px rgba(0,0,0,0.1)';
            }, 3000);
        }
    }
}

/* === SHOW / HIDE === */
function showFirstMajor(deptId) {
    const cover = document.getElementById(`cover-${deptId}`);
    const detail = document.getElementById(`detail-${deptId}`);
    cover.style.opacity = '0';
    cover.style.pointerEvents = 'none';
    detail.classList.remove('opacity-0', 'pointer-events-none');
    detail.classList.add('opacity-100');
    activeMajors[deptId] = 0;
    renderMajorDetail(deptId, 0);
}

function returnToCover(deptId) {
    const cover = document.getElementById(`cover-${deptId}`);
    const detail = document.getElementById(`detail-${deptId}`);
    detail.classList.remove('opacity-100');
    detail.classList.add('opacity-0', 'pointer-events-none');
    cover.style.opacity = '1';
    cover.style.pointerEvents = 'auto';
}

/* === NAVIGATION === */
function nextMajor(deptId) {
    if (isTransitioning) return;
    isTransitioning = true;
    const majors = departmentData[deptId]?.majors || [];
    const total = majors.length + 1;
    activeMajors[deptId] = (activeMajors[deptId] + 1) % total;
    renderMajorDetail(deptId, activeMajors[deptId]);
    setTimeout(() => (isTransitioning = false), 500);
}

function prevMajor(deptId) {
    if (isTransitioning) return;
    isTransitioning = true;
    const majors = departmentData[deptId]?.majors || [];
    const total = majors.length + 1;
    activeMajors[deptId] = (activeMajors[deptId] - 1 + total) % total;
    renderMajorDetail(deptId, activeMajors[deptId]);
    setTimeout(() => (isTransitioning = false), 500);
}

/* === RENDER CARD === */
function renderMajorDetail(deptId, index) {
    const majors = departmentData[deptId]?.majors || [];
    const total = majors.length;
    const container = document.getElementById(`department-card-${deptId}`);
    container.innerHTML = "";

    // Closing card
    if (index === total) {
        container.innerHTML = `
        <div class="major-card closing-card">
            <div class="major-inner relative">
                <img src="${departmentData[deptId].cover}" alt="${departmentData[deptId].title}" class="w-full h-full object-cover">
                <div class="absolute inset-0 bg-black bg-opacity-70 flex flex-col justify-center items-center text-center px-4 md:px-8">
                    <h3 class="text-white text-2xl md:text-4xl font-bold mb-4 md:mb-6">Selamat Menjelajahi!</h3>
                    <p class="text-white text-base md:text-xl mb-6 md:mb-8">Anda sudah melihat semua jurusan di ${departmentData[deptId].title}</p>
                    <button onclick="returnToCover('${deptId}')" class="bg-white text-gray-900 px-6 py-3 md:px-8 md:py-4 rounded-xl font-semibold shadow-2xl hover:bg-gray-200 transition-all transform hover:scale-105 active:scale-95 text-sm md:text-base">
                        ← Kembali ke Departemen
                    </button>
                </div>
            </div>
        </div>`;
        return;
    }

    const major = majors[index];
    if (!major) return;

    // Cek apakah ini jurusan yang direkomendasikan
    const selectedMajor = localStorage.getItem('selectedMajor');
    const isRecommended = selectedMajor && (
        major.name.toLowerCase().includes(selectedMajor.toLowerCase()) || 
        selectedMajor.toLowerCase().includes(major.name.toLowerCase())
    );

    container.innerHTML = `
    <div class="major-card ${isRecommended ? 'recommended-major' : ''}">
        <div class="major-inner">
            <div class="image-section">
                <img src="${major.image}" alt="${major.name}">
                ${isRecommended ? `
                <div class="absolute top-2 left-2 md:top-4 md:left-4 bg-orange-500 text-white px-2 py-1 md:px-3 md:py-1 rounded-full text-xs md:text-sm font-semibold animate-pulse">
                    ⭐ Rekomendasi
                </div>
                ` : ''}
            </div>
            <div class="content-section">
                <!-- Mobile Header - Nama Jurusan di Mobile -->
                <div class="mobile-major-header md:hidden">
                    <h3 class="mobile-major-title">${major.name}</h3>
                </div>

                <div class="content-header hidden md:block">
                    <h3 class="major-title">${major.name}</h3>
                    <p class="major-description">${major.desc}</p>
                </div>

                <div class="skills-section">
                    <h4 class="section-title">
                        <i data-lucide="lightbulb" class="icon"></i>
                        Keterampilan yang Dibutuhkan
                    </h4>
                    <div class="section-content">
                        ${major.skills ? major.skills.split('\\n').map(s => `<div class="skill-item">${s.trim()}</div>`).join('') : 
                        `<div class="skill-item">Kemampuan dasar teknis</div>
                         <div class="skill-item">Kerjasama tim & komunikasi</div>
                         <div class="skill-item">Kreativitas dan problem solving</div>`}
                    </div>
                </div>

                <div class="career-section">
                    <h4 class="section-title">
                        <i data-lucide="briefcase" class="icon"></i>
                        Pekerjaan Utama
                    </h4>
                    <div class="section-content">
                        ${major.careers ? major.careers.split('\\n').map(s => `<div class="career-item">${s.trim()}</div>`).join('') : 
                        `<div class="career-item">Teknisi profesional</div>
                         <div class="career-item">Konsultan bidang terkait</div>
                         <div class="career-item">Wirausahawan kreatif</div>`}
                    </div>
                </div>

                <div class="mobile-description md:hidden mt-4">
                    <p class="text-gray-600 text-sm leading-relaxed">${major.desc}</p>
                </div>

                <div class="decor-icon"><i data-lucide="cpu"></i></div>
            </div>
        </div>
    </div>`;

    // Render Lucide icons
    lucide.createIcons();

    setupDragSwipe(deptId);
}

/* === DRAG & SWIPE === */
function setupDragSwipe(deptId) {
    const card = document.getElementById(`department-card-${deptId}`);
    const inner = card?.querySelector('.major-inner');
    if (!inner) return;

    let startX = 0, currentX = 0, velocity = 0;
    let isDragging = false, lastX = 0, lastTime = 0;

    const start = (x) => {
        if (isTransitioning) return;
        isDragging = true;
        startX = x; lastX = x; lastTime = Date.now();
        inner.style.transition = 'none';
    };

    const move = (x) => {
        if (!isDragging) return;
        currentX = x - startX;
        const now = Date.now();
        const deltaTime = now - lastTime;
        if (deltaTime > 0) velocity = (x - lastX) / deltaTime;
        lastX = x; lastTime = now;
        const eased = currentX * 0.7;
        inner.style.transform = `translateX(${eased}px) rotateY(${eased * 0.02}deg)`;
    };

    const end = () => {
        if (!isDragging) return;
        isDragging = false;
        const threshold = 100;
        if (Math.abs(currentX) > threshold) {
            inner.style.transition = 'all 0.4s ease';
            inner.style.transform = `translateX(${currentX < 0 ? -300 : 300}px) rotateY(${currentX < 0 ? -15 : 15}deg)`;
            setTimeout(() => currentX < 0 ? nextMajor(deptId) : prevMajor(deptId), 200);
        } else {
            inner.style.transition = 'all 0.4s ease';
            inner.style.transform = 'translateX(0) rotateY(0)';
        }
    };

    inner.addEventListener('mousedown', e => start(e.clientX));
    window.addEventListener('mousemove', e => move(e.clientX));
    window.addEventListener('mouseup', end);

    inner.addEventListener('touchstart', e => start(e.touches[0].clientX), { passive: true });
    inner.addEventListener('touchmove', e => move(e.touches[0].clientX), { passive: true });
    inner.addEventListener('touchend', end);
}

// Fungsi untuk auto-scroll ke departemen yang dipilih
function scrollToSelectedDepartment() {
    const selectedDepartment = localStorage.getItem('selectedDepartment');
    
    if (selectedDepartment) {
        console.log('Mencari departemen:', selectedDepartment);
        
        // Mapping nama departemen ke ID
        const departmentMap = {
            'TIK': 'department-tik',
            'Pemesinan': 'department-pemesinan', 
            'Kelistrikan': 'department-elektro',
            'Otomotif': 'department-otomotif'
        };
        
        const departmentId = departmentMap[selectedDepartment];
        
        if (departmentId) {
            const departmentElement = document.getElementById(departmentId);
            if (departmentElement) {
                // Scroll ke departemen yang dipilih
                departmentElement.scrollIntoView({ 
                    behavior: 'smooth', 
                    block: 'center'
                });
                
                // Auto-buka departemen setelah delay
                setTimeout(() => {
                    showFirstMajor(departmentId.replace('department-', ''));
                    
                    // Highlight departemen yang dipilih
                    highlightSelectedDepartment(departmentElement);
                }, 800);
                
                // Hapus selectedDepartment setelah digunakan
                setTimeout(() => {
                    localStorage.removeItem('selectedDepartment');
                }, 2000);
            }
        }
    }
}

// Fungsi untuk highlight departemen yang dipilih
function highlightSelectedDepartment(departmentElement) {
    departmentElement.style.transition = 'all 0.5s ease';
    departmentElement.style.boxShadow = '0 0 0 3px rgba(249, 115, 22, 0.5)';
    
    // Hapus highlight setelah beberapa detik
    setTimeout(() => {
        departmentElement.style.boxShadow = '0 20px 40px rgba(0,0,0,0.1)';
    }, 3000);
}

// Pastikan fungsi tersedia di global scope
window.showSpecificMajor = showSpecificMajor;
window.closeRecommendationBanner = closeRecommendationBanner;
window.openSearchResult = openSearchResult;
window.clearSearchResults = clearSearchResults;

</script>

<style>
/* Z-Index Management */
.min-h-screen {
    position: relative;
    z-index: 1;
}

/* Search Bar Styles */
.search-container {
    position: relative;
    width: 100%;
    max-width: 100%;
    z-index: 30;
}

#searchInput {
    font-size: 0.95rem;
    background: white;
    border: 2px solid #e5e7eb;
    transition: all 0.3s ease;
    box-sizing: border-box;
    position: relative;
    z-index: 31;
}

#searchResults {
    position: absolute;
    width: 100%;
    background: white;
    border: 1px solid #e5e7eb;
    margin-top: 4px;
    box-sizing: border-box;
    max-width: 100%;
    left: 0;
    right: 0;
    z-index: 40;
    box-shadow: 0 10px 30px rgba(0,0,0,0.15);
}

#searchInput:focus {
    border-color: #f97316;
    box-shadow: 0 0 0 3px rgba(249, 115, 22, 0.1);
    outline: none;
}

#searchInput::placeholder {
    color: #9ca3af;
    font-size: 0.9rem;
}

#clearSearch {
    transition: all 0.2s ease;
    background: none;
    border: none;
    cursor: pointer;
    padding: 4px;
}

#clearSearch:hover {
    transform: scale(1.1);
    background: #f3f4f6;
    border-radius: 50%;
}

/* Search Results Styles */
.search-result-item {
    border-bottom: 1px solid #f3f4f6;
    transition: all 0.2s ease;
    cursor: pointer;
    overflow: hidden;
}

.search-result-item:last-child {
    border-bottom: none;
}

.search-result-item:hover {
    background: #fff7ed;
    transform: translateX(2px);
}

.search-result-item h4 {
    transition: color 0.2s ease;
    word-wrap: break-word;
    overflow-wrap: break-word;
}

.search-result-item:hover h4 {
    color: #f97316;
}

/* Animation for search highlight */
@keyframes searchHighlight {
    0%, 100% { 
        transform: scale(1);
    }
    50% { 
        transform: scale(1.01);
    }
}

/* Style untuk countdown timer */
.recommendation-timer {
    font-size: 0.875rem;
    color: #dc2626;
    font-weight: 600;
    animation: pulse 1.5s infinite;
    background: rgba(254, 226, 226, 0.3);
    padding: 4px 8px;
    border-radius: 6px;
    margin-top: 4px;
    display: inline-block;
}

.recommendation-timer strong {
    color: #dc2626;
    font-size: 1rem;
    animation: bounce 0.5s infinite alternate;
}

@keyframes pulse {
    0%, 100% { 
        opacity: 1;
        transform: scale(1);
    }
    50% { 
        opacity: 0.8;
        transform: scale(1.02);
    }
}

@keyframes bounce {
    from { transform: scale(1); }
    to { transform: scale(1.1); }
}

/* Style untuk banner rekomendasi */
#recommendationBanner {
    border-left: 4px solid #f97316;
    background: linear-gradient(135deg, #fed7aa 0%, #bfdbfe 100%);
    box-shadow: 0 4px 12px rgba(249, 115, 22, 0.2);
}

/* Ensure no overflow */
.search-container {
    position: relative;
    width: 100%;
    max-width: 100%;
}

/* Text overflow handling */
.line-clamp-2 {
    display: -webkit-box;
    -webkit-line-clamp: 2;
    -webkit-box-orient: vertical;
    overflow: hidden;
}

.whitespace-nowrap {
    white-space: nowrap;
}

/* Style untuk highlight departemen */
.department-highlight {
    animation: departmentPulse 2s ease-in-out;
    border: 3px solid rgba(249, 115, 22, 0.5);
    border-radius: 20px;
}

@keyframes departmentPulse {
    0%, 100% { 
        box-shadow: 0 0 0 0 rgba(249, 115, 22, 0.7);
    }
    50% { 
        box-shadow: 0 0 0 10px rgba(249, 115, 22, 0);
    }
}

.font-bebas {
    font-family: 'Bebas Neue', cursive;
}
.font-poppins {
    font-family: 'Poppins', sans-serif;
}

.department-card {
    width: 100%;
    height: 100%;
    background: white;
    border-radius: 20px;
    display: flex;
    overflow: hidden;
    perspective: 1000px;
    box-sizing: border-box;
}

.major-card {
    width: 100%;
    height: 100%;
    user-select: none;
    cursor: grab;
    box-sizing: border-box;
}

.major-card.recommended-major .major-inner {
    border: 3px solid #f97316;
    box-shadow: 0 0 20px rgba(249, 115, 22, 0.3);
}

.major-inner {
    display: flex;
    flex-direction: row;
    width: 100%;
    height: 100%;
    background: white;
    border-radius: 20px;
    overflow: hidden;
    transition: all 0.5s ease;
    box-shadow: 0 20px 40px rgba(0,0,0,0.1);
    box-sizing: border-box;
}

/* Animasi highlight */
@keyframes pulseHighlight {
    0% { transform: scale(1); }
    50% { transform: scale(1.02); }
    100% { transform: scale(1); }
}

/* IMAGE */
.image-section {
    width: 40%;
    position: relative;
}
.image-section img {
    width: 100%;
    height: 100%;
    object-fit: cover;
}

/* CONTENT */
.content-section {
    width: 60%;
    padding: 40px 45px;
    display: flex;
    flex-direction: column;
    justify-content: center;
    overflow-y: auto;
    position: relative;
}

/* Mobile Header untuk Nama Jurusan */
.mobile-major-header {
    display: none;
    margin-bottom: 16px;
    padding-bottom: 12px;
    border-bottom: 2px solid #f97316;
}

.mobile-major-title {
    font-size: 1.4rem;
    font-weight: 800;
    color: #111;
    margin: 0;
    text-align: center;
}

.mobile-description {
    display: none;
    background: #f8fafc;
    padding: 12px;
    border-radius: 8px;
    border-left: 3px solid #f97316;
}

.major-title {
    font-size: 2.2rem;
    font-weight: 800;
    color: #111;
    margin-bottom: 10px;
}
.major-description {
    color: #555;
    font-size: 1.1rem;
    line-height: 1.6;
    margin-bottom: 20px;
}

/* SECTIONS */
.section-title {
    font-size: 1.2rem;
    font-weight: 600;
    color: #222;
    margin-bottom: 10px;
    display: flex;
    align-items: center;
    gap: 8px;
}
.section-title .icon {
    width: 22px;
    height: 22px;
    color: #2563eb;
    stroke-width: 2.2;
    flex-shrink: 0;
}
.section-content { 
    color: #444; 
    max-height: none;
}
.skill-item, .career-item {
    padding: 8px 0 8px 14px;
    border-bottom: 1px solid #eee;
    position: relative;
}
.skill-item:before, .career-item:before {
    content: "•";
    color: #3b82f6;
    position: absolute;
    left: 0;
}
.skill-item:last-child, .career-item:last-child { border-bottom: none; }

/* DECOR ICON */
.decor-icon {
    position: absolute;
    bottom: 25px;
    right: 35px;
    opacity: 0.08;
    pointer-events: none;
}
.decor-icon i {
    width: 90px;
    height: 90px;
    stroke-width: 1.5;
    color: #000;
}

/* RESPONSIVE BREAKPOINTS */
@media (max-width: 1024px) {
    .major-inner { 
        flex-direction: column; 
        height: auto;
        min-height: 100%;
    }
    .image-section { 
        width: 100%; 
        height: 250px; 
    }
    .content-section { 
        width: 100%; 
        padding: 30px; 
        height: auto;
        overflow-y: visible;
    }
    .major-title { 
        font-size: 1.8rem; 
    }
    .decor-icon {
        bottom: 15px;
        right: 25px;
    }
    .decor-icon i {
        width: 70px;
        height: 70px;
    }
}

@media (max-width: 768px) {
    .content-section { 
        padding: 25px 20px; 
        height: auto;
        overflow-y: visible;
    }
    
    /* Tampilkan mobile header dan sembunyikan desktop header */
    .mobile-major-header {
        display: block;
    }
    .mobile-description {
        display: block;
    }
    .content-header {
        display: none;
    }
    
    .major-title { 
        font-size: 1.5rem; 
    }
    .major-description { 
        font-size: 1rem; 
    }
    #searchInput {
        font-size: 16px;
        padding: 12px 40px 12px 40px;
    }
    #searchResults {
        max-height: 50vh;
    }
    .search-result-item {
        padding: 12px;
    }
    .section-title {
        font-size: 1.1rem;
    }
    .section-title .icon {
        width: 20px;
        height: 20px;
    }
    .decor-icon {
        bottom: 10px;
        right: 20px;
    }
    .decor-icon i {
        width: 60px;
        height: 60px;
    }
    
    /* Adjust sections for mobile */
    .skills-section,
    .career-section {
        margin-bottom: 20px;
    }
    
    /* Enable scrolling for the entire content section on mobile */
    .department-card {
        height: 100%;
        overflow-y: auto;
    }
    
    .major-inner {
        min-height: 100vh;
        height: auto;
    }
    
    .content-section {
        max-height: none;
        overflow-y: visible;
    }
}

@media (max-width: 640px) {
    .major-inner {
        border-radius: 16px;
    }
    .content-section {
        padding: 20px 16px;
    }
    
    .mobile-major-title {
        font-size: 1.3rem;
    }
    
    .mobile-description {
        font-size: 0.9rem;
        line-height: 1.5;
    }
    
    .section-title {
        font-size: 1rem;
        margin-bottom: 8px;
    }
    .skill-item, .career-item {
        padding: 6px 0 6px 12px;
        font-size: 0.9rem;
    }
    .decor-icon {
        display: none;
    }
    
    /* Better spacing for mobile */
    .skills-section {
        margin-bottom: 16px;
    }
    
    .career-section {
        margin-bottom: 16px;
    }
}

@media (max-width: 480px) {
    .content-section { 
        padding: 16px 12px; 
    }
    
    .mobile-major-title { 
        font-size: 1.2rem; 
    }
    
    .mobile-description { 
        font-size: 0.85rem; 
        line-height: 1.4;
        padding: 10px;
    }
    
    .section-title {
        font-size: 0.95rem;
    }
    .section-title .icon {
        width: 18px;
        height: 18px;
    }
    .skill-item, .career-item {
        font-size: 0.85rem;
        padding: 5px 0 5px 10px;
    }
    
    /* Mobile-specific touch improvements */
    .major-card {
        cursor: default;
    }
    
    /* Better touch targets */
    .skill-item, .career-item {
        min-height: 24px;
        display: flex;
        align-items: center;
    }
    
    /* Reduce image height on very small screens */
    .image-section {
        height: 200px;
    }
}

/* Landscape orientation for mobile */
@media (max-height: 500px) and (orientation: landscape) {
    .department-card {
        height: 100vh;
        overflow-y: auto;
    }
    .image-section {
        height: 200px;
    }
    .content-section {
        padding: 20px;
        overflow-y: visible;
    }
    
    /* Show mobile header in landscape too */
    .mobile-major-header {
        display: block;
    }
    .mobile-description {
        display: block;
    }
    .content-header {
        display: none;
    }
}

/* High DPI screens */
@media (-webkit-min-device-pixel-ratio: 2), (min-resolution: 192dpi) {
    .image-section img {
        image-rendering: -webkit-optimize-contrast;
        image-rendering: crisp-edges;
    }
}

/* Reduced motion for accessibility */
@media (prefers-reduced-motion: reduce) {
    .major-inner,
    .department-card,
    .search-result-item,
    #recommendationBanner,
    #searchInput {
        transition: none;
        animation: none;
    }
}

/* Print styles */
@media print {
    .department-card {
        break-inside: avoid;
        box-shadow: none;
        border: 1px solid #ccc;
    }
    .major-inner {
        flex-direction: column;
    }
    .image-section {
        width: 100%;
        height: 200px;
    }
    .content-section {
        width: 100%;
    }
    .mobile-major-header {
        display: block;
    }
    .mobile-description {
        display: block;
    }
    .content-header {
        display: none;
    }
}
/* Tambahkan di bagian CSS */
.min-h-screen {
    position: relative;
    z-index: 1;
}

/* Pastikan footer di layout.app memiliki z-index yang lebih tinggi */
footer {
    position: relative;
    z-index: 20;
}
</style>
@endsection