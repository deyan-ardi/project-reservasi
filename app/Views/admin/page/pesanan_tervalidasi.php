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
                        <h5>Data Pesanan Tervalidasi</h5>
                        <h6 class="sub-heading">Anda dapat melakukan manajemen pada data pesanan yang sudah tervalidasi
                            yang ada pada sistem ini
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
                    <div class="card-header">Data Pesanan Masuk</div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="rowSelection2" class="table table-striped table-bordered">
                                <thead>
                                    <tr>

                                        <th rowspan="2">Kode Pesanan</th>
                                        <th rowspan="2">Nama Pemesan</th>
                                        <th rowspan="2">Status Pesanan</th>
                                        <th colspan="7" class="text-center">Pesanan</th>
                                        <th rowspan="2">Fitur</th>
                                    </tr>
                                    <tr>
                                        <th>Tamu Dewasa</th>
                                        <th>Tamu Anak-Anak</th>
                                        <th>Check In</th>
                                        <th>Check Out</th>
                                        <th>Deskripsi Pesanan</th>
                                        <th>Sudah Bayar</th>
                                        <th>Sisa Belum Dibayar</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($pesanan_masuk as $d) : ?>
                                    <tr>
                                        <td><?= $d->kode_pesanan; ?></td>
                                        <td><?= $d->username; ?></td>
                                        <td>
                                            <?php if ($d->status_menginap == 1) : ?>
                                            <a href="#" data-toggle="modal"
                                                data-target="#bukti-<?= $d->id_pesanan; ?>"><button type="button"
                                                    class="btn btn-success btn-sm">Pesanan
                                                    Masuk</button>
                                            </a>
                                            <?php elseif ($d->status_menginap == 2) : ?>
                                            <a href="#"><button type="button" class="btn btn-info btn-sm">Tamu
                                                    Check In</button>
                                            </a>
                                            <?php elseif ($d->status_menginap == 3) : ?>
                                            <a href="#"><button type="button" class="btn btn-info btn-sm">Tamu
                                                    Check Out</button>
                                            </a>
                                            <?php else : ?>
                                            <a href="#"><button type="button" class="btn btn-danger btn-sm">Tidak
                                                    Aktif</button>
                                            </a>
                                            <?php endif; ?>
                                        </td>
                                        <td><?= $d->tamu_dewasa; ?> Orang</td>
                                        <td><?= $d->tamu_anak; ?> Orang</td>
                                        <td><?= date('d-m-Y', strtotime($d->check_in)); ?></td>
                                        <td><?= date('d-m-Y', strtotime($d->check_out)); ?></td>
                                        <td><?php if (empty($d->pesan)) : ?>
                                            -
                                            <?php else : ?>
                                            <?= $d->pesan; ?>
                                            <?php endif; ?>
                                        </td>
                                        <td>Rp.<?= $d->total_bayar; ?></td>
                                        <td>Rp.<?= $d->sisa_bayar; ?></td>
                                        <td>
                                            <a href="#" data-toggle="modal"
                                                data-target="#view-<?= $d->id_pesanan; ?>"><button type="button"
                                                    class="btn btn-info btn-sm mt-2">Detail Pesanan</button>
                                            </a><br>
                                            <?php if ($d->status_menginap == 1) : ?>
                                            <a href="<?= base_url(); ?>/admin/check-in-tamu/<?= $d->id_pesanan; ?>"><button
                                                    type="button" class="btn btn-success btn-sm mt-2">Tamu Check
                                                    In</button>
                                            </a><br>
                                            <?php elseif ($d->status_menginap == 2) : ?>
                                            <a href="<?= base_url(); ?>/admin/check-out-tamu/<?= $d->id_pesanan; ?>"><button
                                                    type="button" class="btn btn-success btn-sm mt-2">Tamu Check
                                                    Out</button>
                                            </a><br>
                                            <a href="#" data-toggle="modal"
                                                data-target="#perpanjang-<?= $d->id_pesanan; ?>"><button type="button"
                                                    class="btn btn-warning btn-sm mt-2">Perpanjang</button>
                                            </a><br>
                                            <?php endif; ?>
                                            <?php if (in_groups("super admin")) : ?>
                                            <a href="<?= base_url(); ?>/admin/hapus-tamu/<?= $d->id_pesanan; ?>"
                                                class="tombol-hapus"><button type="button"
                                                    class="btn btn-danger btn-sm mt-2 ">Hapus
                                                    Pesanan</button>
                                            </a>
                                            <?php endif; ?>
                                        </td>
                                    </tr>

                                    <!-- Modal -->
                                    <div class="modal fade" id="perpanjang-<?= $d->id_pesanan; ?>" tabindex="-1"
                                        aria-labelledby="perpanjangLabel-<?= $d->id_pesanan; ?>" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="perpanjangLabel-<?= $d->id_pesanan; ?>">
                                                        Perpanjang
                                                        Pesanan Nomor
                                                        <?= $d->kode_pesanan; ?>
                                                    </h5>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <form action="" method="POST" enctype="multipart/form-data"
                                                        accept-charset="utf-8">
                                                        <?= csrf_field() ?>
                                                        <div class="form-group">
                                                            <label for="inputNama" class="col-form-label">Check
                                                                Out</label>
                                                            <input type="date" min="<?= date('Y-m-d'); ?>"
                                                                class="form-control  <?php if ($validation->getError("check-out")) : ?>is-invalid<?php endif ?>"
                                                                id="inputNama" value="<?= old("check-out") ?>"
                                                                name="check-out" required>
                                                            <div class="invalid-feedback">
                                                                <?= $validation->getError("check-out"); ?>
                                                            </div>
                                                            <input type="hidden" name="id_pesanan"
                                                                value="<?= $d->id_pesanan; ?>">
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="submit" class="btn btn-primary"
                                                                value="submit_perpanjangan"
                                                                name="submit_perpanjangan">Perpanjang</button>
                                                            <button type="button" class="btn btn-secondary"
                                                                data-dismiss="modal">Tutup</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Modal -->
                                    <div class="modal fade" id="bukti-<?= $d->id_pesanan; ?>" tabindex="-1"
                                        aria-labelledby="buktiLabel-<?= $d->id_pesanan; ?>" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="buktiLabel-<?= $d->id_pesanan; ?>">Bukti
                                                        Transfer
                                                        Pesanan Nomor
                                                        <?= $d->kode_pesanan; ?>
                                                    </h5>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <?php if (!empty($d->bukti_bayar)) : ?>
                                                    <?php
                                                            $ekstensi_file = explode(".", $d->bukti_bayar);
                                                            if ($ekstensi_file[1] === "pdf") :
                                                            ?>
                                                    <div class="embed-responsive embed-responsive-16by9">
                                                        <iframe class="embed-responsive-item"
                                                            src="<?= base_url(); ?>/transfer_image/<?= $d->bukti_bayar; ?>"
                                                            allowfullscreen></iframe>
                                                    </div>
                                                    <?php else : ?>
                                                    <div class="img-responsive">
                                                        <img
                                                            src="<?= base_url(); ?>/transfer_image/<?= $d->bukti_bayar; ?>">
                                                    </div>
                                                    <?php endif; ?>
                                                    <?php endif; ?>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-dismiss="modal">Tutup</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Modal -->
                                    <div class="modal fade" id="view-<?= $d->id_pesanan; ?>" tabindex="-1"
                                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Pesanan Nomor
                                                        <?= $d->kode_pesanan; ?>
                                                    </h5>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <h6>Rincian Pesanan</h6>
                                                    <?php foreach ($rincian_pesanan as $k) : ?>
                                                    <?php if ($d->id_pesanan == $k->id_pesanan) : ?>
                                                    <ul>
                                                        <?php if ($k->layanan_kamar == 0) : ?>
                                                        <li class="mt-4">
                                                            <div class="col-12 border border-success">
                                                                <p class="mt-2"> No Kamar : [<?= $k->no_kamar; ?>] </p>
                                                                <p> Nama Kamar : <?= $k->nama_kamar; ?> </p>
                                                                <p> Layanan Kamar : Pesan Dengan
                                                                    Tanpa Sarapan </p>
                                                                <p> Biaya Kamar : Rp. <?= $k->harga_kamar; ?></p>
                                                                <p> Subtotal :
                                                                    Rp. <?= $k->sub_total; ?></p>
                                                            </div>
                                                        </li>
                                                        <?php else : ?>
                                                        <li class="mt-4">
                                                            <div class="col-12 border border-success">
                                                                <p class="mt-2"> No Kamar : [<?= $k->no_kamar; ?>] </p>
                                                                <p> Nama Kamar : <?= $k->nama_kamar; ?> </p>
                                                                <p> Layanan Kamar : Pesan Dengan
                                                                    Sarapan </p>
                                                                <p> Biaya Kamar : Rp. <?= $k->harga_kamar; ?></p>
                                                                <p> Biaya Layanan : Rp. <?= BIAYA_LAYANAN ?></p>
                                                                <p> Subtotal :
                                                                    Rp. <?= $k->sub_total; ?></p>
                                                            </div>
                                                        </li>
                                                        <?php endif; ?>
                                                    </ul>
                                                    <?php endif; ?>
                                                    <?php endforeach; ?>

                                                    <h6 class="mt-4">Hubungi Tamu</h6>
                                                    <ul>
                                                        <li>
                                                            <div class="col-12">
                                                                <a href="mailto:<?= $d->email; ?>"
                                                                    class="btn btn-secondary btn-sm mt-2">Hubungi
                                                                    Lewat Email</a>
                                                            </div>
                                                        </li>

                                                        <li>
                                                            <div class="col-12">
                                                                <a href="https://api.whatsapp.com/send?phone=<?= $d->no_tlp; ?>"
                                                                    class="btn btn-success btn-sm mt-2">Hubungi
                                                                    Lewat Whatsapp</a>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <div class="col-12">
                                                                <a href="telp:<?= $d->no_tlp; ?>"
                                                                    class="btn btn-info btn-sm mt-2">Hubungi
                                                                    Lewat Telepon</a>
                                                            </div>
                                                        </li>
                                                    </ul>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-dismiss="modal">Tutup</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
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