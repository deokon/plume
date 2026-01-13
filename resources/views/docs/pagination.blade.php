<x-app-layout title="Pagination - Components">
    <div class="space-y-12">
        <div class="border-b border-background-700/40 pb-8 dark:border-background-400/20">
            <h1 class="text-3xl font-bold tracking-tight">Pagination</h1>
            <p class="mt-2 text-lg text-foreground/50 dark:text-background-400">Displays a sequence of links for navigating through a series of related pages.</p>
        </div>

        <section class="space-y-6">
            <h2 class="text-2xl font-bold tracking-tight">Examples</h2>
            <div class="space-y-4">
                <x-plume::pagination :total="5" :current="1" />
                <x-plume::pagination :total="10" :current="5" />
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
                        <x-plume::table.cell class="font-mono text-xs text-primary">total</x-plume::table.cell>
                        <x-plume::table.cell class="text-xs italic">number</x-plume::table.cell>
                        <x-plume::table.cell class="font-mono text-xs">1</x-plume::table.cell>
                        <x-plume::table.cell class="text-xs">Total number of pages.</x-plume::table.cell>
                    </x-plume::table.row>
                    <x-plume::table.row>
                        <x-plume::table.cell class="font-mono text-xs text-primary">current</x-plume::table.cell>
                        <x-plume::table.cell class="text-xs italic">number</x-plume::table.cell>
                        <x-plume::table.cell class="font-mono text-xs">1</x-plume::table.cell>
                        <x-plume::table.cell class="text-xs">The current active page.</x-plume::table.cell>
                    </x-plume::table.row>
                </x-plume::table.body>
            </x-plume::table>
        </section>

        <section class="space-y-6 pt-12 border-t border-background-700/40 dark:border-background-400/20">
            <h2 class="text-2xl font-bold tracking-tight">Usage</h2>
            <x-plume::code language="blade">
&lt;x-plume::pagination :total="10" :current="1" /&gt;</x-plume::code>
        </section>
    </div>
</x-app-layout>
