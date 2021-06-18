<?php require view('static/header') ?>

    <section class="jumbotron text-center">
        <div class="container">
            <h1><?= $row['post_title'] ?></h1>
            <div class="breadcrumb-custom">
                <a href="<?= site_url() ?>">Əsas Səhifə</a> /
                <a href="<?= site_url('blog') ?>">Bloq</a> /
                <?php
                $category_url = explode(',', $row['category_url']);
                foreach (explode(',', $row['category_name']) as $index => $category_name): ?>
                    <a href="<?= site_url('blog/kateqoriya/') . trim($category_url[$index]) ?>"><?= $category_name ?></a> /
                <?php endforeach; ?>
                <a href="<?= site_url('blog/' . $row['post_url']) ?>" class="active">CSS</a>
            </div>
        </div>
    </section>
    <div class="container">
    <div class="row">
        <div class="col-md-12">

            <div class="card mb-3">
                <div class="card-header">
                    <?= $row['category_name'] ?>
                    <div class="date">
                        <?= timeConvert($row['post_date']) ?>
                    </div>
                </div>
                <div class="card-body">
                    <?= htmlspecialchars_decode($row['post_content']) ?>
                </div>
            </div>

            <div class="card text-center mb-3">
                <div class="card-header">
                    <ul class="nav nav-tabs card-header-tabs" id="myTab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="home-tab" data-toggle="tab" href="#comments" role="tab"
                               aria-controls="comments" aria-selected="true">Rəylər</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="share-tab" data-toggle="tab" href="#share" role="tab"
                               aria-controls="share" aria-selected="false">Paylaş</a>
                        </li>
                    </ul>
                </div>
                <div class="card-body">
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active" id="comments" role="tabpanel"
                             aria-labelledby="home-tab">

                            <?php if ($comments): ?>
                                <div id="comments">
                                    <?php foreach ($comments as $comment) require view('static/comment');?>
                                </div>
                            <?php else: ?>
                            <div id="no-comment">
                                <h5 class="card-title">İlk Rəyi Siz Yazın</h5>
                                <p class="card-text">Bu məqaləyə heç bir rəy gəlməyib, onda ilk rəy yazan siz olun)</p>
                                <a href="#add-comment" class="btn btn-primary">Rəy Göndər</a>
                            </div>
                            <div id="comments">

                            </div>
                            <?php endif; ?>


                        </div>
                        <div class="tab-pane fade" id="share" role="tabpanel" aria-labelledby="profile-tab">
                            <div class="share mb-4">
                                <a target="_blank"
                                   href="https://www.facebook.com/sharer/sharer.php?u=<?= site_url('blog/' . $row['post_url']) ?>"
                                   class="facebook" data-toggle="tooltip" data-placement="top"
                                   title="Facebook'da Paylaş">
                                    <span class="fab fa-facebook-f"></span>
                                </a>
                                <a target="_blank"
                                   href="https://twitter.com/intent/tweet?text=<?= $row['post_title'] ?>%20-%20<?= site_url('blog/' . $row['post_url']) ?>"
                                   class="twitter" data-toggle="tooltip" data-placement="top"
                                   title="Tweet at">
                                    <span class="fab fa-twitter"></span>
                                </a>
                                <a target="_blank"
                                   href="https://www.linkedin.com/shareArticle?mini=true&url=<?= site_url('blog/' . $row['post_url']) ?>&title=<?= $row['post_title'] ?>&summary=<?= cut_text($row['post_short_content'], 100) ?>"
                                   class="linkedin" data-toggle="tooltip" data-placement="top"
                                   title="Linkedin'də Paylaş">
                                    <span class="fab fa-linkedin-in"></span>
                                </a>
                                <a target="_blank"
                                   href="https://wa.me/?text=<?= site_url('blog/' . $row['post_url']) ?>"
                                   class="whatsapp" data-toggle="tooltip" data-placement="top"
                                   title="Whatsapp'dan Göndər">
                                    <span class="fab fa-whatsapp"></span>
                                </a>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Bağlantı Linki</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" onclick="this.select()"
                                           value="<?= site_url('blog/' . $row['post_url']) ?>">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card mb-3" id="add-comment">
                <div class="card-header">
                    Rəy Bildir
                </div>
                <div class="card-body">
                    <div class="alert alert-danger" id="comment-msg" style="display: none">
                    </div>
                    <form onsubmit="return false;" id="comment-form" data-id="<?= $row['post_id']?>">
                        <?php if (!session('user_id')): ?>
                            <div class="form-group">
                                <label for="email">E-poçt Ünvanınız</label>
                                <input type="email" name="email" class="form-control" id="email">
                                <small id="emailHelp" class="form-text text-muted">E-poçt ünvanınız rəy göstərilərkən gizli qalacaqdır.</small>
                            </div>
                            <div class="form-group">
                                <label for="name">Adınız-soyadınız</label>
                                <input type="text" class="form-control" name="name" id="name">
                            </div>
                        <?php else: ?>
                            <div class="alert alert-warning">
                                <b><?= session('user_name') ?></b> hesabı ilə rəy yazırsınız. [<a
                                        href="<?= site_url('cixis') ?>">Çıxış</a>]
                            </div>
                        <?php endif; ?>
                        <div class="form-group">
                            <label for="comment">Rəyiniz</label>
                            <textarea name="comment" id="comment" cols="30" rows="5" class="form-control"></textarea>
                        </div>
                        <button type="submit" onclick="add_comment('#comment-form')" class="btn btn-primary">Gönder
                        </button>
                    </form>
                </div>
            </div>

        </div>
    </div>

<?php require view('static/footer') ?>