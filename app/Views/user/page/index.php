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
                                <span>Overtop Hotel</span>
                                <h1>Luxury More & Meets Classic</h1>
                                <p>Make your holiday Special</p>
                            </div>
                            <div class="banner-video">
                                <div class="video-btn">
                                    <a href="https://www.youtube.com/watch?v=bk7McNUjWgw" class="popup-youtube">
                                        <i class="flaticon-play-button"></i>
                                    </a>
                                </div>
                                <div class="discover-btn">
                                    <a href="#" class="discover-btn-one">Booking Sekarang</a>
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
        <form class="check-form">
            <div class="row">
                <div class="col-lg-3 col-md-6 col-sm-6 no-padding">
                    <div class="check-content">
                        <p>Check-In</p>
                        <div class="form-group">
                            <input type="text" name="check-in" id="datepicker" class="form-control" placeholder="Date">
                            <i class="flaticon-calendar"></i>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6 no-padding">
                    <div class="check-content">
                        <p>Check-Out</p>
                        <div class="form-group">
                            <input type="text" name="check-out" id="check-datepicker" class="form-control"
                                placeholder="Date">
                            <i class="flaticon-calendar"></i>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6 no-padding">
                    <div class="check-content">
                        <p>Adult</p>
                        <div class="form-group">
                            <select name="adult" class="form-content">
                                <option value="1">01</option>
                                <option value="2">02</option>
                                <option value="3">03</option>
                                <option value="4">04</option>
                                <option value="5">05</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6 no-padding">
                    <div class="btn-content">
                        <div class="check-btn">
                            <button class="default-btn-one">
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
                    <span>About Us</span>
                    <h3>Make Your Golden Memory With Us!</h3>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt
                        labore dolore. Quis ipsum suspendisse ultrices gravida. Risus commodo viverra maecenas
                        accumsan lacus vel facilisis. </p>
                    <div class="about-btn">
                        <a href="#" class="about-btn-one">Read More
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
            <span>Accommodation</span>
            <h3>Discover Our Room</h3>
        </div>
        <div class="room-slider owl-carousel owl-theme">
            <div class="room-item">
                <div class="room-image">
                    <img src="<?= base_url(); ?>/assets/user/img/room/1.jpg" alt="image">
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
                    <img src="<?= base_url(); ?>/assets/user/img/room/2.jpg" alt="image">
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
            <div class="room-item">
                <div class="room-image">
                    <img src="<?= base_url(); ?>/assets/user/img/room/3.jpg" alt="image">
                    <div class="night-btn">
                        <a href="#" class="default-btn-one">$260/Night</a>
                    </div>
                </div>
                <div class="room-content">
                    <h3>Classic Room</h3>
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
                    <img src="<?= base_url(); ?>/assets/user/img/room/4.jpg" alt="image">
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
                    <img src="<?= base_url(); ?>/assets/user/img/room/5.jpg" alt="image">
                    <div class="night-btn">
                        <a href="#" class="default-btn-one">$260/Night</a>
                    </div>
                </div>
                <div class="room-content">
                    <h3>Classic Room</h3>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmodt.</p>
                    <div class="room-btn">
                        <a href="#" class="room-btn-one">Read More
                            <i class="fa fa-arrow-right"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div class="view-btn">
            <a href="#" class="view-btn-one">View All Rooms</a>
        </div>
    </div>
</section>


<section class="reception-section">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6">
                <div class="reception-item">
                    <div class="reception-content">
                        <span>01</span>
                        <h2>Hotel Luxury</h2>
                        <h3>Reception</h3>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt
                            ut labore et dolore magna aliqua. Quis ipsum suspendisse ultrices gravida. Risus commodo
                            viverra maecenas accumsan lacus vel facilisis.</p>
                    </div>
                    <ul class="reception-list">
                        <li>
                            <i class="flaticon-check-mark"></i>
                            Online Payment System
                        </li>
                        <li>
                            <i class="flaticon-check-mark"></i>
                            Professional Wedding Planning
                        </li>
                        <li>
                            <i class="flaticon-check-mark"></i>
                            Wifi-internet Access
                        </li>
                        <li>
                            <i class="flaticon-check-mark"></i>
                            Catering Service
                        </li>
                    </ul>
                    <div class="reception-btn">
                        <a href="#" class="reception-btn-one">Read More<i class="fa fa-arrow-right"></i></a>
                    </div>
                    <div class="reception-shape-image">
                        <img src="<?= base_url(); ?>/assets/user/img/shape.png" alt="image">
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="reception-image">
                    <img src="<?= base_url(); ?>/assets/user/img/reception.png" alt="image">
                </div>
            </div>
        </div>
    </div>
