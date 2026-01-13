<x-app-layout title="Skeleton - Components">
    <div class="space-y-12">
        <div class="border-b border-background-700/40 pb-8 dark:border-background-400/20">
            <h1 class="text-3xl font-bold tracking-tight">Skeleton</h1>
            <p class="mt-2 text-lg text-foreground/50 dark:text-background-400">Use to display a placeholder preview of your content before the data gets loaded to reduce cognitive load.</p>
        </div>

        <section class="space-y-6">
            <h2 class="text-2xl font-bold tracking-tight">Examples</h2>
            <div class="flex flex-wrap items-start gap-12">
                <div class="flex items-center space-x-4">
                    <x-plume::skeleton class="size-12 rounded-full" />
                    <div class="space-y-2">
                        <x-plume::skeleton class="h-4 w-[250px]" />
                        <x-plume::skeleton class="h-4 w-[200px]" />
                    </div>
                </div>
                
                <div class="flex flex-col space-y-3">
                    <x-plume::skeleton class="h-[125px] w-[250px] rounded-xl" />
                    <div class="space-y-2">
                        <x-plume::skeleton class="h-4 w-[250px]" />
                        <x-plume::skeleton class="h-4 w-[200px]" />
                    </div>
                </div>
            </div>
        </section>

        <section class="space-y-6 pt-12 border-t border-background-700/40 dark:border-background-400/20">
            <h2 class="text-2xl font-bold tracking-tight">Properties</h2>
            <p class="text-sm text-foreground/50 dark:text-background-400">The Skeleton component does not have custom props. It is styled entirely using standard Tailwind utility classes (e.g., <code class="text-xs">h-4</code>, <code class="text-xs">w-full</code>, <code class="text-xs">rounded-full</code>) via the <code class="text-xs">class</code> attribute.</p>
        </section>

        <section class="space-y-6 pt-12 border-t border-background-700/40 dark:border-background-400/20">
            <h2 class="text-2xl font-bold tracking-tight">Usage</h2>
            <x-plume::code language="blade">
&lt;div class="flex items-center space-x-4"&gt;
    &lt;x-plume::skeleton class="size-12 rounded-full" /&gt;
    &lt;div class="space-y-2"&gt;
        &lt;x-plume::skeleton class="h-4 w-[250px]" /&gt;
        &lt;x-plume::skeleton class="h-4 w-[200px]" /&gt;
    &lt;/div&gt;
&lt;/div&gt;</x-plume::code>
        </section>
    </div>
</x-app-layout>
