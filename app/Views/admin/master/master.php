<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="shortcut icon" href="<?= base_url(); ?>/assets/admin/img/favicon.ico" />
    <title><?= $title; ?> - Sistem Blablabla</title>

    <!-- Common CSS -->
    <link rel="stylesheet" href="<?= base_url(); ?>/assets/admin/css/bootstrap.min.css" />
    <link rel="stylesheet" href="<?= base_url(); ?>/assets/admin/fonts/icomoon/icomoon.css" />
    <link rel="stylesheet" href="<?= base_url(); ?>/assets/admin/css/main.css" />

    <!-- Other CSS includes plugins - Cleanedup unnecessary CSS -->
    <!-- Chartist css -->
    <link href="<?= base_url(); ?>/assets/admin/vendor/chartist/css/chartist.min.css" rel="stylesheet" />
    <link href="<?= base_url(); ?>/assets/admin/vendor/chartist/css/chartist-custom.css" rel="stylesheet" />
    <link rel="stylesheet" href="<?= base_url(); ?>/assets/admin/vendor/datatables/dataTables.bs4.css" />
    <link rel="stylesheet" href="<?= base_url(); ?>/assets/admin/vendor/datatables/dataTables.bs4-custom.css" />
    <link rel="stylesheet" href="<?= base_url(); ?>/assets/admin/vendor/sweetalert/sweetalert2.css">

</head>

