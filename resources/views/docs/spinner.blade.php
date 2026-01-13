<x-app-layout title="Spinner - Components">
    <div class="space-y-12">
        <div class="border-b border-background-700/40 pb-8 dark:border-background-400/20">
            <h1 class="text-3xl font-bold tracking-tight">Spinner</h1>
            <p class="mt-2 text-lg text-foreground/50 dark:text-background-400">A standalone loading indicator.</p>
        </div>

        <section class="space-y-6">
            <h2 class="text-2xl font-bold tracking-tight">Examples</h2>
            <div class="flex flex-wrap items-center gap-8">
                <div class="space-y-2">
                    <p class="text-sm font-medium">Sizes</p>
                    <div class="flex items-center gap-4">
                        <x-plume::spinner size="sm" />
                        <x-plume::spinner size="md" />
                        <x-plume::spinner size="lg" />
                        <x-plume::spinner size="xl" />
                    </div>
                </div>
                <div class="space-y-2">
                    <p class="text-sm font-medium">Styles</p>
                    <div class="flex items-center gap-4">
                        <x-plume::spinner style="default" />
                        <x-plume::spinner style="secondary" />
                        <x-plume::spinner style="destructive" />
                    </div>
                </div>
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
                        <x-plume::table.cell class="font-mono text-xs text-primary">size</x-plume::table.cell>
                        <x-plume::table.cell class="text-xs italic">string</x-plume::table.cell>
                        <x-plume::table.cell class="font-mono text-xs">md</x-plume::table.cell>
                        <x-plume::table.cell class="text-xs">Options: <code class="text-xs">sm</code>, <code class="text-xs">md</code>, <code class="text-xs">lg</code>, <code class="text-xs">xl</code>.</x-plume::table.cell>
                    </x-plume::table.row>
                    <x-plume::table.row>
                        <x-plume::table.cell class="font-mono text-xs text-primary">style</x-plume::table.cell>
                        <x-plume::table.cell class="text-xs italic">string</x-plume::table.cell>
                        <x-plume::table.cell class="font-mono text-xs">default</x-plume::table.cell>
                        <x-plume::table.cell class="text-xs">Options: <code class="text-xs">default</code>, <code class="text-xs">secondary</code>, <code class="text-xs">destructive</code>, <code class="text-xs">white</code>.</x-plume::table.cell>
                    </x-plume::table.row>
                </x-plume::table.body>
            </x-plume::table>
        </section>

        <section class="space-y-6 pt-12 border-t border-background-700/40 dark:border-background-400/20">
            <h2 class="text-2xl font-bold tracking-tight">Usage</h2>
            <x-plume::code language="blade">
&lt;x-plume::spinner size="lg" style="secondary" /&gt;</x-plume::code>
        </section>
    </div>
</x-app-layout>
