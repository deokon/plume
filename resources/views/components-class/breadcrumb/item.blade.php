{{--
@component x-plume::breadcrumb.item
@description Individual item in a breadcrumb trail.
--}}
<li {{ $attributes->merge(['class' => 'inline-flex items-center']) }}>
    @if ($href && !$active)
        <x-plume::button :href="$href" style="minor" size="sm" class="-mx-1">
            {{ $slot }}
        </x-plume::button>
    @else
        <span class="px-2 py-1 text-sm font-medium text-foreground dark:text-background-200 {{ $active ? '' : 'opacity-50' }}" 
              aria-current="{{ $active ? 'page' : 'false' }}">
            {{ $slot }}
        </span>
    @endif
</li>