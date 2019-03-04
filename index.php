<?php
session_start();
require './config/koneksi.php';
if (!isset($_SESSION['admin'])) {
    if (isset($_POST['username'])) {
        $username = $_POST['username'];
        $password = $_POST['password'];
        $stmt = $db->prepare('select * from user where username=:username AND password=MD5(:password)');
        $stmt->bindValue(":username", $username, PDO::PARAM_STR);
        $stmt->bindValue(":password", $password, PDO::PARAM_STR);
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($row['username'] == $username AND $row['password'] == MD5($password)) {
            $_SESSION['admin'] = $username;
            header("location: beranda.php");
        } else {
            echo '<script language="JavaScript">alert("Username atau Password SALAH");</script>';
        }
    }
} else {
    echo "<script>window.location='beranda.php'</script>";
}
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Bengkel & Dealer Motor di Pemalang | Halaman Admin</title>
    	<link rel="icon" href="../icons/logo.png"/>
        <link rel="stylesheet" href="assets/css/bootstrap.css" type="text/css">
        <link rel="stylesheet" href="assets/css/style.css" type="text/css" media="all">
    </head>
    <body>
        <div class="header">
            <h3 class="title">BENGKEL DEALER MOTOR PEMALANG</h3>
        </div>
        <div class="clear"></div>
        <div class="container"  align="center">
            <br />
            <div class="content">
                <div class="card card-login "> <b>
                        <div class="card-header">Login Administrator</div>
                    </b>
                    <div class="card-body" align="left">
                        <form action="" method="POST">
                            <div class="form-group">
                                <label for="username">Username</label>
                                <input type="username" name="username" id="username" class="form-control" placeholder="Username" oninvalid="setCustomValidity('Isi Username Terlebih Dahulu')" onChange="try {
                                            setCustomValidity('')
                                        } catch (e) {
                                        }" required>
                            </div>
                            <div class="form-group">
                                <label for="password">Password</label>
                                <input type="password" name="password" id="password" class="form-control" placeholder="Password" oninvalid="setCustomValidity('Isi Password Terlebih Dahulu')" onChange="try {
                                            setCustomValidity('')
                                        } catch (e) {
                                        }" required>
                            </div>
                            <div class="form-group"> </div>
                            <button type="submit" class="btn btn-primary btn-block" name="login">LOGIN</button>
                            <div class="form-group"> </div>
                            <div class="card-body" align="center">
                            <button type="button" class="btn btn-success" name="markerbengkel" onclick='window.location.href = "../marker/maps_bengkel.php"'>Lokasi Bengkel</button>
                            <button type="button" class="btn btn-success" name="markerbengkel" onclick='window.location.href = "../marker/maps_dealer.php"'>Lokasi Dealer</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    <div class="clear"></div>
    <div id="footer">
        <marquee><p>&copy; Ripr Lutuk 2018 </p>
        </marquee>
    </div>
</body>
</html>
