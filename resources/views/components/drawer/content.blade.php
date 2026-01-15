{{--
@component x-plume::drawer.content
--}}
<div {{ $attributes->merge(['class' => 'flex-1 overflow-y-auto p-6 pt-0']) }}>
    {{ $slot }}
</div>
