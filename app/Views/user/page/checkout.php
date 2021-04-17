<?= $this->extend("user/master/master"); ?>
<?= $this->section("main"); ?>
<section class="page-banner">
    <div class="container">
        <div class="page-banner-content">
            <h2>Checkout Pemesanan</h2>
            <p><a href="<?= base_url(); ?>">Beranda</a> / Checkout Pemesanan</p>
        </div>
    </div>
</section>

<?php if (!empty($data_pesanan)) : ?>
<?php if ($data_pesanan[0]->status_keranjang == 1) : ?>
<section class="single-room-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="single-leave-reply">
                    <div class="reply-content">
                        <h3>Checkout Pesanan</h3>
                    </div>
                    <form class="reservation-form" method="POST" action="">
                        <div class="row">
                            <div class="col-lg-12 col-md-12">
                                <div class="form-group">
                                    <label>Data Pesanan</label>
                                    <?php foreach ($data_keranjang as $d) : ?>
                                    <div class="row">
                                        <div class="col-lg-10">
                                            <?php if ($d->layanan_kamar == 1) : ?>
                                            <input type="text" disabled class="form-control mt-2"
                                                value="<?= $d->nama_kamar; ?> - (Rp.<?= $d->sub_total; ?>/Malam ~ Dengan 3x Sarapan Hotel )">
                                            <?php else : ?>
                                            <input type="text" disabled class="form-control mt-2"
                                                value="<?= $d->nama_kamar; ?> - (Rp.<?= $d->sub_total; ?>/Malam ~ Tanpa Sarapan Hotel)">
                                            <?php endif; ?>
                                        </div>
                                        <div class="col-lg-2 mt-2">
                                            <a href="<?= base_url(); ?>/hapus-keranjang/<?= $d->id_keranjang; ?>"
                                                class="btn btn-secondary">Hapus</a>
                                        </div>
                                    </div>
                                    <?php endforeach; ?>
                                </div>
                                <div class="col-lg-12 col-md-12">
                                    <div class="form-group" onchange="hitungLama()">
                                        <label>Tanggal Check In</label>
                                        <input type="date" id="checkIn" min="<?= date("Y-m-d"); ?>" name="check-in"
                                            class="form-control <?php if ($validation->getError('check-in')) : ?>is-invalid<?php endif ?>"
                                            placeholder="Check In">
                                        <div class="invalid-feedback">
                                            <?php if ($validation->getError('check-in')) : ?>
                                            <?= $validation->getError('check-in'); ?>
                                            <?php else : ?>
                                            Tanggal Check In Tidak Boleh Lebih Dari Tanggal Check Out
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-12 col-md-12">
                                    <div class="form-group" onchange="hitungLama()">
                                        <label>Tanggal Check Out</label>
                                        <input type="date" id="checkOut" min="<?= date("Y-m-d"); ?>" name="check-out"
                                            class="form-control <?php if ($validation->getError('check-out')) : ?>is-invalid<?php endif ?>"
                                            placeholder="Check Out">
                                        <div class="invalid-feedback">
                                            <?php if ($validation->getError('check-out')) : ?>
                                            <?= $validation->getError('check-out'); ?>
                                            <?php else : ?>
                                            Tanggal Check Out Tidak Boleh Kurang Dari Tanggal Check In
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-12 col-md-6">
                                    <div class="form-group">
                                        <label>Jumlah Orang Dewasa: <sup>)*</sup></label>
                                        <select name="dewasa" class="form-control" required>
                                            <option value="">Pilih Jumlah</option>
                                            <option value="1">1 Orang</option>
                                            <option value="2">2 Orang</option>
                                            <option value="3">3 Orang</option>
                                            <option value="4">4 Orang</option>
                                            <option value="5">5 Orang</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-12 col-md-6">
                                    <div class="form-group">
                                        <label>Jumlah Anak-Anak: <sup> )*</sup></label>
                                        <select name="anak" class="form-control" required>
                                            <option value="">Pilih Jumlah</option>
                                            <option value="0">Tidak Ada</option>
                                            <option value="1">1 Orang</option>
                                            <option value="2">2 Orang</option>
                                            <option value="3">3 Orang</option>
                                            <option value="4">4 Orang</option>
                                            <option value="5">5 Orang</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label> <sup> )*</sup> Dengan mengisi rincian tamu yang akan menginap, Anda membantu
                                        kami untuk
                                        melakukan persiapan dengan lebih matang dan memberikan layanan lebih baik
                                        lagi</label>
                                </div>
                                <div class="form-group mt-5">
                                    <label>Rincian Biaya</label>
                                    <div class="row">
                                        <div class="form-group col-lg-8">
                                            <input type="text" disabled class="form-control"
                                                value="Sub Total Biaya Kamar = Rp. <?= $pesanan[0]->total_bayar; ?>">
                                        </div>
                                        <input type="hidden" id="subTotal" value="<?= $pesanan[0]->total_bayar; ?>">
                                        <div class="form-group col-lg-4">
                                            <input type="text" id="lama_hari" disabled class="form-control"
                                                value="x Lama Hari">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-lg-8">
                                            <input type="text" id="total_bayar" disabled class="form-control"
                                                value="Total Wajib Bayar = Pilih Tanggal Terlebih Dahulu">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-12 col-md-12">
                                    <div class="form-group">
                                        <label>Catatan Pesanan</label>
                                        <textarea name="catatan" id="catatan" cols="30" rows="10" class="form-control"
                                            placeholder="Tuliskan catatan penting untuk pesananmu, ex : Saya Alergi Dingin, Tolong Berikan Selimut Lebih"></textarea>
                                    </div>
                                </div>
                                <div class="col-lg-12 col-md-12">
                                    <div class="send-btn">
                                        <button class="send-btn-one" type="submit" id="button_pesanan"
                                            name="submit_pesanan" value="Pesanan">Checkout Pesanan</button>
                                    </div>
                                </div>
                            </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
