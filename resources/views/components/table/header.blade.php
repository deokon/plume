{{--
@component x-plume::table.header
--}}
<thead {{ $attributes->merge(['class' => '[&_tr]:border-b']) }}>
    {{ $slot }}
</thead>
