{{--
@component x-plume::breadcrumb.item
@prop {null} href -  (Default: null)
@prop {boolean} active -  (Default: false)
--}}
@props([
    'href' => null,
    'active' => false,
])

<li {{ $attributes->merge(['class' => 'inline-flex items-center gap-1.5']) }}>
    @if($href && !$active)
        <a href="{{ $href }}" class="transition-colors hover:text-foreground dark:hover:text-background-200">
            {{ $slot }}
        </a>
    @else
        <span role="link" aria-disabled="true" aria-current="{{ $active ? 'page' : 'false' }}" class="{{ $active ? 'font-normal text-foreground dark:text-background-200' : '' }}">
            {{ $slot }}
        </span>
    @endif
</li>
