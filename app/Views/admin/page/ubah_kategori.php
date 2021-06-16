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
                        <h5>Manajemen Kamar</h5>
                        <h6 class="sub-heading">Anda dapat melakukan manajemen pada kamar yang ada melalui fitur ini
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
                    <div class="card-header">Ubah Kategori Kamar</div>
                    <div class="card-body">
                        <form action="" method="POST">
                            <?= csrf_field() ?>
                            <div class="form-group">
                                <label for="inputNama" class="col-form-label">Nama Kategori</label>
                                <input type="text"
                                    class="form-control  <?php if ($validation->getError('nama')) : ?>is-invalid<?php endif ?>"
                                    id="inputNama"
                                    value="<?= (old('nama')) ? old('nama') : $kategori['nama_kategori']; ?>"
                                    placeholder="Nama Kategori" name="nama" required>
                                <div class="invalid-feedback">
                                    <?= $validation->getError('nama'); ?>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputAddress" class="col-form-label">Deskripsi Kategori Kamar</label>
                                <textarea type="text"
                                    class="form-control <?php if ($validation->getError('deskripsi')) : ?>is-invalid<?php endif ?>"
                                    id="inputAddress" placeholder="Deskripsi Kategori Kamar" name="deskripsi"
                                    required><?= (old('deskripsi')) ? old('deskripsi') : $kategori['deskripsi'] ?></textarea>
                                <div class="invalid-feedback">
                                    <?= $validation->getError('deskripsi'); ?>
                                </div>
                            </div>
                            <button type="submit" name="submit" value="Submit" class="btn btn-primary">Simpan
                                Data</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Row ends -->
</div>
<?= $this->endSection(); ?>