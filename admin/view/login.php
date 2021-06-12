<?php require admin_view('static/header')?>
<div class="login-screen">

    <!--login logo-->
    <div class="login-logo">
        <a href="#">
            <img src="<?= admin_public_url('/images/logo.png')?>" alt="">
        </a>
    </div>
    <?php if (isset($error)):?>
        <div class="message error box-">
            <?= $error; ?>
        </div>
    <?php endif;?>

    <form action="" method="POST">
        <ul>
            <li>
                <label for="username">İstifadəçi Adı</label>
                <input type="text" name="user_name" id="username">
            </li>
            <li>
                <label for="password">Şifrə</label>
                <input type="password" name="user_password" id="password">
            </li>
            <li>
                <button name="submit" value="1" type="submit">Daxil Ol</button>
            </li>
        </ul>
    </form>

</div>
<?php require admin_view('static/footer')?>