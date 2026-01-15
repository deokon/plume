# Plume UI Components Reference

## x-plume::empty-state
Path: `plume/resources/views/components/empty-state.blade.php`

| Prop | Type | Default |
| --- | --- | --- |
| title | `string` | `No results found` |
| description | `string` | `Nothing found here.` |

---

## x-plume::spacer
Path: `plume/resources/views/components/spacer.blade.php`

No props defined.

---

## x-plume::spinner
Path: `plume/resources/views/components/spinner.blade.php`

| Prop | Type | Default |
| --- | --- | --- |
| size | `string` | `md` |
| style | `string` | `default` |

---

## x-plume::badge
Path: `plume/resources/views/components/badge.blade.php`

| Prop | Type | Default |
| --- | --- | --- |
| style | `string` | `default` |

---

## x-plume::toaster
Path: `plume/resources/views/components/toaster.blade.php`

No props defined.

---

## x-plume::gallery
Path: `plume/resources/views/components/gallery.blade.php`

| Prop | Type | Default |
| --- | --- | --- |
| cols | `number` | `3` |
| gap | `number` | `4` |

---

## x-plume::code
Path: `plume/resources/views/components/code.blade.php`

| Prop | Type | Default |
| --- | --- | --- |
| language | `null` | `null` |
| title | `null` | `null` |
| code | `null` | `null` |

---

## x-plume::icon
Path: `plume/resources/views/components/icon.blade.php`

| Prop | Type | Default |
| --- | --- | --- |
| i | `mixed` | `required` |

---

## x-plume::video
Path: `plume/resources/views/components/video.blade.php`

| Prop | Type | Default |
| --- | --- | --- |
| src | `mixed` | `required` |
| poster | `null` | `null` |
| autoplay | `boolean` | `false` |
| controls | `boolean` | `true` |
| loop | `boolean` | `false` |
| muted | `boolean` | `false` |
| aspect | `string` | `video` |

---

## x-plume::figure
Path: `plume/resources/views/components/figure.blade.php`

| Prop | Type | Default |
| --- | --- | --- |
| src | `mixed` | `required` |
| alt | `string` | `` |
| caption | `null` | `null` |
| aspect | `null` | `null` |

---

## x-plume::pagination
Path: `plume/resources/views/components/pagination.blade.php`

| Prop | Type | Default |
| --- | --- | --- |
| total | `number` | `1` |
| current | `number` | `1` |

---

## x-plume::avatar
Path: `plume/resources/views/components/avatar.blade.php`

| Prop | Type | Default |
| --- | --- | --- |
| src | `null` | `null` |
| alt | `string` | `` |
| fallback | `string` | `` |
| size | `string` | `md` |

---

## x-plume::audio
Path: `plume/resources/views/components/audio.blade.php`

| Prop | Type | Default |
| --- | --- | --- |
| src | `mixed` | `required` |
| autoplay | `boolean` | `false` |
| controls | `boolean` | `true` |
| loop | `boolean` | `false` |
| muted | `boolean` | `false` |

---

## x-plume::divider
Path: `plume/resources/views/components/divider.blade.php`

| Prop | Type | Default |
| --- | --- | --- |
| label | `null` | `null` |

---

## x-plume::aspect
Path: `plume/resources/views/components/aspect.blade.php`

| Prop | Type | Default |
| --- | --- | --- |
| ratio | `string` | `video` |

---

## x-plume::tooltip
Path: `plume/resources/views/components/tooltip.blade.php`

| Prop | Type | Default |
| --- | --- | --- |
| text | `mixed` | `required` |
| position | `string` | `top` |

---

## x-plume::skeleton
Path: `plume/resources/views/components/skeleton.blade.php`

No props defined.

---

## x-plume::button-group
Path: `plume/resources/views/components/button-group.blade.php`

| Prop | Type | Default |
| --- | --- | --- |
| size | `string` | `md` |
| stack | `boolean` | `true` |

---

## x-plume::alert
Path: `plume/resources/views/components/alert.blade.php`

| Prop | Type | Default |
| --- | --- | --- |
| icon | `null` | `null` |
| style | `string` | `info` |
| closable | `boolean` | `false` |
| autoclose | `null` | `null` |
| title | `null` | `null` |

---

## x-plume::logo
Path: `plume/resources/views/components/logo/index.blade.php`

| Prop | Type | Default |
| --- | --- | --- |
| size | `string` | `size-6` |

---

## x-plume::command
Path: `plume/resources/views/components/command/index.blade.php`

| Prop | Type | Default |
| --- | --- | --- |
| placeholder | `string` | `Type a command or search...` |
| id | `string` | `\Illuminate\Support\Str::random(8)` |

---

## x-plume::command.group
Path: `plume/resources/views/components/command/group.blade.php`

