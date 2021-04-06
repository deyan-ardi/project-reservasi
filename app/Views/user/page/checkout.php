<?= $this->extend("user/master/master"); ?>
<?= $this->section("main"); ?>
<section class="page-banner">
    <div class="container">
        <div class="page-banner-content">
            <h2>Checkout Pemesanan</h2>
            <p><a href="<?= base_url(); ?>">Beranda</a> / Checkout Pemesanan</p>
        </div>
    </div>
</section>


<section class="single-room-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <div class="single-leave-reply">
                    <div class="reply-content">
                        <h3>Checkout</h3>
                    </div>
                    <form class="reservation-form">
                        <div class="row">
                            <div class="col-lg-12 col-md-12">
                                <div class="form-group">
                                    <label>Email</label>
                                    <input type="email" class="form-control" placeholder="Email">
                                </div>
                            </div>
                            <div class="col-lg-12 col-md-12">
                                <div class="form-group">
                                    <label>Check In</label>
                                    <input type="text" id="datepicker" class="form-control" placeholder="Check In">
                                    <i class="flaticon-calendar"></i>
                                </div>
                            </div>
                            <div class="col-lg-12 col-md-12">
                                <div class="form-group">
                                    <label>Check Out</label>
                                    <input type="text" id="check-datepicker" class="form-control"
                                        placeholder="Check Out">
                                    <i class="flaticon-calendar"></i>
                                </div>
                            </div>
                            <div class="col-lg-12 col-md-12">
                                <div class="form-group">
                                    <label>Room</label>
                                    <select name="room" class="form-control">
                                        <option value="1">01</option>
                                        <option value="2">02</option>
                                        <option value="3">03</option>
                                        <option value="4">04</option>
                                        <option value="5">05</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6">
                                <div class="form-group">
                                    <label>Adult:</label>
                                    <select name="adult" class="form-control">
                                        <option value="1">01</option>
                                        <option value="2">02</option>
                                        <option value="3">03</option>
                                        <option value="4">04</option>
                                        <option value="5">05</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6">
                                <div class="form-group">
                                    <label>Children:</label>
                                    <select name="children" class="form-control">
                                        <option value="1">01</option>
                                        <option value="2">02</option>
                                        <option value="3">03</option>
                                        <option value="4">04</option>
                                        <option value="5">05</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-12 col-md-12">
                                <div class="send-btn">
                                    <button class="send-btn-one">Checkout Pemesanan</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="single-leave-reply">
                    <div class="reply-content">
                        <h3>Upload Bukti Pembayaran</h3>
                    </div>
                    <form class="reservation-form">
                        <div class="row">
                            <div class="col-lg-12 col-md-12">
                                <div class="form-group">
                                    <label>Email</label>
                                    <input type="email" class="form-control" placeholder="Email">
                                </div>
                            </div>
                            <div class="col-lg-12 col-md-12">
                                <div class="form-group">
                                    <label>Check In</label>
                                    <input type="text" id="datepicker" class="form-control" placeholder="Check In">
                                    <i class="flaticon-calendar"></i>
                                </div>
                            </div>
                            <div class="col-lg-12 col-md-12">
                                <div class="form-group">
                                    <label>Check Out</label>
                                    <input type="text" id="check-datepicker" class="form-control"
                                        placeholder="Check Out">
                                    <i class="flaticon-calendar"></i>
                                </div>
                            </div>
                            <div class="col-lg-12 col-md-12">
                                <div class="form-group">
                                    <label>Room</label>
                                    <select name="room" class="form-control">
                                        <option value="1">01</option>
                                        <option value="2">02</option>
                                        <option value="3">03</option>
                                        <option value="4">04</option>
                                        <option value="5">05</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-12 col-md-12">
                                <div class="send-btn">
                                    <button class="send-btn-one">Upload Bukti Pembayaran</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-lg-4 col-md-12">

                <div class="sidebar mt-0">
                    <div class="widget widget-map">
                        <div class="widget-map-area">
                            <iframe
                                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d387190.2799090714!2d-74.25987368715496!3d40.697670064588735!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89c24fa5d33f083b%3A0xc80b8f06e177fe62!2sNew%20York%2C%20NY%2C%20USA!5e0!3m2!1sen!2sbd!4v1570689677254!5m2!1sen!2sbd"></iframe>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


<section class="popular-room-section">
    <div class="container">
        <div class="popular-content">
            <h3>Popular Room</h3>
        </div>
        <div class="popular-slider owl-carousel owl-theme">
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
                        <a href="#" class="room-btn-one">Read More
                            <i class="fa fa-arrow-right"></i>
                        </a>
                    </div>
                </div>
            </div>
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
                        <a href="#" class="room-btn-one">Read More
                            <i class="fa fa-arrow-right"></i>
                        </a>
                    </div>
                </div>
            </div>
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
    </div>
</section>


<?= $this->endSection(); ?>