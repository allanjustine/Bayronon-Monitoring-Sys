<meta charset="utf-8" />
<meta name="csrf-token" content="{{ csrf_token() }}">
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<title>{{ $title ?? config('app.name') }}</title>
<link rel="icon" href="/favicon.ico?v=2" sizes="any">
<link rel="icon" href="/favicon.svg?v=2" type="image/svg+xml">
<link rel="apple-touch-icon" href="/apple-touch-icon.png?v=2">
<link rel="preconnect" href="https://fonts.bunny.net">
<link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css">
<script src="https://cdn.jsdelivr.net/npm/toastify-js" data-navigate-once></script>
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
@vite(['resources/css/app.css', 'resources/js/app.js'])
<link rel="preload" as="style" href="https://bayronon.smctgroup.ph/build/assets/app-Pbkkcxag.css">
<link rel="modulepreload" href="https://bayronon.smctgroup.ph/build/assets/app-l0sNRNKZ.js">
<link rel="stylesheet" href="https://bayronon.smctgroup.ph/build/assets/app-Pbkkcxag.css" data-navigate-track="reload">
<script type="module" src="https://bayronon.smctgroup.ph/build/assets/app-l0sNRNKZ.js" data-navigate-track="reload">
</script>

{{-- FOR OG --}}
<meta property="og:title" content="Bayronon Monitoring | {{ $title ?? 'Not Set' }}">
<meta property="og:description"
    content="Bayronon offers lightning-fast calculations and seamless payment processing, ensuring a smooth and efficient transaction experience. Whether you're managing complex billing or making routine payments, Bayronon's smart system handles computations instantly and processes payments without delay — saving you time and increasing productivity.">
<meta property="og:image" content="{{ asset('logo/no-money.png') }}">
<meta property="og:url" content="{{ url()->current() }}">
<meta property="og:type" content="website">
<meta property="og:site_name" content="Bayronon Monitoring">

{{-- FOR TWITTER --}}
<meta name="twitter:card" content="summary_large_image">
<meta name="twitter:title" content="Bayronon Monitoring | {{ $title ?? 'Not Set' }}">
<meta name="twitter:description"
    content="Bayronon offers lightning-fast calculations and seamless payment processing, ensuring a smooth and efficient transaction experience. Whether you're managing complex billing or making routine payments, Bayronon's smart system handles computations instantly and processes payments without delay — saving you time and increasing productivity.">
<meta name="twitter:image" content="{{ asset('logo/no-money.png') }}">

{{-- FOR BASIC META --}}
<meta name="title" content="Bayronon Monitoring | {{ $title ?? 'Not Set' }}">
<meta name="description"
    content="Bayronon offers lightning-fast calculations and seamless payment processing, ensuring a smooth and efficient transaction experience. Whether you're managing complex billing or making routine payments, Bayronon's smart system handles computations instantly and processes payments without delay — saving you time and increasing productivity.">
<meta name="author" content="Allan Justine Mascariñas" />

@fluxAppearance
