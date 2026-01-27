{{--
@component x-plume::alert-dialog
@description Modal dialog specifically designed for alerting users to important information or actions.
@prop string $name (Default: 'alert-dialog') Unique name for the dialog, used by x-plume::button to target it.
@prop bool $show (Default: false) Whether the dialog is visible by default.
@prop string $maxWidth (Default: '2xl') Maximum width of the dialog (sm, md, lg, xl, 2xl, etc.).
@prop string $action (Default: 'Confirm') Text for the primary action button.
@prop bool $withCancel (Default: true) Whether to show a cancel button.
@prop string $onConfirm (Default: '') JavaScript action to execute when the primary button is clicked.
--}}
@php $alertDialog = $component; @endphp
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
        <x-plume::button style="error"
            x-on:click="close(); {{ $onConfirm }}">{{ $action }}</x-plume::button>
    </x-slot:footer>
</x-plume::modal>
