<?php
	$db_host = 'localhost';
	$db_user = 'root';
	$db_pass = '';
	$db_name = 'bengkeldealer';

    try{
        $db = new PDO("mysql:host=$db_host;dbname=$db_name",$db_user,$db_pass);
    }catch(Exception $error){
        echo 'Koneksi Gagal, terjadi kesalahan : '.$error;
    }
?>
