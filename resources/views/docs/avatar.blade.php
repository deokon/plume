<x-app-layout title="Avatar - Components">
    <div class="space-y-12">
        <div class="border-b border-background-700/40 pb-8 dark:border-background-400/20">
            <h1 class="text-3xl font-bold tracking-tight">Avatar</h1>
            <p class="mt-2 text-lg text-foreground/50 dark:text-background-400">An image element with a fallback for representing the user.</p>
        </div>

        <section class="space-y-6">
            <h2 class="text-2xl font-bold tracking-tight">Examples</h2>
            <div class="flex flex-wrap items-end gap-6">
                <div class="space-y-2">
                    <p class="text-sm font-medium">Sizes</p>
                    <div class="flex items-end gap-4">
                        <x-plume::avatar size="xs" fallback="XS" />
                        <x-plume::avatar size="sm" fallback="SM" />
                        <x-plume::avatar size="md" fallback="MD" />
                        <x-plume::avatar size="lg" fallback="LG" />
                        <x-plume::avatar size="xl" fallback="XL" />
                    </div>
                </div>
                <div class="space-y-2">
                    <p class="text-sm font-medium">Image & Fallback</p>
                    <div class="flex items-center gap-4">
                        <x-plume::avatar src="https://github.com/shadcn.png" alt="@shadcn" fallback="CN" />
                        <x-plume::avatar src="invalid-src" fallback="JD" />
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
                        <x-plume::table.cell class="font-mono text-xs text-primary">src</x-plume::table.cell>
                        <x-plume::table.cell class="text-xs italic">string</x-plume::table.cell>
                        <x-plume::table.cell class="font-mono text-xs">null</x-plume::table.cell>
                        <x-plume::table.cell class="text-xs">Image source URL.</x-plume::table.cell>
                    </x-plume::table.row>
                    <x-plume::table.row>
                        <x-plume::table.cell class="font-mono text-xs text-primary">alt</x-plume::table.cell>
                        <x-plume::table.cell class="text-xs italic">string</x-plume::table.cell>
                        <x-plume::table.cell class="font-mono text-xs">''</x-plume::table.cell>
                        <x-plume::table.cell class="text-xs">Alt text for the image.</x-plume::table.cell>
                    </x-plume::table.row>
                    <x-plume::table.row>
                        <x-plume::table.cell class="font-mono text-xs text-primary">fallback</x-plume::table.cell>
                        <x-plume::table.cell class="text-xs italic">string</x-plume::table.cell>
                        <x-plume::table.cell class="font-mono text-xs">''</x-plume::table.cell>
                        <x-plume::table.cell class="text-xs">Initials or text to show if image fails.</x-plume::table.cell>
                    </x-plume::table.row>
                    <x-plume::table.row>
                        <x-plume::table.cell class="font-mono text-xs text-primary">size</x-plume::table.cell>
                        <x-plume::table.cell class="text-xs italic">string</x-plume::table.cell>
                        <x-plume::table.cell class="font-mono text-xs">md</x-plume::table.cell>
                        <x-plume::table.cell class="text-xs">Options: <code class="text-xs">xs</code>, <code class="text-xs">sm</code>, <code class="text-xs">md</code>, <code class="text-xs">lg</code>, <code class="text-xs">xl</code>.</x-plume::table.cell>
                    </x-plume::table.row>
                </x-plume::table.body>
            </x-plume::table>
        </section>

        <section class="space-y-6 pt-12 border-t border-background-700/40 dark:border-background-400/20">
            <h2 class="text-2xl font-bold tracking-tight">Usage</h2>
            <x-plume::code language="blade">
&lt;x-plume::avatar 
    src="https://github.com/shadcn.png" 
    alt="@shadcn" 
    fallback="CN" 
    size="lg" 
/&gt;</x-plume::code>
        </section>
    </div>
</x-app-layout>
