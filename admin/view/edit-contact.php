<?php require admin_view('static/header') ?>
<div class="box-">
    <h1>
        Mesaja Bax
    </h1>
</div>

<div class="clear" style="height: 10px;"></div>

<?php if ($row['contact_read'] == 1): ?>
    <div class="message success box-">
        <?= timeConvert($row['contact_date']) ?> əvvəl göndərildi. <br>
        <?= timeConvert($row['contact_read_date']); ?>
        <strong><?= $row['user_name'] ?></strong> tərəfindən oxundu.
    </div>
<?php endif; ?>

<div class="box-container container-50">
    <div class="box-">

        <form action="" method="POST" class="form label">
            <ul>
                <li>
                    <label for="user_name">Ad Soyad</label>
                    <div class="form-content" style="padding-top: 12px;">
                        <?= $row['contact_name']?>
                    </div>
                </li>
                <li>
                    <label for="user_name">E-poçt</label>
                    <div class="form-content" style="padding-top: 12px;">
                        <?= $row['contact_email']?>
                    </div>
                </li>
                <?php if ($row['contact_phone']):?>
                    <li>
                        <label for="user_name">Telefon</label>
                        <div class="form-content" style="padding-top: 12px;">
                            <?= $row['contact_phone']?>
                        </div>
                    </li>
                <?php endif;?>
                <li>
                    <label for="user_name">Mesaj Mövzusu</label>
                    <div class="form-content" style="padding-top: 12px;">
                        <?= $row['contact_subject']?>
                    </div>
                </li>
                <li>
                    <label for="user_name">Mesaj Kontenti</label>
                    <div class="form-content" style="padding-top: 12px;">
                        <?= nl2br($row['contact_message'])?>
                    </div>
                </li>
            </ul>
        </form>
    </div>
</div>
<div class="box-container container-50">
    <div class="box" id="div-1">
        <h3>
            Cavab Yaz
        </h3>
        <div class="box-content">
            <div class="message success box-" style="display: none" id="success"></div>
            <div class="message error box-" style="display: none;" id="error"></div>
            <form action="" id="email-form" onsubmit="return false;" class="form">
                <input type="hidden" name="name" value="<?= $row['contact_name']?>">
                <ul>
                    <li>
                        <input type="text" name="subject" value="RE: <?= $row['contact_subject']?>" id="input" placeholder="Mesaj Mövzusu">
                    </li>
                    <li>
                        <input type="text" name="email" value="<?= $row['contact_email']?>" id="input" placeholder="E-poçt ünvanı">
                    </li>
                    <li>
                        <textarea id="message" name="message" cols="30" rows="5" placeholder="Mesaj Kontenti"></textarea>
                    </li>
                    <li>
                        <button onclick="send_email('#email-form')" type="submit">Göndər</button>
                    </li>
                </ul>
            </form>
        </div>
    </div>
</div>
<?php require admin_view('static/footer') ?>
