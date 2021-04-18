<?= $this->extend("admin/master/master"); ?>
<?= $this->section("main"); ?>
<!-- BEGIN .app-main -->
<div class="app-main">
    <!-- BEGIN .main-heading -->
    <header class="main-heading">
        <div class="container-fluid">
            <div class="row">
                <div class="col-xl-8 col-lg-8 col-md-8 col-sm-8">
                    <div class="page-icon">
                        <i class="icon-laptop_windows"></i>
                    </div>
                    <div class="page-title">
                        <h5>Dashboard</h5>
                        <h6 class="sub-heading">Selamat Datang Di Dashboard Sistem Reservasi Gria Semalung Bungalow</h6>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!-- END: .main-heading -->
    <!-- BEGIN .main-content -->
    <div class="main-content">
        <!-- Row start -->
        <div class="row gutters">
            <div class="col-xl-3 col-lg-2 col-md-3 col-sm-3 col">
                <a href="#" class="block-140">
                    <div class="icon violet">
                        <i class="icon-shopping-cart2"></i>
                    </div>
                    <h5><?= $count_selesai; ?></h5>
                    <p>Pesanan Selesai</p>
                </a>
                <a href="#" class="block-140">
                    <div class="icon info">
                        <i class="icon-login"></i>
                    </div>
                    <h5><?= $count_tervalidasi; ?></h5>
                    <p>Pesanan Tervalidasi</p>
                </a>

            </div>
            <div class="col-xl-3 col-lg-2 col-md-3 col-sm-3 col">
                <a href="#" class="block-140">
                    <div class="icon success">
                        <i class="icon-bell3"></i>
                    </div>
                    <h5><?= $count_masuk; ?></h5>
                    <p>Pesanan Masuk</p>
                </a>
                <a href="#" class="block-140">
                    <div class="icon warning">
                        <i class="icon-location4"></i>
                    </div>
                    <h5><?= $count_member; ?></h5>
                    <p>Member</p>
                </a>
            </div>
            <div class="col-xl-3 col-lg-2 col-md-6 col-sm-6">
                <a href="#" class="block-140">
                    <div class="icon danger">
                        <i class="icon-archive3"></i>
                    </div>
                    <h5><?= $count_validasi; ?></h5>
                    <p>Validasi Masuk</p>
                </a>
                <a href="#" class="block-140">
                    <div class="icon pink">
                        <i class="icon-thumbs-up2"></i>
                    </div>
                    <h5><?= $count_pegawai; ?></h5>
                    <p>Tim Solid</p>
                </a>
            </div>
            <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6">
                <a class="block-300 center-text">
                    <div class="user-profile">
                        <?php if (empty(user()->foto)) : ?>
                        <img src="<?= base_url(); ?>/user_image/default.jpg" class="profile-thumb" alt="User Thumb">
                        <?php else : ?>
                        <img src="<?= base_url(); ?>/user_image/<?= user()->foto; ?>" class="profile-thumb"
                            alt="User Thumb">
                        <?php endif; ?>
                        <h5 class="profile-name"><?= user()->username; ?></h5>
                        <?php if (in_groups("super admin")) : ?>
                        <h6 class="profile-designation">Admin</h6>
                        <?php else : ?>
                        <h6 class="profile-designation">Staff</h6>
                        <?php endif; ?>
                        <p class="profile-location"><?= user()->email; ?></p>
                        <div class="ml-5 mr-5 chartist custom-two">
                            <div class="team-act"></div>
                        </div>
                    </div>
                </a>
            </div>
        </div>
        <!-- Row end -->
        <!-- Row start -->
        <div class="row gutters">
            <div class="col-xl-5 col-lg-6 col-md-6 col-sm-6">
                <div class="card">
                    <div class="card-header">Rincian Sistem</div>
                    <div class="card-body">
                        <ul class="stats">
                            <li>
                                <span class="icon">
                                    <i class="icon-network"></i>
                                </span>
                                Dikembangkan Dengan Codeigniter 4
                            </li>
                            <li>
                                <span class="icon">
                                    <i class="icon-info4"></i>
                                </span>
                                Versi 1.0 - Codename Beta
                            </li>
                            <li>
                                <span class="icon">
                                    <i class="icon-lightbulb"></i>
                                </span>
                                Hak Cipta Milik
                            </li>
                            <li>
                                <span class="icon">
                                    <i class="icon-mail6"></i>
                                </span>
                                ganatech.id@gmail.com
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-xl-7 col-lg-6 col-md-6 col-sm-6">
                <div class="card">
                    <div class="card-header">Aktifitas Terakhir</div>
                    <div class="customScroll">
                        <div class="card-body">
                            <ul class="message-wrapper">
                                <?php
                                $i = 1;
                                foreach ($status_akhir as $s) :
                                ?>
                                <?php if ($i++ % 2 == 0) : ?>
                                <li class="out">
                                    <?php else : ?>
                                <li class="in">
                                    <?php endif; ?>
                                    <img class="avatar" alt="48x48"
                                        src="<?= base_url(); ?>/assets/admin/img/avatar2.svg" />
                                    <div class="message">
                                        <a href="#" class="name">Pesanan Baru Nomor <?= $s->kode_pesanan; ?></a>
                                        <span class="date-time"><?= date('d F Y H:i', strtotime($s->created_at)); ?>
                                            WITA</span>
                                        <div class="body">
                                            Pesanan Masuk Baru Oleh Member <kbd><?= $s->username; ?></kbd>, Mohon Dicek
                                            Pada Bagian
                                            Data
                                            Reservasi
                                        </div>
                                    </div>
                                </li>
                                <?php endforeach; ?>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Row end -->
    </div>
    <!-- END: .main-content -->
</div>
<!-- END: .app-main -->

<?= $this->endSection(); ?>