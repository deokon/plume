{{--
@component x-plume::navbar
@description A top-level navigation component for site-wide links and actions.
--}}
<nav x-data="{ mobileOpen: false }"
    {{ $attributes->merge(['class' => 'bg-background border-b border-background-200 dark:border-background-800']) }}>
    <div class="mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex h-16 justify-between">
            {{ $slot }}
        </div>
    </div>
</nav>
