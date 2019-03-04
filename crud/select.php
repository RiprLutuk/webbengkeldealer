<?php 
	include "konek.php";
	
	$query = mysql_query("SELECT * FROM user ORDER BY username ASC");
	
	$json = array();
	
	while($row = mysql_fetch_assoc($query)){
		$json[] = $row;
	}
	
	echo json_encode($json);
	
	mysql_close($connect);
	
?>