<?php elseif ($data_pesanan[0]->status_pesanan == 1) : ?>
<section class="single-room-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="single-leave-reply">
                    <div class="reply-content">
                        <h3>Status Pesanan</h3>
                    </div>
                    <form class="reservation-form">
                        <div class="row">
                            <div class="col-lg-12 col-md-12">
                                <div class="form-group">
                                    <p class="text-center mt-5">Pesanan Masih Dalam Peninjauan Staff Kami. Kami Akan
                                        Menghubungimu Nanti</p>
                                </div>
                            </div>
                            <div class="col-lg-12 col-md-12 mt-5">
                                <div class="send-btn">
                                    <a href="<?= base_url(); ?>/batalkan-pesanan/<?= $data_pesanan[0]->id_pesanan; ?>"
                                        class="send-btn-one tombol-reset">Batalkan Pesanan</a>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
<?php elseif ($data_pesanan[0]->status_pesanan == 2 || $data_pesanan[0]->status_bukti == 3) : ?>
<section class="single-room-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="single-leave-reply">
                    <div class="reply-content">
                        <h3>Status Pesanan</h3>
                    </div>
                    <form class="reservation-form">
                        <div class="row">
                            <div class="col-lg-12 col-md-12">
                                <div class="form-group">
                                    <p class="text-center mt-5">Mohon Maaf,Pemesanan Yang Anda Minta Tidak Dapat
                                        Dilanjutkan.Silahkan Pilih Konfirmasi Ulang Untuk Membuat Ulang Pesanan</p>
                                </div>
                            </div>
                            <div class="col-lg-12 col-md-12 mt-5">
                                <div class="send-btn">
                                    <a href="<?= base_url(); ?>/konfirmasi-ulang/<?= $data_pesanan[0]->id_pesanan; ?>"
                                        class="send-btn-one tombol-reset">Konfirmasi Ulang</a>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
