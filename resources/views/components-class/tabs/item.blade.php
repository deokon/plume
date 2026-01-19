{{--
@component x-plume::tabs.item
--}}
@aware([
    'side' => 'top',
])
@php
    $resolvedSide = $attributes->get('side', $side);
@endphp
<div {{ $attributes->except('side')->merge(['class' => match ($resolvedSide) { 'left' => 'border-r-3 rounded-l-md', 'right' => 'border-l-3 rounded-r-md', default => 'border-b-4 rounded-t-md' }]) }}
    x-bind:class="{ 'bg-primary-50 border-primary text-primary dark:bg-primary-900 dark:border-primary-400 dark:text-primary-200': activeTab === '{{ $for }}', 'border-transparent': activeTab !== '{{ $for }}' }">
    <x-plume::button x-on:click="activeTab = '{{ $for }}'" style="ghost" fullWidth>
        {{ $slot }}
    </x-plume::button>
</div>
