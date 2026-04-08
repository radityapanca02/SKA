@props(['image', 'title', 'onclick' => ''])

<div class="sidenews-item group cursor-pointer" onclick="{{ $onclick }}">
    <img width="100%" height="100%" class="w-full h-40 object-cover rounded-lg mb-2 group-hover:opacity-90 transition"
        src="{{ $assetBase . '/storage/' . $image }}" alt="{{ $title }}">
    <p class="text-sm font-medium group-hover:text-customOrange transition break-words line-clamp-2">{{ $title }}</p>
</div>




