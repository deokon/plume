{{--
@component x-plume::stepper.actions
@description Standard actions layout for stepper components.
--}}
@props([
    'prev' => null,
    'next' => null,
])

<div {{ $attributes->merge(['class' => 'flex justify-start items-center gap-3 mt-6']) }}>
    @if($prev)
        <x-plume::button style="outline" size="sm" @click="active = Math.max(1, active - 1)">
            {{ $prev === true ? 'Previous' : $prev }}
        </x-plume::button>
    @endif
    @if($next)
        <x-plume::button size="sm" @click="active = active + 1">
            {{ $next === true ? 'Next' : $next }}
        </x-plume::button>
    @endif
    {{ $slot }}
</div>
