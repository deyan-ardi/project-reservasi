<?= $this->extend("user/master/master"); ?>
<?= $this->section('main'); ?>
<section class="page-banner">
    <div class="container">
        <div class="page-banner-content">
            <h2>Kontak Kami</h2>
            <p><a href="<?= base_url(); ?>">Beranda</a> / Kontak Kami</p>
        </div>
    </div>
</section>


<section class="contact-info-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 col-md-6">
                <div class="contact-box">
                    <div class="icon">
                        <i class="flaticon-placeholder"></i>
                    </div>
                    <h4>Alamat</h4>
                    <p><a href="#">Abang, Kabupaten Karangasem, Bali 80852 </a></p>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="contact-box">
                    <div class="icon">
                        <i class="flaticon-call-answer"></i>
                    </div>
                    <h4>Telepon/Fax</h4>
                    <p> +62-363-22116 </p>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 offset-lg-0 offset-md-3">
                <div class="contact-box">
                    <div class="icon">
                        <i class="flaticon-envelope"></i>
                    </div>
                    <h4>Email</h4>
                    <p>gsemalung@gmail.com</p>
                </div>
            </div>
        </div>
    </div>
</section>


<div class="contact-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <div class="map-area">
                    <iframe
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3946.944690660396!2d115.58206805042322!3d-8.407093293924122!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dd20696b58cb321%3A0x9e03589009feec45!2sGeria%20Semalung%20Bungalow!5e0!3m2!1sid!2sid!4v1618751233390!5m2!1sid!2sid"
                        width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="contact-area">
                    <div class="contactForm">
                        <form id="contactForm" method="POST" action="">
                            <?= csrf_field() ?>
                            <div class="row">
                                <div class="col-lg-6 col-sm-6">
                                    <div class="form-group">
                                        <input type="text" name="name" id="nama"
                                            class="form-control <?php if ($validation->getError('name')) : ?>is-invalid<?php endif ?>"
                                            required placeholder="Nama Anda">
                                        <div class="invalid-feedback">
                                            <?= $validation->getError("name"); ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-sm-6">
                                    <div class="form-group">
                                        <input type="email" name="email" id="email"
                                            class="form-control  <?php if ($validation->getError('name')) : ?>is-invalid<?php endif ?>"
                                            required placeholder="Email Anda">
                                        <div class="invalid-feedback">
                                            <?= $validation->getError("email"); ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-12 col-sm-6">
                                    <div class="form-group">
                                        <input type="text" name="subject" id="msg_subject"
                                            class="form-control  <?php if ($validation->getError('name')) : ?>is-invalid<?php endif ?>"
                                            required placeholder="Subjek">
                                        <div class="invalid-feedback">
                                            <?= $validation->getError("subject"); ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-12 col-md-12">
                                    <div class="form-group">
                                        <textarea name="message"
                                            class="form-control  <?php if ($validation->getError('name')) : ?>is-invalid<?php endif ?>"
                                            id="message" cols="30" rows="5" required placeholder="Pesan"></textarea>
                                        <div class="invalid-feedback">
                                            <?= $validation->getError("message"); ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-12 col-md-12">
                                    <div class="send-btn">
                                        <button type="submit" name="submit" value="Submit" class="send-btn-one">
                                            Kirim Pesan
                                        </button>
                                    </div>
                                    <div id="msgSubmit" class="h3 text-center hidden"></div>
                                    <div class="clearfix"></div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>