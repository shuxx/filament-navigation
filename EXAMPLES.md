# Filament Navigation - Usage Examples

This document provides real-world examples of how to configure your Filament navigation for different types of applications.

## Table of Contents

- [Simple Blog](#simple-blog)
- [E-Commerce Platform](#e-commerce-platform)
- [SaaS Multi-Tenant Application](#saas-multi-tenant-application)
- [CRM System](#crm-system)
- [Project Management Tool](#project-management-tool)
- [Advanced Styling Examples](#advanced-styling-examples)

---

## Simple Blog

Perfect for a basic blog or content management system.

```php
// config/filament-navigation.php

return [
    'items' => [
        // Dashboard
        [
            'type' => 'link',
            'label' => 'Dashboard',
            'url' => '/admin',
            'icon' => 'heroicon-o-home',
        ],

        ['type' => 'separator', 'style' => 'default'],

        // Content Management
        [
            'type' => 'group',
            'label' => 'Content',
            'icon' => 'heroicon-o-document-text',
            'collapsible' => true,
            'items' => [
                ['type' => 'link', 'label' => 'Posts', 'url' => '/admin/posts'],
                ['type' => 'link', 'label' => 'Categories', 'url' => '/admin/categories'],
                ['type' => 'link', 'label' => 'Tags', 'url' => '/admin/tags'],
            ],
        ],

        // Media
        [
            'type' => 'group',
            'label' => 'Media',
            'icon' => 'heroicon-o-photo',
            'collapsible' => true,
            'items' => [
                ['type' => 'link', 'label' => 'Images', 'url' => '/admin/media'],
                ['type' => 'link', 'label' => 'Files', 'url' => '/admin/files'],
            ],
        ],

        ['type' => 'separator', 'style' => 'dots'],

        // Settings
        [
            'type' => 'group',
            'label' => 'Settings',
            'icon' => 'heroicon-o-cog-6-tooth',
            'collapsible' => true,
            'items' => [
                ['type' => 'link', 'label' => 'Users', 'url' => '/admin/users'],
                ['type' => 'link', 'label' => 'Site Settings', 'url' => '/admin/settings'],
            ],
        ],
    ],
];
```

---

## E-Commerce Platform

Comprehensive navigation for an online store.

```php
// config/filament-navigation.php

return [
    'items' => [
        // Dashboard
        [
            'type' => 'link',
            'label' => 'Dashboard',
            'url' => '/admin',
            'icon' => 'heroicon-o-chart-bar',
        ],

        ['type' => 'separator', 'style' => 'diamond'],

        // Catalog
        [
            'type' => 'group',
            'label' => 'Catalog',
            'icon' => 'heroicon-o-shopping-bag',
            'collapsible' => true,
            'items' => [
                ['type' => 'link', 'label' => 'Products', 'url' => '/admin/products'],
                ['type' => 'link', 'label' => 'Categories', 'url' => '/admin/categories'],
                ['type' => 'link', 'label' => 'Brands', 'url' => '/admin/brands'],
                ['type' => 'link', 'label' => 'Inventory', 'url' => '/admin/inventory'],
            ],
        ],

        // Orders & Sales
        [
            'type' => 'group',
            'label' => 'Sales',
            'icon' => 'heroicon-o-shopping-cart',
            'collapsible' => true,
            'items' => [
                ['type' => 'link', 'label' => 'Orders', 'url' => '/admin/orders'],
                ['type' => 'link', 'label' => 'Invoices', 'url' => '/admin/invoices'],
                ['type' => 'link', 'label' => 'Refunds', 'url' => '/admin/refunds'],
                ['type' => 'link', 'label' => 'Coupons', 'url' => '/admin/coupons'],
            ],
        ],

        // Customers
        [
            'type' => 'group',
            'label' => 'Customers',
            'icon' => 'heroicon-o-user-group',
            'collapsible' => true,
            'items' => [
                ['type' => 'link', 'label' => 'All Customers', 'url' => '/admin/customers'],
                ['type' => 'link', 'label' => 'Reviews', 'url' => '/admin/reviews'],
                ['type' => 'link', 'label' => 'Wishlists', 'url' => '/admin/wishlists'],
            ],
        ],

        ['type' => 'separator', 'style' => 'circle-filled'],

        // Marketing
        [
            'type' => 'group',
            'label' => 'Marketing',
            'icon' => 'heroicon-o-megaphone',
            'collapsible' => true,
            'items' => [
                ['type' => 'link', 'label' => 'Campaigns', 'url' => '/admin/campaigns'],
                ['type' => 'link', 'label' => 'Newsletter', 'url' => '/admin/newsletter'],
                ['type' => 'link', 'label' => 'Promotions', 'url' => '/admin/promotions'],
            ],
        ],

        // Reports
        [
            'type' => 'group',
            'label' => 'Reports',
            'icon' => 'heroicon-o-chart-pie',
            'collapsible' => true,
            'items' => [
                ['type' => 'link', 'label' => 'Sales Report', 'url' => '/admin/reports/sales'],
                ['type' => 'link', 'label' => 'Products Report', 'url' => '/admin/reports/products'],
                ['type' => 'link', 'label' => 'Customers Report', 'url' => '/admin/reports/customers'],
            ],
        ],

        ['type' => 'separator', 'style' => 'chevron'],

        // System
        [
            'type' => 'group',
            'label' => 'System',
            'icon' => 'heroicon-o-cog-6-tooth',
            'collapsible' => true,
            'items' => [
                ['type' => 'link', 'label' => 'Settings', 'url' => '/admin/settings'],
                ['type' => 'link', 'label' => 'Users & Roles', 'url' => '/admin/users'],
                ['type' => 'link', 'label' => 'Tax Rules', 'url' => '/admin/tax-rules'],
                ['type' => 'link', 'label' => 'Shipping', 'url' => '/admin/shipping'],
            ],
        ],

        ['type' => 'separator', 'style' => 'dots'],

        // External Resources
        [
            'type' => 'link',
            'label' => 'Documentation',
            'url' => 'https://docs.example.com',
            'icon' => 'heroicon-o-book-open',
            'external' => true,
        ],

        [
            'type' => 'link',
            'label' => 'Support',
            'url' => 'https://support.example.com',
            'icon' => 'heroicon-o-life-buoy',
            'external' => true,
        ],
    ],
];
```

---

## SaaS Multi-Tenant Application

Navigation structure for a SaaS platform with multi-tenancy.

```php
// config/filament-navigation.php

return [
    'items' => [
        // Dashboard
        [
            'type' => 'link',
            'label' => 'Dashboard',
            'url' => '/admin',
            'icon' => 'heroicon-o-home',
        ],

        ['type' => 'separator', 'style' => 'stars'],

        // Workspace
        [
            'type' => 'group',
            'label' => 'Workspace',
            'icon' => 'heroicon-o-briefcase',
            'collapsible' => false,
            'items' => [
                ['type' => 'link', 'label' => 'Projects', 'url' => '/admin/projects'],
                ['type' => 'link', 'label' => 'Tasks', 'url' => '/admin/tasks'],
                ['type' => 'link', 'label' => 'Documents', 'url' => '/admin/documents'],
            ],
        ],

        // Team
        [
            'type' => 'group',
            'label' => 'Team',
            'icon' => 'heroicon-o-user-group',
            'collapsible' => true,
            'items' => [
                ['type' => 'link', 'label' => 'Members', 'url' => '/admin/team/members'],
                ['type' => 'link', 'label' => 'Invitations', 'url' => '/admin/team/invitations'],
                ['type' => 'link', 'label' => 'Roles', 'url' => '/admin/team/roles'],
            ],
        ],

        ['type' => 'separator', 'style' => 'circle-filled'],

        // Subscription & Billing
        [
            'type' => 'group',
            'label' => 'Billing',
            'icon' => 'heroicon-o-credit-card',
            'collapsible' => true,
            'items' => [
                ['type' => 'link', 'label' => 'Subscription', 'url' => '/admin/subscription'],
                ['type' => 'link', 'label' => 'Invoices', 'url' => '/admin/invoices'],
                ['type' => 'link', 'label' => 'Payment Methods', 'url' => '/admin/payment-methods'],
            ],
        ],

        // Settings
        [
            'type' => 'group',
            'label' => 'Settings',
            'icon' => 'heroicon-o-cog-6-tooth',
            'collapsible' => true,
            'items' => [
                ['type' => 'link', 'label' => 'Organization', 'url' => '/admin/settings/organization'],
                ['type' => 'link', 'label' => 'Integrations', 'url' => '/admin/settings/integrations'],
                ['type' => 'link', 'label' => 'Notifications', 'url' => '/admin/settings/notifications'],
                ['type' => 'link', 'label' => 'Security', 'url' => '/admin/settings/security'],
            ],
        ],

        ['type' => 'separator', 'style' => 'wave'],

        // Help & Resources
        [
            'type' => 'link',
            'label' => 'Help Center',
            'url' => 'https://help.example.com',
            'icon' => 'heroicon-o-question-mark-circle',
            'external' => true,
        ],

        [
            'type' => 'link',
            'label' => 'API Documentation',
            'url' => 'https://api.example.com/docs',
            'icon' => 'heroicon-o-code-bracket',
            'external' => true,
        ],
    ],
];
```

---

## CRM System

Customer Relationship Management system navigation.

```php
// config/filament-navigation.php

return [
    'items' => [
        // Dashboard
        [
            'type' => 'link',
            'label' => 'Dashboard',
            'url' => '/admin',
            'icon' => 'heroicon-o-squares-2x2',
        ],

        ['type' => 'separator', 'style' => 'arrow'],

        // Sales Pipeline
        [
            'type' => 'group',
            'label' => 'Sales',
            'icon' => 'heroicon-o-currency-dollar',
            'collapsible' => false,
            'items' => [
                ['type' => 'link', 'label' => 'Leads', 'url' => '/admin/leads'],
                ['type' => 'link', 'label' => 'Opportunities', 'url' => '/admin/opportunities'],
                ['type' => 'link', 'label' => 'Quotes', 'url' => '/admin/quotes'],
                ['type' => 'link', 'label' => 'Deals', 'url' => '/admin/deals'],
            ],
        ],

        // Contacts
        [
            'type' => 'group',
            'label' => 'Contacts',
            'icon' => 'heroicon-o-users',
            'collapsible' => true,
            'items' => [
                ['type' => 'link', 'label' => 'Companies', 'url' => '/admin/companies'],
                ['type' => 'link', 'label' => 'People', 'url' => '/admin/people'],
                ['type' => 'link', 'label' => 'Segments', 'url' => '/admin/segments'],
            ],
        ],

        // Activities
        [
            'type' => 'group',
            'label' => 'Activities',
            'icon' => 'heroicon-o-calendar-days',
            'collapsible' => true,
            'items' => [
                ['type' => 'link', 'label' => 'Tasks', 'url' => '/admin/tasks'],
                ['type' => 'link', 'label' => 'Meetings', 'url' => '/admin/meetings'],
                ['type' => 'link', 'label' => 'Calls', 'url' => '/admin/calls'],
                ['type' => 'link', 'label' => 'Emails', 'url' => '/admin/emails'],
            ],
        ],

        ['type' => 'separator', 'style' => 'square'],

        // Marketing
        [
            'type' => 'group',
            'label' => 'Marketing',
            'icon' => 'heroicon-o-megaphone',
            'collapsible' => true,
            'items' => [
                ['type' => 'link', 'label' => 'Campaigns', 'url' => '/admin/campaigns'],
                ['type' => 'link', 'label' => 'Email Templates', 'url' => '/admin/email-templates'],
                ['type' => 'link', 'label' => 'Forms', 'url' => '/admin/forms'],
            ],
        ],

        // Reports
        [
            'type' => 'group',
            'label' => 'Analytics',
            'icon' => 'heroicon-o-presentation-chart-line',
            'collapsible' => true,
            'items' => [
                ['type' => 'link', 'label' => 'Sales Reports', 'url' => '/admin/reports/sales'],
                ['type' => 'link', 'label' => 'Activity Reports', 'url' => '/admin/reports/activities'],
                ['type' => 'link', 'label' => 'Custom Reports', 'url' => '/admin/reports/custom'],
            ],
        ],

        ['type' => 'separator', 'style' => 'dots'],

        // Administration
        [
            'type' => 'group',
            'label' => 'Administration',
            'icon' => 'heroicon-o-shield-check',
            'collapsible' => true,
            'items' => [
                ['type' => 'link', 'label' => 'Users', 'url' => '/admin/users'],
                ['type' => 'link', 'label' => 'Teams', 'url' => '/admin/teams'],
                ['type' => 'link', 'label' => 'Settings', 'url' => '/admin/settings'],
            ],
        ],
    ],
];
```

---

## Project Management Tool

Navigation for a project and task management application.

```php
// config/filament-navigation.php

return [
    'items' => [
        // Overview
        [
            'type' => 'link',
            'label' => 'Overview',
            'url' => '/admin',
            'icon' => 'heroicon-o-squares-plus',
        ],

        ['type' => 'separator', 'style' => 'triangle'],

        // Projects
        [
            'type' => 'group',
            'label' => 'Projects',
            'icon' => 'heroicon-o-folder',
            'collapsible' => false,
            'items' => [
                ['type' => 'link', 'label' => 'All Projects', 'url' => '/admin/projects'],
                ['type' => 'link', 'label' => 'My Projects', 'url' => '/admin/projects/mine'],
                ['type' => 'link', 'label' => 'Archived', 'url' => '/admin/projects/archived'],
            ],
        ],

        // Tasks & Issues
        [
            'type' => 'group',
            'label' => 'Tasks',
            'icon' => 'heroicon-o-check-circle',
            'collapsible' => false,
            'items' => [
                ['type' => 'link', 'label' => 'My Tasks', 'url' => '/admin/tasks/mine'],
                ['type' => 'link', 'label' => 'All Tasks', 'url' => '/admin/tasks'],
                ['type' => 'link', 'label' => 'Backlog', 'url' => '/admin/tasks/backlog'],
                ['type' => 'link', 'label' => 'Sprints', 'url' => '/admin/sprints'],
            ],
        ],

        // Planning
        [
            'type' => 'group',
            'label' => 'Planning',
            'icon' => 'heroicon-o-calendar',
            'collapsible' => true,
            'items' => [
                ['type' => 'link', 'label' => 'Timeline', 'url' => '/admin/timeline'],
                ['type' => 'link', 'label' => 'Calendar', 'url' => '/admin/calendar'],
                ['type' => 'link', 'label' => 'Milestones', 'url' => '/admin/milestones'],
            ],
        ],

        ['type' => 'separator', 'style' => 'plus'],

        // Team & Resources
        [
            'type' => 'group',
            'label' => 'Team',
            'icon' => 'heroicon-o-user-group',
            'collapsible' => true,
            'items' => [
                ['type' => 'link', 'label' => 'Members', 'url' => '/admin/team/members'],
                ['type' => 'link', 'label' => 'Workload', 'url' => '/admin/team/workload'],
                ['type' => 'link', 'label' => 'Time Tracking', 'url' => '/admin/time-tracking'],
            ],
        ],

        // Documentation
        [
            'type' => 'group',
            'label' => 'Documentation',
            'icon' => 'heroicon-o-document-text',
            'collapsible' => true,
            'items' => [
                ['type' => 'link', 'label' => 'Wiki', 'url' => '/admin/wiki'],
                ['type' => 'link', 'label' => 'Files', 'url' => '/admin/files'],
                ['type' => 'link', 'label' => 'Templates', 'url' => '/admin/templates'],
            ],
        ],

        ['type' => 'separator', 'style' => 'zigzag'],

        // Reports & Analytics
        [
            'type' => 'link',
            'label' => 'Reports',
            'url' => '/admin/reports',
            'icon' => 'heroicon-o-chart-bar-square',
        ],

        // Settings
        [
            'type' => 'link',
            'label' => 'Settings',
            'url' => '/admin/settings',
            'icon' => 'heroicon-o-cog-6-tooth',
        ],
    ],
];
```

---

## Advanced Styling Examples

### Using Different Separators for Visual Hierarchy

```php
return [
    'items' => [
        ['type' => 'link', 'label' => 'Dashboard', 'url' => '/admin', 'icon' => 'heroicon-o-home'],

        // Major section separator
        ['type' => 'separator', 'style' => 'stars'],

        // Core features group
        ['type' => 'group', 'label' => 'Core Features', /* ... */],
        ['type' => 'group', 'label' => 'Reports', /* ... */],

        // Minor separator between sections
        ['type' => 'separator', 'style' => 'dots'],

        // Secondary features
        ['type' => 'group', 'label' => 'Tools', /* ... */],

        // Visual separator for bottom items
        ['type' => 'separator', 'style' => 'wave'],

        // Footer links
        ['type' => 'link', 'label' => 'Documentation', 'url' => 'https://docs.example.com', 'external' => true],
        ['type' => 'link', 'label' => 'Support', 'url' => 'https://support.example.com', 'external' => true],
    ],
];
```

### Minimal Separators for Clean Look

```php
return [
    'items' => [
        ['type' => 'link', 'label' => 'Dashboard', 'url' => '/admin', 'icon' => 'heroicon-o-home'],
        ['type' => 'separator', 'style' => 'blank'],  // Minimal visual separator
        ['type' => 'group', 'label' => 'Content', /* ... */],
        ['type' => 'separator', 'style' => 'space'],  // Larger empty space
        ['type' => 'group', 'label' => 'Settings', /* ... */],
    ],
];
```

### Playful Design with Special Characters

```php
return [
    'items' => [
        ['type' => 'link', 'label' => 'Dashboard', 'url' => '/admin', 'icon' => 'heroicon-o-home'],
        ['type' => 'separator', 'style' => 'hearts'],  // ♥ ♥ ♥ ♥ ♥
        ['type' => 'group', 'label' => 'Shop', /* ... */],
        ['type' => 'separator', 'style' => 'stars'],   // ★ ★ ★ ★ ★
        ['type' => 'group', 'label' => 'Reviews', /* ... */],
    ],
];
```

---

## Tips and Best Practices

### 1. Group Organization

Keep related items together in groups and use separators to create visual sections:

```php
// ✅ Good - Clear sections
['type' => 'separator', 'style' => 'default'],
['type' => 'group', 'label' => 'Content', /* ... */],
['type' => 'group', 'label' => 'Media', /* ... */],
['type' => 'separator', 'style' => 'dots'],
['type' => 'group', 'label' => 'Settings', /* ... */],

// ❌ Bad - Random separators
['type' => 'group', 'label' => 'Content', /* ... */],
['type' => 'separator', 'style' => 'stars'],
['type' => 'group', 'label' => 'Media', /* ... */],
['type' => 'group', 'label' => 'Settings', /* ... */],
['type' => 'separator', 'style' => 'hearts'],
```

### 2. Icon Consistency

Remember Filament 4's limitation: icons on groups OR items, not both.

```php
// ✅ Good - Icons on groups only
[
    'type' => 'group',
    'label' => 'Content',
    'icon' => 'heroicon-o-document-text',
    'items' => [
        ['type' => 'link', 'label' => 'Posts', 'url' => '/admin/posts'],
        ['type' => 'link', 'label' => 'Pages', 'url' => '/admin/pages'],
    ],
]

// ❌ Bad - Icons on both
[
    'type' => 'group',
    'label' => 'Content',
    'icon' => 'heroicon-o-document-text',  // ❌
    'items' => [
        ['type' => 'link', 'label' => 'Posts', 'url' => '/admin/posts', 'icon' => 'heroicon-o-newspaper'],  // ❌
    ],
]
```

### 3. Separator Style Selection

Choose separator styles that match your application's design:

- **Professional/Corporate**: `default`, `double`, `thick`
- **Minimal/Clean**: `blank`, `space`, `dots`
- **Modern/Geometric**: `diamond`, `square`, `triangle`, `chevron`
- **Playful/Creative**: `stars`, `hearts`, `wave`, `zigzag`

### 4. External Links

Always use `'external' => true` for external URLs:

```php
[
    'type' => 'link',
    'label' => 'Documentation',
    'url' => 'https://docs.example.com',
    'icon' => 'heroicon-o-book-open',
    'external' => true,  // ✅ Opens in new tab
]
```

---

## Need More Help?

- **README**: [README.md](README.md) - Installation and basic usage
- **GitHub Issues**: [Report issues or request features](https://github.com/shuxx/filament-navigation/issues)
- **Filament Docs**: [Filament Navigation Documentation](https://filamentphp.com/docs/panels/navigation)

---

**Happy navigating! 🧭**
