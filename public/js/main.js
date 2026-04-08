// PRESET TAILWINDCSS
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
            },
        },
    },
};

// SWIPPER
document.addEventListener("DOMContentLoaded", function () {
    const swiper = new Swiper(".swiper-container", {
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

    document
        .querySelector(".fa-chevron-down")
        .addEventListener("click", function () {
            window.scrollTo({
                top: document.querySelector(".bg-white").offsetTop,
                behavior: "smooth",
            });
        });
});
