{{--
@component x-plume::alert-dialog
@description Modal dialog specifically designed for alerting users to important information or actions.
@prop string $name (Default: 'alert-dialog')
@prop bool $show (Default: false)
@prop string $maxWidth (Default: '2xl')
@prop string $action (Default: 'Confirm')
@prop bool $withCancel (Default: true)
@prop string $onConfirm (Default: '')
--}}
<x-plume::modal name="{{ $name }}" :show="$show" :maxWidth="$maxWidth" role="alertdialog"
    aria-modal="true" aria-labelledby="{{ $name }}-title"
    aria-describedby="{{ $name }}-description" {{ $attributes }}>
    <div id="{{ $name }}-description">
        {{ $slot }}
    </div>
    <x-slot:footer>
        @if ($withCancel)
            <x-plume::button style="outline" x-on:click="close()">Cancel</x-plume::button>
        @endif
        <x-plume::button style="destructive"
            x-on:click="close(); {{ $onConfirm }}">{{ $action }}</x-plume::button>
    </x-slot:footer>
</x-plume::modal>