<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <x-meta></x-meta>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @props(['title'])
    <title>SMK PGRI 3 Malang - Success by Discipline</title>

    <!-- Libraries -->
    @vite(['resources/css/app.css', 'resources/ts/app.ts'])
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap"
        rel="stylesheet">

    <!-- Dynamic Favicon -->
    <link rel="shortcut icon" href="{{ $assetBase }}/assets/skariga300rbg.png" type="image/x-icon">

    <!-- Manual CSS untuk fallback -->
    @production
    <link rel="stylesheet" href="{{ $assetBase }}/build/assets/app.css">
    @endproduction
</head>

<body class="bg-[#F8F8F8] m-0 p-0 overflow-x-hidden">
    <x-b2t></x-b2t>

    @props(['headerTransparent' => false])
    @if (!$headerTransparent)
    <x-header :transparent="$headerTransparent"></x-header>
    @else
    <x-header :transparent="$headerTransparent"></x-header>
    @endif

    {{ $slot }}
    <x-sidebar></x-sidebar>
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
        // Trigger API call untuk update status
        fetch('/api/visitor-leave', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify({
                action: 'leave'
            }),
            keepalive: true // Penting: biar tetap execute meskipun page unload
        });
    });
    </script>
</body>

</html>
