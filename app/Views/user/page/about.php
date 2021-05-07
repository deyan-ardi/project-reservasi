<?= $this->extend('user/master/master'); ?>

<?= $this->section('main'); ?>
<section class="page-banner">
    <div class="container">
        <div class="page-banner-content">
            <h2>About Us</h2>
            <p><a href="<?= base_url(); ?>">Home</a> / About Us</p>
        </div>
    </div>
</section>


<section class="about-section">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-4 no-padding">
                <div class="about-content">
                    <span>About Us</span>
                    <h3>Make Your Golden Memory With Us!</h3>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt
                        labore dolore. Quis ipsum suspendisse ultrices gravida. Risus commodo viverra maecenas
                        accumsan lacus vel facilisis. </p>
                    <div class="about-btn">
                        <a href="#" class="about-btn-one">Read More
                            <i class="fa fa-arrow-right"></i>
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-lg-8 no-padding">
                <div class="row">
                    <div class="col-lg-7 col-md-7">
                        <div class="about-image">
                            <img src="<?= base_url(); ?>/assets/user/img/about/1.jpg" alt="image">
                        </div>
                    </div>
                    <div class="col-lg-5 col-md-5 no-padding">
                        <div class="about-image">
                            <img src="<?= base_url(); ?>/assets/user/img/about/2.jpg" alt="image">
                        </div>
                        <div class="about-image">
                            <img src="<?= base_url(); ?>/assets/user/img/about/3.jpg" alt="image">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>



<section class="room-section">
    <div class="container">
        <div class="section-title">
            <span>Akomodasi</span>
            <h3>Temukan Kamar Kami</h3>
        </div>
        <div class="room-slider owl-carousel owl-theme">
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
        <div class="view-btn">
            <a href="<?= base_url(); ?>/daftar-kamar" class="view-btn-one">Lihat Semua</a>
        </div>
    </div>
</section>

<section class="video-section">
    <div class="container">
        <div class="video-content">
            <div class="video-btn">
                <a href="https://www.youtube.com/watch?v=bk7McNUjWgw" class="popup-youtube">
                    <i class="flaticon-play-button"></i>
                </a>
            </div>
        </div>
        <div class="video-title">
            <h3>Watch Intro Video</h3>
        </div>
    </div>
</section>


<section class="top-services-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 col-md-6 col-sm-6">
                <div class="top-services-box">
                    <img src="<?= base_url(); ?>/assets/user/img/video-image/1.png" alt="image">
                    <h3>Private Pool</h3>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed eiusmod temporgravida.</p>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-6">
                <div class="top-services-box">
                    <img src="<?= base_url(); ?>/assets/user/img/video-image/2.png" alt="image">
                    <h3>Free & Unlimited Wifi</h3>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed eiusmod temporgravida.</p>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-6 offset-lg-0 offset-md-3">
                <div class="top-services-box">
                    <img src="<?= base_url(); ?>/assets/user/img/video-image/3.png" alt="image">
                    <h3>Airport Pick Up</h3>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed eiusmod temporgravida.</p>
                </div>
            </div>
        </div>
    </div>
</section>


<section class="gallery-section">
    <div class="container">
        <div class="section-title">
            <span>Project</span>
            <h3>Our Gallery</h3>
        </div>
        <div class="row">
            <div class="gallery-slider owl-carousel owl-theme">
                <div class="col-lg-12">
                    <div class="gallery-item">
                        <div class="gallery-image">
                            <img src="<?= base_url(); ?>/assets/user/img/gallery/1.jpg" alt="image">
                            <a href="#" class="popup-btn">Restaurent</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="gallery-item">
                        <div class="gallery-image">
                            <img src="<?= base_url(); ?>/assets/user/img/gallery/2.jpg" alt="image">
                            <a href="#" class="popup-btn">Therapy</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="gallery-item">
                        <div class="gallery-image">
                            <img src="<?= base_url(); ?>/assets/user/img/gallery/3.jpg" alt="image">
                            <a href="#" class="popup-btn">Gym</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="gallery-item">
                        <div class="gallery-image">
                            <img src="<?= base_url(); ?>/assets/user/img/gallery/1.jpg" alt="image">
                            <a href="#" class="popup-btn">Restaurent</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="gallery-item">
                        <div class="gallery-image">
                            <img src="<?= base_url(); ?>/assets/user/img/gallery/2.jpg" alt="image">
                            <a href="#" class="popup-btn">Therapy</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="gallery-item">
                        <div class="gallery-image">
                            <img src="<?= base_url(); ?>/assets/user/img/gallery/3.jpg" alt="image">
                            <a href="#" class="popup-btn">Gym</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


<?= $this->endSection(); ?>