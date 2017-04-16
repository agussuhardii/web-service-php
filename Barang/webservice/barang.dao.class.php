<?php
define("PATH_ROOT", dirname(__DIR__));
include_once PATH_ROOT . "/webservice/config.php";

class BarangDao extends Koneksi
{

    //save to barang___________________________________________________________________________________________________1_
    public function insertBarang($kode, $nama, $harga, $jumlah, $tglKadaluarsa, $keterangan)
    {
        $sqlQuery = "insert into barang values('"
            . $kode . "','"
            . $nama . "','"
            . $harga . "','"
            . $jumlah . "','"
            . $tglKadaluarsa . "','"
            . $keterangan . "'"
            . ")";
        try {
            $prepare = parent::prepare($sqlQuery);
            $prepare->execute();
            $this->saveJson();
            $this->saveJsonPhpClien();
        } catch (Exception $ex) {
            //echo 'Error : ' . $ex->getMessage();
            echo "sistem dalam perbaikan, coba beberapa saat lagi";
        }
    }

    //update to barang________________________________________________________________________________________________2__
    public function updateBarang($kode, $nama, $harga, $jumlah, $tglKadaluarsa, $keterangan)
    {
        $sqlQuery = "update barang set 
            nama = '" . $nama . "',
            harga = '" . $harga . "',
            jumlah = '" . $jumlah . "',
            tglKadaluarsa = '" . $tglKadaluarsa . "',
            keterangan = '" . $keterangan . "'
            where kode = '" . $kode . "'";
        try {
            $prepare = parent::prepare($sqlQuery);
            $prepare->execute();
            $this->saveJson();
            $this->saveJsonPhpClien();
        } catch (Exception $ex) {
            //echo 'Error : ' . $ex->getMessage();
            echo "sistem dalam perbaikan, coba beberapa saat lagi";
        }
    }

    //delete from barang______________________________________________________________________________________________3__
    public function deleteBarang($kode)
    {
        $sqlQuery = "delete from barang where kode = '" . $kode . "'";
        try {
            $prepare = parent::prepare($sqlQuery);
            $prepare->execute();
            $this->saveJson();
            $this->saveJsonPhpClien();
        } catch (Exception $ex) {
            //echo 'Error : ' . $ex->getMessage();
            echo "sistem dalam perbaikan, coba beberapa saat lagi";
        }
    }

    //menyimpan file json ke barang.json______________________________________________________________________________4__
    public function saveJson()
    {
        $myFile = "barang.json";
        $sqlQuery = "select * from barang";
        $json = null;
        try {
            $prepare = parent::prepare($sqlQuery);
            $prepare->execute();
            $result = $prepare->fetchAll(PDO::FETCH_ASSOC);

            $json = json_encode($result);
            //print_r($json);
        } catch (Exception $ex) {
            //echo 'Error : ' . $ex->getMessage();
            echo "sistem dalam perbaikan, coba beberapa saat lagi";
        }
        return file_put_contents($myFile, $json);
    }


    //get kode Barang__________________________________________________________________________________________________5_
    public function getKode($kode)
    {
        $sqlQuery = "select * from barang WHERE kode='" . $kode . "'";
        try {
            $prepare = parent::prepare($sqlQuery);
            $prepare->execute();
            $result = $prepare->fetchAll(PDO::FETCH_ASSOC);

            $json = json_encode($result);
            echo $json;
        } catch (Exception $ex) {
            //echo 'Error : ' . $ex->getMessage();
            echo "sistem dalam perbaikan, coba beberapa saat lagi";
        }
    }






    //Clien Acces//////////////////////////////////////////////////////////////////////////////////////////

    //save to json to barang.clien.php_____________________________________________________________________________6
    public function saveJsonPhpClien()
    {
        $openTag = "<?php";
        $header = 'header("access-control-allow-origin: *");';
        $dataType = 'header("content-type: application/json; charset=utf-8");';
        $json = null;
        $closeTag = "?>";
        $newLine = "\n";

        $myFile = "barang.clien.php";
        $sqlQuery = "SELECT kode, nama FROM barang";
        try {
            $prepare = parent::prepare($sqlQuery);
            $prepare->execute();
            $result = $prepare->fetchAll(PDO::FETCH_ASSOC);

            $json = json_encode($result);
            //print_r($json);
        } catch (Exception $ex) {
            echo 'Error : ' . $ex->getMessage();
        }
        $dataSave =
            $openTag . $newLine .
            $header . $newLine .
            $dataType . $newLine .
            "echo '" . $json . "';" .
            $newLine . $closeTag;
        return file_put_contents($myFile, $dataSave);
    }




    //full request clien by kode_______________________________________________________________________________7
    public function getBarangbyKodeClien($kode)
    {
        $header = "access-control-allow-origin: *";
        $dataType = "content-type: application/json";

        $sqlQuery = "select * from barang WHERE kode = '" . $kode . "'";

        try {
            $prepare = parent::prepare($sqlQuery);
            $prepare->execute();
            $result = $prepare->fetchAll(PDO::FETCH_ASSOC);

            $json = json_encode($result);
            $data = print_r($json);

            return $header. $data. $data;
        } catch (Exception $ex) {
            //echo "Mohon Maaf!!, cobalah beberapa saat lagi";
            echo "sistem dalam perbaikan, coba beberapa saat lagi";
        }
    }

    //update jumlah barang by Clien_________________________________________________________________________8
    public function updateJumlahByClien($kode, $jumlah)
    {

        $sqlQuery = "update barang set jumlah = " . $jumlah . " where kode = '" . $kode . "' ";
        try {
            $prepare = parent::prepare($sqlQuery);
            $prepare->execute();
            $this->saveJson();
            $this->saveJsonPhpClien();
        } catch (Exception $ex) {
            //echo 'Error : ' . $ex->getMessage();
            echo "sistem dalam perbaikan, coba beberapa saat lagi";
        }
    }
}