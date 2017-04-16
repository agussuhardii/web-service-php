<?php
/**
 * Created by IntelliJ IDEA.
 * User: Agus Suhardi
 * Date: 6/17/2016
 * Time: 14:49
 */


include_once '../webservice/member.dao.class.php';

$aksi = $_POST['aksi'];

$user = new MemberDao();

if($aksi == 'Register'){
    $userName = $_POST['userName'];
    $password = md5($_POST['password']);

    $user->saveUser($userName, $password);


}elseif($aksi == 'Ubah'){
    $userName = $_POST['userName'];
    $password = md5($_POST['password']);

    $user->updateUserPassword($userName, $password);


}elseif($aksi == 'Delete'){
    $userName = $_POST['userName'];
    $user->deleteUser($userName);

}elseif ($aksi == "Login"){
    $userName = $_POST['userName'];
    $password = md5($_POST['password']);
    $user->getLogin($userName, $password);
}
