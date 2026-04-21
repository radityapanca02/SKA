// C's Tailwind Config
tailwind.config = {
    theme: {
        extend: {
            colors: {
                primary: "#f97316",
                primaryhover: "#ea580c",
            },
            animation: {
                "fade-in-down": "fadeInDown 0.5s ease-out",
                "slide-in": "slideIn 0.3s ease-out",
                "pulse-slow": "pulse 3s cubic-bezier(0.4, 0, 0.6, 1) infinite",
                float: "float 6s ease-in-out infinite",
            },
            keyframes: {
                fadeInDown: {
                    "0%": { opacity: "0", transform: "translateY(-10px)" },
                    "100%": { opacity: "1", transform: "translateY(0)" },
                },
                slideIn: {
                    "0%": { transform: "translateX(-10px)", opacity: "0" },
                    "100%": { transform: "translateX(0)", opacity: "1" },
                },
                float: {
                    "0%, 100%": { transform: "translateY(0)" },
                    "50%": { transform: "translateY(-10px)" },
                },
            },
        },
    },
};

// Landing Page Functions
function redirect() {
    window.location.href = "/jurusan";
}

function redirectToMajor(majorName) {
    localStorage.setItem('selectedMajor', majorName);
    window.location.href = '/jurusan';
}

function redirectToDepartment(departmentName) {
    localStorage.setItem('selectedDepartment', departmentName);
    localStorage.removeItem('selectedMajor');
    localStorage.removeItem('recommendedMajors');
    window.location.href = '/jurusan';
}

