{{--
@component x-plume::navbar
@description A top-level navigation component for site-wide links and actions.
--}}
<nav x-data="{ mobileOpen: false }"
    {{ $attributes->merge(['class' => 'bg-background border-b border-background-200 dark:border-background-800' . ($sticky ? ' sticky top-0 z-50' : '')]) }}>
    <div class="mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex h-16 justify-between items-center gap-4">
            @if(isset($left) || isset($center) || isset($right))
                <div class="flex shrink-0 items-center justify-start h-full">
                    {{ $left ?? '' }}
                </div>

                @if(isset($center))
                    <div class="flex flex-1 items-center justify-center h-full text-center">
                        {{ $center }}
                    </div>
                @else
                    <x-plume::spacer />
                @endif

                <div class="flex shrink-0 items-center justify-end h-full gap-2">
                    {{ $right ?? '' }}
                    @if(isset($mobile))
                        <x-plume::navbar.mobile-toggle :icon="$mobileIcon" class="ml-2" />
                    @endif
                </div>
            @else
                {{ $slot }}
            @endif
        </div>
    </div>

    @if (isset($mobile))
        <x-plume::navbar.mobile-menu>
            {{ $mobile }}
        </x-plume::navbar.mobile-menu>
    @elseif(isset($mobileMenu))
        {{ $mobileMenu }}
    @endif
</nav>
