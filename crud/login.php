<?php
	session_start();
	include_once "konek.php";

	class usr{}
	 if(!isset($_SESSION["admin"])){
		 if (isset($_POST['username'])){
	 $username = $_POST["username"];
	 $password = md5($_POST["password"]);
	
	 if ((empty($username)) || (empty($password))) { 
	 	$response = new usr();
	 	$response->success = 0;
	 	$response->message = "Kolom tidak boleh kosong"; 
	 	die(json_encode($response));
	 }
	
	 $query = mysqli_query($con, "SELECT * FROM user WHERE username='$username' AND password='$password'");
	
	 $row = mysqli_fetch_array($query);
	
	 if (!empty($row)){
	 	$response = new usr();
	 	$response->success = 1;
	 	$response->message = "Selamat datang ".$row['username'];
	 	$response->id = $row['id'];
	 	$response->username = $row['username'];
		$response->email = $row['email'];
		$_SESSION ['admin'] = $username;
	 	die(json_encode($response));
		
	 } else { 
	 	$response = new usr();
	 	$response->success = 0;
	 	$response->message = "Username atau password salah";
	 	die(json_encode($response));
	 }
	
	 mysqli_close($con);
	 }
	 }
?>