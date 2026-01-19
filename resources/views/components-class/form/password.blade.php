{{--
@component x-plume::form.password
--}}
@aware(['groupName' => null, 'groupModel' => null])
@php
    [$resolvedName, $resolvedModel, $resolvedId] = $component->resolveFormAttributes($attributes->all(), $groupName, $groupModel);
@endphp
<div x-data="{ show: false }">
    <x-plume::form.input type="password" ::type="show ? 'text' : 'password'" :label="$label ?? $slot" :name="$resolvedName" :id="$resolvedId"
        :model="$resolvedModel" :value="$value" :placeholder="$placeholder" :icon="$icon" {{ $attributes->except(['name', 'model', 'id']) }}>
        @if (isset($after) && $after instanceof \Illuminate\View\ComponentSlot && $after->isNotEmpty())
            <x-slot:after>{{ $after }}</x-slot:after>
        @elseif(isset($after))
            <x-slot:after>{{ $after }}</x-slot:after>
        @endif
        <x-slot:rightSide>
            <button type="button" @click="show = !show"
                class="text-foreground/30 hover:text-foreground/60 transition-colors focus:outline-none">
                <x-plume::icon x-show="!show" i="icon-[fluent--eye-24-regular]" class="size-5" />
                <x-plume::icon x-show="show" i="icon-[fluent--eye-off-24-regular]" class="size-5"
                    x-cloak />
            </button>
        </x-slot:rightSide>
    </x-plume::form.input>
</div>
