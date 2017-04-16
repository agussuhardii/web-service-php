//Save data Barang to local storage
$(document).ready(function () {
    barang = localStorage.getItem("barang");
    if (barang == null) {
        $.ajax({
            url: "../middleware/barang.json",//mengambil data file json
            success: function (data) {

                //atur variabel
                var value = JSON.stringify(data);
                var key = "barang";

                //meyimpan ke localstorage
                localStorage.setItem(key, value);
            }
        }).done(function () {
            getBarang = localStorage.getItem("barang");
            dataBarang(getBarang);
        })
    } else {
        //alert("stok masih ada");
        dataBarang(barang);
    }
});


//show data Barang from localStorage
function dataBarang(dBarang) {
    var hasilBarang = JSON.parse(dBarang);
    
    var i = 0; //untuk perulangan
    var tr; //untuk table
    var p = '"'; //tanda petik untuk String
    for (len = hasilBarang.length; i < len; i++) {
        //console.log(hasilBarang[i]);

        tr = $('<tr/>');
        tr.append("<td>" + hasilBarang[i].kode + "</td>");
        tr.append("<td>" + hasilBarang[i].nama + "</td>");
        tr.append("<td>" + hasilBarang[i].harga + "</td>");
        tr.append("<td>" + hasilBarang[i].jumlah + "</td>");
        tr.append("<td>" + hasilBarang[i].tglKadaluarsa + "</td>");
        tr.append("<td>" + hasilBarang[i].keterangan + "</td>");
        tr.append("<td><a onclick='barangUpdate("
            +p+hasilBarang[i].kode+p+","
            +p+hasilBarang[i].nama+p+","
            +p+hasilBarang[i].harga+p+","
            +p+hasilBarang[i].jumlah+p+","
            +p+hasilBarang[i].tglKadaluarsa+p+","
            +p+hasilBarang[i].keterangan+p
            +");' href='barang.update.php' class='btn-primary glyphicon glyphicon-edit btn btn-primary'></a> </td>");
        tr.append("<td><a onclick='return conf();' href='../middleware/barang.controller.php?aksi=Delete&kode=" + hasilBarang[i].kode + "'><i class='btn btn-danger glyphicon glyphicon-trash'></i></a> </td>");
        $('table').append(tr);
    }
}


//confirm delete messange
function conf() {
    var c = confirm("yakin ingin menghapus ??");
    if (c == false) {
        return false;
    } else {
        removeBarangFromLocalStorage();
        return true;
    }
}

//save object update to local storage
function barangUpdate(kode, nama, harga, jumlah, tglKadaluarsa, keterangan) {
    var objBarang = {"kode":kode,
        "nama":nama,
        "harga":harga,
        "jumlah":jumlah,
        "tglKadaluarsa":tglKadaluarsa,
        "keterangan":keterangan
    };

    //convert to Json
    var value = JSON.stringify(objBarang);
    //save to local storage
    localStorage.setItem("formBarangUpdateTemp", value);
}