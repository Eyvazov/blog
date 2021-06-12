<?php require admin_view('static/header') ?>
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
                    <input type="text" id="user_name" name="user_name"
                           value="<?= post('user_name') ? post('user_name') : $row['user_name'] ?>">
                </div>
            </li>
            <li>
                <label for="user_mail">İstifadəçi E-poçt-u</label>
                <div class="form-content">
                    <input type="text" id="user_mail" name="user_email"
                           value="<?= post('user_email') ? post('user_email') : $row['user_email'] ?>">
                </div>
            </li>

            <li>
                <label for="user_rank">Rütbə</label>
                <div class="form-content">
                    <select name="user_rank" id="user_rank">
                        <option value="">Rütbə seçin</option>
                        <?php foreach (user_ranks() as $id => $rank): ?>
                            <option <?= (post('user_rank') ? post('user_rank') : $row['user_rank']) == $id ? ' selected ' : null ?>
                                    value="<?= $id ?>"><?= $rank ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
            </li>
            <li>
                <style>
                    .permissions {
                        background-color: #fff;
                        max-width: 400px;
                        border: 1px solid #ddd;
                        padding: 10px;
                    }
                    .permissions h3{
                        font-weight: bold;
                    }
                    .permissions .list{
                        padding-bottom: 20px;
                    }
                    .permissions div:last-child .list{
                        padding-bottom: 0;
                    }
                    .permissions .list label{
                        display: inline-block;
                        width: auto!important;
                        font-weight: normal!important;
                        float: none!important;
                        margin-right: 10px;
                    }
                </style>
                <label for="permissions">İcazələr</label>
                <div class="form-content">
                    <div class="permissions">
                    <?php foreach ($menus as $url => $menu): ?>
                        <div>
                            <h3><?= $menu['title'] ?></h3>
                            <div class="list">
                                <?php foreach ($menu['permissions'] as $key => $val):?>
                                    <label>
                                        <input <?= (isset($permissions[$url][$key]) && $permissions[$url][$key] == 1 ? ' checked ' : null) ?> type="checkbox" name="user_permissions[<?= $url?>][<?= $key?>]" value="1">
                                        <?= $val;?>
                                    </label>
                                <?php endforeach;?>
                            </div>
                        </div>
                    <?php endforeach; ?>
                    </div>
                </div>
            </li>
            <li class="submit">
                <button name="submit" value="1" type="submit">Yadda Saxla</button>
            </li>
        </ul>
    </form>
</div>
<?php require admin_view('static/footer') ?>
