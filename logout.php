<?php
session_start();
session_destroy();
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Bengkel & Dealer Motor di Pemalang | Halaman Adminn</title>
        <link rel="icon" href="../icons/logo.png"/>
        <link rel="stylesheet" href="assets/css/bootstrap.css" type="text/css">
        <link rel="stylesheet" href="assets/css/style.css" type="text/css" media="all">
    </head>
    <body>
        <div class="header">
            <h3 class="title style5">BENGKEL DEALER MOTOR PEMALANG</h3>
        </div>
        <div class="clear"></div>
        <div class="container">
            <br />
            <div class="content">
                <div class="box" align="center">
                    <div class="card card-login ">
                        <b><div class="card-header">LOGOUT SISTEM</div></b>
                        <div class="card-body">
                            <p align="center">
                                <b>Anda telah logout dari sistem</b>.<br /><br />
                                <button type='button' class='btn btn-primary' name='login' onclick='window.location.href = "index.php"'>LOGIN</button>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <br />
        </div>
        <div id="footer">
            <marquee><p>&copy; Ripr Lutuk 2017 </p>
            </marquee>
        </div>
    </body>
</html>