<?= $this->extend('user/master/master'); ?>
<?= $this->section("main"); ?>
<div class="banner-area">
    <div class="d-table">
        <div class="d-table-cell">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="banner-item">
                            <div class="main-banner-content">
                                <span>Selamat Datang di</span>
                                <h1>Geria Semalung Bungalow</h1>
                                <p>Make your holiday Special</p>
                            </div>
                            <div class="banner-video">
                                <div class="video-btn">
                                    <a href="https://www.youtube.com/watch?v=bk7McNUjWgw" class="popup-youtube">
                                        <i class="flaticon-play-button"></i>
                                    </a>
                                </div>
                                <div class="discover-btn">
                                    <a href="<?= base_url(); ?>/daftar-kamar" class="discover-btn-one">Booking
                                        Sekarang</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<div class="check-section">
    <div class="container">
        <form class="check-form" method="POST" action="">
            <?= csrf_field() ?>
            <div class="row">
                <div class="col-lg-3 col-md-6 col-sm-6 no-padding">
                    <div class="check-content">
                        <p>Check-In</p>
                        <div class="form-group">
                            <input type="text" required name="check-in" id="datepicker" class="form-control"
                                placeholder="Date">
                            <i class="flaticon-calendar"></i>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6 no-padding">
                    <div class="check-content">
                        <p>Check-Out</p>
                        <div class="form-group">
                            <input type="text" required name="check-out" id="check-datepicker" class="form-control"
                                placeholder="Date">
                            <i class="flaticon-calendar"></i>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6 no-padding">
                    <div class="check-content">
                        <p>Kamar</p>
                        <div class="form-group">
                            <select name="kamar" class="form-content" required>
                                <option value="">Nama Kamar</option>
                                <?php foreach ($all as $d) : ?>
                                <option value="<?= $d->id_kamar; ?>">
                                    <p><?= $d->no_kamar; ?> - <?= $d->nama_kamar; ?>
                                    </p>
                                </option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6 no-padding">
                    <div class="btn-content">
                        <div class="check-btn">
                            <button class="default-btn-one" type="submit" name="submit" value="Submit">
                                Cek Booking
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>

<section class="about-section">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-4 no-padding">
                <div class="about-content">
                    <span>Tentang Kami</span>
                    <h3>Make Your Golden Memory With Us!</h3>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt
                        labore dolore. Quis ipsum suspendisse ultrices gravida. Risus commodo viverra maecenas
                        accumsan lacus vel facilisis. </p>
                    <div class="about-btn">
                        <a href="<?= base_url(); ?>/tentang-kami" class="about-btn-one">Selanjutnya
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
                    <h3><?= $k->nama_kamar ?> </h3>
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


