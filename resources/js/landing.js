function redirect() { globalThis.location.href = "/jurusan"; }
function setupKeywordInput(keywordInput, keywordDropdown) {
    keywordInput.addEventListener('focus', function () {
        keywordDropdown.classList.remove('hidden');
    });
    keywordInput.addEventListener('blur', function () {
        setTimeout(() => {
            keywordDropdown.classList.add('hidden');
        }, 200);
    });
}

function attachRedirectButton(button) {
    button.addEventListener('click', function () {
        localStorage.setItem('selectedMajor', this.dataset.major);
        globalThis.location.href = '/jurusan';
    });
}

function setupRedirectButtons() {
    document.querySelectorAll('.redirect-btn').forEach(button => {
        attachRedirectButton(button);
    });
}

async function handleFormSubmit(e) {
    e.preventDefault();
    submitButton.disabled = true;
    submitButton.innerHTML = '<svg class="animate-spin -ml-1 mr-3 h-5 w-5 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"><circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle><path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path></svg>Memproses...';
    try {
        const response = await fetch("/api/gemini", { method: "POST", headers: { "Content-Type": "application/json", "X-CSRF-TOKEN": document.querySelector('meta[name="csrf-token"]').getAttribute("content") }, body: JSON.stringify({ keyword: keywordInput.value }) });
        const data = await response.json();
        if (!response.ok) throw new Error(data.error || 'Terjadi kesalahan');
        if (data.jurusan_utama?.name === "Tidak ditemukan") {
            resultContent.innerHTML = '<div class="p-6 bg-red-50 border border-red-200 rounded-lg mb-4"><h3 class="text-xl font-semibold text-red-800 mb-2">' + data.jurusan_utama.name + '</h3><p class="text-red-700">' + data.jurusan_utama.description + '</p></div>';
        } else if (data.jurusan_utama && data.jurusan_alternatif) {
            localStorage.setItem('recommendedMajors', JSON.stringify({ utama: data.jurusan_utama, alternatif: data.jurusan_alternatif, timestamp: Date.now(), expiresIn: 30000 }));
            resultContent.innerHTML = '<div class="mb-6"><h3 class="text-lg font-semibold text-blue-800 mb-2">Jurusan Utama:</h3><div class="p-4 bg-blue-50 border border-blue-200 rounded-lg"><h4 class="text-xl font-bold text-gray-900">' + data.jurusan_utama.name + '</h4><span class="inline-block px-3 py-1 bg-blue-100 text-blue-800 rounded-full text-sm mt-2">' + data.jurusan_utama.department + '</span><p class="text-gray-700 mt-3">' + data.jurusan_utama.description + '</p><button type="button" class="redirect-btn bg-customOrange text-white font-medium px-4 py-2 mt-4 rounded-xl shadow-md hover:bg-customOrange hover:shadow-lg transition-all duration-300 transform hover:-translate-y-1" data-major="' + data.jurusan_utama.name + '">Lihat Selengkapnya →</button></div></div><div><h3 class="text-lg font-semibold text-green-800 mb-2">Jurusan Alternatif:</h3><div class="p-4 bg-green-50 border border-green-200 rounded-lg"><h4 class="text-xl font-bold text-gray-900">' + data.jurusan_alternatif.name + '</h4><span class="inline-block px-3 py-1 bg-green-100 text-green-800 rounded-full text-sm mt-2">' + data.jurusan_alternatif.department + '</span><p class="text-gray-700 mt-3">' + data.jurusan_alternatif.description + '</p><button type="button" class="redirect-btn bg-customOrange text-white font-semibold px-5 py-2 mt-4 rounded-xl shadow-md hover:from-customOrange hover:to-red-600 hover:shadow-xl transition-all duration-300 transform hover:-translate-y-1" data-major="' + data.jurusan_alternatif.name + '">Lihat Selengkapnya →</button></div></div>';
            setTimeout(setupRedirectButtons, 100);
        } else {
            resultContent.innerHTML = '<div class="p-4 bg-yellow-50 border border-yellow-200 rounded-lg"><h3 class="text-lg font-semibold text-yellow-800">Format Response Tidak Dikenal</h3><p class="text-yellow-700 mt-2">Silakan coba lagi dengan kata kunci yang berbeda.</p></div>';
        }
        leftContent.classList.add('hidden');
        resultContainer.classList.remove('hidden');
        form.classList.add('hidden');
        resetContainer.classList.remove('hidden');
    } catch (error) {
        console.error('Error:', error);
        alert("Terjadi kesalahan: " + error.message);
    } finally {
        submitButton.disabled = false;
        submitButton.textContent = 'DAPATKAN REKOMENDASI';
    }
}

