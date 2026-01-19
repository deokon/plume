{{--
@component x-plume::command.group
--}}
<div {{ $attributes->merge(['class' => 'space-y-1']) }}>
    @if ($title)
        <h4 class="px-2 py-1.5 text-xs font-semibold text-foreground/40 uppercase tracking-wider">
            {{ $title }}</h4>
    @endif
    <div class="space-y-1">
        {{ $slot }}
    </div>
</div>
