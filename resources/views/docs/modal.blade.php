<x-app-layout title="Modal - Components">
    <div class="space-y-12">
        <div class="border-b border-background-700/40 pb-8 dark:border-background-400/20">
            <h1 class="text-3xl font-bold tracking-tight">Modal</h1>
            <p class="mt-2 text-lg text-foreground/50 dark:text-background-400">A dialog box or popup window that is displayed on top of the current page.</p>
        </div>

        <section class="space-y-6">
            <h2 class="text-2xl font-bold tracking-tight">Examples</h2>
            <div class="flex flex-wrap items-center gap-4">
                <x-plume::button x-on:click="$dispatch('open-modal', 'example-modal')">Open Modal</x-plume::button>
            </div>

            <x-plume::modal name="example-modal">
                <x-plume::modal.header>
                    <x-plume::modal.title>Modal Title</x-plume::modal.title>
                    <x-plume::modal.description>This is a description of the modal content.</x-plume::modal.description>
                </x-plume::modal.header>
                <x-plume::modal.content>
                    <p class="text-sm">You can put any content here, including forms, images, or other components.</p>
                </x-plume::modal.content>
                <x-plume::modal.footer>
                    <x-plume::button style="outline" x-on:click="$dispatch('close-modal', 'example-modal')">Cancel</x-plume::button>
                    <x-plume::button x-on:click="$dispatch('close-modal', 'example-modal'); addToast({ type: 'success', title: 'Confirmed', message: 'Action was successful.' })">Confirm</x-plume::button>
                </x-plume::modal.footer>
            </x-plume::modal>
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
                        <x-plume::table.cell class="text-xs font-bold text-destructive">Required. Unique identifier for the modal.</x-plume::table.cell>
                    </x-plume::table.row>
                    <x-plume::table.row>
                        <x-plume::table.cell class="font-mono text-xs text-primary">show</x-plume::table.cell>
                        <x-plume::table.cell class="text-xs italic">boolean</x-plume::table.cell>
                        <x-plume::table.cell class="font-mono text-xs">false</x-plume::table.cell>
                        <x-plume::table.cell class="text-xs">Initial visibility state.</x-plume::table.cell>
                    </x-plume::table.row>
                    <x-plume::table.row>
                        <x-plume::table.cell class="font-mono text-xs text-primary">maxWidth</x-plume::table.cell>
                        <x-plume::table.cell class="text-xs italic">string</x-plume::table.cell>
                        <x-plume::table.cell class="font-mono text-xs">2xl</x-plume::table.cell>
                        <x-plume::table.cell class="text-xs">Max width: <code class="text-xs">sm</code>, <code class="text-xs">md</code>, <code class="text-xs">lg</code>, <code class="text-xs">xl</code>, <code class="text-xs">2xl</code>.</x-plume::table.cell>
                    </x-plume::table.row>
                </x-plume::table.body>
            </x-plume::table>
        </section>

        <section class="space-y-6 pt-12 border-t border-background-700/40 dark:border-background-400/20">
            <h2 class="text-2xl font-bold tracking-tight">Usage</h2>
            <div class="space-y-4">
                <h3 class="text-lg font-medium">Triggering the Modal</h3>
                <x-plume::code language="blade">
&lt;x-plume::button x-on:click="$dispatch('open-modal', 'confirm-delete')"&gt;
    Delete Item
&lt;/x-plume::button&gt;</x-plume::code>

                <h3 class="text-lg font-medium mt-8">Modal Component</h3>
                <x-plume::code language="blade">
&lt;x-plume::modal name="confirm-delete"&gt;
    &lt;x-plume::modal.header&gt;
        &lt;x-plume::modal.title&gt;Confirm Deletion&lt;/x-plume::modal.title&gt;
    &lt;/x-plume::modal.header&gt;
    &lt;x-plume::modal.content&gt;
        Are you sure you want to delete this?
    &lt;/x-plume::modal.content&gt;
    &lt;x-plume::modal.footer&gt;
        &lt;x-plume::button style="outline" x-on:click="show = false"&gt;Cancel&lt;/x-plume::button&gt;
        &lt;x-plume::button style="destructive"&gt;Delete&lt;/x-plume::button&gt;
    &lt;/x-plume::modal.footer&gt;
&lt;/x-plume::modal&gt;</x-plume::code>
            </div>
        </section>
    </div>
</x-app-layout>
