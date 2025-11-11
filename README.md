# Filament Navigation

<p align="center">
    <img src="https://raw.githubusercontent.com/shuxx/filament-navigation/main/.github/images/banner.png" alt="Filament Navigation Banner" width="600">
</p>

<p align="center">
    <a href="https://packagist.org/packages/shuxx/filament-navigation"><img src="https://img.shields.io/packagist/v/shuxx/filament-navigation.svg?style=for-the-badge" alt="Latest Version"></a>
    <a href="https://packagist.org/packages/shuxx/filament-navigation"><img src="https://img.shields.io/packagist/dt/shuxx/filament-navigation.svg?style=for-the-badge" alt="Total Downloads"></a>
    <a href="https://packagist.org/packages/shuxx/filament-navigation"><img src="https://img.shields.io/packagist/l/shuxx/filament-navigation.svg?style=for-the-badge" alt="License"></a>
    <a href="https://github.com/shuxx/filament-navigation/actions/workflows/run-tests.yml"><img src="https://img.shields.io/github/actions/workflow/status/shuxx/filament-navigation/run-tests.yml?branch=main&label=Tests&style=for-the-badge" alt="Tests"></a>
    <a href="https://github.com/shuxx/filament-navigation/actions/workflows/phpstan.yml"><img src="https://img.shields.io/github/actions/workflow/status/shuxx/filament-navigation/phpstan.yml?branch=main&label=PHPStan&style=for-the-badge" alt="PHPStan"></a>
</p>

<p align="center">
    Configure your Filament navigation via a simple PHP configuration file - no manual navigation building required!
</p>

<p align="center">
    Perfect for applications where navigation needs to be easily manageable, version-controlled, and consistent across environments.
</p>

---

## ✨ Features

- ✅ **Simple Configuration** - Define navigation in a clean PHP config file
- ✅ **Full Control** - Groups, direct links, and visual separators
- ✅ **24 Separator Styles** - From classic lines to hearts and stars
- ✅ **Order Preservation** - Array order = display order
- ✅ **External Links** - Support for external URLs with `target="_blank"`
- ✅ **Icon Support** - Full Heroicon support for groups and items
- ✅ **No Hover on Separators** - Automatically disables hover effects
- ✅ **Filament 4 Compatible** - Built specifically for Filament 4.x

## 📦 Installation

Install via composer:

```bash
composer require shuxx/filament-navigation
```

Publish the configuration file:

```bash
php artisan vendor:publish --tag="filament-navigation-config"
```

This creates `config/filament-navigation.php`.

## 🚀 Quick Start

### 1. Register the plugin

In `app/Providers/Filament/AdminPanelProvider.php`:

```php
use Shuxx\FilamentNavigation\FilamentNavigationPlugin;

public function panel(Panel $panel): Panel
{
    return $panel
        ->plugin(FilamentNavigationPlugin::make());
}
```

### 2. Configure your navigation

Edit `config/filament-navigation.php`:

```php
return [
    'items' => [
        // Dashboard
        [
            'type' => 'link',
            'label' => 'Dashboard',
            'url' => '/admin',
            'icon' => 'heroicon-o-home',
        ],

        // Separator
        ['type' => 'separator', 'style' => 'default'],

        // Users Group
        [
            'type' => 'group',
            'label' => 'Users',
            'icon' => 'heroicon-o-user-group',
            'collapsible' => true,
            'items' => [
                ['type' => 'link', 'label' => 'All Users', 'url' => '/admin/users'],
                ['type' => 'link', 'label' => 'Roles', 'url' => '/admin/roles'],
            ],
        ],

        ['type' => 'separator', 'style' => 'dots'],

        // External link
        [
            'type' => 'link',
            'label' => 'Documentation',
            'url' => 'https://filamentphp.com/docs',
            'icon' => 'heroicon-o-book-open',
            'external' => true,
        ],
    ],
];
```

That's it! Your navigation is now configured. 🎉

## 📖 Documentation

### Available Types

#### Group
Creates a collapsible navigation group:

```php
[
    'type' => 'group',
    'label' => 'Settings',
    'icon' => 'heroicon-o-cog-6-tooth',
    'collapsible' => true,  // optional, default: true
    'items' => [
        // ... sub-items
    ],
]
```

#### Link
Creates a navigation link:

```php
[
    'type' => 'link',
    'label' => 'Dashboard',
    'url' => '/admin/dashboard',
    'icon' => 'heroicon-o-home',  // optional
    'external' => false,  // optional, opens in new tab if true
]
```

