document.addEventListener('DOMContentLoaded', function() {
    const contentContainer = document.getElementById('admin-content');

    function setupPagination() {
        const container = document.getElementById('pagination-container');
        if (!container) return;

        container.addEventListener('click', function(e) {
            const link = e.target.closest('a');

            if (link && !link.classList.contains('text-gray-400') && !link.classList.contains('cursor-not-allowed')) {
                const url = link.getAttribute('href');

                if (url && url.includes('?page=')) {
                    e.preventDefault();
                    loadPage(url);
                }
            }
        });
    }

    function loadPage(url) {
        if (!contentContainer) return;

        contentContainer.style.opacity = '0.5';

        fetch(url, {
            headers: {
                'X-Requested-With': 'XMLHttpRequest'
            }
        })
        .then(response => response.text())
        .then(html => {
            const parser = new DOMParser();
            const doc = parser.parseFromString(html, 'text/html');
            const newContent = doc.getElementById('admin-content');

            if (newContent) {
                contentContainer.innerHTML = newContent.innerHTML;
                window.history.pushState({}, '', url);
                setupPagination();
            } else {
                window.location.href = url;
            }
        })
        .catch(err => {
            console.error("AJAX Error:", err);
            window.location.href = url;
        })
        .finally(() => {
            contentContainer.style.opacity = '1';
        });
    }

    setupPagination();
});