| Prop | Type | Default |
| --- | --- | --- |
| title | `null` | `null` |

---

## x-plume::command.item
Path: `plume/resources/views/components/command/item.blade.php`

| Prop | Type | Default |
| --- | --- | --- |
| icon | `null` | `null` |
| shortcut | `null` | `null` |

---

## x-plume::card
Path: `plume/resources/views/components/card/index.blade.php`

No props defined.

---

## x-plume::card.title
Path: `plume/resources/views/components/card/title.blade.php`

No props defined.

---

## x-plume::card.content
Path: `plume/resources/views/components/card/content.blade.php`

No props defined.

---

## x-plume::card.header
Path: `plume/resources/views/components/card/header.blade.php`

No props defined.

---

## x-plume::card.description
Path: `plume/resources/views/components/card/description.blade.php`

No props defined.

---

## x-plume::card.footer
Path: `plume/resources/views/components/card/footer.blade.php`

No props defined.

---

## x-plume::tabs
Path: `plume/resources/views/components/tabs/index.blade.php`

| Prop | Type | Default |
| --- | --- | --- |
| default | `number` | `1` |
| side | `string` | `top` |

---

## x-plume::tabs.group
Path: `plume/resources/views/components/tabs/group.blade.php`

No props defined.

---

## x-plume::tabs.item
Path: `plume/resources/views/components/tabs/item.blade.php`

| Prop | Type | Default |
| --- | --- | --- |
| for | `number` | `1` |

---

## x-plume::tabs.panel
Path: `plume/resources/views/components/tabs/panel.blade.php`

| Prop | Type | Default |
| --- | --- | --- |
| for | `number` | `1` |

---

## x-plume::dropdown
Path: `plume/resources/views/components/dropdown/index.blade.php`

| Prop | Type | Default |
| --- | --- | --- |
| align | `string` | `right` |
| width | `number` | `48` |
| contentClasses | `string` | `py-1 bg-background dark:bg-background-800` |

---

## x-plume::dropdown.item
Path: `plume/resources/views/components/dropdown/item.blade.php`

No props defined.

---

## x-plume::dropdown.separator
Path: `plume/resources/views/components/dropdown/separator.blade.php`

No props defined.

---

## x-plume::search
Path: `plume/resources/views/components/search/index.blade.php`

| Prop | Type | Default |
| --- | --- | --- |
| placeholder | `string` | `Search...` |
| model | `null` | `null` |

---

## x-plume::search.result
Path: `plume/resources/views/components/search/result.blade.php`

| Prop | Type | Default |
| --- | --- | --- |
| href | `string` | `#` |
| icon | `null` | `null` |
| title | `mixed` | `required` |

---

## x-plume::stepper
Path: `plume/resources/views/components/stepper/index.blade.php`

| Prop | Type | Default |
| --- | --- | --- |
| active | `number` | `1` |

---

## x-plume::stepper.step
Path: `plume/resources/views/components/stepper/step.blade.php`

| Prop | Type | Default |
| --- | --- | --- |
| step | `mixed` | `required` |
| title | `mixed` | `required` |
| description | `null` | `null` |

---

## x-plume::drawer
Path: `plume/resources/views/components/drawer/index.blade.php`

| Prop | Type | Default |
| --- | --- | --- |
| name | `mixed` | `required` |
| show | `boolean` | `false` |
| side | `string` | `right` |

---

## x-plume::drawer.title
Path: `plume/resources/views/components/drawer/title.blade.php`

No props defined.

---

## x-plume::drawer.content
Path: `plume/resources/views/components/drawer/content.blade.php`

No props defined.

---

## x-plume::drawer.header
Path: `plume/resources/views/components/drawer/header.blade.php`

No props defined.

---

## x-plume::drawer.description
Path: `plume/resources/views/components/drawer/description.blade.php`

No props defined.

---

## x-plume::drawer.footer
Path: `plume/resources/views/components/drawer/footer.blade.php`

No props defined.

---

## x-plume::breadcrumb
Path: `plume/resources/views/components/breadcrumb/index.blade.php`

No props defined.

---

## x-plume::breadcrumb.item
Path: `plume/resources/views/components/breadcrumb/item.blade.php`

| Prop | Type | Default |
| --- | --- | --- |
| href | `null` | `null` |
| active | `boolean` | `false` |

---

## x-plume::breadcrumb.separator
Path: `plume/resources/views/components/breadcrumb/separator.blade.php`

No props defined.

---

## x-plume::modal
Path: `plume/resources/views/components/modal/index.blade.php`

| Prop | Type | Default |
| --- | --- | --- |
| name | `mixed` | `required` |
| show | `boolean` | `false` |
| maxWidth | `string` | `2xl` |

---

