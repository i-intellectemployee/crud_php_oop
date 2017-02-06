<?php
include 'config.php';
include 'classes/class_dictionary.php';

$dictionary = new dictionary($conn);
if(isset($_POST["save"]))
{
	$word = $_POST['word'];
	$meaning = $_POST['meaning'];
	$antonym = $_POST['antonym'];

	if($word == "" && $meaning == "" && $antonym == "")
	{
		header("location:index.php?alert=null");
	}
	else
	{
		if($dictionary->insertWord($word, $meaning, $antonym))
		{
			header("location:index.php?alert=insert");
		}
	}
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Dictionary</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="css/bootstrap.min.css">
 
</head>
<body>

<div class="container">
  <h2 align="center">Include More Words</h2>
  <a class = "btn btn-info bt-sm" href="test.php"> ADD WORD </a>
  
  <form method="post">
  <table align="center" class="table table-striped">
    


	
	


<tr>
	<td><span class="label label-primary">WORD</span></td>
	<td><input type="text" class="form-control" name="word"></td>

</tr>

<tr>
	<td>&nbsp</td>
	<td>&nbsp</td>
	</tr>


<tr>
	<td><span class="label label-primary" style="font-size: '30'">MEANING</span></td>
	<td><input type="text" class="form-control" name="meaning"></td>

</tr>

<tr>
	<td>&nbsp</td>
	<td>&nbsp</td>
	</tr>



<tr>
	<td><span class="label label-primary">ANTONYM</span></td>
	<td><input type="text" class="form-control" name="antonym"></td>

</tr>

<tr>
	<td>&nbsp</td>
	<td>&nbsp</td>
	</tr>


<tr>
	<td></td>

	<td><input type="submit" class="btn btn-info bt-sm" name="save" value="SAVE"></td>

</tr>

<tr>
	<td>&nbsp</td>
	<td>&nbsp</td>
	</tr>



</table>
</form>
</div>

</body>
</html>
