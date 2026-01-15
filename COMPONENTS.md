# Plume UI Components Reference

Base URL: [https://plume.dennisokon.com](https://plume.dennisokon.com)

## x-plume::empty-state
Documentation: [https://plume.dennisokon.com/docs/empty-state](https://plume.dennisokon.com/docs/empty-state)

Path: `plume/resources/views/components/empty-state.blade.php`

No props defined.

---

## x-plume::spacer
A utility component that fills available space in a flex container.

Documentation: [https://plume.dennisokon.com/docs/spacer](https://plume.dennisokon.com/docs/spacer)

Path: `plume/resources/views/components/spacer.blade.php`

No props defined.

### Usage
```blade
&lt;div class="flex"&gt;
    &lt;div&gt;Left&lt;/div&gt;
    &lt;x-plume::spacer /&gt;
    &lt;div&gt;Right&lt;/div&gt;
&lt;/div&gt;
```

---

## x-plume::spinner
A standalone loading indicator.

Documentation: [https://plume.dennisokon.com/docs/spinner](https://plume.dennisokon.com/docs/spinner)

Path: `plume/resources/views/components/spinner.blade.php`

No props defined.

### Usage
```blade
&lt;x-plume::spinner size="lg" style="secondary" /&gt;
```

---

## x-plume::badge
Displays a badge or a component that looks like a badge.

Documentation: [https://plume.dennisokon.com/docs/badge](https://plume.dennisokon.com/docs/badge)

Path: `plume/resources/views/components/badge.blade.php`

No props defined.

### Usage
```blade
&lt;x-plume::badge style="secondary"&gt;
    New Feature
&lt;/x-plume::badge&gt;
```

---

## x-plume::toaster
A succinct message that is displayed temporarily.

Documentation: [https://plume.dennisokon.com/docs/toast](https://plume.dennisokon.com/docs/toast)

Path: `plume/resources/views/components/toaster.blade.php`

No props defined.

---

## x-plume::gallery
Responsive grid layout for images and figures.

Documentation: [https://plume.dennisokon.com/docs/gallery](https://plume.dennisokon.com/docs/gallery)

Path: `plume/resources/views/components/gallery.blade.php`

No props defined.

### Usage
```blade
&lt;x-plume::gallery cols="3" gap="6"&gt;
    &lt;x-plume::figure src="..." /&gt;
    &lt;x-plume::figure src="..." /&gt;
    &lt;x-plume::figure src="..." /&gt;
&lt;/x-plume::gallery&gt;
```

---

## x-plume::code
A component for displaying code snippets with a copy-to-clipboard feature.

Documentation: [https://plume.dennisokon.com/docs/code](https://plume.dennisokon.com/docs/code)

Path: `plume/resources/views/components/code.blade.php`

No props defined.

### Usage
```blade
&lt;x-plume::code 
    title="welcome.blade.php" 
    language="blade"
&gt;
    &lt;h1&gt;Welcome&lt;/h1&gt;
&lt;/x-plume::code&gt;
```

---

## x-plume::icon
Renders an Iconify icon.

Documentation: [https://plume.dennisokon.com/docs/icon](https://plume.dennisokon.com/docs/icon)

Path: `plume/resources/views/components/icon.blade.php`

No props defined.

### Usage
```blade
&lt;x-plume::icon i="icon-[fluent--star-24-filled]" class="size-5 text-warning" /&gt;
```

---

## x-plume::video
A styled wrapper for HTML5 video content.

Documentation: [https://plume.dennisokon.com/docs/video](https://plume.dennisokon.com/docs/video)

Path: `plume/resources/views/components/video.blade.php`

No props defined.

### Usage
```blade
&lt;x-plume::video 
    src="/path/to/video.mp4" 
    poster="/path/to/poster.jpg" 
/&gt;
```

---

## x-plume::figure
Enhanced image component with captions and aspect ratio control.

Documentation: [https://plume.dennisokon.com/docs/figure](https://plume.dennisokon.com/docs/figure)

Path: `plume/resources/views/components/figure.blade.php`

No props defined.

### Usage
```blade
&lt;x-plume::figure 
    src="/path/to/image.jpg" 
    alt="Description" 
    aspect="video" 
    caption="Captured in 2024"
/&gt;
```

---

## x-plume::pagination
Displays a sequence of links for navigating through a series of related pages.

Documentation: [https://plume.dennisokon.com/docs/pagination](https://plume.dennisokon.com/docs/pagination)

Path: `plume/resources/views/components/pagination.blade.php`

No props defined.

### Usage
```blade
&lt;x-plume::pagination :total="10" :current="1" /&gt;
```

---

## x-plume::avatar
An image element with a fallback for representing the user.

Documentation: [https://plume.dennisokon.com/docs/avatar](https://plume.dennisokon.com/docs/avatar)

Path: `plume/resources/views/components/avatar.blade.php`

No props defined.

### Usage
```blade
&lt;x-plume::avatar 
    src="https://github.com/shadcn.png" 
    alt="@shadcn" 
    fallback="CN" 
    size="lg" 
/&gt;
```

---

## x-plume::audio
A styled wrapper for HTML5 audio content.

Documentation: [https://plume.dennisokon.com/docs/audio](https://plume.dennisokon.com/docs/audio)

Path: `plume/resources/views/components/audio.blade.php`

No props defined.

### Usage
```blade
&lt;x-plume::audio src="/path/to/audio.mp3" /&gt;
```

---

## x-plume::divider
Visually separates content sections with an optional label.

Documentation: [https://plume.dennisokon.com/docs/divider](https://plume.dennisokon.com/docs/divider)

Path: `plume/resources/views/components/divider.blade.php`

No props defined.

### Usage
```blade
&lt;!-- Basic --&gt;
&lt;x-plume::divider /&gt;

&lt;!-- With Label --&gt;
&lt;x-plume::divider label="Continue with" /&gt;

&lt;!-- With Icon --&gt;
&lt;x-plume::divider&gt;
    &lt;x-plume::icon i="icon-[fluent--star-24-filled]" /&gt;
&lt;/x-plume::divider&gt;
```

---

## x-plume::aspect
A container component to maintain consistent proportions for media and content.

Documentation: [https://plume.dennisokon.com/docs/aspect-ratio](https://plume.dennisokon.com/docs/aspect-ratio)

Path: `plume/resources/views/components/aspect.blade.php`

No props defined.

### Usage
```blade
&lt;x-plume::aspect ratio="square"&gt;
    &lt;img src="..." class="object-cover" /&gt;
&lt;/x-plume::aspect&gt;
```

---

## x-plume::tooltip
A popup that displays information related to an element when the element receives keyboard focus or the mouse hovers over it.

Documentation: [https://plume.dennisokon.com/docs/tooltip](https://plume.dennisokon.com/docs/tooltip)

Path: `plume/resources/views/components/tooltip.blade.php`

No props defined.

### Usage
```blade
&lt;x-plume::tooltip text="Helpful information" position="top"&gt;
    &lt;x-plume::button style="ghost" shape="round"&gt;
        &lt;x-plume::icon i="icon-[fluent--info-24-regular]" /&gt;
    &lt;/x-plume::button&gt;
&lt;/x-plume::tooltip&gt;
```

---

## x-plume::skeleton
Use to display a placeholder preview of your content before the data gets loaded to reduce cognitive load.

Documentation: [https://plume.dennisokon.com/docs/skeleton](https://plume.dennisokon.com/docs/skeleton)

Path: `plume/resources/views/components/skeleton.blade.php`

No props defined.

### Usage
```blade
&lt;div class="flex items-center space-x-4"&gt;
    &lt;x-plume::skeleton class="size-12 rounded-full" /&gt;
    &lt;div class="space-y-2"&gt;
        &lt;x-plume::skeleton class="h-4 w-[250px]" /&gt;
        &lt;x-plume::skeleton class="h-4 w-[200px]" /&gt;
    &lt;/div&gt;
&lt;/div&gt;
```

---

## x-plume::button-group
Documentation: [https://plume.dennisokon.com/docs/button-group](https://plume.dennisokon.com/docs/button-group)

Path: `plume/resources/views/components/button-group.blade.php`

No props defined.

---

## x-plume::alert
Displays a callout for user attention.

Documentation: [https://plume.dennisokon.com/docs/alert](https://plume.dennisokon.com/docs/alert)

Path: `plume/resources/views/components/alert.blade.php`

No props defined.

### Usage
```blade
&lt;x-plume::alert 
    style="success" 
    title="Success" 
    closable 
    autoclose="3000"
&gt;
    Your changes have been saved.
&lt;/x-plume::alert&gt;
```

---

## x-plume::command
A powerful search and action interface accessible via keyboard shortcuts.

Documentation: [https://plume.dennisokon.com/docs/command](https://plume.dennisokon.com/docs/command)

Path: `plume/resources/views/components/command/index.blade.php`

No props defined.

### Usage
```blade
&lt;x-plume::command&gt;
    &lt;x-plume::button&gt;Open&lt;/x-plume::button&gt;

    &lt;x-slot:content&gt;
        &lt;x-plume::command.group title="Group Title"&gt;
            &lt;x-plume::command.item icon="icon-..." shortcut="⌘K"&gt;
                Item Label
            &lt;/x-plume::command.item&gt;
        &lt;/x-plume::command.group&gt;
    &lt;/x-slot:content&gt;
&lt;/x-plume::command&gt;
```

---

## x-plume::command.group
Documentation: [https://plume.dennisokon.com/docs/command-group](https://plume.dennisokon.com/docs/command-group)

Path: `plume/resources/views/components/command/group.blade.php`

No props defined.

---

## x-plume::command.item
Documentation: [https://plume.dennisokon.com/docs/command-item](https://plume.dennisokon.com/docs/command-item)

Path: `plume/resources/views/components/command/item.blade.php`

No props defined.

---

## x-plume::card
Displays a card with header, content, and footer.

Documentation: [https://plume.dennisokon.com/docs/card](https://plume.dennisokon.com/docs/card)

Path: `plume/resources/views/components/card/index.blade.php`

No props defined.

### Usage
```blade
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
&lt;/x-plume::card&gt;
```

---

## x-plume::card.title
Documentation: [https://plume.dennisokon.com/docs/card-title](https://plume.dennisokon.com/docs/card-title)

Path: `plume/resources/views/components/card/title.blade.php`

No props defined.

---

## x-plume::card.content
Documentation: [https://plume.dennisokon.com/docs/card-content](https://plume.dennisokon.com/docs/card-content)

Path: `plume/resources/views/components/card/content.blade.php`

No props defined.

---

## x-plume::card.header
Documentation: [https://plume.dennisokon.com/docs/card-header](https://plume.dennisokon.com/docs/card-header)

Path: `plume/resources/views/components/card/header.blade.php`

No props defined.

---

## x-plume::card.description
Documentation: [https://plume.dennisokon.com/docs/card-description](https://plume.dennisokon.com/docs/card-description)

Path: `plume/resources/views/components/card/description.blade.php`

No props defined.

---

## x-plume::card.footer
Documentation: [https://plume.dennisokon.com/docs/card-footer](https://plume.dennisokon.com/docs/card-footer)

Path: `plume/resources/views/components/card/footer.blade.php`

No props defined.

---

## x-plume::tabs
A set of layered sections of content, known as tab panels, that are displayed one at a time.

Documentation: [https://plume.dennisokon.com/docs/tabs](https://plume.dennisokon.com/docs/tabs)

Path: `plume/resources/views/components/tabs/index.blade.php`

No props defined.

### Usage
```blade
&lt;x-plume::tabs default="profile" side="left"&gt;
    &lt;x-plume::tabs.group&gt;
        &lt;x-plume::tabs.item for="profile"&gt;Profile&lt;/x-plume::tabs.item&gt;
        &lt;x-plume::tabs.item for="settings"&gt;Settings&lt;/x-plume::tabs.item&gt;
    &lt;/x-plume::tabs.group&gt;

    &lt;x-plume::tabs.panel for="profile"&gt;
        Profile content...
    &lt;/x-plume::tabs.panel&gt;
    &lt;x-plume::tabs.panel for="settings"&gt;
        Settings content...
    &lt;/x-plume::tabs.panel&gt;
&lt;/x-plume::tabs&gt;
```

---

## x-plume::tabs.group
Documentation: [https://plume.dennisokon.com/docs/tabs-group](https://plume.dennisokon.com/docs/tabs-group)

Path: `plume/resources/views/components/tabs/group.blade.php`

No props defined.

---

## x-plume::tabs.item
Documentation: [https://plume.dennisokon.com/docs/tabs-item](https://plume.dennisokon.com/docs/tabs-item)

Path: `plume/resources/views/components/tabs/item.blade.php`

No props defined.

---

## x-plume::tabs.panel
Documentation: [https://plume.dennisokon.com/docs/tabs-panel](https://plume.dennisokon.com/docs/tabs-panel)

Path: `plume/resources/views/components/tabs/panel.blade.php`

No props defined.

---

## x-plume::dropdown
Displays a menu to the user—such as a set of actions or functions—triggered by a button.

Documentation: [https://plume.dennisokon.com/docs/dropdown](https://plume.dennisokon.com/docs/dropdown)

Path: `plume/resources/views/components/dropdown/index.blade.php`

No props defined.

### Usage
```blade
&lt;x-plume::dropdown align="right" width="48"&gt;
    &lt;x-slot name="trigger"&gt;
        &lt;x-plume::button&gt;Click Me&lt;/x-plume::button&gt;
    &lt;/x-slot&gt;

    &lt;x-slot name="content"&gt;
        &lt;x-plume::dropdown.item href="/profile"&gt;Profile&lt;/x-plume::dropdown.item&gt;
        &lt;x-plume::dropdown.separator /&gt;
        &lt;x-plume::dropdown.item&gt;Logout&lt;/x-plume::dropdown.item&gt;
    &lt;/x-slot&gt;
&lt;/x-plume::dropdown&gt;
```

---

## x-plume::dropdown.item
Documentation: [https://plume.dennisokon.com/docs/dropdown-item](https://plume.dennisokon.com/docs/dropdown-item)

Path: `plume/resources/views/components/dropdown/item.blade.php`

No props defined.

---

## x-plume::dropdown.separator
Documentation: [https://plume.dennisokon.com/docs/dropdown-separator](https://plume.dennisokon.com/docs/dropdown-separator)

Path: `plume/resources/views/components/dropdown/separator.blade.php`

No props defined.

---

## x-plume::search
Styled search input with an integrated results dropdown.

Documentation: [https://plume.dennisokon.com/docs/search](https://plume.dennisokon.com/docs/search)

Path: `plume/resources/views/components/search/index.blade.php`

No props defined.

### Usage
```blade
&lt;x-plume::search placeholder="Search items..."&gt;
    &lt;x-slot:results&gt;
        &lt;x-plume::search.result title="Result 1" href="/link" icon="icon-..."&gt;
            Description text...
        &lt;/x-plume::search.result&gt;
    &lt;/x-slot:results&gt;
&lt;/x-plume::search&gt;
```

---

## x-plume::search.result
Documentation: [https://plume.dennisokon.com/docs/search-result](https://plume.dennisokon.com/docs/search-result)

Path: `plume/resources/views/components/search/result.blade.php`

No props defined.

---

## x-plume::stepper
Guide users through multi-step processes.

Documentation: [https://plume.dennisokon.com/docs/stepper](https://plume.dennisokon.com/docs/stepper)

Path: `plume/resources/views/components/stepper/index.blade.php`

No props defined.

### Usage
```blade
&lt;x-plume::stepper active="1"&gt;
    &lt;x-plume::stepper.step step="1" title="First" /&gt;
    &lt;x-plume::stepper.step step="2" title="Second" /&gt;
&lt;/x-plume::stepper&gt;
```

---

## x-plume::stepper.step
Documentation: [https://plume.dennisokon.com/docs/stepper-step](https://plume.dennisokon.com/docs/stepper-step)

Path: `plume/resources/views/components/stepper/step.blade.php`

No props defined.

---

## x-plume::drawer
A panel that slides in from the edge of the screen.

Documentation: [https://plume.dennisokon.com/docs/drawer](https://plume.dennisokon.com/docs/drawer)

Path: `plume/resources/views/components/drawer/index.blade.php`

No props defined.

---

## x-plume::drawer.title
Documentation: [https://plume.dennisokon.com/docs/drawer-title](https://plume.dennisokon.com/docs/drawer-title)

Path: `plume/resources/views/components/drawer/title.blade.php`

No props defined.

---

## x-plume::drawer.content
Documentation: [https://plume.dennisokon.com/docs/drawer-content](https://plume.dennisokon.com/docs/drawer-content)

Path: `plume/resources/views/components/drawer/content.blade.php`

No props defined.

---

## x-plume::drawer.header
Documentation: [https://plume.dennisokon.com/docs/drawer-header](https://plume.dennisokon.com/docs/drawer-header)

Path: `plume/resources/views/components/drawer/header.blade.php`

No props defined.

---

## x-plume::drawer.description
Documentation: [https://plume.dennisokon.com/docs/drawer-description](https://plume.dennisokon.com/docs/drawer-description)

Path: `plume/resources/views/components/drawer/description.blade.php`

No props defined.

---

## x-plume::drawer.footer
Documentation: [https://plume.dennisokon.com/docs/drawer-footer](https://plume.dennisokon.com/docs/drawer-footer)

Path: `plume/resources/views/components/drawer/footer.blade.php`

No props defined.

---

## x-plume::breadcrumb
Displays the path to the current resource using a hierarchy of links.

Documentation: [https://plume.dennisokon.com/docs/breadcrumb](https://plume.dennisokon.com/docs/breadcrumb)

Path: `plume/resources/views/components/breadcrumb/index.blade.php`

No props defined.

### Usage
```blade
&lt;x-plume::breadcrumb&gt;
    &lt;x-plume::breadcrumb.item href="/"&gt;Home&lt;/x-plume::breadcrumb.item&gt;
    &lt;x-plume::breadcrumb.separator /&gt;
    &lt;x-plume::breadcrumb.item active&gt;Settings&lt;/x-plume::breadcrumb.item&gt;
&lt;/x-plume::breadcrumb&gt;
```

---

## x-plume::breadcrumb.item
Documentation: [https://plume.dennisokon.com/docs/breadcrumb-item](https://plume.dennisokon.com/docs/breadcrumb-item)

Path: `plume/resources/views/components/breadcrumb/item.blade.php`

No props defined.

---

## x-plume::breadcrumb.separator
Documentation: [https://plume.dennisokon.com/docs/breadcrumb-separator](https://plume.dennisokon.com/docs/breadcrumb-separator)

Path: `plume/resources/views/components/breadcrumb/separator.blade.php`

No props defined.

---

## x-plume::modal
A dialog box or popup window that is displayed on top of the current page.

Documentation: [https://plume.dennisokon.com/docs/modal](https://plume.dennisokon.com/docs/modal)

Path: `plume/resources/views/components/modal/index.blade.php`

No props defined.

---

## x-plume::modal.title
Documentation: [https://plume.dennisokon.com/docs/modal-title](https://plume.dennisokon.com/docs/modal-title)

Path: `plume/resources/views/components/modal/title.blade.php`

No props defined.

---

## x-plume::modal.content
Documentation: [https://plume.dennisokon.com/docs/modal-content](https://plume.dennisokon.com/docs/modal-content)

Path: `plume/resources/views/components/modal/content.blade.php`

No props defined.

---

## x-plume::modal.header
Documentation: [https://plume.dennisokon.com/docs/modal-header](https://plume.dennisokon.com/docs/modal-header)

Path: `plume/resources/views/components/modal/header.blade.php`

No props defined.

---

## x-plume::modal.description
Documentation: [https://plume.dennisokon.com/docs/modal-description](https://plume.dennisokon.com/docs/modal-description)

Path: `plume/resources/views/components/modal/description.blade.php`

No props defined.

---

## x-plume::modal.footer
Documentation: [https://plume.dennisokon.com/docs/modal-footer](https://plume.dennisokon.com/docs/modal-footer)

Path: `plume/resources/views/components/modal/footer.blade.php`

No props defined.

---

## x-plume::table
A responsive table component.

Documentation: [https://plume.dennisokon.com/docs/table](https://plume.dennisokon.com/docs/table)

Path: `plume/resources/views/components/table/index.blade.php`

No props defined.

### Usage
```blade
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
&lt;/x-plume::table&gt;
```

---

## x-plume::table.head
Documentation: [https://plume.dennisokon.com/docs/table-head](https://plume.dennisokon.com/docs/table-head)

Path: `plume/resources/views/components/table/head.blade.php`

No props defined.

---

## x-plume::table.header
Documentation: [https://plume.dennisokon.com/docs/table-header](https://plume.dennisokon.com/docs/table-header)

Path: `plume/resources/views/components/table/header.blade.php`

No props defined.

---

## x-plume::table.row
Documentation: [https://plume.dennisokon.com/docs/table-row](https://plume.dennisokon.com/docs/table-row)

Path: `plume/resources/views/components/table/row.blade.php`

No props defined.

---

## x-plume::table.body
Documentation: [https://plume.dennisokon.com/docs/table-body](https://plume.dennisokon.com/docs/table-body)

Path: `plume/resources/views/components/table/body.blade.php`

No props defined.

---

## x-plume::table.cell
Documentation: [https://plume.dennisokon.com/docs/table-cell](https://plume.dennisokon.com/docs/table-cell)

Path: `plume/resources/views/components/table/cell.blade.php`

No props defined.

---

## x-plume::form
A collection of form components for user input.

Documentation: [https://plume.dennisokon.com/docs/forms](https://plume.dennisokon.com/docs/forms)

Path: `plume/resources/views/components/form/index.blade.php`

No props defined.

---

## x-plume::form.combobox
Searchable dropdown for selecting from a list of options.

Documentation: [https://plume.dennisokon.com/docs/form-combobox](https://plume.dennisokon.com/docs/form-combobox)

Path: `plume/resources/views/components/form/combobox.blade.php`

No props defined.

### Usage
```blade
&lt;x-plume::form.combobox 
    label="Country" 
    model="country"
    :options="[
        ['value' => 'us', 'label' => 'United States'],
        ['value' => 'uk', 'label' => 'United Kingdom'],
    ]" 
/&gt;
```

---

## x-plume::form.time
Documentation: [https://plume.dennisokon.com/docs/form-time](https://plume.dennisokon.com/docs/form-time)

Path: `plume/resources/views/components/form/time.blade.php`

No props defined.

---

## x-plume::form.toggle
Switch toggle for binary states.

Documentation: [https://plume.dennisokon.com/docs/form-toggle](https://plume.dennisokon.com/docs/form-toggle)

Path: `plume/resources/views/components/form/toggle.blade.php`

No props defined.

### Usage
```blade
&lt;x-plume::form.toggle model="wifi"&gt;WiFi&lt;/x-plume::form.toggle&gt;
```

---

## x-plume::form.date
Date, time, and datetime inputs.

Documentation: [https://plume.dennisokon.com/docs/form-date](https://plume.dennisokon.com/docs/form-date)

Path: `plume/resources/views/components/form/date.blade.php`

No props defined.

### Usage
```blade
&lt;x-plume::form.date model="date"&gt;Date&lt;/x-plume::form.date&gt;
&lt;x-plume::form.time model="time"&gt;Time&lt;/x-plume::form.time&gt;
&lt;x-plume::form.datetime model="datetime"&gt;Datetime&lt;/x-plume::form.datetime&gt;
```

---

## x-plume::form.password
Documentation: [https://plume.dennisokon.com/docs/form-password](https://plume.dennisokon.com/docs/form-password)

Path: `plume/resources/views/components/form/password.blade.php`

No props defined.

---

## x-plume::form.select
Dropdown selection field.

Documentation: [https://plume.dennisokon.com/docs/form-select](https://plume.dennisokon.com/docs/form-select)

Path: `plume/resources/views/components/form/select.blade.php`

No props defined.

### Usage
```blade
&lt;x-plume::form.select label="Role" model="role"&gt;
    &lt;option value="admin"&gt;Admin&lt;/option&gt;
    &lt;option value="editor"&gt;Editor&lt;/option&gt;
&lt;/x-plume::form.select&gt;
```

---

## x-plume::form.input
Standard text input fields, including password and number variants.

Documentation: [https://plume.dennisokon.com/docs/form-input](https://plume.dennisokon.com/docs/form-input)

Path: `plume/resources/views/components/form/input.blade.php`

No props defined.

### Usage
```blade
&lt;x-plume::form.input label="Username" model="username" /&gt;
&lt;x-plume::form.password label="Password" model="password" /&gt;
&lt;x-plume::form.number label="Age" model="age" min="0" /&gt;
```

---

## x-plume::form.number
Documentation: [https://plume.dennisokon.com/docs/form-number](https://plume.dennisokon.com/docs/form-number)

Path: `plume/resources/views/components/form/number.blade.php`

No props defined.

---

## x-plume::form.textarea
Multi-line text input field.

Documentation: [https://plume.dennisokon.com/docs/form-textarea](https://plume.dennisokon.com/docs/form-textarea)

Path: `plume/resources/views/components/form/textarea.blade.php`

No props defined.

### Usage
```blade
&lt;x-plume::form.textarea 
    label="Message" 
    model="message" 
    rows="5" 
/&gt;
```

---

## x-plume::form.radio
Radio buttons for selecting a single option from a set.

Documentation: [https://plume.dennisokon.com/docs/form-radio](https://plume.dennisokon.com/docs/form-radio)

Path: `plume/resources/views/components/form/radio.blade.php`

No props defined.

### Usage
```blade
&lt;x-plume::form.group label="Contact Method" model="contact"&gt;
    &lt;x-plume::form.radio value="email"&gt;Email&lt;/x-plume::form.radio&gt;
    &lt;x-plume::form.radio value="phone"&gt;Phone&lt;/x-plume::form.radio&gt;
&lt;/x-plume::form.group&gt;
```

---

## x-plume::form.group
Documentation: [https://plume.dennisokon.com/docs/form-group](https://plume.dennisokon.com/docs/form-group)

Path: `plume/resources/views/components/form/group.blade.php`

No props defined.

---

## x-plume::form.range
Documentation: [https://plume.dennisokon.com/docs/form-range](https://plume.dennisokon.com/docs/form-range)

Path: `plume/resources/views/components/form/range.blade.php`

No props defined.

---

## x-plume::form.section
Documentation: [https://plume.dennisokon.com/docs/form-section](https://plume.dennisokon.com/docs/form-section)

Path: `plume/resources/views/components/form/section.blade.php`

No props defined.

---

## x-plume::form.file
Input field for file uploads.

Documentation: [https://plume.dennisokon.com/docs/form-file](https://plume.dennisokon.com/docs/form-file)

Path: `plume/resources/views/components/form/file.blade.php`

No props defined.

### Usage
```blade
&lt;x-plume::form.file model="document"&gt;Upload Document&lt;/x-plume::form.file&gt;
```

---

## x-plume::form.checkbox
Checkbox input for binary choices.

Documentation: [https://plume.dennisokon.com/docs/form-checkbox](https://plume.dennisokon.com/docs/form-checkbox)

Path: `plume/resources/views/components/form/checkbox.blade.php`

No props defined.

### Usage
```blade
&lt;!-- Single --&gt;
&lt;x-plume::form.checkbox model="accept"&gt;I accept&lt;/x-plume::form.checkbox&gt;

&lt;!-- Group --&gt;
&lt;x-plume::form.group label="Interests" model="interests"&gt;
    &lt;x-plume::form.checkbox value="code"&gt;Coding&lt;/x-plume::form.checkbox&gt;
    &lt;x-plume::form.checkbox value="design"&gt;Design&lt;/x-plume::form.checkbox&gt;
&lt;/x-plume::form.group&gt;
```

---

## x-plume::form.element
Documentation: [https://plume.dennisokon.com/docs/form-element](https://plume.dennisokon.com/docs/form-element)

Path: `plume/resources/views/components/form/element.blade.php`

No props defined.

---

## x-plume::form.actions
Documentation: [https://plume.dennisokon.com/docs/form-actions](https://plume.dennisokon.com/docs/form-actions)

Path: `plume/resources/views/components/form/actions.blade.php`

No props defined.

---

## x-plume::form.color
Documentation: [https://plume.dennisokon.com/docs/form-color](https://plume.dennisokon.com/docs/form-color)

Path: `plume/resources/views/components/form/color.blade.php`

No props defined.

---

## x-plume::form.inline
Documentation: [https://plume.dennisokon.com/docs/form-inline](https://plume.dennisokon.com/docs/form-inline)

Path: `plume/resources/views/components/form/inline.blade.php`

No props defined.

---

## x-plume::form.datetime
Documentation: [https://plume.dennisokon.com/docs/form-datetime](https://plume.dennisokon.com/docs/form-datetime)

Path: `plume/resources/views/components/form/datetime.blade.php`

No props defined.

---

## x-plume::progress
Displays an indicator showing the completion progress of a task, typically displayed as a progress bar.

Documentation: [https://plume.dennisokon.com/docs/progress](https://plume.dennisokon.com/docs/progress)

Path: `plume/resources/views/components/progress/index.blade.php`

No props defined.

---

## x-plume::progress.percent
Documentation: [https://plume.dennisokon.com/docs/progress-percent](https://plume.dennisokon.com/docs/progress-percent)

Path: `plume/resources/views/components/progress/percent.blade.php`

No props defined.

---

## x-plume::accordion
Collapsible content panels for saving vertical space.

Documentation: [https://plume.dennisokon.com/docs/accordion](https://plume.dennisokon.com/docs/accordion)

Path: `plume/resources/views/components/accordion/index.blade.php`

No props defined.

### Usage
```blade
&lt;x-plume::accordion&gt;
    &lt;x-plume::accordion.item title="Heading"&gt;
        Content goes here...
    &lt;/x-plume::accordion.item&gt;
&lt;/x-plume::accordion&gt;
```

---

## x-plume::accordion.item
Documentation: [https://plume.dennisokon.com/docs/accordion-item](https://plume.dennisokon.com/docs/accordion-item)

Path: `plume/resources/views/components/accordion/item.blade.php`

No props defined.

---

## x-plume::button
Displays a button or a component that looks like a button.

Documentation: [https://plume.dennisokon.com/docs/button](https://plume.dennisokon.com/docs/button)

Path: `plume/resources/views/components/button/index.blade.php`

No props defined.

### Usage
```blade
&lt;x-plume::button style="primary" size="md"&gt;
    Click Me
&lt;/x-plume::button&gt;
```

---

## x-plume::button.loader
Button with built-in loading state management.

Documentation: [https://plume.dennisokon.com/docs/button-loader](https://plume.dennisokon.com/docs/button-loader)

Path: `plume/resources/views/components/button/loader.blade.php`

No props defined.

### Usage
```blade
&lt;x-plume::button.loader var="isSaving"&gt;
    Save
&lt;/x-plume::button.loader&gt;
```

---

## x-plume::button.toggle
Button that toggles between two states.

Documentation: [https://plume.dennisokon.com/docs/button-toggle](https://plume.dennisokon.com/docs/button-toggle)

Path: `plume/resources/views/components/button/toggle.blade.php`

No props defined.

### Usage
```blade
&lt;x-plume::button.toggle var="active" on="Active" off="Inactive" /&gt;
```

---

