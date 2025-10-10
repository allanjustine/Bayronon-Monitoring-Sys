<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="dark">

<head>
    @include('partials.head')
</head>

<body
    class="min-h-screen bg-white antialiased dark:bg-linear-to-b dark:from-neutral-950 dark:to-neutral-900 overflow-hidden">
    <main>
        {{ $slot }}
    </main>
    @fluxScripts

    <script data-navigate-once>
        let loadOnce;
        document.addEventListener('livewire:navigated', () => {
            if (loadOnce) loadOnce();

            loadOnce = Livewire.on('toast', (event) => {
                const {
                    message,
                    type
                } = event.data;

                Toastify({
                    text: message,
                    duration: 5000,
                    gravity: "bottom",
                    position: "center",
                    backgroundColor: type === 'success' ? '#4ade80' : '#f87171',
                }).showToast();
            });
        });
    </script>
</body>

</html>
