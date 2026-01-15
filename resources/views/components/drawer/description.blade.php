{{--
@component x-plume::drawer.description
--}}
<p {{ $attributes->merge(['class' => 'text-sm text-foreground/50 dark:text-background-400']) }}>
    {{ $slot }}
</p>
