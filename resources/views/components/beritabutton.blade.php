@props(['type', 'filterType', 'nameType', 'bgColor'])

<button
    class="filter-btn {{ $type === $filterType ? $bgColor . ' text-white' : 'bg-gray-200 hover:bg-gray-300 text-gray-700' }} px-4 py-2 rounded-lg text-sm font-medium transition-colors"
    data-type="{{ $filterType }}">
    {{ $nameType }}
</button>
