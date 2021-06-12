<?php require admin_view('static/header')?>
<div class="box-">
    <h1>
        İstifadəçi Redaktəsi
    </h1>
</div>

<div class="clear" style="height: 10px;"></div>

<div class="box-">
    <form action="" method="POST" class="form label">
        <ul>
            <li>
                <label for="user_name">İstifadəçi Adı</label>
                <div class="form-content">
                    <input type="text" id="user_name" name="user_name" value="<?= post('user_name') ? post('user_name') : $row['user_name']?>">
                </div>
            </li>
            <li>
                <label for="user_mail">İstifadəçi E-poçt-u</label>
                <div class="form-content">
                    <input type="text" id="user_mail" name="user_email" value="<?= post('user_email') ? post('user_email') : $row['user_email']?>">
                </div>
            </li>
            <li class="submit">
                <button name="submit" value="1" type="submit">Yadda Saxla</button>
            </li>
        </ul>
    </form>
</div>
<?php require admin_view('static/footer')?>
