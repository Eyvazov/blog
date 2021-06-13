<?php
    if (!route(1))
    {
        $route[1] = 'index';
    }

    if (!file_exists(admin_controller(route(1))))
    {
        $route[1] = 'index';
    }

    if (!session('user_rank') ||session('user_rank') == 3){
        $route[1] = 'login';
    }



    $menus = [
        'index' => [
            'title' => 'Əsas Səhifə',
            'icon' => 'tachometer',
            'permissions' => [
                'show' => 'Baxış'
            ]
        ],
        'users' => [
            'title' => 'İstifadəçilər',
            'icon' => 'user',
            'permissions' => [
                'show' => 'Baxış',
                'edit' => 'Redaktə',
                'delete' => 'Silmək'
            ]
        ],
        'contact' => [
            'title' => 'Mesajlar',
            'icon' => 'envelope',
            'permissions' => [
                'show' => 'Baxış',
                'edit' => 'Redaktə',
                'send' => 'Göndərmək',
                'delete' => 'Silmək'
            ]
        ],
        'menu' => [
            'title' => 'Menyu',
            'icon' => 'bars',
            'permissions' => [
                'show' => 'Baxış',
                'edit' => 'Redaktə',
                'add' => 'Əlavə etmə',
                'delete' => 'Silmək'
            ]
        ],
        'settings' => [
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