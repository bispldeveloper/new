<?php

return [
    'adminnav' => [
        [
            'group' => 'Site',
            'name' => 'Dashboard',
            'route' => 'mc-admin.dashboard',
            'icon' => 'far fa-book-open',
            'sort_order' => 10
        ],
        [
            'group' => 'Settings',
            'name' => 'Admin Management',
            'route' => 'mc-admin.admins.index',
            'icon' => 'far fa-user-secret',
            'sort_order' => 20
        ]
    ]
];
