<tr {{ $attributes->merge(['class' => 'border-b border-background-700/40 data-[state=selected]:bg-background-600 dark:border-background-400/40 dark:data-[state=selected]:bg-background-700']) }}>
    {{ $slot }}
</tr>
