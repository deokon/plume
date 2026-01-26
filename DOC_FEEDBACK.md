# Plume UI Documentation Gaps & Confusing Points

**Last Updated**: January 26, 2026
**Plume Version**: 0.9.0

This document catalogs remaining documentation gaps and confusing areas in the Plume UI library. These should be addressed in future releases or via community contributions.

---

## Critical Gaps (High Priority)

### 1. Form Input Properties Missing Descriptions

**File**: `docs/form-input.md`
**Status**: ❌ Not Fixed

Properties like `model`, `required`, `readonly` are listed but have no descriptions:

```markdown
| `model` | `string` | `null` |  |  # ← EMPTY DESCRIPTION
| `value` | `string` | `''` |  |  # ← EMPTY DESCRIPTION
```

**Missing Documentation**:
- What does `model` do? (How it syncs with form state?)
- What is the difference between `model` and `value`?
- How to mark fields as required?
- How do validation errors display?
- Support for readonly/disabled states?

**Suggested Fix**: Add examples showing form state binding and error handling.

---

### 2. Form File Upload Behavior Undocumented

**File**: `docs/form-file.md`
**Status**: ⚠️ Partially Fixed

Still unclear:
- **Immediate Upload vs Form Submit**: Does `uploadUrl` trigger immediate upload or wait for form submission?
- **Response Format**: What structure must the server return? (Currently only shows it accepts `id` field implicitly)
- **Error Handling**: How are upload errors displayed to the user?
- **File Storage**: Is storage path configurable? Where are files stored by default?
- **Multiple Files**: The `multiple` prop exists but no example of handling multiple files

**Current Usage in Shop-Front**:
```blade
<x-plume::form.file label="Product Image" model="image" :uploadUrl="route('admin.upload')" accept="image/*" />
```

But how the response with `id` field gets bound to form `image` model is undocumented.

**Suggested Fix**: Document upload lifecycle and show full controller-to-form example.

---

### 3. Individual Form Field Components Missing Descriptions

**Files**: `docs/form-checkbox.md`, `docs/form-select.md`, `docs/form-textarea.md`, `docs/form-radio.md`, `docs/form-date.md`, `docs/form-datetime.md`, `docs/form-time.md`, `docs/form-number.md`, `docs/form-password.md`, `docs/form-color.md`, `docs/form-range.md`, `docs/form-toggle.md`, `docs/form-combobox.md`

**Status**: ⚠️ Incomplete

All form field component docs show bare property tables with empty descriptions:

```markdown
| Prop | Type | Default | Description |
| :--- | :--- | :--- | :--- |
| `label` | `string` | `null` |  |  # ← EMPTY
| `name` | `string` | `null` |  |  # ← EMPTY
| `model` | `string` | `null` |  |  # ← EMPTY
```

**Missing for Each**:
- What does each property do?
- Usage examples for each field type
- How validation errors display
- How to mark required
- Default values and constraints
- Support for disabled/readonly states

---

### 4. Pagination Documentation Completely Bare

**File**: `docs/pagination.md`
**Status**: ⚠️ Not Fixed

Properties have no descriptions:

```markdown
| `total` | `int` | `1` |  |  # ← EMPTY
| `current` | `int` | `1` |  |  # ← EMPTY
| `onEachSide` | `int` | `1` |  |  # ← EMPTY
```

**Missing**:
- What do these properties actually control?
- How does pagination link to data fetching?
- Usage example
- How to style pagination
- Mobile-responsive behavior

---

## Medium Priority Gaps

### 5. Data Table `fetch()` Method Scope Unclear

**File**: `docs/data-table.md`, `docs/data-table-actions.md`
**Status**: ⚠️ Partially Documented

Code uses `fetch()` to refresh table:

```blade
<x-plume::button method="DELETE" :href="..." onSuccess="fetch()">
    Delete
</x-plume::button>
```

**Missing Documentation**:
- Is `fetch()` a global function or component method?
- How does it know which table to refresh? (component scope?)
- Can you refresh multiple tables?
- What triggers the refresh? (Component instance? Alpine store?)

**Suggested Fix**: Clarify that `fetch()` is scoped to the component and show nested/multiple table examples.

---

### 6. Form Validation Error Display Not Documented

**Files**: `docs/form.md`, `docs/form-input.md`, etc.
**Status**: ❌ Not Documented

**Missing**:
- How are validation errors from the server displayed?
- What error format does Laravel validator return? (422 response?)
- How to show field-level vs form-level errors?
- Can you customize error messages?
- How long do errors display?

**Current Shop-Front Code** uses validation but doesn't show how errors appear:
```blade
<x-plume::form.input name="sku" label="SKU" required />
```

---

### 7. Form State & Data Binding Not Clearly Explained

**File**: `docs/forms.md`, `docs/form.md`
**Status**: ⚠️ Vague

