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

<script src="<?= base_url(); ?>/assets/user/js/form-validator.min.js"></script>

<script src="<?= base_url(); ?>/assets/user/js/sweetalert2.js"></script>

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
const hitungLama = () => {
    let checkIn = document.querySelector('#checkIn');
    let checkOut = document.querySelector('#checkOut');
    const hari = document.querySelector('#lama_hari');
    const totalBayar = document.querySelector('#total_bayar');
    let kode_unik = document.querySelector('#kode_unik');
    if (checkIn.value != "" && checkOut.value != "") {
        let oneDay = 24 * 60 * 60 * 1000; // hours*minutes*seconds*milliseconds
        let firstDate = new Date(checkIn.value);
        let secondDate = new Date(checkOut.value);
        let tglPertama = Date.parse(firstDate);
        let tglKedua = Date.parse(secondDate);
        let selisih = (tglKedua - tglPertama) / oneDay;
        if (selisih < 0) {
            hari.value = "Lama Hari Error";
            kode_unik.value = "Tanggal Check In Tidak Dapat Lebih Besar Dari Check Out";
            totalBayar.value = "Tanggal Check In Tidak Dapat Lebih Besar Dari Check Out";
            document.querySelector('#button_pesanan').setAttribute("disabled", true);
            checkIn.classList.add('is-invalid');
            checkOut.classList.add('is-invalid');
        } else {
            let subTotal = document.querySelector("#subTotal").value;
            let valKode = Math.floor(Math.random() * 800) + 100;
            let total_val = document.querySelector('#total_value');
            total = parseInt(subTotal * selisih +
                valKode);
            if (subTotal != "") {
                hari.value = "x " + selisih + " Hari (Lama Menginap)";
                kode_unik.value = "Kode Unik =" + valKode;
                total_val.value = total;
                totalBayar.value = "Total Wajib Bayar = Rp." + total;
                checkIn.classList.remove('is-invalid');
                checkOut.classList.remove('is-invalid');
                document.querySelector('#button_pesanan').removeAttribute("disabled");
            }
        }
    }

}
</script>