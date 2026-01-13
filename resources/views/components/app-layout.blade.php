<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" x-data="page()">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $title ?? 'My App' }}</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="antialiased bg-background text-foreground dark:bg-background-800 dark:text-background-200">
    <div class="flex min-h-screen flex-col">
        <x-plume::header />

        <div class="flex flex-1">
            <x-plume::sidebar />

            <main class="min-w-0 flex-1 px-4 py-8 sm:px-6 lg:px-8">
                {{ $slot }}
            </main>
        </div>

        {{-- Mobile Overlay --}}
        <div
            x-show="mobileMenu"
            class="fixed inset-0 z-40 bg-background/80 backdrop-blur-sm lg:hidden"
            x-on:click="mobileMenu = false"
            x-transition:enter="transition-opacity ease-linear duration-300"
            x-transition:enter-start="opacity-0"
            x-transition:enter-end="opacity-100"
            x-transition:leave="transition-opacity ease-linear duration-300"
            x-transition:leave-start="opacity-100"
            x-transition:leave-end="opacity-0"
        ></div>
    </div>

    <x-plume::toaster />

</body>
</html>
