{{--
@component x-plume::form.group
@description Groups related form inputs (like radios or checkboxes) under a single label.
@prop string $label (Default: null) Label for the group of inputs.
@prop string $description (Default: null) Help text for the group.
@prop int $minCols (Default: 1) Grid columns for the inner inputs.
@prop string $name (Default: null) Shared name attribute for child inputs.
@prop string $model (Default: null) Shared AlpineJS model name for child inputs.
@usage
### Grouping Checkboxes
The `model` prop on the group will be automatically shared with all child inputs, ideal for binding multiple values to an array:
```blade
<x-plume::form.group label="Interests" model="interests" description="Select all that apply">
    <x-plume::form.checkbox value="tech" label="Technology" />
    <x-plume::form.checkbox value="design" label="Design" />
    <x-plume::form.checkbox value="marketing" label="Marketing" />
</x-plume::form.group>
```

### Grid Layout
Use `minCols` to arrange children in a responsive grid:
```blade
<x-plume::form.group label="Options" :minCols="2">
    <x-plume::form.radio value="1" label="Option 1" />
    <x-plume::form.radio value="2" label="Option 2" />
</x-plume::form.group>
```
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
