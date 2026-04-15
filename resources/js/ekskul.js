document.addEventListener('DOMContentLoaded', function() {
    const paginationContainer = document.getElementById('pagination-container');
    const ekskulContent = document.getElementById('ekskul-content');
    const ekskulData = document.getElementById('ekskul-data');

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
        ekskulData.style.opacity = '0.6';

        fetch(url, {
            headers: {
                'X-Requested-With': 'XMLHttpRequest'
            }
        })
        .then(response => response.text())
        .then(html => {
            const parser = new DOMParser();
            const doc = parser.parseFromString(html, 'text/html');
            const newContent = doc.getElementById('ekskul-data');

            if (newContent) {
                ekskulData.innerHTML = newContent.innerHTML;
                window.history.pushState({}, '', url);
                ekskulContent.scrollIntoView({ behavior: 'smooth' });
                setupPagination();
            }
        })
        .catch(err => {
            console.error("AJAX Error:", err);
            window.location.href = url;
        })
        .finally(() => {
            ekskulData.style.opacity = '1';
        });
    }

    setupPagination();
});