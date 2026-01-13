<x-app-layout title="Tabs - Components">
    <div class="space-y-12">
        <div class="border-b border-background-700/40 pb-8 dark:border-background-400/20">
            <h1 class="text-3xl font-bold tracking-tight">Tabs</h1>
            <p class="mt-2 text-lg text-foreground/50 dark:text-background-400">A set of layered sections of content, known as tab panels, that are displayed one at a time.</p>
        </div>

        <section class="space-y-6">
            <h2 class="text-2xl font-bold tracking-tight">Examples</h2>

            <div class="space-y-8">
                <div class="space-y-4">
                    <h3 class="text-lg font-medium">Horizontal (Top)</h3>
                    <x-plume::tabs default="1">
                        <x-plume::tabs.group>
                            <x-plume::tabs.item for="1">First</x-plume::tabs.item>
                            <x-plume::tabs.item for="2">Second</x-plume::tabs.item>
                            <x-plume::tabs.item for="3">Third</x-plume::tabs.item>
                        </x-plume::tabs.group>
                        <x-plume::tabs.panel for="1"><p>Content of the first tab.</p></x-plume::tabs.panel>
                        <x-plume::tabs.panel for="2"><p>Content of the second tab.</p></x-plume::tabs.panel>
                        <x-plume::tabs.panel for="3"><p>Content of the third tab.</p></x-plume::tabs.panel>
                    </x-plume::tabs>
                </div>

                <div class="grid gap-8 lg:grid-cols-2">
                    <div class="space-y-4">
                        <h3 class="text-lg font-medium">Left Side</h3>
                        <x-plume::tabs default="1" side="left">
                            <x-plume::tabs.group>
                                <x-plume::tabs.item for="1">First</x-plume::tabs.item>
                                <x-plume::tabs.item for="2">Second</x-plume::tabs.item>
                                <x-plume::tabs.item for="3">Third</x-plume::tabs.item>
                            </x-plume::tabs.group>
                            <x-plume::tabs.panel for="1"><p>Content of the first tab.</p></x-plume::tabs.panel>
                            <x-plume::tabs.panel for="2"><p>Content of the second tab.</p></x-plume::tabs.panel>
                            <x-plume::tabs.panel for="3"><p>Content of the third tab.</p></x-plume::tabs.panel>
                        </x-plume::tabs>
                    </div>

                    <div class="space-y-4">
                        <h3 class="text-lg font-medium">Right Side</h3>
                        <x-plume::tabs default="1" side="right">
                            <x-plume::tabs.group>
                                <x-plume::tabs.item for="1">First</x-plume::tabs.item>
                                <x-plume::tabs.item for="2">Second</x-plume::tabs.item>
                                <x-plume::tabs.item for="3">Third</x-plume::tabs.item>
                            </x-plume::tabs.group>
                            <x-plume::tabs.panel for="1"><p>Content of the first tab.</p></x-plume::tabs.panel>
                            <x-plume::tabs.panel for="2"><p>Content of the second tab.</p></x-plume::tabs.panel>
                            <x-plume::tabs.panel for="3"><p>Content of the third tab.</p></x-plume::tabs.panel>
                        </x-plume::tabs>
                    </div>
                </div>
            </div>
        </section>

        <section class="space-y-6 pt-12 border-t border-background-700/40 dark:border-background-400/20">
            <h2 class="text-2xl font-bold tracking-tight">Properties</h2>
            <div class="space-y-8">
                <div class="space-y-4">
                    <h3 class="text-lg font-medium">Tabs</h3>
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
                                <x-plume::table.cell class="font-mono text-xs text-primary">default</x-plume::table.cell>
                                <x-plume::table.cell class="text-xs italic">string</x-plume::table.cell>
                                <x-plume::table.cell class="font-mono text-xs">'1'</x-plume::table.cell>
                                <x-plume::table.cell class="text-xs">The identifier of the initially active tab.</x-plume::table.cell>
                            </x-plume::table.row>
                            <x-plume::table.row>
                                <x-plume::table.cell class="font-mono text-xs text-primary">side</x-plume::table.cell>
                                <x-plume::table.cell class="text-xs italic">string</x-plume::table.cell>
                                <x-plume::table.cell class="font-mono text-xs">top</x-plume::table.cell>
                                <x-plume::table.cell class="text-xs">Layout orientation: <code class="text-xs">top</code>, <code class="text-xs">left</code>, <code class="text-xs">right</code>.</x-plume::table.cell>
                            </x-plume::table.row>
                        </x-plume::table.body>
                    </x-plume::table>
                </div>

                <div class="space-y-4">
                    <h3 class="text-lg font-medium">Tab Item & Panel</h3>
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
                                <x-plume::table.cell class="font-mono text-xs text-primary underline decoration-dotted decoration-primary/50">for</x-plume::table.cell>
                                <x-plume::table.cell class="text-xs italic">string</x-plume::table.cell>
                                <x-plume::table.cell class="font-mono text-xs">-</x-plume::table.cell>
                                <x-plume::table.cell class="text-xs font-bold text-destructive">Required. Unique identifier linking the item to its panel.</x-plume::table.cell>
                            </x-plume::table.row>
                        </x-plume::table.body>
                    </x-plume::table>
                </div>
            </div>
        </section>

        <section class="space-y-6 pt-12 border-t border-background-700/40 dark:border-background-400/20">
            <h2 class="text-2xl font-bold tracking-tight">Usage</h2>
            <x-plume::code language="blade">
&lt;x-plume::tabs default="profile" side="left"&gt;
    &lt;x-plume::tabs.group&gt;
        &lt;x-plume::tabs.item for="profile"&gt;Profile&lt;/x-plume::tabs.item&gt;
        &lt;x-plume::tabs.item for="settings"&gt;Settings&lt;/x-plume::tabs.item&gt;
    &lt;/x-plume::tabs.group&gt;

    &lt;x-plume::tabs.panel for="profile"&gt;
        Profile content...
    &lt;/x-plume::tabs.panel&gt;
    &lt;x-plume::tabs.panel for="settings"&gt;
        Settings content...
    &lt;/x-plume::tabs.panel&gt;
&lt;/x-plume::tabs&gt;</x-plume::code>
        </section>
    </div>
</x-app-layout>