**Missing**:
- How does `formData` bind to field `model` attributes?
- Relationship between `formData` array keys and `model` names?
- Can you dynamically add/remove form fields?
- Does form state persist across page navigation?
- How to reset form state programmatically?
- How to initialize form with existing data?

**Example from Shop-Front**:
```blade
<x-plume::form
    action="/admin/products/store"
    :formData="Js::from(['sku' => '', 'name' => '', ...])"
>
    <x-plume::form.input model="sku" ... />
</x-plume::form>
```

Why use `Js::from()`? Can you pass PHP arrays directly? Undocumented.

---

### 8. Toast Component Properties Undocumented

**File**: `docs/toast.md`
**Status**: ⚠️ Incomplete

No properties table for the Toast component itself. Properties like `position` are documented but unclear:
- What exactly does each value do?
- How to customize colors/styling?
- Can you set timeout globally?

---

### 9. Modal/Drawer Closing Behavior Unclear

**Files**: `docs/modal.md`, `docs/drawer.md`
**Status**: ⚠️ Partial

**Missing**:
- Does clicking the background close the modal/drawer?
- Does ESC key close it?
- Can you prevent closing? (Unsaved changes?)
- What happens with nested modals?
- Scroll behavior when modal is open?

---

### 10. Data Table Combined Slots & Constructed Columns

**File**: `docs/data-table-columns.md`
**Status**: ⚠️ Incomplete

Docs show slots OR constructed columns, but:

**Missing**:
- Can you mix slots and constructed columns in same table?
- Performance implications of slots vs constructed?
- When to use which approach?
- Can constructed columns call functions?

---

## Low Priority Gaps

### 11. Global Helpers - Advanced Usage

**File**: `docs/global-helpers.md`
**Status**: ⚠️ Basic Examples Only

**Missing**:
- Can you chain multiple helpers?
- Promise/async patterns?
- Error handling for `$copy()` if clipboard access denied?
- Toast options: what all options exist beyond `type`, `title`, `description`, `timeout`?

---

### 12. Form Inline Mode Not Explained

**File**: `docs/form.md`
**Status**: ⚠️ Mentioned but Not Explained

Property exists: `inline` | `bool` | `false`

**Missing**:
- What does inline mode do exactly?
- When to use it vs default?
- Example of inline form

---

### 13. Button Loading State & `button.loader` Component

**File**: `docs/button-loader.md`
**Status**: ⚠️ Minimal

Component exists but barely documented:
- How does button loader work?
- When to use vs regular button?
- Relationship to form submission loaders?

---

### 14. Form Actions Component

**File**: `docs/form-actions.md`
**Status**: ⚠️ Exists but Undocumented

File exists but no content visible. Should document:
- Purpose of form-actions
- When to use vs manual button placement
- Props and styling

---

### 15. Form Group & Form Section

**Files**: `docs/form-group.md`, `docs/form-section.md`
**Status**: ⚠️ Minimal/Undocumented

These organizational components need:
- Examples of when to use
- How they affect form layout
- Props and customization

---

## Documentation Quality Issues

### 16. Inconsistent Property Descriptions

**Status**: ⚠️ Ongoing

Some components have detailed descriptions, others are bare:

**Good** (Button):
```markdown
| `confirm` | `string` | `null` | Native confirmation message to display before action. |
```

**Bad** (Pagination, many form fields):
```markdown
| `total` | `int` | `1` |  |
```

### 17. Missing Real-World Examples

**Status**: ⚠️ Most docs lack context

Current docs show minimal, abstract examples. **Missing**:
- Common use-case examples
- Full workflow examples (upload → preview → submit)
- Error handling in context
- Integration with Laravel validations
- Multi-step form examples

### 18. No Performance or Best Practices Guide

**Status**: ❌ Not Documented

**Missing**:
- When to use client-side vs server-side data tables?
- Performance implications of different approaches?
- Best practices for form validation (client vs server)?
- Optimizing large data tables?
- Memory management with modals/drawers?

---

## Recommendations

### For Users
1. Always check source code (`vendor/deokon/plume/resources/views/components-class/`) for detailed prop usage
2. Use browser dev tools to inspect Alpine.js component state
3. Refer to shop-front implementation as practical examples

### For Plume Maintainers
1. **Priority 1** (Do First):
   - Add descriptions to all form field component properties
   - Document form validation error handling
   - Clarify form state binding and data flow
   - Fix file upload docs with complete lifecycle

2. **Priority 2** (Do Soon):
   - Complete pagination documentation
   - Clarify global helper behaviors
   - Document modal/drawer closing behavior
   - Add real-world examples for common patterns

3. **Priority 3** (Nice to Have):
   - Performance guide
   - Best practices documentation
   - Advanced usage patterns
   - Migration guides

---

## Contributing

To improve Plume documentation, contributors should:
1. Add property descriptions for all components
2. Include practical code examples
3. Document error states and edge cases
4. Add integration examples with Laravel
5. Include accessibility notes where relevant
