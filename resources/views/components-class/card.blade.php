{{--
@component x-plume::card
@description A versatile container for related content and actions, featuring semantic sections.
@prop string $title (Default: null) The main title for the card.
@prop string $description (Default: null) A brief description or subtitle.
@prop string $badge (Default: null) Text for an optional status badge in the header.
@prop string $badgeStyle (Default: 'default') The visual style of the badge.
@prop string $href (Default: null) If provided, renders the card as a clickable link.
@usage
<x-plume::card title="Project Alpha" description="Updated 2 hours ago" badge="In Progress">
    <p>Card content goes here.</p>
    <x-slot:footer>
        <x-plume::button size="sm">View Project</x-plume::button>
    </x-slot:footer>
</x-plume::card>
--}}
@php
    $tag = $href ? 'a' : 'div';
@endphp
<{{ $tag }} @if ($href) href="{{ $href }}" @endif
    {{ $attributes->merge(['class' => 'w-full rounded-xl border border-background-700/40 bg-background shadow dark:border-background-400/20 dark:bg-background-800' . ($href ? ' transition-all hover:bg-background-50 dark:hover:bg-background-700/50 hover:scale-[1.01] hover:shadow-lg' : '')]) }}>
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
