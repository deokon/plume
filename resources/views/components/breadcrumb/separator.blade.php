<li role="presentation" aria-hidden="true" {{ $attributes->merge(['class' => '[&>.icon]:size-2.5']) }}>
    {{ $slot ?? '' }}
    @if(!$slot->isNotEmpty())
        <x-plume::icon i="icon-[fluent--chevron-right-24-regular]" />
    @endif
</li>
