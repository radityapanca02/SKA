<x-layout title="Ekstrakurikuler - SMK PGRI 3 Malang" :headerTransparent="false">
    <div class="h-full h-max-content container mx-auto px-4 py-6">
        <section class="relative h-[800px] mt-2 rounded-xl overflow-hidden">
            <div class="absolute inset-0 w-full h-full hover-scale">
                <img src="{{ $assetBase . '/assets/ekstrahero_11zon.webp' }}" alt="Hero SKARIGA" loading="lazy"
                    class="w-full h-full object-cover ">
                <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-black/30 to-transparent"></div>
            </div>
            <div class="absolute bottom-8 left-3.5 md:left-10 z-10">
                <h1 class="text-5xl md:text-7xl font-bold text-white drop-shadow-lg hover-scale cursor-default">
                    KEMBANGKAN<br>BAKATMU!
                </h1>
            </div>
        </section>

        <section class="w-full container py-12 md:py-16 overflow-hidden animate-fade-in" id="ekskul-content">
            <div class="max-w-full mx-auto">
                <h2 class="text-3xl md:text-5xl font-bold text-center mb-12">Ekstrakurikuler</h2>

                <div id="loading" class="hidden text-center py-8">
                    <div class="inline-block animate-spin rounded-full h-8 w-8 border-b-2 border-blue-600"></div>
                    <p class="mt-2 text-gray-600">Memuat data...</p>
                </div>

                <div id="ekskul-data">
                    <div class="max-w-full mx-auto">
                        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                            @foreach ($ekskuls as $ekskul)
                            <x-ekscard title="{{ $ekskul->title }}" alt="{{ $ekskul->title }}"
                                image="{{ $ekskul->image }}">
                                {{ $ekskul->desc }}
                            </x-ekscard>
                            @endforeach
                        </div>
                    </div>

                    <div class="flex justify-center mt-8 space-x-2" id="pagination-container">
                        {{ $ekskuls->links('pagination::tailwind') }}
                    </div>
                </div>
            </div>
        </section>
    </div>

    <script>
    document.addEventListener('DOMContentLoaded', function() {
        document.addEventListener('click', function(e) {
            const link = e.target.closest('.pagination a, #pagination-container a');

            if (link && link.getAttribute('href') && link.getAttribute('href').includes('?page=')) {
                e.preventDefault();

                // TAMBAH INI - Loading state
                document.getElementById('ekskul-data').style.opacity = '0.6';

                fetch(link.href)
                    .then(response => response.text())
                    .then(html => {
                        // FIX INI - Extract content dengan benar
                        const parser = new DOMParser();
                        const doc = parser.parseFromString(html, 'text/html');
                        const newContent = doc.getElementById('ekskul-data');

                        if (newContent) {
                            document.getElementById('ekskul-data').innerHTML = newContent.innerHTML;
                            window.history.pushState({}, '', link.href);
                        }
                    })
                    .finally(() => {
                        document.getElementById('ekskul-data').style.opacity = '1';
                    });
            }
        });
    });
    </script>

    <style>
    #ekskul-content {
        transition: opacity 0.3s ease-in-out;
    }

    #ekskul-data {
        transition: all 0.3s ease-in-out;
    }

    /* Style untuk pagination yang disabled */
    .text-gray-400,
    .cursor-not-allowed {
        pointer-events: none;
    }

    /* Loading animation */
    .animate-spin {
        animation: spin 1s linear infinite;
    }

    @keyframes spin {
        from {
            transform: rotate(0deg);
        }

        to {
            transform: rotate(360deg);
        }
    }
    </style>
</x-layout>
