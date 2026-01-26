{{--
@component x-plume::command.group
@description A container for grouping related command items within a command palette.
@prop string $title (Default: null) The label for the group.
@usage
<x-plume::command>
    <x-plume::command.group title="Actions">
        <x-plume::command.item>Save File</x-plume::command.item>
    </x-plume::command.group>
</x-plume::command>
--}}
<div {{ $attributes->merge(['class' => 'space-y-1']) }}>
    @if ($title)
        <h4 class="px-2 py-1.5 text-xs font-semibold text-foreground/40 uppercase tracking-wider">
            {{ $title }}</h4>
    @endif
    <div class="space-y-1">
        {{ $slot }}
    </div>
</div>
