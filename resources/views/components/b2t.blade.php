<!-- Back to top button -->
<style>
    /* Back to top button */
    .back-to-top {
        position: fixed;
        bottom: 30px;
        right: 30px;
        background: #E17626;
        color: white;
        width: 50px;
        height: 50px;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        cursor: pointer;
        opacity: 0;
        transition: opacity 0.3s ease;
        z-index: 1000;
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.3)   ;
    }

    .back-to-top.visible {
        opacity: 1;
    }
</style>

<div id="backToTop" class="back-to-top">
    <i class="fas fa-arrow-up text-xl"></i>
</div>

<script>
// Back to top button functionality
function initBackToTop() {
    const backToTopBtn = document.getElementById('backToTop');

    if (backToTopBtn) {
        window.addEventListener('scroll', function() {
            if (window.pageYOffset > 300) {
                backToTopBtn.classList.add('visible');
            } else {
                backToTopBtn.classList.remove('visible');
            }
        });

        backToTopBtn.addEventListener('click', function() {
            window.scrollTo({
                top: 0,
                behavior: 'smooth'
            });
        });
    }
}

// Initialize back to top button
document.addEventListener('DOMContentLoaded', function() {
    initBackToTop();
});
</script>
