@use('deokon\Plume\Theme')
{{--
@component x-plume::command
@description A powerful search and action interface accessible via keyboard shortcuts.
--}}
@props([
    'placeholder' => 'Type a command or search...',
    'id' => \Illuminate\Support\Str::random(8),
])

@php
    $enter = Theme::transitions('overlay-enter');
    $leave = Theme::transitions('overlay-leave');
@endphp

<div x-data="command()" @keydown.window.prevent.cmd.k="toggle()"
    @keydown.window.prevent.ctrl.k="toggle()" @keydown.escape.window="open = false" class="relative"
    {{ $attributes }}>
    {{-- Trigger Slot (optional) --}}
    @if ($slot->isNotEmpty())
        <div @click="toggle()">
            {{ $slot }}
        </div>
    @endif

    {{-- Modal Overlay --}}
    <template x-teleport="body">
        <div x-show="open" x-cloak x-transition:enter="{{ $enter }}"
            x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100"
            x-transition:leave="{{ $leave }}" x-transition:leave-start="opacity-100"
            x-transition:leave-end="opacity-0"
            class="fixed inset-0 z-[100] flex items-start justify-center pt-[10vh] sm:pt-[15vh] px-4 bg-background-950/80 backdrop-blur-sm"
            @click.self="open = false">
            <div x-show="open" x-cloak x-transition:enter="{{ $enter }}"
                x-transition:enter-start="opacity-0 scale-95"
                x-transition:enter-end="opacity-100 scale-100"
                class="w-full max-w-2xl bg-background dark:bg-background-800 rounded-xl shadow-2xl border border-background-700/40 dark:border-background-400/20 overflow-hidden flex flex-col">
                {{-- Input Header --}}
                <div
                    class="flex items-center px-4 border-b border-background-700/40 dark:border-background-400/20">
                    <x-plume::icon i="icon-[fluent--search-24-regular]"
                        class="size-5 text-foreground/40 dark:text-background-400" />
                    <input x-ref="input" x-model="search" type="text"
                        class="w-full bg-transparent border-none focus:ring-0 text-base py-4 px-3 placeholder:text-foreground/30 dark:placeholder:text-background-500 focus:outline-none text-foreground dark:text-background-200"
                        placeholder="{{ $placeholder }}" @keydown="onKeydown">
                    <div class="hidden sm:flex items-center">
                        <x-plume::kbd size="sm">Esc</x-plume::kbd>
                    </div>
                </div>

                {{-- Results List --}}
                <div x-ref="items" class="flex-1 overflow-y-auto max-h-[60vh] p-2 space-y-4">
                    {{-- Template for dynamic content or just manual structure --}}
                    <div x-show="search === '' && !$refs.results?.children.length"
                        class="p-4 text-center text-sm text-foreground/40 dark:text-background-500">
                        No recent searches.
                    </div>
                    <div x-ref="results">
                        {{ $content ?? '' }}
                    </div>
                </div>

                {{-- Footer --}}
                <div
                    class="px-4 py-3 bg-background-50 dark:bg-background-900 border-t border-background-700/40 dark:border-background-400/20 flex items-center gap-6 text-[10px] text-foreground/60 dark:text-background-400 uppercase font-semibold">
                    <div class="flex items-center gap-1.5">
                        <x-plume::kbd size="sm" class="min-w-5 justify-center">
                            <x-plume::icon i="icon-[fluent--arrow-enter-up-24-regular]"
                                class="size-3" />
                        </x-plume::kbd>
                        <span>Select</span>
                    </div>
                    <div class="flex items-center gap-1.5">
                        <x-plume::kbd size="sm" class="min-w-5 justify-center">
                            <x-plume::icon i="icon-[fluent--arrow-up-24-regular]" class="size-3" />
                        </x-plume::kbd>
                        <x-plume::kbd size="sm" class="min-w-5 justify-center">
                            <x-plume::icon i="icon-[fluent--arrow-down-24-regular]"
                                class="size-3" />
                        </x-plume::kbd>
                        <span>Navigate</span>
                    </div>
                </div>
            </div>
        </div>
    </template>
</div>
