<x-app-layout title="Button - Components">
    <div class="space-y-12">
        <div class="border-b border-background-700/40 pb-8 dark:border-background-400/20">
            <h1 class="text-3xl font-bold tracking-tight">Button</h1>
            <p class="mt-2 text-lg text-foreground/50 dark:text-background-400">Displays a button or a component that looks like a button.</p>
        </div>

        <section class="space-y-6">
            <h2 class="text-2xl font-bold tracking-tight">Examples</h2>
            
            <div class="grid gap-8 sm:grid-cols-2 lg:grid-cols-1 xl:grid-cols-2">
                <div class="space-y-4">
                    <h3 class="text-lg font-medium">Sizes</h3>
                    <div class="flex flex-wrap items-center gap-4">
                        <x-plume::button size="sm">Small</x-plume::button>
                        <x-plume::button size="md">Medium</x-plume::button>
                        <x-plume::button size="lg">Large</x-plume::button>
                    </div>
                </div>

                <div class="space-y-4">
                    <h3 class="text-lg font-medium">Styles</h3>
                    <div class="flex flex-wrap items-center gap-4">
                        <x-plume::button style="default">Default</x-plume::button>
                        <x-plume::button style="secondary">Secondary</x-plume::button>
                        <x-plume::button style="destructive">Destructive</x-plume::button>
                        <x-plume::button style="outline">Outline</x-plume::button>
                        <x-plume::button style="ghost">Ghost</x-plume::button>
                        <x-plume::button style="link">Link</x-plume::button>
                    </div>
                </div>

                <div class="space-y-4">
                    <h3 class="text-lg font-medium">Disabled</h3>
                    <div class="flex flex-wrap items-center gap-4">
                        <x-plume::button disabled style="default">Default</x-plume::button>
                        <x-plume::button disabled style="secondary">Secondary</x-plume::button>
                        <x-plume::button disabled style="destructive">Destructive</x-plume::button>
                        <x-plume::button disabled style="outline">Outline</x-plume::button>
                        <x-plume::button disabled style="ghost">Ghost</x-plume::button>
                        <x-plume::button disabled style="link">Link</x-plume::button>
                    </div>
                </div>

                <div class="space-y-4">
                    <h3 class="text-lg font-medium">Shapes</h3>
                    <div class="flex flex-wrap items-center gap-4">
                        <x-plume::button style="secondary" shape="pill">Pill Button</x-plume::button>
                        <x-plume::button aria-label="Add" icon="icon-[fluent--person-24-filled]" shape="pill">Button</x-plume::button>
                        <x-plume::button aria-label="Add" icon="icon-[fluent--person-24-filled]" shape="round" />
                        <x-plume::button style="secondary" shape="round">X</x-plume::button>
                    </div>
                </div>

                <div class="space-y-4">
                    <h3 class="text-lg font-medium">With Icon</h3>
                    <div class="flex flex-wrap items-center gap-4">
                        <x-plume::button icon="icon-[fluent--add-circle-24-regular]">Add</x-plume::button>
                        <x-plume::button style="destructive" icon="icon-[fluent--subtract-circle-24-regular]">Remove</x-plume::button>
                        <x-plume::button aria-label="Add" icon="icon-[fluent--person-24-filled]" />
                        <x-plume::button style="destructive" aria-label="Remove" icon="icon-[fluent--delete-24-filled]" />
                    </div>
                </div>

                <div class="space-y-4">
                    <h3 class="text-lg font-medium">Special States</h3>
                    <div class="flex flex-wrap items-center gap-4">
                        <div x-data="{ loading: false }">
                            <x-plume::button.loader var="loading" style="secondary" x-on:click="loading = true; setTimeout(() => loading = false, 2000)" icon="icon-[fluent--save-24-regular]">
                                Submit
                            </x-plume::button.loader>
                        </div>
                        <div x-data="{ toggleState: false }">
                            <x-plume::button.toggle var="toggleState" style="primary" offStyle="secondary" on="On" off="Off" />
                        </div>
                    </div>
                </div>
            </div>

            <div class="space-y-4 mt-8">
                <h3 class="text-lg font-medium">Button Groups</h3>
                <div class="space-y-4">
                    <x-plume::button-group>
                        <x-plume::button style="outline">Left</x-plume::button>
                        <x-plume::button>Default</x-plume::button>
                        <x-plume::button style="secondary">Secondary</x-plume::button>
                        <x-plume::button style="destructive">Destructive</x-plume::button>
                        <x-plume::button style="ghost">Right</x-plume::button>
                    </x-plume::button-group>
                    <x-plume::button-group size="lg">
                        <x-plume::button style="outline">Left</x-plume::button>
                        <x-plume::button>Default</x-plume::button>
                        <x-plume::button style="secondary">Secondary</x-plume::button>
                        <x-plume::button style="destructive">Destructive</x-plume::button>
                        <x-plume::button style="ghost">Right</x-plume::button>
                    </x-plume::button-group>
                </div>
            </div>
        </section>

        <section class="space-y-6 pt-12 border-t border-background-700/40 dark:border-background-400/20">
            <h2 class="text-2xl font-bold tracking-tight">Properties</h2>
            
            <div class="space-y-8">
                <div class="space-y-4">
                    <h3 class="text-lg font-medium">Button</h3>
                    <x-plume::table>
                        <x-plume::table.header>
                            <x-plume::table.row>
                                <x-plume::table.head>Prop</x-plume::table.head>
                                <x-plume::table.head>Type</x-plume::table.head>
                                <x-plume::table.head>Default</x-plume::table.head>
                                <x-plume::table.head>Description</x-plume::table.head>
                            </x-plume::table.row>
                        </x-plume::table.header>
                        <x-plume::table.body>
                            <x-plume::table.row>
                                <x-plume::table.cell class="font-mono text-xs text-primary">style</x-plume::table.cell>
                                <x-plume::table.cell class="text-xs italic">string</x-plume::table.cell>
                                <x-plume::table.cell class="font-mono text-xs">default</x-plume::table.cell>
                                <x-plume::table.cell class="text-xs">Options: <code class="text-xs">default</code>, <code class="text-xs">secondary</code>, <code class="text-xs">destructive</code>, <code class="text-xs">outline</code>, <code class="text-xs">ghost</code>, <code class="text-xs">link</code>.</x-plume::table.cell>
                            </x-plume::table.row>
                            <x-plume::table.row>
                                <x-plume::table.cell class="font-mono text-xs text-primary">size</x-plume::table.cell>
                                <x-plume::table.cell class="text-xs italic">string</x-plume::table.cell>
                                <x-plume::table.cell class="font-mono text-xs">md</x-plume::table.cell>
                                <x-plume::table.cell class="text-xs">Options: <code class="text-xs">sm</code>, <code class="text-xs">md</code>, <code class="text-xs">lg</code>.</x-plume::table.cell>
                            </x-plume::table.row>
                            <x-plume::table.row>
                                <x-plume::table.cell class="font-mono text-xs text-primary">shape</x-plume::table.cell>
                                <x-plume::table.cell class="text-xs italic">string</x-plume::table.cell>
                                <x-plume::table.cell class="font-mono text-xs">default</x-plume::table.cell>
                                <x-plume::table.cell class="text-xs">Options: <code class="text-xs">default</code>, <code class="text-xs">pill</code>, <code class="text-xs">round</code>.</x-plume::table.cell>
                            </x-plume::table.row>
                            <x-plume::table.row>
                                <x-plume::table.cell class="font-mono text-xs text-primary">href</x-plume::table.cell>
                                <x-plume::table.cell class="text-xs italic">string</x-plume::table.cell>
                                <x-plume::table.cell class="font-mono text-xs">null</x-plume::table.cell>
                                <x-plume::table.cell class="text-xs">Renders as an anchor tag if provided.</x-plume::table.cell>
                            </x-plume::table.row>
                            <x-plume::table.row>
                                <x-plume::table.cell class="font-mono text-xs text-primary">icon</x-plume::table.cell>
                                <x-plume::table.cell class="text-xs italic">string</x-plume::table.cell>
                                <x-plume::table.cell class="font-mono text-xs">null</x-plume::table.cell>
                                <x-plume::table.cell class="text-xs">Icon class name.</x-plume::table.cell>
                            </x-plume::table.row>
                            <x-plume::table.row>
                                <x-plume::table.cell class="font-mono text-xs text-primary">fullWidth</x-plume::table.cell>
                                <x-plume::table.cell class="text-xs italic">boolean</x-plume::table.cell>
                                <x-plume::table.cell class="font-mono text-xs">false</x-plume::table.cell>
                                <x-plume::table.cell class="text-xs">Expand to 100% width.</x-plume::table.cell>
                            </x-plume::table.row>
                        </x-plume::table.body>
                    </x-plume::table>
                </div>

                <div class="space-y-4">
                    <h3 class="text-lg font-medium">Button Loader</h3>
                    <x-plume::table>
                        <x-plume::table.header>
                            <x-plume::table.row>
                                <x-plume::table.head>Prop</x-plume::table.head>
                                <x-plume::table.head>Type</x-plume::table.head>
                                <x-plume::table.head>Default</x-plume::table.head>
                                <x-plume::table.head>Description</x-plume::table.head>
                            </x-plume::table.row>
                        </x-plume::table.header>
                        <x-plume::table.body>
                            <x-plume::table.row>
                                <x-plume::table.cell class="font-mono text-xs text-primary underline decoration-dotted decoration-primary/50">var</x-plume::table.cell>
                                <x-plume::table.cell class="text-xs italic">string</x-plume::table.cell>
                                <x-plume::table.cell class="font-mono text-xs">-</x-plume::table.cell>
                                <x-plume::table.cell class="text-xs font-bold text-destructive">Required. AlpineJS boolean variable to control loading state.</x-plume::table.cell>
                            </x-plume::table.row>
                        </x-plume::table.body>
                    </x-plume::table>
                </div>

                <div class="space-y-4">
                    <h3 class="text-lg font-medium">Button Toggle</h3>
                    <x-plume::table>
                        <x-plume::table.header>
                            <x-plume::table.row>
                                <x-plume::table.head>Prop</x-plume::table.head>
                                <x-plume::table.head>Type</x-plume::table.head>
                                <x-plume::table.head>Default</x-plume::table.head>
                                <x-plume::table.head>Description</x-plume::table.head>
                            </x-plume::table.row>
                        </x-plume::table.header>
                        <x-plume::table.body>
                            <x-plume::table.row>
                                <x-plume::table.cell class="font-mono text-xs text-primary">var</x-plume::table.cell>
                                <x-plume::table.cell class="text-xs italic">string</x-plume::table.cell>
                                <x-plume::table.cell class="font-mono text-xs">-</x-plume::table.cell>
                                <x-plume::table.cell class="text-xs font-bold text-destructive">Required. AlpineJS boolean variable.</x-plume::table.cell>
                            </x-plume::table.row>
                            <x-plume::table.row>
                                <x-plume::table.cell class="font-mono text-xs text-primary">on</x-plume::table.cell>
                                <x-plume::table.cell class="text-xs italic">string</x-plume::table.cell>
                                <x-plume::table.cell class="font-mono text-xs">null</x-plume::table.cell>
                                <x-plume::table.cell class="text-xs">Label when true.</x-plume::table.cell>
                            </x-plume::table.row>
                            <x-plume::table.row>
                                <x-plume::table.cell class="font-mono text-xs text-primary">off</x-plume::table.cell>
                                <x-plume::table.cell class="text-xs italic">string</x-plume::table.cell>
                                <x-plume::table.cell class="font-mono text-xs">null</x-plume::table.cell>
                                <x-plume::table.cell class="text-xs">Label when false.</x-plume::table.cell>
                            </x-plume::table.row>
                            <x-plume::table.row>
                                <x-plume::table.cell class="font-mono text-xs text-primary">offStyle</x-plume::table.cell>
                                <x-plume::table.cell class="text-xs italic">string</x-plume::table.cell>
                                <x-plume::table.cell class="font-mono text-xs">null</x-plume::table.cell>
                                <x-plume::table.cell class="text-xs">Button style when false.</x-plume::table.cell>
                            </x-plume::table.row>
                        </x-plume::table.body>
                    </x-plume::table>
                </div>
            </div>
        </section>

        <section class="space-y-6 pt-12 border-t border-background-700/40 dark:border-background-400/20">
            <h2 class="text-2xl font-bold tracking-tight">Usage</h2>
            <div class="space-y-4">
                <h3 class="text-lg font-medium">Basic Button</h3>
                <x-plume::code language="blade">
&lt;x-plume::button style="primary" size="md"&gt;
    Click Me
&lt;/x-plume::button&gt;</x-plume::code>

                <h3 class="text-lg font-medium mt-8">Loading Button</h3>
                <x-plume::code language="blade">
&lt;x-plume::button.loader var="isLoading" style="secondary"&gt;
    Save Changes
&lt;/x-plume::button.loader&gt;</x-plume::code>

                <h3 class="text-lg font-medium mt-8">Toggle Button</h3>
                <x-plume::code language="blade">
&lt;x-plume::button.toggle 
    var="isNotificationsEnabled" 
    on="Disable Notifications" 
    off="Enable Notifications" 
/&gt;</x-plume::code>
            </div>
        </section>
    </div>
</x-app-layout>
