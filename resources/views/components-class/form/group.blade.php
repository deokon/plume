{{--
@component x-plume::form.group
@description Groups related form inputs.
@prop string $label (Default: null)
@prop string $description (Default: null)
@prop int $minCols (Default: 1)
@prop string $name (Default: null)
@prop string $model (Default: null)
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
