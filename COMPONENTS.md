# Plume UI Components Reference

Base URL: [https://plume.dennisokon.com](https://plume.dennisokon.com)

## x-plume::accordion
Collapsible content panels for saving vertical space.

Documentation: [https://plume.dennisokon.com/docs/accordion](https://plume.dennisokon.com/docs/accordion)

Path: `plume/resources/views/components-class/accordion.blade.php`

### Use Cases
- Frequently Asked Questions (FAQ) sections.
- Managing large amounts of content in a limited space.
- Grouping related content into collapsible panels.

---

## x-plume::accordion-item
An individual collapsible item within an accordion.

Documentation: [https://plume.dennisokon.com/docs/accordion-item](https://plume.dennisokon.com/docs/accordion-item)

Path: `plume/resources/views/components-class/accordion-item.blade.php`

### Use Cases
- Individual FAQ questions.
- Content sections within a larger grouping.

---

## x-plume::alert
Displays a callout for user attention.

Documentation: [https://plume.dennisokon.com/docs/alert](https://plume.dennisokon.com/docs/alert)

Path: `plume/resources/views/components-class/alert.blade.php`

### Use Cases
- Displaying system-level notifications.
- Warning users about potential destructive actions.
- Providing success or error feedback for operations.

---

## x-plume::alert-dialog
Modal dialog specifically designed for alerting users to important information or actions.

Documentation: [https://plume.dennisokon.com/docs/alert-dialog](https://plume.dennisokon.com/docs/alert-dialog)

Path: `plume/resources/views/components-class/alert-dialog.blade.php`

### Use Cases
- Confirming destructive actions like deleting an account.
- Notifying users of critical system maintenance.
- Requiring explicit user acknowledgement before proceeding.

---

## x-plume::aspect
A container component to maintain consistent proportions for media and content.

Documentation: [https://plume.dennisokon.com/docs/aspect](https://plume.dennisokon.com/docs/aspect)

Path: `plume/resources/views/components-class/aspect.blade.php`

### Use Cases
- Responsive video embeds.
- Image placeholders with specific ratios (e.g., 16:9, 4:3).
- Consistent card or tile layouts.

---

## x-plume::audio
A styled wrapper for HTML5 audio content.

Documentation: [https://plume.dennisokon.com/docs/audio](https://plume.dennisokon.com/docs/audio)

Path: `plume/resources/views/components-class/audio.blade.php`

### Use Cases
- Embedding podcasts or audio interviews.
- Adding sound effects or voice snippets to a page.
- Creating custom audio player interfaces.

---

## x-plume::avatar
An image element with a fallback for representing the user.

Documentation: [https://plume.dennisokon.com/docs/avatar](https://plume.dennisokon.com/docs/avatar)

Path: `plume/resources/views/components-class/avatar.blade.php`

### Use Cases
- User profile images in navbars or cards.
- Author thumbnails in blog posts or comments.
- Representing entities in a list.

---

## x-plume::badge
Displays a badge or a component that looks like a badge.

Documentation: [https://plume.dennisokon.com/docs/badge](https://plume.dennisokon.com/docs/badge)

Path: `plume/resources/views/components-class/badge.blade.php`

### Use Cases
- Status indicators (e.g., "Active", "Pending", "Draft").
- Tagging content or categories.
- Showing notification counts.

---

## x-plume::breadcrumb
Displays the path to the current resource using a hierarchy of links.

Documentation: [https://plume.dennisokon.com/docs/breadcrumb](https://plume.dennisokon.com/docs/breadcrumb)

Path: `plume/resources/views/components-class/breadcrumb.blade.php`

### Use Cases
- Navigating deeply nested hierarchical structures.
- Providing secondary navigation for complex websites.
- Indicating user location within a multi-step process.

---

## x-plume::breadcrumb-item
No description provided.

Documentation: [https://plume.dennisokon.com/docs/breadcrumb-item](https://plume.dennisokon.com/docs/breadcrumb-item)

Path: `plume/resources/views/components-class/breadcrumb-item.blade.php`

---

## x-plume::breadcrumb-separator
No description provided.

Documentation: [https://plume.dennisokon.com/docs/breadcrumb-separator](https://plume.dennisokon.com/docs/breadcrumb-separator)

Path: `plume/resources/views/components-class/breadcrumb-separator.blade.php`

---

## x-plume::button
Displays a button or a component that looks like a button.

Documentation: [https://plume.dennisokon.com/docs/button](https://plume.dennisokon.com/docs/button)

Path: `plume/resources/views/components-class/button.blade.php`

### Use Cases
- Primary call-to-action (CTA).
- Form submission.
- Navigation or triggering UI overlays.

---

## x-plume::button-group
No description provided.

Documentation: [https://plume.dennisokon.com/docs/button-group](https://plume.dennisokon.com/docs/button-group)

Path: `plume/resources/views/components-class/button-group.blade.php`

### Use Cases
- Grouping related actions (e.g., "Edit", "Delete", "View").
- Creating toggle-like button bars.
- Consolidating toolbars.

---

## x-plume::button-group.context
No description provided.

Documentation: [https://plume.dennisokon.com/docs/button-group-context](https://plume.dennisokon.com/docs/button-group-context)

Path: `plume/resources/views/components/button-group/context.blade.php`

### Properties
- `groupSize` (any): Default: `null`.
- `groupStyle` (any): Default: `null`.
- `groupShape` (any): Default: `null`.

---

## x-plume::button.loader
Button with built-in loading state management.

Documentation: [https://plume.dennisokon.com/docs/button-loader](https://plume.dennisokon.com/docs/button-loader)

Path: `plume/resources/views/components-class/button/loader.blade.php`

---

## x-plume::button.toggle
Button that toggles between two states.

Documentation: [https://plume.dennisokon.com/docs/button-toggle](https://plume.dennisokon.com/docs/button-toggle)

Path: `plume/resources/views/components-class/button/toggle.blade.php`

---

## x-plume::calendar
A visual calendar interface for selecting dates.

Documentation: [https://plume.dennisokon.com/docs/calendar](https://plume.dennisokon.com/docs/calendar)

Path: `plume/resources/views/components-class/calendar.blade.php`

### Use Cases
- Selecting dates for forms.
- Scheduling events or appointments.
- Visualizing date-based data.

---

## x-plume::card
Displays a card with header, content, and footer.

Documentation: [https://plume.dennisokon.com/docs/card](https://plume.dennisokon.com/docs/card)

Path: `plume/resources/views/components-class/card.blade.php`

### Use Cases
- Grouping related content or tasks.
- Creating dashboard widgets.
- Presenting search results or product summaries.

---

## x-plume::carousel
A slideshow component for cycling through elements.

Documentation: [https://plume.dennisokon.com/docs/carousel](https://plume.dennisokon.com/docs/carousel)

Path: `plume/resources/views/components-class/carousel.blade.php`

### Use Cases
- Image galleries or hero sliders.
- Cycling through testimonials or reviews.
- Presenting featured content prominently.

---

## x-plume::carousel-item
An individual slide within a carousel.

Documentation: [https://plume.dennisokon.com/docs/carousel-item](https://plume.dennisokon.com/docs/carousel-item)

Path: `plume/resources/views/components-class/carousel-item.blade.php`

---

## x-plume::chart
Basic chart component for data visualization (bar, line).

Documentation: [https://plume.dennisokon.com/docs/chart](https://plume.dennisokon.com/docs/chart)

Path: `plume/resources/views/components-class/chart.blade.php`

### Use Cases
- Visualizing trends over time.
- Comparing data across categories.
- Displaying performance metrics in a dashboard.

---

## x-plume::code
A component for displaying code snippets with a copy-to-clipboard feature.

Documentation: [https://plume.dennisokon.com/docs/code](https://plume.dennisokon.com/docs/code)

Path: `plume/resources/views/components-class/code.blade.php`

### Use Cases
- Displaying technical documentation.
- Sharing API endpoints or example payloads.
- Presenting command-line instructions.

---

## x-plume::command
A powerful search and action interface accessible via keyboard shortcuts.

Documentation: [https://plume.dennisokon.com/docs/command](https://plume.dennisokon.com/docs/command)

Path: `plume/resources/views/components-class/command.blade.php`

### Use Cases
- Global site search and navigation (CMD+K style).
- Quick action menu for application tasks.
- Filtering complex lists or data.

---

## x-plume::command-group
No description provided.

Documentation: [https://plume.dennisokon.com/docs/command-group](https://plume.dennisokon.com/docs/command-group)

Path: `plume/resources/views/components-class/command-group.blade.php`

---

## x-plume::command-item
No description provided.

Documentation: [https://plume.dennisokon.com/docs/command-item](https://plume.dennisokon.com/docs/command-item)

Path: `plume/resources/views/components-class/command-item.blade.php`

---

## x-plume::data-table
Advanced table with sorting, filtering, and pagination. Powered by AlpineJS. Supports client-side data or server-side fetching via URL.

Documentation: [https://plume.dennisokon.com/docs/data-table](https://plume.dennisokon.com/docs/data-table)

Path: `plume/resources/views/components-class/data-table.blade.php`

### Use Cases
- Managing large sets of administrative data.
- Creating searchable and sortable reports.
- Paginated listing of users, products, or transactions.

---

## x-plume::divider
Visually separates content sections with an optional label.

Documentation: [https://plume.dennisokon.com/docs/divider](https://plume.dennisokon.com/docs/divider)

Path: `plume/resources/views/components-class/divider.blade.php`

### Use Cases
- Separating logical sections of a long page.
- Labeling sub-sections within a card.
- Visual breaks in list items.

---

## x-plume::drawer
A panel that slides in from the edge of the screen.

Documentation: [https://plume.dennisokon.com/docs/drawer](https://plume.dennisokon.com/docs/drawer)

Path: `plume/resources/views/components-class/drawer.blade.php`

### Use Cases
- Navigation menus on mobile devices.
- Supplementary details or settings for a selected item.
- Multi-step forms or wizards.

---

## x-plume::dropdown
Displays a menu to the user—such as a set of actions or functions—triggered by a button.

Documentation: [https://plume.dennisokon.com/docs/dropdown](https://plume.dennisokon.com/docs/dropdown)

Path: `plume/resources/views/components-class/dropdown.blade.php`

### Use Cases
- "More actions" menu for table rows.
- Account settings and logout links.
- Filtering or sorting options.

---

## x-plume::dropdown.item
No description provided.

Documentation: [https://plume.dennisokon.com/docs/dropdown-item](https://plume.dennisokon.com/docs/dropdown-item)

Path: `plume/resources/views/components-class/dropdown/item.blade.php`

---

## x-plume::dropdown.separator
No description provided.

Documentation: [https://plume.dennisokon.com/docs/dropdown-separator](https://plume.dennisokon.com/docs/dropdown-separator)

Path: `plume/resources/views/components-class/dropdown/separator.blade.php`

---

## x-plume::empty-state
Use this component to show a placeholder when a list or page has no data.

Documentation: [https://plume.dennisokon.com/docs/empty-state](https://plume.dennisokon.com/docs/empty-state)

Path: `plume/resources/views/components-class/empty-state.blade.php`

### Use Cases
- Initial setup or onboarding screens.
- Indicating no search results found.
- Handling empty lists or dashboards.

---

## x-plume::figure
Enhanced image component with captions, aspect ratio control, and support for modern image formats.

Documentation: [https://plume.dennisokon.com/docs/figure](https://plume.dennisokon.com/docs/figure)

Path: `plume/resources/views/components-class/figure.blade.php`

### Use Cases
- Displaying images with descriptive captions.
- Implementing lightbox-style image viewers.
- Maintaining consistent aspect ratios for thumbnails.

---

## x-plume::form
A collection of form components for user input.

Documentation: [https://plume.dennisokon.com/docs/form](https://plume.dennisokon.com/docs/form)

Path: `plume/resources/views/components-class/form/index.blade.php`

### Use Cases
- User registration and login.
- Submitting contact or feedback information.
- Editing complex settings or profiles.

---

## x-plume::form.actions
No description provided.

Documentation: [https://plume.dennisokon.com/docs/form-actions](https://plume.dennisokon.com/docs/form-actions)

Path: `plume/resources/views/components-class/form/actions.blade.php`

---

## x-plume::form.checkbox
No description provided.

Documentation: [https://plume.dennisokon.com/docs/form-checkbox](https://plume.dennisokon.com/docs/form-checkbox)

Path: `plume/resources/views/components-class/form/checkbox.blade.php`

---

## x-plume::form.color
No description provided.

Documentation: [https://plume.dennisokon.com/docs/form-color](https://plume.dennisokon.com/docs/form-color)

Path: `plume/resources/views/components-class/form/color.blade.php`

---

## x-plume::form.combobox
No description provided.

Documentation: [https://plume.dennisokon.com/docs/form-combobox](https://plume.dennisokon.com/docs/form-combobox)

Path: `plume/resources/views/components-class/form/combobox.blade.php`

---

## x-plume::form.date
No description provided.

Documentation: [https://plume.dennisokon.com/docs/form-date](https://plume.dennisokon.com/docs/form-date)

Path: `plume/resources/views/components-class/form/date.blade.php`

---

## x-plume::form.datetime
No description provided.

Documentation: [https://plume.dennisokon.com/docs/form-datetime](https://plume.dennisokon.com/docs/form-datetime)

Path: `plume/resources/views/components-class/form/datetime.blade.php`

---

## x-plume::form.element
No description provided.

Documentation: [https://plume.dennisokon.com/docs/form-element](https://plume.dennisokon.com/docs/form-element)

Path: `plume/resources/views/components-class/form/element.blade.php`

---

## x-plume::form.file
No description provided.

Documentation: [https://plume.dennisokon.com/docs/form-file](https://plume.dennisokon.com/docs/form-file)

Path: `plume/resources/views/components-class/form/file.blade.php`

---

## x-plume::form.group
No description provided.

Documentation: [https://plume.dennisokon.com/docs/form-group](https://plume.dennisokon.com/docs/form-group)

Path: `plume/resources/views/components-class/form/group.blade.php`

---

## x-plume::form.inline
No description provided.

Documentation: [https://plume.dennisokon.com/docs/form-inline](https://plume.dennisokon.com/docs/form-inline)

Path: `plume/resources/views/components-class/form/inline.blade.php`

---

## x-plume::form.input
Standard text input fields, including password and number variants.

Documentation: [https://plume.dennisokon.com/docs/form-input](https://plume.dennisokon.com/docs/form-input)

Path: `plume/resources/views/components-class/form/input.blade.php`

---

## x-plume::form.label
No description provided.

Documentation: [https://plume.dennisokon.com/docs/form-label](https://plume.dennisokon.com/docs/form-label)

Path: `plume/resources/views/components-class/form/label.blade.php`

---

## x-plume::form.number
No description provided.

Documentation: [https://plume.dennisokon.com/docs/form-number](https://plume.dennisokon.com/docs/form-number)

Path: `plume/resources/views/components-class/form/number.blade.php`

---

## x-plume::form.password
No description provided.

Documentation: [https://plume.dennisokon.com/docs/form-password](https://plume.dennisokon.com/docs/form-password)

Path: `plume/resources/views/components-class/form/password.blade.php`

---

## x-plume::form.radio
No description provided.

Documentation: [https://plume.dennisokon.com/docs/form-radio](https://plume.dennisokon.com/docs/form-radio)

Path: `plume/resources/views/components-class/form/radio.blade.php`

---

## x-plume::form.range
No description provided.

Documentation: [https://plume.dennisokon.com/docs/form-range](https://plume.dennisokon.com/docs/form-range)

Path: `plume/resources/views/components-class/form/range.blade.php`

---

## x-plume::form.section
No description provided.

Documentation: [https://plume.dennisokon.com/docs/form-section](https://plume.dennisokon.com/docs/form-section)

Path: `plume/resources/views/components-class/form/section.blade.php`

---

## x-plume::form.select
No description provided.

Documentation: [https://plume.dennisokon.com/docs/form-select](https://plume.dennisokon.com/docs/form-select)

Path: `plume/resources/views/components-class/form/select.blade.php`

---

## x-plume::form.textarea
No description provided.

Documentation: [https://plume.dennisokon.com/docs/form-textarea](https://plume.dennisokon.com/docs/form-textarea)

Path: `plume/resources/views/components-class/form/textarea.blade.php`

---

## x-plume::form.time
No description provided.

Documentation: [https://plume.dennisokon.com/docs/form-time](https://plume.dennisokon.com/docs/form-time)

Path: `plume/resources/views/components-class/form/time.blade.php`

---

## x-plume::form.toggle
No description provided.

Documentation: [https://plume.dennisokon.com/docs/form-toggle](https://plume.dennisokon.com/docs/form-toggle)

Path: `plume/resources/views/components-class/form/toggle.blade.php`

---

## x-plume::gallery
Responsive grid layout for images and figures.

Documentation: [https://plume.dennisokon.com/docs/gallery](https://plume.dennisokon.com/docs/gallery)

Path: `plume/resources/views/components-class/gallery.blade.php`

### Use Cases
- Photo albums or portfolio layouts.
- Product listings in an e-commerce site.
- Grid-based dashboards.

---

## x-plume::icon
Displays an icon from the Iconify library.

Documentation: [https://plume.dennisokon.com/docs/icon](https://plume.dennisokon.com/docs/icon)

Path: `plume/resources/views/components-class/icon.blade.php`

### Use Cases
- Providing visual cues for buttons and links.
- Representing categories or statuses.
- Enhancing list items or section headers.

---

## x-plume::kbd
Displays keyboard input.

Documentation: [https://plume.dennisokon.com/docs/kbd](https://plume.dennisokon.com/docs/kbd)

Path: `plume/resources/views/components-class/kbd.blade.php`

### Use Cases
- Documenting keyboard shortcuts.
- Indicating specific keys to press in tutorials.
- Enhancing accessibility instructions.

---

## x-plume::modal
A dialog box or popup window that is displayed on top of the current page.

Documentation: [https://plume.dennisokon.com/docs/modal](https://plume.dennisokon.com/docs/modal)

Path: `plume/resources/views/components-class/modal.blade.php`

### Use Cases
- Complex forms that need focus.
- Displaying detailed content without navigating away.
- Modal confirmations or important notices.

---

## x-plume::navbar
A top-level navigation component for site-wide links and actions.

Documentation: [https://plume.dennisokon.com/docs/navbar](https://plume.dennisokon.com/docs/navbar)

Path: `plume/resources/views/components-class/navbar.blade.php`

### Use Cases
- Main application navigation.
- Marketing site headers with links and CTAs.
- Dashboard utility bars.

---

## x-plume::navbar-item
Individual navigation link.

Documentation: [https://plume.dennisokon.com/docs/navbar-item](https://plume.dennisokon.com/docs/navbar-item)

Path: `plume/resources/views/components-class/navbar-item.blade.php`

---

## x-plume::navbar-logo
The brand logo or title.

Documentation: [https://plume.dennisokon.com/docs/navbar-logo](https://plume.dennisokon.com/docs/navbar-logo)

Path: `plume/resources/views/components-class/navbar-logo.blade.php`

---

## x-plume::navbar-menu
Container for navigation items.

Documentation: [https://plume.dennisokon.com/docs/navbar-menu](https://plume.dennisokon.com/docs/navbar-menu)

Path: `plume/resources/views/components-class/navbar-menu.blade.php`

---

## x-plume::navbar-mobile-item
Individual navigation link for mobile menu.

Documentation: [https://plume.dennisokon.com/docs/navbar-mobile-item](https://plume.dennisokon.com/docs/navbar-mobile-item)

Path: `plume/resources/views/components-class/navbar-mobile-item.blade.php`

---

## x-plume::navbar-mobile-menu
Responsive mobile menu container.

Documentation: [https://plume.dennisokon.com/docs/navbar-mobile-menu](https://plume.dennisokon.com/docs/navbar-mobile-menu)

Path: `plume/resources/views/components-class/navbar-mobile-menu.blade.php`

---

## x-plume::navbar-mobile-toggle
Toggle button for the mobile menu.

Documentation: [https://plume.dennisokon.com/docs/navbar-mobile-toggle](https://plume.dennisokon.com/docs/navbar-mobile-toggle)

Path: `plume/resources/views/components-class/navbar-mobile-toggle.blade.php`

---

## x-plume::pagination
Displays a sequence of links for navigating through a series of related pages. Powered by AlpineJS.

Documentation: [https://plume.dennisokon.com/docs/pagination](https://plume.dennisokon.com/docs/pagination)

Path: `plume/resources/views/components-class/pagination.blade.php`

### Use Cases
- Navigating multi-page search results.
- Browsing through blog post archives.
- Paginating large data sets.

---

## x-plume::popover
Displays rich content in a portal, triggered by a button.

Documentation: [https://plume.dennisokon.com/docs/popover](https://plume.dennisokon.com/docs/popover)

Path: `plume/resources/views/components-class/popover.blade.php`

### Use Cases
- Displaying additional info on hover or click.
- Implementing complex tooltips with HTML content.
- Quick filter menus.

---

## x-plume::progress
A bar that shows the completion progress of a task.

Documentation: [https://plume.dennisokon.com/docs/progress](https://plume.dennisokon.com/docs/progress)

Path: `plume/resources/views/components-class/progress.blade.php`

### Use Cases
- Indicating file upload progress.
- Showing task completion percentage.
- Visualizing steps completed in a multi-stage process.

---

## x-plume::search
Styled search input with an integrated results dropdown.

Documentation: [https://plume.dennisokon.com/docs/search](https://plume.dennisokon.com/docs/search)

Path: `plume/resources/views/components-class/search.blade.php`

### Use Cases
- Instant site or application search.
- Filtering lists or directories.
- Auto-complete functionality for form fields.

---

## x-plume::search-result
No description provided.

Documentation: [https://plume.dennisokon.com/docs/search-result](https://plume.dennisokon.com/docs/search-result)

Path: `plume/resources/views/components-class/search-result.blade.php`

---

## x-plume::skeleton
No description provided.

Documentation: [https://plume.dennisokon.com/docs/skeleton](https://plume.dennisokon.com/docs/skeleton)

Path: `plume/resources/views/components-class/skeleton.blade.php`

### Use Cases
- Loading states for cards or list items.
- Providing visual structure while content is fetching.
- Reducing perceived load time.

---

## x-plume::spacer
A utility component that fills available space in a flex container.

Documentation: [https://plume.dennisokon.com/docs/spacer](https://plume.dennisokon.com/docs/spacer)

Path: `plume/resources/views/components-class/spacer.blade.php`

### Use Cases
- Pushing items to the ends of a navbar.
- Creating flexible layouts without fixed margins.
- Centering items within a container.

---

## x-plume::spinner
A loading indicator.

Documentation: [https://plume.dennisokon.com/docs/spinner](https://plume.dennisokon.com/docs/spinner)

Path: `plume/resources/views/components-class/spinner.blade.php`

### Use Cases
- Indicating that a specific element is loading.
- Button-level loading states.
- General background processing notification.

---

## x-plume::stepper
Guide users through multi-step processes.

Documentation: [https://plume.dennisokon.com/docs/stepper](https://plume.dennisokon.com/docs/stepper)

Path: `plume/resources/views/components-class/stepper.blade.php`

### Use Cases
- Multi-step registration forms.
- Checkout processes.
- Onboarding workflows.

---

## x-plume::stepper-actions
Standard actions layout for stepper components.

Documentation: [https://plume.dennisokon.com/docs/stepper-actions](https://plume.dennisokon.com/docs/stepper-actions)

Path: `plume/resources/views/components-class/stepper-actions.blade.php`

---

## x-plume::stepper-step
An individual step within a stepper component.

Documentation: [https://plume.dennisokon.com/docs/stepper-step](https://plume.dennisokon.com/docs/stepper-step)

Path: `plume/resources/views/components-class/stepper-step.blade.php`

---

## x-plume::table
A responsive table component.

Documentation: [https://plume.dennisokon.com/docs/table](https://plume.dennisokon.com/docs/table)

Path: `plume/resources/views/components-class/table/index.blade.php`

### Use Cases
- Basic data presentation.
- Layouts for structured information.
- Summary lists.

---

## x-plume::table.tbody
No description provided.

Documentation: [https://plume.dennisokon.com/docs/table-tbody](https://plume.dennisokon.com/docs/table-tbody)

Path: `plume/resources/views/components-class/table/tbody.blade.php`

---

## x-plume::table.td
No description provided.

Documentation: [https://plume.dennisokon.com/docs/table-td](https://plume.dennisokon.com/docs/table-td)

Path: `plume/resources/views/components-class/table/td.blade.php`

---

## x-plume::table.th
No description provided.

Documentation: [https://plume.dennisokon.com/docs/table-th](https://plume.dennisokon.com/docs/table-th)

Path: `plume/resources/views/components-class/table/th.blade.php`

---

## x-plume::table.thead
No description provided.

Documentation: [https://plume.dennisokon.com/docs/table-thead](https://plume.dennisokon.com/docs/table-thead)

Path: `plume/resources/views/components-class/table/thead.blade.php`

---

## x-plume::table.tr
No description provided.

Documentation: [https://plume.dennisokon.com/docs/table-tr](https://plume.dennisokon.com/docs/table-tr)

Path: `plume/resources/views/components-class/table/tr.blade.php`

---

## x-plume::tabs
A set of layered sections of content, known as tab panels, that are displayed one at a time.

Documentation: [https://plume.dennisokon.com/docs/tabs](https://plume.dennisokon.com/docs/tabs)

Path: `plume/resources/views/components-class/tabs/index.blade.php`

### Use Cases
- Toggling between related content views.
- Settings pages with multiple categories.
- Dashboard layouts with tabbed data.

---

## x-plume::tabs.group
No description provided.

Documentation: [https://plume.dennisokon.com/docs/tabs-group](https://plume.dennisokon.com/docs/tabs-group)

Path: `plume/resources/views/components-class/tabs/group.blade.php`

---

## x-plume::tabs.item
No description provided.

Documentation: [https://plume.dennisokon.com/docs/tabs-item](https://plume.dennisokon.com/docs/tabs-item)

Path: `plume/resources/views/components-class/tabs/item.blade.php`

---

## x-plume::tabs.panel
No description provided.

Documentation: [https://plume.dennisokon.com/docs/tabs-panel](https://plume.dennisokon.com/docs/tabs-panel)

Path: `plume/resources/views/components-class/tabs/panel.blade.php`

---

## x-plume::toaster
A succinct message that is displayed temporarily.

Documentation: [https://plume.dennisokon.com/docs/toaster](https://plume.dennisokon.com/docs/toaster)

Path: `plume/resources/views/components-class/toaster.blade.php`

### Use Cases
- Success/Error notifications for user actions.
- Brief system alerts.
- Low-priority background task updates.

---

## x-plume::tooltip
A popup that displays information related to an element when the element receives keyboard focus or the mouse hovers over it.

Documentation: [https://plume.dennisokon.com/docs/tooltip](https://plume.dennisokon.com/docs/tooltip)

Path: `plume/resources/views/components-class/tooltip.blade.php`

### Use Cases
- Explaining icon-only buttons.
- Providing context for technical terms.
- Helping users understand specific UI elements.

---

## x-plume::video
A styled wrapper for HTML5 video, YouTube, and Vimeo content.

Documentation: [https://plume.dennisokon.com/docs/video](https://plume.dennisokon.com/docs/video)

Path: `plume/resources/views/components-class/video.blade.php`

### Use Cases
- Embedding tutorials or marketing videos.
- Background video elements.
- Custom video playback interfaces.

---