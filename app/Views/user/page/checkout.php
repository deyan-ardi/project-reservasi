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
<?php elseif ($data_pesanan[0]->status_pesanan == 0 && $data_pesanan[0]->status_bukti == 0) : ?>
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
                                    <p class="text-center mt-5">Mohon Maaf, Kamar Yang Anda Pesan Sudah Ditempati Oleh
                                        Tamu Lain. Silahkan Pilih Kamar Yang Lain atau Anda Dapat Menghubungi Kami</p>
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
<?php elseif ($data_pesanan[0]->status_bukti == 1) : ?>
<section class="single-room-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="single-leave-reply">
                    <div class="reply-content">
                        <h3>Upload Bukti Pembayaran</h3>
                    </div>

                    <table>
                        <tr>
                            <td>
                                <p>Pesanan Anda Pada Tanggal
                                    <?= date('d l Y H:i', strtotime($data_pesanan[0]->created_at)); ?> WITA Telah
                                    Diterima,
                                    Berikut Merupakan Rincian Pesanan Anda</p>
                            </td>
                        </tr>
                    </table>
                    <form class="reservation-form">
                        <div class="row">
                            <div class="col-lg-12 col-md-12">
                                <div class="form-group">
                                    <label>Rincian Pesanan</label>
                                    <input type="email" class="form-control" placeholder="Email">
                                </div>
                            </div>
                            <div class="col-lg-12 col-md-12">
                                <div class="send-btn">
                                    <button class="send-btn-one">Upload Bukti Pembayaran</button>
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