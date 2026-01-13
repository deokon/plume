<x-app-layout title="Breadcrumb - Components">
    <div class="space-y-12">
        <div class="border-b border-background-700/40 pb-8 dark:border-background-400/20">
            <h1 class="text-3xl font-bold tracking-tight">Breadcrumb</h1>
            <p class="mt-2 text-lg text-foreground/50 dark:text-background-400">Displays the path to the current resource using a hierarchy of links.</p>
        </div>

        <section class="space-y-6">
            <h2 class="text-2xl font-bold tracking-tight">Examples</h2>
            <div class="space-y-4">
                <x-plume::breadcrumb>
                    <x-plume::breadcrumb.item href="/">Home</x-plume::breadcrumb.item>
                    <x-plume::breadcrumb.separator />
                    <x-plume::breadcrumb.item href="/docs/breadcrumb">Components</x-plume::breadcrumb.item>
                    <x-plume::breadcrumb.separator />
                    <x-plume::breadcrumb.item active>Breadcrumb</x-plume::breadcrumb.item>
                </x-plume::breadcrumb>

                <x-plume::breadcrumb>
                    <x-plume::breadcrumb.item href="/">Home</x-plume::breadcrumb.item>
                    <x-plume::breadcrumb.separator>
                        <x-plume::icon i="icon-[fluent--subtract-24-regular]" class="rotate-90" />
                    </x-plume::breadcrumb.separator>
                    <x-plume::breadcrumb.item active>Custom Separator</x-plume::breadcrumb.item>
                </x-plume::breadcrumb>
            </div>
        </section>

        <section class="space-y-6 pt-12 border-t border-background-700/40 dark:border-background-400/20">
            <h2 class="text-2xl font-bold tracking-tight">Properties</h2>
            <div class="space-y-8">
                <div class="space-y-4">
                    <h3 class="text-lg font-medium">Breadcrumb Item</h3>
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
                                <x-plume::table.cell class="font-mono text-xs text-primary">href</x-plume::table.cell>
                                <x-plume::table.cell class="text-xs italic">string</x-plume::table.cell>
                                <x-plume::table.cell class="font-mono text-xs">null</x-plume::table.cell>
                                <x-plume::table.cell class="text-xs">Navigation URL.</x-plume::table.cell>
                            </x-plume::table.row>
                            <x-plume::table.row>
                                <x-plume::table.cell class="font-mono text-xs text-primary">active</x-plume::table.cell>
                                <x-plume::table.cell class="text-xs italic">boolean</x-plume::table.cell>
                                <x-plume::table.cell class="font-mono text-xs">false</x-plume::table.cell>
                                <x-plume::table.cell class="text-xs">Whether the item represents the current page.</x-plume::table.cell>
                            </x-plume::table.row>
                        </x-plume::table.body>
                    </x-plume::table>
                </div>
            </div>
        </section>

        <section class="space-y-6 pt-12 border-t border-background-700/40 dark:border-background-400/20">
            <h2 class="text-2xl font-bold tracking-tight">Usage</h2>
            <x-plume::code language="blade">
&lt;x-plume::breadcrumb&gt;
    &lt;x-plume::breadcrumb.item href="/"&gt;Home&lt;/x-plume::breadcrumb.item&gt;
    &lt;x-plume::breadcrumb.separator /&gt;
    &lt;x-plume::breadcrumb.item active&gt;Settings&lt;/x-plume::breadcrumb.item&gt;
&lt;/x-plume::breadcrumb&gt;</x-plume::code>
        </section>
    </div>
</x-app-layout>
