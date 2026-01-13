<x-app-layout title="Dropdown - Components">
    <div class="space-y-12">
        <div class="border-b border-background-700/40 pb-8 dark:border-background-400/20">
            <h1 class="text-3xl font-bold tracking-tight">Dropdown</h1>
            <p class="mt-2 text-lg text-foreground/50 dark:text-background-400">Displays a menu to the user—such as a set of actions or functions—triggered by a button.</p>
        </div>

        <section class="space-y-6">
            <h2 class="text-2xl font-bold tracking-tight">Examples</h2>
            <div class="flex flex-wrap items-center gap-4">
                <x-plume::dropdown align="left" width="48">
                    <x-slot name="trigger">
                        <x-plume::button style="outline">
                            Options
                            <x-plume::icon i="icon-[fluent--chevron-down-24-regular]" class="ml-2 size-4" />
                        </x-plume::button>
                    </x-slot>

                    <x-slot name="content">
                        <x-plume::dropdown.item>Profile</x-plume::dropdown.item>
                        <x-plume::dropdown.item>Settings</x-plume::dropdown.item>
                        <x-plume::dropdown.separator />
                        <x-plume::dropdown.item class="text-destructive">Logout</x-plume::dropdown.item>
                    </x-slot>
                </x-plume::dropdown>

                <x-plume::dropdown align="right" width="56">
                    <x-slot name="trigger">
                        <x-plume::button shape="round" style="secondary">
                            <x-plume::icon i="icon-[fluent--more-horizontal-24-regular]" class="size-5" />
                        </x-plume::button>
                    </x-slot>

                    <x-slot name="content">
                        <x-plume::dropdown.item>Edit</x-plume::dropdown.item>
                        <x-plume::dropdown.item>Duplicate</x-plume::dropdown.item>
                        <x-plume::dropdown.item>Archive</x-plume::dropdown.item>
                        <x-plume::dropdown.separator />
                        <x-plume::dropdown.item class="text-destructive">Delete</x-plume::dropdown.item>
                    </x-slot>
                </x-plume::dropdown>
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
                        <x-plume::table.cell class="font-mono text-xs text-primary">align</x-plume::table.cell>
                        <x-plume::table.cell class="text-xs italic">string</x-plume::table.cell>
                        <x-plume::table.cell class="font-mono text-xs">right</x-plume::table.cell>
                        <x-plume::table.cell class="text-xs">Alignment: <code class="text-xs">left</code>, <code class="text-xs">right</code>, <code class="text-xs">top</code>.</x-plume::table.cell>
                    </x-plume::table.row>
                    <x-plume::table.row>
                        <x-plume::table.cell class="font-mono text-xs text-primary">width</x-plume::table.cell>
                        <x-plume::table.cell class="text-xs italic">string</x-plume::table.cell>
                        <x-plume::table.cell class="font-mono text-xs">48</x-plume::table.cell>
                        <x-plume::table.cell class="text-xs">Tailwind width class suffix (e.g., <code class="text-xs">48</code> becomes <code class="text-xs">w-48</code>).</x-plume::table.cell>
                    </x-plume::table.row>
                    <x-plume::table.row>
                        <x-plume::table.cell class="font-mono text-xs text-primary">contentClasses</x-plume::table.cell>
                        <x-plume::table.cell class="text-xs italic">string</x-plume::table.cell>
                        <x-plume::table.cell class="font-mono text-xs">...</x-plume::table.cell>
                        <x-plume::table.cell class="text-xs">Additional CSS classes for the dropdown content container.</x-plume::table.cell>
                    </x-plume::table.row>
                </x-plume::table.body>
            </x-plume::table>
        </section>

        <section class="space-y-6 pt-12 border-t border-background-700/40 dark:border-background-400/20">
            <h2 class="text-2xl font-bold tracking-tight">Usage</h2>
            <x-plume::code language="blade">
&lt;x-plume::dropdown align="right" width="48"&gt;
    &lt;x-slot name="trigger"&gt;
        &lt;x-plume::button&gt;Click Me&lt;/x-plume::button&gt;
    &lt;/x-slot&gt;

    &lt;x-slot name="content"&gt;
        &lt;x-plume::dropdown.item href="/profile"&gt;Profile&lt;/x-plume::dropdown.item&gt;
        &lt;x-plume::dropdown.separator /&gt;
        &lt;x-plume::dropdown.item&gt;Logout&lt;/x-plume::dropdown.item&gt;
    &lt;/x-slot&gt;
&lt;/x-plume::dropdown&gt;</x-plume::code>
        </section>
    </div>
</x-app-layout>
