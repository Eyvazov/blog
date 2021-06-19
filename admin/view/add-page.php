<?php require admin_view('static/header'); ?>
    <div class="box-">
        <h1>
            Səhifə Əlavə Et
        </h1>
    </div>

    <div class="clear" style="height: 10px;"></div>


    <div class="box-" tab>
        <div class="admin-tab">
            <ul tab-list>
                <li>
                    <a href="#">Ümumi</a>
                </li>
                <li>
                    <a href="#">SEO</a>
                </li>
            </ul>
        </div>
        <form action="" method="POST" class="form label">
            <div class="tab-container">
                <div tab-content>
                    <ul>
                        <li>
                            <label for="page_title">Səhifə Adı</label>
                            <div class="form-content">
                                <input type="text" id="page_title" name="page_title"
                                       value="<?= post('page_title') ?>">
                            </div>
                        </li>
                        <li>
                            <label for="page_content">Səhifə Kontenti</label>
                            <div class="form-content">
                                <textarea name="page_content" class="editor" id="page_content" cols="30" rows="10"><?= post('page_content')?></textarea>
                            </div>
                        </li>
                    </ul>
                </div>
                <div tab-content>
                    <ul>
                        <li>
                            <label for="page_url">SEO URL</label>
                            <div class="form-content">
                                <input type="text" id="page_url" name="page_url"
                                       value="<?= post('page_url') ?>"/>
                                <p>Əgər bu hissəni boş buraxsanız avtomatik olaraq səhifənin adını nümunə
                                    götürəcəkdir.</p>
                            </div>
                        </li>
                        <li>
                            <label for="seo_title">SEO Title</label>
                            <div class="form-content">
                                <input type="text" id="seo_title" name="page_seo[title]"/>
                            </div>
                        </li>
                        <li>
                            <label for="seo_desc">SEO Description</label>
                            <div class="form-content">
                        <textarea name="page_seo[description]"
                                  id="seo_desc" class="editor"></textarea>
                            </div>
                        </li>
                    </ul>
                </div>
                <ul>
                    <li class="submit">
                        <input type="hidden" name="submit" value="1">
                        <button type="submit">Yadda Saxla</button>
                    </li>
                </ul>
            </div>
        </form>
    </div>

<?php require admin_view('static/footer') ?>