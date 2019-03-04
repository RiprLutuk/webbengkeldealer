<?php
include "./config/koneksi.php";
session_start();
$sesi = $_SESSION['admin'];
if (!isset($sesi)) {
    header("location: index.php");
}

$kdbengkel = $_GET['kdbengkel'];

$stmt = $db->prepare('select * from data_bengkel where kdbengkel=:kdbengkel');
$stmt->bindValue(":kdbengkel", $kdbengkel, PDO::PARAM_STR);
$stmt->execute();
$row = $stmt->fetch(PDO::FETCH_ASSOC);
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
		<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCX2OQgxYF6IVDP86aPgN7awXYB4zt_hhc&sensor=false" type="text/javascript"></script>
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
                        <div class="panel panel-default">
                            <div class="panel-heading" align='center'>
                                UBAH DATA BENGKEL
                            </div>
                            <div class="panel-body">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <form class="form-horizontal" action="editbengkel.php" method="POST" enctype="multipart/form-data">
                                            <div class="form-group">
                                                <label class="col-sm-2 control-label">Kode Bengkel</label>
                                                <div class="col-sm-8">
                                                    <input type="text" class="form-control" name="kdbengkel" id="kdbengkel" value="<?php echo $row['kdbengkel']; ?>" required readonly/>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-sm-2 control-label">Nama Bengkel</label>
                                                <div class="col-sm-8">
                                                    <input type="text" class="form-control" name="nmbengkel" id="nmbengkel" value="<?php echo $row['nmbengkel']; ?>" placeholder="Masukan Nama Bengkel" oninvalid="setCustomValidity('Isi Nama Bengkel Terlebih Dahulu')" onchange="try {
                                                                setCustomValidity('')
                                                            } catch (e) {
                                                            }" required/>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-sm-2 control-label">Jumlah Bengkel</label>
                                                <div class="col-sm-8">
                                                    <input type="number" class="form-control" name="jmlmontir" id="jmlkaryawan" value="<?php echo $row['jmlmontir']; ?>" placeholder="Masukan Jumlah Montir, Isikan Angka 0 Jika Tidak Ada" oninvalid="setCustomValidity('Isi Jumlah Montir Terlebih Dahulu')" onchange="try {
                                                                setCustomValidity('')
                                                            } catch (e) {
                                                            }" onkeyup="validAngka(this)" required/>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-sm-2 control-label">Hari Buka</label>
                                                <div class="col-sm-8">
                                                    <input type="text" class="form-control" name="haribuka" id="haribuka" value="<?php echo $row['haribuka']; ?>" placeholder="Masukan Haribuka Ex= (Senin - Minggu)" oninvalid="setCustomValidity('Isi Hari Buka Terlebih Dahulu')" onchange="try {
                                                                setCustomValidity('')
                                                            } catch (e) {
                                                            }" required/>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-sm-2 control-label">Jam Buka</label>
                                                <div class="col-sm-8">
                                                    <input type="text" class="form-control" name="jambuka" id="jambuka" value="<?php echo $row['jambuka']; ?>" placeholder="Masukan Jam Buka Ex= (08.00 - 17.00)" oninvalid="setCustomValidity('Isi Jam Buka Terlebih Dahulu')" onchange="try {
                                                                setCustomValidity('')
                                                            } catch (e) {
                                                            }" required/>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-sm-2 control-label">Alamat</label>
                                                <div class="col-sm-8">
                                                    <input type="text" class="form-control" name="alamat" id="alamat" value="<?php echo $row['alamat']; ?>" placeholder="Masukan Alamat bengkel" oninvalid="setCustomValidity('Isi Alamat bengkel Terlebih Dahulu')" onchange="try {
                                                                setCustomValidity('')
                                                            } catch (e) {
                                                            }" required/>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-sm-2 control-label">Kelurahan</label>
                                                <div class="col-sm-8">
                                                    <input type="text" class="form-control" name="kelurahan" id="kelurahan" value="<?php echo $row['kelurahan']; ?>" placeholder="Masukan Kelurahan bengkel" oninvalid="setCustomValidity('Isi Kelurahan bengkel Terlebih Dahulu')" onchange="try {
                                                                setCustomValidity('')
                                                            } catch (e) {
                                                            }" required/>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-sm-2 control-label">Kecamatan</label>
                                                <div class="col-sm-8">
                                                    <select class="form-control" id="kecamatan" name="kecamatan" oninvalid="setCustomValidity('Pilih Kecamatan bengkel Terlebih Dahulu')" onchange="try {
                                                                setCustomValidity('')
                                                            } catch (e) {
                                                            }" required/>
                                                    <option value="">--Pilih Kecamatan bengkel--</option>
                                                    <option value="Ampelgading" <?php echo $row['kecamatan'] == "Ampelgading" ? "selected" : ""; ?> >Ampelgading</option>
                                                    <option value="Bantarbolang" <?php echo $row['kecamatan'] == "Bantarbolang" ? "selected" : ""; ?> >Bantarbolang</option>
                                                    <option value="Belik" <?php echo $row['kecamatan'] == "Belik" ? "selected" : ""; ?> >Belik</option>
                                                    <option value="Bodeh" <?php echo $row['kecamatan'] == "Bodeh" ? "selected" : ""; ?> >Bodeh</option>
                                                    <option value="Comal" <?php echo $row['kecamatan'] == "Comal" ? "selected" : ""; ?> >Comal</option>
                                                    <option value="Moga" <?php echo $row['kecamatan'] == "Moga" ? "selected" : ""; ?> >Moga</option>
                                                    <option value="Pemalang" <?php echo $row['kecamatan'] == "Pemalang" ? "selected" : ""; ?> >Pemalang</option>
                                                    <option value="Petarukan" <?php echo $row['kecamatan'] == "Petarukan" ? "selected" : ""; ?> >Petarukan</option>
                                                    <option value="Pulosari" <?php echo $row['kecamatan'] == "Pulosari" ? "selected" : ""; ?> >Pulosari</option>
                                                    <option value="Randudongkal" <?php echo $row['kecamatan'] == "Randudongkal" ? "selected" : ""; ?> >Randudongkal</option>
                                                    <option value="Taman" <?php echo $row['kecamatan'] == "Taman" ? "selected" : ""; ?> >Taman</option>
                                                    <option value="Ulujami" <?php echo $row['kecamatan'] == "Ulujami" ? "selected" : ""; ?> >Ulujami</option>
                                                    <option value="Warungpring" <?php echo $row['kecamatan'] == "Warungpring" ? "selected" : ""; ?> >Warungpring</option>
                                                    <option value="Watukumptul" <?php echo $row['kecamatan'] == "Watukumptul" ? "selected" : ""; ?> >Watukumptul</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-sm-2 control-label">Kode Pos</label>
                                                <div class="col-sm-8">
                                                    <input type="text" class="form-control" name="kdpos" id="kdpos" value="<?php echo $row['kdpos']; ?>" placeholder="Masukan Kode Pos bengkel" oninvalid="setCustomValidity('Isi Kode Pos bengkel Terlebih Dahulu')" onchange="try {
                                                                setCustomValidity('')
                                                            } catch (e) {
                                                            }" onkeyup="validAngka(this)" maxlength="5" required/>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-sm-2 control-label">Kabupaten</label>
                                                <div class="col-sm-8">
                                                    <select class="form-control" id="kabupaten" name="kabupaten" oninvalid="setCustomValidity('Pilih Kabupaten bengkel Terlebih Dahulu')" onchange="try {
                                                                setCustomValidity('')
                                                            } catch (e) {
                                                            }" required/>
                                                    <option value="">--Pilih Kabupaten bengkel--</option>
                                                    <option value="Pemalang" <?php echo $row['kabupaten'] == "Pemalang" ? "selected" : ""; ?> >Pemalang</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-sm-2 control-label">No. Telepon</label>
                                                <div class="col-sm-8">
                                                    <input type="text" class="form-control" name="telepon" id="telepon" value="<?php echo $row['telepon']; ?>" placeholder="Masukan No. Telepon bengkel, Isikan Angka 0 Jika Tidak Ada" oninvalid="setCustomValidity('Isi No. Telepon bengkel Terlebih Dahulu')" onchange="try {
                                                                setCustomValidity('')
                                                            } catch (e) {
                                                            }" onkeyup="validAngka(this)" maxlength="12" required/>
                                                </div>
                                            </div>
                                            <div align="center">
                                                <div align="center" id="map" style="width:600px;height: 300px;">
                                                    <script type="text/javascript">
                                                        document.getElementById('reset').onclick = function () {
                                                            var field1 = document.getElementById('longitude');
                                                            var field2 = document.getElementById('latitude');
                                                            field1.value = field1.defaultValue;
                                                            field2.value = field2.defaultValue;
                                                        };
                                                    </script>    
                                                    <script type="text/javascript">
                                                        function updateMarkerPosition(latLng) {
                                                            document.getElementById('latitude').value = [latLng.lat()];
                                                            document.getElementById('longitude').value = [latLng.lng()];
                                                        }
                                                        var myOptions = {
                                                            zoom: 17,
                                                            scaleControl: true,
                                                            center: new google.maps.LatLng(<?php echo "$row[latitude], $row[longitude]"; ?>),
                                                            mapTypeId: google.maps.MapTypeId.ROADMAP
                                                        };

                                                        var map = new google.maps.Map(document.getElementById("map"),
                                                                myOptions);
                                                        var marker1 = new google.maps.Marker({
                                                            position: new google.maps.LatLng(<?php echo "$row[latitude], $row[longitude]"; ?>),
                                                            title: 'lokasi',
                                                            map: map,
                                                            draggable: true
                                                        });

                                                        //updateMarkerPosition(latLng);
                                                        google.maps.event.addListener(marker1, 'drag', function () {
                                                            updateMarkerPosition(marker1.getPosition());
                                                        });
                                                    </script>
                                                </div>
                                            </div><br/>
                                            <div class="form-group">
                                                <label class="col-sm-2 control-label">Latitude</label>
                                                <div class="col-sm-8">
                                                    <input type="text" class="form-control" name="latitude" id="latitude" value="<?php echo $row['latitude']; ?>" placeholder="Masukan Latitude bengkel, Isikan Angka 0 Jika Tidak Ada" oninvalid="setCustomValidity('Isi Latitude bengkel Terlebih Dahulu')" onchange="try {
                                                                setCustomValidity('')
                                                            } catch (e) {
                                                            }" onkeyup="validLatLon(this)" maxlength="10" required/>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-sm-2 control-label">Longitude</label>
                                                <div class="col-sm-8">
                                                    <input type="text" class="form-control" name="longitude" id="longitude" value="<?php echo $row['longitude']; ?>" placeholder="Masukan Longitude bengkel, Isikan Angka 0 Jika Tidak Ada" oninvalid="setCustomValidity('Isi Longitude bengkel Terlebih Dahulu')" onchange="try {
                                                                setCustomValidity('')
                                                            } catch (e) {
                                                            }" onkeyup="validLatLon(this)" maxlength="11" required/>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-sm-2 control-label">Foto</label>
                                                <div class="col-sm-8">
                                                    <img src="img/<?php echo $row['foto'] ?>" width="100px" height="60px"/>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-sm-2 control-label"></label>
                                                <div class="col-sm-8">
                                                    <input type="file" size="20"  class="form-control" name="fotoUpload" id="fotoUpload" />Hanya file JPG, PNG, JPEG yang diperbolehkan. Ukuran Foto Kurang Dari 2 MB</td>
                                                </div>
                                            </div>
                                            <div align="center">
                                                <button type='submit' class='btn btn-primary' name='ubah'>Simpan</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div id="footer">
            <marquee><p>&copy; Ripr Lutuk 2017 </p>
            </marquee>
        </div>
        <script language='javascript'>
            function validAngka(a) {
                if (!/^[0-9]+$/.test(a.value)) {
                    a.value = a.value.substring(0, a.value.length - 1);
                }
            }
            function validLatLon(a) {
                if (!/^[0-9.-]+$/.test(a.value)) {
                    a.value = a.value.substring(0, a.value.length - 1);
                }
            }
        </script>
    </body>
</html>