</section>


<section class="convention-section">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6">
                <div class="convention-image">
                    <img src="<?= base_url(); ?>/assets/user/img/convention.png" alt="image">
                </div>
            </div>
            <div class="col-lg-6">
                <div class="convention-item">
                    <div class="convention-content">
                        <span>02</span>
                        <h2>Hotel Luxury</h2>
                        <h3>Convention Hall</h3>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt
                            ut labore et dolore magna aliqua. Quis ipsum suspendisse ultrices gravida. Risus commodo
                            viverra maecenas accumsan lacus vel facilisis.</p>
                    </div>
                    <ul class="convention-list">
                        <li>
                            <i class="flaticon-check-mark"></i>
                            Online Payment System
                        </li>
                        <li>
                            <i class="flaticon-check-mark"></i>
                            Professional Wedding Planning
                        </li>
                        <li>
                            <i class="flaticon-check-mark"></i>
                            Wifi-internet Access
                        </li>
                        <li>
                            <i class="flaticon-check-mark"></i>
                            Catering Service
                        </li>
                    </ul>
                    <div class="convention-btn">
                        <a href="#" class="convention-btn-one">Read More<i class="fa fa-arrow-right"></i></a>
                    </div>
                    <div class="convention-shape-image">
                        <img src="<?= base_url(); ?>/assets/user/img/shape-two.png" alt="image">
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


<section class="video-section">
    <div class="container">
        <div class="video-content">
            <div class="video-btn">
                <a href="https://www.youtube.com/watch?v=bk7McNUjWgw" class="popup-youtube">
                    <i class="flaticon-play-button"></i>
                </a>
            </div>
        </div>
        <div class="video-title">
            <h3>Watch Intro Video</h3>
        </div>
    </div>
</section>


<section class="top-services-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 col-md-6 col-sm-6">
                <div class="top-services-box">
                    <img src="<?= base_url(); ?>/assets/user/img/video-image/1.png" alt="image">
                    <h3>Private Pool</h3>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed eiusmod temporgravida.</p>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-6">
                <div class="top-services-box">
                    <img src="<?= base_url(); ?>/assets/user/img/video-image/2.png" alt="image">
                    <h3>Free & Unlimited Wifi</h3>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed eiusmod temporgravida.</p>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-6 offset-lg-0 offset-md-3">
                <div class="top-services-box">
                    <img src="<?= base_url(); ?>/assets/user/img/video-image/3.png" alt="image">
                    <h3>Airport Pick Up</h3>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed eiusmod temporgravida.</p>
                </div>
            </div>
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


