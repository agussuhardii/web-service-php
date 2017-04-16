<?php
/**
 * Created by IntelliJ IDEA.
 * User: Agus Suhardi
 * Date: 6/20/2016
 * Time: 11:48
 */
include_once "header.php";
?>
<script src="asset/member.js"></script>

<h3>User Registrasi</h3>
<form action="../middleware/member.controller.php" method="post" class="form-group" id="userForm">
    <input type="text" class="form-control" name="userName" id="userName" required minlength="6" maxlength="6" placeholder="User Name"/>
    <input type="password" class="form-control" name="password" id="password" required minlength="6" maxlength="6" placeholder="Password"/>
    <input type="submit" value="Register" class="form-control btn btn-primary" name="aksi" id="register">
</form>
















<?php
include_once "footer.php";
?>
