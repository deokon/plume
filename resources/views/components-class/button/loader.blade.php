{{--
@component x-plume::button.loader
@description A button that displays a loading spinner based on an AlpineJS boolean state.
@prop string $var (Default: null) The name of the AlpineJS boolean variable that controls the loading state.
@prop string $size (Default: 'md') Size of the button: 'sm', 'md', 'lg'.
@prop string $style (Default: null) Visual style of the button.
@usage
<div x-data="{ isBusy: false }">
    <x-plume::button.loader 
        var="isBusy" 
        @click="isBusy = true; setTimeout(() => isBusy = false, 2000)"
    >
        Submit Process
    </x-plume::button.loader>
</div>
--}}
<x-plume::button {{ $attributes->merge(['class' => 'relative']) }} style="{{ $style }}"
    x-bind:class="{ '[&>:not(:last-child)]:invisible': {{ $var }} }">
    <span>{{ $slot }}</span>
    <div class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 grayscale"
        x-show="{{ $var }}" x-cloak>
        <x-plume::spinner :size="$spinnerSize" style="white" />
    </div>
</x-plume::button>
