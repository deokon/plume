{{--
@component x-plume::form.section
@description A titled section for organizing form fields.
@prop string $title (Default: null)
@prop string $description (Default: null)
@prop int $minCols (Default: 1)
@prop int $maxCols (Default: null)
--}}
<div {{ $attributes->merge(['class' => 'space-y-6']) }}>
    @if ($title)
        <div>
            <h3 class="text-lg font-medium leading-6 text-foreground">
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