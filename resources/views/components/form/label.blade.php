{{--
@component x-plume::form.label
@description Reusable form label component.
--}}
@props([
    'for' => null,
    'required' => false,
])

<label
    {{ $attributes->merge(['for' => $for, 'class' => 'block text-sm font-medium text-foreground dark:text-background-200']) }}>
    {{ $slot }}
    @if ($required)
        <span class="text-destructive">*</span>
    @endif
</label>