document.addEventListener('DOMContentLoaded', function () {
    const form = document.getElementById('recommendationForm');
    const keywordInput = document.getElementById('keywordInput');
    const keywordDropdown = document.getElementById('keywordDropdown');
    const submitButton = document.getElementById('submitButton');
    const resetButton = document.getElementById('resetButton');
    const leftContent = document.getElementById('leftContent');
    const resultContainer = document.getElementById('resultContainer');
    const resetContainer = document.getElementById('resetContainer');

    if (keywordInput && keywordDropdown) {
        setupKeywordInput(keywordInput, keywordDropdown);
    }

    if (form && submitButton) {
        form.addEventListener('submit', handleFormSubmit);
    }

    if (resetButton && keywordInput) {
        resetButton.addEventListener('click', function () { leftContent.classList.remove('hidden'); resultContainer.classList.add('hidden'); form.classList.remove('hidden'); resetContainer.classList.add('hidden'); keywordInput.value = ''; });
    }

    if (typeof Swiper !== 'undefined') {
        new Swiper(".industriSwiper1", { slidesPerView: 4, slideClass: 'swiper-slide-industri', spaceBetween: 30, loop: true, autoplay: { delay: 0, disableOnInteraction: false }, speed: 3000, breakpoints: { 320: { slidesPerView: 2, spaceBetween: 20 }, 640: { slidesPerView: 3, spaceBetween: 20 }, 1024: { slidesPerView: 5, spaceBetween: 30 } } });
        new Swiper(".industriSwiper2", { slidesPerView: 4, slideClass: 'swiper-slide-industri', spaceBetween: 30, loop: true, autoplay: { delay: 0, disableOnInteraction: false, reverseDirection: true }, speed: 3000, breakpoints: { 320: { slidesPerView: 2, spaceBetween: 20 }, 640: { slidesPerView: 3, spaceBetween: 20 }, 1024: { slidesPerView: 5, spaceBetween: 30 } } });
    }

    const cards = document.querySelectorAll('.card');
    const dots = document.querySelectorAll('.dot');
    let currentIndex = 0, isDragging = false, startX = 0, currentX = 0, dragThreshold = 80, animationFrameId = null;

    function initializeCarousel() {
        const isMobile = window.innerWidth < 1024;

        cards.forEach((card, index) => {
            const cardIndex = Number.parseInt(card.dataset.index);
            const position = (cardIndex - currentIndex + cards.length) % cards.length;

            card.style.transition = 'all 0.7s ease';

            if (isMobile) {
                if (position === 0) {
                    card.style.opacity = '1';
                    card.style.transform = 'translateX(0) scale(1)';
                    card.style.zIndex = '10';
                    card.style.pointerEvents = 'auto';
                } else {
                    let direction = (position === cards.length - 1) ? -100 : 100;
                    card.style.opacity = '0';
                    card.style.transform = `translateX(${direction}%) scale(0.9)`;
                    card.style.zIndex = '0';
                    card.style.pointerEvents = 'none';
                }
            } else {
                card.removeAttribute('style');
            }
        });

        dots.forEach((dot, i) => {
            if (i === currentIndex) {
                dot.classList.remove('w-3', 'bg-gray-300');
                dot.classList.add('w-6', 'bg-customOrange');
            } else {
                dot.classList.remove('w-6', 'bg-customOrange');
                dot.classList.add('w-3', 'bg-gray-300');
            }
        });
    }

    function navigateTo(index) {
        if (index < 0) index = cards.length - 1;
        if (index >= cards.length) index = 0;
        currentIndex = index;
        initializeCarousel();
    }

    dots.forEach((dot, index) => {
        dot.addEventListener('click', () => { if (index !== currentIndex) navigateTo(index); });
    });

    cards.forEach(card => {
        card.addEventListener('touchstart', function (e) { if (e.target.closest('a') || e.target.closest('button')) { return; } startX = e.touches[0].clientX; isDragging = true; cards.forEach(c => c.style.transition = 'none'); }, { passive: true });
        card.addEventListener('touchmove', function (e) { if (!isDragging) { return; } if (animationFrameId) { cancelAnimationFrame(animationFrameId); } animationFrameId = requestAnimationFrame(() => { currentX = e.touches[0].clientX; updateDragPosition(); }); e.preventDefault(); }, { passive: false });
        card.addEventListener('touchend', function () { if (!isDragging) { return; } finishDrag(); });
        card.addEventListener('mousedown', function (e) { startX = e.clientX; isDragging = true; cards.forEach(c => c.style.transition = 'none'); document.body.style.cursor = 'grabbing'; e.preventDefault(); });
        card.addEventListener('mousemove', function (e) { if (!isDragging) { return; } if (animationFrameId) { cancelAnimationFrame(animationFrameId); } animationFrameId = requestAnimationFrame(() => { currentX = e.clientX; updateDragPosition(); }); });
        card.addEventListener('mouseup', function () { if (!isDragging) { return; } finishDrag(); });
        card.addEventListener('mouseleave', function () { if (!isDragging) { return; } finishDrag(); });
    });

    function updateDragPosition() {
        const isMobile = window.innerWidth < 1024;
        const diffX = currentX - startX;
        const progress = Math.min(Math.abs(diffX) / 300, 1);

        cards.forEach((card) => {
            const cardIndex = Number.parseInt(card.dataset.index);
            const position = (cardIndex - currentIndex + cards.length) % cards.length;

            if (isMobile) {
                if (position === 0) {
                    card.style.transform = `translateX(${diffX}px) scale(${1 - progress * 0.05})`;
                    card.style.opacity = 1 - progress * 0.3;
                }
            }
        });
    }

    function finishDrag() {
        isDragging = false;
        document.body.style.cursor = '';
        if (animationFrameId) cancelAnimationFrame(animationFrameId);
        const diffX = currentX - startX;
        if (Math.abs(diffX) > dragThreshold) {
            if (diffX > 0) navigateTo(currentIndex - 1); else navigateTo(currentIndex + 1);
        } else {
            initializeCarousel();
        }
    }

    setTimeout(() => { initializeCarousel(); }, 100);
    window.addEventListener('resize', initializeCarousel);

    let autoplayInterval;

    function startAutoplay() {
        autoplayInterval = setInterval(() => {
            navigateTo(currentIndex + 1);
        }, 3000);
    }

    function stopAutoplay() {
        clearInterval(autoplayInterval);
    }

    startAutoplay();

    const cardContainer = document.querySelector('.card-container');
    if (cardContainer) {
        cardContainer.addEventListener('mouseenter', stopAutoplay);
        cardContainer.addEventListener('mouseleave', startAutoplay);
        cardContainer.addEventListener('touchstart', stopAutoplay, { passive: true });
        cardContainer.addEventListener('touchend', startAutoplay, { passive: true });
    }
});
