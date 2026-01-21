{{--
@component x-plume::form
@description A collection of form components for user input.
--}}
<form action="{{ $action }}" method="{{ $method === 'GET' ? 'GET' : 'POST' }}"
    {{ $attributes->merge(['class' => 'space-y-6']) }}
    x-data="form({{ $formData ?? '{}' }}, { hideOnSuccess: {{ $hideOnSuccess ? 'true' : 'false' }} })"
    @submit.prevent="submit()"
>
    @if ($method !== 'GET' && $method !== 'POST')
        @method($method)
    @endif
    @if ($method !== 'GET')
        @csrf
    @endif

    <div x-show="!isHidden" class="space-y-6" x-bind:class="{ 'opacity-50 pointer-events-none select-none': processing }">
        {{ $slot }}
    </div>

    {{-- Automatic Feedback Alerts --}}
    <template x-if="wasSuccessful">
        <x-plume::alert style="success" title="Success">
            <span x-text="message"></span>
        </x-plume::alert>
    </template>

    <template x-if="hasFailed">
        <x-plume::alert style="destructive" title="Error">
            <span x-text="message"></span>
        </x-plume::alert>
    </template>

    @if ($submitButton || $resetButton)
        <x-plume::form.actions x-show="!isHidden">
            @if ($submitButton)
                <x-plume::button.loader type="submit" var="processing">
                    {{ $submitButton }}
                </x-plume::button.loader>
            @endif

            @if ($resetButton)
                <x-plume::button x-on:click="reset()" style="minor">
                    {{ $resetButton }}
                </x-plume::button>
            @endif
        </x-plume::form.actions>
    @endif
</form>
