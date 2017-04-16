<?php
/**
 * Created by IntelliJ IDEA.
 * User: Agus Suhardi
 * Date: 6/18/2016
 * Time: 12:44
 */
include_once "header.php";
?>
<script src="asset/barang.tampil.js" ;></script>

<h3>Daftar Barang</h3>

<table class="table table-striped">
    <thead class="bg-info">
        <th>Kode</th>
        <th>Nama</th>
        <th>Harga</th>
        <th>Jumlah</th>
        <th>Tanggal Kadaluarsa</th>
        <th>Keterangan</th>
        <th>Update</th>
        <th>Delete</th>
    </thead>
</table>
<a href="barang.tambah.php" class="btn btn-primary glyphicon glyphicon-plus"></a>




<?php
include_once "footer.php";
?>
