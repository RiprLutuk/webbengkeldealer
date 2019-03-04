<?php
include "./config/koneksi.php";
session_start();
$sesi = $_SESSION['admin'];
if (!isset($sesi)) {
    header("location: index.php");
}

$stmt = $db->prepare('select * from data_dealer order by kddealer desc limit 1');
$stmt->execute();
$row = $stmt->fetch(PDO::FETCH_ASSOC);

$cekQ = $row['kddealer'];
$awalQ = substr($cekQ, 0 - 4);
$next = $awalQ + 1;
$jkode = strlen($next);

if (!$row['kddealer']) {
    $no = '000';
} else if ($jkode == 1) {
    $no = '000';
} else if ($jkode == 2) {
    $no = '00';
} else if ($jkode == 3) {
    $no = '0';
} elseif ($jkode == 4) {
    $no = '';
}

$kode = 'DL' . $no . $next;
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
                                TAMBAH DATA DEALER
                            </div>
                            <div class="panel-body">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <form class="form-horizontal" action="simpandealer.php" method="POST" enctype="multipart/form-data">
                                            <div class="form-group">
                                                <label class="col-sm-2 control-label">Kode Dealer</label>
                                                <div class="col-sm-8">
                                                    <input type="text" class="form-control" name="kddealer" id="kddealer" value='<?php echo $kode; ?>' required readonly/>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-sm-2 control-label">Nama Dealer</label>
                                                <div class="col-sm-8">
                                                    <input type="text" class="form-control" name="nmdealer" id="nmdealer" placeholder="Masukkan Nama Dealer (Gunakan Huruf Kapital)" oninvalid="setCustomValidity('Isi Nama Dealer Terlebih Dahulu')" onchange="try {
                                                                setCustomValidity('')
                                                            } catch (e) {
                                                            }" required/>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-sm-2 control-label">Merk Motor</label>
                                                <div class="col-sm-8">
                                                    <select class="form-control" id="merk" name="merk" oninvalid="setCustomValidity('Pilih merk Terlebih Dahulu')" onchange="try {
                                                                setCustomValidity('')
                                                            } catch (e) {
                                                            }" required/>
                                                    <option value="">--Pilih Merk Motor--</option>
                                                    <option value="HONDA">HONDA</option>
                                                    <option value="YAMAHA">YAMAHA</option>
                                                    <option value="SUZUKI">SUZUKI</option>
                                                    <option value="KAWASAKI">KAWASAKI</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-sm-2 control-label">Jumlah Karyawan</label>
                                                <div class="col-sm-8">
                                                    <input type="number" class="form-control" name="jmlkaryawan" id="jmlkaryawan" placeholder="Masukkan Jumlah Karyawan" oninvalid="setCustomValidity('Isi Jumlah Karyawan Terlebih Dahulu')" onchange="try {
                                                                setCustomValidity('')
                                                            } catch (e) {
                                                            }" required/>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-sm-2 control-label">Hari Buka</label>
                                                <div class="col-sm-8">
                                                    <input type="text" class="form-control" name="haribuka" id="haribuka" placeholder="Masukkan hari buka, Contoh Format (Senin - Jumat)" oninvalid="setCustomValidity('Isi Jam Buka Terlebih Dahulu')" onchange="try {
                                                                setCustomValidity('')
                                                            } catch (e) {
                                                            }" required/>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-sm-2 control-label">Jam Buka</label>
                                                <div class="col-sm-8">
                                                    <input type="text" class="form-control" name="jambuka" id="jambuka" placeholder="Masukkan jam buka Contoh Format (08.00 - 16.00)" oninvalid="setCustomValidity('Isi Jam Buka Terlebih Dahulu')" onchange="try {
                                                                setCustomValidity('')
                                                            } catch (e) {
                                                            }" required/>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-sm-2 control-label">Alamat</label>
                                                <div class="col-sm-8">
                                                    <input type="text" class="form-control" name="alamat" id="alamat" placeholder="Masukan Alamat Dealer" oninvalid="setCustomValidity('Isi Alamat Dealer Terlebih Dahulu')" onchange="try {
                                                                setCustomValidity('')
                                                            } catch (e) {
                                                            }" required/>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-sm-2 control-label">Kelurahan</label>
                                                <div class="col-sm-8">
                                                    <input type="text" class="form-control" name="kelurahan" id="kelurahan" placeholder="Masukan Kelurahan Dealer" oninvalid="setCustomValidity('Isi Kelurahan Dealer Terlebih Dahulu')" onchange="try {
                                                                setCustomValidity('')
                                                            } catch (e) {
                                                            }" required/>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-sm-2 control-label">Kecamatan</label>
                                                <div class="col-sm-8">
                                                    <select class="form-control" id="kecamatan" name="kecamatan" oninvalid="setCustomValidity('Pilih Kecamatan Dealer Terlebih Dahulu')" onchange="try {
                                                                setCustomValidity('')
                                                            } catch (e) {
                                                            }" required/>
                                                    <option value="">--Pilih Kecamatan Dealer--</option>
                                                    <option value="Ampelgading">Ampelgading</option>
                                                    <option value="Bantarbolang">Bantarbolang</option>
                                                    <option value="Belik">Belik</option>
                                                    <option value="Bodeh">Bodeh</option>
                                                    <option value="Comal">Comal</option>
                                                    <option value="Moga">Moga</option>
                                                    <option value="Pemalang">Pemalang</option>
                                                    <option value="Petarukan">Petarukan</option>
                                                    <option value="Pulosari">Pulosari</option>
                                                    <option value="Randudongkal">Randudongkal</option>
                                                    <option value="Taman">Taman</option>
                                                    <option value="Ulujami">Ulujami</option>
                                                    <option value="Warungpring">Warungpring</option>
                                                    <option value="Watukumptul">Watukumptul</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-sm-2 control-label">Kode Pos</label>
                                                <div class="col-sm-8">
                                                    <input type="text" class="form-control" name="kdpos" id="kdpos"placeholder="Masukan Kode Pos Dealer" oninvalid="setCustomValidity('Isi Kode Pos Dealer Terlebih Dahulu')" onchange="try {
                                                                setCustomValidity('')
                                                            } catch (e) {
                                                            }" onkeyup="validAngka(this)" maxlength="5" required/>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-sm-2 control-label">Kabupaten</label>
                                                <div class="col-sm-8">
                                                    <select class="form-control" id="kabupaten" name="kabupaten" oninvalid="setCustomValidity('Pilih Kabupaten Dealer Terlebih Dahulu')" onchange="try {
                                                                setCustomValidity('')
                                                            } catch (e) {
                                                            }" required>
                                                        <option value="">--Pilih Kabupaten Dealer--</option>
                                                        <option value="Pemalang">Pemalang</option>
                                                    </select>
                                                </div>
                                            </div>   
                                            <div class="form-group">
                                                <label class="col-sm-2 control-label">No. Telepon</label>
                                                <div class="col-sm-8">
                                                    <input type="text" class="form-control" name="telepon" id="telepon" placeholder="Masukan No. Telepon Dealer, Isikan Angka 0 Jika Tidak Ada" oninvalid="setCustomValidity('Isi No. Telepon Dealer Terlebih Dahulu')" onchange="try {
                                                                setCustomValidity('')
                                                            } catch (e) {
                                                            }" onkeyup="validAngka(this)" maxlength="13" required/>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-sm-2 control-label">Pelayanan</label>
                                                <div class="col-sm-8">
                                                    <label class="checkbox-inline" for="Penjualan" cursor="pointer">
                                                        <input type="checkbox" name="pelayanan[]" value=" Penjualan" id="Penjualan">Penjualan
                                                    </label>
                                                    <label class="checkbox-inline" for="Bengkel" cursor="pointer">
                                                        <input type="checkbox" name="pelayanan[]" value=" Bengkel" id="Bengkel">Bengkel
                                                    </label>
                                                    <label class="checkbox-inline" for="Sukucadang" cursor="pointer">
                                                        <input type="checkbox" name="pelayanan[]" value=" Suku Cadang" id="Sukucadang">Suku Cadang
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-sm-2 control-label">Fasilitas</label>
                                                <div class="col-sm-3">
                                                    <div class="checkbox">
                                                        <label for="TV" cursor="pointer">
                                                            <input type="checkbox" name="fasilitas[]" value=" TV" id="TV">TV
                                                        </label>
                                                    </div>
                                                    <div class="checkbox">
                                                        <label for="WIFI" cursor="pointer"> 
                                                            <input type="checkbox" name="fasilitas[]" value=" WIFI" id="WIFI">WIFI
                                                        </label>
                                                    </div>
                                                    <div class="checkbox">
                                                        <label for="Toilet" cursor="pointer"> 
                                                            <input type="checkbox" name="fasilitas[]" value=" Toilet" id="Toilet">Toilet
                                                        </label>
                                                    </div>
                                                    <div class="checkbox">
                                                        <label for="Koran" cursor="pointer">
                                                            <input type="checkbox" name="fasilitas[]" value=" Koran" id="Koran">Koran
                                                        </label>
                                                    </div>
                                                    <div class="checkbox">
                                                        <label for="Kipas" cursor="pointer"> 
                                                            <input type="checkbox" name="fasilitas[]" value=" Kipas Angin" id="Kipas">Kipas Angin
                                                        </label>
                                                    </div>
                                                    <div class="checkbox">
                                                        <label for="Permen" cursor="pointer"> 
                                                            <input type="checkbox" name="fasilitas[]" value=" Permen" id="Permen">Permen
                                                        </label>
                                                    </div>
                                                    <div class="checkbox">
                                                        <label for="Minum" cursor="pointer"> 
                                                            <input type="checkbox" name="fasilitas[]" value=" Air Minum" id="Minum">Air Minum
                                                        </label>
                                                    </div>
                                                    <div class="checkbox">
                                                        <label for="Angsuran" cursor="pointer"> 
                                                            <input type="checkbox" name="fasilitas[]" value=" Angsuran di Tempat" id="Angsuran">Angsuran di Tempat
                                                        </label>
                                                    </div>
                                                    <div class="checkbox">
                                                        <label for="Biro" cursor="pointer">
                                                            <input type="checkbox" name="fasilitas[]" value=" Biro Jasa" id="Biro">Biro Jasa
                                                        </label>
                                                    </div>
                                                    <div class="checkbox">
                                                        <label for="Ruang" cursor="pointer">
                                                            <input type="checkbox" name="fasilitas[]" value=" Ruang Tunggu AC" id="Ruang">Ruang Tunggu AC
                                                        </label>
                                                    </div>
                                                    <div class="checkbox">
                                                        <label for="RuangAC" cursor="pointer">
                                                            <input type="checkbox" name="fasilitas[]" value=" Ruang Tunggu Non AC" id="RuangAC">Ruang Tunggu Non AC
                                                        </label>
                                                    </div>
                                                    <div class="checkbox">
                                                        <label for="Area" cursor="pointer">
                                                            <input type="checkbox" name="fasilitas[]" value=" Area Bermain Anak" id="Area">Area Bermain Anak
                                                        </label>
                                                    </div>
                                                    <div class="checkbox">
                                                        <label for="Pijat" cursor="pointer"> 
                                                            <input type="checkbox" name="fasilitas[]" value=" Kursi Pijat" id="Pijat">Kursi Pijat
                                                        </label>
                                                    </div>
                                                    <div class="checkbox">
                                                        <label for="Cucimotor" cursor="pointer">
                                                            <input type="checkbox" name="fasilitas[]" value=" Cuci Motor Gratis" id="Cucimotor">Cuci Motor Gratis
                                                        </label>
                                                    </div>
                                                </div>
												<br/>
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
                                                            center: new google.maps.LatLng(-6.890290, 109.380663),
                                                            mapTypeId: google.maps.MapTypeId.ROADMAP
                                                        };


                                                        var map = new google.maps.Map(document.getElementById("map"),
                                                                myOptions);

                                                        var marker1 = new google.maps.Marker({
                                                            position: new google.maps.LatLng(-6.890290, 109.380663),
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
                                                    <input type="text" class="form-control" name="latitude" id="latitude" placeholder="Masukan Latitude Dealer, Isikan Angka 0 Jika Tidak Ada" oninvalid="setCustomValidity('Isi Latitude Dealer Terlebih Dahulu')" onchange="try {
                                                                setCustomValidity('')
                                                            } catch (e) {
                                                            }" onkeyup="validLatLon(this)" maxlength="10" required/>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-sm-2 control-label">Longitude</label>
                                                <div class="col-sm-8">
                                                    <input type="text" class="form-control" name="longitude" id="longitude" placeholder="Masukan Longitude Dealer, Isikan Angka 0 Jika Tidak Ada" oninvalid="setCustomValidity('Isi Longitude Dealer Terlebih Dahulu')" onchange="try {
                                                                setCustomValidity('')
                                                            } catch (e) {
                                                            }" onkeyup="validLatLon(this)" maxlength="11" required/>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-sm-2 control-label">Foto</label>
                                                <div class="col-sm-8">
                                                    <input type="file" size="15" name="fotoUpload" id="fotoUpload"/>
                                                    <p>Hanya file JPG, PNG, JPEG yang diperbolehkan, Ukuran Foto Kurang Dari 2 MB</p>
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
        <div class="clear"></div>
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
        </script>
    </body>
</html>