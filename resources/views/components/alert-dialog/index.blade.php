@use('deokon\Plume\Theme')
{{--
@component x-plume::alert-dialog
@description Modal dialog specifically designed for alerting users to important information or actions.
--}}
@props([
    'name' => 'alert-dialog',
    'show' => false,
    'maxWidth' => '2xl',
    'action' => 'Confirm',
    'withCancel' => true,
    'onConfirm' => '',
])
<x-plume::modal {{ $attributes }}>
    {{ $slot }}
    <x-slot:footer>
        @if($withCancel)
            <x-plume::button style="outline" x-on:click="show = false;">Cancel</x-plume::button>
        @endif
        <x-plume::button style="destructive" x-on:click="show = false; {{ $onConfirm }}">{{ $action }}</x-plume::button>
    </x-slot:footer>
</x-plume::modal>
