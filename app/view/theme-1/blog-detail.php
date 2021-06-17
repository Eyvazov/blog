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
                    <a href="<?= site_url('blog/kateqoriya/') . trim($category_url[$index]) ?>"><?= $category_name?></a> /
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
                        <?= $row['category_name']?>
                        <div class="date">
                            <?= timeConvert($row['post_date'])?>
                        </div>
                    </div>
                    <div class="card-body">
                        <?= htmlspecialchars_decode($row['post_content'])?>
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

                                <div class="media comment-box">
                                    <div class="media-left">
                                        <a href="#">
                                            <img class="img-responsive user-photo"
                                                 src="https://ssl.gstatic.com/accounts/ui/avatar_2x.png">
                                        </a>
                                    </div>
                                    <div class="media-body">
                                        <h6 class="media-heading">Tayfun Erbilen</h6>
                                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                                            Lorem Ipsum has been the industry's standard dummy text ever since the
                                            1500s, when an unknown printer took a galley of type and scrambled it to
                                            make a type specimen book. It has survived not only five centuries, but also
                                            the leap into electronic typesetting, remaining essentially unchanged. It
                                            was popularised in the 1960s with the release of Letraset sheets containing
                                            Lorem Ipsum passages, and more recently with desktop publishing software
                                            like Aldus PageMaker including versions of Lorem Ipsum.</p>

                                    </div>
                                </div>

                                <div class="media comment-box">
                                    <div class="media-left">
                                        <a href="#">
                                            <img class="img-responsive user-photo"
                                                 src="https://pbs.twimg.com/profile_images/931133407291150336/l8IeLCoc_400x400.jpg">
                                        </a>
                                    </div>
                                    <div class="media-body">
                                        <h6 class="media-heading">Tayfun Erbilen</h6>
                                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                                            Lorem Ipsum has been the industry's standard dummy text ever since the
                                            1500s, when an unknown printer took a galley of type and scrambled it to
                                            make a type specimen book. It has survived not only five centuries, but also
                                            the leap into electronic typesetting, remaining essentially unchanged. It
                                            was popularised in the 1960s with the release of Letraset sheets containing
                                            Lorem Ipsum passages, and more recently with desktop publishing software
                                            like Aldus PageMaker including versions of Lorem Ipsum.</p>

                                    </div>
                                </div>

                                <h5 class="card-title">İlk yorumu siz yazın!</h5>
                                <p class="card-text">Bu konu için hiç yorum yazılmamış, ilk yorumu siz yazarak destek
                                    verin!</p>
                                <a href="#" class="btn btn-primary">Yorum Yaz</a>

                            </div>
                            <div class="tab-pane fade" id="share" role="tabpanel" aria-labelledby="profile-tab">
                                <div class="share mb-4">
                                    <a target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=<?= site_url('blog/' . $row['post_url'])?>" class="facebook" data-toggle="tooltip" data-placement="top"
                                       title="Facebook'da Paylaş">
                                        <span class="fab fa-facebook-f"></span>
                                    </a>
                                    <a target="_blank" href="https://twitter.com/intent/tweet?text=<?= $row['post_title']?>%20-%20<?= site_url('blog/' . $row['post_url'])?>" class="twitter" data-toggle="tooltip" data-placement="top"
                                       title="Tweet at">
                                        <span class="fab fa-twitter"></span>
                                    </a>
                                    <a target="_blank" href="https://www.linkedin.com/shareArticle?mini=true&url=<?= site_url('blog/' . $row['post_url'])?>&title=<?= $row['post_title']?>&summary=<?= cut_text($row['post_short_content'], 100)?>" class="linkedin" data-toggle="tooltip" data-placement="top"
                                       title="Linkedin'də Paylaş">
                                        <span class="fab fa-linkedin-in"></span>
                                    </a>
                                    <a target="_blank" href="https://wa.me/?text=<?= site_url('blog/' . $row['post_url'])?>" class="whatsapp" data-toggle="tooltip" data-placement="top"
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

                <div class="card mb-3">
                    <div class="card-header">
                        Yorum Yaz
                    </div>
                    <div class="card-body">
                        <form>
                            <div class="form-group">
                                <label for="email">E-posta Adresiniz</label>
                                <input type="email" class="form-control" id="email">
                                <small id="emailHelp" class="form-text text-muted">E-posta adresiniz yorumlar
                                    listelenirken gizli kalacaktır.</small>
                            </div>
                            <div class="form-group">
                                <label for="name">Adınız-soyadınız</label>
                                <input type="text" class="form-control" id="name">
                            </div>
                            <div class="form-group">
                                <label for="yorum">Yorumunuz</label>
                                <textarea name="yorum" id="yorum" cols="30" rows="5" class="form-control"></textarea>
                            </div>
                            <button type="submit" class="btn btn-primary">Gönder</button>
                        </form>
                    </div>
                </div>

            </div>
        </div>

<?php require view('static/footer') ?>