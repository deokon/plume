{{--
@component x-plume::tabs.item
@description Individual tab navigation link.
@prop string $for (Default: null) The unique identifier of the tab this item activates.
@prop string $size (Default: 'md') The size of the tab: 'sm', 'md', 'lg'.
@prop string $style (Default: 'default') The visual style: 'default', 'secondary', 'error', 'outline', 'ghost', 'link', 'minor'.
@prop string $shape (Default: 'default') The shape of the tab button: 'default' (rounded), 'pill', 'round'.
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
    $tabsItem = $component;
    $resolvedSide = $tabsItem->resolveAttribute($attributes, 'side', $groupSide ?? $side, 'top');
    [$resolvedSize, $resolvedStyle, $resolvedShape] = $tabsItem->resolveStyleProps($attributes, [
        'size' => $groupSize ?? $size,
        'style' => $groupStyle ?? $style,
        'shape' => $groupShape ?? $shape,
    ]);
@endphp
<div {{ $attributes->except(['side', 'size', 'style', 'shape'])->merge(['class' => match ($resolvedSide) {'left' => 'border-r-3 rounded-l-md','right' => 'border-l-3 rounded-r-md',default => 'border-b-4 rounded-t-md'}]) }}
    x-bind:class="{ 'bg-primary-50 border-primary text-primary dark:bg-primary-900 dark:border-primary-400 dark:text-primary-200': activeTab === '{{ $for }}', 'border-transparent': activeTab !== '{{ $for }}' }">
    <x-plume::button x-on:click="activeTab = '{{ $for }}'" style="ghost" :size="$resolvedSize"
        :shape="$resolvedShape" fullWidth>
        {{ $slot }}
    </x-plume::button>
</div>
