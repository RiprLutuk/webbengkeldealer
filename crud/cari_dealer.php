<?php 
	include_once "konek.php";

	$nmdealer = $_POST['keyword'];

	$query = mysqli_query($con, "SELECT * FROM data_dealer WHERE nmdealer LIKE '%".$nmdealer."%'");

	$num_rows = mysqli_num_rows($query);

	if ($num_rows > 0){
		$json = '{"value":1, "results": [';

		while ($row = mysqli_fetch_array($query)){
			$foto = 'http://bengkeldealer.mapscrip.com/img/' . $row['foto'];
			$char ='"';

			$json .= '{
				"kddealer": "'.str_replace($char,'`',strip_tags($row['kddealer'])).'",
				"nmdealer": "'.str_replace($char,'`',strip_tags($row['nmdealer'])).'",
				"merk": "'.str_replace($char,'`',strip_tags($row['merk'])).'",
				"jmlkaryawan": "'.str_replace($char,'`',strip_tags($row['jmlkaryawan'])).'",
				"haribuka": "'.str_replace($char,'`',strip_tags($row['haribuka'])).'",
				"jambuka": "'.str_replace($char,'`',strip_tags($row['jambuka'])).'",
				"alamat": "'.str_replace($char,'`',strip_tags($row['alamat'])).'",
				"kelurahan": "'.str_replace($char,'`',strip_tags($row['kelurahan'])).'",
				"kecamatan": "'.str_replace($char,'`',strip_tags($row['kecamatan'])).'",
				"kdpos": "'.str_replace($char,'`',strip_tags($row['kdpos'])).'",
				"kabupaten": "'.str_replace($char,'`',strip_tags($row['kabupaten'])).'",
				"telepon": "'.str_replace($char,'`',strip_tags($row['telepon'])).'",
				"pelayanan": "'.str_replace($char,'`',strip_tags($row['pelayanan'])).'",
				"fasilitas": "'.str_replace($char,'`',strip_tags($row['fasilitas'])).'",
				"latitude": "'.str_replace($char,'`',strip_tags($row['latitude'])).'",
				"longitude": "'.str_replace($char,'`',strip_tags($row['longitude'])).'",
				"foto": "'.str_replace($char,'`',strip_tags($foto)).'"
				
			},';
		}

		$json = substr($json,0,strlen($json)-1);

		$json .= ']}';

	} else {
		$json = '{"value":0, "message": "Data tidak ditemukan."}';
	}

	echo $json;

	mysqli_close($con);
?>