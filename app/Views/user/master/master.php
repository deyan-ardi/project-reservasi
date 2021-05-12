<!doctype html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <?= $this->include("user/master/css"); ?>
    <title><?= $title; ?> - Gria Semalung Bungalow</title>
    <link rel="icon" type="image/png" href="<?= base_url() ?>/assets/icon.ico">
</head>

<body>
    <div class="berhasil" data-berhasil="<?= session()->getFlashdata('berhasil') ?>"></div>
    <div class="gagal" data-gagal="<?= session()->getFlashdata('gagal') ?>"></div>
    <div class="preloader">
        <div class="loader">
            <div class="shadow"></div>
            <div class="box"></div>
        </div>
    </div>


    <div class="navbar-area">
        <div class="overtop-mobile-nav">
            <div class="logo">
                <a href="<?= base_url(); ?>">
                    <img src="<?= base_url(); ?>/assets/icon.png" alt="logo">
                </a>
            </div>
        </div>
        <div class="overtop-nav">
            <div class="container">
                <nav class="navbar navbar-expand-md navbar-light">
                    <a class="navbar-brand" href="<?= base_url(); ?>"><img src="<?= base_url(); ?>/assets/icon.png"
                            alt="logo" width="75px"></a>
                    <div class="collapse navbar-collapse mean-menu" id="navbarSupportedContent">
                        <ul class="navbar-nav m-auto">
                            <li class="nav-item">
                                <?php if ($id == "1") : ?>
                                <a href="<?= base_url(); ?>" class="nav-link active">Beranda</a>
                                <?php else : ?>
                                <a href="<?= base_url(); ?>">Beranda</a>
                                <?php endif; ?>
                            </li>
                            <li class="nav-item">
                                <?php if ($id == "2") : ?>
                                <a href="<?= base_url(); ?>/tentang-kami" class="nav-link active">Tentang</a>
                                <?php else : ?>
                                <a href="<?= base_url(); ?>/tentang-kami" class="nav-link">Tentang</a>
                                <?php endif; ?>
                            </li>
                            <li class="nav-item">
                                <?php if ($id == "3") : ?>
                                <a href="<?= base_url(); ?>/daftar-kamar" class="nav-link active">Daftar
                                    Kamar</a>
                                <?php else : ?>
                                <a href="<?= base_url(); ?>/daftar-kamar" class="nav-link">Daftar
                                    Kamar</a>
                                <?php endif; ?>

                            </li>
                            <li class="nav-item">
                                <?php if ($id == "4") : ?>
                                <a href="<?= base_url(); ?>/kontak-kami" class="nav-link active">Kontak</a>
                                <?php else : ?>
                                <a href="<?= base_url(); ?>/kontak-kami" class="nav-link">Kontak</a>
                                <?php endif; ?>
                            </li>
                            <?php if (logged_in()) : ?>
                            <li class="nav-item">
                                <a href="<?= base_url(); ?>/booking-sekarang" class="nav-link">
                                    Keranjang
                                    <sup class="text-warning"><?= $keranjang; ?></sup>
                                </a>
                                <ul class="dropdown-menu">
                                    <?php if ($keranjang != 0) : ?>
                                    <?php foreach ($data_keranjang as $d) : ?>
                                    <li class="nav-item">
                                        <?php if ($d->layanan_kamar == 1) : ?>
                                        <a href="#" class="nav-link"><?= $d->nama_kamar; ?> -
                                            (Rp.<?= $d->sub_total; ?>/Malam
                                            ~
                                            Dengan Sarapan)</a>
                                        <?php else : ?>
                                        <a href="#" class="nav-link"><?= $d->nama_kamar; ?> -
                                            (Rp.<?= $d->sub_total; ?>/Malam ~ Tanpa Sarapan)</a>
                                        <?php endif; ?>
                                    </li>
                                    <?php endforeach; ?>
                                    <li><a href="<?= base_url(); ?>/booking-sekarang" id="btn-one-checkout"><i
                                                class="fa fa-shopping-cart"></i> Bayar
                                            Sekarang</a></li>
                                    <?php else : ?>
                                    <li><a href="#" class="mt-3"><em>Keranjang Kosong</em></a></li>
                                    <li><a href="<?= base_url(); ?>/booking-sekarang" id="btn-one-checkout"
                                            class="mt-3"> Cek Katalog
                                            Pesanan</a></li>
                                    <?php endif; ?>
                                </ul>
                            </li>
                            <?php endif; ?>
                            <?php if (logged_in()) : ?>
                            <li class="nav-item">
                                <div class="row">
                                    <a href="#" class="nav-link">Welcome, <?= user()->username; ?></a>
                                    <ul class="dropdown-menu">
                                        <li class="nav-item">
                                            <a href="<?= base_url(); ?>/pengaturan-profil/<?= user_id(); ?>"
                                                class="nav-link">Pengaturan</a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="<?= base_url(); ?>/logout" class="nav-link">Keluar</a>
                                        </li>
                                    </ul>
                            </li>
                            <?php else : ?>
                            <li class="nav-item">
                                <a href="<?= base_url(); ?>/login" class="nav-link">Masuk</a>
                            </li>
                            <li class="nav-item">
                                <a href="<?= base_url(); ?>/register" class="nav-link">Daftar</a>
                            </li>
                            <?php endif; ?>
                        </ul>
                    </div>
                </nav>
            </div>
        </div>
    </div>

    <?= $this->renderSection("main"); ?>

    <section class="footer-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-5 col-md-6 col-sm-6">
                    <div class="fooetr-item">
                        <div class="footer-logo">
                            <img src="<?= base_url(); ?>/assets/icon.png" width="75px" alt="image">
                        </div>
                        <div class="footer-text">
                            <p>Gunakan kesempatan untuk menikmati pelayanan dan fasilitas serta keindahan alam yang
                                tidak ada di tempat lain di Bali, hanya di Geria Semalung Bungalow</p>
                        </div>
                        <ul>
                            <li><span>Ikuti Kami:</span></li>
                            <li>
                                <a href="https://web.facebook.com/geriasemalung" target="_blank">
                                    <i class="fab fa-facebook-f"></i>
                                </a>
                            </li>
                            <li>
                                <a href="https://www.instagram.com/geria_semalung/" target="_blank">
                                    <i class="fab fa-instagram"></i>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="footer-content">
                        <h2>Kontak Kami</h2>
                    </div>
                    <ul class="footer-info">
                        <li>
                            <i class="fas fa-map-marker-alt"></i>
                            Jl.Tanah Lengis, Ababi, Abang, Kabupaten Karangasem, Bali 80852
                        </li>
                        <li>
                            <i class="fa fa-phone"></i>
                            +62-363-22116
                        </li>
                        <li>
                            <i class="fas fa-envelope"></i>
                            <a href="mailto:gsemalung@gmail.com">gsemalung@gmail.com</a>
                        </li>
                    </ul>
                </div>
                <div class="col-lg-2 col-md-6 col-sm-6">
                    <div class="footer-content">
                        <h2>Bungalow</h2>
                    </div>
                    <ul class="footer-list">
                        <li>
                            <a href="<?= base_url(); ?>/daftar-kamar">Akomodasi</a>
                        </li>
                        <li>
                            <a href="<?= base_url(); ?>/tentang-kami">Tentang Kami</a>
                        </li>
                        <li>
                            <a href="<?= base_url(); ?>/kontak-kami">Kontak Kami</a>
                        </li>
                    </ul>
                </div>
                <div class="col-lg-2 col-md-6 col-sm-6">
                    <div class="footer-content">
                        <h2>Layanan</h2>
                    </div>
                    <ul class="footer-list">
                        <li>
                            <a href="<?= base_url(); ?>/login">Login</a>
                        </li>
                        <li>
                            <a href="<?= base_url(); ?>/register">Register</a>
                        </li>
                        <li>
                            <a href="<?= base_url(); ?>/forgot">Lupa Password</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="footer-bottom-section">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 col-md-6 col-sm-7">
                        <div class="footer-bottom-content">
                            <p>Copyright <i class="far fa-copyright"></i> <?= date('Y'); ?>. Ganatech ID</p>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-5">
                        <div class="footer-bottom-links">
                            <p>
                                <a href="#">Terms & Privacy Policy</a>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <div class="back-to-top">Top</div>
    <?= $this->include("user/master/javascript"); ?>
</body>

</html>