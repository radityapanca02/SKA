document.addEventListener("DOMContentLoaded", function () {
    const paginationContainer = document.getElementById("pagination-container");

    function setupPagination() {
        if (paginationContainer) {
            // Hapus event listener lama untuk avoid duplicates
            paginationContainer.replaceWith(
                paginationContainer.cloneNode(true)
            );
            const newPaginationContainer = document.getElementById(
                "pagination-container"
            );

            newPaginationContainer.addEventListener("click", function (e) {
                const link = e.target.closest("a");

                // Hanya handle link yang ACTIVE (bukan yang disabled)
                if (
                    link &&
                    !link.classList.contains("text-gray-400") &&
                    !link.classList.contains("cursor-not-allowed") &&
                    link.getAttribute("href") !== "#"
                ) {
                    e.preventDefault();
                    const url = link.getAttribute("href");

                    if (url && url !== window.location.href) {
                        loadPage(url);
                    }
                }
            });
        }
    }

    function loadPage(url) {
        // Tampilkan loading
        const ekskulContent = document.getElementById("ekskul-content");
        ekskulContent.style.opacity = "0.6";
        ekskulContent.style.pointerEvents = "none";

        // AJAX request
        fetch(url + "&ajax=1", {
            headers: {
                "X-Requested-With": "XMLHttpRequest",
                Accept: "text/html",
            },
        })
            .then((response) => {
                if (!response.ok) {
                    throw new Error("Network response was not ok");
                }
                return response.text();
            })
            .then((html) => {
                // Parse HTML response
                const parser = new DOMParser();
                const doc = parser.parseFromString(html, "text/html");
                const newContent = doc.getElementById("ekskul-content");

                if (newContent) {
                    // Smooth transition
                    ekskulContent.style.opacity = "0";
                    setTimeout(() => {
                        // Replace content
                        document.getElementById("ekskul-content").innerHTML =
                            newContent.innerHTML;

                        // Setup ulang event listeners untuk pagination baru
                        setupPagination();

                        // Smooth fade in
                        setTimeout(() => {
                            ekskulContent.style.opacity = "1";
                            ekskulContent.style.pointerEvents = "auto";
                        }, 50);

                        // Scroll ke top section
                        ekskulContent.scrollIntoView({
                            behavior: "smooth",
                            block: "start",
                        });
                    }, 300);
                }

                // Update URL tanpa refresh
                window.history.pushState({}, "", url);
            })
            .catch((error) => {
                console.error("Error:", error);
                // Fallback ke reload halaman
                ekskulContent.style.opacity = "1";
                ekskulContent.style.pointerEvents = "auto";
                window.location.href = url;
            });
    }

    // Setup pagination pertama kali
    setupPagination();

    // Handle browser back/forward buttons
    window.addEventListener("popstate", function (e) {
        // Load page saat ini via AJAX
        if (e.state) {
            loadPage(window.location.href);
        }
    });

    // Prevent default behavior untuk link disabled
    document.addEventListener("click", function (e) {
        if (
            e.target.closest("a.text-gray-400") ||
            e.target.closest("a.cursor-not-allowed")
        ) {
            e.preventDefault();
        }
    });
});
