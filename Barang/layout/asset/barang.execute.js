//if document ready__________________________________________________________________________________
$(document).ready(function(){



    formValid();


    getLocalStorageToNewBarang();
    //get user akses from local storage
    loginUser = localStorage.getItem("userName");
    loginPass = localStorage.getItem("password");

    $('#barangForm').submit(function (e) {
        if (loginUser == null && loginPass == null) {
            formInputBarangTemp();
            alert("login dulu!!!");
            e.preventDefault();
        } else {
            removeBarangFromLocalStorage();
        }
    })
});

//function save barang form value to local storage__if never login_________________________________________________________
function formInputBarangTemp() {
    //get input form
    kode = $('#kode').val();
    nama = $('#nama').val();
    harga = $('#harga').val().replace(".", "");
    jumlah = $('#jumlah').val();
    tglKadaluarsa = $('#tglKadaluarsa').val();
    keterangan = $('#keterangan').val();

    var formDataBarangTemp = {
        "kode": kode,
        "nama": nama,
        "harga": harga,
        "jumlah": jumlah,
        "tglKadaluarsa": tglKadaluarsa,
        "keterangan": keterangan
    };

    //conver to json object
    var value = JSON.stringify(formDataBarangTemp);
    //save to local storage
    localStorage.setItem("formInputBarangTemp", value);
}

//function formInputBarangTemp from local storage____________________________________________________________________
function getLocalStorageToNewBarang() {

    var objBarang = localStorage.getItem("formInputBarangTemp");
    var barangParse = JSON.parse(objBarang);

    if (barangParse != null) {

        //set input form
        $('#kode').val(barangParse.kode);
        $('#nama').val(barangParse.nama);
        $('#harga').val(barangParse.harga);
        $('#jumlah').val(barangParse.jumlah);
        $('#tglKadaluarsa').val(barangParse.tglKadaluarsa);
        $('#keterangan').val(barangParse.keterangan);

    }
}

//validasi kode
function getKodeBarang(kode) {
    $.ajax({
        url: "../middleware/barang.controller.php",
        data:{"kode":kode, "aksi":"Valid"},
        dataType:"json",
        success:function (result) {
            data = JSON.stringify(result);
            //remove array / convert to single object
            strDataI = data.replace("[", "");
            strDataO = strDataI.replace("]", "");

            //convert to json
            if(data != "[]") {
                dataResult = JSON.parse(strDataO);

                //console.log(dataResult)


                if (dataResult.kode == kode) {
                    c = confirm("Kode Barang sudah ada, Apaka anda ingin mengubahnya?");
                    if(c == true){
                        dataUp = JSON.stringify(dataResult);
                        localStorage.setItem("formBarangUpdateTemp", dataUp);
                        window.location.replace("barang.update.php");
                        return true
                    }else if (c == false){
                        return false;
                    }
                }
            }
        }
    })
}

//validasi form jumlah kurang dari 0
function validMin(jumlah) {
    if (jumlah<0){
        alert("Input salah");
    }
}





function formValid() {


    $("#barangForm").validate({
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


//validasi tanggal
function validTanggalKadaluarsa(selectedDate) {
    date = new Date();
        tgl = date.getDate();
        bln = date.getMonth()+1;
        thn = date.getFullYear();

    if (bln == "1"){
        bln="01";
    }else if (bln=="2"){
        bln="02";
    }else if (bln=="3"){
        bln="03";
    }else if (bln=="4"){
        bln="04";
    }else if (bln=="5"){
        bln="05";
    }else if (bln=="6"){
        bln="06";
    }else if (bln=="7"){
        bln="07";
    }else if (bln=="8"){
        bln="08";
    }else if (bln=="9"){
        bln="09";
    }
    skrg = thn+"-"+bln+"-"+tgl;


    pilihan = selectedDate.valueOf(Date.UTC);
    sekarang = skrg.valueOf(Date.UTC);


    //console.log(pilihan);
    //console.log(sekarang);


    if(pilihan<=sekarang){
        alert("Tanggal yang di masukan salah")
        $('#tglKadaluarsa').val(null);
    }
}



function hilangkanDot(nilai) {
    a = nilai.replace(".","");
    $('#harga').val(a);
}
