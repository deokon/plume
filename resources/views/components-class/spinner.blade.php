{{--
@component x-plume::spinner
@description A CSS-animated loading indicator for indicating background processes or data fetching.
@prop string $size (Default: 'md') Size of the spinner: 'xs', 'sm', 'md', 'lg', 'xl'.
@prop string $style (Default: 'primary') Color style: 'primary', 'secondary', 'error', 'background', 'white'.
@usage
<x-plume::spinner size="lg" style="primary" />
<x-plume::button disabled>
    <x-plume::spinner size="xs" style="white" class="mr-2" />
    Processing...
</x-plume::button>
--}}
<div role="status" aria-label="loading">
    <svg {{ $attributes->merge(['class' => 'animate-spin ' . $styleClass]) }}
        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
        <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor"
            stroke-width="4"></circle>
        <path class="opacity-75" fill="currentColor"
            d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z">
        </path>
    </svg>
    <span class="sr-only">Loading...</span>
</div>
