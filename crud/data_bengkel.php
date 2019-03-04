<?php 
	include_once "konek.php";

	$query = mysqli_query($con, "SELECT * FROM data_bengkel ORDER BY nmbengkel ASC");
	
	$json = array();
	$no=0;	
	
	while($row = mysqli_fetch_assoc($query)){
		$foto = 'http://192.168.43.60/bengkeldealer/img/' . $row['foto'];
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
			
			$no++;
	}
	
	echo json_encode($json);
	
	mysqli_close($con);
?>