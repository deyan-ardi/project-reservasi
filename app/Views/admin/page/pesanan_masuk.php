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
                        <h5>Data Pesanan Masuk</h5>
                        <h6 class="sub-heading">Anda dapat melakukan manajemen pada data pesanan kamar yang ada
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
                                        <th>Tanggal Masuk</th>
                                        <th>Deskripsi Pesanan</th>
                                        <th>Total Bayar</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($pesanan_masuk as $d) : ?>
                                    <tr>
                                        <td><?= $d->kode_pesanan; ?></td>
                                        <td><?= $d->username; ?></td>
                                        <td>
                                            <?php if ($d->status_pesanan == 1) : ?>
                                            <a href=""><button type="button"
                                                    class="btn btn-success btn-sm">Aktif</button>
                                            </a>
                                            <?php else : ?>
                                            <a href=""><button type="button" class="btn btn-danger btn-sm">Tidak
                                                    Aktif</button>
                                            </a>
                                            <?php endif; ?>
                                        </td>
                                        <td><?= $d->tamu_dewasa; ?> Orang</td>
                                        <td><?= $d->tamu_anak; ?> Orang</td>
                                        <td><?= date('d-m-Y', strtotime($d->check_in)); ?></td>
                                        <td><?= date('d-m-Y', strtotime($d->check_out)); ?></td>
                                        <td><?= date('d-m-Y H:i', strtotime($d->created_at)); ?> WITA</td>
                                        <td><?php if (empty($d->pesan)) : ?>
                                            -
                                            <?php else : ?>
                                            <?= $d->pesan; ?>
                                            <?php endif; ?>
                                        </td>
                                        <td>Rp.<?= format_rupiah($d->total_bayar); ?></td>
                                        <td>
                                            <a href="#" data-toggle="modal"
                                                data-target="#view-<?= $d->id_pesanan; ?>"><button type="button"
                                                    class="btn btn-info btn-sm mt-2">Detail Pesanan
                                                    Tamu</button>
                                            </a><br>
                                            <?php if ($d->status_pesanan == 1) : ?>
                                            <a href="<?= base_url(); ?>/admin/terima-pesanan/<?= $d->id_pesanan; ?>"><button
                                                    type="button" class="btn btn-success btn-sm mt-2">Terima
                                                    Pesanan</button>
                                            </a><br>
                                            <a href="<?= base_url(); ?>/admin/tolak-pesanan/<?= $d->id_pesanan; ?>"><button
                                                    type="button" class="btn btn-warning btn-sm mt-2">Tolak
                                                    Pesanan</button>
                                            </a><br>
                                            <?php endif; ?>
                                            <?php if (in_groups("super admin")) : ?>
                                            <a href="<?= base_url(); ?>/admin/hapus-pesanan/<?= $d->id_pesanan; ?>"
                                                class=" tombol-hapus"><button type="button"
                                                    class="btn btn-danger btn-sm mt-2">Hapus
                                                    Pesanan</button>
                                            </a>
                                            <?php endif; ?>
                                        </td>
                                    </tr>

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
                                                                <p> Biaya Kamar : Rp.
                                                                    <?= format_rupiah($k->harga_kamar); ?></p>
                                                                <p> Subtotal :
                                                                    Rp. <?= format_rupiah($k->sub_total); ?></p>
                                                            </div>
                                                        </li>
                                                        <?php else : ?>
                                                        <li class="mt-4">
                                                            <div class="col-12 border border-success">
                                                                <p class="mt-2"> No Kamar : [<?= $k->no_kamar; ?>] </p>
                                                                <p> Nama Kamar : <?= $k->nama_kamar; ?> </p>
                                                                <p> Layanan Kamar : Pesan Dengan
                                                                    Sarapan </p>
                                                                <p> Biaya Kamar : Rp.
                                                                    <?= format_rupiah($k->harga_kamar) ?></p>
                                                                <p> Biaya Layanan : Rp.
                                                                    <?= format_rupiah(BIAYA_LAYANAN) ?></p>
                                                                <p> Subtotal :
                                                                    Rp. <?= format_rupiah($k->sub_total) ?></p>
                                                            </div>
                                                        </li>
                                                        <?php endif; ?>
                                                    </ul>
                                                    <?php endif; ?>
                                                    <?php endforeach; ?>
                                                    <?php
                                                        $check_out = new \Datetime($d->check_out);
                                                        $check_in = new \Datetime($d->check_in);
                                                        $lama = $check_in->diff($check_out) ?>
                                                    <h6 class="mt-4">Lama Menginap : <?= $lama->d; ?> Hari</h6>

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
                                                                <a href="https://api.whatsapp.com/send?phone=+62<?= $d->no_tlp; ?>"
                                                                    class="btn btn-success btn-sm mt-2">Hubungi
                                                                    Lewat Whatsapp</a>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <div class="col-12">
                                                                <a href="tel:<?= $d->no_tlp; ?>"
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