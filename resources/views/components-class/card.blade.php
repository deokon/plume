{{--
@component x-plume::card
@description Displays a card with header, content, and footer.
--}}
@php
    $tag = $href ? 'a' : 'div';
@endphp
<{{ $tag }} 
    @if($href) href="{{ $href }}" @endif
    {{ $attributes->merge(['class' => 'rounded-xl border border-background-700/40 bg-background shadow dark:border-background-400/20 dark:bg-background-800' . ($href ? ' transition-all hover:bg-background-50 dark:hover:bg-background-700/50 hover:scale-[1.01] hover:shadow-lg' : '')]) }}>
    {{-- Header --}}
    @if ((isset($header) && $header->isNotEmpty()) || $title || $description || $badge)
        <div class="flex flex-col space-y-1.5 p-6">
            @if (isset($header) && $header->isNotEmpty())
                {{ $header }}
            @else
                @if ($title || $badge)
                    <div class="flex items-center justify-between gap-4">
                        @if ($title)
                            <h3 class="text-lg font-semibold leading-none tracking-tight">
                                {{ $title }}</h3>
                        @endif
                        @if ($badge)
                            <x-plume::badge :style="$badgeStyle">
                                {{ $badge }}
                            </x-plume::badge>
                        @endif
                    </div>
                @endif
                @if ($description)
                    <p class="text-sm text-foreground/50 dark:text-background-400">
                        {{ $description }}</p>
                @endif
            @endif
        </div>
    @endif

    {{-- Content --}}
    <div class="p-6 @if ((isset($header) && $header->isNotEmpty()) || $title || $description || $badge) pt-0 @endif">
        {{ $slot }}
    </div>

    {{-- Footer --}}
    @if (isset($footer) && $footer->isNotEmpty())
        <div class="flex items-center p-6 pt-0">
            {{ $footer }}
        </div>
    @endif
</{{ $tag }}>
