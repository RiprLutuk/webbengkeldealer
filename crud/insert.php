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
		$query = mysql_query("INSERT INTO user (username,email,password) VALUES(username,'".$email."','".$password."')");
		
		if ($query) {
			$response = new emp();
			$response->success = 1;
			$response->message = "Data berhasil di simpan";
			die(json_encode($response));
		} else{ 
			$response = new emp();
			$response->success = 0;
			$response->message = "Error simpan Data";
			die(json_encode($response)); 
		}	
	}
?>