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
                    <div class="card-header">Ubah Kamar</div>
                    <div class="card-body">
                        <form action="" method="POST" enctype="multipart/form-data" accept-charset="utf-8">
                            <?= csrf_field() ?>
                            <div class="form-group">
                                <label class="col-form-label">Jumlah File Diupload : <span class="count">0</span>
                                    File</label>
                                <label class="custom-file col-12">
                                    <input type="file" id="file" accept=".jpg, .png, .jpeg" name="foto[]"
                                        class="custom-file-input <?php if ($validation->getError('foto')) : ?>is-invalid<?php endif ?>"
                                        multiple onchange="multipleImg()">
                                    <p class="text-danger">
                                        <?= $validation->hasError('foto') ? $validation->getError('foto') : ""; ?>
                                    </p>
                                    <span class="custom-file-control">Pilih Foto Kamar...</span>
                                </label>
                            </div>
                            <div class="form-group">
                                <label for="inputNama" class="col-form-label">No Kamar</label>
                                <input type="number" min="0"
                                    class="form-control  <?php if ($validation->getError("nomor")) : ?>is-invalid<?php endif ?>"
                                    id="inputNama" value="<?= (old('nomor')) ? old('nomor') : $room["no_kamar"]; ?>"
                                    placeholder="Nomor Kamar" name="nomor" required>
                                <div class="invalid-feedback">
                                    <?= $validation->getError("nomor"); ?>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputNama" class="col-form-label">Nama Kamar</label>
                                <input type="text"
                                    class="form-control  <?php if ($validation->getError('nama')) : ?>is-invalid<?php endif ?>"
                                    id="inputNama" value="<?= (old('nama')) ? old('nama') : $room["nama_kamar"]; ?>"
                                    placeholder="Nama Kategori" name="nama" required>
                                <div class="invalid-feedback">
                                    <?= $validation->getError('nama'); ?>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputAddress" class="col-form-label">Deskripsi Kamar</label>
                                <textarea type="text"
                                    class="form-control <?php if ($validation->getError('deskripsi')) : ?>is-invalid<?php endif ?>"
                                    id="inputAddress" placeholder="Deskripsi Kategori Kamar" name="deskripsi"
                                    required><?= old('deskripsi') ?><?= (old('deskripsi')) ? old('deskripsi') : $room["deskripsi_kamar"]; ?></textarea>
                                <div class="invalid-feedback">
                                    <?= $validation->getError('deskripsi'); ?>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputNama" class="col-form-label">Harga Kamar Permalam</label>
                                <input type="number" min="0"
                                    class="form-control  <?php if ($validation->getError("harga")) : ?>is-invalid<?php endif ?>"
                                    id="inputNama" value="<?= (old('harga')) ? old('harga') : $room["harga_kamar"]; ?>"
                                    placeholder="Rp." name="harga" required>
                                <div class="invalid-feedback">
                                    <?= $validation->getError("harga"); ?>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputNama" class="col-form-label">Kategori Kamar</label>
                                <select type="text"
                                    class="form-control  <?php if ($validation->getError("kategori")) : ?>is-invalid<?php endif ?>"
                                    id="inputNama" name="kategori" required>
                                    <?php foreach ($kategori as $d) : ?>
                                    <?php if (old('kategori') == $d['id_kategori'] || $room["id_kategori"] == $d['id_kategori']) : ?>
                                    <option value="<?= $d['id_kategori']; ?>" selected><?= $d['nama_kategori']; ?>
                                    </option>
                                    <?php else : ?>
                                    <option value="<?= $d['id_kategori']; ?>"><?= $d['nama_kategori']; ?></option>
                                    <?php endif; ?>
                                    <?php endforeach; ?>
                                </select>
                                <div class="invalid-feedback">
                                    <?= $validation->getError("kategori"); ?>
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