#### Separator
Creates a visual separator:

```php
[
    'type' => 'separator',
    'style' => 'default',  // optional, see styles below
]
```

### 🎨 Separator Styles (24 options)

#### Classic Lines
- `default` → ───────────
- `long` → ────────────────
- `double` → ═══════════
- `thick` → ━━━━━━━━━━━
- `dash` → - - - - - - - -
- `underscore` → ___________

#### Dots and Circles
- `dots` → • • • • • • • •
- `circle` → ○ ○ ○ ○ ○ ○
- `circle-filled` → ● ● ● ● ● ●
- `ellipsis` → ⋯ ⋯ ⋯ ⋯ ⋯

#### Geometric Shapes
- `square` → ▪ ▪ ▪ ▪ ▪ ▪
- `diamond` → ◆ ◆ ◆ ◆ ◆
- `triangle` → ▸ ▸ ▸ ▸ ▸ ▸
- `arrow` → → → → → →
- `chevron` → › › › › › ›

#### Special Symbols
- `stars` → ★ ★ ★ ★ ★
- `hearts` → ♥ ♥ ♥ ♥ ♥
- `plus` → + + + + + + +
- `cross` → ✕ ✕ ✕ ✕ ✕

#### Waves and Curves
- `wave` → ～～～～～～～
- `wavy` → 〰〰〰〰〰
- `zigzag` → ﹏﹏﹏﹏﹏

#### Spaces
- `space` → (large empty space)
- `blank` → · (minimal visible space)

### Plugin Options

#### Disable Separator Hover

By default, separators have hover effects disabled. You can enable them:

```php
FilamentNavigationPlugin::make()
    ->disableSeparatorHover(false)
```

## ⚠️ Important Notes

### Filament 4 Icon Limitation

In Filament 4, you **cannot** have icons on both the group AND its items. Choose one:

**Option 1 - Icons on groups (recommended):**
```php
[
    'type' => 'group',
    'icon' => 'heroicon-o-user-group',  // ✅ Icon here
    'items' => [
        ['label' => 'Users', 'url' => '...'],  // ❌ No icons
    ],
]
```

**Option 2 - Icons on items:**
```php
[
    'type' => 'group',
    // ❌ No icon on group
    'items' => [
        ['label' => 'Users', 'icon' => 'heroicon-o-users'],  // ✅ Icons here
    ],
]
```

### Navigation Order

The order of items in your config array **is** the display order. The plugin transforms everything into navigation groups internally to maintain order control (a Filament 4 requirement).

## 🧪 Testing

```bash
composer test
```

## 📝 Changelog

Please see [CHANGELOG](CHANGELOG.md) for recent changes.

## 📚 Documentation

- **[Installation Guide](#-quick-start)** - Get started in minutes
- **[Usage Examples](EXAMPLES.md)** - Real-world navigation configs (Blog, E-commerce, SaaS, CRM, etc.)
- **[Separator Styles](#-separator-styles-24-options)** - All 24 available styles
- **[API Reference](#-documentation)** - Complete configuration options
- **[Changelog](CHANGELOG.md)** - Version history and updates

## 🤝 Contributing

Contributions are welcome! Please see [CONTRIBUTING](CONTRIBUTING.md) for details on:
- Reporting bugs
- Suggesting features
- Submitting pull requests
- Development guidelines

## 💬 Support

Need help or have questions?

- **📖 Documentation** - Check [EXAMPLES.md](EXAMPLES.md) for common use cases
- **🐛 Issues** - [Report bugs or request features](https://github.com/shuxx/filament-navigation/issues)
- **💡 Discussions** - [Ask questions or share ideas](https://github.com/shuxx/filament-navigation/discussions)
- **📧 Email** - Contact the author at [github.com/shuxx](https://github.com/shuxx)

## 🔒 Security

If you discover any security-related issues, please email the author directly instead of using the issue tracker. All security vulnerabilities will be promptly addressed.

## 💝 Credits

- **Author**: [Shuxx](https://github.com/shuxx)
- **Contributors**: [All Contributors](https://github.com/shuxx/filament-navigation/contributors)
- **Inspired by**: [Filament](https://filamentphp.com) navigation system
- **Built with**: [spatie/laravel-package-tools](https://github.com/spatie/laravel-package-tools)

## 📄 License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.

---

<p align="center">
    <b>Made with ❤️ for the Filament community</b>
</p>

<p align="center">
    <a href="https://github.com/shuxx/filament-navigation">⭐ Star this repo</a> if you find it helpful!
</p>
