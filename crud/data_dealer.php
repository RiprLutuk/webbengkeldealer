<?php 
	include_once "konek.php";

	$query = mysqli_query($con, "SELECT * FROM data_dealer ORDER BY nmdealer ASC");
	
	$json = array();	
	$no=0;
	
	while($row = mysqli_fetch_assoc($query)){
		
		$foto = 'http://bengkeldealer.mapscrip.com/img/' . $row['foto'];
			$json[$no]['kddealer'] = $row['kddealer'];
			$json[$no]['nmdealer'] = $row['nmdealer'];
			$json[$no]['merk'] = $row['merk'];
			$json[$no]['jmlkaryawan'] = $row['jmlkaryawan'];
			$json[$no]['haribuka'] = $row['haribuka'];
			$json[$no]['jambuka'] = $row['jambuka'];
			$json[$no]['alamat'] = $row['alamat'];
			$json[$no]['kelurahan'] = $row['kelurahan'];
			$json[$no]['kecamatan'] = $row['kecamatan'];
			$json[$no]['kdpos'] = $row['kdpos'];
			$json[$no]['kabupaten'] = $row['kabupaten'];
			$json[$no]['fasilitas'] = $row['fasilitas'];
			$json[$no]['pelayanan'] = $row['pelayanan'];
			$json[$no]['telepon'] = $row['telepon'];
			$json[$no]['latitude'] = $row['latitude'];
			$json[$no]['longitude'] = $row['longitude'];
			$json[$no]['foto'] = $foto;
			
			$no++;
	}
	
	echo json_encode($json);
	
	mysqli_close($con);
?>