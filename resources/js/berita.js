// C's Berita Page JS

// Scroll Reveal Animation
document.addEventListener('DOMContentLoaded', () => {
    const revealElements = document.querySelectorAll('.scroll-reveal');
    const observer = new IntersectionObserver(entries => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.classList.add('revealed');
            }
        });
    }, {
        threshold: 0.1,
        rootMargin: '0px 0px -50px 0px'
    });

    revealElements.forEach(el => observer.observe(el));
});

// Filter Buttons
document.addEventListener('DOMContentLoaded', () => {
    const filterButtons = document.querySelectorAll('.filter-btn');

    filterButtons.forEach(button => {
        button.addEventListener('click', () => {
            const type = button.getAttribute('data-type');

            filterButtons.forEach(btn => btn.classList.remove('bg-blue-800', 'text-white'));
            button.classList.add('bg-blue-800', 'text-white');

            const currentNewsCards = document.querySelectorAll('#berita-content .news-card');

            currentNewsCards.forEach(card => {
                const cardType = card.getAttribute('data-type');
                if (type === 'all' || cardType === type) {
                    card.style.display = 'block';
                } else {
                    card.style.display = 'none';
                }
            });
        });
    });
});

// Sidebar Functions
function openSidebar(image, title, date, views, content) {
    const sidebarImage = document.getElementById('sidebarImage');
    const sidebarTitle = document.getElementById('sidebarTitle');
    const sidebarDate = document.getElementById('sidebarDate');
    const sidebarViews = document.getElementById('sidebarViews');
    const sidebarContent = document.getElementById('sidebarContent');
    const sidebarOverlay = document.getElementById('sidebarOverlay');
    const newsSidebar = document.getElementById('newsSidebar');

    if (sidebarImage) sidebarImage.src = image;
    if (sidebarTitle) sidebarTitle.textContent = title;
    if (sidebarDate) sidebarDate.textContent = date;
    if (sidebarViews) sidebarViews.textContent = views;
    if (sidebarContent) sidebarContent.textContent = content;

    if (sidebarOverlay) sidebarOverlay.classList.add('active');
    if (newsSidebar) newsSidebar.classList.add('active');
    document.body.style.overflow = 'hidden';
}

function closeSidebar() {
    const sidebarOverlay = document.getElementById('sidebarOverlay');
    const newsSidebar = document.getElementById('newsSidebar');

    if (sidebarOverlay) sidebarOverlay.classList.remove('active');
    if (newsSidebar) newsSidebar.classList.remove('active');
    document.body.style.overflow = 'auto';
}

document.addEventListener('DOMContentLoaded', function() {
    // Read more button click
    document.addEventListener('click', function(e) {
        const button = e.target.closest('.read-more-btn');
        if (button) {
            const image = button.getAttribute('data-image');
            const title = button.getAttribute('data-title');
            const date = button.getAttribute('data-date');
            const views = button.getAttribute('data-views');
            const content = button.getAttribute('data-content');

            openSidebar(image, title, date, views, content);
        }
    });

    const closeBtn = document.getElementById('closeSidebar');
    if (closeBtn) {
        closeBtn.addEventListener('click', closeSidebar);
    }

    const overlay = document.getElementById('sidebarOverlay');
    if (overlay) {
        overlay.addEventListener('click', closeSidebar);
    }

    document.addEventListener('keydown', function(event) {
        if (event.key === 'Escape') closeSidebar();
    });
});

// AJAX Pagination
document.addEventListener('DOMContentLoaded', function() {
    const beritaContent = document.getElementById('berita-content');
    const loadingIndicator = document.getElementById('loadingIndicator');

    if (!beritaContent || !loadingIndicator) return;

    function loadPage(url) {
        loadingIndicator.classList.remove('hidden');
        loadingIndicator.classList.add('flex');
        beritaContent.classList.add('opacity-50');

        fetch(url, {
                headers: {
                    'X-Requested-With': 'XMLHttpRequest'
                }
            })
            .then(response => {
                if (!response.ok) throw new Error('Network response error');
                return response.text();
            })
            .then(html => {
                const parser = new DOMParser();
                const doc = parser.parseFromString(html, 'text/html');
                const newBeritaContent = doc.querySelector('#berita-content');

                if (newBeritaContent) {
                    beritaContent.innerHTML = newBeritaContent.innerHTML;
                    window.history.pushState({}, '', url);
                    applyActiveFilter();

                    setTimeout(() => {
                        const filterSection = document.querySelector('.flex.flex-wrap.justify-between.items-center.mb-8.bg-white');
                        if (filterSection) {
                            filterSection.scrollIntoView({
                                behavior: 'smooth',
                                block: 'start'
                            });
                        }
                    }, 100);
                } else {
                    throw new Error('ID #berita-content tidak ditemukan di response');
                }
            })
            .catch(error => {
                console.error('AJAX Error:', error);
                window.location.href = url;
            })
            .finally(() => {
                loadingIndicator.classList.add('hidden');
                loadingIndicator.classList.remove('flex');
                beritaContent.classList.remove('opacity-50');
            });
    }

    function applyActiveFilter() {
        const activeFilterBtn = document.querySelector('.filter-btn.bg-blue-800');
        if (activeFilterBtn) {
            const activeType = activeFilterBtn.getAttribute('data-type');
            const newCards = document.querySelectorAll('#berita-content .news-card');

            newCards.forEach(card => {
                if (activeType === 'all' || card.getAttribute('data-type') === activeType) {
                    card.style.display = 'block';
                } else {
                    card.style.display = 'none';
                }
            });
        }
    }

    document.addEventListener('click', function(e) {
        const paginationContainer = e.target.closest('#pagination-container');

        if (paginationContainer) {
            const link = e.target.closest('a');

            if (link && link.href) {
                e.preventDefault();
                loadPage(link.href);
            }
        }
    });

    window.addEventListener('popstate', function() {
        loadPage(window.location.href);
    });
});

// Back to Top
document.addEventListener("DOMContentLoaded", function () {
    const backToTopButton = document.getElementById("back-to-top");

    if (backToTopButton) {
        window.addEventListener("scroll", function () {
            if (window.pageYOffset > 300) {
                backToTopButton.classList.remove("opacity-0", "invisible");
                backToTopButton.classList.add("opacity-100", "visible");
            } else {
                backToTopButton.classList.remove("opacity-100", "visible");
                backToTopButton.classList.add("opacity-0", "invisible");
            }
        });

        backToTopButton.addEventListener("click", function () {
            window.scrollTo({
                top: 0,
                behavior: "smooth",
            });
        });
    }
});
