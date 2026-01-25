{{--
@component x-plume::form
@description A collection of form components for user input.
@prop string $action (Default: '')
@prop string $method (Default: 'POST')
@prop array|string|null $formData (Default: null)
@prop string $submitButton (Default: null)
@prop string $resetButton (Default: null)
@prop bool $hideOnSuccess (Default: false)
@prop bool $resetOnSuccess (Default: false)
@prop bool $inline (Default: false)
--}}
<form action="{{ $action }}" method="{{ $method === 'GET' ? 'GET' : 'POST' }}"
    {{ $attributes->merge(['class' => $inline ? 'inline' : 'space-y-6']) }}
    x-data="form({{ Js::from($formData ?? (object)[]) }}, { hideOnSuccess: {{ Js::from($hideOnSuccess) }}, resetOnSuccess: {{ Js::from($resetOnSuccess) }} })"
    @submit.prevent="submit()"
>
    @if ($method !== 'GET' && $method !== 'POST')
        @method($method)
    @endif
    @if ($method !== 'GET')
        @csrf
    @endif

    <div class="{{ $inline ? 'flex items-start gap-4' : '' }}">
        <div x-show="!isHidden" class="{{ $inline ? 'flex items-start gap-4' : 'space-y-6' }}" x-bind:class="{ 'opacity-50 pointer-events-none select-none': processing }">
            {{ $slot }}
        </div>

        @if(!$inline ?? true)
            {{-- Automatic Feedback Alerts --}}
            <template x-if="wasSuccessful">
                <x-plume::alert style="success" title="Success" class="mt-4">
                    <span x-text="message"></span>
                </x-plume::alert>
            </template>

            <template x-if="hasFailed">
                <x-plume::alert style="error" title="Error" class="mt-4">
                    <span x-text="message"></span>
                </x-plume::alert>
            </template>
        @endif

        @if ($submitButton || $resetButton)
            <x-plume::form.actions x-show="!isHidden" class="mt-6">
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
    </div>

    @if($inline ?? false)
        {{-- Automatic Feedback Alerts --}}
        <template x-if="wasSuccessful">
            <x-plume::alert style="success" title="Success" class="mt-4">
                <span x-text="message"></span>
            </x-plume::alert>
        </template>

        <template x-if="hasFailed">
            <x-plume::alert style="error" title="Error" class="mt-4">
                <span x-text="message"></span>
            </x-plume::alert>
        </template>
    @endif
</form>
