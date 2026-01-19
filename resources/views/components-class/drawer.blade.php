{{--
@component x-plume::drawer
@description A panel that slides in from the edge of the screen.
--}}
<div x-data="drawer('{{ $name }}', @js($show))" x-on:keydown.escape.window="close()" x-show="show" x-cloak
    class="fixed inset-0 z-50 overflow-hidden" style="display: {{ $show ? 'block' : 'none' }};">
    <div x-show="show" x-cloak class="fixed inset-0 transform transition-all" x-on:click="close()"
        x-transition:enter="{{ $enter }}" x-transition:enter-start="opacity-0"
        x-transition:enter-end="opacity-100" x-transition:leave="{{ $leave }}"
        x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0">
        <div class="absolute inset-0 bg-background-950/80 backdrop-blur-sm"></div>
    </div>

    <div x-show="show" x-cloak
        class="fixed {{ $sideClasses }} transform bg-background shadow-xl transition-all duration-300 ease-in-out dark:bg-background-800 border-background-600 dark:border-background-200"
        x-transition:enter="transform transition ease-in-out duration-300" {!! $transitionAttributes !!}
        x-transition:leave="transform transition ease-in-out duration-300">
        <div class="flex h-full flex-col">
            {{-- Header --}}
            @if ((isset($header) && $header->isNotEmpty()) || $title || $description)
                <div
                    class="flex flex-col space-y-1.5 p-6 border-b border-background-700/40 dark:border-background-400/20">
                    @if (isset($header) && $header->isNotEmpty())
                        {{ $header }}
                    @else
                        @if ($title)
                            <h3 class="text-lg font-semibold leading-none tracking-tight">
                                {{ $title }}</h3>
                        @endif
                        @if ($description)
                            <p class="text-sm text-foreground/50 dark:text-background-400">
                                {{ $description }}</p>
                        @endif
                    @endif
                </div>
            @endif

            {{-- Content --}}
            <div class="flex-1 overflow-y-auto p-6">
                {{ $slot }}
            </div>

            {{-- Footer --}}
            @if (isset($footer) && $footer->isNotEmpty())
                <div
                    class="flex items-center p-6 border-t border-background-700/40 dark:border-background-400/20">
                    {{ $footer }}
                </div>
            @endif
        </div>
    </div>
</div>