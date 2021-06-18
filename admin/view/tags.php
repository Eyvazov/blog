<?php require admin_view('static/header') ?>

    <div class="box-">
        <h1>
            Bütün Etiketlər
            <?php if (permission('tags', 'add')): ?>
                <a href="<?= admin_url('add-tag')?>"><i class="fa fa-plus"></i> Yeni Etiket Əlavə Et</a>
            <?php endif; ?>
        </h1>
    </div>

    <div class="clear" style="height: 10px;"></div>

    <div class="table">
        <table>
            <thead>
            <tr>
                <th>Etiket Adı</th>
                <th>İstifadə Sayısı</th>
                <th style="text-align: center">Əməliyyatlar</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($query as $row): ?>
                <tr>
                    <td>
                        <?= $row['tag_name'] ?>
                    </td>
                    <td>
                        <?= $row['total'] ?> dəfə
                    </td>
                    <td style="text-align: center">
                        <?php if (permission('tags', 'edit')): ?>
                            <a href="<?= admin_url('edit-tag?id=' . $row['tag_id']) ?>" class="btn"><i class="fa fa-pencil"></i> Redaktə Et</a>
                        <?php endif; ?>

                        <?php if (permission('tags', 'delete')): ?>
                            <a onclick="return confirm('Silmək istədiyinizdən əminsiniz?')"
                               href="<?= admin_url('delete?table=tags&column=tag_id&id=' . $row['tag_id']) ?>"
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