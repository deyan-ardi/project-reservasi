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
                        <a href="#" data-toggle="modal" data-target="#cetakLaporan"><button type="button"
                                class="btn btn-info btn-sm mb-3">Cetak
                                Seluruh Laporan</button>
                        </a><br>

                        <!-- Modal -->
                        <div class="modal fade" id="cetakLaporan" tabindex="-1" aria-labelledby="cetakLaporanLabel"
                            aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="cetakLaporanLabel">Cetak Laporan</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="<?= base_url(); ?>/admin/cetak-laporan/" method="POST">
                                            <div class="form-group">
                                                <label for="dariTgl" class="col-form-label">Dari Tanggal</label>
                                                <input type="date" name="dari_tgl" value="<?=  old('dari_tgl'); ?>"
                                                    class="form-control" id="dariTgl">
                                            </div>
                                            <div class="form-group">
                                                <label for="sampaiTgl" class="col-form-label">Sampai Tanggal</label>
                                                <input type="date" name="sampai_tgl" value="<?= old('sampai_tgl'); ?>"
                                                    class="form-control" id="sampaiTgl">
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-dismiss="modal">Batal</button>
                                                <button type="submit" name="submit" value="Submit"
                                                    class="btn btn-primary">Cetak</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>


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
                                            <a href="<?= base_url(); ?>/admin/cetak-laporan/<?= $d['id_rincian']; ?>"><button
                                                    type="button" class="btn btn-info btn-sm mt-2">Cetak
                                                    Laporan</button>
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