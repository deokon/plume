@props([
    'label' => null,
    'name' => null,
    'id' => null,
    'model' => null,
    'after' => null,
])
<div x-data="{ showPassword: false }">
    <x-plume::form.input :label="$label ?? $slot" :name="$name" :id="$id" :model="$model" type="password" x-bind:type="showPassword ? 'text' : 'password'">
        @if($after)
            <x-slot:after>{{ $after }}</x-slot:after>
        @endif
        <x-slot:rightSide>
            <x-plume::icon x-show="!showPassword" i="icon-[fluent--eye-off-24-filled]" class="cursor-pointer" x-on:click="showPassword = true" />
            <x-plume::icon x-show="showPassword" i="icon-[fluent--eye-24-filled]" class="cursor-pointer" x-on:click="showPassword = false" />
        </x-slot:rightSide>
    </x-plume::form.input>
</div>
