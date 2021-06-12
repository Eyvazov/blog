<?php require admin_view('static/header') ?>

    <div class="box-">
        <h1>
            Menyu İdarə Etməsi
        <?php if (permission('menu', 'add')): ?>
            <a href="<?= admin_url('add-menu') ?>">Yeni Menyu Əlavə Et</a>
        <?php endif;?>
        </h1>
    </div>

    <div class="clear" style="height: 10px;"></div>

    <div class="table">
        <table>
            <thead>
            <tr>
                <th>Menyu Başlığı</th>
                <th class="hide">Əlavə Edilmə Tarixi</th>
                <th>Əməliyyatlar</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($rows as $row): ?>
                <tr>
                    <td>
                        <?= $row['menu_title'] ?>
                    </td>
                    <td>
                        <?= $row['menu_date'] ?>
                    </td>
                    <td>
                        <?php if (permission('menu', 'edit')): ?>
                            <a href="<?= admin_url('edit-menu?id=' . $row['menu_id']) ?>" class="btn">Redaktə Et</a>
                        <?php endif; ?>
                            <?php if (permission('menu', 'delete')): ?>
                        <a onclick="return confirm('Silmək istədiyinizdən əminsiniz?')"
                           href="<?= admin_url('delete?table=menu&column=menu_id&id=' . $row['menu_id']) ?>"
                           class="btn">Sil</a>
                            <?php endif; ?>
                    </td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    </div>

<?php require admin_view('static/footer') ?>