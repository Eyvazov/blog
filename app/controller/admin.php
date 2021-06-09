<?php
    if (!route(1))
    {
        $route[1] = 'index';
    }

    if (!file_exists(admin_controller(route(1))))
    {
        $route[1] = 'index';
    }

    $menus = [
        'index' => [
            'title' => 'Əsas Səhifə',
            'icon' => 'tachometer'
        ],
        'users' => [
            'title' => 'İstifadəçilər',
            'icon' => 'user',
            'sub-menu' =>[
                'add-user' => 'İstifadəçi Əlavə Et',
                'users' => 'İstifadəçilər'
            ]
        ],
        'settings' => [
            'title' => 'Tənzimləmələr',
            'icon' => 'cog'
        ]
    ];

    require admin_controller(route(1));
?>