declare global {
    interface window {
        Alpine: typeof Alpine;
        showNews: (index: number) => void;
        initializeNewsSlider: () => void;
        beritas: any[];
    }
}

import "../css/app.css";
import Alpine from "alpinejs";
import Swiper from "swiper";
import { Autoplay, Pagination, Navigation } from "swiper/modules";
import { initChartGabungan, initJurusanChart } from "./chart";
import { initScrollButtons } from "./scroll";
import MicroModal from "micromodal";
import "swiper/css";
import "swiper/css/navigation";
import "swiper/css/pagination";
import "swiper/css/effect-fade";

// Variabel global
let newsSwiper: Swiper | null = null;
let allBeritas: any[] = [];

// Mobile menu
const initMobileMenu = (): void => {
    const hamburger = document.getElementById("hamburger");
    const navMenu = document.getElementById("navMenu");

    if (hamburger && navMenu) {
        hamburger.addEventListener("click", (): void => {
            hamburger.classList.toggle("active");
            navMenu.classList.toggle("active");
        });
    }
};

// Initialize News Slider with news data
const initializeNewsSlider = (): void => {
    // console.log("🔄 Initializing news slider...");

    try {
        const beritasData = window.beritas;

        if (!beritasData || !Array.isArray(beritasData) || beritasData.length === 0) {
            createDefaultSlide();
            return;
        }

        allBeritas = beritasData;

        // Setup Swiper container
        const swiperWrapper = document.getElementById("x-headnews");

        // Clear existing content
        swiperWrapper.innerHTML = "";

        // Create slides untuk setiap berita
        allBeritas.forEach((berita: any, index: number) => {
            const imagePath = berita.gambar 
                ? `/storage/${berita.gambar}` 
                : 'https://placehold.co/600x400';
            
            const slide = document.createElement("div");
            slide.className = "swiper-slide relative w-full h-full";

            slide.innerHTML = `
                <a href="/berita/${berita.id}">
                    <img src="${imagePath}" alt="${berita.title}"
                        class="headnews-img w-full h-[40vh] sm:h-[50vh] md:h-[60vh] lg:h-[70vh] object-cover"
                        onerror="this.src='https://placehold.co/600x400'"/>
                    <div class="absolute bottom-0 left-0 w-full h-1/2 gradient-overlay"></div>
                    <div class="absolute bottom-6 left-5 md:left-8 text-white max-w-4xl">
                        <h1 class="title text-xl sm:text-2xl md:text-3xl lg:text-4xl font-bold mb-2">
                            ${berita.title.toUpperCase()}
                        </h1>
                        <p class="desc text-base sm:text-lg md:text-xl lg:text-2xl font-bold mb-6 line-clamp-3">
                            ${berita.deskripsi}
                        </p>
                    </div>
                </a>
            `;
            swiperWrapper.appendChild(slide);
        });

        // Initialize Swiper
        initializeSwiperInstance();

        // console.log("✅ News slider initialized successfully");
    } catch (error) {
        createDefaultSlide();
    }
};

const createDefaultSlide = (): void => {
    const swiperWrapper = document.getElementById("x-headnews");
    if (!swiperWrapper) return;

    swiperWrapper.innerHTML = `
        <div class="swiper-slide relative w-full h-full">
            <img src="https://placehold.co/600x400" alt="Default News"
                class="headnews-img w-full h-[40vh] sm:h-[50vh] md:h-[60vh] lg:h-[70vh] object-cover" />
            <div class="absolute bottom-0 left-0 w-full h-1/2 gradient-overlay"></div>
            <div class="absolute bottom-6 left-5 md:left-8 text-white max-w-4xl">
                <h1 class="title text-xl sm:text-2xl md:text-3xl lg:text-4xl font-bold mb-2">
                    SELAMAT DATANG DI SMK PGRI 3 MALANG
                </h1>
                <p class="desc text-base sm:text-lg md:text-xl lg:text-2xl font-bold mb-6">
                    Success by Discipline - Mengutamakan Kedisiplinan untuk Meraih Kesuksesan
                </p>
            </div>
        </div>
    `;

    initializeSwiperInstance();
};

