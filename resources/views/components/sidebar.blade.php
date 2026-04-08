<div x-data="{ open: false }" class="fixed top-1/2 right-4 transform -translate-y-1/2 z-50">

    <!-- Anti Flicker saat Alpine belum jalan -->
    <style>
    [x-cloak] {
        display: none !important;
    }

    /* Tambahan: biar teks di chat & sidebar wrap dan scroll enak */
    #chatbox {
        word-wrap: break-word;
        overflow-wrap: break-word;
        white-space: pre-wrap;
        scroll-behavior: smooth;
    }

    .menu-item a {
        display: inline-block;
        width: 100%;
        word-wrap: break-word;
        overflow-wrap: break-word;
    }

    /* Area chat */
    #chatbox {
        max-height: 70vh;
        overflow-y: auto;
        padding: 1rem;
        display: flex;
        flex-direction: column;
        gap: 0.75rem;
        background-color: #f5f7fa;
        border-radius: 12px;
    }

    /* Bubble umum */
    .bubble {
        max-width: 80%;
        padding: 0.75rem 1rem;
        border-radius: 16px;
        line-height: 1.4;
        word-wrap: break-word;
        font-size: 0.95rem;
        animation: fadeIn 0.2s ease-in;
    }

    /* Bubble user */
    .bubble.user {
        align-self: flex-end;
        background-color: #0078ff;
        color: white;
        border-bottom-right-radius: 4px;
    }

    /* Bubble bot */
    .bubble.bot {
        align-self: flex-start;
        background-color: #e5e7eb;
        color: #111827;
        border-bottom-left-radius: 4px;
    }

    /* Indikator “mengetik...” */
    .typing {
        display: inline-block;
        width: 40px;
        text-align: left;
    }

    .typing span {
        display: inline-block;
        width: 6px;
        height: 6px;
        margin: 0 1px;
        background: #999;
        border-radius: 50%;
        animation: blink 1.4s infinite both;
    }

    .typing span:nth-child(2) {
        animation-delay: 0.2s;
    }

    .typing span:nth-child(3) {
        animation-delay: 0.4s;
    }

    @keyframes blink {

        0%,
        80%,
        100% {
            opacity: 0;
        }

        40% {
            opacity: 1;
        }
    }

    @keyframes fadeIn {
        from {
            opacity: 0;
            transform: translateY(4px);
        }

        to {
            opacity: 1;
            transform: translateY(0);
        }
    }
    </style>

    <button @click="open = !open" class="absolute -left-16 top-1/2 transform -translate-y-1/2
        bg-gray-300/80 backdrop-blur-md border border-white/30
        w-14 h-14 rounded-2xl shadow-lg flex items-center justify-center
        transition-all duration-300 hover:bg-customOrange/70 hover:text-white">

        <!-- Konten tombol: panah dan ikon -->
        <div class="flex items-center justify-center gap-1">
            <!-- Ikon panah -->
            <svg xmlns="http://www.w3.org/2000/svg" :class="open
                ? 'h-5 w-5 transform rotate-0 transition-transform duration-500 ease-in-out'
                : 'h-5 w-5 transform rotate-180 transition-transform duration-500 ease-in-out'" fill="none"
                viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
            </svg>

            <!-- Logo -->
            <img src="{{ $assetBase . '/assets/skariga logo 1.png' }}" alt="Logo" class="w-10 h-10 object-contain">
        </div>
    </button>


    <!-- Sidebar -->
    <div x-show="open" x-cloak x-transition:enter="transform transition ease-in-out duration-500"
        x-transition:enter-start="translate-x-full opacity-0" x-transition:enter-end="translate-x-0 opacity-100"
        x-transition:leave="transform transition ease-in-out duration-500"
        x-transition:leave-start="translate-x-0 opacity-100" x-transition:leave-end="translate-x-full opacity-0" class="w-[350px] h-[600px] bg-white/80 backdrop-blur-lg rounded-xl
            flex flex-col justify-between shadow-2xl border border-white/20">

        <!-- Header -->
        <div class="p-5 border-b border-gray-200/50">
            <div class="flex items-center">
                <img class="w-18 h-12" src="{{ $assetBase . '/assets/skariga logo 1.png' }}" alt="Logo">
                <h1 class="text-xl font-bold ml-3 text-dark leading-tight">SMK PGRI 3 MALANG</h1>
            </div>
        </div>

        <!-- Konten Navigasi + Chat -->
        <div class="flex-1 overflow-y-auto p-5 space-y-4">

            <!-- Menu -->
            @foreach ([
            ['icon' => $assetBase . '/assets/home (1).png', 'label' => 'Beranda', 'href' => '/'],
            ['icon' => $assetBase . '/assets/news.png', 'label' => 'Berita', 'href' => '/berita'],
            ['icon' => $assetBase . '/assets/profil.png', 'label' => 'Profil', 'href' => '/profil'],
            ['icon' => $assetBase . '/assets/trophy.png', 'label' => 'Prestasi', 'href' => '/prestasi'],
            ['icon' => $assetBase . '/assets/major.png', 'label' => 'Jurusan', 'href' => '/jurusan'],
            ['icon' => $assetBase . '/assets/extra.png', 'label' => 'Ekstrakurikuler', 'href' => '/ekstrakurikuler'],
            ['icon' => $assetBase . '/assets/grad.png', 'label' => 'Alumni', 'href' => '/alumni'],
            ['icon' => $assetBase . '/assets/join.png', 'label' => 'Pendaftaran', 'href' => '/pendaftaran'],
            ] as $item)
            <div class="menu-item flex items-center py-3 px-4 mb-2 cursor-pointer rounded-lg
                        transition hover:bg-customBlue hover:text-white hover:shadow-md">
                <img class="w-6 h-6 flex-shrink-0" src="{{ $item['icon'] }}" alt="{{ $item['label'] }}">
                <a href="{{ $item['href'] }}" class="ml-4 font-semibold truncate">
                    {{ $item['label'] }}
                </a>
            </div>
            @endforeach

            <!-- QNA -->
            <x-qna></x-qna>
        </div>
    </div>
</div>
