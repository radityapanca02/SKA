<div x-data="{ open: false }" class="relative z-[9999]">

    <button @click="open = !open" class="fixed bottom-6 right-6 w-[55px] h-[55px] bg-blue-600 text-white rounded-full flex items-center justify-center shadow-2xl hover:scale-110 transition-all z-50">
        <svg x-show="!open" xmlns="http://www.w3.org/2000/svg" class="h-7 w-7" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z" /></svg>
        <svg x-show="open" x-cloak xmlns="http://www.w3.org/2000/svg" class="h-7 w-7" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" /></svg>
    </button>

    <div x-show="open" x-cloak
        x-transition:enter="transition ease-out duration-300"
        x-transition:enter-start="translate-y-4 opacity-0 scale-95"
        x-transition:enter-end="translate-y-0 opacity-100 scale-100"
        class="fixed z-40 bg-white rounded-2xl flex flex-col shadow-2xl border border-gray-200 bottom-24 right-6 w-[350px] h-[calc(100dvh-120px)] max-h-[750px] overflow-hidden">

        <div class="p-4 bg-gradient-to-r from-blue-600 to-blue-700 text-white flex-shrink-0 shadow-md">
            <div class="flex items-center justify-between">
                <div>
                    <h1 class="text-sm font-bold leading-tight uppercase tracking-wide">SMK PGRI 3 MALANG</h1>
                    <p class="text-[10px] text-blue-100 opacity-80">Artificial Intelligence Assistant</p>
                </div>
                <button @click="open = false" class="hover:bg-white/20 rounded-full p-1 transition">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" /></svg>
                </button>
            </div>
        </div>

        <div class="flex-1 min-h-0 overflow-hidden chat-body-container">
            <x-qna></x-qna>
        </div>
    </div>
</div>
