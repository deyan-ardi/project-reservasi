<?php
header("Content-type: application/octet-stream");
// header("Content-type: application/vnd.ms-excel");
header("Content-Disposition: attachment; filename=$name.xls");
header("Pragma: no-cache");
header("Expires: 0");
?>
<center>
    <h2>Data Laporan Reservasi <br><span style="color:darkcyan"> Sistem Reservasi Penginapan</span></h2>
    <hr style="height:2px;border-width:5;color:gray;background-color:black">
</center>
<div style="text-align: justify;">
    <?php
    $string = "012345678BCDFGHJKLMNPQRSTVWXYZ";
    $kode = substr(str_shuffle($string), 0, 12);
    ?>
    <h5>Kode Cetak : #<?= $kode ?> </h5>
    <?php if ($status == 1) : ?>
    <h5>Sortir : Manual</h5>
    <?php else : ?>
    <h5>Sortir : Semua Laporan</h5>
    <?php endif; ?>
</div>
<table border="1" cellspacing="0" cellpadding="5" width="100%">
    <thead>
        <tr style="font-size: 24px; background-color:darkcyan; color:white;">
            <th style="vertical-align: middle;">
                <center>#</center>
            </th>
            <th style="vertical-align: middle;">
                <center>Kode Pesanan</center>
            </th>
            <th style="vertical-align: middle;">
                <center>Nama Pemesan</center>
            </th>
            <th style="vertical-align: middle;">
                <center>Tamu Dewasa</center>
            </th>
            <th style="vertical-align: middle;">
                <center>Tamu Anak-Anak</center>
            </th>
            <th style="vertical-align: middle;">
                <center>Check In</center>
            </th>
            <th style="vertical-align: middle;">
                <center>Check Out</center>
            </th>
            <th style="vertical-align: middle;">
                <center>Tanggal Bayar</center>
            </th>
            <th style="vertical-align: middle;">
                <center>Tanggal Pesanan</center>
            </th>
            <th style="vertical-align: middle;">
                <center>Total Bayar</center>
            </th>
    </thead>
    <tbody>

        <?php
        $i = 1;
        foreach ($laporan as $d) : ?>
        <tr style="text-align:justify; font-size:16px;">
            <td><?= $i++ ?></td>
            <td><?= $d['kode_pesanan'] ?></td>
            <td><?= $d['nama_pemesan'] ?></td>
            <td><?= $d['tamu_dewasa'] ?> Orang</td>
            <td><?= $d['tamu_anak'] ?> Orang</td>
            <td><?= $d['check_in'] ?></td>
            <td><?= $d['check_out'] ?></td>
            <td><?= $d['pay_date'] ?></td>
            <td><?= $d['created_at'] ?></td>
            <td><?= $d['total_bayar'] ?></td>
        </tr>
        <?php endforeach ?>
    </tbody>
</table>
<br>
<br>
<br>
<div class="footer" style="text-align: justify;">
    <h5>Singaraja, <?= date('d F Y') ?></h5>
    <h5>Dicetak Oleh,</h5>
    <br>
    <br>
    <br>
    <h5>(<?= ucfirst(user()->username) ?>)</h5>
</div>