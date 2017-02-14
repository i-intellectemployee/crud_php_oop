<?php

$conn = new mysqli("localhost", "root", "", "opp_thresaures");

$term = $_REQUEST['search'];

	$query = "SELECT word FROM thresaures where word like '%{$term}%'";
	
	$data= $conn->query($query);
	
	while($result=$data->fetch_assoc()){
		echo "$result[word]<br>";
		echo "$result[meaning]<br>";
		echo "$result[antonym]<br>";
	}

?>