// Initialize Swiper instance
const initializeSwiperInstance = (): void => {
    const swiperEl = document.querySelector(".mySwiper");
    if (!swiperEl) {
        return;
    }

    // Destroy existing Swiper instance
    if (newsSwiper) {
        newsSwiper.destroy(true, true);
        newsSwiper = null;
    }

    try {
        newsSwiper = new Swiper(".mySwiper", {
            modules: [Navigation, Pagination, Autoplay],
            loop: allBeritas.length > 1,
            autoplay:
                allBeritas.length > 1
                    ? {
                        delay: 5000,
                        disableOnInteraction: false,
                    }
                    : false,
            pagination: {
                el: ".swiper-pagination",
                clickable: true,
            },
            navigation: {
                nextEl: ".swiper-button-next",
                prevEl: ".swiper-button-prev",
            },
            effect: "fade",
            fadeEffect: {
                crossFade: true,
            },
            speed: 1000,
        });
    } catch (error) {
        // Silent fail
    }
};

const showNews = (beritaId: string | number): void => {
    const index = allBeritas.findIndex((berita) => berita.id == beritaId);

    if (index >= 0 && index < allBeritas.length) {
        try {
            window.scrollTo({ top: 0, behavior: "smooth" });
            newsSwiper.slideTo(index);
        } catch (error) {
            // Silent fail
        }
    }
};

// Initialize regular Swiper
const initSwiper = (): void => {
    const swiperEl = document.querySelector(".mySwiper");
    if (!swiperEl) return;

    if (document.getElementById("x-headnews")) {
        return;
    }

    try {
        new Swiper(".mySwiper", {
            modules: [Navigation, Pagination, Autoplay],
            loop: true,
            autoplay: {
                delay: 5000,
                disableOnInteraction: false,
            },
            pagination: {
                el: ".swiper-pagination",
                clickable: true,
            },
            navigation: {
                nextEl: ".swiper-button-next",
                prevEl: ".swiper-button-prev",
            },
            effect: "fade",
            speed: 1000,
        });
    } catch (error) {
        // Silent fail
    }
};

// Initialize Micromodal
MicroModal.init({
    disableScroll: true,
    awaitOpenAnimation: true,
    awaitCloseAnimation: true,
});

// Global event listener for all modal buttons
document.addEventListener("click", (e) => {
    const trigger = (e.target as HTMLElement).closest(
        "[data-micromodal-trigger]"
    ) as HTMLElement | null;
    if (!trigger) return;

    const title = trigger.dataset.title || "Tanpa Judul";
    const content = trigger.dataset.content || "Tidak ada konten.";
    const image = trigger.dataset.image || "/assets/default.svg";

    const modalTitle = document.getElementById("modalTitle");
    const modalContent = document.getElementById("modalContent");
    const modalImage = document.getElementById(
        "modalImage"
    ) as HTMLImageElement;

    if (modalTitle) modalTitle.textContent = title;
    if (modalContent) modalContent.innerHTML = content;
    if (modalImage) modalImage.src = image;

    MicroModal.show("newsModal");
});

// INIT on DOMContentLoaded
document.addEventListener("DOMContentLoaded", (): void => {
    // console.log("🏫 SMK PGRI 3 Malang - Initializing...");

    // Export functions ke global scope
    window.showNews = showNews;
    window.initializeNewsSlider = initializeNewsSlider;

    // Initialize semua components
    window.Alpine = Alpine;
    Alpine.start();

    initMobileMenu();
    initializeNewsSlider();
    initSwiper();
    initScrollButtons();
    initChartGabungan();
    initJurusanChart();
});

export { showNews, initializeNewsSlider };
