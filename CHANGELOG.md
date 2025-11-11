# Changelog

All notable changes to `shuxx/filament-navigation` will be documented in this file.

The format is based on [Keep a Changelog](https://keepachangelog.com/en/1.0.0/),
and this project adheres to [Semantic Versioning](https://semver.org/spec/v2.0.0.html).

## [1.0.0] - 2025-01-XX

### Added

#### Core Features
- **Config-driven Navigation** - Define entire Filament navigation structure via `config/filament-navigation.php`
- **Three Navigation Types**:
  - `link` - Direct links to pages (internal or external)
  - `group` - Collapsible groups containing multiple links
  - `separator` - Visual separators with 24 different styles
- **Order Preservation** - Array order in config = display order in sidebar
- **External Link Support** - `'external' => true` opens links in new tab

#### Separator Styles (24 total)
- **Classic Lines**: `default`, `long`, `double`, `thick`, `dash`, `underscore`
- **Dots & Circles**: `dots`, `circle`, `circle-filled`, `ellipsis`
- **Geometric Shapes**: `square`, `diamond`, `triangle`, `arrow`, `chevron`
- **Special Symbols**: `stars`, `hearts`, `plus`, `cross`
- **Waves & Curves**: `wave`, `wavy`, `zigzag`
- **Spaces**: `space`, `blank`

#### Technical Features
- **Automatic Hover Disable** - Separators have no hover effect by default (customizable)
- **Icon Support** - Full Heroicon support for groups and items
- **Filament 4 Compatibility** - Built specifically for Filament 4.x
- **Laravel 11 & 12 Support** - Compatible with both Laravel versions
- **Auto-discovery** - Service provider automatically discovered by Laravel

#### Workarounds for Filament 4 Limitations
- **Order Control** - Transforms everything into NavigationGroups to maintain order (Filament displays all groups first, then all items)
- **Icon Limitation** - Documentation and examples clarify you cannot have icons on both group AND items

#### Developer Experience
- **spatie/laravel-package-tools Integration** - Simplified service provider
- **Comprehensive Documentation**:
  - Detailed README with installation, usage, and all 24 separator styles
  - EXAMPLES.md with 5 real-world application examples (Blog, E-commerce, SaaS, CRM, Project Management)
  - Inline code documentation in English
  - Configuration file with extensive comments and examples
- **Professional Package Structure** - Based on official Filament plugin skeleton
- **Testing Infrastructure** - Pest test framework ready
- **Code Quality Tools** - PHPStan, Laravel Pint configured
- **CI/CD Ready** - GitHub Actions workflows included

#### Plugin Configuration
- **Customizable Hover Behavior**:
  ```php
  FilamentNavigationPlugin::make()
      ->disableSeparatorHover(false) // Enable hover on separators
  ```

#### Service Provider Features
- **Config Publishing** - `php artisan vendor:publish --tag="filament-navigation-config"`
- **Config Merging** - Automatically merges with application config
- **CSS Injection** - Custom CSS injected via `panels::head.end` renderHook (no Vite compilation needed)

### Notes

#### Filament 4 Known Limitations
- **Icon Restriction**: You cannot have icons on both the group AND its items
  - **Option 1** (recommended): Icon on group, no icons on items
  - **Option 2**: No icon on group, icons on items
- **Display Order**: Filament 4 displays all groups first, then all direct items
  - **Plugin Solution**: Transforms everything into groups (links become non-collapsible single-item groups)

#### Requirements
- PHP 8.1, 8.2, or 8.3
- Laravel 11.x or 12.x
- Filament 4.x

---

## Release History

### [1.0.0] - 2025-01-XX
Initial release with full feature set.

---

For detailed usage examples, see [EXAMPLES.md](EXAMPLES.md).
For installation and setup, see [README.md](README.md).
