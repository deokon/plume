{{--
@component x-plume::form.actions
@description Container for form action buttons (submit/cancel).
--}}
<div {{ $attributes->merge(['class' => 'flex items-center justify-end gap-3']) }}>
    {{ $slot }}
</div>
