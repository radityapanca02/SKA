@props(['title', 'image', 'departement'])

<div
    class="w-[400px] pb-5 shrink-0 bg-white rounded-2xl shadow-lg overflow-hidden border border-gray-200 hover:shadow-2xl hover:-translate-y-1 transform transition duration-300 snap-start">

    <img src="{{ $assetBase . '/storage/' . $image }}" alt="{{ $title }}" class="h-56 w-full object-cover" loading="lazy" />

    <div class="p-4">
        <h4 class="font-bold text-lg mb-1">{{ $title }}</h4>

        <div class="w-full h-2
            @if ($departement === 'OTOMOTIF')
                bg-red-400
            @elseif ($departement === 'TIK')
                bg-purple-400
            @elseif ($departement === 'ELEKTRO')
                bg-yellow-400
            @elseif ($departement === 'PEMESINAN')
                bg-blue-400
            @else
                bg-gray-300
            @endif
        mb-2"></div>

        <p class="text-sm text-gray-600 leading-relaxed text-justify">
            {{ $slot }}
        </p>
    </div>
</div>
