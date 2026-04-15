@props(['image', 'title', 'departement', 'deskripsi' => ''])

@php
$deptColors = [
'OTOMOTIF' => 'border-red-500',
'TIK' => 'border-purple-500',
'ELEKTRO' => 'border-yellow-500',
'PEMESINAN' => 'border-blue-500',
];
$colorClass = $deptColors[$departement] ?? 'border-gray-500';
$deptLower = strtolower($departement);
@endphp

<div class="w-[380px] shrink-0 rounded-2xl overflow-hidden cursor-pointer group transition-all duration-300 ease-in-out hover:-translate-y-1 hover:shadow-xl"
    onclick="handleJurusanClick('{{ $title }}', '{{ $departement }}', `{!! nl2br(e($slot)) !!}`, '{{ $image }}', '{{ $deptLower }}')">

    <!-- Image Container with Overlay -->
    <div class="relative h-56 overflow-hidden">
        <img src="{{ $image }}" alt="{{ $title }}"
            class="w-full h-full object-cover transition duration-500 group-hover:scale-110 group-hover:blur-sm"
            loading="lazy" />
        <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-black/20 to-transparent"></div>

        <!-- Hover Overlay with Selengkapnya -->
        <div
            class="absolute inset-0 flex items-center justify-center opacity-0 group-hover:opacity-100 transition duration-300 bg-black/40">
            <span class="text-white font-semibold text-lg flex items-center gap-2">
                <i class="fas fa-info-circle"></i> Selengkapnya
            </span>
        </div>

        @php
        // Logika warna yang sama dengan Alpine.js
        $lineColor = match(strtoupper($departement)) {
        'OTOMOTIF' => 'bg-red-500',
        'TIK' => 'bg-purple-500',
        'ELEKTRO' => 'bg-yellow-500',
        default => 'bg-blue-500',
        };
        @endphp

        <div class="absolute bottom-4 left-4 right-4">
            <div class="flex items-center gap-3">
                <div class="w-1 h-8 {{ $lineColor }}"></div>

                <div>
                    <h4 class="font-bold text-xl text-white drop-shadow-lg">{{ $title }}</h4>
                    <p class="text-sm text-gray-200">{{ $departement }}</p>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
function handleJurusanClick(title, dept, desc, image, departemen) {
    // Kirim statistik
    fetch('{{ route("jurusan.increment-stats") }}', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': '{{ csrf_token() }}'
        },
        body: JSON.stringify({
            departemen: departemen,
            type: 'click'
        })
    }).catch(err => console.error('Error tracking:', err));

    // Buka modal
    openJurusanModal(title, dept, desc, image);
}
</script>
