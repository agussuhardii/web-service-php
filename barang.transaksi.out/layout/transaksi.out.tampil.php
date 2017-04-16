<?php
/**
 * Created by IntelliJ IDEA.
 * User: Agus Suhardi
 * Date: 6/19/2016
 * Time: 21:46
 */
include_once "header.php";
?><p style="color: dodgerblue" id="transaksiSukses"></p>
    <script src="asset/transaksi.out.tampil.js"></script>

    <h3>Daftar Barang</h3>

    <div class="table-responsive">
    <table class="table table-condensed" >
        <thead>
        <th class="info">Kode</th>
        <th class="info">Nama</th>
        <th class="info" id="in">Lihat</th>
        </thead>
    </table>
        </div>




<!-- untuk menampilkan form dialog update pada clien -->
    <div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                            aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Barang Detail</h4>
                </div>

                <div class="form-group modal-header">
                    <label for="recipient-name" class="control-label">Kode</label>
                    <input type="text" class="form-control" id="kode" value="Kode" disabled>
                    <label for="recipient-name" class="control-label">Nama</label>
                    <input type="text" class="form-control" id="nama" value="Nama" disabled>
                    <label for="recipient-name" class="control-label">Harga</label>
                    <input type="text" class="form-control" id="harga" value="Harga" disabled>
                    <label for="recipient-name" class="control-label">Sisa</label>
                    <input type="text" class="form-control" id="jumlah" value="Jumlah" disabled>
                    <label for="recipient-name" class="control-label">Keterangan</label>
                    <input type="text" class="form-control" id="keterangan" value="Keterangan" disabled>
                </div>

                <div class="form-group modal-header">
                    <label for="recipient-name" class="control-label">Jumlah Pemesanan : </label>
                    <input type="number" id="jumlahPesan" value="0" onkeyup="getPes(this.value)"/>
                    <input type="hidden" id="totalJumlahPesanan"/>

                </div>
                <div class="modal-footer">
                    <a type="button" class="btn btn-primary" id="pesan" data-dismiss="modal" onclick="pesanBarang();"><i class="glyphicon glyphicon-shopping-cart"></i>
                    </a>
                </div>
                //agus.suhardii@gmail.com


            </div>
        </div>
    </div>


<?php
include_once "footer.php";
?>