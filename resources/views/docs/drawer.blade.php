<x-app-layout title="Drawer - Components">
    <div class="space-y-12">
        <div class="border-b border-background-700/40 pb-8 dark:border-background-400/20">
            <h1 class="text-3xl font-bold tracking-tight">Drawer</h1>
            <p class="mt-2 text-lg text-foreground/50 dark:text-background-400">A panel that slides in from the edge of the screen.</p>
        </div>

        <section class="space-y-6">
            <h2 class="text-2xl font-bold tracking-tight">Examples</h2>
            <div class="flex flex-wrap items-center gap-4">
                <x-plume::button 
                    style="outline" 
                    x-on:click="$dispatch('open-drawer', 'example-drawer-right')"
                >
                    Open Right Drawer
                </x-plume::button>
                <x-plume::button 
                    style="outline" 
                    x-on:click="$dispatch('open-drawer', 'example-drawer-left')"
                >
                    Open Left Drawer
                </x-plume::button>
            </div>

            <x-plume::drawer name="example-drawer-right" side="right">
                <x-plume::drawer.header>
                    <x-plume::drawer.title>Right Drawer</x-plume::drawer.title>
                    <x-plume::drawer.description>This drawer slides in from the right.</x-plume::drawer.description>
                </x-plume::drawer.header>
                <x-plume::drawer.content>
                    <p class="text-sm">You can put any content here.</p>
                </x-plume::drawer.content>
                <x-plume::drawer.footer>
                    <x-plume::button style="outline" class="w-full" x-on:click="$dispatch('close-drawer', 'example-drawer-right')">Close</x-plume::button>
                </x-plume::drawer.footer>
            </x-plume::drawer>

            <x-plume::drawer name="example-drawer-left" side="left">
                <x-plume::drawer.header>
                    <x-plume::drawer.title>Left Drawer</x-plume::drawer.title>
                    <x-plume::drawer.description>This drawer slides in from the left.</x-plume::drawer.description>
                </x-plume::drawer.header>
                <x-plume::drawer.content>
                    <p class="text-sm">More content here.</p>
                </x-plume::drawer.content>
                <x-plume::drawer.footer>
                    <x-plume::button style="outline" class="w-full" x-on:click="$dispatch('close-drawer', 'example-drawer-left')">Close</x-plume::button>
                </x-plume::drawer.footer>
            </x-plume::drawer>
        </section>

        <section class="space-y-6 pt-12 border-t border-background-700/40 dark:border-background-400/20">
            <h2 class="text-2xl font-bold tracking-tight">Properties</h2>
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
                        <x-plume::table.cell class="font-mono text-xs text-primary underline decoration-dotted decoration-primary/50">name</x-plume::table.cell>
                        <x-plume::table.cell class="text-xs italic">string</x-plume::table.cell>
                        <x-plume::table.cell class="font-mono text-xs">-</x-plume::table.cell>
                        <x-plume::table.cell class="text-xs font-bold text-destructive">Required. Unique identifier for the drawer.</x-plume::table.cell>
                    </x-plume::table.row>
                    <x-plume::table.row>
                        <x-plume::table.cell class="font-mono text-xs text-primary">side</x-plume::table.cell>
                        <x-plume::table.cell class="text-xs italic">string</x-plume::table.cell>
                        <x-plume::table.cell class="font-mono text-xs">right</x-plume::table.cell>
                        <x-plume::table.cell class="text-xs">Slide direction: <code class="text-xs">left</code>, <code class="text-xs">right</code>, <code class="text-xs">top</code>, <code class="text-xs">bottom</code>.</x-plume::table.cell>
                    </x-plume::table.row>
                    <x-plume::table.row>
                        <x-plume::table.cell class="font-mono text-xs text-primary">show</x-plume::table.cell>
                        <x-plume::table.cell class="text-xs italic">boolean</x-plume::table.cell>
                        <x-plume::table.cell class="font-mono text-xs">false</x-plume::table.cell>
                        <x-plume::table.cell class="text-xs">Initial visibility state.</x-plume::table.cell>
                    </x-plume::table.row>
                </x-plume::table.body>
            </x-plume::table>
        </section>

        <section class="space-y-6 pt-12 border-t border-background-700/40 dark:border-background-400/20">
            <h2 class="text-2xl font-bold tracking-tight">Usage</h2>
            <div class="space-y-4">
                <h3 class="text-lg font-medium">Triggering the Drawer</h3>
                <x-plume::code language="blade">
&lt;x-plume::button x-on:click="$dispatch('open-drawer', 'settings-drawer')"&gt;
    Open Settings
&lt;/x-plume::button&gt;</x-plume::code>

                <h3 class="text-lg font-medium mt-8">Drawer Component</h3>
                <x-plume::code language="blade">
&lt;x-plume::drawer name="settings-drawer" side="right"&gt;
    &lt;x-plume::drawer.header&gt;
        &lt;x-plume::drawer.title&gt;Settings&lt;/x-plume::drawer.title&gt;
    &lt;/x-plume::drawer.header&gt;
    &lt;x-plume::drawer.content&gt;
        &lt;!-- Content --&gt;
    &lt;/x-plume::drawer.content&gt;
    &lt;x-plume::drawer.footer&gt;
        &lt;x-plume::button x-on:click="$dispatch('close-drawer', 'settings-drawer')"&gt;
            Close
        &lt;/x-plume::button&gt;
    &lt;/x-plume::drawer.footer&gt;
&lt;/x-plume::drawer&gt;</x-plume::code>
            </div>
        </section>
    </div>
</x-app-layout>
