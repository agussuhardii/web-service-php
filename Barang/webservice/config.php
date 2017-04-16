<?php
include "config.dns.php";
/**
 * Created by IntelliJ IDEA.
 * User: Agus Suhardi
 * Date: 5/26/2016
 * Time: 00:20
 */

class Koneksi extends dns{

    protected $dbName = "db_barang";
    protected $userName = "root";
    protected $password = "";

    function __construct() {
        try{

            parent::__construct("$this->db:host=$this->hostName;dbname=$this->dbName", $this->userName, $this->password);
            //echo "Koneksi DB Sukses";
        } catch (Exception $ex) {
            //echo 'Koneksi bermasalah : '.$ex->getMessage();
            echo "sistem dalam perbaikan, coba beberapa saat lagi";
            die();
        }
    }

}