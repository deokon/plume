{{--
@component x-plume::tabs.item
@description Individual tab navigation link.
@prop string $for (Default: null)
@prop string $size (Default: 'md')
@prop string $style (Default: 'default')
@prop string $shape (Default: 'default')
--}}
@aware([
    'side' => null,
    'size' => null,
    'style' => null,
    'shape' => null,
    'groupSide' => null,
    'groupSize' => null,
    'groupStyle' => null,
    'groupShape' => null,
])
@php
    $resolvedSide = $component->resolveAttribute($attributes, 'side', $groupSide ?? $side, 'top');
    [$resolvedSize, $resolvedStyle, $resolvedShape] = $component->resolveStyleProps($attributes, [
        'size' => $groupSize ?? $size, 
        'style' => $groupStyle ?? $style, 
        'shape' => $groupShape ?? $shape
    ]);
@endphp
<div {{ $attributes->except(['side', 'size', 'style', 'shape'])->merge(['class' => match ($resolvedSide) { 'left' => 'border-r-3 rounded-l-md', 'right' => 'border-l-3 rounded-r-md', default => 'border-b-4 rounded-t-md' }]) }}
    x-bind:class="{ 'bg-primary-50 border-primary text-primary dark:bg-primary-900 dark:border-primary-400 dark:text-primary-200': activeTab === '{{ $for }}', 'border-transparent': activeTab !== '{{ $for }}' }">
    <x-plume::button x-on:click="activeTab = '{{ $for }}'" style="ghost" :size="$resolvedSize" :shape="$resolvedShape" fullWidth>
        {{ $slot }}
    </x-plume::button>
</div>