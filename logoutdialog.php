<?php
session_start();
include './config/koneksi.php';
$sesi = $_SESSION['admin'];
if (!isset($sesi)) {
    header("location: index.php");
}
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Bengkel & Dealer Motor di Pemalang | Halaman Admin</title>
        <link rel="icon" href="../icons/logo.png"/>
        <link href="assets/css/bootstrap.css" rel="stylesheet"/>
        <link href="assets/css/font-awesome.css" rel="stylesheet"/>
        <link href="assets/css/style.css" type="text/css" rel="stylesheet"/>
        <link href="assets/css/custom-styles.css" type="text/css" rel="stylesheet" />
        <link href="assets/js/jquery.min.js" rel="stylesheet" />
        <link href="assets/js/jquery-1.10.2.js" rel="stylesheet" />
    </head>
    <body>
        <div class="header">
            <h3 class="title style5">BENGKEL DEALER MOTOR PEMALANG</h3>
        </div>
        <div id="menu">
            <ul>
                <li><a href="beranda.php">Beranda</a></li>
                <li><a href="data_bengkel.php">Data Bengkel</a></li>
                <li><a href="data_dealer.php">Data Dealer</a></li>
                <li><a href="logoutdialog.php">Keluar</a></li>
            </ul>
        </div>
        <div class="clear"></div>
        <div class="container">
            <br />
            <div class="content">
                <div class="box" align="center">
                    <div class="card card-login">
                        <b><div class="card-header">LOGOUT SISTEM</div></b>
                        <p align="center">
                            <b>Yakin akan keluar dari sistem ?</b>. <br /><br />
                        <center>
                            <button type="button" class="btn btn-primary" onclick="window.location.href = 'logout.php'">Ya</button>
                            <span style="margin:10px">
                                <button type="button" class="btn btn-primary" onclick="window.location.href = 'beranda.php'">Tidak</button>
                            </span>
                        </center>
                        </p>
                    </div>
                </div>
            </div>
        </div>
        <br />
    </div>
    <div class="clear"></div>
    <div id="footer">
        <marquee><p>&copy; Ripr Lutuk 2017 </p>
        </marquee>
    </div>
</body>
</html>
