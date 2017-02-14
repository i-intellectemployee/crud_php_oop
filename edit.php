<?php
include 'config.php';
include 'classes/class_dictionary.php';

$dictionary = new dictionary($conn);
if(isset($_GET["id"]))
{
	$id = $_GET ['id'];
	$edit = $dictionary->editWord($id);
}

if(isset($_POST['update']))
{
	$word = $_POST['word'];
	$meaning = $_POST['meaning'];
	$antonym = $_POST['antonym'];
	$id = $_POST['id'];
	if($word == "" && $meaning == "" && $antonym == "")
	{
		header("location:index.php?alert=null");
	}
	else
	{
		if($dictionary->updateWord($word, $meaning, $antonym, $id))
		{
			header("location:index.php?alert=update");
		}
	}
}


?>



