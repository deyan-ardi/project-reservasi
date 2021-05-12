<?= $this->extend('user/master/master'); ?>

<?= $this->section('main'); ?>
<section class="page-banner">
    <div class="container">
        <div class="page-banner-content">
            <h2>Tentang Kami</h2>
            <p><a href="<?= base_url(); ?>">Beranda</a> / Tentang Kami</p>
        </div>
    </div>
</section>


<section class="about-section">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-4 no-padding">
                <div class="about-content">
                    <span>Tentang Kami</span>
                    <h3>Ciptakan Memori Emasmu Bersama Kami!</h3>
                    <p>Geria Semalung Bungalow merupakan pilihan bagi para wisatawan dimana
                        menawarkan pemandangan yang
                        indah dengan romansa lembah perbukitan yang berlokasi di belahan Bali Timur dengan 2 jam
                        perjalanan
                        dari bandara Ngurah Rai Bali. Kami berlokasi di ketinggian, dekat dengan sejumlah obyek wisata
                        seperti Taman Tirta Gangga, Taman Sukesada Ujung peninggalan kerajaan Karangasem, dan objek
                        wisata
                        Amed. </p>
                    <p class="mt-3">"Geria Semalung" adalah tempat paling cocok untuk tinggal dengan santai dan
                        menikmati pemandangan
                        yang indah, hijaunya padi dipersawan dan merasakan ritme lembut kehidupan desa di Bali. tempat
                        yang sempurna untuk liburan yang menyenangkan.
                        "Geria Semalung" menawarkan akomodasi yang sederhana namun nyaman dengan menghadirkan ketenangan
                        dan keiindahan untuk Anda.
                    </p>
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
                <a href="https://www.youtube.com/watch?v=eCxAEVDDTh4" class="popup-youtube">
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
                    <h3>Laundry</h3>
                    <p>Kami juga menyediakan fasilitas Laundry untuk menunjang aktivitas berlibur Anda</p>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-6">
                <div class="top-services-box">
                    <img src="<?= base_url(); ?>/assets/user/img/video-image/2.png" alt="image">
                    <h3>Free & Unlimited Wifi</h3>
                    <p>Anda dapat menggunakan Wifi yang diberikan secara gratis</p>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-6 offset-lg-0 offset-md-3">
                <div class="top-services-box">
                    <img src="<?= base_url(); ?>/assets/user/img/video-image/5.png" alt="image">
                    <h3>Restorant</h3>
                    <p>Tidak terlewat juga kami menyediakan fasilitas restoran untuk menunjang aktivitas berlibur Anda
                    </p>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-6 mt-4">
                <div class="top-services-box">
                    <img src="<?= base_url(); ?>/assets/user/img/video-image/4.png" alt="image">
                    <h3>Taman</h3>
                    <p>Taman yang asri dan luas, cocok untuk tempat berolahraga atau sekedar beristirahat</p>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-6 mt-4">
                <div class="top-services-box">
                    <img src="<?= base_url(); ?>/assets/user/img/video-image/6.png" alt="image">
                    <h3>View</h3>
                    <p>Lokasi yang strategis, suasana dengan nuansa alam</p>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-6 offset-lg-0 offset-md-3 mt-4">
                <div class="top-services-box">
                    <img src="<?= base_url(); ?>/assets/user/img/video-image/3.png" alt="image">
                    <h3>Area Merokok</h3>
                    <p>Bagi anda yang hobi merokok, kami juga menyediakan tempat khusus bagi Anda
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>


<?= $this->endSection(); ?>