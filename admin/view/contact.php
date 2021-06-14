<?php require admin_view('static/header') ?>

    <div class="box-">
        <h1>
            Bütün Mesajlar
        </h1>
    </div>

    <div class="clear" style="height: 10px;"></div>

    <div class="table">
        <table>
            <thead>
            <tr>
                <th style="text-align: center" width="10">&nbsp;</th>
                <th style="text-align: center">Ad Soyad</th>
                <th style="text-align: center">Mövzu</th>
                <th style="text-align: center">Mesaj Tarixi</th>
                <th style="text-align: center">Əməliyyatlar</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($query as $row): ?>
                <tr>
                    <td style="text-align: center">
                        <?php if ($row['contact_read'] == 1): ?>
                            <div style="background: green; color: #fff; text-align: center; padding: 3px 6px; border-radius: 3px;">
                                Oxunub
                            </div>
                        <?php else: ?>
                            <div style="background: darkred; color: #fff; text-align: center; padding: 3px 6px; border-radius: 3px;">
                                Oxunmayıb
                            </div>
                        <?php endif; ?>
                    </td>
                    <td style="text-align: center">
                        <p>
                            <?= $row['contact_name'] ?> (<?= $row['contact_email'] ?>)
                        </p>
                        <?= $row['contact_phone'] ?>
                    </td>
                    <td style="text-align: center">
                        <?= $row['contact_subject'] ?>
                    </td>
                    <td style="text-align: center">
                        <?= timeConvert($row['contact_date']) ?>
                        <?php if ($row['contact_read_date']): ?>
                        <div style="color: #999; font-size: 12px;">
                            <?= timeConvert($row['contact_read_date'])?> əvvəl oxundu
                            <br>
                            <strong><?= $row['user_name']?></strong> oxudu
                        </div>
                        <?php endif; ?>
                    </td>
                    <td style="text-align: center">
                        <?php if (permission('contact', 'edit')): ?>
                            <a href="<?= admin_url('edit-contact?id=' . $row['contact_id']) ?>" class="btn"><i class="fa fa-pencil"></i> Göstər</a>
                        <?php endif; ?>

                        <?php if (permission('contact', 'delete')): ?>
                            <a onclick="return confirm('Silmək istədiyinizdən əminsiniz?')"
                               href="<?= admin_url('delete?table=contact&column=contact_id&id=' . $row['contact_id']) ?>"
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