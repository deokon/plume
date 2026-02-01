{{--
@component x-plume::form.section
@description A titled section for organizing form fields into semantic groups with optional grid layout.
@prop string $title (Default: null) The section title.
@prop string $description (Default: null) Optional text to describe the section's purpose.
@prop int $minCols (Default: 1) Number of columns on small screens.
@prop int $maxCols (Default: null) Number of columns on large screens. Defaults to minCols if not set.
@usage
### Multi-column Layout
Create complex layouts without writing custom grid classes for every field:
```blade
<x-plume::form.section 
    title="Personal Information" 
    description="This information will be displayed on your profile."
    :min-cols="1"
    :max-cols="2"
>
    <x-plume::form.input name="first_name" label="First Name" />
    <x-plume::form.input name="last_name" label="Last Name" />
    <x-plume::form.input name="email" label="Email" class="sm:col-span-2" />
</x-plume::form.section>
```
--}}
<div {{ $attributes->merge(['class' => 'space-y-6']) }}>
    @if ($title)
        <div>
            <h3 class="text-lg font-medium leading-6 text-foreground dark:text-background-200">
                {{ $title }}</h3>
            @if ($description)
                <p class="mt-1 text-sm text-foreground/50 dark:text-background-400">
                    {{ $description }}</p>
            @endif
        </div>
    @endif
    <div class="{{ $gridClasses }}">
        {{ $slot }}
    </div>
</div>
