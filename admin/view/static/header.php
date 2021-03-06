<!doctype html>
<html lang="en">
<head>

    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />

    <meta charset="UTF-8">
    <title>Document</title>

    <!--styles-->
    <link rel="stylesheet" href="<?= admin_public_url('styles/main.css')?>">
    <link rel="stylesheet" href="<?= admin_public_url('styles/extra.css')?>">
    <link rel="stylesheet" href="<?= admin_public_url('vendor/jquery.tagsinput/jquery.tagsinput-revisited.min.css')?>">
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">

    <!--scripts-->
    <script src="<?= admin_public_url('scripts/jquery-1.12.2.min.js') ?>"></script>
    <script src="http://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>
    <script src="<?= admin_public_url('vendor/jquery.tagsinput/jquery.tagsinput-revisited.min.js')?>"></script>
    <script src="<?= admin_public_url('tinymce/js/tinymce/tinymce.min.js')?>"></script>
    <!--<script src="https://cdn.ckeditor.com/4.5.7/basic/ckeditor.js"></script>-->
    <script>
        var api_url = '<?= admin_url('api')?>',
            app_url = '<?= site_url('app/')?>';
    </script>
    <script src="<?= admin_public_url('scripts/admin.js')?>"></script>
    <script src="<?= admin_public_url('scripts/api.js')?>"></script>

</head>
<body>

<div class="success-msg">
    <a href="#" class="success-close-btn"><i class="fa fa-times"></i></a>
    <div>
        Sıralama əməliyyatı yerinə yetirildi.
    </div>
</div>

<?php if (session('user_rank') && session('user_rank') != 3):?>

<!--navbar-->
<div class="navbar">
    <ul dropdown>
        <li>
            <a href="<?= site_url()?>" target="_blank">
                <span class="fa fa-home"></span>
                <span class="title">
                    <?= setting('title')?>
                </span>
            </a>
        </li>
        <li>
            <a href="<?= admin_url('comments')?>">
                <span class="fa fa-comment"></span>
            </a>
        </li>
        <li>
            <a href="#">
                <span class="fa fa-plus"></span>
                <span class="title">Yeni</span>
            </a>
            <ul>
                <li>
                    <a href="<?= admin_url('add-post')?>">
                        Yeni Məqalə
                    </a>
                </li>
                <li>
                    <a href="<?= admin_url('add-page')?>">
                        Yeni Səhifə
                    </a>
                </li>
                <li>
                    <a href="<?= admin_url('add-category')?>">
                        Yeni Kateqoriya
                    </a>
                </li>
            </ul>
        <li>
            <a href="#">
                İstifadəçi (<strong><?= session('user_name')?></strong>)
            </a>
        </li>
        <li>
            <a href="<?= admin_url('logout')?>">
                Çıxış
            </a>
        </li>
    </ul>
</div>

<!--sidebar-->
<div class="sidebar">

    <ul>
        <?php foreach ($menus as $mainUrl => $menu): if (!permission($menu['url'], 'show')) continue;?>
        <li class="<?= (route(1) == $menu['url']) || (isset($menu['submenu']) && array_search(route(1), array_column($menu['submenu'], 'url'))) ? 'active' : null?>">
            <a href="<?= admin_url($menu['url'])?>">
                <span class="fa fa-<?= $menu['icon']?>"></span>
                <span class="title">
                    <?= $menu['title']?>
                </span>
            </a>
            <?php if (isset($menu['submenu'])):?>
            <ul class="sub-menu">
                <?php foreach ($menu['submenu'] as $k => $submenu):?>
                <li class="<?= route(1) == $submenu['url'] ? ' active' : null;?>">
                    <a href="<?= admin_url($submenu['url'])?>">
                        <?= $submenu['title']?>
                    </a>
                </li>
                <?php endforeach;?>
            </ul>
            <?php endif;?>
        </li>
        <?php endforeach;?>
        <li class="line">
            <span></span>
        </li>
    </ul>
    <a href="#" class="collapse-menu">
        <span class="fa fa-arrow-circle-left"></span>
        <span class="title">
            Collapse menu
        </span>
    </a>

</div>

<!--content-->
<div class="content">

    <?php if (isset($error)):?>
    <div class="message error box-">
        <?= $error; ?>
    </div>
    <?php endif;?>

    <?php endif;?>