document.addEventListener('DOMContentLoaded', function() {
    // Swiper Hero
    const heroSwiper = document.querySelector('.swiper-container');
    if (heroSwiper && typeof Swiper !== 'undefined') {
        new Swiper(".swiper-container", {
            loop: true,
            autoplay: {
                delay: 5000,
                disableOnInteraction: false,
            },
            pagination: {
                el: ".swiper-pagination",
                clickable: true,
            },
        });
    }

    // Recommendation Form
    const form = document.getElementById('recommendationForm');
    const keywordInput = document.getElementById('keywordInput');
    const keywordDropdown = document.getElementById('keywordDropdown');
    const submitButton = document.getElementById('submitButton');
    const resetButton = document.getElementById('resetButton');
    const leftContent = document.getElementById('leftContent');
    const resultContainer = document.getElementById('resultContainer');
    const resultContent = document.getElementById('resultContent');
    const resetContainer = document.getElementById('resetContainer');

    if (keywordInput && keywordDropdown) {
        keywordInput.addEventListener('focus', function() {
            keywordDropdown.classList.remove('hidden');
        });

        keywordInput.addEventListener('blur', function() {
            setTimeout(() => {
                keywordDropdown.classList.add('hidden');
            }, 200);
        });
    }

    if (form && submitButton) {
        form.addEventListener('submit', async function(e) {
            e.preventDefault();

            const originalText = submitButton.innerHTML;
            submitButton.disabled = true;
            submitButton.innerHTML = `
                <svg class="animate-spin -ml-1 mr-3 h-5 w-5 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                    <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                    <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                </svg>
                Memproses...
            `;

            try {
                const response = await fetch("/api/gemini", {
                    method: "POST",
                    headers: {
                        "Content-Type": "application/json",
                        "X-CSRF-TOKEN": document.querySelector('meta[name="csrf-token"]').getAttribute("content"),
                    },
                    body: JSON.stringify({
                        keyword: keywordInput.value
                    }),
                });

                const data = await response.json();

                if (!response.ok) {
                    throw new Error(data.error || 'Terjadi kesalahan');
                }

                if (data.jurusan_utama && data.jurusan_utama.name === "Tidak ditemukan") {
                    resultContent.innerHTML = `
                        <div class="p-6 bg-red-50 border border-red-200 rounded-lg mb-4">
                            <h3 class="text-xl font-semibold text-red-800 mb-2">${data.jurusan_utama.name}</h3>
                            <p class="text-red-700">${data.jurusan_utama.description}</p>
                        </div>
                    `;
                } else if (data.jurusan_utama && data.jurusan_alternatif) {
                    const recommendationData = {
                        utama: data.jurusan_utama,
                        alternatif: data.jurusan_alternatif,
                        timestamp: Date.now(),
                        expiresIn: 30000
                    };
                    localStorage.setItem('recommendedMajors', JSON.stringify(recommendationData));

                    resultContent.innerHTML = `
                        <div class="mb-6">
                            <h3 class="text-lg font-semibold text-blue-800 mb-2">Jurusan Utama:</h3>
                            <div class="p-4 bg-blue-50 border border-blue-200 rounded-lg">
                                <h4 class="text-xl font-bold text-gray-900">${data.jurusan_utama.name}</h4>
                                <span class="inline-block px-3 py-1 bg-blue-100 text-blue-800 rounded-full text-sm mt-2">${data.jurusan_utama.department}</span>
                                <p class="text-gray-700 mt-3">${data.jurusan_utama.description}</p>
                                <button type="button" class="redirect-btn bg-orange-500 text-white font-medium px-4 py-2 mt-4 rounded-xl shadow-md hover:bg-orange-600 hover:shadow-lg transition-all duration-300 transform hover:-translate-y-1" data-major="${data.jurusan_utama.name}">Lihat Selengkapnya →</button>
                            </div>
                        </div>
                        <div>
                            <h3 class="text-lg font-semibold text-green-800 mb-2">Jurusan Alternatif:</h3>
                            <div class="p-4 bg-green-50 border border-green-200 rounded-lg">
                                <h4 class="text-xl font-bold text-gray-900">${data.jurusan_alternatif.name}</h4>
                                <span class="inline-block px-3 py-1 bg-green-100 text-green-800 rounded-full text-sm mt-2">${data.jurusan_alternatif.department}</span>
                                <p class="text-gray-700 mt-3">${data.jurusan_alternatif.description}</p>
                                <button type="button" class="redirect-btn bg-gradient-to-r from-orange-500 to-red-500 text-white font-semibold px-5 py-2 mt-4 rounded-xl shadow-md hover:from-orange-600 hover:to-red-600 hover:shadow-xl transition-all duration-300 transform hover:-translate-y-1" data-major="${data.jurusan_alternatif.name}">Lihat Selengkapnya →</button>
                            </div>
                        </div>
                    `;

                    setTimeout(() => {
                        document.querySelectorAll('.redirect-btn').forEach(button => {
                            button.addEventListener('click', function() {
                                const majorName = this.getAttribute('data-major');
                                redirectToMajor(majorName);
                            });
                        });
                    }, 100);
                } else {
                    resultContent.innerHTML = `
                        <div class="p-4 bg-yellow-50 border border-yellow-200 rounded-lg">
                            <h3 class="text-lg font-semibold text-yellow-800">Format Response Tidak Dikenal</h3>
                            <p class="text-yellow-700 mt-2">Silakan coba lagi dengan kata kunci yang berbeda.</p>
                        </div>
                    `;
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
                submitButton.innerHTML = originalText;
            }
        });
    }

    if (resetButton && keywordInput) {
        resetButton.addEventListener('click', function() {
            leftContent.classList.remove('hidden');
            resultContainer.classList.add('hidden');
            form.classList.remove('hidden');
            resetContainer.classList.add('hidden');
            keywordInput.value = '';
        });
    }

    // Department redirect buttons
    const departmentButtons = document.querySelectorAll('.redirect-department');
    departmentButtons.forEach(button => {
        button.addEventListener('click', function(e) {
            e.preventDefault();
            const departmentName = this.getAttribute('data-department');
            redirectToDepartment(departmentName);
        });
    });

    // Industry Swipers
    if (typeof Swiper !== 'undefined') {
        if (document.querySelector('.industriSwiper1')) {
            new Swiper(".industriSwiper1", {
                slidesPerView: 4,
                slideClass: 'swiper-slide-industri',
                spaceBetween: 30,
                loop: true,
                autoplay: {
                    delay: 0,
                    disableOnInteraction: false,
                },
                speed: 3000,
                breakpoints: {
                    320: { slidesPerView: 2, spaceBetween: 20 },
                    640: { slidesPerView: 3, spaceBetween: 20 },
                    1024: { slidesPerView: 5, spaceBetween: 30 },
                },
            });
        }

        if (document.querySelector('.industriSwiper2')) {
            new Swiper(".industriSwiper2", {
                slidesPerView: 4,
                slideClass: 'swiper-slide-industri',
                spaceBetween: 30,
                loop: true,
                autoplay: {
                    delay: 0,
                    disableOnInteraction: false,
                    reverseDirection: true,
                },
                speed: 3000,
                breakpoints: {
                    320: { slidesPerView: 2, spaceBetween: 20 },
                    640: { slidesPerView: 3, spaceBetween: 20 },
                    1024: { slidesPerView: 5, spaceBetween: 30 },
                },
            });
        }
    }
});
