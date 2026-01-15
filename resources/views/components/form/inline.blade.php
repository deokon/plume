{{--
@component x-plume::form.inline
--}}
<x-plume::form {{ $attributes->merge(['class' => 'flex flex-col items-start sm:flex-row gap-4 [&_button]:self-center']) }}>
    {{ $slot }}
</x-plume::form>
