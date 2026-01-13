<x-app-layout title="Card - Components">
    <div class="space-y-12">
        <div class="border-b border-background-700/40 pb-8 dark:border-background-400/20">
            <h1 class="text-3xl font-bold tracking-tight">Card</h1>
            <p class="mt-2 text-lg text-foreground/50 dark:text-background-400">Displays a card with header, content, and footer.</p>
        </div>

        <section class="space-y-6">
            <h2 class="text-2xl font-bold tracking-tight">Examples</h2>
            <div class="grid gap-6 md:grid-cols-2">
                <x-plume::card>
                    <x-plume::card.header>
                        <x-plume::card.title>Card Title</x-plume::card.title>
                        <x-plume::card.description>Card Description goes here.</x-plume::card.description>
                    </x-plume::card.header>
                    <x-plume::card.content>
                        <p>This is the main content of the card. It can contain any elements.</p>
                    </x-plume::card.content>
                    <x-plume::card.footer>
                        <x-plume::button style="outline" class="w-full">Action</x-plume::button>
                    </x-plume::card.footer>
                </x-plume::card>

                <x-plume::card>
                    <x-plume::card.header>
                        <div class="flex items-center justify-between">
                            <x-plume::card.title>Notifications</x-plume::card.title>
                            <x-plume::badge style="success">New</x-plume::badge>
                        </div>
                        <x-plume::card.description>You have 3 unread messages.</x-plume::card.description>
                    </x-plume::card.header>
                    <x-plume::card.content class="space-y-4">
                        <div class="flex items-start gap-4 rounded-md border border-background-700/40 dark:border-background-400/20 p-3 hover:bg-background-600 dark:hover:bg-background-700 transition-colors">
                            <x-plume::icon i="icon-[fluent--mail-24-regular]" class="size-5 mt-0.5" />
                            <div>
                                <p class="text-sm font-medium">New message from Jane</p>
                                <p class="text-xs text-foreground/50 dark:text-background-400">2 minutes ago</p>
                            </div>
                        </div>
                    </x-plume::card.content>
                </x-plume::card>
            </div>
        </section>

        <section class="space-y-6 pt-12 border-t border-background-700/40 dark:border-background-400/20">
            <h2 class="text-2xl font-bold tracking-tight">Properties</h2>
            <p class="text-sm text-foreground/50 dark:text-background-400">Card sub-components (<code class="text-xs">header</code>, <code class="text-xs">title</code>, <code class="text-xs">description</code>, <code class="text-xs">content</code>, <code class="text-xs">footer</code>) primary accept a default slot for content.</p>
            <x-plume::table>
                <x-plume::table.header>
                    <x-plume::table.row>
                        <x-plume::table.head>Component</x-plume::table.head>
                        <x-plume::table.head>Description</x-plume::table.head>
                    </x-plume::table.row>
                </x-plume::table.header>
                <x-plume::table.body>
                    <x-plume::table.row>
                        <x-plume::table.cell class="font-mono text-xs text-primary">x-plume::card</x-plume::table.cell>
                        <x-plume::table.cell class="text-xs">The main card container.</x-plume::table.cell>
                    </x-plume::table.row>
                    <x-plume::table.row>
                        <x-plume::table.cell class="font-mono text-xs text-primary">x-plume::card.header</x-plume::table.cell>
                        <x-plume::table.cell class="text-xs">Container for title and description.</x-plume::table.cell>
                    </x-plume::table.row>
                    <x-plume::table.row>
                        <x-plume::table.cell class="font-mono text-xs text-primary">x-plume::card.title</x-plume::table.cell>
                        <x-plume::table.cell class="text-xs">Large bold text for the card heading.</x-plume::table.cell>
                    </x-plume::table.row>
                    <x-plume::table.row>
                        <x-plume::table.cell class="font-mono text-xs text-primary">x-plume::card.description</x-plume::table.cell>
                        <x-plume::table.cell class="text-xs">Muted text for additional context.</x-plume::table.cell>
                    </x-plume::table.row>
                    <x-plume::table.row>
                        <x-plume::table.cell class="font-mono text-xs text-primary">x-plume::card.content</x-plume::table.cell>
                        <x-plume::table.cell class="text-xs">The primary body area of the card.</x-plume::table.cell>
                    </x-plume::table.row>
                    <x-plume::table.row>
                        <x-plume::table.cell class="font-mono text-xs text-primary">x-plume::card.footer</x-plume::table.cell>
                        <x-plume::table.cell class="text-xs">Container for actions, typically at the bottom.</x-plume::table.cell>
                    </x-plume::table.row>
                </x-plume::table.body>
            </x-plume::table>
        </section>

        <section class="space-y-6 pt-12 border-t border-background-700/40 dark:border-background-400/20">
            <h2 class="text-2xl font-bold tracking-tight">Usage</h2>
            <x-plume::code language="blade">
&lt;x-plume::card&gt;
    &lt;x-plume::card.header&gt;
        &lt;x-plume::card.title&gt;Notifications&lt;/x-plume::card.title&gt;
        &lt;x-plume::card.description&gt;Manage your notification settings.&lt;/x-plume::card.description&gt;
    &lt;/x-plume::card.header&gt;
    &lt;x-plume::card.content&gt;
        &lt;!-- Main content --&gt;
    &lt;/x-plume::card.content&gt;
    &lt;x-plume::card.footer&gt;
        &lt;x-plume::button style="outline"&gt;Cancel&lt;/x-plume::button&gt;
        &lt;x-plume::spacer /&gt;
        &lt;x-plume::button&gt;Save&lt;/x-plume::button&gt;
    &lt;/x-plume::card.footer&gt;
&lt;/x-plume::card&gt;</x-plume::code>
        </section>
    </div>
</x-app-layout>
