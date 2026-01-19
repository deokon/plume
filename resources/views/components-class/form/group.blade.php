{{--
@component x-plume::form.group
--}}
<div {{ $attributes->merge(['class' => 'space-y-4']) }}>
    @if ($title)
        <h3 class="text-lg font-medium leading-6 text-foreground">
            {{ $title }}</h3>
    @endif
    <div class="grid grid-cols-1 gap-4 sm:grid-cols-2">
        {{ $slot }}
    </div>
</div>