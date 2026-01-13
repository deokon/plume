<x-app-layout title="Table - Components">
    <div class="space-y-12">
        <div class="border-b border-background-700/40 pb-8 dark:border-background-400/20">
            <h1 class="text-3xl font-bold tracking-tight">Table</h1>
            <p class="mt-2 text-lg text-foreground/50 dark:text-background-400">A responsive table component.</p>
        </div>

        <section class="space-y-6">
            <h2 class="text-2xl font-bold tracking-tight">Examples</h2>
            
            <div class="space-y-8">
                <div class="space-y-4">
                    <h3 class="text-lg font-medium">Default Table</h3>
                    <x-plume::table>
                        <x-plume::table.header>
                            <x-plume::table.row>
                                <x-plume::table.head class="w-25">Invoice</x-plume::table.head>
                                <x-plume::table.head>Status</x-plume::table.head>
                                <x-plume::table.head>Method</x-plume::table.head>
                                <x-plume::table.head class="text-right">Amount</x-plume::table.head>
                            </x-plume::table.row>
                        </x-plume::table.header>
                        <x-plume::table.body>
                            <x-plume::table.row>
                                <x-plume::table.cell class="font-medium">INV001</x-plume::table.cell>
                                <x-plume::table.cell>Paid</x-plume::table.cell>
                                <x-plume::table.cell>Credit Card</x-plume::table.cell>
                                <x-plume::table.cell class="text-right">$250.00</x-plume::table.cell>
                            </x-plume::table.row>
                            <x-plume::table.row>
                                <x-plume::table.cell class="font-medium">INV002</x-plume::table.cell>
                                <x-plume::table.cell>Pending</x-plume::table.cell>
                                <x-plume::table.cell>PayPal</x-plume::table.cell>
                                <x-plume::table.cell class="text-right">$150.00</x-plume::table.cell>
                            </x-plume::table.row>
                            <x-plume::table.row>
                                <x-plume::table.cell class="font-medium">INV003</x-plume::table.cell>
                                <x-plume::table.cell>Unpaid</x-plume::table.cell>
                                <x-plume::table.cell>Bank Transfer</x-plume::table.cell>
                                <x-plume::table.cell class="text-right">$350.00</x-plume::table.cell>
                            </x-plume::table.row>
                        </x-plume::table.body>
                    </x-plume::table>
                </div>

                <div class="space-y-4">
                    <h3 class="text-lg font-medium">Striped Table</h3>
                    <x-plume::table striped>
                        <x-plume::table.header>
                            <x-plume::table.row>
                                <x-plume::table.head class="w-25">Name</x-plume::table.head>
                                <x-plume::table.head>Role</x-plume::table.head>
                                <x-plume::table.head>Email</x-plume::table.head>
                            </x-plume::table.row>
                        </x-plume::table.header>
                        <x-plume::table.body>
                            <x-plume::table.row>
                                <x-plume::table.cell>John Doe</x-plume::table.cell>
                                <x-plume::table.cell>Admin</x-plume::table.cell>
                                <x-plume::table.cell>john@example.com</x-plume::table.cell>
                            </x-plume::table.row>
                            <x-plume::table.row>
                                <x-plume::table.cell>Jane Smith</x-plume::table.cell>
                                <x-plume::table.cell>User</x-plume::table.cell>
                                <x-plume::table.cell>jane@example.com</x-plume::table.cell>
                            </x-plume::table.row>
                            <x-plume::table.row>
                                <x-plume::table.cell>Bob Johnson</x-plume::table.cell>
                                <x-plume::table.cell>User</x-plume::table.cell>
                                <x-plume::table.cell>bob@example.com</x-plume::table.cell>
                            </x-plume::table.row>
                            <x-plume::table.row>
                                <x-plume::table.cell>Alice Williams</x-plume::table.cell>
                                <x-plume::table.cell>Moderator</x-plume::table.cell>
                                <x-plume::table.cell>alice@example.com</x-plume::table.cell>
                            </x-plume::table.row>
                        </x-plume::table.body>
                    </x-plume::table>
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
                        <x-plume::table.cell class="font-mono text-xs text-primary">striped</x-plume::table.cell>
                        <x-plume::table.cell class="text-xs italic">boolean</x-plume::table.cell>
                        <x-plume::table.cell class="font-mono text-xs">false</x-plume::table.cell>
                        <x-plume::table.cell class="text-xs">Whether to alternate row background colors.</x-plume::table.cell>
                    </x-plume::table.row>
                </x-plume::table.body>
            </x-plume::table>
        </section>

        <section class="space-y-6 pt-12 border-t border-background-700/40 dark:border-background-400/20">
            <h2 class="text-2xl font-bold tracking-tight">Usage</h2>
            <x-plume::code language="blade">
&lt;x-plume::table striped&gt;
    &lt;x-plume::table.header&gt;
        &lt;x-plume::table.row&gt;
            &lt;x-plume::table.head&gt;Header&lt;/x-plume::table.head&gt;
        &lt;/x-plume::table.row&gt;
    &lt;/x-plume::table.header&gt;
    &lt;x-plume::table.body&gt;
        &lt;x-plume::table.row&gt;
            &lt;x-plume::table.cell&gt;Cell Content&lt;/x-plume::table.cell&gt;
        &lt;/x-plume::table.row&gt;
    &lt;/x-plume::table.body&gt;
&lt;/x-plume::table&gt;</x-plume::code>
        </section>
    </div>
</x-app-layout>
