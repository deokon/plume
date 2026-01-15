{{--
@component x-plume::stepper.actions
@description Standard actions layout for stepper components.
--}}
@props([
    'back' => null,
    'next' => null,
    'previous' => null,
    'finish' => null,
])

<div {{ $attributes->merge(['class' => 'flex items-center gap-3 mt-6']) }}>
    @if($back || $previous)
        <x-plume::button 
            style="outline" 
            size="sm"
            @click="active = Math.max(1, active - 1)"
        >
            {{ $back ?? $previous ?? 'Back' }}
        </x-plume::button>
    @endif

    <x-plume::spacer />

    @if($next)
        <x-plume::button 
            size="sm"
            @click="active = active + 1"
        >
            {{ $next === true ? 'Next' : $next }}
        </x-plume::button>
    @endif

    @if($finish)
        <x-plume::button 
            size="sm"
            @click="$dispatch('finish')"
        >
            {{ $finish === true ? 'Finish' : $finish }}
        </x-plume::button>
    @endif

    {{ $slot }}
</div>
