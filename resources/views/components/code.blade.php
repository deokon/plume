@props([
    'language' => null,
    'title' => null,
    'code' => null,
])

<div 
    x-data="clipboard()"
    {{ $attributes->merge(['class' => 'group relative rounded-xl border border-background-700/40 bg-background-800 dark:border-background-400/20 dark:bg-background-900 overflow-hidden']) }}
>
    @if($title || $language)
        <div class="flex items-center justify-between border-b border-background-700/40 px-4 py-2 dark:border-background-400/20 bg-background-700/50 dark:bg-background-800/50">
            <div class="flex items-center gap-2">
                @if($title)
                    <span class="text-xs font-medium text-background-200">{{ $title }}</span>
                @endif
                @if($language)
                    <span class="rounded bg-background-600 px-1.5 py-0.5 text-[10px] font-bold uppercase text-background-300 dark:bg-background-700">{{ $language }}</span>
                @endif
            </div>
            
            <button 
                type="button"
                x-on:click="copy()"
                class="inline-flex items-center gap-1.5 rounded-md px-2 py-1 text-xs font-medium text-background-400 hover:bg-background-600 hover:text-background-100 transition-colors"
            >
                <x-plume::icon x-show="!copied" i="icon-[fluent--copy-24-regular]" class="size-3.5" />
                <x-plume::icon x-show="copied" i="icon-[fluent--checkmark-24-regular]" class="size-3.5 text-primary" />
                <span x-text="copied ? 'Copied!' : 'Copy'"></span>
            </button>
        </div>
    @else
        <button 
            type="button"
            x-on:click="copy()"
            class="absolute right-4 top-4 z-10 opacity-0 group-hover:opacity-100 transition-opacity inline-flex items-center gap-1.5 rounded-md bg-background-700/80 px-2 py-1 text-xs font-medium text-background-200 hover:bg-background-600 backdrop-blur-sm"
        >
            <x-plume::icon x-show="!copied" i="icon-[fluent--copy-24-regular]" class="size-3.5" />
            <x-plume::icon x-show="copied" i="icon-[fluent--checkmark-24-regular]" class="size-3.5 text-primary" />
            <span x-text="copied ? 'Copied!' : 'Copy'"></span>
        </button>
    @endif
    <div class="overflow-x-auto p-4 font-mono text-sm leading-relaxed text-background-100">
        <pre><code x-ref="code" class="whitespace-pre {{ $language ? 'language-'.$language : '' }}">{{ $code ?? $slot }}</code></pre>
    </div>
</div>