<body>
    <div class="berhasil" data-berhasil="<?= session()->getFlashdata('berhasil') ?>"></div>
    <div class="gagal" data-gagal="<?= session()->getFlashdata('gagal') ?>"></div>
    <!-- Loading starts -->
    <div id="loading-wrapper">
        <div id="loader">
            <div class="line1"></div>
            <div class="line2"></div>
            <div class="line3"></div>
            <div class="line4"></div>
            <div class="line5"></div>
            <div class="line6"></div>
        </div>
    </div>
    <!-- Loading ends -->

    <!-- BEGIN .app-wrap -->
    <div class="app-wrap">
        <!-- BEGIN .app-heading -->
        <header class="app-header">
            <div class="container-fluid">
                <div class="row gutters">
                    <div class="col-xl-5 col-lg-5 col-md-5 col-sm-3 col-4">
                        <a class="mini-nav-btn" href="#" id="app-side-mini-toggler">
                            <i class="icon-menu5"></i>
                        </a>
                        <a href="#app-side" data-toggle="onoffcanvas" class="onoffcanvas-toggler" aria-expanded="true">
                            <i class="icon-chevron-thin-left"></i>
                        </a>
                    </div>
                    <div class="col-xl-2 col-lg-2 col-md-2 col-sm-6 col-4">
                        <a href="<?= base_url(); ?>/assets/admin/index-2.html" class="logo">
                            <img src="<?= base_url(); ?>/assets/admin/img/unify.png" alt="Unify Admin Dashboard" />
                        </a>
                    </div>
                    <div class="col-xl-5 col-lg-5 col-md-5 col-sm-3 col-4">
                        <ul class="header-actions">
                            <li class="dropdown">
                                <a href="#" id="userSettings" class="user-settings" data-toggle="dropdown"
                                    aria-haspopup="true">
                                    <?php if (empty(user()->foto)) : ?>
                                    <img class="avatar" src="<?= base_url(); ?>/user_image/default.jpg"
                                        alt="User Thumb" />
                                    <?php else : ?>
                                    <img class="avatar" src="<?= base_url(); ?>/user_image/<?= user()->foto; ?>"
                                        alt="User Thumb" />
                                    <?php endif; ?>
                                    <span class="user-name"><?= ucWords(user()->username); ?></span>
                                    <i class="icon-chevron-small-down"></i>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userSettings">
                                    <ul class="user-settings-list">
                                        <li>
                                            <a href="<?= base_url(); ?>/admin/pengaturan-profil/<?= user_id(); ?>">
                                                <div class="icon red">
                                                    <i class="icon-cog3"></i>
                                                </div>
                                                <p>Pengaturan</p>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="<?= base_url(); ?>/logout">
                                                <div class="icon yellow">
                                                    <i class="icon-switch"></i>
                                                </div>
                                                <p>Keluar</p>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </header>
        <!-- END: .app-heading -->
        <!-- BEGIN .app-container -->
        <div class="app-container">
            <!-- BEGIN .app-side -->
            <aside class="app-side" id="app-side">
                <!-- BEGIN .side-content -->
                <div class="side-content ">
                    <!-- BEGIN .user-profile -->
                    <div class="user-profile">
                        <?php if (empty(user()->foto)) : ?>
                        <img src="<?= base_url(); ?>/user_image/default.jpg" class="profile-thumb" alt="User Thumb">
                        <?php else : ?>
                        <img src="<?= base_url(); ?>/user_image/<?= user()->foto; ?>" class="profile-thumb"
                            alt="User Thumb">
                        <?php endif; ?>

                    </div>
                    <!-- END .user-profile -->

                    <!-- BEGIN .side-nav -->
                    <nav class="side-nav">
                        <!-- BEGIN: side-nav-content -->
                        <ul class="unifyMenu" id="unifyMenu">
                            <?php if ($id == "1" || $id == "2" || $id == "3" || $id == "4") : ?>
                            <li class="active selected">
                                <?php else : ?>
                            <li>
                                <?php endif; ?>
                                <a href="#" class="has-arrow" aria-expanded="false">
                                    <span class="has-icon">
                                        <i class="icon-laptop_windows"></i>
                                    </span>
                                    <span class="nav-title">Dashboards</span>
                                </a>
                                <ul aria-expanded="false" class="collapse in">
                                    <li>
                                        <?php if ($id == "1") : ?>
                                        <a href='<?= base_url(); ?>/admin' class="current-page">Dashboard</a>
                                        <?php else : ?>
                                        <a href='<?= base_url(); ?>/admin'>Dashboard</a>
                                        <?php endif; ?>
                                    </li>
                                    <li>
                                        <?php if ($id == "2") : ?>
                                        <a href='<?= base_url(); ?>/admin/manajemen-kamar'
                                            class="current-page">Manajemen Kamar</a>
                                        <?php else : ?>
                                        <a href='<?= base_url(); ?>/admin/manajemen-kamar'>Manajemen Kamar</a>
                                        <?php endif; ?>
                                    </li>
                                    <li>
                                        <?php if ($id == "3") : ?>
                                        <a href='<?= base_url(); ?>/admin/manajemen-pegawai'
                                            class="current-page">Manajemen Pegawai</a>
                                        <?php else : ?>
                                        <a href='<?= base_url(); ?>/admin/manajemen-pegawai'>Manajemen Pegawai</a>
                                        <?php endif; ?>
                                    </li>
                                    <li>
                                        <?php if ($id == "4") : ?>
                                        <a href='<?= base_url(); ?>/admin/manajemen-user' class="current-page">Manajemen
                                            User</a>
                                        <?php else : ?>
                                        <a href='<?= base_url(); ?>/admin/manajemen-user'>Manajemen
                                            User</a>
                                        <?php endif; ?>
                                    </li>
                                </ul>
                            </li>

                            <li class="menu-header">
                                -- Manajemen Reservasi
                            </li>
                            <?php if ($id == "5" || $id == "6" || $id == "7" || $id == "8") : ?>
                            <li class="active selected">
                                <?php else : ?>
                            <li>
                                <?php endif; ?>
                                <a href="#" class="has-arrow" aria-expanded="false">
                                    <span class="has-icon">
                                        <i class="icon-pie-chart2"></i>
                                    </span>
                                    <span class="nav-title">Data Reservasi</span>
                                </a>
                                <ul aria-expanded="false">
                                    <li>
                                        <?php if ($id == "5") : ?>
                                        <a href="<?= base_url(); ?>/admin/pesanan-masuk" class="current-page">Pesanan
                                            Masuk</a>
                                        <?php else : ?>
                                        <a href="<?= base_url(); ?>/admin/pesanan-masuk">Pesanan
                                            Masuk</a>
                                        <?php endif; ?>
                                    </li>
                                    <li>
                                        <?php if ($id == "6") : ?>
                                        <a href="<?= base_url(); ?>/admin/validasi-masuk" class="current-page">Validasi
                                            Masuk</a>
                                        <?php else : ?>
                                        <a href="<?= base_url(); ?>/admin/validasi-masuk">Validasi
                                            Masuk</a>
                                        <?php endif; ?>
                                    </li>
                                    <li>
                                        <?php if ($id == "7") : ?>
                                        <a href="<?= base_url(); ?>/admin/pesanan-tervalidasi"
                                            class="current-page">Pesanan
                                            Tervalidasi</a>
                                        <?php else : ?>
                                        <a href="<?= base_url(); ?>/admin/pesanan-tervalidasi">Pesanan
                                            Tervalidasi</a>
                                        <?php endif; ?>
                                    </li>
                                    <li>
                                        <?php if ($id == "8") : ?>
                                        <a href="<?= base_url(); ?>/admin/laporan-pesanan" class="current-page">Cetak
                                            Laporan</a>
                                        <?php else : ?>
                                        <a href="<?= base_url(); ?>/admin/laporan-pesanan">Cetak Laporan</a>
                                        <?php endif; ?>
                                    </li>
                                </ul>
                            </li>
                            <li class="menu-header">
                                -- Manajemen Website
                            </li>
                            <?php if ($id == "9") : ?>
                            <li class="active selected">
                                <?php else : ?>
                            <li>
                                <?php endif; ?>
                                <a href="<?= base_url(); ?>/admin/info-website">
                                    <span class="has-icon">
                                        <i class="icon-info-with-circle"></i>
                                    </span>
                                    <span class="nav-title">Informasi Website</span>
                                </a>
                            </li>
                        </ul>
                        <!-- END: side-nav-content -->
                    </nav>
                    <!-- END: .side-nav -->
                </div>
                <!-- END: .side-content -->
            </aside>
            <!-- END: .app-side -->
            <?= $this->renderSection("main"); ?>
            <!-- END: .app-main -->
        </div>
        <!-- END: .app-container -->
        <!-- BEGIN .main-footer -->
        <footer class="main-footer fixed-btm">
            &copy; Copyright <?= date('Y'); ?> - Ganatech Id
        </footer>
        <!-- END: .main-footer -->
    </div>
    <!-- END: .app-wrap -->

    <!-- jQuery first, then Tether, then other JS. -->
    <script src="<?= base_url(); ?>/assets/admin/js/jquery.js"></script>
    <script src="<?= base_url(); ?>/assets/admin/js/tether.min.js"></script>
    <script src="<?= base_url(); ?>/assets/admin/js/bootstrap.min.js"></script>
    <script src="<?= base_url(); ?>/assets/admin/vendor/unifyMenu/unifyMenu.js"></script>
    <script src="<?= base_url(); ?>/assets/admin/vendor/onoffcanvas/onoffcanvas.js"></script>
    <script src="<?= base_url(); ?>/assets/admin/js/moment.js"></script>

    <!-- Data Tables -->
    <script src="<?= base_url(); ?>/assets/admin/vendor/datatables/dataTables.min.js"></script>
    <script src="<?= base_url(); ?>/assets/admin/vendor/datatables/dataTables.bootstrap.min.js"></script>
    <!-- Custom Data tables -->
    <script src="<?= base_url(); ?>/assets/admin/vendor/datatables/custom/custom-datatables.js"></script>

    <!-- Sweetalert -->
    <script src="<?= base_url(); ?>/assets/admin/vendor/sweetalert/sweetalert2.js"></script>
    <!-- Common JS -->
    <script src="<?= base_url(); ?>/assets/admin/js/common.js"></script>
    <script>
    const previewImg = () => {
        const file = document.getElementById('file');
        const fileLabel = document.querySelector('.custom-file-control');
        const imgPreview = document.querySelector('.img-preview');
        fileLabel.textContent = file.files[0].name;

        const fileSampul = new FileReader();
        fileSampul.readAsDataURL(file.files[0]);
        fileSampul.onload = function(e) {
            imgPreview.src = e.target.result;
        }
    }
    const multipleImg = () => {
        const file = document.getElementById('file');
        const fileLabel = document.querySelector('.custom-file-control');
        const countLabel = document.querySelector('.count');
        const imgPreview = document.querySelector('.img-preview');
        let arr = [];
        Array.from(file.files).forEach(file => {
            let x = arr.push(file.name);
        });
        fileLabel.textContent = arr;
        countLabel.textContent = arr.length;

    }
    </script>

</body>

</html>