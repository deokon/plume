{{--
@component x-plume::form.label
@description A label for a form input.
@prop string $for (Default: null) The ID of the input this label is for.
@prop bool $required (Default: false) Whether to display a required indicator (asterisk).
--}}
<label @if ($for) for="{{ $for }}" @endif
    {{ $attributes->merge(['class' => 'block text-sm font-medium text-foreground/70 dark:text-background-400']) }}>
    {{ $slot }}
    @if ($required)
        <span class="text-error ml-0.5">*</span>
    @endif
</label>
