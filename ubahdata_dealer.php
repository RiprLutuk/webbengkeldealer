<?php
include "./config/koneksi.php";
session_start();
$sesi = $_SESSION['admin'];
if (!isset($sesi)) {
    header("location: index.php");
}

$kddealer = $_GET['kddealer'];

$stmt = $db->prepare('select * from data_dealer where kddealer=:kddealer');
$stmt->bindValue(":kddealer", $kddealer, PDO::PARAM_STR);
$stmt->execute();
$row = $stmt->fetch(PDO::FETCH_ASSOC);
$pelayanan = explode(",", $row['pelayanan']);
$fasilitas = explode(",", $row['fasilitas']);
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
                                UBAH DATA DEALER
                            </div>
                            <div class="panel-body">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <form class="form-horizontal" action="editdealer.php" method="POST" enctype="multipart/form-data">
                                            <div class="form-group">
                                                <label class="col-sm-2 control-label">Kode Dealer</label>
                                                <div class="col-sm-8">
                                                    <input type="text" class="form-control" name="kddealer" id="kddealer" value="<?php echo $row['kddealer']; ?>" required readonly/>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-sm-2 control-label">Nama Dealer</label>
                                                <div class="col-sm-8">
                                                    <input type="text" class="form-control" name="nmdealer" id="nmdealer" value="<?php echo $row['nmdealer']; ?>" placeholder="Masukan Nama Dealer" oninvalid="setCustomValidity('Isi Nama dealer Terlebih Dahulu')" onchange="try {
                                                                setCustomValidity('')
                                                            } catch (e) {
                                                            }" required/>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-sm-2 control-label">Nama Motor</label>
                                                <div class="col-sm-8">
                                                    <select class="form-control" id="merk" name="merk" oninvalid="setCustomValidity('Pilih Merk Dealer Terlebih Dahulu')" onchange="try {
                                                                setCustomValidity('')
                                                            } catch (e) {
                                                            }" required/>
                                                    <option value="">--Pilih Merk Dealer--</option>
                                                    <option value="HONDA" <?php echo $row['merk'] == "HONDA" ? "selected" : ""; ?> >HONDA</option>
                                                    <option value="YAMAHA" <?php echo $row['merk'] == "YAMAHA" ? "selected" : ""; ?> >YAMAHA</option>
                                                    <option value="SUZUKI" <?php echo $row['merk'] == "SUZUKI" ? "selected" : ""; ?> >SUZUKI</option>
                                                    <option value="KAWASAKI" <?php echo $row['merk'] == "KAWASAKI" ? "selected" : ""; ?> >KAWASAKI</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-sm-2 control-label">Jumlah Karyawan</label>
                                                <div class="col-sm-8">
                                                    <input type="number" class="form-control" name="jmlkaryawan" id="jmlkaryawan" value="<?php echo $row['jmlkaryawan']; ?>" placeholder="Masukan Jumlah Karyawan, Isikan Angka 0 Jika Tidak Ada" oninvalid="setCustomValidity('Isi Jumlah Karyawan Terlebih Dahulu')" onchange="try {
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
                                                    <input type="text" class="form-control" name="alamat" id="alamat" value="<?php echo $row['alamat']; ?>" placeholder="Masukan Alamat dealer" oninvalid="setCustomValidity('Isi Alamat Dealer Terlebih Dahulu')" onchange="try {
                                                                setCustomValidity('')
                                                            } catch (e) {
                                                            }" required/>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-sm-2 control-label">Kelurahan</label>
                                                <div class="col-sm-8">
                                                    <input type="text" class="form-control" name="kelurahan" id="kelurahan" value="<?php echo $row['kelurahan']; ?>" placeholder="Masukan Kelurahan dealer" oninvalid="setCustomValidity('Isi Kelurahan Dealer Terlebih Dahulu')" onchange="try {
                                                                setCustomValidity('')
                                                            } catch (e) {
                                                            }" required/>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-sm-2 control-label">Kecamatan</label>
                                                <div class="col-sm-8">
                                                    <select class="form-control" id="kecamatan" name="kecamatan" oninvalid="setCustomValidity('Pilih Kecamatan dealer Terlebih Dahulu')" onchange="try {
                                                                setCustomValidity('')
                                                            } catch (e) {
                                                            }" required/>
                                                    <option value="">--Pilih Kecamatan dealer--</option>
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
                                                    <input type="text" class="form-control" name="kdpos" id="kdpos" value="<?php echo $row['kdpos']; ?>" placeholder="Masukan Kode Pos dealer" oninvalid="setCustomValidity('Isi Kode Pos Dealer Terlebih Dahulu')" onchange="try {
                                                                setCustomValidity('')
                                                            } catch (e) {
                                                            }" onkeyup="validAngka(this)" maxlength="5" required/>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-sm-2 control-label">Kabupaten</label>
                                                <div class="col-sm-8">
                                                    <select class="form-control" id="kabupaten" name="kabupaten" oninvalid="setCustomValidity('Pilih Kabupaten dealer Terlebih Dahulu')" onchange="try {
                                                                setCustomValidity('')
                                                            } catch (e) {
                                                            }" required/>
                                                    <option value="">--Pilih Kabupaten dealer--</option>
                                                    <option value="Pemalang" <?php echo $row['kabupaten'] == "Pemalang" ? "selected" : ""; ?> >Pemalang</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-sm-2 control-label">No. Telepon</label>
                                                <div class="col-sm-8">
                                                    <input type="text" class="form-control" name="telepon" id="telepon" value="<?php echo $row['telepon']; ?>" placeholder="Masukan No. Telepon dealer, Isikan Angka 0 Jika Tidak Ada" oninvalid="setCustomValidity('Isi No. Telepon Dealer Terlebih Dahulu')" onchange="try {
                                                                setCustomValidity('')
                                                            } catch (e) {
                                                            }" onkeyup="validAngka(this)" maxlength="12" required/>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-sm-2 control-label">Pelayanan</label>
                                                <div class="col-sm-8">
                                                    <label class="checkbox-inline" for="Penjualan" cursor="pointer">
                                                        <input type="checkbox" name="pelayanan[]" value=" Penjualan" id="Penjualan"
                                                               <?php echo in_array(" Penjualan", $pelayanan) ? 'checked' : ''; ?>/>Penjualan
                                                    </label>
                                                    <label class="checkbox-inline" for="Bengkel" cursor="pointer">
                                                        <input type="checkbox" name="pelayanan[]" value=" Bengkel" id="Bengkel"
                                                               <?php echo in_array(" Bengkel", $pelayanan) ? 'checked' : ''; ?>/>Bengkel
                                                    </label>
                                                    <label class="checkbox-inline" for="Sukucadang" cursor="pointer">
                                                        <input type="checkbox" name="pelayanan[]" value=" Suku Cadang" id="Sukucadang"
                                                               <?php echo in_array(" Suku Cadang", $pelayanan) ? 'checked' : ''; ?>/>Suku Cadang
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-sm-2 control-label">Fasilitas</label>
                                                <div class="col-sm-3">
                                                    <div class="checkbox">
                                                        <label for="TV" cursor="pointer">
                                                            <input type="checkbox" name="fasilitas[]" value=" TV" id="TV"
                                                                   <?php echo in_array(" TV", $fasilitas) ? 'checked' : ''; ?>/>TV
                                                        </label>
                                                    </div>
                                                    <div class="checkbox">
                                                        <label  for="WIFI" cursor="pointer">
                                                            <input type="checkbox" name="fasilitas[]" value="WIFI" id="WIFI"
                                                                   <?php echo in_array(" WIFI", $fasilitas) ? 'checked' : ''; ?>/>WIFI
                                                        </label>
                                                    </div>
                                                    <div class="checkbox">
                                                        <label for="Toilet" cursor="pointer">
                                                            <input type="checkbox" name="fasilitas[]" value=" Toilet" id="Toilet"
                                                                   <?php echo in_array(" Toilet", $fasilitas) ? 'checked' : ''; ?>/>Toilet
                                                        </label>
                                                    </div>
                                                    <div class="checkbox">
                                                        <label for="Koran" cursor="pointer">
                                                            <input type="checkbox" name="fasilitas[]" value=" Koran" id="Koran"
                                                                   <?php echo in_array(" Koran", $fasilitas) ? 'checked' : ''; ?>/>Koran
                                                        </label>
                                                    </div>
                                                    <div class="checkbox">
                                                        <label for="Kipas" cursor="pointer">
                                                            <input type="checkbox" name="fasilitas[]" value=" Kipas Angin" id="Kipas"
                                                                   <?php echo in_array(" Kipas Angin", $fasilitas) ? 'checked' : ''; ?>/>Kipas Angin
                                                        </label>
                                                    </div>
                                                    <div class="checkbox">
                                                        <label for="Permen" cursor="pointer">
                                                            <input type="checkbox" name="fasilitas[]" value=" Permen" id="Permen"
                                                                   <?php echo in_array(" Permen", $fasilitas) ? 'checked' : ''; ?>/>Permen
                                                        </label>
                                                    </div>
                                                    <div class="checkbox">
                                                        <label for="Minum" cursor="pointer">
                                                            <input type="checkbox" name="fasilitas[]" value=" Air Minum" id="Minum"
                                                                   <?php echo in_array(" Air Minum", $fasilitas) ? 'checked' : ''; ?>/>Air Minum
                                                        </label>
                                                    </div>
                                                    <div class="checkbox">
                                                        <label for="Angsuran" cursor="pointer"> 
                                                            <input type="checkbox" name="fasilitas[]" value=" Angsuran di Tempat" id="Angsuran"
                                                                   <?php echo in_array(" Angsuran di Tempat", $fasilitas) ? 'checked' : ''; ?>/>Angsuran di Tempat
                                                        </label>
                                                    </div>
                                                    <div class="checkbox">
                                                        <label for="Biro" cursor="pointer"> 
                                                            <input type="checkbox" name="fasilitas[]" value=" Biro Jasa" id="Biro"
                                                                   <?php echo in_array(" Biro Jasa", $fasilitas) ? 'checked' : ''; ?>/>Biro Jasa
                                                        </label>
                                                    </div>
                                                    <div class="checkbox">
                                                        <label for="Ruang" cursor="pointer">
                                                            <input type="checkbox" name="fasilitas[]" value=" Ruang Tunggu AC" id="Ruang"
                                                                   <?php echo in_array(" Ruang Tunggu AC", $fasilitas) ? 'checked' : ''; ?>/> Ruang Tunggu AC
                                                        </label>
                                                    </div>
                                                    <div class="checkbox">
                                                        <label for="RuangAC" cursor="pointer"> 
                                                            <input type="checkbox" name="fasilitas[]" value=" Ruang Tunggu Non AC" id="RuangAC"
                                                                   <?php echo in_array(" Ruang Tunggu Non AC", $fasilitas) ? 'checked' : ''; ?>/>Ruang Tunggu Non AC
                                                        </label>
                                                    </div>
                                                    <div class="checkbox">
                                                        <label for="Area" cursor="pointer"> 
                                                            <input type="checkbox" name="fasilitas[]" value=" Area Bermain Anak" id="Area"
                                                                   <?php echo in_array(" Area Bermain Anak", $fasilitas) ? 'checked' : ''; ?>/>Area Bermain Anak
                                                        </label>
                                                    </div>
                                                    <div class="checkbox">
                                                        <label for="Pijat" cursor="pointer"> 
                                                            <input type="checkbox" name="fasilitas[]" value=" Kursi Pijat" id="Pijat"
                                                                   <?php echo in_array(" Kursi Pijat", $fasilitas) ? 'checked' : ''; ?>/>Kursi Pijat
                                                        </label>
                                                    </div>
                                                    <div class="checkbox">
                                                        <label for="Cucimotor" cursor="pointer"> 
                                                            <input type="checkbox" name="fasilitas[]" value=" Cuci Motor Gratis" id="Cucimotor"
                                                                   <?php echo in_array(" Cuci Motor Gratis", $fasilitas) ? 'checked' : ''; ?>/>Cuci Motor Gratis
                                                        </label>
                                                    </div>
                                                </div>
												<br/><br/>
												<div align="left">
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
                                            </div>
                                            <div class="form-group">
                                                <label class="col-sm-2 control-label">Latitude</label>
                                                <div class="col-sm-8">
                                                    <input type="text" class="form-control" name="latitude" id="latitude" value="<?php echo $row['latitude']; ?>" placeholder="Masukan Latitude dealer, Isikan Angka 0 Jika Tidak Ada" oninvalid="setCustomValidity('Isi Latitude Dealer Terlebih Dahulu')" onchange="try {
                                                                setCustomValidity('')
                                                            } catch (e) {
                                                            }" onkeyup="validLatLon(this)" maxlength="10" required/>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-sm-2 control-label">Longitude</label>
                                                <div class="col-sm-8">
                                                    <input type="text" class="form-control" name="longitude" id="longitude" value="<?php echo $row['longitude']; ?>" placeholder="Masukan Longitude dealer, Isikan Angka 0 Jika Tidak Ada" oninvalid="setCustomValidity('Isi Longitude Dealer Terlebih Dahulu')" onchange="try {
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