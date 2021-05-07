<?= $this->extend("user/master/master"); ?>
<?= $this->section("main"); ?>
<section class="page-banner">
    <div class="container">
        <div class="page-banner-content">
            <h2> <?= ucWords($kamar[0]->nama_kategori); ?></h2>
            <p><a href="<?= base_url(); ?>">Beranda</a> / <?= ucWords($kamar[0]->nama_kategori); ?></p>
        </div>
    </div>
</section>


<section class="single-room-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <div class="image-slider owl-carousel owl-theme">
                    <?php foreach (json_decode($kamar[0]->foto_kamar) as $d) : ?>
                    <div class="article-img">
                        <img src="<?= base_url(); ?>/room_image/<?= $d->kamar; ?>" alt="blog-details">
                    </div>
                    <?php endforeach; ?>
                </div>
                <ul class="image-list owl-carousel owl-theme">
                    <?php foreach (json_decode($kamar[0]->foto_kamar) as $d) : ?>
                    <li>
                        <img src="<?= base_url(); ?>/room_image/<?= $d->kamar; ?>" alt="image">
                    </li>
                    <?php endforeach; ?>
                </ul>
                <div class="single-room-content">
                    <h3><?= $kamar[0]->nama_kamar; ?></h3>
                    <p>Diupload oleh <?= ucWords($kamar[0]->created_by); ?> pada tanggal
                        <?= date('d F Y H:i', strtotime($kamar[0]->created_at)); ?> WITA</p>
                    <p style="text-align: justify;"><?= $kamar[0]->deskripsi_kamar; ?></p>
                </div>
            </div>
            <div class="col-lg-4 col-md-12">
                <div class="single-leave-reply">
                    <div class="reply-content">
                        <h3>Booking Kamar</h3>
                    </div>
                    <form class="reservation-form" action="" method="POST">
                        <div class="row">
                            <div class="col-lg-12 col-md-12">
                                <div class="form-group">
                                    <label>Layanan Sarapan <sup>)*</sup> </label>
                                    <select name="layanan" class="form-control" required>
                                        <option value="">Pilih Opsi Layanan</option>
                                        <option value="0">Tidak Sertakan Sarapan</option>
                                        <option value="1">Sertakan Sarapan</option>
                                    </select>
                                    <label class="mt-3" style="line-height:normal; text-align:justify;"> <sup>)*</sup>
                                        Jika
                                        Anda Ingin
                                        Menyertakan
                                        Sarapan, Anda
                                        Akan Dikenakan Biaya Tambahan Sebesar Rp.<?= BIAYA_LAYANAN; ?> untuk sarapan
                                        pagi. Menu Sarapan dapat dipilih
                                        ketika Anda berada di Penginapan</label>
                                </div>
                            </div>
                            <div class="col-lg-12 col-md-12">
                                <div class="send-btn">
                                    <?php if (logged_in()) : ?>
                                    <?php if (empty(user()->alamat) || empty(user()->ttl) || empty(user()->no_tlp)) : ?>
                                    <a href="<?= base_url(); ?>/pengaturan-profil/<?= user()->id; ?>"
                                        class="send-btn-one">Lengkapi Data
                                        Profil</a>
                                    <?php else : ?>
                                    <button class="send-btn-one" type="submit" name="submit" value="Submit">Booking
                                        Sekarang</button>
                                    <?php endif; ?>
                                    <?php else : ?>
                                    <a href="<?= base_url(); ?>/login" class="send-btn-one">Booking Sekarang</a>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="single-room-sidebar mt-0">
                    <div class="single-room-map">
                        <div class="single-room-map-area">
                            <iframe
                                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3946.944690660396!2d115.58206805042322!3d-8.407093293924122!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dd20696b58cb321%3A0x9e03589009feec45!2sGeria%20Semalung%20Bungalow!5e0!3m2!1sid!2sid!4v1618751233390!5m2!1sid!2sid"
                                width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
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
            <h3>Kamar Populer</h3>
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
                    <h3><?= $k->no_kamar; ?> - <?= ucWords($k->nama_kamar) ?> </h3>
                    <p style="text-align: justify;">Kategori Kamar : <?= $k->nama_kategori; ?></p>
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