# Plume UI Components Reference

Base URL: [https://plume.dennisokon.com](https://plume.dennisokon.com)

## x-plume::accordion
Collapsible content panels for saving vertical space.

Documentation: [https://plume.dennisokon.com/docs/accordion](https://plume.dennisokon.com/docs/accordion)

Path: `plume/resources/views/components/accordion/index.blade.php`

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

Path: `plume/resources/views/components/accordion/item.blade.php`

### Properties
- `id` (string): Default: `\Illuminate\Support\Str::random(8)`.
- `open` (boolean): Default: `false`.

### Usage
```blade
<x-plume::accordion.item title="Heading">
    Content...
</x-plume::accordion.item>
```

---

## x-plume::alert-dialog
Modal dialog specifically designed for alerting users to important information or actions.

Documentation: [https://plume.dennisokon.com/docs/alert-dialog](https://plume.dennisokon.com/docs/alert-dialog)

Path: `plume/resources/views/components/alert-dialog/index.blade.php`

### Properties
- `name` (string): Default: `alert-dialog`.
- `show` (boolean): Default: `false`.
- `maxWidth` (string): Default: `2xl`.
- `action` (string): Default: `Confirm`.
- `withCancel` (boolean): Default: `true`.
- `onConfirm` (string): Default: ``.

### Usage
```blade
<x-plume::alert-dialog name="confirm" title="Are you sure?" action="Delete" onConfirm="deleteUser()">
    This action cannot be undone.
</x-plume::alert-dialog>
```

---

## x-plume::alert
Displays a callout for user attention.

Documentation: [https://plume.dennisokon.com/docs/alert](https://plume.dennisokon.com/docs/alert)

Path: `plume/resources/views/components/alert.blade.php`

### Properties
- `icon` (any): Default: `null`.
- `style` (string): Default: `info`.
- `closable` (boolean): Default: `false`.
- `autoclose` (any): Default: `null`.
- `title` (any): Default: `null`.
- `onClose` (any): Default: `null`.

### Usage
```blade
<x-plume::alert style="success" title="Success" closable autoclose="3000">
    Your changes have been saved.
</x-plume::alert>
```

---

## x-plume::aspect
A container component to maintain consistent proportions for media and content.

Documentation: [https://plume.dennisokon.com/docs/aspect](https://plume.dennisokon.com/docs/aspect)

Path: `plume/resources/views/components/aspect.blade.php`

### Properties
- `ratio` (string): Default: `video`.

---

## x-plume::audio
A styled wrapper for HTML5 audio content.

Documentation: [https://plume.dennisokon.com/docs/audio](https://plume.dennisokon.com/docs/audio)

Path: `plume/resources/views/components/audio.blade.php`

### Properties
- `autoplay` (boolean): Default: `false`.
- `controls` (boolean): Default: `true`.
- `loop` (boolean): Default: `false`.
- `muted` (boolean): Default: `false`.

---

## x-plume::avatar
An image element with a fallback for representing the user.

Documentation: [https://plume.dennisokon.com/docs/avatar](https://plume.dennisokon.com/docs/avatar)

Path: `plume/resources/views/components/avatar.blade.php`

### Properties
- `src` (any): Default: `null`.
- `alt` (string): Default: ``.
- `fallback` (string): Default: ``.
- `size` (string): Default: `md`.
- `status` (any): Default: `null`.

### Usage
```blade
<x-plume::avatar 
    src="https://github.com/shadcn.png" 
    alt="
```

---

## x-plume::badge
Displays a badge or a component that looks like a badge.

Documentation: [https://plume.dennisokon.com/docs/badge](https://plume.dennisokon.com/docs/badge)

Path: `plume/resources/views/components/badge.blade.php`

### Properties
- `style` (string): Default: `default`.

### Usage
```blade
<x-plume::badge style="secondary">
    New Feature
</x-plume::badge>
```

---

## x-plume::breadcrumb
Displays the path to the current resource using a hierarchy of links.

Documentation: [https://plume.dennisokon.com/docs/breadcrumb](https://plume.dennisokon.com/docs/breadcrumb)

Path: `plume/resources/views/components/breadcrumb/index.blade.php`

---

## x-plume::breadcrumb.item
No description provided.

Documentation: [https://plume.dennisokon.com/docs/breadcrumb-item](https://plume.dennisokon.com/docs/breadcrumb-item)

Path: `plume/resources/views/components/breadcrumb/item.blade.php`

### Properties
- `href` (any): Default: `null`.
- `active` (boolean): Default: `false`.

---

## x-plume::breadcrumb.separator
No description provided.

Documentation: [https://plume.dennisokon.com/docs/breadcrumb-separator](https://plume.dennisokon.com/docs/breadcrumb-separator)

Path: `plume/resources/views/components/breadcrumb/separator.blade.php`

---

## x-plume::button
Displays a button or a component that looks like a button.

Documentation: [https://plume.dennisokon.com/docs/button](https://plume.dennisokon.com/docs/button)

Path: `plume/resources/views/components/button/index.blade.php`

### Properties
- `href` (any): Default: `null`.
- `icon` (any): Default: `null`.
- `fullWidth` (boolean): Default: `false`.

---

## x-plume::button-group
No description provided.

Documentation: [https://plume.dennisokon.com/docs/button-group](https://plume.dennisokon.com/docs/button-group)

Path: `plume/resources/views/components/button-group.blade.php`

### Properties
- `size` (string): Default: `md`.
- `stack` (boolean): Default: `true`.

---

## x-plume::button.loader
Button with built-in loading state management.

Documentation: [https://plume.dennisokon.com/docs/button-loader](https://plume.dennisokon.com/docs/button-loader)

Path: `plume/resources/views/components/button/loader.blade.php`

### Properties
- `size` (string): Default: `md`.
- `style` (any): Default: `null`.

---

## x-plume::button.toggle
Button that toggles between two states.

Documentation: [https://plume.dennisokon.com/docs/button-toggle](https://plume.dennisokon.com/docs/button-toggle)

Path: `plume/resources/views/components/button/toggle.blade.php`

### Properties
- `size` (string): Default: `md`.
- `style` (any): Default: `null`.
- `offStyle` (any): Default: `null`.
- `on` (any): Default: `null`.
- `off` (any): Default: `null`.
- `click` (any): Default: `null`.

---

## x-plume::calendar
A visual calendar interface for selecting dates.

Documentation: [https://plume.dennisokon.com/docs/calendar](https://plume.dennisokon.com/docs/calendar)

Path: `plume/resources/views/components/calendar.blade.php`

### Properties
- `model` (string): Default: `null`.
- `value` (string): Default: `null`.
- `mode` (string): Default: `single`.
- `min` (string): Default: `null`.
- `max` (string): Default: `null`.

### Usage
```blade
<x-plume::calendar />
```

---

## x-plume::card


Documentation: [https://plume.dennisokon.com/docs/card](https://plume.dennisokon.com/docs/card)

Path: `plume/resources/views/components/card/index.blade.php`

### Usage
```blade
<x-plume::card>
    <x-plume::card.header>
        <x-plume::card.title>Title</x-plume::card.title>
        <x-plume::card.description>Description</x-plume::card.description>
    </x-plume::card.header>
    <x-plume::card.content>Content</x-plume::card.content>
    <x-plume::card.footer>Footer</x-plume::card.footer>
</x-plume::card>
```

---

## x-plume::card.content
No description provided.

Documentation: [https://plume.dennisokon.com/docs/card-content](https://plume.dennisokon.com/docs/card-content)

Path: `plume/resources/views/components/card/content.blade.php`

---

## x-plume::card.description
No description provided.

Documentation: [https://plume.dennisokon.com/docs/card-description](https://plume.dennisokon.com/docs/card-description)

Path: `plume/resources/views/components/card/description.blade.php`

---

## x-plume::card.footer
No description provided.

Documentation: [https://plume.dennisokon.com/docs/card-footer](https://plume.dennisokon.com/docs/card-footer)

Path: `plume/resources/views/components/card/footer.blade.php`

---

## x-plume::card.header
No description provided.

Documentation: [https://plume.dennisokon.com/docs/card-header](https://plume.dennisokon.com/docs/card-header)

Path: `plume/resources/views/components/card/header.blade.php`

---

## x-plume::card.title
No description provided.

Documentation: [https://plume.dennisokon.com/docs/card-title](https://plume.dennisokon.com/docs/card-title)

Path: `plume/resources/views/components/card/title.blade.php`

---

## x-plume::carousel
A slideshow component for cycling through elements.

Documentation: [https://plume.dennisokon.com/docs/carousel](https://plume.dennisokon.com/docs/carousel)

Path: `plume/resources/views/components/carousel/index.blade.php`

### Properties
- `controls` (boolean): Default: `true`.
- `indicators` (boolean): Default: `false`.
- `autoplay` (boolean): Default: `false`.
- `interval` (number): Default: `5000`.

### Usage
```blade
<x-plume::carousel indicators>
    <x-plume::carousel.item>Slide 1</x-plume::carousel.item>
    <x-plume::carousel.item>Slide 2</x-plume::carousel.item>
</x-plume::carousel>
```

---

## x-plume::carousel.item
An individual slide within a carousel.

Documentation: [https://plume.dennisokon.com/docs/carousel](https://plume.dennisokon.com/docs/carousel)

Path: `plume/resources/views/components/carousel/item.blade.php`

### Usage
```blade
<x-plume::carousel.item>
    <img src="..." alt="...">
</x-plume::carousel.item>
```

---

## x-plume::chart
Basic chart component for data visualization (bar, line).

Documentation: [https://plume.dennisokon.com/docs/chart](https://plume.dennisokon.com/docs/chart)

Path: `plume/resources/views/components/chart/index.blade.php`

### Properties
- `type` (string): Default: `bar`.
- `data` (array): Default: `[]`.
- `height` (number): Default: `200`.
- `color` (string): Default: `text-primary`.

### Usage
```blade
<x-plume::chart type="bar" :data="['A'=>10, 'B'=>20]" />
```

---

## x-plume::code
A component for displaying code snippets with a copy-to-clipboard feature.

Documentation: [https://plume.dennisokon.com/docs/code](https://plume.dennisokon.com/docs/code)

Path: `plume/resources/views/components/code.blade.php`

### Properties
- `language` (any): Default: `null`.
- `title` (any): Default: `null`.
- `code` (any): Default: `null`.

---

## x-plume::command
A powerful search and action interface accessible via keyboard shortcuts.

Documentation: [https://plume.dennisokon.com/docs/command](https://plume.dennisokon.com/docs/command)

Path: `plume/resources/views/components/command/index.blade.php`

### Properties
- `placeholder` (string): Default: `Type a command or search...`.
- `id` (string): Default: `\Illuminate\Support\Str::random(8)`.

---

## x-plume::command.group
No description provided.

Documentation: [https://plume.dennisokon.com/docs/command-group](https://plume.dennisokon.com/docs/command-group)

Path: `plume/resources/views/components/command/group.blade.php`

### Properties
- `title` (any): Default: `null`.

---

## x-plume::command.item
No description provided.

Documentation: [https://plume.dennisokon.com/docs/command-item](https://plume.dennisokon.com/docs/command-item)

Path: `plume/resources/views/components/command/item.blade.php`

### Properties
- `icon` (any): Default: `null`.
- `shortcut` (any): Default: `null`.

---

## x-plume::data-table
Advanced table with sorting, filtering, and pagination. Powered by AlpineJS.

Documentation: [https://plume.dennisokon.com/docs/data-table](https://plume.dennisokon.com/docs/data-table)

Path: `plume/resources/views/components/data-table/index.blade.php`

### Properties
- `data` (array): Default: `[]`.
- `columns` (array): Default: `[]`.
- `searchable` (boolean): Default: `false`.
- `paginated` (boolean): Default: `false`.
- `perPage` (number): Default: `10`.
- `sortable` (boolean): Default: `true`.

### Usage
```blade
<x-plume::data-table 
    :data="$users" 
    :columns="[
        ['key' => 'id', 'label' => 'ID', 'sortable' => true],
        ['key' => 'name', 'label' => 'Name', 'sortable' => true],
    ]" 
    searchable 
    paginated 
/>
```

---

## x-plume::divider
Visually separates content sections with an optional label.

Documentation: [https://plume.dennisokon.com/docs/divider](https://plume.dennisokon.com/docs/divider)

Path: `plume/resources/views/components/divider.blade.php`

### Properties
- `label` (any): Default: `null`.

---

## x-plume::drawer
A panel that slides in from the edge of the screen.

Documentation: [https://plume.dennisokon.com/docs/drawer](https://plume.dennisokon.com/docs/drawer)

Path: `plume/resources/views/components/drawer/index.blade.php`

### Properties
- `show` (boolean): Default: `false`.
- `side` (string): Default: `right`.

---

## x-plume::drawer.content
No description provided.

Documentation: [https://plume.dennisokon.com/docs/drawer-content](https://plume.dennisokon.com/docs/drawer-content)

Path: `plume/resources/views/components/drawer/content.blade.php`

---

## x-plume::drawer.description
No description provided.

Documentation: [https://plume.dennisokon.com/docs/drawer-description](https://plume.dennisokon.com/docs/drawer-description)

Path: `plume/resources/views/components/drawer/description.blade.php`

---

## x-plume::drawer.footer
No description provided.

Documentation: [https://plume.dennisokon.com/docs/drawer-footer](https://plume.dennisokon.com/docs/drawer-footer)

Path: `plume/resources/views/components/drawer/footer.blade.php`

---

## x-plume::drawer.header
No description provided.

Documentation: [https://plume.dennisokon.com/docs/drawer-header](https://plume.dennisokon.com/docs/drawer-header)

Path: `plume/resources/views/components/drawer/header.blade.php`

---

## x-plume::drawer.title
No description provided.

Documentation: [https://plume.dennisokon.com/docs/drawer-title](https://plume.dennisokon.com/docs/drawer-title)

Path: `plume/resources/views/components/drawer/title.blade.php`

---

## x-plume::dropdown
Displays a menu to the user—such as a set of actions or functions—triggered by a button.

Documentation: [https://plume.dennisokon.com/docs/dropdown](https://plume.dennisokon.com/docs/dropdown)

Path: `plume/resources/views/components/dropdown/index.blade.php`

### Properties
- `align` (string): Default: `right`.
- `width` (string): Default: `md`.
- `contentClasses` (string): Default: `bg-background dark:bg-background-800`.

---

## x-plume::dropdown.item
No description provided.

Documentation: [https://plume.dennisokon.com/docs/dropdown-item](https://plume.dennisokon.com/docs/dropdown-item)

Path: `plume/resources/views/components/dropdown/item.blade.php`

### Properties
- `style` (string): Default: `ghost`.

---

## x-plume::dropdown.separator
No description provided.

Documentation: [https://plume.dennisokon.com/docs/dropdown-separator](https://plume.dennisokon.com/docs/dropdown-separator)

Path: `plume/resources/views/components/dropdown/separator.blade.php`

---

## x-plume::empty-state
Use this component to show a placeholder when a list or page has no data.

Documentation: [https://plume.dennisokon.com/docs/empty-state](https://plume.dennisokon.com/docs/empty-state)

Path: `plume/resources/views/components/empty-state.blade.php`

### Properties
- `title` (string): Default: `No results found`.
- `description` (any): Default: `null`.
- `icon` (string): Default: `icon-[fluent--search-info-24-regular]`.

### Usage
```blade
<x-plume::empty-state 
    title="No items found" 
    description="Get started by creating your first item."
/>
```

---

## x-plume::figure
Enhanced image component with captions, aspect ratio control, and support for modern formats.

Documentation: [https://plume.dennisokon.com/docs/figure](https://plume.dennisokon.com/docs/figure)

Path: `plume/resources/views/components/figure.blade.php`

### Properties
- `alt` (string): Default: ``.
- `caption` (any): Default: `null`.
- `aspect` (any): Default: `null`.
- `srcset` (string): Default: `null`.
- `sizes` (string): Default: `null`.

---

## x-plume::form
A collection of form components for user input.

Documentation: [https://plume.dennisokon.com/docs/form](https://plume.dennisokon.com/docs/form)

Path: `plume/resources/views/components/form/index.blade.php`

### Properties
- `action` (string): Default: ``.
- `method` (string): Default: `POST`.
- `formData` (any): Default: `null`.

---

## x-plume::form.actions
No description provided.

Documentation: [https://plume.dennisokon.com/docs/form-actions](https://plume.dennisokon.com/docs/form-actions)

Path: `plume/resources/views/components/form/actions.blade.php`

---

## x-plume::form.checkbox
Checkbox input for binary choices.

Documentation: [https://plume.dennisokon.com/docs/form-checkbox](https://plume.dennisokon.com/docs/form-checkbox)

Path: `plume/resources/views/components/form/checkbox.blade.php`

### Properties
- `label` (any): Default: `null`.
- `id` (any): Default: `null`.
- `value` (string): Default: ``.

---

## x-plume::form.color
No description provided.

Documentation: [https://plume.dennisokon.com/docs/form-color](https://plume.dennisokon.com/docs/form-color)

Path: `plume/resources/views/components/form/color.blade.php`

### Properties
- `label` (any): Default: `null`.
- `name` (any): Default: `null`.
- `id` (any): Default: `null`.
- `model` (any): Default: `null`.
- `value` (string): Default: `#000000`.

---

## x-plume::form.combobox
Searchable dropdown for selecting from a list of options.

Documentation: [https://plume.dennisokon.com/docs/form-combobox](https://plume.dennisokon.com/docs/form-combobox)

Path: `plume/resources/views/components/form/combobox.blade.php`

### Properties
- `label` (any): Default: `null`.
- `name` (any): Default: `null`.
- `id` (any): Default: `null`.
- `model` (any): Default: `null`.
- `placeholder` (string): Default: `Select an option...`.
- `options` (array): Default: `[]`.
- `emptyMessage` (string): Default: `No results found.`.

---

## x-plume::form.date
Date, time, and datetime inputs.

Documentation: [https://plume.dennisokon.com/docs/form-date](https://plume.dennisokon.com/docs/form-date)

Path: `plume/resources/views/components/form/date.blade.php`

### Properties
- `label` (any): Default: `null`.
- `name` (any): Default: `null`.
- `id` (any): Default: `null`.
- `model` (any): Default: `null`.
- `value` (string): Default: ``.

---

## x-plume::form.datetime
No description provided.

Documentation: [https://plume.dennisokon.com/docs/form-datetime](https://plume.dennisokon.com/docs/form-datetime)

Path: `plume/resources/views/components/form/datetime.blade.php`

### Properties
- `label` (any): Default: `null`.
- `name` (any): Default: `null`.
- `id` (any): Default: `null`.
- `model` (any): Default: `null`.
- `value` (string): Default: ``.

---

## x-plume::form.element
No description provided.

Documentation: [https://plume.dennisokon.com/docs/form-element](https://plume.dennisokon.com/docs/form-element)

Path: `plume/resources/views/components/form/element.blade.php`

### Properties
- `label` (string): Default: ``.
- `name` (any): Default: `null`.
- `id` (any): Default: `null`.
- `model` (any): Default: `null`.
- `after` (any): Default: `null`.

---

## x-plume::form.file
Input field for file uploads.

Documentation: [https://plume.dennisokon.com/docs/form-file](https://plume.dennisokon.com/docs/form-file)

Path: `plume/resources/views/components/form/file.blade.php`

### Properties
- `label` (any): Default: `null`.
- `name` (any): Default: `null`.
- `id` (any): Default: `null`.
- `model` (any): Default: `null`.
- `helpText` (string): Default: `PNG`.

---

## x-plume::form.group
No description provided.

Documentation: [https://plume.dennisokon.com/docs/form-group](https://plume.dennisokon.com/docs/form-group)

Path: `plume/resources/views/components/form/group.blade.php`

### Properties
- `label` (any): Default: `null`.
- `description` (string): Default: ``.
- `name` (any): Default: `null`.
- `model` (any): Default: `null`.
- `minCols` (number): Default: `1`.
- `maxCols` (any): Default: `null`.

---

## x-plume::form.inline
No description provided.

Documentation: [https://plume.dennisokon.com/docs/form-inline](https://plume.dennisokon.com/docs/form-inline)

Path: `plume/resources/views/components/form/inline.blade.php`

---

## x-plume::form.input
Standard text input fields, including password and number variants.

Documentation: [https://plume.dennisokon.com/docs/form-input](https://plume.dennisokon.com/docs/form-input)

Path: `plume/resources/views/components/form/input.blade.php`

### Properties
- `label` (any): Default: `null`.
- `name` (any): Default: `null`.
- `id` (any): Default: `null`.
- `type` (string): Default: `text`.
- `model` (any): Default: `null`.
- `value` (string): Default: ``.
- `placeholder` (string): Default: ``.
- `icon` (any): Default: `null`.
- `after` (any): Default: `null`.

---

## x-plume::form.label
Reusable form label component.

Documentation: [https://plume.dennisokon.com/docs/form-label](https://plume.dennisokon.com/docs/form-label)

Path: `plume/resources/views/components/form/label.blade.php`

### Properties
- `for` (string): Default: `null`.
- `required` (boolean): Default: `false`.

### Usage
```blade
<x-plume::form.label for="email">Email</x-plume::form.label>
```

---

## x-plume::form.number
No description provided.

Documentation: [https://plume.dennisokon.com/docs/form-number](https://plume.dennisokon.com/docs/form-number)

Path: `plume/resources/views/components/form/number.blade.php`

### Properties
- `label` (any): Default: `null`.
- `name` (any): Default: `null`.
- `id` (any): Default: `null`.
- `model` (any): Default: `null`.
- `value` (number): Default: `0`.
- `min` (number): Default: `0`.
- `max` (number): Default: `100`.
- `step` (number): Default: `1`.
- `after` (any): Default: `null`.

---

## x-plume::form.password
No description provided.

Documentation: [https://plume.dennisokon.com/docs/form-password](https://plume.dennisokon.com/docs/form-password)

Path: `plume/resources/views/components/form/password.blade.php`

### Properties
- `label` (any): Default: `null`.
- `name` (any): Default: `null`.
- `id` (any): Default: `null`.
- `model` (any): Default: `null`.
- `after` (any): Default: `null`.

---

## x-plume::form.radio
Radio buttons for selecting a single option from a set.

Documentation: [https://plume.dennisokon.com/docs/form-radio](https://plume.dennisokon.com/docs/form-radio)

Path: `plume/resources/views/components/form/radio.blade.php`

### Properties
- `label` (any): Default: `null`.
- `id` (any): Default: `null`.
- `value` (string): Default: ``.

---

## x-plume::form.range
No description provided.

Documentation: [https://plume.dennisokon.com/docs/form-range](https://plume.dennisokon.com/docs/form-range)

Path: `plume/resources/views/components/form/range.blade.php`

### Properties
- `label` (any): Default: `null`.
- `name` (any): Default: `null`.
- `id` (any): Default: `null`.
- `model` (any): Default: `null`.
- `min` (number): Default: `0`.
- `max` (number): Default: `100`.
- `step` (number): Default: `1`.
- `value` (any): Default: `null`.

---

## x-plume::form.section
No description provided.

Documentation: [https://plume.dennisokon.com/docs/form-section](https://plume.dennisokon.com/docs/form-section)

Path: `plume/resources/views/components/form/section.blade.php`

### Properties
- `title` (any): Default: `null`.
- `description` (any): Default: `null`.
- `minCols` (number): Default: `1`.
- `maxCols` (any): Default: `null`.

---

## x-plume::form.select
Dropdown selection field.

Documentation: [https://plume.dennisokon.com/docs/form-select](https://plume.dennisokon.com/docs/form-select)

Path: `plume/resources/views/components/form/select.blade.php`

### Properties
- `label` (any): Default: `null`.
- `name` (any): Default: `null`.
- `id` (any): Default: `null`.
- `model` (any): Default: `null`.
- `after` (any): Default: `null`.

---

## x-plume::form.textarea
Multi-line text input field.

Documentation: [https://plume.dennisokon.com/docs/form-textarea](https://plume.dennisokon.com/docs/form-textarea)

Path: `plume/resources/views/components/form/textarea.blade.php`

### Properties
- `label` (any): Default: `null`.
- `name` (any): Default: `null`.
- `id` (any): Default: `null`.
- `rows` (number): Default: `3`.
- `model` (any): Default: `null`.
- `placeholder` (string): Default: ``.
- `after` (any): Default: `null`.

---

## x-plume::form.time
No description provided.

Documentation: [https://plume.dennisokon.com/docs/form-time](https://plume.dennisokon.com/docs/form-time)

Path: `plume/resources/views/components/form/time.blade.php`

### Properties
- `label` (any): Default: `null`.
- `name` (any): Default: `null`.
- `id` (any): Default: `null`.
- `model` (any): Default: `null`.
- `value` (string): Default: ``.

---

## x-plume::form.toggle
Switch toggle for binary states.

Documentation: [https://plume.dennisokon.com/docs/form-toggle](https://plume.dennisokon.com/docs/form-toggle)

Path: `plume/resources/views/components/form/toggle.blade.php`

### Properties
- `label` (any): Default: `null`.
- `name` (any): Default: `null`.
- `id` (any): Default: `null`.
- `model` (any): Default: `null`.
- `value` (number): Default: `1`.
- `checked` (boolean): Default: `false`.

---

## x-plume::gallery
Responsive grid layout for images and figures.

Documentation: [https://plume.dennisokon.com/docs/gallery](https://plume.dennisokon.com/docs/gallery)

Path: `plume/resources/views/components/gallery.blade.php`

### Properties
- `cols` (number): Default: `3`.
- `gap` (number): Default: `4`.

---

## x-plume::icon
Renders an Iconify icon.

Documentation: [https://plume.dennisokon.com/docs/icon](https://plume.dennisokon.com/docs/icon)

Path: `plume/resources/views/components/icon.blade.php`

---

## x-plume::kbd
A component for displaying keyboard keys or shortcuts.

Documentation: [https://plume.dennisokon.com/docs/kbd](https://plume.dennisokon.com/docs/kbd)

Path: `plume/resources/views/components/kbd.blade.php`

### Properties
- `size` (string): Default: `md`.

### Usage
```blade
<x-plume::kbd>Ctrl</x-plume::kbd>
```

---

## x-plume::modal
A dialog box or popup window that is displayed on top of the current page.

Documentation: [https://plume.dennisokon.com/docs/modal](https://plume.dennisokon.com/docs/modal)

Path: `plume/resources/views/components/modal/index.blade.php`

### Properties
- `name` (any): Default: `null`.
- `show` (boolean): Default: `false`.
- `maxWidth` (string): Default: `2xl`.
- `title` (any): Default: `null`.
- `footer` (any): Default: `null`.
- `header` (any): Default: `null`.

---

## x-plume::navbar
A top-level navigation component for site-wide links and actions.

Documentation: [https://plume.dennisokon.com/docs/navbar](https://plume.dennisokon.com/docs/navbar)

Path: `plume/resources/views/components/navbar/index.blade.php`

### Usage
```blade
<x-plume::navbar>
    <x-plume::navbar.logo>Logo</x-plume::navbar.logo>
    <x-plume::navbar.menu>
        <x-plume::navbar.item>Item</x-plume::navbar.item>
    </x-plume::navbar.menu>
    <x-plume::navbar.mobile-toggle />
</x-plume::navbar>
```

---

## x-plume::navbar.logo
The brand logo or title.

Documentation: [https://plume.dennisokon.com/docs/navbar](https://plume.dennisokon.com/docs/navbar)

Path: `plume/resources/views/components/navbar/logo.blade.php`

---

## x-plume::navbar.menu
Container for navigation items.

Documentation: [https://plume.dennisokon.com/docs/navbar](https://plume.dennisokon.com/docs/navbar)

Path: `plume/resources/views/components/navbar/menu.blade.php`

---

## x-plume::navbar.item
Individual navigation link.

Documentation: [https://plume.dennisokon.com/docs/navbar](https://plume.dennisokon.com/docs/navbar)

Path: `plume/resources/views/components/navbar/item.blade.php`

### Properties
- `active` (boolean): Default: `false`.
- `href` (string): Default: `#`.

---

## x-plume::navbar.mobile-toggle
Toggle button for the mobile menu.

Documentation: [https://plume.dennisokon.com/docs/navbar](https://plume.dennisokon.com/docs/navbar)

Path: `plume/resources/views/components/navbar/mobile-toggle.blade.php`

---

## x-plume::navbar.mobile-menu
Responsive mobile menu container.

Documentation: [https://plume.dennisokon.com/docs/navbar](https://plume.dennisokon.com/docs/navbar)

Path: `plume/resources/views/components/navbar/mobile-menu.blade.php`

---

## x-plume::navbar.mobile-item
Individual navigation link for mobile menu.

Documentation: [https://plume.dennisokon.com/docs/navbar](https://plume.dennisokon.com/docs/navbar)

Path: `plume/resources/views/components/navbar/mobile-item.blade.php`

### Properties
- `active` (boolean): Default: `false`.
- `href` (string): Default: `#`.

---

## x-plume::pagination
Displays a sequence of links for navigating through a series of related pages. Powered by AlpineJS.

Documentation: [https://plume.dennisokon.com/docs/pagination](https://plume.dennisokon.com/docs/pagination)

Path: `plume/resources/views/components/pagination.blade.php`

### Properties
- `total` (number): Default: `1`.
- `current` (number): Default: `1`.
- `onEachSide` (number): Default: `1`.

### Usage
```blade
<x-plume::pagination :total="10" :current="1"
```

---

## x-plume::popover
Displays rich content in a portal, triggered by a button.

Documentation: [https://plume.dennisokon.com/docs/popover](https://plume.dennisokon.com/docs/popover)

Path: `plume/resources/views/components/popover/index.blade.php`

### Properties
- `position` (string): Default: `bottom`.
- `align` (string): Default: `center`.

### Usage
```blade
<x-plume::popover>
    <x-plume::popover.trigger>Open</x-plume::popover.trigger>
    <x-plume::popover.content>Content</x-plume::popover.content>
</x-plume::popover>
```

---

## x-plume::popover.trigger
The element that triggers the popover.

Documentation: [https://plume.dennisokon.com/docs/popover](https://plume.dennisokon.com/docs/popover)

Path: `plume/resources/views/components/popover/trigger.blade.php`

---

## x-plume::popover.content
The content displayed within the popover.

Documentation: [https://plume.dennisokon.com/docs/popover](https://plume.dennisokon.com/docs/popover)

Path: `plume/resources/views/components/popover/content.blade.php`

---

## x-plume::progress
Displays an indicator showing the completion progress of a task, typically displayed as a progress bar.

Documentation: [https://plume.dennisokon.com/docs/progress](https://plume.dennisokon.com/docs/progress)

Path: `plume/resources/views/components/progress/index.blade.php`

### Properties
- `value` (number): Default: `0`.
- `max` (number): Default: `100`.
- `style` (string): Default: `default`.
- `title` (any): Default: `null`.
- `model` (any): Default: `null`.
- `display` (string): Default: `percentage`.

---

## x-plume::progress.percent
No description provided.

Documentation: [https://plume.dennisokon.com/docs/progress-percent](https://plume.dennisokon.com/docs/progress-percent)

Path: `plume/resources/views/components/progress/percent.blade.php`

### Properties
- `value` (number): Default: `0`.
- `title` (any): Default: `null`.
- `model` (any): Default: `null`.
- `style` (string): Default: `default`.

---

## x-plume::search
Styled search input with an integrated results dropdown.

Documentation: [https://plume.dennisokon.com/docs/search](https://plume.dennisokon.com/docs/search)

Path: `plume/resources/views/components/search/index.blade.php`

### Properties
- `placeholder` (string): Default: `Search...`.
- `model` (any): Default: `null`.

---

## x-plume::search.result
No description provided.

Documentation: [https://plume.dennisokon.com/docs/search-result](https://plume.dennisokon.com/docs/search-result)

Path: `plume/resources/views/components/search/result.blade.php`

### Properties
- `href` (string): Default: `#`.
- `icon` (any): Default: `null`.

---

## x-plume::skeleton
No description provided.

Documentation: [https://plume.dennisokon.com/docs/skeleton](https://plume.dennisokon.com/docs/skeleton)

Path: `plume/resources/views/components/skeleton.blade.php`

### Properties
- `shape` (string): Default: `rect`.
- `animation` (string): Default: `pulse`.

---

## x-plume::spacer
A utility component that fills available space in a flex container.

Documentation: [https://plume.dennisokon.com/docs/spacer](https://plume.dennisokon.com/docs/spacer)

Path: `plume/resources/views/components/spacer.blade.php`

---

## x-plume::spinner
A standalone loading indicator.

Documentation: [https://plume.dennisokon.com/docs/spinner](https://plume.dennisokon.com/docs/spinner)

Path: `plume/resources/views/components/spinner.blade.php`

### Properties
- `size` (string): Default: `md`.
- `style` (string): Default: `primary`.

### Usage
```blade
<x-plume::spinner size="lg" style="secondary" />
```

---

## x-plume::stepper
Guide users through multi-step processes.

Documentation: [https://plume.dennisokon.com/docs/stepper](https://plume.dennisokon.com/docs/stepper)

Path: `plume/resources/views/components/stepper/index.blade.php`

### Properties
- `active` (number): Default: `1`.

### Usage
```blade
<x-plume::stepper :active="1">
    <x-plume::stepper.step step="1" title="Account" next />
    <x-plume::stepper.step step="2" title="Profile" prev />
</x-plume::stepper>
```

---

## x-plume::stepper.actions
Standard actions layout for stepper components.

Documentation: [https://plume.dennisokon.com/docs/stepper-actions](https://plume.dennisokon.com/docs/stepper-actions)

Path: `plume/resources/views/components/stepper/actions.blade.php`

### Properties
- `prev` (any): Default: `null`.
- `next` (any): Default: `null`.

### Usage
```blade
<x-plume::stepper.actions prev="Back" next="Continue" />
```

---

## x-plume::stepper.step
An individual step within a stepper component.

Documentation: [https://plume.dennisokon.com/docs/stepper-step](https://plume.dennisokon.com/docs/stepper-step)

Path: `plume/resources/views/components/stepper/step.blade.php`

### Properties
- `title` (any): Default: `null`.
- `description` (any): Default: `null`.
- `prev` (any): Default: `null`.
- `next` (any): Default: `null`.

### Usage
```blade
<x-plume::stepper.step step="1" title="Initial Step" next="Continue">
    <p>Step content goes here...</p>
</x-plume::stepper.step>
```

---

## x-plume::table
A responsive table component.

Documentation: [https://plume.dennisokon.com/docs/table](https://plume.dennisokon.com/docs/table)

Path: `plume/resources/views/components/table/index.blade.php`

### Properties
- `striped` (boolean): Default: `false`.
- `hoverable` (boolean): Default: `false`.
- `density` (string): Default: `default`.
- `stickyHeader` (boolean): Default: `false`.

---

## x-plume::table.body
No description provided.

Documentation: [https://plume.dennisokon.com/docs/table-body](https://plume.dennisokon.com/docs/table-body)

Path: `plume/resources/views/components/table/body.blade.php`

---

## x-plume::table.cell
No description provided.

Documentation: [https://plume.dennisokon.com/docs/table-cell](https://plume.dennisokon.com/docs/table-cell)

Path: `plume/resources/views/components/table/cell.blade.php`

### Properties
- `align` (string): Default: `left`.

---

## x-plume::table.head
No description provided.

Documentation: [https://plume.dennisokon.com/docs/table-head](https://plume.dennisokon.com/docs/table-head)

Path: `plume/resources/views/components/table/head.blade.php`

### Properties
- `align` (string): Default: `left`.

---

## x-plume::table.header
No description provided.

Documentation: [https://plume.dennisokon.com/docs/table-header](https://plume.dennisokon.com/docs/table-header)

Path: `plume/resources/views/components/table/header.blade.php`

### Properties
- `sticky` (boolean): Default: `false`.

---

## x-plume::table.row
No description provided.

Documentation: [https://plume.dennisokon.com/docs/table-row](https://plume.dennisokon.com/docs/table-row)

Path: `plume/resources/views/components/table/row.blade.php`

---

## x-plume::tabs
A set of layered sections of content, known as tab panels, that are displayed one at a time.

Documentation: [https://plume.dennisokon.com/docs/tabs](https://plume.dennisokon.com/docs/tabs)

Path: `plume/resources/views/components/tabs/index.blade.php`

### Properties
- `default` (number): Default: `1`.
- `side` (string): Default: `top`.

---

## x-plume::tabs.group
No description provided.

Documentation: [https://plume.dennisokon.com/docs/tabs-group](https://plume.dennisokon.com/docs/tabs-group)

Path: `plume/resources/views/components/tabs/group.blade.php`

---

## x-plume::tabs.item
No description provided.

Documentation: [https://plume.dennisokon.com/docs/tabs-item](https://plume.dennisokon.com/docs/tabs-item)

Path: `plume/resources/views/components/tabs/item.blade.php`

### Properties
- `for` (number): Default: `1`.

---

## x-plume::tabs.panel
No description provided.

Documentation: [https://plume.dennisokon.com/docs/tabs-panel](https://plume.dennisokon.com/docs/tabs-panel)

Path: `plume/resources/views/components/tabs/panel.blade.php`

### Properties
- `for` (number): Default: `1`.

---

## x-plume::toaster
A succinct message that is displayed temporarily.

Documentation: [https://plume.dennisokon.com/docs/toaster](https://plume.dennisokon.com/docs/toaster)

Path: `plume/resources/views/components/toaster.blade.php`

### Properties
- `position` (string): Default: `bottom-right`. Supported: `top-left`, `top-center`, `top-right`, `bottom-left`, `bottom-center`, `bottom-right`.

---

## x-plume::tooltip
A popup that displays information related to an element when the element receives keyboard focus or the mouse hovers over it.

Documentation: [https://plume.dennisokon.com/docs/tooltip](https://plume.dennisokon.com/docs/tooltip)

Path: `plume/resources/views/components/tooltip.blade.php`

### Properties
- `position` (string): Default: `top`.

---

## x-plume::video
A styled wrapper for HTML5 video, YouTube, and Vimeo content.

Documentation: [https://plume.dennisokon.com/docs/video](https://plume.dennisokon.com/docs/video)

Path: `plume/resources/views/components/video.blade.php`

### Properties
- `poster` (any): Default: `null`.
- `autoplay` (boolean): Default: `false`.
- `controls` (boolean): Default: `true`.
- `loop` (boolean): Default: `false`.
- `muted` (boolean): Default: `false`.
- `aspect` (string): Default: `video`.

---

