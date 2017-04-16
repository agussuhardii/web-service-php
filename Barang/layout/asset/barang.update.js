//isi Form Update
$(document).ready(function () {

    formValid();
    //get Item from local Storage
    var objBarangUpdate = localStorage.getItem("formBarangUpdateTemp");

    //parse Object
    var barangParse = JSON.parse(objBarangUpdate);

    //send to form Update(barang.update.php)
    $('#kode').val(barangParse.kode);
    $('#nama').val(barangParse.nama);
    $('#harga1').val(barangParse.harga);
    $('#harga').val(barangParse.harga);
    $('#jumlah').val(barangParse.jumlah);
    $('#tglKadaluarsa').val(barangParse.tglKadaluarsa);
    $('#keterangan').val(barangParse.keterangan);

    //get user akses from local storage
    loginUser = localStorage.getItem("userName");
    loginPass = localStorage.getItem("password");

    $('#barangFormUpdate').submit(function (e) {
        if (loginUser == null && loginPass == null) {
            alert("login dulu!!!");
            e.preventDefault();
        } else {
            removeBarangFromLocalStorage();
        }
    })
});


function formValid() {


    $("#barangFormUpdate").validate({
        messages: {
            kode: {
                required: 'Kode Barang harus di isi',
                minlength: "Gunakan minimal 10 karakter"
            },
            nama: {
                required: 'Nama tidak boleh kosong',
                minlength: "Gunakan minimal 2 karaakter"
            },
            harga1: {
                required: 'Harga harus di isi',
                minlength: "Harga Salah",
                maxlength: "Harga Salah"
            },
            jumlah: {
                required: 'Jumlah harus isi',
                minlength: "Jumlah Salah"
            },
            tglKadaluarsa: {
                required: 'Tanggal kadaluarsa harus ada'
            },
            keterangan: {
                required: 'Keterangan harus ada',
                minlength: "Minimal keterangan 10 karakter"
            }
        }
    });
}



function hilangkanDot(nilai) {
    a = nilai.replace(".","");
    $('#harga').val(a);
}

//validasi form jumlah kurang dari 0
function validMin(jumlah) {
    if (jumlah<0){
        alert("Input salah");
    }
}