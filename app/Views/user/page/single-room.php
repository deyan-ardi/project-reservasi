<?= $this->extend("user/master/master"); ?>
<?= $this->section("main"); ?>
<section class="page-banner">
    <div class="container">
        <div class="page-banner-content">
            <h2>Single Room</h2>
            <p><a href="index.html">Home</a> / Single Room</p>
        </div>
    </div>
</section>


<section class="single-room-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <div class="image-slider owl-carousel owl-theme">
                    <div class="article-img">
                        <img src="<?= base_url(); ?>/assets/user/img/single-room-image/room-1.jpg" alt="blog-details">
                    </div>
                    <div class="article-img">
                        <img src="<?= base_url(); ?>/assets/user/img/single-room-image/room-2.jpg" alt="blog-details">
                    </div>
                    <div class="article-img">
                        <img src="<?= base_url(); ?>/assets/user/img/single-room-image/room-3.jpg" alt="blog-details">
                    </div>
                    <div class="article-img">
                        <img src="<?= base_url(); ?>/assets/user/img/single-room-image/room-4.jpg" alt="blog-details">
                    </div>
                </div>
                <ul class="image-list owl-carousel owl-theme">
                    <li>
                        <img src="<?= base_url(); ?>/assets/user/img/single-room-image/1.jpg" alt="image">
                    </li>
                    <li>
                        <img src="<?= base_url(); ?>/assets/user/img/single-room-image/2.jpg" alt="image">
                    </li>
                    <li>
                        <img src="<?= base_url(); ?>/assets/user/img/single-room-image/3.jpg" alt="image">
                    </li>
                    <li>
                        <img src="<?= base_url(); ?>/assets/user/img/single-room-image/4.jpg" alt="image">
                    </li>
                    <li>
                        <img src="<?= base_url(); ?>/assets/user/img/single-room-image/5.jpg" alt="image">
                    </li>
                    <li>
                        <img src="<?= base_url(); ?>/assets/user/img/single-room-image/6.jpg" alt="image">
                    </li>
                    <li>
                        <img src="<?= base_url(); ?>/assets/user/img/single-room-image/1.jpg" alt="image">
                    </li>
                </ul>
                <div class="single-room-content">
                    <h3>Luxury King Room</h3>
                    <ul class="star-list">
                        <li><i class="fas fa-star"></i></li>
                        <li><i class="fas fa-star"></i></li>
                        <li><i class="fas fa-star"></i></li>
                        <li><i class="fas fa-star"></i></li>
                        <li><i class="fas fa-star"></i></li>
                    </ul>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut
                        labore et dolore magna aliqua. Quis ipsum suspendisse ultrices gravida. Risus commodo
                        viverra maecenas accumsan lacus vel facilisis.Lorem Ipsum is simply dummy text of the
                        printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text
                        ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make
                        a type specimen book. It has survived not only five centuries, but also the leap into Lorem
                        ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut
                        labore et dolore magna aliqua. Quis ipsum suspendisse ultrices gravida. Risus commodo
                        viverra maecenas accumsan lacus vel facilisis.</p>
                </div>
            </div>
            <div class="col-lg-4 col-md-12">
                <div class="single-leave-reply">
                    <div class="reply-content">
                        <h3>Reservation</h3>
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
                                    <button class="send-btn-one">Booking Sekarang</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="single-room-sidebar mt-0">
                    <div class="single-room-map">
                        <div class="single-room-map-area">
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