<section class="blog-section">
    <div class="container">
        <div class="section-title">
            <span>Form Blog</span>
            <h3>Latest News</h3>
        </div>
        <div class="blog-slider owl-carousel owl-theme">
            <div class="blog-item">
                <div class="blog-image">
                    <a href="#">
                        <img src="<?= base_url(); ?>/assets/user/img/blog/1.png" alt="image">
                    </a>
                </div>
                <div class="blog-content">
                    <ul class="blog-list">
                        <li>
                            <i class="flaticon-avatar"></i>By Admin
                        </li>
                        <li>
                            <i class="flaticon-calendar"></i>6 October 2021
                        </li>
                    </ul>
                    <h3>Electric Feel And of Other Things</h3>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod </p>
                    <div class="blog-btn">
                        <a href="#" class="blog-btn-one">Read More <i class="fa fa-arrow-right"></i></a>
                    </div>
                </div>
            </div>
            <div class="blog-item">
                <div class="blog-image">
                    <a href="#">
                        <img src="<?= base_url(); ?>/assets/user/img/blog/2.png" alt="image">
                    </a>
                </div>
                <div class="blog-content">
                    <ul class="blog-list">
                        <li>
                            <i class="flaticon-avatar"></i>By Admin
                        </li>
                        <li>
                            <i class="flaticon-calendar"></i>6 October 2021
                        </li>
                    </ul>
                    <h3>Licina Eget Consects set Convallis</h3>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod </p>
                    <div class="blog-btn">
                        <a href="#" class="blog-btn-one">Read More <i class="fa fa-arrow-right"></i></a>
                    </div>
                </div>
            </div>
            <div class="blog-item">
                <div class="blog-image">
                    <a href="#">
                        <img src="<?= base_url(); ?>/assets/user/img/blog/3.png" alt="image">
                    </a>
                </div>
                <div class="blog-content">
                    <ul class="blog-list">
                        <li>
                            <i class="flaticon-avatar"></i>By Admin
                        </li>
                        <li>
                            <i class="flaticon-calendar"></i>6 October 2021
                        </li>
                    </ul>
                    <h3>Cras Ultricies Ligula Sed Magna</h3>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod </p>
                    <div class="blog-btn">
                        <a href="#" class="blog-btn-one">Read More <i class="fa fa-arrow-right"></i></a>
                    </div>
                </div>
            </div>
            <div class="blog-item">
                <div class="blog-image">
                    <a href="#">
                        <img src="<?= base_url(); ?>/assets/user/img/blog/1.png" alt="image">
                    </a>
                </div>
                <div class="blog-content">
                    <ul class="blog-list">
                        <li>
                            <i class="flaticon-avatar"></i>By Admin
                        </li>
                        <li>
                            <i class="flaticon-calendar"></i>6 October 2021
                        </li>
                    </ul>
                    <h3>Electric Feel And of Other Things</h3>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod </p>
                    <div class="blog-btn">
                        <a href="#" class="blog-btn-one">Read More <i class="fa fa-arrow-right"></i></a>
                    </div>
                </div>
            </div>
            <div class="blog-item">
                <div class="blog-image">
                    <a href="#">
                        <img src="<?= base_url(); ?>/assets/user/img/blog/2.png" alt="image">
                    </a>
                </div>
                <div class="blog-content">
                    <ul class="blog-list">
                        <li>
                            <i class="flaticon-avatar"></i>By Admin
                        </li>
                        <li>
                            <i class="flaticon-calendar"></i>6 October 2021
                        </li>
                    </ul>
                    <h3>Licina Eget Consects set Convallis</h3>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod </p>
                    <div class="blog-btn">
                        <a href="#" class="blog-btn-one">Read More <i class="fa fa-arrow-right"></i></a>
                    </div>
                </div>
            </div>
            <div class="blog-item">
                <div class="blog-image">
                    <a href="#">
                        <img src="<?= base_url(); ?>/assets/user/img/blog/3.png" alt="image">
                    </a>
                </div>
                <div class="blog-content">
                    <ul class="blog-list">
                        <li>
                            <i class="flaticon-avatar"></i>By Admin
                        </li>
                        <li>
                            <i class="flaticon-calendar"></i>6 October 2021
                        </li>
                    </ul>
                    <h3>Cras Ultricies Ligula Sed Magna</h3>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod </p>
                    <div class="blog-btn">
                        <a href="#" class="blog-btn-one">Read More <i class="fa fa-arrow-right"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


<div class="partner-section">
    <div class="container">
        <div class="partner-slider owl-carousel owl-theme">
            <ul class="partner-item">
                <li>
                    <a href="#">
                        <img src="<?= base_url(); ?>/assets/user/img/partnar/1.png" alt="partner">
                    </a>
                </li>
            </ul>
            <ul class="partner-item">
                <li>
                    <a href="#">
                        <img src="<?= base_url(); ?>/assets/user/img/partnar/2.png" alt="partner">
                    </a>
                </li>
            </ul>
            <ul class="partner-item">
                <li>
                    <a href="#">
                        <img src="<?= base_url(); ?>/assets/user/img/partnar/3.png" alt="partner">
                    </a>
                </li>
            </ul>
            <ul class="partner-item">
                <li>
                    <a href="#">
                        <img src="<?= base_url(); ?>/assets/user/img/partnar/4.png" alt="partner">
                    </a>
                </li>
            </ul>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>