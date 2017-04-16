<?php
/**
 * Created by IntelliJ IDEA.
 * User: Agus Suhardi
 * Date: 6/18/2016
 * Time: 23:22
 */
include_once "header.php";

$ipAddres = getHostByName(getHostName());
?>
<script src="asset/web.service.js"></script>
<div id="services">
    <h3>Untuk mendapatkan layanan web service</h3>
    <ol>
        <li>Masukan ip : <b><?php echo $ipAddres; ?></b></li>
        <li>Akses <b>barang/middleware/barang.clien.php</b> untuk mendapatkan data barang</li>
        <li>Akses <b>barang/middleware/barang.controller.php</b> untuk transaksi, dan parameter sebagai berikut</li>
        <ul>
            <li>aksi = "getBarangbyKodeClien"</li>
            <li>kode = kode barang yang valid</li>
        </ul>
    </ol>


    <br/>
    <br/>
    <br/>
    <h3>Jika belum memiliki Aplikasi Clien</h3>
    <ol>
        <li><a href="../files/Client.7z">Download Clien</a></li>
        <li>Masukan ip : <b><?php echo $ipAddres; ?></b> pada <b>barang.transaksi.out\layout\asset\server.services.js</b></li>
    </ol>
</div>


<?php
include_once "footer.php";
?>
