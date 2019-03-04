<?php
	/* ========= KALAU PAKAI MYSQLI YANG ATAS SEMUA DI REMARK, TERUS YANG INI DI UNREMARK ======== */
	 include_once "konek.php";
	 session_start();
	 $sesi = $_SESSION['admin'];
	 class usr{}
	 
	$sql = $konek->query("select * from data_bengkel order by kdbengkel desc limit 1");
	$row = $sql->fetch_assoc();
	$cekQ = $row['kdbengkel'];
	$awalQ = substr($cekQ, 0 - 4);
	$next = $awalQ + 1;
	$jkode = strlen($next);
	 
	if (!$row['kdbengkel']) {
		$no = '000';
	} else if ($jkode == 1) {
		$no = '000';
	} else if ($jkode == 2) {
		$no = '00';
	} else if ($jkode == 3) {
		$no = '0';
	} else if ($jkode == 4) {
		$no = '';
	}
	$kode = 'BK' . $no . $next;
	
	
	$kdbengkel = $_POST['kdbengkel'];
	$nmbengkel = $_POST['nmbengkel'];
	$jmlmontir = $_POST['jmlmontir'];
	$haribuka = $_POST['haribuka'];
	$jambuka = $_POST['jambuka'];
	$alamat = $_POST['alamat'];
	$kelurahan = $_POST['kelurahan'];
	$kecamatan = $_POST['kecamatan'];
	$kdpos = $_POST['kdpos'];
	$kabupaten = $_POST['kabupaten'];
	$telepon = $_POST['telepon'];
	$latitude = $_POST['latitude'];
	$longitude = $_POST['longitude'];

	 if ((empty($kdbengkel))) {
	 	$response = new usr();
	 	$response->success = 0;
	 	$response->message = "Kolom kode tidak boleh kosong";
	 	die(json_encode($response));
	 } else if ((empty($nmbengkel))) {
	 	$response = new usr();
	 	$response->success = 0;
	 	$response->message = "Kolom nama tidak boleh kosong";
	 	die(json_encode($response));
	 }else if ((empty($jmlmontir))) {
	 	$response = new usr();
	 	$response->success = 0;
	 	$response->message = "Kolom jumlah montir tidak boleh kosong";
	 	die(json_encode($response));
	} else if ((empty($haribuka))) {
	 	$response = new usr();
	 	$response->success = 0;
	 	$response->message = "Kolom hari tidak boleh kosong";
	 	die(json_encode($response));
	} else if ((empty($jambuka))) {
	 	$response = new usr();
	 	$response->success = 0;
	 	$response->message = "Kolom jam tidak boleh kosong";
	 	die(json_encode($response));
	} else if ((empty($alamat))) {
	 	$response = new usr();
	 	$response->success = 0;
	 	$response->message = "Kolom alamat tidak boleh kosong";
	 	die(json_encode($response));
	} else if ((empty($kelurahan))) {
	 	$response = new usr();
	 	$response->success = 0;
	 	$response->message = "Kolom kelurahan tidak boleh kosong";
	 	die(json_encode($response));
	} else if ((empty($kecamatan))) {
	 	$response = new usr();
	 	$response->success = 0;
	 	$response->message = "Kolom kecamatan tidak boleh kosong";
	 	die(json_encode($response));
	} else if ((empty($kdpos))) {
	 	$response = new usr();
	 	$response->success = 0;
	 	$response->message = "Kolom kdpos tidak boleh kosong";
	 	die(json_encode($response));
	} else if ((empty($kabupaten))) {
	 	$response = new usr();
	 	$response->success = 0;
	 	$response->message = "Kolom kabupaten tidak boleh kosong";
	 	die(json_encode($response));
	} else if ((empty($telepon))) {
	 	$response = new usr();
	 	$response->success = 0;
	 	$response->message = "Kolom telepon tidak boleh kosong";
	 	die(json_encode($response));
	} else if ((empty($latitude))) {
	 	$response = new usr();
	 	$response->success = 0;
	 	$response->message = "Kolom latitude tidak boleh kosong";
	 	die(json_encode($response));
	} else if ((empty($longitude))) {
	 	$response = new usr();
	 	$response->success = 0;
	 	$response->message = "Kolom longitude tidak boleh kosong";
	 	die(json_encode($response));
		
	 } else {
		 if (!empty($kdbengkel) && $password == $confirm_password){
		 	$num_rows = mysqli_num_rows(mysqli_query($con, "SELECT * FROM user WHERE kdbengkel='".$kdbengkel."'"));

		 	if ($num_rows == 0){
		 		$query = mysqli_query($con, "INSERT INTO user (kdbengkel, nmbengkel, jmlmontir, haribuka, jambuka, alamat, kelurahan, kecamatan, kdpos, kabupaten, telepon, latitude, longitude) VALUES(0,'".$kdbengkel."','".$nmbengkel."','".$jmlmontir."','".$haribuka."','".$jambuka."'),'".$alamat."','".$kelurahan."','".$kecamatan."','".$kdpos."','".$kabupaten."','".$telepon."','".$latitude."','".$longitude."')");

		 		if ($query){
		 			$response = new usr();
		 			$response->success = 1;
		 			$response->message = "berhasil, disimpan.";
		 			die(json_encode($response));

		 		} else {
		 			$response = new usr();
		 			$response->success = 0;
		 			$response->message = "kdbengkel sudah ada";
		 			die(json_encode($response));
		 		}
		 	} else {
		 		$response = new usr();
		 		$response->success = 0;
		 		$response->message = "kdbengkel sudah ada";
		 		die(json_encode($response));
		 	}
		 }
	 }

	 mysqli_close($con);

?>	