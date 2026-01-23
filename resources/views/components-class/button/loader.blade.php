{{--
@component x-plume::button.loader
@description Button with built-in loading state management.
@prop string $var (Default: null)
@prop string $size (Default: 'md')
@prop string $style (Default: null)
--}}
<x-plume::button {{ $attributes->merge(['class' => 'relative']) }} style="{{ $style }}"
    x-bind:class="{ '[&>:not(:last-child)]:invisible': {{ $var }} }">
    <span>{{ $slot }}</span>
    <div class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 grayscale"
        x-show="{{ $var }}" x-cloak>
        <x-plume::spinner :size="$spinnerSize" style="white" />
    </div>
</x-plume::button>
