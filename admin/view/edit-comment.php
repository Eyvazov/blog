<?php require admin_view('static/header'); ?>
    <div class="box-">
        <h1>
            Rəy Redaktə Səhifəsi
        </h1>
    </div>

    <div class="clear" style="height: 10px;"></div>


    <div class="box-" tab>
        <div style="background: rgba(12, 136, 193, 0.07); border: 1px solid #0D88C1; margin-bottom: 15px; padding: 15px;">
            <strong><a style="color: #0D88C1" target="_blank" href="<?= site_url('blog/' . $row['post_url'])?>"><?= $row['post_title']?></a></strong> üçün <strong><?= timeConvert($row['comment_date'])?> <?= $row['user_name'] ? $row['user_name'] : $row['cooment_name']?></strong> tərəfindən yazıldı.
        </div>
        <form action="" method="POST" class="form label">
                    <ul>
                        <li>
                            <label for="page_url">Rəy Yazan</label>
                            <div class="form-content">
                                <input type="text" id="page_url" name="comment_name" value="<?= post('comment_name') ?  post('comment_name') : $row['comment_name']?>"/>
                            </div>
                        </li>
                        <li>
                            <label for="page_url">Rəy Yazanın E-poçtu</label>
                            <div class="form-content">
                                <input type="text" id="page_url" name="comment_email" value="<?= post('comment_email') ?  post('comment_email') : $row['comment_email']?>"/>
                            </div>
                        </li>
                        <li>
                            <label for="seo_desc">Rəy</label>
                            <div class="form-content">
                        <textarea name="comment_content" id="seo_desc"><?= post('comment_content') ? post('comment_content') : $row['comment_content']?></textarea>
                            </div>
                        </li>
                        <li>
                            <label for="comment_status">Rəyin Statusu</label>
                            <div class="form-content">
                                <select name="comment_status" id="comment_status">
                                    <option value="1" <?= $row['comment_status'] == 1 ? ' selected' : null?>>Təsdiqli</option>
                                    <option value="0" <?= $row['comment_status'] == 0 ? ' selected' : null?>>Təsdiqsiz</option>
                                </select>
                            </div>
                        </li>
                    <li class="submit">
                        <input type="hidden" name="submit" value="1">
                        <button type="submit">Yadda Saxla</button>
                    </li>
                </ul>
        </form>
    </div>

<?php require admin_view('static/footer') ?>