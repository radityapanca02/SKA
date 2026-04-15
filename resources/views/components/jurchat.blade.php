@props(['whois'])

@switch($whois)
    @case('USER')
        <div class="flex items-start justify-end space-x-3 max-w-full ml-auto">
            <div class="bg-orange-500 text-white px-4 py-2 rounded-lg select-none hover:scale-105 transition-transform">
                {{ $slot }}
            </div>
            <div
                class="flex-shrink-0 w-8 h-8 rounded-full border border-gray-700 flex items-center justify-center text-gray-700">
                👤
            </div>
        </div>
        @break

    @case('BOT')
        <div class="flex items-start space-x-3">
            <div
                class="flex-shrink-0 w-8 h-8 rounded-full border border-gray-700 flex items-center justify-center text-gray-700">
                🤖
            </div>
            <div
                class="bg-blue-600 text-white px-4 py-2 rounded-lg max-w-[85%] select-none hover:scale-105 transition-transform">
                {{ $slot }}
            </div>
        </div>
        @break

    @default
        <div class="flex items-center justify-center text-gray-500 italic">
            Unknown sender: {{ $whois }}
        </div>
@endswitch
