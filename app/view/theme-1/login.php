<?php require view('static/header')?>
<div class="container">
    <div class="row justify-content-md-center mt-4">

        <div class="col-md-4">
            <form action="" method="post">
                <h3 class="mb-3">Giriş</h3>
                <?php if ($err = error()):?>
                    <div class="alert alert-danger" role="alert">
                        <?= $err; ?>
                    </div>
                <?php elseif ($success = success()):?>
                    <div class="alert alert-success" role="alert">
                        <?= $success?>
                    </div>
                <?php endif;?>
                <div class="form-group">
                    <label for="username">İstifadəçi Adı</label>
                    <input type="text" value="<?= post('user_name')?>" class="form-control" name="user_name" id="username"placeholder="Kullanıcı adınızı yazın..">
                </div>
                <div class="form-group">
                    <label for="password">Şifrə</label>
                    <input type="password" class="form-control" name="user_password" id="password" placeholder="*******">
                </div>
                <input type="hidden" name="submit" value="1">
                <button type="submit" class="btn btn-primary">Daxil ol</button>
            </form>
        </div>

    </div>
</div>
<?php require view('static/footer')?>