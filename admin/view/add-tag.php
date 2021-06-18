<?php require admin_view('static/header'); ?>
    <div class="box-">
        <h1>
            Etiket Əlavə Et
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
                            <label for="tag_name">Etiket Adı</label>
                            <div class="form-content">
                                <input type="text" id="tag_name" name="tag_name"
                                       value="<?= post('tag_name') ?>">
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
                                       value="<?= post('tag_url') ?>"/>
                                <p>Əgər bu hissəni boş buraxsanız avtomatik olaraq etiketin adını nümunə
                                    götürəcəkdir.</p>
                            </div>
                        </li>
                        <li>
                            <label for="seo_title">SEO Title</label>
                            <div class="form-content">
                                <input type="text" id="seo_title" name="tag_seo[title]"?>"/>
                            </div>
                        </li>
                        <li>
                            <label for="seo_desc">SEO Description</label>
                            <div class="form-content">
                        <textarea name="tag_seo[description]"
                                  id="seo_desc" class="editor"></textarea>
                            </div>
                        </li>
                    </ul>
                </div>
                <ul>
                    <li class="submit">
                        <input type="hidden" name="submit" value="1">
                        <button type="submit">Əlavə Et</button>
                    </li>
                </ul>
            </div>
        </form>
    </div>

<?php require admin_view('static/footer') ?>