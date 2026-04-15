@props(['title', 'image'])

<div class="bg-customOrange text-white rounded-2xl shadow-md overflow-hidden
    transition-all duration-500 ease-in-out hover:bg-customBlue hover:scale-105 w-full max-w-sm">

    <img src="{{ $assetBase . '/assets/' . $image }}"
        alt="{{ $title }}"
        class="w-full h-48 object-cover"
        loading="lazy">

    <div class="p-5 text-center">
        <h3 class="text-xl md:text-2xl font-bold mb-3">{{ $title }}</h3>
        <p class="text-base leading-relaxed cursor-default">{{ $slot }}</p>
    </div>
</div>
