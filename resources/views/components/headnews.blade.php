@props(['title', 'image'])

<section class="swiper-slide relative w-full h-full">
    <img src="{{ $assetBase . '/assets/' . $image }}" alt="{{ $title }}"
        class="headnews-img w-full h-[40vh] sm:h-[50vh] md:h-[60vh] lg:h-[70vh] object-cover" />
    <div class="absolute bottom-0 left-0 w-full h-1/2 gradient-overlay"></div>
    <div class="absolute bottom-6 left-5 md:left-8 text-white max-w-4xl" id="x-headnews-content">
        <h1 class="title text-xl sm:text-2xl md:text-3xl lg:text-4xl font-bold mb-2">
            {{ $title }}
        </h1>
        <p class="desc text-base sm:text-lg md:text-xl lg:text-2xl font-bold mb-6">
            {{ $slot }}
        </p>
    </div>
</section>
