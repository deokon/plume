{{--
@component x-plume::table
@description A responsive table component.
--}}
@props([
    'striped' => false,
])
<div class="relative w-full overflow-auto">
    <table {{ $attributes->merge(['class' => 'w-full caption-bottom text-sm']) }}>
        {{ $slot }}
    </table>
</div>
