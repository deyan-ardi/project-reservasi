<?= $this->extend("user/master/master"); ?>
<?= $this->section("main"); ?>
<section class="page-banner">
    <div class="container">
        <div class="page-banner-content">
            <h2>Pengaturan Profil</h2>
            <p><a href="<?= base_url(); ?>">Beranda</a> / Pengaturan Profil</p>
        </div>
    </div>
</section>


<section class="single-room-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <div class="single-leave-reply">
                    <div class="reply-content">
                        <h3>Profil Anda</h3>
                    </div>
                    <form class="reservation-form" action="" method="POST" enctype="multipart/form-data">
                        <?= csrf_field(); ?>
                        <div class="row">
                            <div class="form-group">
                                <label for="file">Upload Foto Profil</label>
                                <input type="file" id="file" accept=".jpg, .png, .jpeg" name="foto"
                                    onchange="previewImg()"
                                    class="form-control <?php if ($validation->getError('foto')) : ?>is-invalid<?php endif ?>">
                                <div class="invalid-feedback">
                                    <?= $validation->getError('foto'); ?>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12 col-md-12">
                            <div class="form-group">
                                <label for="inputNama">Nama Anda</label>
                                <input type="text"
                                    class="form-control  <?php if ($validation->getError('username')) : ?>is-invalid<?php endif ?>"
                                    id="inputNama"
                                    value="<?= (old('username')) ? old('username') : ucWords($users[0]->username); ?>"
                                    placeholder="Nama" name="username" required>
                                <div class="invalid-feedback">
                                    <?= $validation->getError('username'); ?>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12 col-md-12">
                            <div class="form-group">
                                <label for="inputAddress">Alamat</label>
                                <input type="text" class="form-control" id="inputAddress"
                                    value="<?= (old('alamat')) ? old('alamat') : ucWords($users[0]->alamat); ?>"
                                    placeholder="Alamat Anda" name="alamat">
                            </div>
                        </div>
                        <div class="col-lg-12 col-md-12">
                            <div class="form-group">
                                <label for="datepicker">Tanggal Lahir</label>
                                <input type="date" class="form-control" name="ttl"
                                    value="<?= (old('ttl')) ? old('ttl') : ucWords($users[0]->ttl); ?>"
                                    placeholder="Tanggal Lahir">
                                <i class="flaticon-calendar"></i>
                            </div>
                        </div>
                        <div class="col-lg-12 col-md-12">
                            <div class="form-group">
                                <label for="datepicker">No Telp/Whatsapp</label>
                                <input type="number"
                                    class="form-control <?php if ($validation->getError('no_tlp')) : ?>is-invalid<?php endif ?>"
                                    name="no_tlp" minlength="8" maxlength="13" min="8000000000"
                                    value="<?= (old('no_tlp')) ? old('no_tlp') : ucWords($users[0]->no_tlp); ?>"
                                    placeholder="+62">
                                <div class="invalid-feedback">
                                    <?= $validation->getError('no_tlp'); ?>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12 col-md-12">
                            <div class="form-group">
                                <label for="inputEmail">Email</label>
                                <input type="email"
                                    class="form-control <?php if ($validation->getError('email')) : ?>is-invalid<?php endif ?>"
                                    id="inputEmail" value="<?= (old('email')) ? old('email') : $users[0]->email; ?>"
                                    placeholder="example@mail.com" name="email" required>
                                <div class="invalid-feedback">
                                    <?= $validation->getError('email'); ?>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputPassword">Password</label>
                            <input type="password" class="form-control" id="inputPassword" name="password"
                                placeholder="Jika ingin diganti">
                        </div>
                        <div class="form-group">
                            <label for="inputPassword">Re-Password</label>
                            <input type="password" class="form-control" id="inputPassword" name="re-password"
                                placeholder="Jika ingin diganti">
                        </div>
                        <div class="col-lg-12 col-md-12">
                            <div class="send-btn">
                                <button class="send-btn-one" type="submit" name="submit" value="Submit">Simpan
                                    Perubahan</button>
                            </div>
                        </div>
                </div>
                </form>
            </div>
            <div class="col-lg-4 col-md-12">
                <div class="sidebar mt-0">
                    <div class="widget widget-map">
                        <div class="widget-map-area">
                            <?php if (empty($users[0]->foto)) : ?>
                            <img src="<?= base_url(); ?>/user_image/default.jpg" class="img-thumbnail img-preview"
                                alt="">
                            <?php else : ?>
                            <img src="<?= base_url(); ?>/user_image/<?= $users[0]->foto; ?>"
                                class="img-thumbnail img-preview" alt="">
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?= $this->endSection(); ?>