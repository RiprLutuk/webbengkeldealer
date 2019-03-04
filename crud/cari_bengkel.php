<?php 
	include_once "konek.php";

	$nmbengkel = $_POST['keyword'];

	$query = mysqli_query($con, "SELECT * FROM data_bengkel WHERE nmbengkel LIKE '%".$nmbengkel."%'");

	$num_rows = mysqli_num_rows($query);

	if ($num_rows > 0){
		$json = '{"value":1, "results": [';

		while ($row = mysqli_fetch_array($query)){
			$char ='"';

			$json .= '{
				"kdbengkel": "'.str_replace($char,'`',strip_tags($row['kdbengkel'])).'",
				"nmbengkel": "'.str_replace($char,'`',strip_tags($row['nmbengkel'])).'",
				"jmlmontir": "'.str_replace($char,'`',strip_tags($row['jmlmontir'])).'",
				"haribuka": "'.str_replace($char,'`',strip_tags($row['haribuka'])).'",
				"jambuka": "'.str_replace($char,'`',strip_tags($row['jambuka'])).'",
				"alamat": "'.str_replace($char,'`',strip_tags($row['alamat'])).'",
				"kelurahan": "'.str_replace($char,'`',strip_tags($row['kelurahan'])).'",
				"kecamatan": "'.str_replace($char,'`',strip_tags($row['kecamatan'])).'",
				"kdpos": "'.str_replace($char,'`',strip_tags($row['kdpos'])).'",
				"kabupaten": "'.str_replace($char,'`',strip_tags($row['kabupaten'])).'",
				"telepon": "'.str_replace($char,'`',strip_tags($row['telepon'])).'",
				"latitude": "'.str_replace($char,'`',strip_tags($row['latitude'])).'",
				"longitude": "'.str_replace($char,'`',strip_tags($row['longitude'])).'",
				"foto": "'.str_replace($char,'`',strip_tags($row['foto'])).'"
				
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