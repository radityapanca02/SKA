<x-layout title="Profil - SMK PGRI 3 Malang" :headerTransparent="false">
    <style>
    @keyframes scroll {
        0% {
            transform: translateX(0);
        }

        100% {
            transform: translateX(-50%);
        }
    }

    .animate-scroll {
        display: flex;
        animation: scroll 25s linear infinite;
    }

    /* Animasi tambahan untuk hover */
    .hover-lift {
        transition: all 0.3s ease;
    }

    .hover-lift:hover {
        transform: translateY(-8px);
        box-shadow: 0 15px 30px rgba(0, 0, 0, 0.15);
    }

    .hover-scale {
        transition: all 0.4s ease;
    }

    .hover-scale:hover {
        transform: scale(1.05);
    }

    .hover-glow:hover {
        box-shadow: 0 0 20px rgba(249, 115, 22, 0.5);
    }

    .hover-rotate:hover {
        transform: rotate(2deg);
    }

    .hover-brightness:hover {
        filter: brightness(1.1);
    }

    .hover-border-orange:hover {
        border: 2px solid #f97316;
    }

    .hover-text-white:hover {
        color: white;
    }

    .hover-bg-orange:hover {
        background-color: #f97316;
    }

    .hover-shadow-lg {
        transition: all 0.3s ease;
    }

    .hover-shadow-lg:hover {
        box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1), 0 10px 10px -5px rgba(0, 0, 0, 0.04);
    }
    </style>

    <div class="h-full h-max-content container mx-auto px-4 py-6">
        <!-- Hero SKARIGA -->
        <section class="relative h-[535px] mt-2 rounded-xl overflow-hidden">
            <div class="absolute inset-0 w-full h-full hover-scale">
                <div class="absolute inset-0 bg-gradient-to-t from-transparent via-black/5 to-black/70"></div>
                <img src="{{ $assetBase . '/storage/' . $profil->heroImage }}" alt="Hero SKARIGA"
                    class="w-full h-full object-cover">
                <div class="absolute inset-0 bg-gradient-to-t from-black/90 via-black/30 to-transparent"></div>
            </div>
            <div class="absolute bottom-8 left-3.5 md:left-10 z-10">
                <h1 class="text-5xl md:text-7xl font-bold text-white drop-shadow-lg hover-scale cursor-default">
                    {{ $profil->heroTitle }}
                </h1>
            </div>
        </section>

        <!-- Profil -->
        <section class="w-full container py-16 overflow-hidden z-10">
            <div class="grid md:grid-cols-2 gap-10 items-start">
                <!-- Kolom Kiri: Gambar -->
                <div class="grid gap-4">
                    <!-- Gambar besar di atas -->
                    <img src="{{ $assetBase . '/storage/' . $profil->profilImage1 }}"
                        class="rounded-xl shadow-md w-full h-64 object-cover hover-lift hover-brightness"
                        alt="Keseluruhan Gedung">

                    <!-- 3 gambar kecil di bawah -->
                    <div class="grid grid-cols-2 gap-4">
                        <img src="{{ $assetBase . '/storage/' . $profil->profilImage2 }}"
                            class="rounded-xl shadow-md h-40 w-full object-cover hover-lift hover-brightness"
                            alt="Gedung 1">
                        <img src="{{ $assetBase . '/storage/' . $profil->profilImage3 }}"
                            class="rounded-xl shadow-md h-40 w-full object-cover hover-lift hover-brightness"
                            alt="Gedung 2">
                    </div>
                </div>

                <!-- Kolom Kanan: Teks Profil -->
                <div>
                    <h2 class="text-5xl font-bold mb-4">Profil</h2>
                    <p class="text-gray-600 leading-relaxed mb-6 text-justify">
                        {{ $profil->profilDesc }}
                    </p>

                    <!-- Kotak Info -->
                    <div class="grid md:grid-cols-2 gap-6">
                        <!-- Box 1 -->
                        <div>
                            <div
                                class="flex items-center gap-2 cursor-default bg-orange-500 text-white rounded-lg px-4 py-3 shadow hover-lift hover-glow">
                                <i class="fas fa-award"></i>
                                <span class="font-semibold">Sekolah Terakreditasi A</span>
                            </div>
                            <p class="text-gray-700 text-sm mt-2">
                                Ditetapkan oleh BAN-PDM dengan sk 1857/BAN-SM/SK/2022.
                            </p>
                        </div>

                        <!-- Box 2 -->
                        <div>
                            <div
                                class="flex items-center gap-2 cursor-default bg-orange-500 text-white rounded-lg px-4 py-3 shadow hover-lift hover-glow">
                                <i class="fas fa-calendar-check"></i>
                                <span class="font-semibold">Success By Discipline</span>
                            </div>
                            <p class="text-gray-700 text-sm mt-2">
                                Dengan motto tersebut SMK PGRI 3 MALANG mampu menghasilkan lulusan yang sukses.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Visi -->
        <section class="w-full mx-auto pt-6 pb-10 mt-12">
            <div class="bg-orange-500 rounded-2xl shadow-lg overflow-visible relative hover-lift hover-glow">
                <div class="grid md:grid-cols-2 items-start relative py-12">
                    <div class="relative flex justify-center items-start w-full">
                        <!-- Gambar Kepala Sekolah - Desktop -->
                        <img src="{{ $assetBase . '/storage/' . $profil->visiImage }}"
                            alt="Kepala Sekolah SMK PGRI 3 Malang"
                            class="hidden md:block absolute top-0 left-[40%] transform -translate-x-1/2 -translate-y-[41.2%] w-full md:w-[100%] max-h-[450px] object-contain">

                        <!-- Nama di sebelah kanan leher - Desktop -->
                        <div class="hidden md:block absolute top-0 left-[450px] text-white">
                            <h3 class="text-md font-bold leading-tight drop-shadow-md whitespace-nowrap {{ strlen($profil->visiImageName) > 30 ? 'text-sm lg:text-md' : 'text-md' }}">
                                {{ $profil->visiImageName }}
                            </h3>
                        </div>

                        <!-- Mobile Layout -->
                        <div class="md:hidden flex flex-col items-center w-full bg-transparent rounded-2xl p-4">
                            <img src="{{ $assetBase . '/storage/' . $profil->visiImage }}"
                                alt="Kepala Sekolah SMK PGRI 3 Malang" 
                                class="w-full max-w-[200px] object-contain mb-4">
                            
                            <div class="text-center text-white w-full px-2">
                                <h3 class="text-lg font-bold leading-tight drop-shadow-lg mb-2">
                                    {{ $profil->visiImageName }}
                                </h3>
                            </div>
                        </div>
                    </div>

                    <!-- Bagian Visi -->
                    <div class="px-8 py-8 text-white z-10">
                        <h2 class="text-5xl font-bold mb-4">Visi</h2>
                        <p class="text-lg leading-relaxed">
                            {{ $profil->visiDesc }}
                        </p>
                    </div>
                </div>
            </div>
        </section>

        <!-- Misi -->
        <section class="w-full mx-auto pt-6 pb-10">
            <h2 class="text-5xl font-bold text-center mb-12">Misi</h2>
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-8">
                @foreach ($profil->misis as $misi)
                <x-profilcard bgColor="{{ $misi->misiColor }}" title="{!! $misi->misiTitle !!}"
                    image="{{ $assetBase . '/storage/' . $misi->misiImage }}">
                    {{ $misi->misiDesc }}
                </x-profilcard>
                @endforeach
            </div>

            <!-- Box kecil bawah -->
            <div class="grid sm:grid-cols-3 gap-6 mt-12">
                <!-- Box 1 -->
                <div
                    class="flex items-center justify-center gap-3 bg-orange-500 text-white rounded-lg px-6 py-4 shadow-md hover-lift hover-glow">
                    <img src="{{ $assetBase . '/assets/grad.png' }}" class="w-7 h-7 hover-scale invert" alt="graduation"
                        loading="lazy">
                    <span class="font-semibold text-lg cursor-default">Lulus Siap Kerja</span>
                </div>

                <!-- Box 2 -->
                <div
                    class="flex items-center justify-center gap-3 bg-orange-500 text-white rounded-lg px-6 py-4 shadow-md hover-lift hover-glow">
                    <img src="{{ $assetBase . '/assets/hand shake.png' }}" class="w-7 h-7 hover-scale invert"
                        alt="handshake" loading="lazy">
                    <span class="font-semibold text-lg cursor-default">Kerja Sama Industri</span>
                </div>

                <!-- Box 3 -->
                <div
                    class="flex items-center justify-center gap-3 bg-orange-500 text-white rounded-lg px-6 py-4 shadow-md hover-lift hover-glow">
                    <img src="{{ $assetBase . '/assets/trophy.png' }}" class="w-7 h-7 hover-scale invert" alt="trophy"
                        loading="lazy">
                    <span class="font-semibold text-lg cursor-default">Prestasi Tingkat Nasional</span>
                </div>
            </div>
        </section>

        <!-- Profil Lengkap -->
        <section class="mx-auto py-16">
            <h2 class="text-5xl font-bold text-center mb-8">Profil Lengkap SKARIGA</h2>
            <div
                class="relative w-full h-full max-h-52 sm:max-h-80 md:max-h-96 lg:max-h-[800px] aspect-square mx-auto rounded-2xl overflow-hidden shadow-lg hover-lift">
                <iframe
                    src="{{ $profil->youtubeSrc }}?si=JYpD_LbCAMgLP_zM&vq=hd480&modestbranding=1&rel=0&playsinline=1"
                    title="PROFIL SMK PGRI 3 MALANG" frameborder="0"
                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                    referrerpolicy="strict-origin-when-cross-origin" allowfullscreen
                    class="absolute inset-0 w-full h-full object-cover rounded-2xl">
                    <!-- vq=hd<res> -->
                </iframe>
            </div>
        </section>

        <!-- Sponsor -->
        <x-marquee />
    </div>
</x-layout>