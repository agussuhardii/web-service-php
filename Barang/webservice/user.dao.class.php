<?php
define("PATH_ROOT", dirname(__DIR__));
include_once PATH_ROOT . "/webservice/config.php";

class UserDao extends Koneksi
{

    public function saveUser($userName, $password)
    {
        $sqlQuery = "insert into user values('"
            . $userName . "','"
            . $password . "'"
            . ")";
        try {
            $prepare = parent::prepare($sqlQuery);
            $prepare->execute();
            echo 'Sukses...';
        } catch (Exception $ex) {
            echo 'Error : ' . $ex->getMessage();
        }
    }

    public function updateUserPassword($userName, $password)
    {
        $sqlQuery = "update user set 
            password = '" . $password . "',
            where user_name = '" . $userName . "'";
        try {
            $prepare = parent::prepare($sqlQuery);
            $prepare->execute();
            echo 'Sukses...';
        } catch (Exception $ex) {
            echo 'Error : ' . $ex->getMessage();
        }
    }

    public function deleteUser($userName)
    {
        $sqlQuery = "delete from user where user_name = '" . $userName . "'";
        try {
            $prepare = parent::prepare($sqlQuery);
            $prepare->execute();
            echo 'Sukses...';
        } catch (Exception $ex) {
            echo 'Error : ' . $ex->getMessage();
        }
    }

    public function getUser($rows, $whereFild = null, $whereValue = null, $limit = null, $like = NULL)
    {

        if ($whereFild == NULL and $whereValue == null and $limit == NULL) {
            $sqlQuery = "select " . $rows . " from user";

        } elseif ($whereFild != NULL and $whereValue != null and $limit == NULL) {
            $sqlQuery = "select " . $rows . " from user where " . $whereFild . " = '" . $whereValue . "'";

        } elseif ($whereFild == NULL and $whereValue == null and $limit != NULL) {
            $sqlQuery = "select " . $rows . " from user limit = " . $limit . "";

        } elseif ($whereFild != NULL and $whereValue != null and $limit != NULL) {
            $sqlQuery = "select " . $rows . " from user where " . $whereFild . " = '" . $whereValue . "' limit = " . $limit . "";

        } elseif ($whereFild != NULL and $whereValue == null and $limit == NULL and $like != NULL) {
            $sqlQuery = "select " . $rows . " from user where " . $whereFild . " like '%" . $like . "%'";

        } else {
            $sqlQuery = "select * from user";
        }

        try {
            $prepare = parent::prepare($sqlQuery);
            $prepare->execute();

            return $prepare->fetchAll();
        } catch (Exception $ex) {
            echo 'Error : ' . $ex->getMessage();
        }
        $this->result;
    }


    //menyimpan file json ke user.json
    public function saveJson()
    {
        $myFile = "user.json";
        $sqlQuery = "select * from user";
        $json = null;
        try {
            $prepare = parent::prepare($sqlQuery);
            $prepare->execute();
            $result = $prepare->fetchAll(PDO::FETCH_ASSOC);

            $json = json_encode($result);
        } catch (Exception $ex) {
            echo 'Error : ' . $ex->getMessage();
        }
        return file_put_contents($myFile, $json);
    }

    public function getLogin($userName, $password)
    {
        $sqlQuery = "select * from user WHERE user_name='$userName' AND password='$password'";
        $json = null;
        try {
            $prepare = parent::prepare($sqlQuery);
            $prepare->execute();
            $result = $prepare->fetchAll(PDO::FETCH_ASSOC);

            $json = json_encode($result);
        } catch (Exception $ex) {
            echo 'Error : ' . $ex->getMessage();
        }
        echo $json;
    }
}