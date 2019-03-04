<?php
include './config/koneksi.php';
session_start();
	$sesi = $_SESSION['admin'];
	if(!isset($sesi)) {
		header("location: index.php");
	}

//ambil data
$kddealer = $_GET['kddealer'];
$stmt = $db->prepare('delete from data_dealer where kddealer=:kddealer');
$stmt->bindValue(":kddealer", $kddealer, PDO::PARAM_STR);
$stmt->execute();

if($stmt->rowCount() > 0) { //jika data berhasil dihapus
	?>
	<script>
		alert("Data berhasil dihapus");
		window.location="data_dealer.php";
	</script>
	<?php
}else { //jika data tidak berhasil dihapus
	?>
	<script>
		alert("Data gagal dihapus");
		window.location="data_dealer.php";
	</script>
	<?php
}
?>