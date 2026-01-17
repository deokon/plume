# Plume Release & Update Process

This document outlines the standard workflow for releasing new versions of the Plume UI library.

## 1. Versioning Strategy
We follow [Semantic Versioning (SemVer)](https://semver.org/):
- **MAJOR:** Incompatible API changes.
- **MINOR:** Functionality added in a backwards-compatible manner (e.g., new components).
- **PATCH:** Backwards-compatible bug fixes.

## 2. Pre-Release Checklist
Before tagging a release, the following automation must pass:
1. **Audit:** Run `Audit component consistency` and `Check accessibility`.
2. **Metadata:** Run `Sync metadata` to ensure `plume-api.json` and `COMPONENTS.md` are current.
3. **Tests:** All PEST tests in `plume` must pass.
4. **Workbench:** All documentation pages in `plume-workbench` must render without errors.

## 3. Release Workflow

### Step 1: Prepare the Changelog
Update `plume/CHANGELOG.md`. Group changes by:
- **Features:** New components or magic helpers.
- **Fixes:** Bug fixes or accessibility improvements.
- **Docs:** Updates to documentation or workbench examples.

*Note: Since we use Conventional Commits, this can be automated by parsing commit messages between the current `HEAD` and the last tag.*

### Step 2: Tag the Release
Create a new git tag in the `plume` repository:
```bash
git tag -a v1.x.x -m "Release version 1.x.x"
git push origin v1.x.x
```

### Step 3: GitHub Release
Create a GitHub Release for the new tag.
- Copy the relevant section of the `CHANGELOG.md` into the release notes.
- GitHub will automatically handle the source code archives.

### Step 4: Update the Workbench
To ensure the documentation site reflects the latest release:
1. Update the `deokon/plume` version in `plume-workbench/composer.json` (if not using path repositories for production).
2. Create a "What's New" or "Releases" page in the Workbench that pulls content from `plume/CHANGELOG.md`.
3. Clear the Workbench view cache: `php artisan view:clear`.

## 4. Automation via "Prepare release"
When the "Prepare release" command is triggered, the agent will:
1. Perform all steps in the **Pre-Release Checklist**.
2. Generate a draft for `CHANGELOG.md` based on commits since the last tag.
3. Suggest the next version number (Patch/Minor/Major).
4. **Wait for user approval** before tagging or modifying `composer.json`.
