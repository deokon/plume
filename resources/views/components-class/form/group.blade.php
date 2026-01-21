{{--
@component x-plume::form.group
@description Groups related form inputs.
--}}
<div {{ $attributes->merge(['class' => 'space-y-4']) }}>
    @if ($label)
        <div class="space-y-1">
            <h3 class="text-sm font-medium leading-none text-foreground">
                {{ $label }}</h3>
            @if ($description)
                <p class="text-xs text-foreground/50 dark:text-background-400">
                    {{ $description }}</p>
            @endif
        </div>
    @endif
    <div class="{{ $gridClasses }}">
        {{ $slot }}
    </div>
</div>