{{--
@component x-plume::table
@prop {boolean} striped - Default: false
--}}
@props([
    'striped' => false,
])
<div class="relative w-full overflow-auto">
    <table {{ $attributes->merge(['class' => 'w-full caption-bottom text-sm']) }}>
        {{ $slot }}
    </table>
</div>
