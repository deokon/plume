{{--
@component x-plume::table
@description A responsive table component.
@prop {boolean} striped - Whether to alternate row background colors. (Default: false)
--}}
@props([
    'striped' => false,
])
<div class="relative w-full overflow-auto">
    <table {{ $attributes->merge(['class' => 'w-full caption-bottom text-sm']) }}>
        {{ $slot }}
    </table>
</div>