## x-plume::modal.title
Path: `plume/resources/views/components/modal/title.blade.php`

No props defined.

---

## x-plume::modal.content
Path: `plume/resources/views/components/modal/content.blade.php`

No props defined.

---

## x-plume::modal.header
Path: `plume/resources/views/components/modal/header.blade.php`

No props defined.

---

## x-plume::modal.description
Path: `plume/resources/views/components/modal/description.blade.php`

No props defined.

---

## x-plume::modal.footer
Path: `plume/resources/views/components/modal/footer.blade.php`

No props defined.

---

## x-plume::table
Path: `plume/resources/views/components/table/index.blade.php`

| Prop | Type | Default |
| --- | --- | --- |
| striped | `boolean` | `false` |

---

## x-plume::table.head
Path: `plume/resources/views/components/table/head.blade.php`

No props defined.

---

## x-plume::table.header
Path: `plume/resources/views/components/table/header.blade.php`

No props defined.

---

## x-plume::table.row
Path: `plume/resources/views/components/table/row.blade.php`

No props defined.

---

## x-plume::table.body
Path: `plume/resources/views/components/table/body.blade.php`

No props defined.

---

## x-plume::table.cell
Path: `plume/resources/views/components/table/cell.blade.php`

No props defined.

---

## x-plume::form
Path: `plume/resources/views/components/form/index.blade.php`

| Prop | Type | Default |
| --- | --- | --- |
| action | `string` | `` |
| method | `string` | `POST` |
| formData | `null` | `null` |

---

## x-plume::form.combobox
Path: `plume/resources/views/components/form/combobox.blade.php`

| Prop | Type | Default |
| --- | --- | --- |
| label | `null` | `null` |
| model | `null` | `null` |
| placeholder | `string` | `Select an option...` |
| options | `string` | `[]` |

---

## x-plume::form.time
Path: `plume/resources/views/components/form/time.blade.php`

| Prop | Type | Default |
| --- | --- | --- |
| label | `null` | `null` |
| name | `null` | `null` |
| id | `null` | `null` |
| model | `null` | `null` |
| value | `string` | `` |

---

## x-plume::form.toggle
Path: `plume/resources/views/components/form/toggle.blade.php`

| Prop | Type | Default |
| --- | --- | --- |
| label | `null` | `null` |
| name | `null` | `null` |
| id | `null` | `null` |
| model | `null` | `null` |
| value | `number` | `1` |
| checked | `boolean` | `false` |

---

## x-plume::form.date
Path: `plume/resources/views/components/form/date.blade.php`

| Prop | Type | Default |
| --- | --- | --- |
| label | `null` | `null` |
| name | `null` | `null` |
| id | `null` | `null` |
| model | `null` | `null` |
| value | `string` | `` |

---

## x-plume::form.password
Path: `plume/resources/views/components/form/password.blade.php`

| Prop | Type | Default |
| --- | --- | --- |
| label | `null` | `null` |
| name | `null` | `null` |
| id | `null` | `null` |
| model | `null` | `null` |
| after | `null` | `null` |

---

## x-plume::form.select
Path: `plume/resources/views/components/form/select.blade.php`

| Prop | Type | Default |
| --- | --- | --- |
| label | `null` | `null` |
| name | `null` | `null` |
| id | `null` | `null` |
| model | `null` | `null` |
| after | `null` | `null` |

---

## x-plume::form.input
Path: `plume/resources/views/components/form/input.blade.php`

| Prop | Type | Default |
| --- | --- | --- |
| label | `null` | `null` |
| name | `null` | `null` |
| id | `null` | `null` |
| type | `string` | `text` |
| model | `null` | `null` |
| value | `string` | `` |
| placeholder | `string` | `` |
| icon | `null` | `null` |
| after | `null` | `null` |

---

## x-plume::form.number
Path: `plume/resources/views/components/form/number.blade.php`

| Prop | Type | Default |
| --- | --- | --- |
| label | `null` | `null` |
| name | `null` | `null` |
| id | `null` | `null` |
| model | `null` | `null` |
| value | `number` | `0` |
| min | `number` | `0` |
| max | `number` | `100` |
| step | `number` | `1` |
| after | `null` | `null` |

---

## x-plume::form.textarea
Path: `plume/resources/views/components/form/textarea.blade.php`

| Prop | Type | Default |
| --- | --- | --- |
| label | `null` | `null` |
| name | `null` | `null` |
| id | `null` | `null` |
| rows | `number` | `3` |
| model | `null` | `null` |
| placeholder | `string` | `` |
| after | `null` | `null` |

---

## x-plume::form.radio
Path: `plume/resources/views/components/form/radio.blade.php`

| Prop | Type | Default |
| --- | --- | --- |
| label | `null` | `null` |
| id | `null` | `null` |
| value | `string` | `` |

