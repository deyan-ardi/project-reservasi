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
                        <h5>Manajemen Pegawai</h5>
                        <h6 class="sub-heading">Anda dapat melakukan manajemen pada pegawai/staff bungalow yang ada
                            melalui fitur ini
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
                    <div class="card-header">Data Pegawai</div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="rowSelection" class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Foto</th>
                                        <th>Nama</th>
                                        <th>Alamat</th>
                                        <th>Tanggal Lahir</th>
                                        <th>Email</th>
                                        <th>Jabatan</th>
                                        <th>Status</th>
                                        <th>Fitur</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $i = 1;
                                    foreach ($users as $d) : ?>
                                    <tr>
                                        <td><?= $i++; ?></td>
                                        <?php if (empty($d->foto)) : ?>
                                        <td><img src="<?= base_url(); ?>/user_image/default.jpg" width="75px"
                                                alt="User"></td>
                                        <?php else : ?>
                                        <td><img src="<?= base_url(); ?>/user_image/<?= $d->foto; ?>" width="75px"
                                                alt="User"></td>
                                        <?php endif; ?>
                                        <td><?= ucWords($d->username); ?></td>
                                        <?php if (empty($d->alamat)) : ?>
                                        <td>
                                            <div class="alert custom alert-danger">
                                                <i class="icon-warning2"></i>Belum Disetel
                                            </div>
                                        </td>
                                        <?php else : ?>
                                        <td><?= $d->alamat; ?></td>
                                        <?php endif; ?>
                                        <?php if (empty($d->ttl)) : ?>
                                        <td>
                                            <div class="alert custom alert-danger">
                                                <i class="icon-warning2"></i>Belum Disetel
                                            </div>
                                        </td>
                                        <?php else : ?>
                                        <td><?= $d->ttl; ?></td>
                                        <?php endif; ?>
                                        <td><?= $d->email; ?></td>
                                        <?php if ($d->name == "super admin") : ?>
                                        <td>Admin</td>
                                        <?php else : ?>
                                        <td>Staff</td>
                                        <?php endif; ?>
                                        <?php if ($d->active == 1) : ?>
                                        <td class="text-success">Active</td>
                                        <?php else : ?>
                                        <td class="text-danger">Non-Active</td>
                                        <?php endif; ?>
                                        <td><a href="<?= base_url(); ?>/admin/hapus-pegawai/<?= $d->userid; ?>"><button
                                                    type="button"
                                                    class="btn btn-danger tombol-hapus">Hapus</button></a><br><a
                                                href="<?= base_url(); ?>/admin/ubah-pegawai/<?= $d->userid; ?>"><button
                                                    type="button" class="btn btn-warning mt-2">Ubah</button></a></td>
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