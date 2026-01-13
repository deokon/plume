<header class="sticky top-0 z-40 w-full border-b border-background-700/40 bg-background/95 backdrop-blur dark:border-background-400/20 dark:bg-background-800/95">
    <div class="flex h-16 items-center justify-between px-4 sm:px-6 lg:px-8">
                <div class="flex items-center gap-4">
                    <button 
                        type="button" 
                        class="inline-flex items-center justify-center rounded-md p-2 hover:bg-background-600 dark:hover:bg-background-700 lg:hidden"
                        x-on:click="mobileMenu = true"
                    >
                        <x-plume::icon i="icon-[fluent--line-horizontal-3-24-regular]" class="size-6" />
                        <span class="sr-only">Open sidebar</span>
                    </button>
                    <a href="/" class="flex items-center gap-2">
                        <span class="text-xl font-bold tracking-tight">TryOn UI</span>
                    </a>
                </div>
                
                <div class="flex items-center gap-4">
                    <div class="flex items-center gap-2">
                        <x-plume::button
                            size="sm"
                            style="ghost"
                            shape="round"
                            x-on:click="toggleColorMode()"
                            x-bind:title="darkMode ? 'Switch to light mode' : 'Switch to dark mode'"
                        >
                            <x-plume::icon i="icon-[fluent--weather-sunny-24-regular]" class="size-5" x-show="darkMode" />
                            <x-plume::icon i="icon-[fluent--weather-moon-24-regular]" class="size-5" x-show="!darkMode" />
                        </x-plume::button>
                    </div>
                    
                    <a href="https://github.com" class="hover:text-primary transition-colors">
                        <x-plume::icon i="icon-[fluent--logo-github-24-regular]" class="size-6" />
                    </a>
                </div>    </div>
</header>
