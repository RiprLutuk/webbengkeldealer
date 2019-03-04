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
        <div class="container"  align="center">
            <br />
            <div class="content">
                <div class="card card-login mx-auto mt-5">
                    <b><div class="card-header">Ubah Password Administrator</div></b>
                    <div class="card-body" align="left">
                        <?php
                        if (isset($_POST['oldPass'])) {
                            $newPass = $_POST['newPass'];
                            $oldPass = $_POST['oldPass'];

                            $stmt = $db->prepare('update user set password=MD5(:newPass) where username=:username AND password=MD5(:oldPass)');
                            $stmt->bindValue(":newPass", $newPass, PDO::PARAM_STR);
                            $stmt->bindValue(":oldPass", $oldPass, PDO::PARAM_STR);
                            $stmt->bindValue(":username", $sesi, PDO::PARAM_STR);
                            $stmt->execute();
                            if ($stmt->rowCount() > 0) {
                                echo '<script language="JavaScript">alert("Password Telah Diubah");window.location = "beranda.php";</script>';
                            } else {
                                echo '<script language="JavaScript">alert("Gagal Mengubah Password");</script>';
                            }
                        }
                        ?>

                        <!-- Form Input -->
                        <form action="" method="POST">
                            <div class="form-group">
                                <label for="oldPass">Password Lama</label>
                                <input type="password" class="form-control" name="oldPass" id="oldPass" placeholder="Masukkan Password Lama"  oninvalid="setCustomValidity('Isi Password Lama Terlebih Dahulu')" onchange="try {
                                            setCustomValidity('')
                                        } catch (e) {
                                        }" required>
                            </div>
                            <div class="form-group">
                                <label for="newPass">Password Baru</label>
                                <input type="password" name="newPass" id="newPass" class="form-control" placeholder="Masukkan Password Baru" oninvalid="setCustomValidity('Isi Password Terlebih Dahulu')" onchange="try {
                                            setCustomValidity('')
                                        } catch (e) {
                                        }" required>
                            </div>
                            <div class="form-group">
                            </div>
                            <button type="submit" class="btn btn-primary btn-group" name="ubah">Ubah</button>
                            <button type="button" class="btn btn-warning btn-group" onclick="window.location.href = 'beranda.php'">Batal</button>
                        </form>
                    </div>
                </div>
            </div>
            <br />
            <div class="clear"></div>
            <div id="footer">
                <marquee><p>&copy; Ripr Lutuk 2017 </p>
                </marquee>
            </div>
    </body>
</html>