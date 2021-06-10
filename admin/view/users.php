<?php require admin_view('static/header')?>

    <div class="box-">
        <h1>
            Bütün İstifadəçilər
        </h1>
    </div>

    <div class="clear" style="height: 10px;"></div>

    <div class="table">
        <table>
            <thead>
            <tr>
                <th>Ad Soyad</th>
                <th>E-poçt</th>
                <th>Qeydiyyat Tarixi</th>
                <th>Əməliyyatlar</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($query as $row):?>
                <tr>
                    <td>
                        <a href="<?= admin_url('edit-user?id=' . $row['user_id'])?>" class="title">
                            <?= $row['user_name']?>
                        </a>
                    </td>
                    <td>
                        <?= $row['user_email']?>
                    </td>
                    <td>
                        <?= $row['user_date']?>
                    </td>
                    <td>
                        <a href="<?= admin_url('edit-user?id=' . $row['user_id'])?>" class="btn">Redaktə Et</a>
                        <a onclick="return confirm('Silmək istədiyinizdən əminsiniz?')" href="<?= admin_url('delete?table=users&column=user_id&id=' . $row['user_id'])?>" class="btn">Sil</a>
                    </td>
                </tr>
            <?php endforeach;?>
            </tbody>
        </table>
    </div>

    <?php if ($totalRecord > $pageLimit):?>
    <div class="pagination">
        <ul>
            <?= $db->showPagination(admin_url(route(1) . '?' . $pageParam . '=[page]'));?>
        </ul>
    </div>
    <?php endif;?>

<?php require admin_view('static/footer')?>