<?php

include 'config.php';
include 'classes/class_dictionary.php';

$dictionary = new dictionary($conn);

	if($_GET)
	{
		$id = $_GET['id'];
		if($dictionary->deleteWord($id))
		{
			header("location:index.php?alert=delete");
		}
	}



?>