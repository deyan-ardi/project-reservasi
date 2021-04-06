<?= $this->extend("auth/master/master"); ?>
<?= $this->section("main"); ?>
<div class="container">
    <div class="login-screen row align-items-center">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
            <form action="http://bootstrap.gallery/unify-dashboards/design-1/index.html">
                <div class="login-container">
                    <div class="row no-gutters">
                        <div class="col-xl-5 col-lg-5 col-md-6 col-sm-12">
                            <div class="login-box">
                                <a href="#" class="login-logo">
                                    <img src="<?= base_url(); ?>/assets/admin/img/unify.png"
                                        alt="Unify Admin Dashboard" />
                                </a>

                                <h5>Forgot Password?</h5>
                                <p class="info">In order to receive your access code by email, please enter the address
                                    you provided during the registration process.</p>

                                <div class="input-group">
                                    <span class="input-group-addon" id="emial"><i
                                            class="icon-account_circle"></i></span>
                                    <input type="email" class="form-control" placeholder="Email Address">
                                </div>
                                <div class="actions clearfix">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-7 col-lg-7 col-md-6 col-sm-12">
                            <div class="login-slider">
                                <a href="javacsript:void(0)">
                                    <img src="<?= base_url(); ?>/assets/admin/img/play-button.svg" class="play-icon"
                                        alt="play video" />
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>