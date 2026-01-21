{{--
@component x-plume::form
@description A collection of form components for user input.
--}}
<form action="{{ $action }}" method="{{ $method === 'GET' ? 'GET' : 'POST' }}"
    {{ $attributes->merge(['class' => 'space-y-6']) }}
    x-data="form({{ $formData ?? '{}' }})"
    @submit.prevent="submit"
>
    @if ($method !== 'GET' && $method !== 'POST')
        @method($method)
    @endif
    @if ($method !== 'GET')
        @csrf
    @endif
    {{ $slot }}

    {{-- Automatic Feedback Alerts --}}
    <template x-if="wasSuccessful">
        <div class="mt-4">
            <x-plume::alert variant="success" title="Success">
                <span x-text="message"></span>
            </x-plume::alert>
        </div>
    </template>

    <template x-if="hasFailed">
        <div class="mt-4">
            <x-plume::alert variant="error" title="Error">
                <span x-text="message"></span>
            </x-plume::alert>
        </div>
    </template>

    @if ($submitButton || $resetButton)
        <div class="flex items-center gap-4 pt-4 border-t border-gray-200 dark:border-gray-700">
            @if ($submitButton)
                <x-plume::button type="submit" x-bind:disabled="processing">
                    <span x-show="!processing">{{ $submitButton }}</span>
                    <span x-show="processing">Submitting...</span>
                </x-plume::button>
            @endif

            @if ($resetButton)
                <x-plume::button type="button" @click="reset()" style="minor">
                    {{ $resetButton }}
                </x-plume::button>
            @endif
        </div>
    @endif
</form>
