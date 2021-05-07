<?= $this->extend("user/master/master"); ?>
<?= $this->section("main"); ?>
<section class="page-banner">
    <div class="container">
        <div class="page-banner-content">
            <h2>Room</h2>
            <p><a href="index.html">Home</a> / Room</p>
        </div>
    </div>
</section>


<section class="room-page-section">
    <div class="container">
        <div class="row">
            <?php foreach ($kamar as $k) : ?>
            <div class="col-lg-4 col-md-6">
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
                            <a href="<?= base_url(); ?>/detail-kamar/<?= $k->id_kamar; ?>"
                                class="room-btn-one">Selengkapnya
                                <i class="fa fa-arrow-right"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <?php endforeach; ?>
        </div>
    </div>
</section>
<?= $this->endSection(); ?>