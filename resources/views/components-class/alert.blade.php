{{--
@component x-plume::alert
@description Displays a callout for user attention.
--}}
<div x-data="{ open: true, close() { this.open = false;
        @if ($onClose) {{ $onClose }} @endif } }" x-show="open" x-transition:leave="transition ease-in duration-200"
    x-transition:leave-start="opacity-100 scale-100" x-transition:leave-end="opacity-0 scale-95"
    @if ($autoclose) x-init="setTimeout(() => close(), {{ $autoclose }})" @endif
    class="w-full">
    <div
        {{ $attributes->merge(['class' => 'w-full flex items-start p-4 border-l-[3px] rounded-md ' . $containerClasses]) }}>
        @if ($resolvedIcon)
            <x-plume::icon :i="$resolvedIcon" class="mr-3 mt-0.5 shrink-0 {{ $iconClasses }}" />
        @endif
        <div class="grow">
            @if ($title)
                <h3 class="font-bold">{{ $title }}</h3>
            @endif
            {{ $slot }}
        </div>
        @if ($closable)
            <x-plume::button size="sm" style="ghost" class="ml-auto -mr-1.5 -mt-1.5 p-1"
                aria-label="Close" x-on:click="close()">
                <x-plume::icon i="icon-[fluent--dismiss-24-regular]" class="text-lg" />
            </x-plume::button>
        @endif
    </div>
</div>
