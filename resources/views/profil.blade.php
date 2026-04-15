<x-layout title="Profil - SMK PGRI 3 Malang" :headerTransparent="false">
    <div class="container mx-auto px-4 py-6">
        <!-- Hero SKARIGA -->
        <section class="relative h-[550px] md:h-[600px] lg:h-[700px] mt-2 rounded-xl overflow-hidden">
            <div class="absolute inset-0 w-full h-full transition-transform duration-300 hover:scale-105">
                <div class="absolute inset-0 bg-gradient-to-t from-transparent via-black/5 to-black/70"></div>
                <img src="{{ !is_null($profil->heroImage) ? $assetBase . '/storage/' . $profil->heroImage : 'https://placehold.co/600x400' }}"
                    alt="Hero SKARIGA" class="w-full h-full object-cover">
                <div class="absolute inset-0 bg-gradient-to-t from-black/90 via-black/30 to-transparent"></div>
            </div>
            <div class="absolute bottom-8 left-3.5 md:left-10 z-10">
                <h1
                    class="text-5xl md:text-7xl font-bold text-white drop-shadow-lg transition-transform duration-300 hover:scale-105 cursor-default">
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
                    <img src="{{ !is_null($profil->profilImage1) ? $assetBase . '/storage/' . $profil->profilImage1 : 'https://placehold.co/600x400' }}"
                        class="rounded-xl shadow-md w-full h-64 object-cover transition-all duration-300 hover:-translate-y-2 hover:shadow-xl hover:brightness-110"
                        alt="Keseluruhan Gedung">

                    <!-- 3 gambar kecil di bawah -->
                    <div class="grid grid-cols-2 gap-4">
                        <img src="{{ !is_null($profil->profilImage2) ? $assetBase . '/storage/' . $profil->profilImage2 : 'https://placehold.co/600x400' }}"
                            class="rounded-xl shadow-md h-40 w-full object-cover transition-all duration-300 hover:-translate-y-2 hover:shadow-xl hover:brightness-110"
                            alt="Gedung 1">
                        <img src="{{ !is_null($profil->profilImage3) ? $assetBase . '/storage/' . $profil->profilImage3 : 'https://placehold.co/600x400' }}"
                            class="rounded-xl shadow-md h-40 w-full object-cover transition-all duration-300 hover:-translate-y-2 hover:shadow-xl hover:brightness-110"
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
                                class="flex items-center gap-2 cursor-default bg-orange-500 text-white rounded-lg px-4 py-3 shadow transition-all duration-300 hover:-translate-y-1 hover:shadow-xl hover:shadow-orange-500/50">
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
                                class="flex items-center gap-2 cursor-default bg-orange-500 text-white rounded-lg px-4 py-3 shadow transition-all duration-300 hover:-translate-y-1 hover:shadow-xl hover:shadow-orange-500/50">
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
            <div
                class="bg-orange-500 rounded-2xl shadow-lg overflow-visible relative transition-all duration-300 hover:-translate-y-1 hover:shadow-xl hover:shadow-orange-500/50">
                <div class="grid md:grid-cols-2 items-start relative py-12">

                    <div class="relative flex justify-center items-start w-full">

                        <div class="hidden md:block absolute left-1/2 transform -translate-x-1/2 w-full max-h-[450px]
                            top-[-10%] md:top-16 lg:top-0
                            md:-translate-y-[30%] lg:-translate-y-[41.2%]">

                            <img src="{{ !is_null($profil->visiImage) ? $assetBase . '/storage/' . $profil->visiImage : $assetBase . '/assets/bp.Luqman_kepsek-removebg-preview.png' }}"
                                alt="Kepala Sekolah SMK PGRI 3 Malang"
                                style="-webkit-mask-image: linear-gradient(to bottom, black 90%, transparent 100%); mask-image: linear-gradient(to bottom, black 90%, transparent 100%);"
                                class="w-full max-h-[450px] object-contain mx-auto">

                            <div class="absolute bottom-6 left-1/2 transform -translate-x-1/2 text-center text-white w-full px-4"
                                style="text-shadow: 2px 2px 8px rgba(0,0,0,0.4);">
                                <h3 class="text-2xl font-bold tracking-wide">{{ $profil->visiImageName }}</h3>
                                <p class="text-base font-medium text-gray-100 mt-1">Kepala SMK PGRI 3 Malang</p>
                            </div>
                        </div>

                        <div class="md:hidden flex flex-col items-center w-full bg-transparent rounded-2xl p-4">
                            <div class="relative w-full max-w-96 flex justify-center">
                                <img src="{{ !is_null($profil->visiImage) ? $assetBase . '/storage/' . $profil->visiImage : $assetBase . '/assets/bp.Luqman_kepsek-removebg-preview.png' }}"
                                    alt="Kepala Sekolah SMK PGRI 3 Malang"
                                    style="-webkit-mask-image: linear-gradient(to bottom, black 90%, transparent 100%); mask-image: linear-gradient(to bottom, black 90%, transparent 100%);"
                                    class="w-full object-contain mb-4">

                                <div class="absolute bottom-6 left-1/2 transform -translate-x-1/2 text-center text-white w-full px-2"
                                    style="text-shadow: 2px 2px 6px rgba(0,0,0,0.4);">
                                    <h3 class="text-lg font-bold leading-tight">{{ $profil->visiImageName }}</h3>
                                    <p class="text-xs font-medium text-gray-100 mt-1">Kepala SMK PGRI 3 Malang</p>
                                </div>
                            </div>
                        </div>

                    </div>

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
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-1 lg:grid-cols-4 gap-8">
                @foreach ($profil->misis as $misi)
                <x-profilcard bgColor="{{ $misi->misiColor }}" title="{!! $misi->misiTitle !!}"
                    image="{{ !is_null($misi->misiImage) ? $assetBase . '/storage/' . $misi->misiImage : 'https://placehold.co/50x50' }}">
                    {{ $misi->misiDesc }}
                </x-profilcard>
                @endforeach
            </div>

            <!-- Box kecil bawah -->
            <div class="grid sm:grid-cols-3 gap-6 mt-12">
                <!-- Box 1 -->
                <div
                    class="flex items-center justify-center gap-3 bg-orange-500 text-white rounded-lg px-6 py-4 shadow-md transition-all duration-300 hover:-translate-y-1 hover:shadow-xl hover:shadow-orange-500/50">
                    <img src="{{ $assetBase . '/assets/grad.png' }}"
                        class="w-7 h-7 transition-transform duration-300 hover:scale-105 invert" alt="graduation"
                        loading="lazy">
                    <span class="font-semibold text-lg cursor-default">Lulus Siap Kerja</span>
                </div>

                <!-- Box 2 -->
                <div
                    class="flex items-center justify-center gap-3 bg-orange-500 text-white rounded-lg px-6 py-4 shadow-md transition-all duration-300 hover:-translate-y-1 hover:shadow-xl hover:shadow-orange-500/50">
                    <img src="{{ $assetBase . '/assets/hand shake.png' }}"
                        class="w-7 h-7 transition-transform duration-300 hover:scale-105 invert" alt="handshake"
                        loading="lazy">
                    <span class="font-semibold text-lg cursor-default">Kerja Sama Industri</span>
                </div>

                <!-- Box 3 -->
                <div
                    class="flex items-center justify-center gap-3 bg-orange-500 text-white rounded-lg px-6 py-4 shadow-md transition-all duration-300 hover:-translate-y-1 hover:shadow-xl hover:shadow-orange-500/50">
                    <img src="{{ $assetBase . '/assets/trophy.png' }}"
                        class="w-7 h-7 transition-transform duration-300 hover:scale-105 invert" alt="trophy"
                        loading="lazy">
                    <span class="font-semibold text-lg cursor-default">Prestasi Tingkat Nasional</span>
                </div>
            </div>
        </section>

        <!-- Profil Lengkap -->
        <section class="mx-auto py-16">
            <h2 class="text-5xl font-bold text-center mb-12">Profil Lengkap SKARIGA</h2>
            <div
                class="relative w-full h-full max-h-52 sm:max-h-80 md:max-h-96 lg:max-h-[800px] aspect-square mx-auto rounded-2xl overflow-hidden shadow-lg transition-all duration-300 hover:-translate-y-1 hover:shadow-xl">
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
