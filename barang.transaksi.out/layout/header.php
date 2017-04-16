<?php
/**
 * Created by IntelliJ IDEA.
 * User: Agus Suhardi
 * Date: 6/19/2016
 * Time: 21:29
 */
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">

    <title>Transaksi</title>

    <!--Import ex lib-->
    <link href="asset/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="asset/blog.css" rel="stylesheet">
    <script src="asset/jquery-1.12.3.min.js"></script>
    <script src="asset/bootstrap/js/bootstrap.min.js"></script>
    <script src="asset/jquery.md5.js"></script>
    <script src="asset/jquery.validate.min.js"></script>

    <!--ext lib -->
    <script src="asset/server.services.js"></script>
    <script src="asset/global.js"></script>
    <script src="asset/login.js"></script>
    <!--ext lib -->


</head>

<body>

<div class="blog-masthead">
    <div class="container">
        <nav class="blog-nav">
            <a class="blog-nav-item active" href="index.php">Home</a>
            <a class="blog-nav-item active" href="transaksi.out.tampil.php">Transaksi</a>

            <div class="nav navbar-nav navbar-right ">
                <a id="logOutValue" class="btn bg-info" href="#" onclick="logOut();"><i
                        class="glyphicon glyphicon-lock"></i> Logout</a>
                <a id="loginValue" class="btn bg-info" href="#" data-toggle="modal"
                   data-target=".bs-example-modal-sm"><i
                        class="glyphicon glyphicon-lock"></i> Login</a>
            </div>
        </nav>
    </div>

</div>

<div class="container">

    <div class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-header">
                    <h3>Login</h3>
                </div>
                <div class="form-group modal-body">
                    <input type="text" id="userName" class="form-control" placeholder="User Name"/>
                    <input type="password" id="password" class="form-control" placeholder="Password"/>
                    <div class="modal-footer">
                        <a href="member.php">Register</a>
                        <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                        <button type="button" class="btn btn-primary" id="Login" onclick="Login();">Login</button>
                    </div>
                </div>
            </div>
        </div>
    </div>