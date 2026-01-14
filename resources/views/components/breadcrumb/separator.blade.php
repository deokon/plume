<li role="presentation" aria-hidden="true" {{ $attributes->merge(['class' => '[&>.icon]:size-2.5 text-foreground/30']) }}>
    @if($slot->isNotEmpty())
        {{ $slot }}
    @else
        <x-plume::icon i="icon-[fluent--chevron-right-24-regular]" />
    @endif
</li>