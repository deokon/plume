{{--
@component x-plume::tabs.panel
--}}
@aware([
    'side' => 'top',
])
@php
    $resolvedSide = $attributes->get('side', $side);
    $borderClass = match ($resolvedSide) {
        'left' => 'border-r rounded-r-md',
        'right' => 'border-l rounded-l-md',
        default => 'border-b rounded-b-md',
    };
@endphp

<div x-show="activeTab === '{{ $for }}'" x-cloak
    x-transition:enter="transition ease-out duration-200"
    x-transition:enter-start="opacity-0 translate-y-1"
    x-transition:enter-end="opacity-100 translate-y-0"
    {{ $attributes->except('side')->merge(['class' => 'p-4 grow border border-background-700/40 dark:border-background-400/20 ' . $borderClass]) }}>
    {{ $slot }}
</div>
