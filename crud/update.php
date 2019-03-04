<?php
	include "konek.php";
	
	$username 	= $_POST['username'];
	$email = $_POST['email'];
	$password = $_POST['password'];
	
	class emp{}
	
	if (empty($username) || empty($email) || empty($password)) { 
		$response = new emp();
		$response->success = 0;
		$response->message = "Kolom isian tidak boleh kosong"; 
		die(json_encode($response));
	} else {
		$query = mysql_query("UPDATE user SET email='".$email."', password='".$password."' WHERE username='".$username."'");
		
		if ($query) {
			$response = new emp();
			$response->success = 1;
			$response->message = "Data berhasil di update";
			die(json_encode($response));
		} else{ 
			$response = new emp();
			$response->success = 0;
			$response->message = "Error update Data";
			die(json_encode($response)); 
		}	
	}
?>