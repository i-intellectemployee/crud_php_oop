<?php

$host = 'localhost';
$user = 'root';
$db = 'opp_thresaures';
$pass = '';

	try{
		$conn = new PDO("mysql:host={$host}; dbname={$db}", $user, $pass);
		$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	}
	catch(PDOException $e)
	{
		$e->getMessage();
	}



?>