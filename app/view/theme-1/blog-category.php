<?php require view('static/header') ?>
    <section class="jumbotron text-center">
        <div class="container">
            <h1><?= $category['category_name'] ?></h1>
            <div class="breadcrumb-custom">
                <a href="<?= site_url()?>">Əsas Səhifə</a> /
                <a href="<?= site_url('blog')?>">Bloq</a> /
                <a href="<?= site_url('blog/kateqoriya/' . $category['category_url'])?>" class="active"><?= $category['category_name']?></a>
            </div>
        </div>
    </section>
    <div class="container">
    <div class="row">
        <div class="col-md-8">

            <h4 class="pb-3">Son Məqalələr</h4>

            <?php if ($query): ?>

                <?php foreach ($query as $row): ?>
                    <div class="card mb-3">
                        <div class="card-header">
                            <?= $row['category_name'] ?>
                            <div class="date">
                                <?= timeConvert($row['post_date']) ?>
                            </div>
                        </div>
                        <div class="card-body">
                            <h5 class="card-title"><?= $row['post_title'] ?></h5>
                            <div class="card-text">
                                <?= htmlspecialchars_decode($row['post_short_content']) ?>
                            </div>
                            <a href="<?= 'blog/' . $row['post_url'] ?>" class="btn btn-dark">Daha Ətraflı</a>
                        </div>
                    </div>
                <?php endforeach; ?>

                <?php if ($totalRecord > $pageLimit): ?>
                    <div class="pagination-container text-center mb-4">
                        <nav aria-label="Page navigation example">
                            <ul class="pagination">
                                <li class="page-item">
                                    <a class="page-link"
                                       href="<?= site_url('blog/kateqoriya/' . $category['category_url'] . '?' . $pageParam . '=' . $db->prevPage()) ?>"
                                       aria-label="Previous">
                                        <span aria-hidden="true">&laquo;</span>
                                        <span class="sr-only">Previous</span>
                                    </a>
                                </li>
                                <?= $db->showPagination(site_url('blog/kateqoriya/' . $category['category_url'] . '?' . $pageParam . '=[page]'), 'active', true) ?>
                                <li class="page-item">
                                    <a class="page-link"
                                       href="<?= site_url('blog/kateqoriya/' . $category['category_url'] . '?' . $pageParam . '=' . $db->nextPage()) ?>"
                                       aria-label="Next">
                                        <span aria-hidden="true">&raquo;</span>
                                        <span class="sr-only">Next</span>
                                    </a>
                                </li>
                            </ul>
                        </nav>
                    </div>
                <?php endif; ?>
            <?php else: ?>
                <div class="alert alert-warning">
                    Heç Bir Məqalə Paylaşılmayıb.
                </div>
            <?php endif; ?>

        </div>
        <div class="col-md-4">
            <h4 class="pb-3">
                <i class="fa fa-folder"></i>
                Kategoriler
            </h4>
            <ul class="list-group mb-4">
                <?php foreach (Blog::Categories() as $category) : ?>
                    <li class="list-group-item<?= $category['category_url'] == route(2) ? ' active' : null;?>">
                        <a href="<?= site_url('blog/kateqoriya/' . $category['category_url']) ?>" style="color: #333;"
                           class="d-flex justify-content-between align-items-center">
                            <?= $category['category_name'] ?>
                            <span class="badge badge-dark badge-pill"><?= $category['total']?></span>
                        </a>
                    </li>
                <?php endforeach; ?>
            </ul>
            <h4 class="pb-3">
                <i class="fa fa-hashtag"></i>
                Etiketler
            </h4>
            <a href="#" class="badge badge-light badge-pill">html5 video</a>
            <a href="#" class="badge badge-light badge-pill">html5 audio</a>
            <a href="#" class="badge badge-light badge-pill">css ie7</a>
            <a href="#" class="badge badge-light badge-pill">jquery dersleri</a>
            <a href="#" class="badge badge-light badge-pill">css3 calc()</a>
            <a href="#" class="badge badge-light badge-pill">php array_shift()</a>
            <a href="#" class="badge badge-light badge-pill">gökhan toy</a>
            <a href="#" class="badge badge-light badge-pill">aile</a>
            <a href="#" class="badge badge-light badge-pill">hayat</a>
        </div>
    </div>

<?php require view('static/footer') ?>