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
                <th style="text-align: center">Ad Soyad</th>
                <th style="text-align: center">E-poçt</th>
                <th style="text-align: center">Qeydiyyat Tarixi</th>
                <th style="text-align: center">Rütbə</th>
                <th style="text-align: center">Əməliyyatlar</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($query as $row):?>
                <tr>
                    <td style="text-align: center">
                        <a href="<?= admin_url('edit-user?id=' . $row['user_id'])?>" class="title">
                            <?= $row['user_name']?>
                        </a>
                    </td>
                    <td style="text-align: center">
                        <?= $row['user_email']?>
                    </td>
                    <td style="text-align: center">
                        <?= timeConvert($row['user_date'])?>
                    </td>
                    <td style="text-align: center">
                        <?= user_ranks($row['user_rank'])?>
                    </td>
                    <td style="text-align: center">
                    <?php if (permission('users', 'edit')): ?>
                        <a href="<?= admin_url('edit-user?id=' . $row['user_id'])?>" class="btn"><i class="fa fa-pencil"></i> Redaktə Et</a>
                    <?php endif;?>

                    <?php if (permission('users', 'delete')): ?>
                        <a onclick="return confirm('Silmək istədiyinizdən əminsiniz?')"
                           href="<?= admin_url('delete?table=users&column=user_id&id=' . $row['user_id'])?>" class="btn"><i class="fa fa-trash"></i> Sil</a>
                    <?php endif;?>
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