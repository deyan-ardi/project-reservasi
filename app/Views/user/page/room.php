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
            <div class="col-lg-4 col-md-6">
                <div class="room-item">
                    <div class="room-image">
                        <img src="<?= base_url(); ?>/assets/user/img/room-page-image/1.jpg" alt="image">
                        <div class="night-btn">
                            <a href="#" class="default-btn-one">$260/Night</a>
                        </div>
                    </div>
                    <div class="room-content">
                        <h3>Suite Room</h3>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmodt.</p>
                        <div class="room-btn">
                            <a href="<?= base_url(); ?>/detail-kamar" class="room-btn-one">Read More
                                <i class="fa fa-arrow-right"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="room-item">
                    <div class="room-image">
                        <img src="<?= base_url(); ?>/assets/user/img/room-page-image/2.jpg" alt="image">
                        <div class="night-btn">
                            <a href="#" class="default-btn-one">$260/Night</a>
                        </div>
                    </div>
                    <div class="room-content">
                        <h3>Single Room</h3>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmodt.</p>
                        <div class="room-btn">
                            <a href="#" class="room-btn-one">Read More
                                <i class="fa fa-arrow-right"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="room-item">
                    <div class="room-image">
                        <img src="<?= base_url(); ?>/assets/user/img/room-page-image/3.jpg" alt="image">
                        <div class="night-btn">
                            <a href="#" class="default-btn-one">$260/Night</a>
                        </div>
                    </div>
                    <div class="room-content">
                        <h3>Double Room</h3>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmodt.</p>
                        <div class="room-btn">
                            <a href="#" class="room-btn-one">Read More
                                <i class="fa fa-arrow-right"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="room-item">
                    <div class="room-image">
                        <img src="<?= base_url(); ?>/assets/user/img/room-page-image/4.jpg" alt="image">
                        <div class="night-btn">
                            <a href="#" class="default-btn-one">$260/Night</a>
                        </div>
                    </div>
                    <div class="room-content">
                        <h3>Family Room</h3>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmodt.</p>
                        <div class="room-btn">
                            <a href="#" class="room-btn-one">Read More
                                <i class="fa fa-arrow-right"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="room-item">
                    <div class="room-image">
                        <img src="<?= base_url(); ?>/assets/user/img/room-page-image/5.jpg" alt="image">
                        <div class="night-btn">
                            <a href="#" class="default-btn-one">$260/Night</a>
                        </div>
                    </div>
                    <div class="room-content">
                        <h3>Small Room</h3>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmodt.</p>
                        <div class="room-btn">
                            <a href="#" class="room-btn-one">Read More
                                <i class="fa fa-arrow-right"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="room-item">
                    <div class="room-image">
                        <img src="<?= base_url(); ?>/assets/user/img/room-page-image/6.jpg" alt="image">
                        <div class="night-btn">
                            <a href="#" class="default-btn-one">$260/Night</a>
                        </div>
                    </div>
                    <div class="room-content">
                        <h3>Delux Room</h3>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmodt.</p>
                        <div class="room-btn">
                            <a href="#" class="room-btn-one">Read More
                                <i class="fa fa-arrow-right"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-12 col-md-12">
                <div class="pagination-area">
                    <a href="#" class="prev page-numbers"><i class="fas fa-angle-double-left"></i></a>
                    <a href="#" class="page-numbers">1</a>
                    <span class="page-numbers current" aria-current="page">2</span>
                    <a href="#" class="page-numbers">3</a>
                    <a href="#" class="page-numbers">4</a>
                    <a href="#" class="next page-numbers"><i class="fas fa-angle-double-right"></i></a>
                </div>
            </div>
        </div>
    </div>
</section>
<?= $this->endSection(); ?>