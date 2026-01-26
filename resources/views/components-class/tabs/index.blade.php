{{--
@component x-plume::tabs
@description A set of layered sections of content, known as tab panels, that are displayed one at a time.
@prop string $default (Default: '1') The key of the tab to be active by default.
@prop string $side (Default: 'top') Side to display the tab list: 'top', 'bottom', 'left', 'right'.
@prop string $size (Default: 'md') Size of the tabs: 'sm', 'md', 'lg'.
@prop string $style (Default: 'default') Visual style: 'default', 'pill', 'outline'.
@prop string $shape (Default: 'default') Shape: 'default', 'round', 'square'.
@prop string $onTabChange (Default: null) AlpineJS expression or function to call when the active tab changes.
@usage
<x-plume::tabs default="profile">
    <x-plume::tabs.group>
        <x-plume::tabs.item for="profile">Profile</x-plume::tabs.item>
        <x-plume::tabs.item for="settings">Settings</x-plume::tabs.item>
    </x-plume::tabs.group>
    
    <x-plume::tabs.panel name="profile">
        Profile Content
    </x-plume::tabs.panel>
    <x-plume::tabs.panel name="settings">
        Settings Content
    </x-plume::tabs.panel>
</x-plume::tabs>
--}}
@aware([
    'groupSize' => null,
    'groupStyle' => null,
    'groupShape' => null,
    'groupSide' => null,
])
@php
    $groupSize = $groupSize ?? ($size ?? $component->size);
    $groupStyle = $groupStyle ?? ($style ?? $component->style);
    $groupShape = $groupShape ?? ($shape ?? $component->shape);
    $groupSide = $groupSide ?? ($side ?? $component->side);
@endphp
<div x-data="tabs('{{ $default }}', { onTabChange: {{ Js::from($onTabChange) }} })" {{ $attributes->merge(['class' => 'w-full']) }}>
    <div class="flex {{ $directionClass }}">
        {{ $slot }}
    </div>
</div>
