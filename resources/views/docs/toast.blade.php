<x-app-layout title="Toast - Components">
    <div class="space-y-12">
        <div class="border-b border-background-700/40 pb-8 dark:border-background-400/20">
            <h1 class="text-3xl font-bold tracking-tight">Toast</h1>
            <p class="mt-2 text-lg text-foreground/50 dark:text-background-400">A succinct message that is displayed temporarily.</p>
        </div>

        <section class="space-y-6">
            <h2 class="text-2xl font-bold tracking-tight">Examples</h2>
            <div class="flex flex-wrap items-center gap-4">
                <x-plume::button 
                    style="outline" 
                    x-on:click="addToast({ title: 'Default Toast', message: 'This is a default notification message.' })"
                >
                    Show Toast
                </x-plume::button>
                <x-plume::button 
                    style="secondary" 
                    x-on:click="addToast({ type: 'success', title: 'Success', message: 'Your action was successful!' })"
                >
                    Success Toast
                </x-plume::button>
                <x-plume::button 
                    style="destructive" 
                    x-on:click="addToast({ type: 'error', title: 'Error', message: 'Something went wrong.', duration: 5000 })"
                >
                    Error Toast (5s)
                </x-plume::button>
                <x-plume::button 
                    style="outline" 
                    x-on:click="addToast({ type: 'info', title: 'Info', message: 'Here is some information for you.', autoclose: false })"
                >
                    Persistent Toast
                </x-plume::button>
            </div>
        </section>

        <section class="space-y-6 pt-12 border-t border-background-700/40 dark:border-background-400/20">
            <h2 class="text-2xl font-bold tracking-tight">Properties</h2>
            <p class="text-sm text-foreground/50 dark:text-background-400">Toasts are triggered by passing an object to the <code class="text-xs">addToast()</code> function with the following properties:</p>
            <x-plume::table>
                <x-plume::table.header>
                    <x-plume::table.row>
                        <x-plume::table.head>Property</x-plume::table.head>
                        <x-plume::table.head>Type</x-plume::table.head>
                        <x-plume::table.head>Default</x-plume::table.head>
                        <x-plume::table.head>Description</x-plume::table.head>
                    </x-plume::table.row>
                </x-plume::table.header>
                <x-plume::table.body>
                    <x-plume::table.row>
                        <x-plume::table.cell class="font-mono text-xs text-primary underline decoration-dotted decoration-primary/50">message</x-plume::table.cell>
                        <x-plume::table.cell class="text-xs italic">string</x-plume::table.cell>
                        <x-plume::table.cell class="font-mono text-xs">-</x-plume::table.cell>
                        <x-plume::table.cell class="text-xs font-bold text-destructive">Required. The primary notification text.</x-plume::table.cell>
                    </x-plume::table.row>
                    <x-plume::table.row>
                        <x-plume::table.cell class="font-mono text-xs text-primary">title</x-plume::table.cell>
                        <x-plume::table.cell class="text-xs italic">string</x-plume::table.cell>
                        <x-plume::table.cell class="font-mono text-xs">null</x-plume::table.cell>
                        <x-plume::table.cell class="text-xs">Optional bold heading.</x-plume::table.cell>
                    </x-plume::table.row>
                    <x-plume::table.row>
                        <x-plume::table.cell class="font-mono text-xs text-primary">type</x-plume::table.cell>
                        <x-plume::table.cell class="text-xs italic">string</x-plume::table.cell>
                        <x-plume::table.cell class="font-mono text-xs">null</x-plume::table.cell>
                        <x-plume::table.cell class="text-xs">Options: <code class="text-xs">success</code>, <code class="text-xs">error</code>, <code class="text-xs">info</code>.</x-plume::table.cell>
                    </x-plume::table.row>
                    <x-plume::table.row>
                        <x-plume::table.cell class="font-mono text-xs text-primary">duration</x-plume::table.cell>
                        <x-plume::table.cell class="text-xs italic">number</x-plume::table.cell>
                        <x-plume::table.cell class="font-mono text-xs">3000</x-plume::table.cell>
                        <x-plume::table.cell class="text-xs">Delay in ms before auto-closing.</x-plume::table.cell>
                    </x-plume::table.row>
                    <x-plume::table.row>
                        <x-plume::table.cell class="font-mono text-xs text-primary">autoclose</x-plume::table.cell>
                        <x-plume::table.cell class="text-xs italic">boolean</x-plume::table.cell>
                        <x-plume::table.cell class="font-mono text-xs">true</x-plume::table.cell>
                        <x-plume::table.cell class="text-xs">Whether to close automatically.</x-plume::table.cell>
                    </x-plume::table.row>
                </x-plume::table.body>
            </x-plume::table>
        </section>

        <section class="space-y-6 pt-12 border-t border-background-700/40 dark:border-background-400/20">
            <h2 class="text-2xl font-bold tracking-tight">Usage</h2>
            <div class="space-y-4">
                <h3 class="text-lg font-medium">Triggering from Blade/Alpine</h3>
                <x-plume::code language="blade">
&lt;x-plume::button 
    x-on:click="addToast({ 
        type: 'success', 
        title: 'Saved', 
        message: 'Your profile has been updated.',
        duration: 3000
    })"
&gt;
    Save Profile
&lt;/x-plume::button&gt;</x-plume::code>

                <h3 class="text-lg font-medium mt-8">Toaster Layout (Required in App Layout)</h3>
                <x-plume::code language="blade">
&lt;!-- Include this once in your main layout --&gt;
&lt;x-plume::toaster /&gt;</x-plume::code>
            </div>
        </section>
    </div>
</x-app-layout>
