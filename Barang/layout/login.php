<?php
/**
 * Created by IntelliJ IDEA.
 * User: Agus Suhardi
 * Date: 6/17/2016
 * Time: 14:13
 */
include_once "header.php";
?>
<script src="asset/login.js"></script>

<h3>Login Form</h3>
<form action="#" method="post" id="login" class="form-group">
    <input type="text" name="userName" id="userName" class="form-control" placeholder="User Name"/>
    <input type="password" name="password" id="password" class="form-control" placeholder="Password"/>
    <input type="submit" value="Login" name="aksi" class="form-control btn-primary" onclick="login();"/>
</form>



<?php
include_once "footer.php";
?>

