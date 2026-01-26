# Accessibility (A11y)

Plume is built with accessibility as a core priority, ensuring that components are usable by everyone, including those relying on assistive technologies.

## Core Principles

- **Semantic HTML:** We use native HTML elements (buttons, inputs, links) wherever possible to leverage browser-native accessibility features.
- **ARIA Attributes:** For complex interactive components (Modals, Drawers, Tabs), we implement appropriate ARIA roles and attributes (e.g., `aria-modal`, `aria-expanded`, `aria-labelledby`).
- **Keyboard Navigation:** Most components support full keyboard interaction, including focus trapping for overlays and arrow-key navigation for tabs.
- **Focus Management:** Plume automatically manages focus when opening and closing overlays, returning focus to the previous element upon closure.

## Component-Specific Features

### Overlays (Modals & Drawers)
- **Focus Trapping:** When an overlay is open, focus is trapped within its content to prevent users from accidentally interacting with the background.
- **ESC Key:** Pressing the `ESC` key automatically closes the topmost overlay unless it is marked as `persistent`.
- **Aria Hidden:** The background content is typically hidden from screen readers when a modal is active.

### Forms
- **Labels:** Every form input is automatically associated with a `<label>` via the `for` and `id` attributes.
- **Error Messages:** Validation errors are linked to their respective inputs using `aria-describedby`, ensuring screen readers announce errors when the input receives focus.
- **Required Fields:** Inputs with the `required` prop are marked with `aria-required="true"`.

### Navigation
- **Active State:** Current pages in Breadcrumbs and Navbars use `aria-current="page"`.
- **Skip Links:** While not a component itself, we recommend implementing skip links in your layout to allow keyboard users to bypass navigation.

## Best Practices for Developers

To maintain a high level of accessibility in your application:

1.  **Always Provide Labels:** Even if you choose to hide a label visually (using `sr-only`), ensure that every input has an associated label for screen readers.
2.  **Use Descriptive Link Text:** Avoid "Click here" or "Read more". Use descriptive text that makes sense out of context.
3.  **Color Contrast:** While Plume provides accessible default colors, ensure any custom color overrides maintain a contrast ratio of at least 4.5:1 for normal text.
4.  **Alt Text:** Always provide descriptive `alt` text for images and `title` for icons that convey meaning.
