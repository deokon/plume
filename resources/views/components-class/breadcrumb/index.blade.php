{{--
@component x-plume::breadcrumb
@description Displays the path to the current resource using a hierarchy of links.
--}}
<nav {{ $attributes->merge(['aria-label' => 'Breadcrumb']) }}>
    <ol class="flex flex-wrap items-center break-words text-sm text-foreground/50 dark:text-background-400">
        @foreach ($items as $item)
            <x-plume::breadcrumb.item :href="$item['href'] ?? null" :active="$item['active'] ?? false">
                {{ $item['label'] }}
            </x-plume::breadcrumb.item>

            @if (!$loop->last)
                <x-plume::breadcrumb.separator>
                    @if (!str_starts_with($separator, 'icon-'))
                        {{ $separator }}
                    @else
                        <x-plume::icon :i="$separator" />
                    @endif
                </x-plume::breadcrumb.separator>
            @endif
        @endforeach
        {{ $slot }}
    </ol>
</nav>
