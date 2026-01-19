{{--
@component x-plume::form.inline
--}}
<form action="{{ $action }}" method="{{ $method === 'GET' ? 'GET' : 'POST' }}"
    {{ $attributes->merge(['class' => 'flex items-center gap-4']) }}
    x-data="{{ $formData ?? '{}' }}">
    @if ($method !== 'GET' && $method !== 'POST')
        @method($method)
    @endif
    @if ($method !== 'GET')
        @csrf
    @endif
    {{ $slot }}
</form>
