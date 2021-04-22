<?= $this->extend("admin/master/master"); ?>
<?= $this->section("main"); ?>
<div class="app-main">
    <!-- BEGIN .main-heading -->
    <header class="main-heading">
        <div class="container-fluid">
            <div class="row">
                <div class="col-xl-8 col-lg-8 col-md-8 col-sm-8">
                    <div class="page-icon">
                        <i class="icon-laptop_windows"></i>
                    </div>
                    <div class="page-title">
                        <h5>Pengaturan Profil Admin</h5>
                        <h6 class="sub-heading">Anda dapat mengubah data Anda disini
                        </h6>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!-- END: .main-heading -->
    <div class="main-content">
        <!-- Row start -->
        <div class="row gutters">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                <div class="card">
                    <div class="card-header">Profil Pribadi Anda</div>
                    <div class="card-body">
                        <form action="" method="POST" enctype="multipart/form-data">
                            <?= csrf_field() ?>
                            <div class="form-group">
                                <div class="form-row">
                                    <?php
                                    if (empty($users[0]->foto)) {
                                        $status = "required";
                                    } else {
                                        $status = "";
                                    }
                                    ?>
                                    <div class="border border-secondary rounded">
                                        <?php if (empty($users[0]->foto)) : ?>
                                        <img src="<?= base_url(); ?>/user_image/default.jpg" width="125px"
                                            class="img-thumbnail img-preview" alt="">
                                        <?php else : ?>
                                        <img src="<?= base_url(); ?>/user_image/<?= $users[0]->foto; ?>" width="125px"
                                            class="img-thumbnail img-preview" alt="">
                                        <?php endif; ?>
                                    </div>
                                    <label class="custom-file ml-3">
                                        <input type="file" id="file" accept=".jpg, .png, .jpeg" name="foto"
                                            <?= $status; ?> onchange="previewImg()"
                                            class="custom-file-input <?php if ($validation->getError('foto')) : ?>is-invalid<?php endif ?>">
                                        <p class="text-danger">
                                            <?= $validation->hasError('foto') ? $validation->getError('foto') : ""; ?>
                                        </p>
                                        <span class="custom-file-control">Pilih Foto Anda...</span>
                                    </label>

                                </div>
                                <h5 class="text-center mt-5">Profil Anda</h5>
                                <hr width="25%">
                                <div class="form-group">
                                    <label for="inputNama" class="col-form-label">Nama Anda</label>
                                    <input type="text"
                                        class="form-control  <?php if ($validation->getError('username')) : ?>is-invalid<?php endif ?>"
                                        id="inputNama"
                                        value="<?= (old('username')) ? old('username') : ucWords($users[0]->username); ?>"
                                        placeholder="Nama" name="username" required>
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('username'); ?>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="inputAddress" class="col-form-label">Alamat</label>
                                    <input type="text" class="form-control" id="inputAddress"
                                        value="<?= (old('alamat')) ? old('alamat') : ucWords($users[0]->alamat); ?>"
                                        placeholder="Alamat Pegawai" name="alamat">
                                </div>
                                <div class="form-group">
                                    <label for="inputTanggal" class="col-form-label">Tanggal Lahir</label>
                                    <input type="date" max="2006-01-01" name="ttl"
                                        value="<?= (old('ttl')) ? old('ttl') : ucWords($users[0]->ttl); ?>"
                                        class="form-control" id="inputTanggal">
                                </div>
                                <div class="form-group">
                                    <label for="no_tlp" class="col-form-label">No Telp/Whatsapp</label>
                                    <input type="number" min="0" minlength="8" maxlength="13" name="no_tlp"
                                        value="<?= (old('no_tlp')) ? old('no_tlp') : ucWords($users[0]->no_tlp); ?>"
                                        class="form-control <?php if ($validation->getError('no_tlp')) : ?>is-invalid<?php endif ?>"
                                        id="no_tlp" placeholder="+62" required>
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('no_tlp'); ?>
                                    </div>
                                </div>
                                <h5 class="text-center mt-5">Pengaturan Akun</h5>
                                <hr width="25%">
                                <div class="form-group">
                                    <label for="inputEmail" class="col-form-label">Email</label>
                                    <input type="email"
                                        class="form-control <?php if ($validation->getError('email')) : ?>is-invalid<?php endif ?>"
                                        id="inputEmail" value="<?= (old('email')) ? old('email') : $users[0]->email; ?>"
                                        placeholder="example@mail.com" name="email" required>
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('email'); ?>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="inputPassword" class="col-form-label">Password</label>
                                    <input type="password" class="form-control" id="inputPassword" name="password"
                                        placeholder="Jika ingin diganti">
                                </div>
                                <div class="form-group">
                                    <label for="inputPassword" class="col-form-label">Re-Password</label>
                                    <input type="password" class="form-control" id="inputPassword" name="re-password"
                                        placeholder="Jika ingin diganti">
                                </div>
                                <button type="submit" name="submit" value="Submit" class="btn btn-primary">Simpan
                                    Perubahan</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Row ends -->
</div>
<?= $this->endSection(); ?>