<?php elseif ($data_pesanan[0]->status_menginap == 1 || $data_pesanan[0]->status_menginap == 2) : ?>
<section class="single-room-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="single-leave-reply">
                    <div class="reply-content">
                        <h3>Status Pesanan</h3>
                    </div>
                    <form class="reservation-form">
                        <div class="row">
                            <div class="col-lg-12 col-md-12">
                                <div class="form-group">
                                    <p class="text-center mt-5">Pesanan Anda Telah Terkonfirmasi, Berikut Invoice Yang
                                        Perlu Anda Bawa Pada Saat Check In. Sampai Jumpa Di Penginapan</p>
                                </div>
                                <div class="form-group text-center">
                                    <a href="<?= base_url(); ?>/unduh-invoice/bukti-pembayaran"
                                        class="btn btn-primary btn-sm">Unduh Invoice</a>
                                </div>
                            </div>
                            <div class="col-lg-12 col-md-12 mt-5">
                                <div class="send-btn">
                                    <a href="<?= base_url(); ?>/kontak-kami" class="send-btn-one">Tanyakan dan Hubungi
                                        Kami</a>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
<?php elseif ($data_pesanan[0]->status_menginap == 3) : ?>
<section class="single-room-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="single-leave-reply">
                    <div class="reply-content">
                        <h3>Status Pesanan</h3>
                    </div>
                    <form class="reservation-form">
                        <div class="row">
                            <div class="col-lg-12 col-md-12">
                                <div class="form-group">
                                    <p class="text-center mt-5" style="line-height: normal;">Terimakasih Telah Melakukan
                                        Pesanan Dengan
                                        Kode Pesanan
                                        <kbd><?= $data_pesanan[0]->kode_pesanan; ?> </kbd> Pada Tanggal <kbd>
                                            <?= date('d F Y H:i', strtotime($data_pesanan[0]->created_at)); ?> WITA
                                        </kbd>. Tekan Selesai Pesanan Untuk Melanjutkan Memesan.
                                    </p>
                                </div>
                            </div>
                            <div class="col-lg-12 col-md-12 mt-5">
                                <div class="send-btn">
                                    <a href="<?= base_url(); ?>/konfirmasi-selesai/<?= $data_pesanan[0]->id_pesanan; ?>"
                                        class="send-btn-one tombol-reset">Konfirmasi Selesai
                                        Pemesanan</a>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
