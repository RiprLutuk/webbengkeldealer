<?php
include './config/koneksi.php';
session_start();
	$sesi = $_SESSION['admin'];
	if(!isset($sesi)) {
		header("location: index.php");
	}

//ambil data
$kdbengkel = $_GET['kdbengkel'];
$stmt = $db->prepare('delete from data_bengkel where kdbengkel=:kdbengkel');
$stmt->bindValue(":kdbengkel", $kdbengkel, PDO::PARAM_STR);
$stmt->execute();

if($stmt->rowCount() > 0) { //jika data berhasil dihapus
	?>
	<script>
		alert("Data berhasil dihapus");
		window.location="data_bengkel.php";
	</script>
	<?php
}else { //jika data tidak berhasil dihapus
	?>
	<script>
		alert("Data gagal dihapus");
		window.location="data_bengkel.php";
	</script>
	<?php
}
?>