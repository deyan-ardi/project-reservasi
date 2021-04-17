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
                    <ul class="star-list">
                        <li><i class="fas fa-star"></i></li>
                        <li><i class="fas fa-star"></i></li>
                        <li><i class="fas fa-star"></i></li>
                        <li><i class="fas fa-star"></i></li>
                        <li><i class="fas fa-star"></i></li>
                    </ul>
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
                                    <label class="mt-3"> <sup>)*</sup> Jika Anda Ingin Menyertakan
                                        Sarapan, Anda
                                        Akan Dikenakan Biaya Tambahan Sebesar Rp.<?= BIAYA_LAYANAN; ?> dengan rincian 1x
                                        Sarapan Pagi, 1x Sarapan Siang, 1x Sarapan Malam. Menu Sarapan dapat dipilih
                                        ketika Anda berada di Penginapan</label>
                                </div>
                            </div>
                            <div class="col-lg-12 col-md-12">
                                <div class="send-btn">
                                    <?php if (empty(user()->alamat) || empty(user()->ttl) || empty(user()->foto) || empty(user()->no_tlp)) : ?>
                                    <a href="<?= base_url(); ?>/pengaturan-profil/<?= user()->id; ?>"
                                        class="send-btn-one">Lengkapi Data
                                        Profil</a>
                                    <?php else : ?>
                                    <button class="send-btn-one" type="submit" name="submit" value="Submit">Booking
                                        Sekarang</button>
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