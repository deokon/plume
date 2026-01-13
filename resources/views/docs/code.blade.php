<x-app-layout title="Code - Components">
    <div class="space-y-12">
        <div class="border-b border-background-700/40 pb-8 dark:border-background-400/20">
            <h1 class="text-3xl font-bold tracking-tight">Code</h1>
            <p class="mt-2 text-lg text-foreground/50 dark:text-background-400">A component for displaying code snippets with a copy-to-clipboard feature.</p>
        </div>

        <section class="space-y-6">
            <h2 class="text-2xl font-bold tracking-tight">Examples</h2>
            
            <div class="space-y-8">
                <div class="space-y-4">
                    <h3 class="text-lg font-medium">Basic</h3>
                    <x-plume::code>
&lt;x-plume::button&gt;
    Click me
&lt;/x-plume::button&gt;</x-plume::code>
                </div>

                <div class="space-y-4">
                    <h3 class="text-lg font-medium">With Title and Language</h3>
                    <x-plume::code title="example.blade.php" language="blade">
&lt;div class="p-4"&gt;
    &lt;x-plume::alert style="success"&gt;
        Success message!
    &lt;/x-plume::alert&gt;
&lt;/div&gt;</x-plume::code>
                </div>

                <div class="space-y-4">
                    <h3 class="text-lg font-medium">Using the code prop</h3>
                    <x-plume::code language="javascript" code="console.log('Hello World!');" />
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
                        <x-plume::table.cell class="font-mono text-xs text-primary">language</x-plume::table.cell>
                        <x-plume::table.cell class="text-xs italic">string</x-plume::table.cell>
                        <x-plume::table.cell class="font-mono text-xs">null</x-plume::table.cell>
                        <x-plume::table.cell class="text-xs">Programming language for the tag.</x-plume::table.cell>
                    </x-plume::table.row>
                    <x-plume::table.row>
                        <x-plume::table.cell class="font-mono text-xs text-primary">title</x-plume::table.cell>
                        <x-plume::table.cell class="text-xs italic">string</x-plume::table.cell>
                        <x-plume::table.cell class="font-mono text-xs">null</x-plume::table.cell>
                        <x-plume::table.cell class="text-xs">Filename or title displayed in header.</x-plume::table.cell>
                    </x-plume::table.row>
                    <x-plume::table.row>
                        <x-plume::table.cell class="font-mono text-xs text-primary">code</x-plume::table.cell>
                        <x-plume::table.cell class="text-xs italic">string</x-plume::table.cell>
                        <x-plume::table.cell class="font-mono text-xs">null</x-plume::table.cell>
                        <x-plume::table.cell class="text-xs">Optional prop to pass code content instead of slot.</x-plume::table.cell>
                    </x-plume::table.row>
                </x-plume::table.body>
            </x-plume::table>
        </section>

        <section class="space-y-6 pt-12 border-t border-background-700/40 dark:border-background-400/20">
            <h2 class="text-2xl font-bold tracking-tight">Usage</h2>
            <x-plume::code language="blade">
&lt;x-plume::code 
    title="welcome.blade.php" 
    language="blade"
&gt;
    &lt;h1&gt;Welcome&lt;/h1&gt;
&lt;/x-plume::code&gt;</x-plume::code>
        </section>
    </div>
</x-app-layout>
