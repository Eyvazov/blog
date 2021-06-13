<?php require admin_view('static/header') ?>
    <div class="box-">
        <h1>
            Tənzimləmələr
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
                    <a href="#">Baxım Rejimi</a>
                </li>
                <li>
                    <a href="#">SMTP Mail</a>
                </li>
                <li>
                    <a href="#">Şablon </a>
                </li>
            </ul>
        </div>
        <form action="" method="POST" class="form label">
            <div class="tab-container">
                <div tab-content>
                    <ul>
                        <li>
                            <label for="title">Sayt Başlığı</label>
                            <div class="form-content">
                                <input type="text" id="title" name="settings[title]" value="<?= setting('title') ?>">
                            </div>
                        </li>
                        <li>
                            <label for="description">Sayt Açıqlaması</label>
                            <div class="form-content">
                                <input type="text" id="description" name="settings[description]"
                                       value="<?= setting('description') ?>">
                            </div>
                        </li>
                        <li>
                            <label for="keywords">Açar Sözlər</label>
                            <div class="form-content">
                                <input type="text" id="keywords" name="settings[keywords]" value="<?= setting('keywords') ?>">
                            </div>
                        </li>
                        <li>
                            <label for="author">Müəllif</label>
                            <div class="form-content">
                                <input type="text" id="author" name="settings[author]" value="<?= setting('author') ?>">
                            </div>
                        </li>
                        <li>
                            <label for="template">Sayt Şablonu</label>
                            <div class="form-content">
                                <select name="settings[theme]" id="template">
                                    <option value="">- Şablon Seçin -</option>
                                    <?php foreach ($themes as $theme): ?>
                                        <option <?= (setting('theme') == $theme ? ' selected ' : null) ?>
                                                value="<?= $theme ?>"><?= $theme ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </li>
                    </ul>
                </div>
                <div tab-content>
                    <ul>
                        <li>
                            <label for="maintenance">Baxım Rejimi</label>
                            <div class="form-content">
                                <select name="settings[maintenance]" id="maintenance">
                                    <option <?= setting('maintenance') == 1 ? 'selected' : null ?> value="1">Açıq</option>
                                    <option <?= setting('maintenance') == 2 ? 'selected' : null ?> value="2">Bağlı</option>
                                </select>
                            </div>
                        </li>
                        <li>
                            <label for="maintenance_title">Baxım rejimi başlığı</label>
                            <div class="form-content">
                                <input type="text" id="maintenance_title" name="settings[maintenance_title]"
                                       value="<?= setting('maintenance_title') ?>">
                            </div>
                        </li>
                        <li>
                            <label for="maintenance_desc">Baxım rejimi açıqlaması</label>
                            <div class="form-content">
                        <textarea name="settings[maintenance_desc]"
                                  id="maintenance_desc"><?= setting('maintenance_desc') ?></textarea>
                            </div>
                        </li>
                    </ul>
                </div>

                <div tab-content>
                    <ul>
                        <li>
                            <label for="smtp_host">SMTP Host</label>
                            <div class="form-content">
                                <input type="text" id="smtp_host" name="settings[smtp_host]"
                                       value="<?= setting('smtp_host') ?>">
                            </div>
                        </li>
                        <li>
                            <label for="smtp_email">SMTP E-poçt Ünvanı</label>
                            <div class="form-content">
                                <input type="text" id="smtp_email" name="settings[smtp_email]"
                                       value="<?= setting('smtp_email') ?>">
                            </div>
                        </li>
                        <li>
                            <label for="smtp_password">SMTP E-poçt Şifrəsi</label>
                            <div class="form-content">
                                <input type="text" id="smtp_password" name="settings[smtp_password]"
                                       value="<?= setting('smtp_password') ?>">
                            </div>
                        </li>
                        <li>
                            <label for="smtp_secure">SMTP Təhlükəsizlik</label>
                            <div class="form-content">
                                <select name="settings[smtp_secure]" id="smtp_secure">
                                    <option <?= setting('smtp_secure') == 'ssl' ? ' selected' : null ?> value="ssl">SSL
                                    </option>
                                    <option <?= setting('smtp_secure') == 'tls' ? ' selected' : null ?> value="tls">TLS
                                    </option>
                                </select>
                            </div>
                        </li>
                        <li>
                            <label for="smtp_port">SMTP Port</label>
                            <div class="form-content">
                                <input type="text" id="smtp_port" name="settings[smtp_port]"
                                       value="<?= setting('smtp_port') ?>">
                            </div>
                        </li>
                        <li>
                            <label for="smtp_send_email">SMTP Göndərənin E-poçt Ünvanı</label>
                            <div class="form-content">
                                <input type="text" id="smtp_send_email" name="settings[smtp_send_email]"
                                       value="<?= setting('smtp_send_email') ?>">
                            </div>
                        </li>
                        <li>
                            <label for="smtp_send_name">SMTP Göndərənin Ad Soyadı</label>
                            <div class="form-content">
                                <input type="text" id="smtp_send_name" name="settings[smtp_send_name]"
                                       value="<?= setting('smtp_send_name') ?>">
                            </div>
                        </li>
                    </ul>
                </div>

                <div tab-content>
                    <ul>
                        <li>
                            <label for="logo">Logo Başlığı</label>
                            <div class="form-content">
                                <input type="text" id="logo" name="settings[logo]" value="<?= setting('logo') ?>">
                            </div>
                        </li>
                        <li>
                            <label for="search_placeholder">Axtarış Placeholder-ı</label>
                            <div class="form-content">
                                <input type="text" id="search_placeholder" name="settings[search_placeholder]"
                                       value="<?= setting('search_placeholder') ?>">
                            </div>
                        </li>
                        <li>
                            <label for="facebook">Facebook</label>
                            <div class="form-content">
                                <input type="text" id="facebook" name="settings[facebook]"
                                       value="<?= setting('facebook') ?>">
                            </div>
                        </li>
                        <li>
                            <label for="twitter">Twitter</label>
                            <div class="form-content">
                                <input type="text" id="twitter" name="settings[twitter]" value="<?= setting('twitter') ?>">
                            </div>
                        </li>
                        <li>
                            <label for="instagram">Instagram</label>
                            <div class="form-content">
                                <input type="text" id="instagram" name="settings[instagram]"
                                       value="<?= setting('instagram') ?>">
                            </div>
                        </li>
                        <li>
                            <label for="linkedin">LinkedIn</label>
                            <div class="form-content">
                                <input type="text" id="linkedin" name="settings[linkedin]"
                                       value="<?= setting('linkedin') ?>">
                            </div>
                        </li>
                        <li>
                            <label for="footer_about">Footer Haqqımıda Yazısı</label>
                            <div class="form-content">
                        <textarea name="settings[footer_about]"
                                  id="footer_about"><?= setting('footer_about') ?></textarea>
                            </div>
                        </li>
                        <li>
                            <label for="welcome_title">Xoş Gəldin Başlığı</label>
                            <div class="form-content">
                                <input type="text" id="welcome_title" name="settings[welcome_title]"
                                       value="<?= setting('welcome_title') ?>">
                            </div>
                        </li>
                        <li>
                            <label for="welcome_text">Xoş Gəldin Kontenti</label>
                            <div class="form-content">
                        <textarea name="settings[welcome_text]"
                                  id="welcome_text"><?= setting('welcome_text') ?></textarea>
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