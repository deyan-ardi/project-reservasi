/**
 * Elektron - An Admin Toolkit
 * @version 0.3.1
 * @license MIT
 * @link https://github.com/onokumus/elektron#readme
 */
'use strict';

/* eslint-disable no-undef */
$(function () {
	if ($(window).width() < 992) {
		$('#app-side').onoffcanvas('hide');
	} else {
		$('#app-side').onoffcanvas('show');
	}

	$('.side-nav .unifyMenu').unifyMenu({ toggle: true });

	$('#app-side-hoverable-toggler').on('click', function () {
		$('.app-side').toggleClass('is-hoverable');
		$(undefined).children('i.fa').toggleClass('fa-angle-right fa-angle-left');
	});

	$('#app-side-mini-toggler').on('click', function () {
		$('.app-side').toggleClass('is-mini');
		$("#app-side-mini-toggler i").toggleClass('icon-sort icon-menu5');
	});

	$('#onoffcanvas-nav').on('click', function () {
		$('.app-side').toggleClass('left-toggle');
		$('.app-main').toggleClass('left-toggle');
		$("#onoffcanvas-nav i").toggleClass('icon-sort icon-menu5');
	});
	
	$('.onoffcanvas-toggler').on('click', function () {
		$(".onoffcanvas-toggler i").toggleClass('icon-chevron-thin-left icon-chevron-thin-right');
	});
});


// $(function() {
// 	$('#unifyMenu')
// 	.unifyMenu()
// 	.on('shown.unifyMenu', function(event) {
// 			$('body, html').animate({
// 					scrollTop: $(event.target).parent('li').position().top
// 			}, 600);
// 	});
// });

// Bootstrap Tooltip
$(function () {
	$('[data-toggle="tooltip"]').tooltip()
})


// Bootstrap Popover
$(function () {
	$('[data-toggle="popover"]').popover()
})
$('.popover-dismiss').popover({
	trigger: 'focus'
})


// Todays Date
$(function() {
	var interval = setInterval(function() {
		var momentNow = moment();
		$('#today-date').html(momentNow.format('MMMM . DD') + ' '
		+ momentNow.format('. dddd').substring(0,5).toUpperCase());
	}, 100);
});


// Task list
$('.task-list').on('click', 'li.list', function() {
	$(this).toggleClass('completed');
});


// Loading
$(function() {
	$("#loading-wrapper").fadeOut(5000);
});

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

 $(".tombol-hapus").on("click", function (e) {
   e.preventDefault();
   const href = $(this).attr("href");
   Swal.fire({
     title: "Apakah Anda Yakin Ingin Menghapus?",
     text:
       "Semua file yang berkaitan dengan data ini akan terhapus secara permanen",
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