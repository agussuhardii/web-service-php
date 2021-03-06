<?php
/**
 * Created by IntelliJ IDEA.
 * User: Agus Suhardi
 * Date: 6/18/2016
 * Time: 18:31
 */
include_once "header.php";
?>
<script src="asset/barang.update.js"></script>
<script type="text/javascript">
    jQuery(function ($) {
        $('#harga1').mask('000.000.000.000', {reverse: true});
    });
</script>

<h3>Form barang</h3>
<form action="../middleware/barang.controller.php" method="get" id="barangFormUpdate" class="form-group">
    <input placeholder="kode" type="text" name="kode" required minlength="10" maxlength="10" id="kode" onkeyup="getKodeBarang(this.value)" class="form-control" />
    <input placeholder="nama" type="text" name="nama"  required minlength="2" maxlength="50" id="nama" class="form-control"/>
    <input placeholder="harga" name="harga1" id="harga1" required class="form-control" minlength="6" onkeyup="hilangkanDot(this.value);"/>
    <input type="hidden" name="harga" id="harga"/>
    <input placeholder="jumlah" type="number" name="jumlah" required minlength="1" maxlength="3" id="jumlah" class="form-control" onchange="validMin(this.value);" />
    <input placeholder="tanggal Kadaluarsa" type="date" required name="tglKadaluarsa"  id="tglKadaluarsa" class="form-control" onchange="validTanggalKadaluarsa(this.value);"/>
    <textarea placeholder="keterangan" name="keterangan"  required minlength="10" id="keterangan" class="form-control"></textarea>
    <br />
    <input type="submit" value="Ubah" name="aksi" />
</form>


<?php
include_once "footer.php";
?>
