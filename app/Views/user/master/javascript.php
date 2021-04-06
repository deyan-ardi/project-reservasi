<script src="<?= base_url(); ?>/assets/user/js/jquery-3.2.1.slim.min.js"></script>

<script src="<?= base_url(); ?>/assets/user/js/popper.min.js"></script>

<script src="<?= base_url(); ?>/assets/user/js/bootstrap.min.js"></script>

<script src="<?= base_url(); ?>/assets/user/js/jquery-ui.min.js"></script>

<script src="<?= base_url(); ?>/assets/user/js/slick.min.js"></script>

<script src="<?= base_url(); ?>/assets/user/js/jquery.meanmenu.js"></script>

<script src="<?= base_url(); ?>/assets/user/js/jquery.magnific-popup.min.js"></script>

<script src="<?= base_url(); ?>/assets/user/js/jquery.mixitup.min.js"></script>

<script src="<?= base_url(); ?>/assets/user/js/owl.carousel.min.js"></script>

<script src="<?= base_url(); ?>/assets/user/js/jquery.nice-select.min.js"></script>

<script src="<?= base_url(); ?>/assets/user/js/jquery.counterup.min.js"></script>

<script src="<?= base_url(); ?>/assets/user/js/waypoints.min.js"></script>

<script src="<?= base_url(); ?>/assets/user/js/jquery.ajaxchimp.min.js"></script>

<script src="<?= base_url(); ?>/assets/user/js/form-validator.min.js"></script>

<script src="<?= base_url(); ?>/assets/user/js/contact-form-script.js"></script>

<script src="<?= base_url(); ?>/assets/user/js/active.js"></script>
<script>
const previewImg = () => {
    const file = document.getElementById('file');
    const imgPreview = document.querySelector('.img-preview');

    const fileSampul = new FileReader();
    fileSampul.readAsDataURL(file.files[0]);
    fileSampul.onload = function(e) {
        imgPreview.src = e.target.result;
    }
}
</script>