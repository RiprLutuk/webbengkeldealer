<?php
include "./config/koneksi.php";
session_start();
$sesi = $_SESSION['admin'];
if (!isset($sesi)) {
    header("location: index.php");
}

// ambil data dari tambah_dealer.php
$kddealer = $_POST['kddealer'];
$nmdealer = $_POST['nmdealer'];
$merk = $_POST['merk'];
$jmlkaryawan = $_POST['jmlkaryawan'];
$haribuka = $_POST['haribuka'];
$jambuka = $_POST['jambuka'];
$alamat = $_POST['alamat'];
$kelurahan = $_POST['kelurahan'];
$kecamatan = $_POST['kecamatan'];
$kdpos = $_POST['kdpos'];
$kabupaten = $_POST['kabupaten'];
$telepon = $_POST['telepon'];
$pelayanan = implode(",", $_POST['pelayanan']);
$fasilitas = implode(",", $_POST['fasilitas']);
$latitude = $_POST['latitude'];
$longitude = $_POST['longitude'];

$target_dir = "img/";
$target_file = $target_dir . basename($_FILES["fotoUpload"]["name"]);
$uploadOk = 1;
$imageFileType = pathinfo($target_file, PATHINFO_EXTENSION);
$foto = $kddealer . "." . $imageFileType;

date_default_timezone_set('Asia/Jakarta');
$waktu = date("Y-m-d H:i:s");

//validasi kddealer
$stmt = $db->prepare('select * from data_dealer where kddealer=:kddealer');
$stmt->bindValue(":kddealer", $kddealer, PDO::PARAM_STR);
$stmt->execute();

//cek validasi (ada atau tidaknya dealer dengan kddealer tersebut)
if ($stmt->rowCount() > 0) { //jika sudah ada
    ?>
    <script>
        alert("Data dengan kddealer : <?php echo $kddealer; ?> SUDAH ADA");
        window.history.back();
    </script>	
    <?php
} else { //jika kddealer belum ada
    //proses penyimpanan
    $stmt = $db->prepare('insert into data_dealer values(:kddealer,:nmdealer,:merk,:jmlkaryawan,'
            . ':haribuka,:jambuka,:alamat,:kelurahan,:kecamatan,:kdpos,:kabupaten,'
            . ':telepon,:pelayanan,:fasilitas,:latitude,:longitude,:foto,:username,:waktu)');

    $stmt->bindValue(":kddealer", $kddealer, PDO::PARAM_STR);
    $stmt->bindValue(":nmdealer", $nmdealer, PDO::PARAM_STR);
    $stmt->bindValue(":merk", $merk, PDO::PARAM_STR);
    $stmt->bindValue(":jmlkaryawan", $jmlkaryawan, PDO::PARAM_STR);
    $stmt->bindValue(":haribuka", $haribuka, PDO::PARAM_STR);
    $stmt->bindValue(":jambuka", $jambuka, PDO::PARAM_STR);
    $stmt->bindValue(":alamat", $alamat, PDO::PARAM_STR);
    $stmt->bindValue(":kelurahan", $kelurahan, PDO::PARAM_STR);
    $stmt->bindValue(":kecamatan", $kecamatan, PDO::PARAM_STR);
    $stmt->bindValue(":kdpos", $kdpos, PDO::PARAM_STR);
    $stmt->bindValue(":kabupaten", $kabupaten, PDO::PARAM_STR);
    $stmt->bindValue(":telepon", $telepon, PDO::PARAM_STR);
    $stmt->bindValue(":pelayanan", $pelayanan, PDO::PARAM_STR);
    $stmt->bindValue(":fasilitas", $fasilitas, PDO::PARAM_STR);
    $stmt->bindValue(":latitude", $latitude, PDO::PARAM_STR);
    $stmt->bindValue(":longitude", $longitude, PDO::PARAM_STR);
    $stmt->bindValue(":foto", $foto, PDO::PARAM_STR);
    $stmt->bindValue(":username", $sesi, PDO::PARAM_STR);
    $stmt->bindValue(":waktu", $waktu, PDO::PARAM_STR);
    $stmt->execute();
    /* var_dump($stmt->errorInfo());
      die; */

    //cek foto
    if (isset($_POST["submit"])) {
        $check = getimagesize($_FILES["foToUpload"]["tmp_name"]);
        if ($check !== false) {
            echo "File adalah foto. ";
            $uploadOk = 1;
        } else {
            echo "File bukan foto.";
            $uploadOk = 0;
        }
    }

    //Cek file foto sudah ada
    if (file_exists($target_file)) {
        echo "Foto sudah ada.";
        $uploadOk = 0;
    }

    //Cek ukuran file
    if ($_FILES["fotoUpload"]["size"] > 2000000) {
        echo "Ukuran foto terlalu besar.";
        $uploadOk = 0;
    }

    //Cek format file
    if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != 'JPG') {
        echo "Hanya file JPG, JPEG, PNG yang diperbolehkan.";
        $uploadOk = 0;
    }

    //Jika upload error
    if ($uploadOk == 0) {
        echo "File belum terupload.";
        //Jika upload berhasil
    } else {
        if (move_uploaded_file($_FILES["fotoUpload"]["tmp_name"], $target_dir . $kddealer . "." . $imageFileType)) {
            echo "File " . basename($_FILES["fotoUpload"]["name"]) . " telah di uploaded.";
        } else {
            echo "Terjadi kesalahan mengupload.";
        }
    }

    //cek apakah proses penyimpanan berhasil atau tidaknya
    if ($stmt->rowCount() > 0) {// jika penyimpanan berhasil
        ?>
        <script>
            alert("Proses penyimpanan berhasil");
            window.location = "data_dealer.php";
        </script>
        <?php
    } else { //jika penyimpanan gagal
        ?>
        <script>
            alert("Proses penyimpanan gagal");
            window.history.back();
        </script>
        <?php
    }
}
?>