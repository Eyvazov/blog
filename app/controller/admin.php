<?php
if (!route(1)) {
    $route[1] = 'index';
}

if (!file_exists(admin_controller(route(1)))) {
    $route[1] = 'index';
}

if (!session('user_rank') || session('user_rank') == 3) {
    $route[1] = 'login';
}


$menus = [
    [
        'url' => 'index',
        'title' => 'Əsas Səhifə',
        'icon' => 'tachometer',
        'permissions' => [
            'show' => 'Baxış'
        ]
    ],
    [
        'url' => 'users',
        'title' => 'İstifadəçilər',
        'icon' => 'user',
        'permissions' => [
            'show' => 'Baxış',
            'edit' => 'Redaktə',
            'delete' => 'Silmək'
        ]
    ],
    [
        'url' => 'contact',
        'title' => 'Mesajlar',
        'icon' => 'envelope',
        'permissions' => [
            'show' => 'Baxış',
            'edit' => 'Redaktə',
            'send' => 'Göndərmək',
            'delete' => 'Silmək'
        ],
        'submenu' => [
            'users' => 'İstifadəçilər'
        ]
    ],
    [
        'url' => 'posts',
        'title' => 'Bloq',
        'icon' => 'rss',
        'permissions' => [
            'show' => 'Baxış',
            'edit' => 'Redaktə',
            'add' => 'Əlavə etmə',
            'delete' => 'Silmək'
        ],
        'submenu' => [
            [
                'url' => 'posts',
                'title' => 'Məqalələr'
            ],
            [
                'url' => 'tags',
                'title' => 'Etiketlər',
                'permissions' => [
                    'show' => 'Baxış',
                    'edit' => 'Redaktə',
                    'add' => 'Əlavə etmə',
                    'delete' => 'Silmək'
                ]
            ],
            [
                'url' => 'categories',
                'title' => 'Kateqoriyalar',
                'permissions' => [
                    'show' => 'Baxış',
                    'edit' => 'Redaktə',
                    'add' => 'Əlavə etmə',
                    'delete' => 'Silmək'
                ]
            ]
        ]
    ],


    [
        'url' => 'comments',
        'title' => 'Rəylər',
        'icon' => 'comments',
        'permissions' => [
            'show' => 'Baxış',
            'edit' => 'Redaktə',
            'add' => 'Əlavə etmə',
            'delete' => 'Silmək'
        ]
    ],
    [
        'url' => 'pages',
        'title' => 'Səhifələr',
        'icon' => 'file',
        'permissions' => [
            'show' => 'Baxış',
            'edit' => 'Redaktə',
            'add' => 'Əlavə etmə',
            'delete' => 'Silmək'
        ]
    ],
    [
        'url' => 'menu',
        'title' => 'Menyu',
        'icon' => 'bars',
        'permissions' => [
            'show' => 'Baxış',
            'edit' => 'Redaktə',
            'add' => 'Əlavə etmə',
            'delete' => 'Silmək'
        ]
    ],
    [
        'url' => 'settings',
        'title' => 'Tənzimləmələr',
        'icon' => 'cog',
        'permissions' => [
            'show' => 'Baxış',
            'edit' => 'Redaktə'
        ]
    ]
];

require admin_controller(route(1));
?>