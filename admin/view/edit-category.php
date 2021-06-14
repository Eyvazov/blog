<?php require admin_view('static/header') ?>
    <div class="box-">
        <h1>
            Kateqoriyanı Redaktə Et
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
                            <label for="category_name">Kateqoriya Adı</label>
                            <div class="form-content">
                                <input type="text" id="category_name" name="category_name"
                                       value="<?= post('category_name') ? post('category_name') : $row['category_name'] ?>">
                            </div>
                        </li>
                    </ul>
                </div>
                <div tab-content>
                    <ul>
                        <li>
                            <label for="seo_url">SEO URL</label>
                            <div class="form-content">
                                <input type="text" id="seo_url" name="category_url"
                                       value="<?= post('category_url') ? post('category_url') : $row['category_url'] ?>"/>
                                <p>Əgər bu hissəni boş buraxsanız avtomatik olaraq kateqoriyanın adını nümunə
                                    götürəcəkdir.</p>
                            </div>
                        </li>
                        <li>
                            <label for="seo_title">SEO Title</label>
                            <div class="form-content">
                                <input type="text" id="seo_title" name="category_seo[title]"
                                       value="<?= $category_seo['title'] ?>"/>
                            </div>
                        </li>
                        <li>
                            <label for="seo_desc">SEO Description</label>
                            <div class="form-content">
                        <textarea name="category_seo[description]" id="seo_desc"><?= $category_seo['description']?></textarea>
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