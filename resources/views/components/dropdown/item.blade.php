<button {{ $attributes->merge(['class' => 'block w-full px-4 py-2 text-left text-sm leading-5 transition-colors duration-150 ease-in-out hover:bg-primary/20 dark:hover:bg-background-700 focus:outline-none']) }}>
    {{ $slot }}
</button>
