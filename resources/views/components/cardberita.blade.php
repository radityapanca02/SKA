@props(['views', 'type', 'date', 'image', 'title', 'desc'])

<div
    class="bg-white rounded-xl shadow-md overflow-hidden transition-transform duration-300 hover:shadow-lg hover:-translate-y-1">
    <div class="h-72 relative">
        <img src="{{ $assetBase . '/storage/' . $image }}" class="w-full h-full object-cover" alt="{{ $title }}">
        <span
            class="absolute top-4 left-4 bg-customOrange text-white px-3 py-1 rounded-full text-xs font-semibold">{{ $type }}</span>
        <div class="absolute bottom-4 left-4 text-white">
            <span class="text-sm"><i class="far fa-calendar mr-1"></i>{{ $date }}</span>
        </div>
    </div>
    <div class="p-6">
        <h3 class="text-xl font-bold text-customBlue mb-3">{{ $title }}</h3>
        <p class="text-gray-600 mb-4">{{ $desc }}</p>
        <div class="flex justify-between items-center">
            <a href="javascript:void(0)"
            data-micromodal-trigger="newsModal"
                data-title="{{ $title }}"
                data-content="{{ $slot }}"
                data-image="{{ $assetBase . '/storage/' . $image }}" class="text-customOrange font-semibold hover:underline">
                Baca Selengkapnya
            </a>
            <span class="text-gray-500 text-sm"><i class="far fa-eye mr-1"></i>{{ $views }}</span>
        </div>
    </div>
</div>
