<?= $this->extend("admin/master/master"); ?>
<?= $this->section("main"); ?>
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
                        <h5>Informasi Website</h5>
                        <h6 class="sub-heading">Informasi Sistem Yang Digunakan
                        </h6>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!-- END: .main-heading -->
    <div class="main-content">
        <!-- Row start -->
        <div class="row gutters">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                <div class="card">
                    <div class="card-header">Versi Website 1.0 - Beta</div>
                    <div class="card-body">
                        <h4 class="card-title">Tim Pengembang</h4>
                        <p class="card-text">Website ini sepenuhnya dikembangkan oleh ...... sebagai bahan dalam .....
                            Website ini dikembangkan dengan framework Codeigniter 4
                        </p>
                        <a href="#" class="btn btn-primary">Lihat Repositori</a>
                    </div>
                </div>
            </div>
        </div>
        <!-- Row end -->
    </div>
    <!-- Row ends -->
</div>
<?= $this->endSection(); ?>