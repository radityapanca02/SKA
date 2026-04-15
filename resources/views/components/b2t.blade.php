<div id="backToTop" class="fixed bottom-[30px] left-[30px] bg-[#E17626] text-white w-[50px] h-[50px] rounded-full flex items-center justify-center cursor-pointer opacity-0 transition-opacity duration-300 z-[1000] shadow-lg hover:scale-110">
    <i class="fas fa-arrow-up text-xl"></i>
</div>

<script>
function initBackToTop() {
    const backToTopBtn = document.getElementById('backToTop');
    if (backToTopBtn) {
        window.addEventListener('scroll', function() {
            if (window.pageYOffset > 300) {
                backToTopBtn.classList.add('opacity-100');
                backToTopBtn.classList.remove('opacity-0');
            } else {
                backToTopBtn.classList.remove('opacity-100');
                backToTopBtn.classList.add('opacity-0');
            }
        });
        backToTopBtn.addEventListener('click', function() {
            window.scrollTo({ top: 0, behavior: 'smooth' });
        });
    }
}
document.addEventListener('DOMContentLoaded', initBackToTop);
</script>