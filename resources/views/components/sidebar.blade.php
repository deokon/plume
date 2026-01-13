<aside class="fixed inset-y-0 left-0 z-50 w-64 transform bg-background transition-transform duration-300 ease-in-out dark:bg-background-800 lg:static lg:translate-x-0"
    x-bind:class="mobileMenu ? 'translate-x-0' : '-translate-x-full'"
>
    <div class="flex h-full flex-col border-r border-background-700/40 dark:border-background-400/20">
        <div class="flex h-16 items-center px-6 lg:hidden">
            <a href="/" class="flex items-center gap-2">
                <span class="text-xl font-bold tracking-tight">TryOn UI</span>
            </a>
            <button 
                type="button" 
                class="ml-auto inline-flex items-center justify-center rounded-md p-2 hover:bg-background-600 dark:hover:bg-background-700"
                x-on:click="mobileMenu = false"
            >
                <x-plume::icon i="icon-[fluent--dismiss-24-regular]" class="size-6" />
            </button>
        </div>

        <nav class="flex-1 overflow-y-auto p-4 lg:p-6" x-on:click="mobileMenu = false">
            <div class="space-y-8">
                <div>
                    <h4 class="mb-4 text-sm font-semibold uppercase tracking-wider text-foreground/50 dark:text-background-400 pl-4">Getting Started</h4>
                    <ul class="space-y-1">
                        <li>
                            <x-plume::button href="/" style="ghost" fullWidth class="justify-start {{ request()->is('/') ? 'bg-primary/10 text-primary' : '' }}">
                                Overview
                            </x-plume::button>
                        </li>
                        <li>
                            <x-plume::button href="#" style="ghost" fullWidth class="justify-start">
                                Installation
                            </x-plume::button>
                        </li>
                    </ul>
                </div>

                <div>
                    <h4 class="mb-4 text-sm font-semibold uppercase tracking-wider text-foreground/50 dark:text-background-400 pl-4">Components</h4>
                    <ul class="space-y-1">
                        @php
                            $components = [
                                'Alert' => 'alert',
                                'Avatar' => 'avatar',
                                'Badge' => 'badge',
                                'Breadcrumb' => 'breadcrumb',
                                'Button' => 'button',
                                'Card' => 'card',
                                'Code' => 'code',
                                'Drawer' => 'drawer',
                                'Dropdown' => 'dropdown',
                                'Forms' => 'forms',
                                'Modal' => 'modal',
                                'Pagination' => 'pagination',
                                'Progress' => 'progress',
                                'Skeleton' => 'skeleton',
                                'Spinner' => 'spinner',
                                'Table' => 'table',
                                'Tabs' => 'tabs',
                                'Toast' => 'toast',
                                'Tooltip' => 'tooltip',
                            ];
                        @endphp
                        @foreach($components as $name => $slug)
                            <li>
                                <x-plume::button 
                                    href="{{ route('plume.docs', ['component' => $slug]) }}" 
                                    style="ghost" 
                                    fullWidth 
                                    class="justify-start {{ request()->is('docs/'.$slug) ? 'bg-primary/10 text-primary' : '' }}"
                                >
                                    {{ $name }}
                                </x-plume::button>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </nav>
    </div>
</aside>