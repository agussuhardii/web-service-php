$(document).ready(function () {

    $.ajax({
        url: barangClienObject,
        success: function (data) {
            var value = JSON.stringify(data);
            //console.log(value);
            localStorage.setItem("transaksi.service", value);
        }
    }).done(function (result) {
        var transaksiService = localStorage.getItem("transaksi.service");
        dataTransaksiService(transaksiService);
    })


});


//show data transaksiOut from localStorage
function dataTransaksiService(dTransaksi) {
    var transaksiService = JSON.parse(dTransaksi);

    var i = 0; //untuk perulangan
    var tr; //untuk table
    var p = '"';
    for (len = transaksiService.length; i < len; i++) {

        tr = $('<tr/>');
        tr.append("<td>" + transaksiService[i].kode + "</td>");
        tr.append("<td>" + transaksiService[i].nama + "</td>");
        tr.append("<td> <a href='#' onclick='lihat(" + p + transaksiService[i].kode + p + ")' class='bg-success``' data-toggle='modal' data-target='.bs-example-modal-lg' ><i class='glyphicon glyphicon-list-alt' ></i></a> </td>");
        $('table').append(tr);
    }
}


//show detail barang from server service
function lihat(kode) {
    var userName = localStorage.getItem("userName");
    if (userName == null) {
        alert("Login Dulu");
        window.location.replace("index.php");
    }

    $.ajax({
        url: getBarangObjectServices,
        data: {"aksi": "getBarangbyKodeClien", "kode": kode},
        dataType: "JSON",
        success: function (result) {
            data = JSON.stringify(result);
            //remove array / convert to single object
            strDataI = data.replace("[", "");
            strDataO = strDataI.replace("]", "");

            //convert to json
            dataResult = JSON.parse(strDataO);
            //send to form modal
            showDetailToModal(dataResult);

        }
    })
}


function showDetailToModal(data) {
    $('#kode').val(data.kode);
    $('#nama').val(data.nama);
    $('#harga').val(data.harga);
    $('#jumlah').val(data.jumlah);
    $('#keterangan').val(data.keterangan);
}

//Aksi Transaksi
function pesanBarang() {
    var kode = $('#kode').val();
    var jmlBarang = $('#jumlah').val();
    var psnBarang = $('#totalJumlahPesanan').val();//$('#jumlahPesan').val();
        



    if (jmlBarang <= psnBarang) {
        alert("jumlah barang tidak cukup");
        $('#transaksiSukses').html("Transaksi Gagal");
    } else{
        var countRequest = jmlBarang - psnBarang;
        pesan(kode, countRequest);
        $('#transaksiSukses').html("Transaksi Sukses");

    }
}



//get barang count to shoping
function pesan(kode, countRequest) {
    $.ajax({
        url: getBarangObjectServices,
        data: {"aksi": "updateJumlahByClien", "kode": kode, "jumlah": countRequest},
        success: function (result) {
            $('#jumlahPesan').val(0);
        }
    })

}




/*

function showDetailToModal(data) {
    $('#kode').val(data.kode);
    $('#nama').val(data.nama);
    $('#harga').val(data.harga);
    $('#jumlah').val(data.jumlah);
    $('#keterangan').val(data.keterangan);


    $(document).ready(function () {
        var jumlahPesan = $('#jumlahPesan').val();
        var jumlahStok = data.jumlah;
        var kode = data.kode;
        $('#jumlahPesan').val(0);

        $('#jumlahPesan').change(function () {
            jumlahPesan = $('#jumlahPesan').val();

            if (jumlahPesan > jumlahStok) {
                alert("Sisa Barang tidak cukup");
            } else {
                $('#pesan').click(function () {
                    var sisaBarang = jumlahStok - jumlahPesan;
                    pesan(kode, sisaBarang);

                })
            }
        })
    })


}


*/

function getPes(e) {
    $('#totalJumlahPesanan').val(e);
    console.log(e);
}