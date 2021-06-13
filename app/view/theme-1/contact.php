<?php require view('static/header')?>
    <section class="jumbotron text-center">
        <div class="container">
            <h1>İLETİŞİM</h1>
            <div class="breadcrumb-custom">
                <a href="#">Anasayfa</a> /
                <a href="#" class="active">İletişim</a>
            </div>
        </div>
    </section>

    <div class="container">
        <form action="" id="contact-form" onsubmit="return false">
            <div class="alert alert-danger" style="display: none;" id="contact-error-msg" role="alert"></div>
            <div class="alert alert-success" style="display: none;" id="contact-success-msg" role="alert">
            </div>
        <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="name">Ad Soyad</label>
                        <input type="text" name="name" class="form-control" id="name">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="email">E-poçt Ünvanı</label>
                        <input type="email" name="email" class="form-control" id="email">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="phone">Telefon Nömrəsi</label>
                        <input type="text" name="phone" class="form-control" id="phone">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="subject">Mesaj Mövzusu</label>
                        <input type="text" name="subject" class="form-control" id="subject">
                    </div>
                </div>

                <div class="col-md-12">
                    <div class="form-group">
                        <label for="message">Mesaj Kontenti</label>
                        <textarea name="message" id="message" cols="30" rows="5" class="form-control"></textarea>
                    </div>
                    <button type="submit" onclick="contact('#contact-form')" class="btn btn-primary">Göndər</button>
                </div>
        </div>
        </form>
    </div>

<?php require view('static/footer')?>