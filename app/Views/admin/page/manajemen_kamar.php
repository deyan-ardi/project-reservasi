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
                    <div class="card-header">Kategori Kamar</div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <a href="<?= base_url(); ?>/admin/tambah-kategori-kamar"><button
                                    class="btn btn-primary mb-3">Tambah Data</button></a>
                            <table id="rowSelection" class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Nama Kategori</th>
                                        <th>Deskripsi</th>
                                        <th>Dibuat Pada</th>
                                        <th>Dibuat Oleh</th>
                                        <th>Fitur</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $i = 1;
                                    foreach ($kategori_kamar as $d) : ?>
                                    <tr>
                                        <td><?= $i++; ?></td>
                                        <td><?= $d['nama_kategori']; ?></td>
                                        <td><?= $d['deskripsi']; ?></td>
                                        <td><?= $d['created_at']; ?></td>
                                        <td><?= $d['created_by']; ?></td>
                                        <td>
                                            <?php if (in_groups("super admin")) : ?>
                                            <a href="<?= base_url(); ?>/admin/hapus-kategori-kamar/<?= $d['id_kategori']; ?>"
                                                class="tombol-hapus"><button type="button"
                                                    class="btn btn-danger">Hapus</button></a><br>
                                            <?php endif; ?>
                                            <a
                                                href="<?= base_url(); ?>/admin/ubah-kategori-kamar/<?= $d['id_kategori']; ?>"><button
                                                    type="button" class="btn btn-warning mt-2">Ubah</button></a>
                                        </td>
                                    </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Row start -->
        <div class="row gutters">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                <div class="card">
                    <div class="card-header">Data Kamar</div>
                    <div class="card-body">
                        <a href="<?= base_url(); ?>/admin/tambah-kamar"><button class="btn btn-primary mb-3">Tambah
                                Data</button></a>
                        <div class="table-responsive">
                            <table id="rowSelection2" class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th>No Kamar</th>
                                        <th>Nama Kamar</th>
                                        <th>Deskripsi Kamar</th>
                                        <th>Harga Kamar</th>
                                        <th>Kategori Kamar</th>
                                        <th>Gambar Kamar</th>
                                        <th>Status Kamar</th>
                                        <th>Dibuat Pada</th>
                                        <th>Dibuat Oleh</th>
                                        <th>Fitur</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $i = 1;
                                    foreach ($kamar as $k) : ?>
                                    <tr>
                                        <td><?= $k->no_kamar; ?></td>
                                        <td><?= $k->nama_kamar; ?></td>
                                        <td><?= $k->deskripsi_kamar; ?></td>
                                        <td>Rp. <?= $k->harga_kamar; ?> /malam</td>
                                        <td><?= $k->nama_kategori; ?></td>
                                        <td>
                                            <div id="carouselExampleControls" class="carousel slide"
                                                data-ride="carousel">
                                                <div class="carousel-inner">
                                                    <?php
                                                        $i = 1;
                                                        foreach (json_decode($k->foto_kamar) as $f) : ?>
                                                    <?php if ($i == 1) : ?>
                                                    <div class="carousel-item active">
                                                        <?php else : ?>
                                                        <div class="carousel-item">
                                                            <?php endif; ?>
                                                            <img src="<?= base_url(); ?>/room_image/<?= $f->kamar; ?>"
                                                                class="d-block w-50" alt="not_found">
                                                        </div>
                                                        <?php
                                                                $i++;
                                                            endforeach ?>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                        <?php if ($k->status_kamar == 0) : ?>
                                        <td><button class="btn btn-danger">Kosong</button></td>
                                        <?php elseif ($k->status_kamar == 1) : ?>
                                        <td><button class="btn btn-info">Dipesan</button></td>
                                        <?php elseif ($k->status_kamar == 2) : ?>
                                        <td><button class="btn btn-success">Ditempati</button></td>
                                        <?php endif; ?>
                                        <td><?= $k->created_at; ?></td>
                                        <td><?= $k->created_by; ?></td>
                                        <td>
                                            <?php if (in_groups('super admin')) : ?>
                                            <a href="<?= base_url(); ?>/admin/hapus-kamar/<?= $k->id_kamar; ?>"
                                                class="tombol-hapus"><button type="button"
                                                    class="btn btn-danger">Hapus</button></a><br>
                                            <?php endif; ?>
                                            <a href="<?= base_url(); ?>/admin/ubah-kamar/<?= $k->id_kamar; ?>"><button
                                                    type="button" class="btn btn-warning mt-2">Ubah</button></a>
                                        </td>
                                    </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Row ends -->
</div>
<?= $this->endSection(); ?>