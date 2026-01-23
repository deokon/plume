{{--
@component x-plume::form.label
@description A label for a form input.
@prop string $for (Default: null)
@prop bool $required (Default: false)
--}}
<label @if ($for) for="{{ $for }}" @endif
    {{ $attributes->merge(['class' => 'block text-sm font-medium text-foreground/70 dark:text-background-400']) }}>
    {{ $slot }}
    @if ($required)
        <span class="text-destructive ml-0.5">*</span>
    @endif
</label>
