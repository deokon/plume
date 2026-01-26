{{--
@component x-plume::form
@description A robust form container with AJAX submission, validation error handling, and reactive state binding.
@prop string $action (Default: '') Submission URL. Auto-detected if using a <form> tag.
@prop string $method (Default: 'POST') HTTP method (GET, POST, PUT, PATCH, DELETE).
@prop array|string|null $formData (Default: null) Initial reactive data. Pass a PHP array or use Js::from().
@prop string $submitButton (Default: null) Label for an automatic primary submit button with a loader.
@prop string $resetButton (Default: null) Label for an automatic reset button.
@prop bool $hideOnSuccess (Default: false) Whether to hide the form content after a successful submission.
@prop bool $resetOnSuccess (Default: false) Whether to reset the form data to initial state after success.
@prop string $onSuccess (Default: null) AlpineJS expression or callback function to execute on success.
@prop string $onError (Default: null) AlpineJS expression or callback function to execute on error.
@prop bool $showAlerts (Default: true) Whether to automatically show success/error alerts.
@prop bool $inline (Default: false) Renders form elements in a horizontal flex layout.
@usage
### Basic Usage
```blade
<x-plume::form 
    action="/profile" 
    method="PUT" 
    :form-data="['name' => 'John', 'email' => 'john@example.com']"
    submit-button="Save Changes"
>
    <x-plume::form.input name="name" model="name" label="Name" />
    <x-plume::form.input name="email" model="email" label="Email" />
</x-plume::form>
```

### Initializing with Data
To populate a form with existing data (e.g., for an edit screen), use the `formData` prop. The keys in the array should match the `model` names of your input fields.
Using `Js::from()` is recommended for complex objects or to ensure correct JSON encoding:
```blade
<x-plume::form 
    :formData="Js::from($user->only(['name', 'email', 'bio']))"
    action="{{ route('users.update', $user) }}"
    method="PUT"
    submit-button="Update Profile"
>
    <x-plume::form.input model="name" label="Name" />
    <x-plume::form.input model="email" label="Email" />
</x-plume::form>
```

### Resetting Form State
You can programmatically reset the form to its initial `formData` state by calling the `reset()` method from within the form:
```blade
<x-plume::button @click="reset()">Discard Changes</x-plume::button>
```

### Inline Mode
The `inline` prop renders form elements in a horizontal flex layout, ideal for search bars or single-field subscriptions:
```blade
<x-plume::form action="/search" method="GET" inline>
    <x-plume::form.input name="q" placeholder="Search..." />
    <x-plume::button type="submit">Search</x-plume::button>
</x-plume::form>
```

### Validation Error Handling
When the server returns a 422 response with an 'errors' object, Plume automatically populates the form's error bag. Fields with matching 'model' names will display their respective error messages.
--}}
<form action="{{ $action }}" method="{{ $method === 'GET' ? 'GET' : 'POST' }}"
    {{ $attributes->merge(['class' => $inline ? 'inline' : 'space-y-6']) }} x-data="form({!! is_array($formData) ? Js::from($formData) : $formData ?? '{}' !!}, {
        hideOnSuccess: {{ Js::from($hideOnSuccess) }},
        resetOnSuccess: {{ Js::from($resetOnSuccess) }},
        onSuccess: {{ Js::from($onSuccess) }},
        onError: {{ Js::from($onError) }}
    })"
    @submit.prevent="submit()">
    @if ($method !== 'GET' && $method !== 'POST')
        @method($method)
    @endif
    @if ($method !== 'GET')
        @csrf
    @endif

    <div class="{{ $inline ? 'flex items-start gap-4' : '' }}">
        <div x-show="!isHidden" class="{{ $inline ? 'flex items-start gap-4' : 'space-y-6' }}"
            x-bind:class="{ 'opacity-50 pointer-events-none select-none': processing }">
            {{ $slot }}
        </div>

        @if ($showAlerts && (!$inline ?? true))
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

    @if ($showAlerts && ($inline ?? false))
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
