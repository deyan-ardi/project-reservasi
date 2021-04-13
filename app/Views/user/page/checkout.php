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


<section class="single-room-section">
    <div class="container">
        <div class="row">
            <?php if ($data_pesanan[0]->status_bayar == 1) : ?>
            <div class="col-lg-8">
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
                                                value="<?= $d->nama_kamar; ?> - (Rp.<?= $d->sub_total; ?>/Malam ~ Dengan Sarapan Hotel)">
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
            <?php elseif ($data_pesanan[0]->status_bayar == 2) : ?>
            <div class="col-lg-8">
                <div class="single-leave-reply">
                    <div class="reply-content">
                        <h3>Upload Bukti Pembayaran</h3>
                    </div>
                    <form class="reservation-form">
                        <div class="row">
                            <div class="col-lg-12 col-md-12">
                                <div class="form-group">
                                    <label>Email</label>
                                    <input type="email" class="form-control" placeholder="Email">
                                </div>
                            </div>
                            <div class="col-lg-12 col-md-12">
                                <div class="form-group">
                                    <label>Check In</label>
                                    <input type="text" id="datepicker" class="form-control" placeholder="Check In">
                                    <i class="flaticon-calendar"></i>
                                </div>
                            </div>
                            <div class="col-lg-12 col-md-12">
                                <div class="form-group">
                                    <label>Check Out</label>
                                    <input type="text" id="check-datepicker" class="form-control"
                                        placeholder="Check Out">
                                    <i class="flaticon-calendar"></i>
                                </div>
                            </div>
                            <div class="col-lg-12 col-md-12">
                                <div class="form-group">
                                    <label>Room</label>
                                    <select name="room" class="form-control">
                                        <option value="1">01</option>
                                        <option value="2">02</option>
                                        <option value="3">03</option>
                                        <option value="4">04</option>
                                        <option value="5">05</option>
                                    </select>
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
                <?php endif; ?>
            </div>
            <div class="col-lg-4">
                <div class="sidebar mt-0">
                    <div class="widget widget-map">
                        <div class="widget-map-area">
                            <iframe
                                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d387190.2799090714!2d-74.25987368715496!3d40.697670064588735!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89c24fa5d33f083b%3A0xc80b8f06e177fe62!2sNew%20York%2C%20NY%2C%20USA!5e0!3m2!1sen!2sbd!4v1570689677254!5m2!1sen!2sbd"></iframe>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


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