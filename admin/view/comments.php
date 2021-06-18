<?php require admin_view('static/header') ?>

    <div class="box-">
        <h1>
            Bütün Rəylər
        </h1>
    </div>

    <div class="clear" style="height: 10px;"></div>

    <div class="table">
        <table>
            <thead>
            <tr>
                <th width="10"></th>
                <th style="text-align: center">Rəy</th>
                <th style="text-align: center">Status</th>
                <th style="text-align: center">Rəy Yazılan Məqalə</th>
                <th style="text-align: center">Əlavə Edilmə Tarixi</th>
                <th style="text-align: center">Əməliyyatlar</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($query as $row): ?>
                <tr>
                    <td>
                        <img src="<?= get_gravatar($row['comment_email']) ?>" width="50" style="border-radius: 50%;">
                    </td>
                    <td style="text-align: center">
                        <p style="font-size: 12px; color: #999;">
                            <strong><?= $row['comment_name'] ?></strong> (<?= $row['comment_email'] ?>)
                        </p>
                        <?= $row['comment_content'] ?>
                    </td>
                    <td style="text-align: center">
                        <?php if ($row['comment_status'] == 0): ?>
                        <span style="background-color: darkorange; color: #fff; padding: 10px; border-radius: 3px">Gözləyir</span>
                        <?php elseif ($row['comment_status'] == 1):?>
                            <span style="background-color: #0073AF; color: #fff; padding: 10px; border-radius: 3px">Təsdiqlənib</span>
                        <?php endif; ?>
                    </td>
                    <td style="text-align: center">
                        <a target="_blank"
                           href="<?= site_url('blog/' . $row['post_url']) ?>"><?= $row['post_title'] ?></a>
                    </td>
                    <td title="<?= $row['comment_date'] ?>" style="text-align: center">
                        <?= timeConvert($row['comment_date']) ?>
                    </td>
                    <td style="text-align: center">
                        <?php if (permission('comments', 'edit')): ?>
                            <a href="<?= admin_url('edit-comment?id=' . $row['comment_id']) ?>" class="btn"><i
                                        class="fa fa-pencil"></i> Redaktə Et</a>
                        <?php endif; ?>

                        <?php if (permission('comments', 'delete')): ?>
                            <a onclick="return confirm('Silmək istədiyinizdən əminsiniz?')"
                               href="<?= admin_url('delete?table=comments&column=comment_id&id=' . $row['comment_id']) ?>"
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