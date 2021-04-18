(function ($) {
    'use strict';
    jQuery(document).on('ready', function () {
        jQuery(window).on('load', function () {
            jQuery(".preloader").fadeOut(500);
        });
        $(window).on('scroll', function () {
            if ($(this).scrollTop() > 150) {
                $('.navbar-area').addClass("is-sticky");
            } else {
                $('.navbar-area').removeClass("is-sticky");
            }
        });
        jQuery('.mean-menu').meanmenu({
            meanScreenWidth: "991"
        });
        $('.main-slider').owlCarousel({
            loop: true,
            nav: true,
            dots: false,
            autoplayHoverPause: true,
            autoplay: false,
            smartSpeed: 500,
            autoHeight: true,
            items: 1,
            navText: ["<i class='flaticon-left-arrow'></i>", "<i class='flaticon-right-arrow'></i>", ],
        });
        $(".main-slider").on("translate.owl.carousel", function () {
            $(".slider-content span").removeClass("animated fadeInUp").css("opacity", "0");
            $(".slider-content h1").removeClass("animated fadeInUp").css("opacity", "0");
            $(".slider-content p").removeClass("animated fadeInUp").css("opacity", "0");
            $(".slider-content span").removeClass("animated fadeInRight").css("opacity", "0");
        });
        $(".main-slider").on("translated.owl.carousel", function () {
            $(".slider-content span").addClass("animated fadeInUp").css("opacity", "1");
            $(".slider-content h1").addClass("animated fadeInUp").css("opacity", "1");
            $(".slider-content p").addClass("animated fadeInUp").css("opacity", "1");
            $(".slider-content span").addClass("animated fadeInRight").css("opacity", "1");
        });
        $('.room-slider').owlCarousel({
            loop: true,
            nav: true,
            items: 1,
            dots: false,
            autoplay: true,
            smartSpeed: 1000,
            autoplayHoverPause: true,
            navText: ["<i class='flaticon-left-arrow-key'></i>", "<i class='flaticon-keyboard-right-arrow-button'></i>", ],
            responsive: {
                0: {
                    items: 1
                },
                768: {
                    items: 2
                },
                1200: {
                    items: 3
                }
            },
        });
        $('.popup-youtube').magnificPopup({
            disableOn: 320,
            type: 'iframe',
            mainClass: 'mfp-fade',
            removalDelay: 160,
            preloader: false,
            fixedContentPos: false
        });
        $(document).ready(function () {
            $('#tabs li a').on('click', function (e) {
                $('#tabs li, #content .current').removeClass('current').removeClass('fadeInUp');
                $(this).parent().addClass('current');
                var currentTab = $(this).attr('href');
                $(currentTab).addClass('current fadeInUp');
                e.preventDefault();
            });
        });
        var $imagesSlider = $(".feedback-slides .client-feedback>div"),
            $thumbnailsSlider = $(".client-thumbnails>div");
        $imagesSlider.slick({
            speed: 300,
            slidesToShow: 1,
            slidesToScroll: 1,
            cssEase: 'linear',
            fade: true,
            autoplay: true,
            draggable: true,
            asNavFor: ".client-thumbnails>div",
            prevArrow: '.client-feedback .prev-arrow',
            nextArrow: '.client-feedback .next-arrow'
        });
        $thumbnailsSlider.slick({
            speed: 300,
            slidesToShow: 5,
            slidesToScroll: 1,
            cssEase: 'linear',
            autoplay: true,
            centerMode: true,
            draggable: false,
            focusOnSelect: true,
            asNavFor: ".feedback-slides .client-feedback>div",
            prevArrow: '.client-thumbnails .prev-arrow',
            nextArrow: '.client-thumbnails .next-arrow',
        });
        var $caption = $('.feedback-slides .caption');
        var captionText = $('.client-feedback .slick-current img').attr('alt');
        updateCaption(captionText);
        $imagesSlider.on('beforeChange', function (event, slick, currentSlide, nextSlide) {
            $caption.addClass('hide');
        });
        $imagesSlider.on('afterChange', function (event, slick, currentSlide, nextSlide) {
            captionText = $('.client-feedback .slick-current img').attr('alt');
            updateCaption(captionText);
        });

        function updateCaption(text) {
            if (text === '') {
                text = '&nbsp;';
            }
            $caption.html(text);
            $caption.removeClass('hide');
        }
        $('.partner-slider').owlCarousel({
            loop: true,
            autoplay: true,
            nav: false,
            margin: 30,
            mouseDrag: true,
            autoplayHoverPause: true,
            responsiveClass: true,
            dots: false,
            responsive: {
                0: {
                    items: 2,
                },
                768: {
                    items: 4,
                },
                1200: {
                    items: 4,
                }
            }
        })
        $('.counter').counterUp({
            delay: 20,
            time: 5000
        });
        $('.gallery-slider').owlCarousel({
            loop: true,
            nav: false,
            items: 1,
            dots: true,
            autoplay: false,
            smartSpeed: 1000,
            autoplayHoverPause: true,
            responsive: {
                0: {
                    items: 1
                },
                768: {
                    items: 2
                },
                1200: {
                    items: 3
                }
            },
        });
        $(function () {
            $("#datepicker, #check-datepicker").datepicker();
        });
        $('.image-slider').owlCarousel({
            loop: true,
            nav: true,
            items: 1,
            margin: 30,
            dots: false,
            autoplay: true,
            smartSpeed: 1000,
            autoplayHoverPause: true,
            navText: ["<i class='flaticon-left-arrow-key'></i>", "<i class='flaticon-keyboard-right-arrow-button'></i>", ],
            responsive: {
                0: {
                    items: 1
                },
                768: {
                    items: 2
                },
                1200: {
                    items: 1
                }
            },
        });
        jQuery(window).on('scroll', function () {
            if ($(this).scrollTop() > 800) {
                $('.back-to-top').addClass('show-back-to-top');
            } else {
                $('.back-to-top').removeClass('show-back-to-top');
            }
        });
        $('.back-to-top').on('click', function () {
            $("html, body").animate({
                scrollTop: "0"
            }, 500);
        });
        $('.blog-slider').owlCarousel({
            loop: true,
            nav: true,
            items: 1,
            margin: 30,
            dots: false,
            autoplay: true,
            smartSpeed: 1000,
            autoplayHoverPause: true,
            navText: ["<i class='flaticon-left-arrow-key'></i>", "<i class='flaticon-keyboard-right-arrow-button'></i>", ],
            responsive: {
                0: {
                    items: 1
                },
                768: {
                    items: 2
                },
                1200: {
                    items: 3
                }
            },
        });
        $('.popup-btn').magnificPopup({
            type: 'image',
            gallery: {
                enabled: true
            }
        });
        $('#Container').mixItUp();
        $(function () {
            $('.accordion').find('.accordion-title').on('click', function () {
                $(this).toggleClass('active');
                $(this).next().slideToggle('fast');
                $('.accordion-content').not($(this).next()).slideUp('fast');
                $('.accordion-title').not($(this)).removeClass('active');
            });
        });
        $('.popular-slider').owlCarousel({
            loop: true,
            nav: true,
            items: 1,
            dots: false,
            autoplay: true,
            smartSpeed: 1000,
            autoplayHoverPause: true,
            navText: ["<i class='fa fa-arrow-left'></i>", "<i class='fa fa-arrow-right'></i>", ],
            responsive: {
                0: {
                    items: 1
                },
                768: {
                    items: 2
                },
                1200: {
                    items: 3
                }
            },
        });
        $('.image-list').owlCarousel({
            loop: true,
            nav: false,
            items: 1,
            margin: 5,
            dots: false,
            autoplay: true,
            smartSpeed: 1000,
            autoplayHoverPause: true,
            responsive: {
                0: {
                    items: 6
                },
                768: {
                    items: 6
                },
                1200: {
                    items: 6
                }
            },
        });
        $('select').niceSelect();

        function makeTimer() {
            var endTime = new Date("September 30, 2021 17:00:00 PDT");
            var endTime = (Date.parse(endTime)) / 1000;
            var now = new Date();
            var now = (Date.parse(now) / 1000);
            var timeLeft = endTime - now;
            var days = Math.floor(timeLeft / 86400);
            var hours = Math.floor((timeLeft - (days * 86400)) / 3600);
            var minutes = Math.floor((timeLeft - (days * 86400) - (hours * 3600)) / 60);
            var seconds = Math.floor((timeLeft - (days * 86400) - (hours * 3600) - (minutes * 60)));
            if (hours < "10") {
                hours = "0" + hours;
            }
            if (minutes < "10") {
                minutes = "0" + minutes;
            }
            if (seconds < "10") {
                seconds = "0" + seconds;
            }
            $("#days").html(days + "<span>Days</span>");
            $("#hours").html(hours + "<span>Hours</span>");
            $("#minutes").html(minutes + "<span>Minutes</span>");
            $("#seconds").html(seconds + "<span>Seconds</span>");
        }
        setInterval(function () {
            makeTimer();
        }, 1000);
        $(".newsletter-form").validator().on("submit", function (event) {
            if (event.isDefaultPrevented()) {
                formErrorSub();
                submitMSGSub(false, "Please enter your email correctly.");
            } else {
                event.preventDefault();
            }
        });

        function callbackFunction(resp) {
            if (resp.result === "success") {
                formSuccessSub();
            } else {
                formErrorSub();
            }
        }

        function formSuccessSub() {
            $(".newsletter-form")[0].reset();
            submitMSGSub(true, "Thank you for subscribing!");
            setTimeout(function () {
                $("#validator-newsletter").addClass('hide');
            }, 4000)
        }

        function formErrorSub() {
            $(".newsletter-form").addClass("animated shake");
            setTimeout(function () {
                $(".newsletter-form").removeClass("animated shake");
            }, 1000)
        }

        function submitMSGSub(valid, msg) {
          if (valid) {
            var msgClasses = "validation-success";
          } else {
            var msgClasses = "validation-danger";
          }
          $("#validator-newsletter")
            .removeClass()
            .addClass(msgClasses)
            .text(msg);
        }
    });
})(jQuery);

 $(document).ready(function () {
   const success = $(".berhasil").data("berhasil");
   if (success) {
     Swal.fire({
       position: "center",
       icon: "success",
       text: success,
       showConfirmButton: true,
     });
   }
 });
 $(document).ready(function () {
   const gagal = $(".gagal").data("gagal");
   if (gagal) {
     Swal.fire({
       position: "center",
       icon: "error",
       text: "Opss.." + gagal,
       showConfirmButton: true,
     });
   }
 });

 $(document).ready(function () {
   if (".swal2-select") {
     setInterval(function () {
       $(".swal2-select").remove();
     }, 100);
   }
 });
 $(".tombol-reset").on("click", function (e) {
   e.preventDefault();
   const href = $(this).attr("href");
   Swal.fire({
     title: "Apakah Anda Yakin Ingin Mengkonfirmasi Ulang Pesanan?",
     text: "Pesanan Anda Akan Terhapus Sepenuhnya",
     icon: "warning",
     showCancelButton: true,
     confirmButtonColor: "#3085d6",
     cancelButtonColor: "#d33",
     confirmButtonText: "Yakin",
   }).then((result) => {
     if (result.value) {
       document.location.href = href;
     }
   });
 });