<?php

include '../config/koneksi.php';

	$latitude = $_GET['latitude'];
	$longitude = $_GET['longitude'];

	// perhitungan haversine formula pada sintak SQL
	$stmt = $db->prepare("SELECT kdbengkel, nmbengkel, jmlmontir, haribuka, jambuka, alamat, kelurahan, kecamatan, kdpos, kabupaten, latitude, longitude, telepon, foto,
	 (6371 * ACOS(SIN(RADIANS(latitude)) * SIN(RADIANS($latitude)) + COS(RADIANS(longitude - $longitude)) * COS(RADIANS(latitude)) * COS(RADIANS($latitude)))) 
	 AS jarak FROM data_bengkel HAVING jarak < 6371 ORDER BY jarak ASC LIMIT 0,8");
	$stmt->bindValue(":latitude", $latitude, PDO::PARAM_STR);
	$stmt->bindValue(":longitude", $longitude, PDO::PARAM_STR);
	$stmt->execute();
	//var_dump($stmt->errorInfo());
	//die;
	$json = array();
	$no = 0;

	while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
		$foto = 'http://bengkeldealer.mapscrip.com/img/' . $row['foto'];
			$json[$no]['kdbengkel'] = $row['kdbengkel'];
			$json[$no]['nmbengkel'] = $row['nmbengkel'];
			$json[$no]['jmlmontir'] = $row['jmlmontir'];
			$json[$no]['haribuka'] = $row['haribuka'];
			$json[$no]['jambuka'] = $row['jambuka'];
			$json[$no]['alamat'] = $row['alamat'];
			$json[$no]['kelurahan'] = $row['kelurahan'];
			$json[$no]['kecamatan'] = $row['kecamatan'];
			$json[$no]['kdpos'] = $row['kdpos'];
			$json[$no]['kabupaten'] = $row['kabupaten'];
			$json[$no]['telepon'] = $row['telepon'];
			$json[$no]['latitude'] = $row['latitude'];
			$json[$no]['longitude'] = $row['longitude'];
			$json[$no]['foto'] = $foto;
			$json[$no]['jarak'] = $row['jarak'];
			
			$no++;
	}

	echo json_encode($json, JSON_UNESCAPED_SLASHES);
	?>