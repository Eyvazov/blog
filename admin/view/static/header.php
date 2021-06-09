<!doctype html>
<html lang="en">
<head>

    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />

    <meta charset="UTF-8">
    <title>Document</title>

    <!--styles-->
    <link rel="stylesheet" href="<?= admin_public_url('styles/main.css')?>">

    <!--scripts-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <!--<script src="https://cdn.ckeditor.com/4.5.7/basic/ckeditor.js"></script>-->
    <script src="<?= admin_public_url('scripts/admin.js')?>"></script>

</head>
<body>

<!--navbar-->
<div class="navbar">
    <ul dropdown>
        <li>
            <a href="#">
                <span class="fa fa-home"></span>
                <span class="title">
                    ANOTHER WORDPRESS SITE
                </span>
            </a>
        </li>
        <li>
            <a href="#">
                <span class="fa fa-comment"></span>
                1
            </a>
        </li>
        <li>
            <a href="#">
                <span class="fa fa-plus"></span>
                <span class="title">New</span>
            </a>
            <ul>
                <li>
                    <a href="#">
                        New Post
                    </a>
                </li>
                <li>
                    <a href="#">
                        New Page
                    </a>
                </li>
                <li>
                    <a href="#">
                        New Category
                    </a>
                </li>
            </ul>
        </li>
    </ul>
</div>

<!--sidebar-->
<div class="sidebar">

    <ul>
        <?php foreach ($menus as $mainUrl => $menu):?>
        <li class="<?= (route(1) == $mainUrl) || isset($menu['sub-menu'][route(1)]) ? 'active' : null?>">
            <a href="<?= admin_url($mainUrl)?>">
                <span class="fa fa-<?= $menu['icon']?>"></span>
                <span class="title">
                    <?= $menu['title']?>
                </span>
            </a>
            <?php if (isset($menu['sub-menu'])):?>
            <ul class="sub-menu">
                <?php foreach ($menu['sub-menu'] as $url => $title):?>
                <li>
                    <a href="<?= admin_url($url)?>">
                        <?= $title?>
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