<?php elseif ($data_pesanan[0]->status_bukti == 1) : ?>
<?php if (new Datetime(date('Y-m-d H:i:s')) <= new Datetime($data_pesanan[0]->due_date)) : ?>
<section class="single-room-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="single-leave-reply">
                    <div class="reply-content">
                        <h3>Upload Bukti Pembayaran</h3>
                    </div>
                    <p style="line-height: normal;">Pesanan Anda Pada Tanggal <kbd>
                            <?= date('d F Y H:i', strtotime($data_pesanan[0]->created_at)); ?> WITA
                        </kbd>Telah
                        Diterima Oleh Staff Kami Pada Tanggal
                        <kbd> <?= date('d F Y H:i', strtotime($data_pesanan[0]->accept_date)); ?> WITA
                        </kbd>,
                        Berikut Merupakan Rincian Pesanan Anda. Silahkan lakukan pembayaran dan pengunggahan
                        Bukti Transfer sebelum batas akhir Pembayaran.
                    </p>
                    <div class="col-12">
                        <div class="table-responsive">
                            <table>
                                <tr>
                                    <td>
                                        <h6>Pesanan</h6>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <p>Kode Pesanan </p>
                                    </td>
                                    <td>
                                        <p>:</p>
                                    </td>
                                    <td>
                                        <p><?= $data_pesanan[0]->kode_pesanan; ?></p>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <p>Nama Pemesan</p>
                                    </td>
                                    <td>
                                        <p>:</p>
                                    </td>
                                    <td>
                                        <p><?= $data_pesanan[0]->username; ?></p>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <p>Jumlah Tamu Dewasa</p>
                                    </td>
                                    <td>
                                        <p>:</p>
                                    </td>
                                    <td>
                                        <p><?= $data_pesanan[0]->tamu_dewasa; ?> Orang</p>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <p>Jumlah Tamu Anak-Anak</p>
                                    </td>
                                    <td>
                                        <p>:</p>
                                    </td>
                                    <td>
                                        <p><?= $data_pesanan[0]->tamu_anak; ?> Orang</p>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <p>Tanggal Check In</p>
                                    </td>
                                    <td>
                                        <p>:</p>
                                    </td>
                                    <td>
                                        <p><?= date('d F Y', strtotime($data_pesanan[0]->check_in)); ?></p>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <p>Tanggal Check Out</p>
                                    </td>
                                    <td>
                                        <p>:</p>
                                    </td>
                                    <td>
                                        <p><?= date('d F Y', strtotime($data_pesanan[0]->check_out)); ?></p>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <p>Tanggal Booking</p>
                                    </td>
                                    <td>
                                        <p>:</p>
                                    </td>
                                    <td>
                                        <p><?= date('d F Y H:i', strtotime($data_pesanan[0]->created_at)); ?> WITA</p>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <p>Deskripsi Pesanan</p>
                                    </td>
                                    <td>
                                        <p>:</p>
                                    </td>
                                    <td>
                                        <p><?= $data_pesanan[0]->pesan; ?></p>
                                    </td>
                                </tr>
                            </table>
                        </div>
                        <div class="table-responsive">
                            <table class="mt-3">
                                <tr>
                                    <td>
                                        <h6>Rincian Pesanan</h6>
                                    </td>
                                </tr>
                                <?php foreach ($rincian_pesanan as $k) : ?>
                                <?php if ($data_pesanan[0]->id_pesanan == $k->id_pesanan) : ?>
                                <tr>
                                    <div class="col-12">
                                        <?php if ($k->layanan_kamar == 0) : ?>
                                        <td>
                                            <table class="mt-4">
                                                <tr>
                                                    <td>
                                                        <p>Nomor Kamar</p>
                                                    </td>
                                                    <td>
                                                        <p>:</p>
                                                    </td>
                                                    <td>
                                                        <p><kbd><?= $k->no_kamar; ?></kbd></p>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <p>Nama Kamar</p>
                                                    </td>
                                                    <td>
                                                        <p>:</p>
                                                    </td>
                                                    <td>
                                                        <p><?= $k->nama_kamar; ?></p>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <p>Layanan Kamar</p>
                                                    </td>
                                                    <td>
                                                        <p>:</p>
                                                    </td>
                                                    <td>
                                                        <p>Pesan Dengan Tanpa Sarapan</p>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <p>Biaya Kamar</p>
                                                    </td>
                                                    <td>
                                                        <p>:</p>
                                                    </td>
                                                    <td>
                                                        <p>Rp. <?= $k->harga_kamar; ?></p>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <p>Subtotal</p>
                                                    </td>
                                                    <td>
                                                        <p>:</p>
                                                    </td>
                                                    <td>
                                                        <p><kbd>Rp.<?= $k->sub_total; ?></kbd></p>
                                                    </td>
                                                </tr>
                                            </table>
                                        </td>
                                        <?php else : ?>
                                        <td>
                                            <table class="mt-4">
                                                <tr>
                                                    <td>
                                                        <p>Nomor Kamar</p>
                                                    </td>
                                                    <td>
                                                        <p>:</p>
                                                    </td>
                                                    <td>
                                                        <p><kbd><?= $k->no_kamar; ?></kbd></p>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <p>Nama Kamar</p>
                                                    </td>
                                                    <td>
                                                        <p>:</p>
                                                    </td>
                                                    <td>
                                                        <p><?= $k->nama_kamar; ?></p>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <p>Layanan Kamar</p>
                                                    </td>
                                                    <td>
                                                        <p>:</p>
                                                    </td>
                                                    <td>
                                                        <p>Pesan Dengan Sarapan</p>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <p>Biaya Layanan</p>
                                                    </td>
                                                    <td>
                                                        <p>:</p>
                                                    </td>
                                                    <td>
                                                        <p>Rp. <?= BIAYA_LAYANAN; ?></p>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <p>Biaya Kamar</p>
                                                    </td>
                                                    <td>
                                                        <p>:</p>
                                                    </td>
                                                    <td>
                                                        <p>Rp. <?= $k->harga_kamar; ?></p>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <p>Subtotal</p>
                                                    </td>
                                                    <td>
                                                        <p>:</p>
                                                    </td>
                                                    <td>
                                                        <p><kbd> Rp.<?= $k->sub_total; ?></kbd></p>
                                                    </td>
                                                </tr>
                                            </table>
                                        </td>
                                        <?php endif; ?>
                                    </div>
                                </tr>
                                <?php endif; ?>
                                <?php endforeach; ?>
                            </table>
                            <div class="table-responsive">
                                <table class="mt-3">
                                    <tr>
                                        <td>
                                            <h6>Rincian Pembayaran</h6>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <p>Wajib Bayar</p>
                                        </td>
                                        <td>
                                            <p>:</p>
                                        </td>
                                        <td>
                                            <p><kbd>Rp.<?= $data_pesanan[0]->total_bayar; ?></kbd></p>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <p>Rekening Tujuan</p>
                                        </td>
                                        <td>
                                            <p>:</p>
                                        </td>
                                        <td>
                                            <p><kbd>BRI ~ [8982102399831 - An. Santoso]</kbd></p>
                                        </td>
                                    <tr>
                                        <td>
                                            <p>Due Date</p>
                                        </td>
                                        <td>
                                            <p>:</p>
                                        </td>
                                        <td>
                                            <p><kbd><?= date('d F Y H:i', strtotime($data_pesanan[0]->due_date)); ?>
                                                    WITA</kbd></p>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><a href="<?= base_url(); ?>/unduh-invoice/invoice-pemesanan"
                                                class="btn btn-primary btn-sm">Unduh Invoice</a></td>
                                    </tr>
                                </table>
                            </div>
                            <div class="table-responsive">
                                <table class="mt-3">
                                    <tr>
                                        <td>
                                            <h6>Unggah Bukti Transfer (.jpg;.png;.jpeg;.pdf maks 1 Mb)</h6>
                                        </td>
                                    </tr>
                                    <tr>
                                        <form class="reservation-form" method="POST" action=""
                                            enctype="multipart/form-data">
                                            <div class="row">
                                                <td>
                                                    <div class="col-lg-12 col-md-12">
                                                        <div class="form-group">
                                                            <input type="file" accept=".png,.jpg,.jpeg,.pdf"
                                                                class="form-control <?php if ($validation->getError('file_bukti')) : ?>is-invalid<?php endif ?>"
                                                                name="file_bukti" required>
                                                            <div class="invalid-feedback">
                                                                <?= $validation->getError('file_bukti'); ?>
                                                            </div>
                                                        </div>
                                                        <input type="hidden" name="id_pesanan"
                                                            value="<?= $data_pesanan[0]->id_pesanan; ?>">
                                                    </div>
                                                    <div class="col-lg-12 col-md-12">
                                                        <div class="send-btn">
                                                            <button type="submit" name="submit_bukti"
                                                                value="Submit Bukti" class="send-btn-one">Upload Bukti
                                                                Pembayaran</button>
                                                        </div>
                                                    </div>
                                                </td>
                                            </div>
                                        </form>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?php else : ?>
