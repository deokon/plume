{{--
@component x-plume::form
@description A collection of form components for user input.
--}}
@props([
    'action' => '',
    'method' => 'POST',
    'formData' => null,
])
<form action="{{ $action }}" method="{{ $method === 'GET' ? 'GET' : 'POST' }}"
    {{ $attributes->merge(['class' => 'space-y-6']) }} x-data="{{ $formData ?? '{}' }}">
    @if ($method !== 'GET' && $method !== 'POST')
        @method($method)
    @endif
    @if ($method !== 'GET')
        @csrf
    @endif
    {{ $slot }}
</form>
