<?php
include './config/koneksi.php';
session_start();
$sesi = $_SESSION["admin"];
if (!isset($sesi)) {
    header("location: index.php");
}
$kdbengkel = $_GET['kdbengkel'];
$stmt = $db->prepare('select * from data_bengkel where kdbengkel=:kdbengkel');
$stmt->bindValue(":kdbengkel", $kdbengkel, PDO::PARAM_STR);
$stmt->execute();
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
        <title>Bengkel & Dealer Motor di Pemalang | Halaman Admin</title>
        <link rel="icon" href="../icons/logo.png"/>
        <link href="assets/css/bootstrap.css" rel="stylesheet"/>
        <link href="assets/css/font-awesome.css" rel="stylesheet"/>
        <link href="assets/css/style.css" type="text/css" rel="stylesheet"/>
        <link href="assets/css/custom-styles.css" type="text/css" rel="stylesheet"/>
        <link href="assets/js/jquery.min.js" rel="stylesheet"/>
        <link href="assets/js/jquery-1.10.2.js" rel="stylesheet"/>
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
            <div class="content">
                <div class="row">
                    <div class="col-lg-12">
                        <?php while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) { ?>
                            <div class="panel panel-default">
                                <div class="panel-heading" align="center">
                                    <?php echo $row['nmbengkel']; ?>
                                </div>
                                <div class="panel-body" align="center">
                                    <img src="img/<?php echo $row['foto']; ?>" width="500px" height="250px">
                                </div>
                                <div class="panel-body" align="center">
                                    <div class="col-xs-12">
                                        <form class="form-horizontal" role="form">
                                            <h4 class="title">INFORMASI BENGKEL</h4>
                                            <div class="form-group">
                                                <label class="col-sm-4 control-label">Kode Bengkel</label>
                                                <div class="col-sm-5">
                                                    <input type="text" class="form-control" value='<?php echo $row['kdbengkel']; ?>' required readonly/>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-sm-4 control-label">Nama Bengkel</label> 
                                                <div class="col-sm-5">
                                                    <input type="text" class="form-control" value='<?php echo $row['nmbengkel']; ?>' required readonly/>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-sm-4 control-label">Jumlah Montir</label> 
                                                <div class="col-sm-5">
                                                    <input type="text" class="form-control" value='<?php echo $row['jmlmontir']; ?>' required readonly/>
                                                </div>  
                                            </div>
                                            <div class="form-group">
                                                <label class="col-sm-4 control-label">Hari Buka</label> 
                                                <div class="col-sm-5">
                                                    <input type="text" class="form-control" value='<?php echo $row['haribuka']; ?>' required readonly/>
                                                </div>  
                                            </div>
                                            <div class="form-group">
                                                <label class="col-sm-4 control-label">Jam Buka</label> 
                                                <div class="col-sm-5">
                                                    <input type="text" class="form-control" value='<?php echo $row['jambuka']; ?>' required readonly/>
                                                </div>  
                                            </div>
                                            <div class="form-group">
                                                <label class="col-sm-4 control-label">Alamat</label> 
                                                <div class="col-sm-5">
                                                    <input type="text" class="form-control" value='<?php echo $row['alamat']; ?>' required readonly/>
                                                </div>  
                                            </div>
                                            <div class="form-group">
                                                <label class="col-sm-4 control-label">Kelurahan</label> 
                                                <div class="col-sm-5">
                                                    <input type="text" class="form-control" value='<?php echo $row['kelurahan']; ?>' required readonly/>
                                                </div>  
                                            </div>
                                            <div class="form-group">
                                                <label class="col-sm-4 control-label">Kecamatan</label> 
                                                <div class="col-sm-5">
                                                    <input type="text" class="form-control" value='<?php echo $row['kecamatan']; ?>' required readonly/>
                                                </div>  
                                            </div>
                                            <div class="form-group">
                                                <label class="col-sm-4 control-label">Kode Pos</label> 
                                                <div class="col-sm-5">
                                                    <input type="text" class="form-control" name="kdbengkel" id="kdbengkel" value='<?php echo $row['kdpos']; ?>' required readonly/>
                                                </div>  
                                            </div>
                                            <div class="form-group">
                                                <label class="col-sm-4 control-label">Kabupaten</label> 
                                                <div class="col-sm-5">
                                                    <input type="text" class="form-control" value='<?php echo $row['kabupaten']; ?>' required readonly/>
                                                </div>  
                                            </div>
                                            <div class="form-group">
                                                <label class="col-sm-4 control-label">No. Telepon</label> 
                                                <div class="col-sm-5">
                                                    <input type="text" class="form-control" value='<?php echo $row['telepon']; ?>' required readonly/>
                                                </div>  
                                            </div>
                                            <div class="form-group">
                                                <label class="col-sm-4 control-label">Latitude</label> 
                                                <div class="col-sm-5">
                                                    <input type="text" class="form-control" value='<?php echo $row['latitude']; ?>' required readonly/>
                                                </div>  
                                            </div>
                                            <div class="form-group">
                                                <label class="col-sm-4 control-label">Longitude</label> 
                                                <div class="col-sm-5">
                                                    <input type="text" class="form-control" value='<?php echo $row['longitude']; ?>' required readonly/>
                                                </div>  
                                            </div>
                                            <div class="form-group">
                                                <label class="col-sm-4 control-label">Oleh</label> 
                                                <div class="col-sm-5">
                                                    <input type="text" class="form-control" value='<?php echo $row['username']; ?>' required readonly/>
                                                </div>  
                                            </div>
                                            <div class="form-group">
                                                <label class="col-sm-4 control-label">Waktu</label> 
                                                <div class="col-sm-5">
                                                    <input type="text" class="form-control" value='<?php
                                                    $waktu = $row['waktu'];
                                                    echo date("d-m-Y H:i:s", strtotime($waktu));
                                                    ?>' required readonly/>
                                                </div>  
                                            </div>
                                            <div align="center">
                                                <button type='button' class='btn btn-primary' name='ubah' onclick='window.location.href = "ubahdata_bengkel.php?kdbengkel=<?php echo $row['kdbengkel'] ?>"'>Edit Data</button>
                                            </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php
        }
        ?>
    </div>
    <div class="clear"></div>
    <div id="footer">
        <marquee><p>&copy; Ripr Lutuk 2017 </p>
        </marquee>
    </div>
</body>
</html>