<?= $this->extend("user/master/master"); ?>
<?= $this->section('main'); ?>
<section class="page-banner">
    <div class="container">
        <div class="page-banner-content">
            <h2>Contact Us</h2>
            <p><a href="index.html">Home</a> / Contact Us</p>
        </div>
    </div>
</section>


<section class="contact-info-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 col-md-6">
                <div class="contact-box">
                    <div class="icon">
                        <i class="flaticon-placeholder"></i>
                    </div>
                    <h4>Address</h4>
                    <p><a href="#">Exercisplan 4, 111 49 <br> Stockholm, Sweden</a></p>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="contact-box">
                    <div class="icon">
                        <i class="flaticon-call-answer"></i>
                    </div>
                    <h4>Phone</h4>
                    <p><a href="tel:444587458">+44 4587 458</a></p>
                    <p><a href="tel:444587458">+44 4587 458</a></p>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 offset-lg-0 offset-md-3">
                <div class="contact-box">
                    <div class="icon">
                        <i class="flaticon-envelope"></i>
                    </div>
                    <h4>Email</h4>
                    <p><a
                            href="https://templates.envytheme.com/cdn-cgi/l/email-protection#224b4c444d624d544750564d0c414d4f"><span
                                class="__cf_email__"
                                data-cfemail="01686f676e416e776473756e2f626e6c">[email&#160;protected]</span></a>
                    </p>
                    <p><a
                            href="https://templates.envytheme.com/cdn-cgi/l/email-protection#ee9d9b9e9e819c9aae81988b9c9a81c08d8183"><span
                                class="__cf_email__"
                                data-cfemail="7c0f090c0c130e083c130a190e0813521f1311">[email&#160;protected]</span></a>
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>


<div class="contact-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <div class="map-area">
                    <iframe
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d387190.2799090714!2d-74.25987368715496!3d40.697670064588735!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89c24fa5d33f083b%3A0xc80b8f06e177fe62!2sNew%20York%2C%20NY%2C%20USA!5e0!3m2!1sen!2sbd!4v1570689677254!5m2!1sen!2sbd"></iframe>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="contact-area">
                    <div class="contactForm">
                        <form id="contactForm">
                            <div class="row">
                                <div class="col-lg-6 col-sm-6">
                                    <div class="form-group">
                                        <input type="text" name="name" id="name" class="form-control" required
                                            data-error="Please enter your name" placeholder="Your Name">
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-sm-6">
                                    <div class="form-group">
                                        <input type="email" name="email" id="email" class="form-control" required
                                            data-error="Please enter your email" placeholder="Your Email">
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-sm-6">
                                    <div class="form-group">
                                        <input type="text" name="phone_number" id="phone_number" required
                                            data-error="Please enter your number" class="form-control"
                                            placeholder="Your Phone">
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-sm-6">
                                    <div class="form-group">
                                        <input type="text" name="msg_subject" id="msg_subject" class="form-control"
                                            required data-error="Please enter your subject" placeholder="Your Subject">
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
                                <div class="col-lg-12 col-md-12">
                                    <div class="form-group">
                                        <textarea name="message" class="form-control" id="message" cols="30" rows="5"
                                            required data-error="Write your message"
                                            placeholder="Your Message"></textarea>
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
                                <div class="col-lg-12 col-md-12">
                                    <div class="send-btn">
                                        <button type="submit" class="send-btn-one">
                                            Send Message
                                        </button>
                                    </div>
                                    <div id="msgSubmit" class="h3 text-center hidden"></div>
                                    <div class="clearfix"></div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>