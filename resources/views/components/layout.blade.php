<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <x-meta></x-meta>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @props(['title'])
    <title>{{ $title ?? 'SMK PGRI 3 Malang - Success by Discipline' }}</title>

    @vite(['resources/css/app.css', 'resources/ts/app.ts'])
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap"
        rel="stylesheet">

    <link rel="shortcut icon" href="{{ $assetBase }}/assets/skariga300rbg.png" type="image/x-icon">

    @production
    <link rel="stylesheet" href="{{ $assetBase }}/build/assets/app.css">
    @endproduction
</head>

<body class="bg-[#F8F8F8] m-0 p-0 overflow-x-hidden"
    x-data="{ modalOpen: false, modalTitle: '', modalDept: '', modalDesc: '', modalImage: '' }"
    x-on:open-modal.window="modalOpen = true; modalTitle = $event.detail.title; modalDept = $event.detail.dept; modalDesc = $event.detail.desc; modalImage = $event.detail.image">
    <x-b2t></x-b2t>

    @props(['headerTransparent' => false])
    @if (!$headerTransparent)
    <x-header :transparent="$headerTransparent"></x-header>
    @else
    <x-header :transparent="$headerTransparent"></x-header>
    @endif

    {{ $slot }}
    <x-sidebar></x-sidebar>

    <!-- Jurusan Modal -->
    <div x-show="modalOpen" x-cloak class="fixed inset-0 z-[100] overflow-y-auto" aria-labelledby="modal-title"
        role="dialog" aria-modal="true">
        <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
            <div x-show="modalOpen" x-transition:enter="ease-out duration-300" x-transition:enter-start="opacity-0"
                x-transition:enter-end="opacity-100" x-transition:leave="ease-in duration-200"
                x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0"
                class="fixed inset-0 bg-black/60 backdrop-blur-sm" @click="modalOpen = false"></div>

            <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>

            <div x-show="modalOpen"
                class="fixed inset-0 z-[999] flex items-center justify-center px-4 pointer-events-none">

                <div x-show="modalOpen" x-transition:enter="transition ease-out duration-300"
                    x-transition:enter-start="opacity-0 translate-y-32"
                    x-transition:enter-end="opacity-100 translate-y-0"
                    x-transition:leave="transition ease-in duration-200"
                    x-transition:leave-start="opacity-100 translate-y-0"
                    x-transition:leave-end="opacity-0 translate-y-32"
                    class="bg-white rounded-2xl shadow-2xl w-full sm:max-w-2xl overflow-hidden pointer-events-auto relative">

                    <div class="relative h-64 sm:h-80">
                        <img :src="modalImage" :alt="modalTitle" class="w-full h-full object-cover">
                        <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-black/30 to-transparent"></div>

                        <button @click="modalOpen = false"
                            class="absolute top-4 right-4 bg-white/20 hover:bg-white/40 text-white rounded-full w-10 h-10 flex items-center justify-center transition">
                            <i class="fas fa-times"></i>
                        </button>

                        <div class="absolute bottom-6 left-6">
                            <div class="flex items-center gap-3">
                                <div class="w-1 h-14"
                                    :class="modalDept === 'OTOMOTIF' ? 'bg-red-500' : modalDept === 'TIK' ? 'bg-purple-500' : modalDept === 'ELEKTRO' ? 'bg-yellow-500' : 'bg-blue-500'">
                                </div>
                                <div class="text-start">
                                    <h3 class="text-1xl md:text-2xl font-bold text-white" x-text="modalTitle"></h3>
                                    <p class="text-gray-200" x-text="modalDept"></p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="p-6 sm:p-8 text-start">
                        <h4 class="text-lg font-semibold text-gray-800 mb-3">Deskripsi Jurusan</h4>
                        <p class="text-gray-600 leading-relaxed" x-text="modalDesc"></p>
                    </div>

                </div>
            </div>
        </div>
    </div>

    <script>
    function openJurusanModal(title, dept, desc, image) {
        window.dispatchEvent(new CustomEvent('open-modal', {
            detail: {
                title,
                dept,
                desc,
                image
            }
        }));
    }
    </script>

    <x-footer></x-footer>

    <noscript>JavaScript anda sekarang sedang dimatikan<br>Mohon aktifkan JavaScript anda agar website ini dapat
        berjalan.</noscript>

    <script>
    window.appConfig = {
        primaryDomain: 'smkpgri3mlg.jh-beon.cloud',
        secondaryDomain: 'smkpgri3mlg.web.id',
        currentDomain: window.location.hostname,
        assetBase: '{{ $assetBase }}',
        isPrimaryDomain: function() {
            return this.currentDomain === this.primaryDomain ||
                this.currentDomain === 'www.' + this.primaryDomain;
        }
    };

    window.addEventListener('beforeunload', function() {
        fetch('/api/visitor-leave', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify({
                action: 'leave'
            }),
            keepalive: true
        });
    });
    </script>
</body>

</html>
