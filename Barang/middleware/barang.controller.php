<?php
include '../webservice/barang.dao.class.php';

$aksi = $_GET['aksi'];
$data = new BarangDao();

//save to barang___________________________________________________________________________________________________1_
if ($aksi == 'Simpan') {
    $kode = $_GET['kode'];
    $nama = $_GET['nama'];
    $harga = $_GET['harga'];
    $jumlah = $_GET['jumlah'];
    $tglKadaluarsa = $_GET['tglKadaluarsa'];
    $keterangan = $_GET['keterangan'];

    $data->insertBarang($kode, $nama, $harga, $jumlah, $tglKadaluarsa, $keterangan);
    header("Location: ../layout/barang.tampil.php");

//update to barang________________________________________________________________________________________________2__
} elseif ($aksi == 'Ubah') {
    $kode = $_GET['kode'];
    $nama = $_GET['nama'];
    $harga = $_GET['harga'];
    $jumlah = $_GET['jumlah'];
    $tglKadaluarsa = $_GET['tglKadaluarsa'];
    $keterangan = $_GET['keterangan'];

    $data->updateBarang($kode, $nama, $harga, $jumlah, $tglKadaluarsa, $keterangan);
    header("Location: ../layout/barang.tampil.php");

//delete from barang______________________________________________________________________________________________3__
} elseif ($aksi == 'Delete') {
    $kode = $_GET['kode'];
    $data->deleteBarang($kode);
    header("Location: ../layout/barang.tampil.php");

//_menyimpan file json ke barang.json________________________________________________________________________4___save
//get kode Barang__________________________________________________________________________________________________5_
} elseif ($aksi == "Valid") {
    $kode = $_GET['kode'];
    $data->getKode($kode);
}

//Clien Acces//////////////////////////////////////////////////////////////////////////////////////////

//save to json to barang.clien.php_____________________________________________________________________________6__save

//full request clien by kode_______________________________________________________________________________7
elseif ($aksi == "getBarangbyKodeClien") {
    $kode = $_GET['kode'];
    $data->getBarangbyKodeClien($kode);


    //update jumlah barang by Clien_________________________________________________________________________8
} elseif ($aksi == "updateJumlahByClien") {
    $kode = $_GET['kode'];
    $jumlah = $_GET['jumlah'];
    $data->updateJumlahByClien($kode, $jumlah);
}