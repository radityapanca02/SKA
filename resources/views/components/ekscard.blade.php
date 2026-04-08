@props(['image', 'title'])

<div
    class="bg-white rounded-2xl shadow-lg overflow-hidden flex flex-col transition-transform duration-200 hover:-translate-y-1.5">
    <img src="{{ $assetBase . '/storage/' . $image }}" alt="{{ $title }}" class="w-full h-44 object-cover" loading="lazy">
    <div class="p-4 flex-1">
        <div class="text-3xl font-bold text-center mb-4 text-gray-900">{{ $title }}</div>
        <div class="text-sm text-gray-600 leading-relaxed">
            {{ $slot }}
        </div>
    </div>
</div>
