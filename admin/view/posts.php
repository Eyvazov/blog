<?php require admin_view('static/header') ?>

    <div class="box-">
        <h1>
            Bütün Məqalələr
            <?php if (permission('posts', 'add')): ?>
                <a href="<?= admin_url('add-post')?>"><i class="fa fa-plus"></i> Yeni Məqalə Əlavə Et</a>
            <?php endif; ?>
        </h1>
    </div>

    <div class="clear" style="height: 10px;"></div>

    <div class="table">
        <table>
            <thead>
            <tr>
                <th style="text-align: center">Məqalə Adı</th>
                <th style="text-align: center">Məqalə URL-i</th>
                <th style="text-align: center">Əlavə Edilmə Tarixi</th>
                <th style="text-align: center">Əməliyyatlar</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($query as $row): ?>
                <tr>
                    <td style="text-align: center">
                        <a href="<?= admin_url('edit-post?id=' . $row['post_id'])?>"><?= $row['post_title'] ?></a>
                    </td>
                    <td style="text-align: center">
                        <?= $row['post_url'] ?>
                    </td>
                    <td title="<?= $row['post_date'] ?>" style="text-align: center">
                        <?= timeConvert($row['post_date']) ?>
                    </td>
                    <td style="text-align: center">
                        <a href="<?= site_url('meqale/' . $row['post_url'])?>" target="_blank" class="btn"><i class="fa fa-eye"></i> Bax</a>
                        <?php if (permission('posts', 'edit')): ?>
                            <a href="<?= admin_url('edit-post?id=' . $row['post_id']) ?>" class="btn"><i class="fa fa-pencil"></i> Redaktə Et</a>
                        <?php endif; ?>

                        <?php if (permission('posts', 'delete')): ?>
                            <a onclick="return confirm('Silmək istədiyinizdən əminsiniz?')"
                               href="<?= admin_url('delete?table=posts&column=post_id&id=' . $row['post_id']) ?>"
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