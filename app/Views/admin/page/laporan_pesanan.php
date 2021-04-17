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
                        <h5>Data Laporan Pesanan</h5>
                        <h6 class="sub-heading">Anda dapat mencetak laporan pesanan yang sudah selesai pada fitur
                            berikut
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
                    <div class="card-header">Data Laporan Pesanan</div>
                    <div class="card-body">
                        <a href="#"><button type="button" class="btn btn-info btn-sm mb-2">Cetak
                                Seluruh Laporan</button>
                        </a><br>
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
                                        <th>Tanggal Bayar</th>
                                        <th>Dibuat Pada</th>
                                        <th>Total Bayar</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($laporan_pesanan as $d) : ?>
                                    <tr>
                                        <td><?= $d['kode_pesanan']; ?></td>
                                        <td><?= $d['nama_pemesan']; ?></td>
                                        <td>
                                            <a href="#"><button type="button" class="btn btn-success btn-sm">Pesanan
                                                    Selesai</button>
                                            </a>
                                        </td>
                                        <td><?= $d['tamu_dewasa']; ?> Orang</td>
                                        <td><?= $d['tamu_anak']; ?> Orang</td>
                                        <td><?= date('d-m-Y', strtotime($d['check_in'])); ?></td>
                                        <td><?= date('d-m-Y', strtotime($d['check_out'])); ?></td>
                                        <td><?= date('d-m-Y H:i', strtotime($d['pay_date'])); ?> WITA</td>
                                        <td><?= date('d-m-Y', strtotime($d['created_at'])); ?></td>
                                        <td>Rp.<?= $d['total_bayar']; ?></td>
                                        <td>
                                            <a href="<?= $d['id_rincian']; ?>"><button type="button"
                                                    class="btn btn-info btn-sm mt-2">Cetak Laporan</button>
                                            </a><br>
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