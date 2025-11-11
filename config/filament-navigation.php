<?php

return [
    /*
    |--------------------------------------------------------------------------
    | Filament Navigation
    |--------------------------------------------------------------------------
    |
    | Configuration for the Filament admin panel navigation.
    |
    | This file allows you to define the complete navigation structure
    | without having to write PHP code in the AdminPanelProvider.
    |
    | The order of elements in the 'items' array corresponds to the
    | display order in the Filament sidebar.
    |
    */

    /*
    |--------------------------------------------------------------------------
    | Navigation Items
    |--------------------------------------------------------------------------
    |
    | Array containing all navigation elements.
    | Each element must have a 'type' that defines its behavior.
    |
    | Available types:
    |   - 'link'      : Direct link to a page (internal or external)
    |   - 'group'     : Collapsible group containing multiple links
    |   - 'separator' : Visual separator between elements
    |
    */

    'items' => [

        /*
        |--------------------------------------------------------------------------
        | EXAMPLE: Direct Link
        |--------------------------------------------------------------------------
        |
        | Creates a simple link to a page.
        |
        | Parameters:
        |   - type     : 'link' (required)
        |   - label    : Display text (required)
        |   - url      : Target URL (required)
        |   - icon     : Heroicon icon (optional)
        |   - external : true to open in new tab (optional, default: false)
        |
        */
        [
            'type' => 'link',
            'label' => 'Dashboard',
            'url' => '/admin',
            'icon' => 'heroicon-o-home',
        ],

        /*
        |--------------------------------------------------------------------------
        | EXAMPLE: Separator
        |--------------------------------------------------------------------------
        |
        | Creates a visual separator between navigation elements.
        | 24 different styles are available (see full list below).
        |
        | Parameters:
        |   - type  : 'separator' (required)
        |   - style : Separator style (optional, default: 'default')
        |
        */
        [
            'type' => 'separator',
            'style' => 'default',
        ],

        /*
        |--------------------------------------------------------------------------
        | EXAMPLE: Navigation Group
        |--------------------------------------------------------------------------
        |
        | Creates a collapsible group containing multiple links.
        |
        | Parameters:
        |   - type        : 'group' (required)
        |   - label       : Group title (required)
        |   - icon        : Heroicon icon for the group (optional)
        |   - collapsible : true to make the group foldable (optional, default: true)
        |   - items       : Array of group links (required)
        |
        | IMPORTANT - Filament 4 Limitation:
        | You CANNOT have icons on both the group AND its items.
        | Choose one of two options:
        |   - Option 1: Icon on the group, none on items (recommended)
        |   - Option 2: No icon on the group, icons on items
        |
        */
        [
            'type' => 'group',
            'label' => 'Users',
            'icon' => 'heroicon-o-user-group',  // Icon on the group
            'collapsible' => true,
            'items' => [
                [
                    'type' => 'link',
                    'label' => 'All Users',
                    'url' => '/admin/users',
                    // No icon here because the group has one
                ],
                [
                    'type' => 'link',
                    'label' => 'Roles',
                    'url' => '/admin/roles',
                ],
            ],
        ],

        /*
        |--------------------------------------------------------------------------
        | EXAMPLE: Separator with Custom Style
        |--------------------------------------------------------------------------
        */
        [
            'type' => 'separator',
            'style' => 'dots',
        ],

        /*
        |--------------------------------------------------------------------------
        | EXAMPLE: External Link
        |--------------------------------------------------------------------------
        |
        | External links open in a new tab if 'external' is true.
        |
        */
        [
            'type' => 'link',
            'label' => 'Documentation',
            'url' => 'https://filamentphp.com/docs',
            'icon' => 'heroicon-o-book-open',
            'external' => true,  // Opens in a new tab
        ],

    ],

    /*
    |--------------------------------------------------------------------------
    | Available Separator Styles (24 total)
    |--------------------------------------------------------------------------
    |
    | CLASSIC LINES:
    |   'default'    → ───────────        (simple horizontal line)
    |   'long'       → ────────────────    (long horizontal line)
    |   'double'     → ═══════════        (double line)
    |   'thick'      → ━━━━━━━━━━━        (thick line)
    |   'dash'       → - - - - - - - -    (spaced dashes)
    |   'underscore' → ___________        (underscores)
    |
    | DOTS AND CIRCLES:
    |   'dots'          → • • • • • • • •  (round dots)
    |   'circle'        → ○ ○ ○ ○ ○ ○    (empty circles)
    |   'circle-filled' → ● ● ● ● ● ●    (filled circles)
    |   'ellipsis'      → ⋯ ⋯ ⋯ ⋯ ⋯      (ellipsis dots)
    |
    | GEOMETRIC SHAPES:
    |   'square'   → ▪ ▪ ▪ ▪ ▪ ▪        (filled squares)
    |   'diamond'  → ◆ ◆ ◆ ◆ ◆          (diamonds)
    |   'triangle' → ▸ ▸ ▸ ▸ ▸ ▸        (triangles)
    |   'arrow'    → → → → → →          (arrows)
    |   'chevron'  → › › › › › ›        (chevrons)
    |
    | SPECIAL SYMBOLS:
    |   'stars'  → ★ ★ ★ ★ ★            (stars)
    |   'hearts' → ♥ ♥ ♥ ♥ ♥            (hearts)
    |   'plus'   → + + + + + + +        (plus signs)
    |   'cross'  → ✕ ✕ ✕ ✕ ✕            (crosses)
    |
    | WAVES AND CURVES:
    |   'wave'   → ～～～～～～～        (waves)
    |   'wavy'   → 〰〰〰〰〰              (wavy lines)
    |   'zigzag' → ﹏﹏﹏﹏﹏            (zigzag)
    |
    | SPACES:
    |   'space' → (large empty space)
    |   'blank' → · (middle dot, minimal space)
    |
    | Usage example:
    |   ['type' => 'separator', 'style' => 'stars']
    |
    */

];
