{{-- resources/views/components/marquee.blade.php --}}
@if($marquees->count() > 0)
<div class="py-4 overflow-hidden rounded-lg bg-white">
    <marquee behavior="scroll" direction="left">
        @foreach ($marquees as $marquee)
        <img class="h-6 md:h-10 max-w-[100px] object-contain inline-block scale-110"
            src="{{ $assetBase . '/storage/' . $marquee->gambar }}" alt="{{ $marquee->nama }}" loading="lazy">
        @endforeach
    </marquee>
</div>
@endif
