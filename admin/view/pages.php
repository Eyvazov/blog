<?php require admin_view('static/header') ?>

    <div class="box-">
        <h1>
            Bütün Səhifələr
            <?php if (permission('pages', 'add')): ?>
                <a href="<?= admin_url('add-page')?>"><i class="fa fa-plus"></i> Yeni Səhifə Əlavə Et</a>
            <?php endif; ?>
        </h1>
    </div>

    <div class="clear" style="height: 10px;"></div>

    <div class="table">
        <table>
            <thead>
            <tr>
                <th style="text-align: center">Səhifə Adı</th>
                <th style="text-align: center">Səhifə URL-i</th>
                <th style="text-align: center">Əlavə Edilmə Tarixi</th>
                <th style="text-align: center">Əməliyyatlar</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($query as $row): ?>
                <tr>
                    <td style="text-align: center">
                        <a href="<?= admin_url('edit-page?id=' . $row['page_id'])?>"><?= $row['page_title'] ?></a>
                    </td>
                    <td style="text-align: center">
                        <?= $row['page_url'] ?>
                    </td>
                    <td title="<?= $row['page_date'] ?>" style="text-align: center">
                        <?= timeConvert($row['page_date']) ?>
                    </td>
                    <td style="text-align: center">
                        <a href="<?= site_url('sehife/' . $row['page_url'])?>" target="_blank" class="btn"><i class="fa fa-eye"></i> Bax</a>
                        <?php if (permission('pages', 'edit')): ?>
                            <a href="<?= admin_url('edit-page?id=' . $row['page_id']) ?>" class="btn"><i class="fa fa-pencil"></i> Redaktə Et</a>
                        <?php endif; ?>

                        <?php if (permission('pages', 'delete')): ?>
                            <a onclick="return confirm('Silmək istədiyinizdən əminsiniz?')"
                               href="<?= admin_url('delete?table=pages&column=page_id&id=' . $row['page_id']) ?>"
                               class="btn"><i class="fa fa-trash"></i> Sil</a>
                        <?php endif; ?>
                    </td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    </div>

<?php if ($totalRecord > $pageLimit): ?>
    <div class="pagination">
        <ul>
            <?= $db->showPagination(admin_url(route(1) . '?' . $pageParam . '=[page]')); ?>
        </ul>
    </div>
<?php endif; ?>

<?php require admin_view('static/footer') ?>