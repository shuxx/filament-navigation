<?php

namespace Shuxx\FilamentNavigation;

use Filament\Contracts\Plugin;
use Filament\Navigation\NavigationBuilder;
use Filament\Navigation\NavigationGroup;
use Filament\Navigation\NavigationItem;
use Filament\Panel;

/**
 * Filament Navigation Plugin - Configurable via PHP file
 *
 * This plugin allows you to configure Filament navigation via a simple configuration file
 * instead of manually building navigation in code. It supports:
 * - Collapsible navigation groups
 * - Direct links (internal and external)
 * - 24 visual separator styles
 * - Order preservation of elements
 * - Automatic hover effect disable on separators
 *
 * @package Shuxx\FilamentNavigation
 * @author Shuxx
 * @link https://github.com/shuxx/filament-navigation
 */
class FilamentNavigationPlugin implements Plugin
{
    /**
     * Enable or disable hover effect on separators
     *
     * Default is true to prevent separators from reacting to mouse hover.
     * Can be modified via the disableSeparatorHover() method
     *
     * @var bool
     */
    protected bool $disableSeparatorHover = true;

    /**
     * Returns the unique plugin identifier
     *
     * This ID is used by Filament to uniquely identify the plugin.
     *
     * @return string The plugin identifier
     */
    public function getId(): string
    {
        return 'filament-navigation';
    }

    /**
     * Registers the plugin in the Filament panel
     *
     * This method is called during plugin registration.
     * It configures:
     * 1. Navigation from config file
     * 2. CSS to disable hover on separators (if enabled)
     *
     * @param Panel $panel The Filament panel in which to register the plugin
     * @return void
     */
    public function register(Panel $panel): void
    {
        // Configure navigation from config/filament-navigation.php file
        $panel->navigation(function (NavigationBuilder $builder) {
            return $this->buildNavigationFromConfig($builder);
        });

        // Inject CSS to disable hover on separators
        if ($this->disableSeparatorHover) {
            $panel->renderHook(
                'panels::head.end',
                fn (): string => '<style>
                    /* Disable hover effect on separators (links with href="#") */
                    nav a[href="#"] {
                        pointer-events: none !important;
                        cursor: default !important;
                    }
                    nav a[href="#"]:hover {
                        background-color: transparent !important;
                    }
                </style>'
            );
        }
    }

    /**
     * Plugin boot method (currently empty)
     *
     * This method is called after plugin registration.
     * It can be used to perform additional actions.
     *
     * @param Panel $panel The Filament panel
     * @return void
     */
    public function boot(Panel $panel): void
    {
        //
    }

    /**
     * Creates a new plugin instance
     *
     * Static factory method to instantiate the plugin fluently.
     * Used in AdminPanelProvider::panel():
     * ->plugin(FilamentNavigationPlugin::make())
     *
     * @return static New plugin instance
     */
    public static function make(): static
    {
        return new static();
    }

    /**
     * Enable or disable hover effect on separators
     *
     * By default, separators have no hover effect to improve UX.
     * This method allows you to change this behavior.
     *
     * Usage example:
     * FilamentNavigationPlugin::make()
     *     ->disableSeparatorHover(false) // Enable hover
     *
     * @param bool $disable True to disable hover, false to enable it
     * @return static Current instance for chaining
     */
    public function disableSeparatorHover(bool $disable = true): static
    {
        $this->disableSeparatorHover = $disable;

        return $this;
    }

