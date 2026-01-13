<x-app-layout title="Progress - Components">
    <div class="space-y-12">
        <div class="border-b border-background-700/40 pb-8 dark:border-background-400/20">
            <h1 class="text-3xl font-bold tracking-tight">Progress</h1>
            <p class="mt-2 text-lg text-foreground/50 dark:text-background-400">Displays an indicator showing the completion progress of a task, typically displayed as a progress bar.</p>
        </div>

        <section class="space-y-6">
            <h2 class="text-2xl font-bold tracking-tight">Examples</h2>
            <div class="max-w-md space-y-8">
                <div class="space-y-4">
                    <h3 class="text-lg font-medium">Display Options</h3>
                    <x-plume::progress value="75" max="100" title="Percentage (Default)" display="percentage" />
                    <x-plume::progress value="12" max="20" title="Number Only" display="number" />
                    <x-plume::progress value="15" max="25" title="Out Of" display="outof" />
                    <x-plume::progress value="50" max="100" title="No Label" display="none" />
                </div>

                <div class="space-y-4">
                    <h3 class="text-lg font-medium">Progress Percent Component</h3>
                    <x-plume::progress.percent value="45" title="Simple Percent (0-100)" />
                    <x-plume::progress.percent value="90" style="secondary" title="Secondary Style" />
                    <x-plume::progress.percent value="60" style="destructive" title="Destructive Style" />
                </div>

                <div class="space-y-4" x-data="{ val: 33 }">
                    <h3 class="text-lg font-medium">Reactive Model</h3>
                    <x-plume::progress.percent model="val" title="Animated (using model)" />
                    <x-plume::button size="sm" style="outline" x-on:click="val = Math.floor(Math.random() * 101)">Randomize</x-plume::button>
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
                        <x-plume::table.cell class="font-mono text-xs text-primary">value</x-plume::table.cell>
                        <x-plume::table.cell class="text-xs italic">number</x-plume::table.cell>
                        <x-plume::table.cell class="font-mono text-xs">0</x-plume::table.cell>
                        <x-plume::table.cell class="text-xs">Current progress value.</x-plume::table.cell>
                    </x-plume::table.row>
                    <x-plume::table.row>
                        <x-plume::table.cell class="font-mono text-xs text-primary">max</x-plume::table.cell>
                        <x-plume::table.cell class="text-xs italic">number</x-plume::table.cell>
                        <x-plume::table.cell class="font-mono text-xs">100</x-plume::table.cell>
                        <x-plume::table.cell class="text-xs">Maximum progress value.</x-plume::table.cell>
                    </x-plume::table.row>
                    <x-plume::table.row>
                        <x-plume::table.cell class="font-mono text-xs text-primary">title</x-plume::table.cell>
                        <x-plume::table.cell class="text-xs italic">string</x-plume::table.cell>
                        <x-plume::table.cell class="font-mono text-xs">null</x-plume::table.cell>
                        <x-plume::table.cell class="text-xs">Label displayed above the bar.</x-plume::table.cell>
                    </x-plume::table.row>
                    <x-plume::table.row>
                        <x-plume::table.cell class="font-mono text-xs text-primary">model</x-plume::table.cell>
                        <x-plume::table.cell class="text-xs italic">string</x-plume::table.cell>
                        <x-plume::table.cell class="font-mono text-xs">null</x-plume::table.cell>
                        <x-plume::table.cell class="text-xs">AlpineJS model for reactive progress.</x-plume::table.cell>
                    </x-plume::table.row>
                    <x-plume::table.row>
                        <x-plume::table.cell class="font-mono text-xs text-primary">display</x-plume::table.cell>
                        <x-plume::table.cell class="text-xs italic">string</x-plume::table.cell>
                        <x-plume::table.cell class="font-mono text-xs">percentage</x-plume::table.cell>
                        <x-plume::table.cell class="text-xs">Options: <code class="text-xs">percentage</code>, <code class="text-xs">number</code>, <code class="text-xs">outof</code>, <code class="text-xs">none</code>.</x-plume::table.cell>
                    </x-plume::table.row>
                    <x-plume::table.row>
                        <x-plume::table.cell class="font-mono text-xs text-primary">style</x-plume::table.cell>
                        <x-plume::table.cell class="text-xs italic">string</x-plume::table.cell>
                        <x-plume::table.cell class="font-mono text-xs">default</x-plume::table.cell>
                        <x-plume::table.cell class="text-xs">Options: <code class="text-xs">default</code>, <code class="text-xs">secondary</code>, <code class="text-xs">destructive</code>, <code class="text-xs">success</code>.</x-plume::table.cell>
                    </x-plume::table.row>
                </x-plume::table.body>
            </x-plume::table>
        </section>

        <section class="space-y-6 pt-12 border-t border-background-700/40 dark:border-background-400/20">
            <h2 class="text-2xl font-bold tracking-tight">Usage</h2>
            <div class="space-y-4">
                <h3 class="text-lg font-medium">Basic Progress</h3>
                <x-plume::code language="blade">
&lt;x-plume::progress value="50" max="100" title="Uploading..." /&gt;</x-plume::code>

                <h3 class="text-lg font-medium mt-8">Percentage Component</h3>
                <x-plume::code language="blade">
&lt;x-plume::progress.percent value="75" style="success" /&gt;</x-plume::code>
            </div>
        </section>
    </div>
</x-app-layout>
