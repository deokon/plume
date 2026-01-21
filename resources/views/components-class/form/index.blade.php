{{--
@component x-plume::form
@description A collection of form components for user input.
@prop string action The form submission URL.
@prop string method The HTTP method (POST, GET, PUT, etc).
@prop string formData Initial JS data object for Alpine.
@prop string submitButton Label for the auto-generated submit button.
@prop string resetButton Label for the auto-generated reset button.
@prop bool hideOnSuccess Whether to hide form fields after success.
@prop bool inline Whether to display the form inputs in a single line.
--}}
<form action="{{ $action }}" method="{{ $method === 'GET' ? 'GET' : 'POST' }}"
    {{ $attributes->merge(['class' => $inline ? '' : 'space-y-6']) }}
    x-data="form({{ $formData ?? '{}' }}, { hideOnSuccess: {{ $hideOnSuccess ? 'true' : 'false' }} })"
    @submit.prevent="submit()"
>
    @if ($method !== 'GET' && $method !== 'POST')
        @method($method)
    @endif
    @if ($method !== 'GET')
        @csrf
    @endif

    <div x-show="!isHidden" class="{{ $inline ? 'flex items-end gap-4' : 'space-y-6' }}" x-bind:class="{ 'opacity-50 pointer-events-none select-none': processing }">
        {{ $slot }}

        @if ($submitButton || $resetButton)
            @if ($inline)
                <div class="flex items-center gap-2">
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
                </div>
            @else
                <x-plume::form.actions>
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
        @endif
    </div>

    {{-- Automatic Feedback Alerts --}}
    <template x-if="wasSuccessful">
        <div class="mt-4">
            <x-plume::alert style="success" title="Success">
                <span x-text="message"></span>
            </x-plume::alert>
        </div>
    </template>

    <template x-if="hasFailed">
        <div class="mt-4">
            <x-plume::alert style="destructive" title="Error">
                <span x-text="message"></span>
            </x-plume::alert>
        </div>
    </template>
</form>