<section class="single-room-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="single-leave-reply">
                    <div class="reply-content">
                        <h3>Upload Bukti Pembayaran</h3>
                    </div>
                    <form class="reservation-form">
                        <div class="row">
                            <div class="col-lg-12 col-md-12">
                                <div class="form-group">
                                    <p class="text-center mt-5">Durasi Tunggu Pembayaran Telah Berakhir Pada Tanggal
                                        <kbd><?= date('d F Y H:i', strtotime($data_pesanan[0]->due_date)); ?>
                                            WITA</kbd></kbd>, Silahkan Hubungi Kami
                                        Untuk Mendapatkan Informasi Lebih Lanjut
                                    </p>
                                </div>
                            </div>
                            <div class="col-lg-12 col-md-12 mt-5">
                                <div class="send-btn">
                                    <a href="<?= base_url(); ?>/kontak-kami" class="send-btn-one">Tanyakan dan Hubungi
                                        Kami</a>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
<?php endif; ?>
<?php elseif ($data_pesanan[0]->status_bukti == 2) : ?>
<section class="single-room-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="single-leave-reply">
                    <div class="reply-content">
                        <h3>Upload Bukti Pembayaran</h3>
                    </div>
                    <form class="reservation-form">
                        <div class="row">
                            <div class="col-lg-12 col-md-12">
                                <div class="form-group">
                                    <p class="text-center mt-5">Bukti Pembayaran Telah Berhasil Dikirim,Saat Ini Kami
                                        Sedang Mereview Bukti Pembayaran Anda</p>
                                </div>
                            </div>
                            <div class="col-lg-12 col-md-12 mt-5">
                                <div class="send-btn">
                                    <a href="<?= base_url(); ?>/kontak-kami" class="send-btn-one">Tanyakan dan Hubungi
                                        Kami</a>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
