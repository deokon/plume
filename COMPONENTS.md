# Plume UI Components Reference

Base URL: [https://plume.dennisokon.com](https://plume.dennisokon.com)

## x-plume::accordion
Collapsible content panels for saving vertical space.

Documentation: [https://plume.dennisokon.com/docs/accordion](https://plume.dennisokon.com/docs/accordion)

Path: `plume/src/View/Components/Accordion.php`

### Properties
- `alwaysOpen` (boolean): Default: `false`.

### Usage
```blade
<x-plume::accordion>
    <x-plume::accordion.item title="Heading">
        Content...
    </x-plume::accordion.item>
</x-plume::accordion>
```

---

## x-plume::accordion.item
An individual collapsible item within an accordion.

Documentation: [https://plume.dennisokon.com/docs/accordion-item](https://plume.dennisokon.com/docs/accordion-item)

Path: `plume/src/View/Components/AccordionItem.php`

### Properties
- `title` (string): Required. Step label.
- `id` (string): Default: `null` (auto-generated).
- `open` (boolean): Default: `false`.

---

## x-plume::alert-dialog
Modal dialog specifically designed for alerting users to important information or actions.

Documentation: [https://plume.dennisokon.com/docs/alert-dialog](https://plume.dennisokon.com/docs/alert-dialog)

Path: `plume/src/View/Components/AlertDialog.php`

### Properties
- `name` (string): Default: `alert-dialog`.
- `show` (boolean): Default: `false`.
- `maxWidth` (string): Default: `2xl`.
- `action` (string): Default: `Confirm`.
- `withCancel` (boolean): Default: `true`.
- `onConfirm` (string): Default: ``.

---

## x-plume::alert
Displays a callout for user attention.

Documentation: [https://plume.dennisokon.com/docs/alert](https://plume.dennisokon.com/docs/alert)

Path: `plume/src/View/Components/Alert.php`

### Properties
- `icon` (string): Default: `null`.
- `style` (string): Default: `info`.
- `closable` (boolean): Default: `false`.
- `autoclose` (number): Default: `null`.
- `title` (string): Default: `null`.
- `onClose` (string): Default: `null`.

---

## x-plume::aspect
A container component to maintain consistent proportions for media and content.

Documentation: [https://plume.dennisokon.com/docs/aspect](https://plume.dennisokon.com/docs/aspect)

Path: `plume/src/View/Components/Aspect.php`

### Properties
- `ratio` (string): Default: `video`.

---

## x-plume::audio
A styled wrapper for HTML5 audio content.

Documentation: [https://plume.dennisokon.com/docs/audio](https://plume.dennisokon.com/docs/audio)

Path: `plume/src/View/Components/Audio.php`

### Properties
- `src` (string): Required.
- `autoplay` (boolean): Default: `false`.
- `controls` (boolean): Default: `true`.
- `loop` (boolean): Default: `false`.
- `muted` (boolean): Default: `false`.

---

## x-plume::avatar
An image element with a fallback for representing the user.

Documentation: [https://plume.dennisokon.com/docs/avatar](https://plume.dennisokon.com/docs/avatar)

Path: `plume/src/View/Components/Avatar.php`

### Properties
- `src` (string): Default: `null`.
- `alt` (string): Default: ``.
- `fallback` (string): Default: ``.
- `size` (string): Default: `md`.
- `status` (string): Default: `null`.

---

## x-plume::badge
Displays a badge or a component that looks like a badge.

Documentation: [https://plume.dennisokon.com/docs/badge](https://plume.dennisokon.com/docs/badge)

Path: `plume/src/View/Components/Badge.php`

### Properties
- `style` (string): Default: `default`.

---

## x-plume::breadcrumb
Displays the path to the current resource using a hierarchy of links.

Documentation: [https://plume.dennisokon.com/docs/breadcrumb](https://plume.dennisokon.com/docs/breadcrumb)

Path: `plume/src/View/Components/Breadcrumb.php`

---

## x-plume::breadcrumb.item
Individual breadcrumb link.

Documentation: [https://plume.dennisokon.com/docs/breadcrumb-item](https://plume.dennisokon.com/docs/breadcrumb-item)

Path: `plume/src/View/Components/BreadcrumbItem.php`

### Properties
- `href` (string): Default: `null`.
- `active` (boolean): Default: `false`.

---

## x-plume::button
Displays a button or a component that looks like a button.

Documentation: [https://plume.dennisokon.com/docs/button](https://plume.dennisokon.com/docs/button)

Path: `plume/src/View/Components/Button.php`

### Properties
- `style` (string): Default: `default`.
- `size` (string): Default: `md`.
- `shape` (string): Default: `default`.
- `href` (string): Default: `null`.
- `icon` (string): Default: `null`.
- `fullWidth` (boolean): Default: `false`.

---

## x-plume::button-group
Groups a series of buttons together on a single line.

Documentation: [https://plume.dennisokon.com/docs/button-group](https://plume.dennisokon.com/docs/button-group)

Path: `plume/src/View/Components/ButtonGroup.php`

### Properties
- `size` (string): Default: `md`.
- `stack` (boolean): Default: `true`.

---

## x-plume::calendar
A visual calendar interface for selecting dates.

Documentation: [https://plume.dennisokon.com/docs/calendar](https://plume.dennisokon.com/docs/calendar)

Path: `plume/src/View/Components/Calendar.php`

### Properties
- `model` (string): Default: `null`.
- `value` (any): Default: `null`.
- `mode` (string): Default: `single`.
- `min` (string): Default: `null`.
- `max` (string): Default: `null`.

---

## x-plume::card
Displays a card with header, content, and footer.

Documentation: [https://plume.dennisokon.com/docs/card](https://plume.dennisokon.com/docs/card)

Path: `plume/src/View/Components/Card.php`

### Properties
- `title` (string): Default: `null`.
- `description` (string): Default: `null`.
- `badge` (string): Default: `null`.
- `badgeStyle` (string): Default: `default`.

---

## x-plume::carousel
A slideshow component for cycling through elements.

Documentation: [https://plume.dennisokon.com/docs/carousel](https://plume.dennisokon.com/docs/carousel)

Path: `plume/src/View/Components/Carousel.php`

### Properties
- `controls` (boolean): Default: `true`.
- `indicators` (boolean): Default: `false`.
- `autoplay` (boolean): Default: `false`.
- `interval` (number): Default: `5000`.

---

## x-plume::chart
Basic chart component for data visualization (bar, line).

Documentation: [https://plume.dennisokon.com/docs/chart](https://plume.dennisokon.com/docs/chart)

Path: `plume/src/View/Components/Chart.php`

### Properties
- `type` (string): Default: `bar`.
- `data` (array): Default: `[]`.
- `height` (number): Default: `200`.
- `color` (string): Default: `text-primary`.

---

## x-plume::code
A component for displaying code snippets with a copy-to-clipboard feature.

Documentation: [https://plume.dennisokon.com/docs/code](https://plume.dennisokon.com/docs/code)

Path: `plume/src/View/Components/Code.php`

### Properties
- `language` (string): Default: `null`.
- `title` (string): Default: `null`.
- `code` (string): Default: `null`.

---

## x-plume::command
A powerful search and action interface accessible via keyboard shortcuts.

Documentation: [https://plume.dennisokon.com/docs/command](https://plume.dennisokon.com/docs/command)

Path: `plume/src/View/Components/Command.php`

---

## x-plume::data-table
Advanced table with sorting, filtering, and pagination. Powered by AlpineJS.

Documentation: [https://plume.dennisokon.com/docs/data-table](https://plume.dennisokon.com/docs/data-table)

Path: `plume/src/View/Components/DataTable.php`

### Properties
- `data` (array): Default: `[]`.
- `columns` (array): Default: `[]`.
- `searchable` (boolean): Default: `false`.
- `paginated` (boolean): Default: `false`.
- `perPage` (number): Default: `10`.
- `sortable` (boolean): Default: `true`.

---

## x-plume::drawer
A panel that slides in from the edge of the screen.

Documentation: [https://plume.dennisokon.com/docs/drawer](https://plume.dennisokon.com/docs/drawer)

Path: `plume/src/View/Components/Drawer.php`

### Properties
- `name` (string): Required.
- `show` (boolean): Default: `false`.
- `side` (string): Default: `right`.
- `title` (string): Default: `null`.
- `description` (string): Default: `null`.

---

## x-plume::dropdown
Displays a menu to the user triggered by a button.

Documentation: [https://plume.dennisokon.com/docs/dropdown](https://plume.dennisokon.com/docs/dropdown)

Path: `plume/src/View/Components/Dropdown.php`

### Properties
- `trigger` (string): Default: `null`.
- `align` (string): Default: `right`.
- `width` (string): Default: `md`.
- `triggerStyle` (string): Default: `outline`.

---

## x-plume::form
A collection of form components for user input.

Documentation: [https://plume.dennisokon.com/docs/form](https://plume.dennisokon.com/docs/form)

Path: `plume/src/View/Components/Form/Form.php`

### Properties
- `action` (string): Default: ``.
- `method` (string): Default: `POST`.
- `formData` (string): Default: `null`.

---

## x-plume::icon
Renders an Iconify icon.

Documentation: [https://plume.dennisokon.com/docs/icon](https://plume.dennisokon.com/docs/icon)

Path: `plume/src/View/Components/Icon.php`

### Properties
- `i` (string): Required. Iconify identifier.

---

## x-plume::modal
A dialog box or popup window that is displayed on top of the current page.

Documentation: [https://plume.dennisokon.com/docs/modal](https://plume.dennisokon.com/docs/modal)

Path: `plume/src/View/Components/Modal.php`

### Properties
- `name` (string): Required.
- `show` (boolean): Default: `false`.
- `maxWidth` (string): Default: `2xl`.
- `title` (string): Default: `null`.

---

## x-plume::pagination
Displays a sequence of links for navigating through a series of related pages.

Documentation: [https://plume.dennisokon.com/docs/pagination](https://plume.dennisokon.com/docs/pagination)

Path: `plume/src/View/Components/Pagination.php`

### Properties
- `total` (number): Default: `1`.
- `current` (number): Default: `1`.
- `onEachSide` (number): Default: `1`.

---

## x-plume::progress
A bar that shows the completion progress of a task.

Documentation: [https://plume.dennisokon.com/docs/progress](https://plume.dennisokon.com/docs/progress)

Path: `plume/src/View/Components/Progress.php`

### Properties
- `value` (number): Default: `0`.
- `style` (string): Default: `default`.

---

## x-plume::spinner
A standalone loading indicator.

Documentation: [https://plume.dennisokon.com/docs/spinner](https://plume.dennisokon.com/docs/spinner)

Path: `plume/src/View/Components/Spinner.php`

### Properties
- `size` (string): Default: `md`.
- `style` (string): Default: `primary`.

---

## x-plume::table
A responsive table component.

Documentation: [https://plume.dennisokon.com/docs/table](https://plume.dennisokon.com/docs/table)

Path: `plume/src/View/Components/Table/Table.php`

### Properties
- `striped` (boolean): Default: `false`.
- `hoverable` (boolean): Default: `false`.
- `density` (string): Default: `default`.
- `stickyHeader` (boolean): Default: `false`.

---

## x-plume::tabs
A set of layered sections of content displayed one at a time.

Documentation: [https://plume.dennisokon.com/docs/tabs](https://plume.dennisokon.com/docs/tabs)

Path: `plume/src/View/Components/Tabs/Tabs.php`

### Properties
- `default` (string): Default: `1`.
- `side` (string): Default: `top`.

---

## x-plume::toaster
A succinct message that is displayed temporarily.

Documentation: [https://plume.dennisokon.com/docs/toaster](https://plume.dennisokon.com/docs/toaster)

Path: `plume/src/View/Components/Toaster.php`

### Properties
- `position` (string): Default: `bottom-right`.

---

## x-plume::tooltip
A popup that displays information related to an element on hover.

Documentation: [https://plume.dennisokon.com/docs/tooltip](https://plume.dennisokon.com/docs/tooltip)

Path: `plume/src/View/Components/Tooltip.php`

### Properties
- `text` (string): Required.
- `position` (string): Default: `top`.

---

## x-plume::video
A styled wrapper for HTML5 video, YouTube, and Vimeo content.

Documentation: [https://plume.dennisokon.com/docs/video](https://plume.dennisokon.com/docs/video)

Path: `plume/src/View/Components/Video.php`

### Properties
- `src` (string): Required.
- `poster` (string): Default: `null`.
- `autoplay` (boolean): Default: `false`.
- `controls` (boolean): Default: `true`.
- `loop` (boolean): Default: `false`.
- `muted` (boolean): Default: `false`.
- `aspect` (string): Default: `video`.