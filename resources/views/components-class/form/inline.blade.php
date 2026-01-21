{{--
@component x-plume::form.inline
--}}
<form action="{{ $action }}" method="{{ $method === 'GET' ? 'GET' : 'POST' }}"
    {{ $attributes->merge(['class' => 'flex items-center gap-4']) }}
    x-data="form({{ $formData ?? '{}' }}, { hideOnSuccess: {{ $hideOnSuccess ? 'true' : 'false' }} })"
    @submit.prevent="submit"
>
    @if ($method !== 'GET' && $method !== 'POST')
        @method($method)
    @endif
    @if ($method !== 'GET')
        @csrf
    @endif
    
    <div x-show="!isHidden" class="contents" x-bind:class="{ 'opacity-50 pointer-events-none': processing }">
        {{ $slot }}
    </div>

    <template x-if="wasSuccessful">
        <span class="text-sm text-green-600 dark:text-green-400" x-text="message"></span>
    </template>
    <template x-if="hasFailed">
        <span class="text-sm text-red-600 dark:text-red-400" x-text="message"></span>
    </template>
</form>
