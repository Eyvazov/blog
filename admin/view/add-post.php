<?php require admin_view('static/header'); ?>
    <div class="box-">
        <h1>
            Məqalə Əlavə Et
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
                            <label for="post_title">Məqalə Adı</label>
                            <div class="form-content">
                                <input type="text" id="post_title" name="post_title"
                                       value="<?= post('post_title') ?>">
                            </div>
                        </li>
                        <li>
                            <label for="post_short_content">Məqalə Qısa Kontent</label>
                            <div class="form-content">
                                <textarea name="post_short_content" class="editor-short" id="post_short_content"
                                          cols="30" rows="10"><?= post('post_short_content') ?></textarea>
                            </div>
                        </li>
                        <li>
                            <label for="post_content">Məqalə Kontenti</label>
                            <div class="form-content">
                                <textarea name="post_content" class="editor" id="post_content" cols="30"
                                          rows="10"><?= post('post_content') ?></textarea>
                            </div>
                        </li>
                        <li>
                            <label for="post_categories">Kateqoriyalar</label>
                            <div class="form-content">
                                    <select name="post_categories[]" id="post_categories" multiple size="6">
                                        <?php foreach ($categories as $category): ?>
                                            <option value="<?= $category['category_id']?>"><?= $category['category_name']?></option>
                                        <?php endforeach; ?>
                                    </select>
                            </div>
                        </li>
                        <li>
                            <label for="post_status">Məqalə Statusu</label>
                            <div class="form-content">
                                <select name="post_status" id="post_status">
                                    <option value="1" <?= post('post_status') == 1 ? ' selected' : null ?>>Paylaşılmış</option>
                                    <option value="2" <?= post('post_status') == 2 ? ' selected' : null ?>>Qaralama</option>
                                </select>
                            </div>
                        </li>
                        <li>
                            <label for="post_tags">Məqalə Etiketləri</label>
                            <div class="form-content">
                                <input type="text" name="post_tags" class="tagsinput" value="<?= post('post_tags')?>">
                                <p>2 və ya daha çox etiket əlavə eləmək istəyirsizsə, etiketlər alt-alta yazın.</p>
                            </div>
                        </li>
                    </ul>
                </div>
                <div tab-content>
                    <ul>
                        <li>
                            <label for="post_url">SEO URL</label>
                            <div class="form-content">
                                <input type="text" id="post_url" name="post_url"
                                       value="<?= post('post_url') ?>"/>
                                <p>Əgər bu hissəni boş buraxsanız avtomatik olaraq kateqoriyanın adını nümunə
                                    götürəcəkdir.</p>
                            </div>
                        </li>
                        <li>
                            <label for="seo_title">SEO Title</label>
                            <div class="form-content">
                                <input type="text" id="seo_title" name="post_seo[title]"/>
                            </div>
                        </li>
                        <li>
                            <label for="seo_desc">SEO Description</label>
                            <div class="form-content">
                        <textarea name="post_seo[description]"
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