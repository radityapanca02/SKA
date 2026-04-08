{{-- resources/views/components/marquee.blade.php --}}
@props(['marquees' => collect()])

@if($marquees->count() > 0)
<div class="py-4 overflow-hidden rounded-lg bg-white">
    <div class="flex animate-marquee whitespace-nowrap">
        @foreach ($marquees as $marquee)
        <div class="mx-8 flex-shrink-0">
            <img class="h-6 md:h-10 max-w-[100px] object-contain inline-block scale-110"
                src="{{ $assetBase . '/storage/' . $marquee->gambar }}" alt="{{ $marquee->nama }}" loading="lazy">
        </div>
        @endforeach

        <!-- Duplicate for seamless loop -->
        @foreach ($marquees as $marquee)
        <div class="mx-8 flex-shrink-0">
            <img class="h-6 md:h-10 max-w-[100px] object-contain inline-block scale-110"
                src="{{ $assetBase . '/storage/' . $marquee->gambar }}" alt="{{ $marquee->nama }}" loading="lazy">
        </div>
        @endforeach
    </div>
</div>

<style>
@keyframes marquee {
    0% {
        transform: translateX(-100%);
    }

    100% {
        transform: translateX(0%);
    }
}

.animate-marquee {
    animation: marquee 90s linear infinite;
}
</style>
@endif