<?php endif; ?>
<?php else : ?>
<section class="single-room-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="single-leave-reply">
                    <div class="reply-content">
                        <h3>Checkout Pemesanan</h3>
                    </div>
                    <form class="reservation-form">
                        <div class="row">
                            <div class="col-lg-12 col-md-12">
                                <div class="form-group">
                                    <p class="text-center mt-5">Belum Ada Data Pesanan</p>
                                </div>
                            </div>
                            <div class="col-lg-12 col-md-12 mt-5">
                                <div class="send-btn">
                                    <a href="<?= base_url(); ?>/daftar-kamar" class="send-btn-one">Mulai Pesan Kamar</a>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
<?php endif; ?>

<section class="popular-room-section">
    <div class="container">
        <div class="popular-content">
            <h3>Popular Room</h3>
        </div>
        <div class="popular-slider owl-carousel owl-theme">
            <?php foreach ($all as $k) : ?>
            <div class="room-item">
                <div class="room-image">
                    <?php $foto = json_decode($k->foto_kamar); ?>
                    <img src="<?= base_url(); ?>/room_image/<?= $foto[1]->kamar    ?>" alt="image">
                    <div class="night-btn">
                        <a href="#" class="default-btn-one">Rp. <?= $k->harga_kamar; ?> /Malam</a>
                    </div>
                </div>
                <div class="room-content">
                    <h3><?= $k->nama_kamar ?> </h3>
                    <p style="text-align: justify;">Kategori Kamar : <?= $k->nama_kategori; ?></p>
                    <p style="text-align: justify;">Rating Kamar : <i class="fa fa-star " style="color: #cfa97a;"></i>
                        <i class="fa fa-star " style="color: #cfa97a;"></i> <i class="fa fa-star "
                            style="color: #cfa97a;"></i>
                    </p>
                    <div class="room-btn">
                        <a href="<?= base_url(); ?>/detail-kamar/<?= $k->id_kamar; ?>" class="room-btn-one">Selengkapnya
                            <i class="fa fa-arrow-right"></i>
                        </a>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>
<?= $this->endSection(); ?>