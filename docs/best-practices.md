# Best Practices & Performance

Follow these guidelines to ensure your application remains fast, accessible, and maintainable when using Plume UI.

## Performance Optimization

### Client-side vs. Server-side Data Tables
- **Use Client-side** (default) for datasets smaller than 200 items. It provides instant filtering and sorting without additional network requests.
- **Use Server-side** (`url` prop) for anything larger. Fetching 1,000+ items into the browser will significantly slow down AlpineJS initialization and DOM rendering.

### Constructed Columns in Tables
Prefer `constructed` column definitions over `slots` for high-density tables. Constructed columns are processed once in JavaScript, whereas slots require Blade rendering for every cell, which can add up on large pages.

### Lazy Loading Overlays
For Modals or Drawers that contain heavy content (like complex forms or charts), consider using a `show` variable to conditionally render the content only when the overlay is open:

```blade
<x-plume::modal name="heavy-modal">
    <template x-if="show">
        <livewire:complex-form />
    </template>
</x-plume::modal>
```

## Form Management

### State Persistence
By default, `x-plume::form` state is lost on page refresh. To persist form data across navigation, you can integrate Alpine's `$persist` plugin:

```blade
<x-plume::form :formData="Js::from(['name' => ''])" x-init="formData = $persist(formData)">
    ...
</x-plume::form>
```

### Dynamic Fields
When adding or removing fields dynamically, ensure your `formData` object is updated accordingly. Use standard AlpineJS array manipulation (`push`, `splice`) to manage lists of fields.

```blade
<template x-for="(item, index) in formData.items" :key="index">
    <x-plume::form.input ::model="'items.' + index + '.name'" />
</template>
```

### Validation Strategy
Leverage Plume's automatic error handling. Ensure your backend returns standard Laravel validation errors (422 Unprocessable Entity), and Plume will handle the rest. This keeps your frontend logic clean.

## UI/UX Patterns

### Consistent Spacing
Use the `x-plume::spacer` and `x-plume::divider` components to maintain consistent vertical rhythm. Avoid adding arbitrary margins to individual components; instead, rely on the container's layout (like `form.section` or `form.group`).

### Mobile First
Plume is mobile-first. Always test your layouts on smaller screens. Use props like `minCols` and `maxCols` in `form.section` to ensure your forms remain readable on phones.

## Accessibility (A11y)
- **Always provide labels**, even if they are visually hidden.
- **Don't disable buttons** unless absolutely necessary. Instead, use `button.loader` to show that an action is in progress while keeping the UI responsive.
- **Maintain focus hierarchy.** When closing a modal, ensure focus returns to the element that triggered it (Plume does this automatically if initialized correctly).
