<x-app-layout title="Tooltip - Components">
    <div class="space-y-12">
        <div class="border-b border-background-700/40 pb-8 dark:border-background-400/20">
            <h1 class="text-3xl font-bold tracking-tight">Tooltip</h1>
            <p class="mt-2 text-lg text-foreground/50 dark:text-background-400">A popup that displays information related to an element when the element receives keyboard focus or the mouse hovers over it.</p>
        </div>

        <section class="space-y-6">
            <h2 class="text-2xl font-bold tracking-tight">Examples</h2>
            <div class="flex flex-wrap items-center gap-12 py-8">
                <x-plume::tooltip text="Tooltip on Top">
                    <x-plume::button style="outline">Top</x-plume::button>
                </x-plume::tooltip>

                <x-plume::tooltip text="Tooltip on Bottom" position="bottom">
                    <x-plume::button style="outline">Bottom</x-plume::button>
                </x-plume::tooltip>

                <x-plume::tooltip text="Tooltip on Left" position="left">
                    <x-plume::button style="outline">Left</x-plume::button>
                </x-plume::tooltip>

                <x-plume::tooltip text="Tooltip on Right" position="right">
                    <x-plume::button style="outline">Right</x-plume::button>
                </x-plume::tooltip>
            </div>
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
                        <x-plume::table.cell class="font-mono text-xs text-primary underline decoration-dotted decoration-primary/50">text</x-plume::table.cell>
                        <x-plume::table.cell class="text-xs italic">string</x-plume::table.cell>
                        <x-plume::table.cell class="font-mono text-xs">-</x-plume::table.cell>
                        <x-plume::table.cell class="text-xs font-bold text-destructive">Required. The text to display inside the tooltip.</x-plume::table.cell>
                    </x-plume::table.row>
                    <x-plume::table.row>
                        <x-plume::table.cell class="font-mono text-xs text-primary">position</x-plume::table.cell>
                        <x-plume::table.cell class="text-xs italic">string</x-plume::table.cell>
                        <x-plume::table.cell class="font-mono text-xs">top</x-plume::table.cell>
                        <x-plume::table.cell class="text-xs">Options: <code class="text-xs">top</code>, <code class="text-xs">bottom</code>, <code class="text-xs">left</code>, <code class="text-xs">right</code>.</x-plume::table.cell>
                    </x-plume::table.row>
                </x-plume::table.body>
            </x-plume::table>
        </section>

        <section class="space-y-6 pt-12 border-t border-background-700/40 dark:border-background-400/20">
            <h2 class="text-2xl font-bold tracking-tight">Usage</h2>
            <x-plume::code language="blade">
&lt;x-plume::tooltip text="Helpful information" position="top"&gt;
    &lt;x-plume::button style="ghost" shape="round"&gt;
        &lt;x-plume::icon i="icon-[fluent--info-24-regular]" /&gt;
    &lt;/x-plume::button&gt;
&lt;/x-plume::tooltip&gt;</x-plume::code>
        </section>
    </div>
</x-app-layout>
