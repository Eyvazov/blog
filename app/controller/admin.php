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
        ],
        'settings' => [
            'title' => 'Tənzimləmələr',
            'icon' => 'cog'
        ],
        'menu' => [
            'title' => 'Menyu',
            'icon' => 'bars'
        ]
    ];

    require admin_controller(route(1));
?>