<div class="tabs-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <div class="tabs-image">
                    <img src="<?= base_url(); ?>/assets/user/img/shef.png" alt="image">
                </div>
            </div>
            <div class="col-lg-6">
                <div class="tabs-area">
                    <h3>Restaurent</h3>
                    <ul id="tabs">
                        <li class="current">
                            <a href="#bacon">Breakfast</a>
                        </li>
                        <li>
                            <a href="#batfish">Lunch</a>
                        </li>
                        <li>
                            <a href="#tuna">Dinner</a>
                        </li>
                    </ul>
                    <div id="content">
                        <div id="bacon" class="current content-wrapper animated">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="company-text">
                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod
                                            tempor incididunt ut labore et dolore magna aliqua. Quis ipsum
                                            suspendisse ultrices gravida. Risus commodo viverra maecenas accumsan
                                            lacus .Lorem Ipsum is simply dummy text of the printing.</p>
                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod
                                            tempor incididunt ut labore et dolore magna aliqua. Quis ipsum
                                            suspendisse ultrices gravida. Risus commodo viverra maecenas accumsan
                                            lacus .Lorem Ipsum is simply dummy text of the printing.</p>
                                    </div>
                                    <ul class="tabs-list">
                                        <li>
                                            Rava Dosa
                                        </li>
                                        <li>
                                            Sprouts Jalfrezi
                                        </li>
                                        <li>
                                            Steamed Dhokla
                                        </li>
                                    </ul>
                                    <div class="tabs-btn">
                                        <a href="#" class="tabs-btn-one">Read More <i class="fa fa-arrow-right"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id="batfish" class="animated content-wrapper">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="company-text">
                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod
                                            tempor incididunt ut labore et dolore magna aliqua. Quis ipsum
                                            suspendisse ultrices gravida. Risus commodo viverra maecenas accumsan
                                            lacus .Lorem Ipsum is simply dummy text of the printing.</p>
                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod
                                            tempor incididunt ut labore et dolore magna aliqua. Quis ipsum
                                            suspendisse ultrices gravida. Risus commodo viverra maecenas accumsan
                                            lacus .Lorem Ipsum is simply dummy text of the printing.</p>
                                    </div>
                                    <ul class="tabs-list">
                                        <li>
                                            Rava Dosa
                                        </li>
                                        <li>
                                            Sprouts Jalfrezi
                                        </li>
                                        <li>
                                            Steamed Dhokla
                                        </li>
                                    </ul>
                                    <div class="tabs-btn">
                                        <a href="#" class="tabs-btn-one">Read More <i class="fa fa-arrow-right"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id="tuna" class="animated content-wrapper">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="company-text">
                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod
                                            tempor incididunt ut labore et dolore magna aliqua. Quis ipsum
                                            suspendisse ultrices gravida. Risus commodo viverra maecenas accumsan
                                            lacus .Lorem Ipsum is simply dummy text of the printing.</p>
                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod
                                            tempor incididunt ut labore et dolore magna aliqua. Quis ipsum
                                            suspendisse ultrices gravida. Risus commodo viverra maecenas accumsan
                                            lacus .Lorem Ipsum is simply dummy text of the printing.</p>
                                    </div>
                                    <ul class="tabs-list">
                                        <li>
                                            Rava Dosa
                                        </li>
                                        <li>
                                            Sprouts Jalfrezi
                                        </li>
                                        <li>
                                            Steamed Dhokla
                                        </li>
                                    </ul>
                                    <div class="tabs-btn">
                                        <a href="#" class="tabs-btn-one">Read More <i class="fa fa-arrow-right"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="design-shape">
                        <img src="<?= base_url(); ?>/assets/user/img/design-shape.png" alt="image">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<section class="client-section">
    <div class="container-fluid">
        <div class="row align-items-center">
            <div class="col-lg-6 p-0">
                <div class="client-image">
                    <img src="<?= base_url(); ?>/assets/user/img/client.png" alt="image">
                </div>
            </div>
            <div class="col-lg-6 p-0">
                <div class="client-content">
                    <span>Testimonial</span>
                    <h3>What Client Say</h3>
                    <i class="flaticon-quote"></i>
                </div>
                <div class="feedback-slides">
                    <div class="client-feedback">
                        <div>
                            <div class="item">
                                <div class="single-feedback">
                                    <p>Quis ipsum suspendisse ultrices gravida. Risus commodo viverra maecenas
                                        accumsan lacus vel facilisis. Lorem ipsum dolor sit amet, consectetur
                                        adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna
                                        aliqua.</p>
                                    <h3>John Lucy</h3>
                                    <span>Web Developer</span>
                                </div>
                            </div>
                            <div class="item">
                                <div class="single-feedback">
                                    <p>Quis ipsum suspendisse ultrices gravida. Risus commodo viverra maecenas
                                        accumsan lacus vel facilisis. Lorem ipsum dolor sit amet, consectetur
                                        adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna
                                        aliqua.</p>
                                    <h3>John Smith</h3>
                                    <span>Web Developer</span>
                                </div>
                            </div>
                            <div class="item">
                                <div class="single-feedback">
                                    <p>Quis ipsum suspendisse ultrices gravida. Risus commodo viverra maecenas
                                        accumsan lacus vel facilisis. Lorem ipsum dolor sit amet, consectetur
                                        adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna
                                        aliqua.</p>
                                    <h3>Maxwel Warner</h3>
                                    <span>Web Developer</span>
                                </div>
                            </div>
                            <div class="item">
                                <div class="single-feedback">
                                    <p>Quis ipsum suspendisse ultrices gravida. Risus commodo viverra maecenas
                                        accumsan lacus vel facilisis. Lorem ipsum dolor sit amet, consectetur
                                        adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna
                                        aliqua.</p>
                                    <h3>Ross Taylor</h3>
                                    <span>Web Developer</span>
                                </div>
                            </div>
                            <div class="item">
                                <div class="single-feedback">
                                    <p>Quis ipsum suspendisse ultrices gravida. Risus commodo viverra maecenas
                                        accumsan lacus vel facilisis. Lorem ipsum dolor sit amet, consectetur
                                        adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna
                                        aliqua.</p>
                                    <h3>James Anderson</h3>
                                    <span>Web Developer</span>
                                </div>
                            </div>
                            <div class="item">
                                <div class="single-feedback">
                                    <p>Quis ipsum suspendisse ultrices gravida. Risus commodo viverra maecenas
                                        accumsan lacus vel facilisis. Lorem ipsum dolor sit amet, consectetur
                                        adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna
                                        aliqua.</p>
                                    <h3>Steven Smith</h3>
                                    <span>Web Developer</span>
                                </div>
                            </div>
                            <div class="item">
                                <div class="single-feedback">
                                    <p>Quis ipsum suspendisse ultrices gravida. Risus commodo viverra maecenas
                                        accumsan lacus vel facilisis. Lorem ipsum dolor sit amet, consectetur
                                        adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna
                                        aliqua.</p>
                                    <h3>Steven Lucy</h3>
                                    <span>Web Developer</span>
                                </div>
                            </div>
                            <div class="item">
                                <div class="single-feedback">
                                    <p>Quis ipsum suspendisse ultrices gravida. Risus commodo viverra maecenas
                                        accumsan lacus vel facilisis. Lorem ipsum dolor sit amet, consectetur
                                        adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna
                                        aliqua.</p>
                                    <h3>John Terry</h3>
                                    <span>Web Developer</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="client-thumbnails">
                        <div>
                            <div class="item">
                                <div class="img-fill"><img src="<?= base_url(); ?>/assets/user/img/client-image/1.jpg"
                                        alt="client"></div>
                            </div>
                            <div class="item">
                                <div class="img-fill"><img src="<?= base_url(); ?>/assets/user/img/client-image/2.jpg"
                                        alt="client"></div>
                            </div>
                            <div class="item">
                                <div class="img-fill"><img src="<?= base_url(); ?>/assets/user/img/client-image/3.jpg"
                                        alt="client"></div>
                            </div>
                            <div class="item">
                                <div class="img-fill"><img src="<?= base_url(); ?>/assets/user/img/client-image/4.jpg"
                                        alt="client"></div>
                            </div>
                            <div class="item">
                                <div class="img-fill"><img src="<?= base_url(); ?>/assets/user/img/client-image/5.jpg"
                                        alt="client"></div>
                            </div>
                            <div class="item">
                                <div class="img-fill"><img src="<?= base_url(); ?>/assets/user/img/client-image/1.jpg"
                                        alt="client"></div>
                            </div>
                            <div class="item">
                                <div class="img-fill"><img src="<?= base_url(); ?>/assets/user/img/client-image/2.jpg"
                                        alt="client"></div>
                            </div>
                            <div class="item">
                                <div class="img-fill"><img src="<?= base_url(); ?>/assets/user/img/client-image/3.jpg"
                                        alt="client"></div>
                            </div>
                        </div>
                        <button class="prev-arrow slick-arrow">
                            <i class="fa fa-arrow-left"></i>
                        </button>
                        <button class="next-arrow slick-arrow">
                            <i class="fa fa-arrow-right"></i>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?= $this->endSection(); ?>