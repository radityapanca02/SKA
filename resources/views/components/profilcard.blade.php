@props(['bgColor' => 'BLUE', 'title' => '', 'image' => ''])

@php
$colorClasses = [
'BLUE' => 'bg-blue-500',
'GREEN' => 'bg-green-500',
'ORANGE' => 'bg-orange-500',
'RED' => 'bg-red-500'
];

$bgClass = $colorClasses[$bgColor] ?? 'bg-blue-500';
@endphp

<div
    class="{{ $bgClass }} rounded-2xl shadow-lg overflow-hidden hover:shadow-xl transition-all duration-300 hover:-translate-y-1 h-full flex flex-col items-center text-white p-6 text-center">

    {{-- Icon / Gambar --}}
    @if($image)
    <div class="w-20 h-20 flex justify-center items-center mb-8 mt-2">
        <img src="{{ $image }}" alt="{{ $title }}" class="w-full h-full object-contain drop-shadow-md invert scale-125">
    </div>
    @endif

    {{-- Garis di bawah logo --}}
    <hr class="border-t border-white/40 w-full h-2 mb-4">

    {{-- Judul --}}
    <h3 class="font-bold text-xl mb-3 ">{{ $title }}</h3>

    {{-- Deskripsi --}}
    <p class="text-white/90 text-sm leading-relaxed text-justify">
        {{ $slot }}
    </p>
</div>
