# Stepper

Guide users through multi-step processes.

## Overview

The Stepper component breaks down a complex task into smaller, manageable steps, providing a clear indication of progress.

## Properties

### Stepper (Container)

| Prop | Type | Default | Description |
| :--- | :--- | :--- | :--- |
| `active` | `number` | `1` | The current active step number. |

### Stepper Step

| Prop | Type | Default | Description |
| :--- | :--- | :--- | :--- |
| `step` | `number` | `null` | **Required.** This step's number. |
| `title` | `string` | `null` | Heading for the step. |
| `description` | `string` | `null` | Subtitle for the step. |

## Usage

### Multi-step Form

```blade
<div x-data="{ step: 1 }">
    <x-plume::stepper :active="step">
        <x-plume::stepper.step :step="1" title="Account" description="Enter your email.">
            <!-- Step 1 Content -->
            <x-plume::stepper.actions next="step = 2" />
        </x-plume::stepper.step>

        <x-plume::stepper.step :step="2" title="Profile" description="Tell us about yourself.">
            <!-- Step 2 Content -->
            <x-plume::stepper.actions prev="step = 1" next="step = 3" />
        </x-plume::stepper.step>

        <x-plume::stepper.step :step="3" title="Finish">
            <p>All set!</p>
            <x-plume::stepper.actions prev="step = 2" />
        </x-plume::stepper.step>
    </x-plume::stepper>
</div>
```