---

## x-plume::form.group
Path: `plume/resources/views/components/form/group.blade.php`

| Prop | Type | Default |
| --- | --- | --- |
| label | `null` | `null` |
| description | `string` | `` |
| name | `null` | `null` |
| model | `null` | `null` |
| minCols | `number` | `1` |
| maxCols | `null` | `null` |

---

## x-plume::form.range
Path: `plume/resources/views/components/form/range.blade.php`

| Prop | Type | Default |
| --- | --- | --- |
| label | `null` | `null` |
| name | `null` | `null` |
| id | `null` | `null` |
| model | `null` | `null` |
| min | `number` | `0` |
| max | `number` | `100` |
| step | `number` | `1` |
| value | `null` | `null` |

---

## x-plume::form.section
Path: `plume/resources/views/components/form/section.blade.php`

| Prop | Type | Default |
| --- | --- | --- |
| title | `null` | `null` |
| description | `null` | `null` |
| minCols | `number` | `1` |
| maxCols | `null` | `null` |

---

## x-plume::form.file
Path: `plume/resources/views/components/form/file.blade.php`

| Prop | Type | Default |
| --- | --- | --- |
| label | `null` | `null` |
| name | `null` | `null` |
| id | `null` | `null` |
| model | `null` | `null` |
| helpText | `string` | `PNG` |

---

## x-plume::form.checkbox
Path: `plume/resources/views/components/form/checkbox.blade.php`

| Prop | Type | Default |
| --- | --- | --- |
| label | `null` | `null` |
| id | `null` | `null` |
| value | `string` | `` |

---

## x-plume::form.element
Path: `plume/resources/views/components/form/element.blade.php`

| Prop | Type | Default |
| --- | --- | --- |
| label | `string` | `` |
| name | `null` | `null` |
| id | `null` | `null` |
| model | `null` | `null` |
| after | `null` | `null` |

---

## x-plume::form.actions
Path: `plume/resources/views/components/form/actions.blade.php`

No props defined.

---

## x-plume::form.color
Path: `plume/resources/views/components/form/color.blade.php`

| Prop | Type | Default |
| --- | --- | --- |
| label | `null` | `null` |
| name | `null` | `null` |
| id | `null` | `null` |
| model | `null` | `null` |
| value | `string` | `#000000` |

---

## x-plume::form.inline
Path: `plume/resources/views/components/form/inline.blade.php`

No props defined.

---

## x-plume::form.datetime
Path: `plume/resources/views/components/form/datetime.blade.php`

| Prop | Type | Default |
| --- | --- | --- |
| label | `null` | `null` |
| name | `null` | `null` |
| id | `null` | `null` |
| model | `null` | `null` |
| value | `string` | `` |

---

## x-plume::progress
Path: `plume/resources/views/components/progress/index.blade.php`

| Prop | Type | Default |
| --- | --- | --- |
| value | `number` | `0` |
| max | `number` | `100` |
| style | `string` | `default` |
| title | `null` | `null` |
| model | `null` | `null` |
| display | `string` | `percentage` |

---

## x-plume::progress.percent
Path: `plume/resources/views/components/progress/percent.blade.php`

| Prop | Type | Default |
| --- | --- | --- |
| value | `number` | `0` |
| title | `null` | `null` |
| model | `null` | `null` |
| style | `string` | `default` |

---

## x-plume::accordion
Path: `plume/resources/views/components/accordion/index.blade.php`

| Prop | Type | Default |
| --- | --- | --- |
| alwaysOpen | `boolean` | `false` |

---

## x-plume::accordion.item
Path: `plume/resources/views/components/accordion/item.blade.php`

| Prop | Type | Default |
| --- | --- | --- |
| title | `mixed` | `required` |
| id | `string` | `\Illuminate\Support\Str::random(8)` |
| open | `boolean` | `false` |

---

## x-plume::button
Path: `plume/resources/views/components/button/index.blade.php`

| Prop | Type | Default |
| --- | --- | --- |
| href | `null` | `null` |
| icon | `null` | `null` |
| fullWidth | `boolean` | `false` |

---

## x-plume::button.loader
Path: `plume/resources/views/components/button/loader.blade.php`

| Prop | Type | Default |
| --- | --- | --- |
| var | `mixed` | `required` |
| size | `string` | `md` |
| style | `null` | `null` |

---

## x-plume::button.toggle
Path: `plume/resources/views/components/button/toggle.blade.php`

| Prop | Type | Default |
| --- | --- | --- |
| var | `mixed` | `required` |
| size | `string` | `md` |
| style | `null` | `null` |
| offStyle | `null` | `null` |
| on | `null` | `null` |
| off | `null` | `null` |
| click | `null` | `null` |

---