    /**
     * Builds navigation from configuration file
     *
     * IMPORTANT - Filament 4 Limitation:
     * Filament displays ALL groups first, then ALL direct items.
     * To control display order, this method transforms EVERYTHING into groups:
     * - Links become non-collapsible groups with a single item
     * - Separators become non-collapsible groups with an empty item
     * - Groups remain as normal groups
     *
     * This allows respecting the order defined in the configuration array.
     *
     * @param NavigationBuilder $builder The Filament navigation builder
     * @return NavigationBuilder The builder with configured groups
     */
    protected function buildNavigationFromConfig(NavigationBuilder $builder): NavigationBuilder
    {
        // Retrieve items from config/filament-navigation.php
        $items = config('filament-navigation.items', []);
        $groups = [];

        // Process each configuration element
        foreach ($items as $item) {
            $type = $item['type'] ?? 'link';

            // === SEPARATOR ===
            if ($type === 'separator') {
                $style = $item['style'] ?? 'default';

                // Select the Unicode character corresponding to the style
                $separatorLabel = match($style) {
                    // Classic lines
                    'default' => '───────────',      // Simple horizontal line
                    'long' => '────────────────',    // Long horizontal line
                    'double' => '═══════════',       // Double line
                    'thick' => '━━━━━━━━━━━',        // Thick line
                    'dash' => '- - - - - - - -',     // Spaced dashes
                    'underscore' => '___________',   // Underscores

                    // Dots and circles
                    'dots' => '• • • • • • • •',           // Round dots
                    'circle' => '○ ○ ○ ○ ○ ○',           // Empty circles
                    'circle-filled' => '● ● ● ● ● ●',    // Filled circles
                    'ellipsis' => '⋯ ⋯ ⋯ ⋯ ⋯',          // Centered ellipsis

                    // Geometric shapes
                    'square' => '▪ ▪ ▪ ▪ ▪ ▪',     // Filled squares
                    'diamond' => '◆ ◆ ◆ ◆ ◆',      // Diamonds
                    'triangle' => '▸ ▸ ▸ ▸ ▸ ▸',   // Right-pointing triangles
                    'arrow' => '→ → → → → →',      // Arrows
                    'chevron' => '› › › › › ›',    // Chevrons

                    // Special symbols
                    'stars' => '★ ★ ★ ★ ★',         // Stars
                    'hearts' => '♥ ♥ ♥ ♥ ♥',        // Hearts
                    'plus' => '+ + + + + + +',      // Plus signs
                    'cross' => '✕ ✕ ✕ ✕ ✕',        // Crosses

                    // Waves and curves
                    'wave' => '～～～～～～～',      // Waves
                    'wavy' => '〰〰〰〰〰',           // Wavy lines
                    'zigzag' => '﹏﹏﹏﹏﹏',        // Zigzag

                    // Spaces
                    'space' => '　　　　　　',       // Wide spaces (Unicode full-width space)
                    'blank' => '·',                  // Middle dot (minimal)
                };

                // Create a navigation item for the separator
                // href="#" will be targeted by CSS to disable hover
                $separatorItem = NavigationItem::make($separatorLabel)
                    ->url('#')
                    ->icon(null);

                // Wrap in an empty non-collapsible group
                $groups[] = NavigationGroup::make('')
                    ->items([$separatorItem])
                    ->icon(null)
                    ->collapsible(false);

            // === NAVIGATION GROUP ===
            } elseif ($type === 'group') {
                $groupItems = [];

                // Build group sub-items
                if (isset($item['items']) && is_array($item['items'])) {
                    foreach ($item['items'] as $subitem) {
                        // Create each group item
                        $navItem = NavigationItem::make(__($subitem['label']) ?? 'Item')
                            ->url($subitem['url'] ?? '#')
                            ->icon($subitem['icon'] ?? null);

                        // External link? Open in new tab
                        if ($subitem['external'] ?? false) {
                            $navItem->openUrlInNewTab();
                        }

                        $groupItems[] = $navItem;
                    }
                }

                // Create the group with its items
                $groups[] = NavigationGroup::make(__($item['label']) ?? 'Group')
                    ->items($groupItems)
                    ->icon($item['icon'] ?? null)
                    ->collapsible($item['collapsible'] ?? true);

            // === DIRECT LINK ===
            } elseif ($type === 'link') {
                // Create the navigation item
                $navItem = NavigationItem::make(__($item['label']) ?? 'Link')
                    ->url($item['url'] ?? '#')
                    ->icon($item['icon'] ?? null);

                // External link? Open in new tab
                if ($item['external'] ?? false) {
                    $navItem->openUrlInNewTab();
                }

                // Transform into non-collapsible group with a single item
                // to maintain display order
                $groups[] = NavigationGroup::make('')
                    ->items([$navItem])
                    ->icon(null)
                    ->collapsible(false);
            }
        }

        // Apply all groups to the builder
        $builder->groups($groups);

        return $builder;
    }
}
