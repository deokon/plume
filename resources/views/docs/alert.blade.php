<x-app-layout title="Alert - Components">
    <div class="space-y-12">
        <div class="border-b border-background-700/40 pb-8 dark:border-background-400/20">
            <h1 class="text-3xl font-bold tracking-tight">Alert</h1>
            <p class="mt-2 text-lg text-foreground/50 dark:text-background-400">Displays a callout for user attention.</p>
        </div>

        <section class="space-y-6">
            <h2 class="text-2xl font-bold tracking-tight">Examples</h2>
            
            <div class="grid gap-8 lg:grid-cols-2">
                <div class="space-y-4">
                    <h3 class="text-lg font-medium">Basic Styles</h3>
                    <div class="space-y-4">
                        <x-plume::alert>This is an info alert.</x-plume::alert>
                        <x-plume::alert style="success">This is a success alert.</x-plume::alert>
                        <x-plume::alert style="warning">This is a warning alert.</x-plume::alert>
                        <x-plume::alert style="destructive">This is a destructive alert.</x-plume::alert>
                    </div>
                </div>

                <div class="space-y-4">
                    <h3 class="text-lg font-medium">With Titles</h3>
                    <div class="space-y-4">
                        <x-plume::alert title="Info"><p class="mb-2">This is an info alert with a title.</p></x-plume::alert>
                        <x-plume::alert style="success" title="Success"><p class="mb-2">This is a success alert with a title.</p></x-plume::alert>
                        <x-plume::alert style="warning" title="Warning"><p class="mb-2">This is a warning alert with a title.</p></x-plume::alert>
                        <x-plume::alert style="destructive" title="Destructive"><p class="mb-2">This is a destructive alert with a title.</p></x-plume::alert>
                    </div>
                </div>

                <div class="space-y-4">
                    <h3 class="text-lg font-medium">Closable & Auto-close</h3>
                    <div class="space-y-4">
                        <x-plume::alert closable>This is a closable info alert.</x-plume::alert>
                        <x-plume::alert style="success" closable autoclose="3000" title="Auto-closing">
                            <p>This alert will close in 3 seconds.</p>
                        </x-plume::alert>
                        <x-plume::alert style="warning" closable title="Warning">
                            <p>This is a closable warning alert with a title.</p>
                        </x-plume::alert>
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
                        <x-plume::table.cell class="font-mono text-xs text-primary">title</x-plume::table.cell>
                        <x-plume::table.cell class="text-xs italic">string</x-plume::table.cell>
                        <x-plume::table.cell class="font-mono text-xs">null</x-plume::table.cell>
                        <x-plume::table.cell class="text-xs">Optional bold heading for the alert.</x-plume::table.cell>
                    </x-plume::table.row>
                    <x-plume::table.row>
                        <x-plume::table.cell class="font-mono text-xs text-primary">style</x-plume::table.cell>
                        <x-plume::table.cell class="text-xs italic">string</x-plume::table.cell>
                        <x-plume::table.cell class="font-mono text-xs">info</x-plume::table.cell>
                        <x-plume::table.cell class="text-xs">Visual style: <code class="text-xs">info</code>, <code class="text-xs">success</code>, <code class="text-xs">warning</code>, <code class="text-xs">destructive</code>.</x-plume::table.cell>
                    </x-plume::table.row>
                    <x-plume::table.row>
                        <x-plume::table.cell class="font-mono text-xs text-primary">icon</x-plume::table.cell>
                        <x-plume::table.cell class="text-xs italic">string</x-plume::table.cell>
                        <x-plume::table.cell class="font-mono text-xs">null</x-plume::table.cell>
                        <x-plume::table.cell class="text-xs">Override the default icon class.</x-plume::table.cell>
                    </x-plume::table.row>
                    <x-plume::table.row>
                        <x-plume::table.cell class="font-mono text-xs text-primary">closable</x-plume::table.cell>
                        <x-plume::table.cell class="text-xs italic">boolean</x-plume::table.cell>
                        <x-plume::table.cell class="font-mono text-xs">false</x-plume::table.cell>
                        <x-plume::table.cell class="text-xs">Whether to show a close button.</x-plume::table.cell>
                    </x-plume::table.row>
                    <x-plume::table.row>
                        <x-plume::table.cell class="font-mono text-xs text-primary">autoclose</x-plume::table.cell>
                        <x-plume::table.cell class="text-xs italic">number</x-plume::table.cell>
                        <x-plume::table.cell class="font-mono text-xs">null</x-plume::table.cell>
                        <x-plume::table.cell class="text-xs">Delay in ms to hide the alert automatically.</x-plume::table.cell>
                    </x-plume::table.row>
                </x-plume::table.body>
            </x-plume::table>
        </section>

        <section class="space-y-6 pt-12 border-t border-background-700/40 dark:border-background-400/20">
            <h2 class="text-2xl font-bold tracking-tight">Usage</h2>
            <x-plume::code language="blade">
&lt;x-plume::alert 
    style="success" 
    title="Success" 
    closable 
    autoclose="3000"
&gt;
    Your changes have been saved.
&lt;/x-plume::alert&gt;</x-plume::code>
        </section>
    </div>
</x-app-layout>
