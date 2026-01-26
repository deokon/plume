{{--
@component x-plume::form.group
@description Groups related form inputs (like radios or checkboxes) under a single label.
@prop string $label (Default: null) Label for the group of inputs.
@prop string $description (Default: null) Help text for the group.
@prop int $minCols (Default: 1) Grid columns for the inner inputs.
@prop string $name (Default: null) Shared name attribute for child inputs.
@prop string $model (Default: null) Shared AlpineJS model name for child inputs.
@usage
<x-plume::form.group label="Notification Preferences" model="prefs">
    <x-plume::form.checkbox value="email" label="Email" />
    <x-plume::form.checkbox value="sms" label="SMS" />
</x-plume::form.group>
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
