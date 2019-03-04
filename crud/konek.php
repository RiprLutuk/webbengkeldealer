<?php
    $server		= "localhost"; //sesuaikan dengan nama server
	$user		= "mapscrip_mapscrip"; //sesuaikan username
	$password	= "STMIKWP2014"; //sesuaikan password
	$database	= "mapscrip_bengkeldealer"; //sesuaikan target databese

    $con = mysqli_connect($server, $user, $password, $database);
	if (mysqli_connect_errno()) {
	echo "Gagal terhubung MySQL: " . mysqli_connect_error();
	}
?>