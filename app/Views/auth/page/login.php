<?= $this->extend("auth/master/master"); ?>
<?= $this->section("main"); ?>
<div class="container">
    <div class="login-screen row align-items-center">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
            <form action="<?= base_url(); ?>/admin" method="POST">
                <div class="login-container">
                    <div class="row no-gutters">
                        <div class="col-xl-5 col-lg-5 col-md-6 col-sm-12">
                            <div class="login-box">
                                <a href="<?= base_url(); ?>" class="login-logo">
                                    <img src="<?= base_url(); ?>/assets/admin/img/unify.png"
                                        alt="Unify Admin Dashboard" />
                                </a>
                                <div class="input-group">
                                    <span class="input-group-addon" id="username"><i
                                            class="icon-account_circle"></i></span>
                                    <input type="text" class="form-control" placeholder="Username" aria-label="username"
                                        aria-describedby="username">
                                </div>
                                <br>
                                <div class="input-group">
                                    <span class="input-group-addon" id="password"><i
                                            class="icon-verified_user"></i></span>
                                    <input type="password" class="form-control" placeholder="Password"
                                        aria-label="Password" aria-describedby="password">
                                </div>
                                <div class="actions clearfix">
                                    <a href="<?= base_url(); ?>/auth/lupa-password">Lost password?</a>
                                    <button type="submit" class="btn btn-primary">Login</button>
                                </div>
                                <div class="or"></div>
                                <div class="mt-4">
                                    <a href="<?= base_url(); ?>/auth/buat-akun" class="additional-link">Don't have
                                        an Account? <span>Create Now</span></a>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-7 col-lg-7 col-md-6 col-sm-12">
                            <div class="login-slider"></div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>