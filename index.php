<?php


include 'config.php';
include 'classes/class_dictionary.php';


	$dictionary = new dictionary($conn);

	
	?>


<!DOCTYPE html>
<html lang="en">
<head>
  <title>Dictionary</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <script src="jquery.js"></script>
 


</head>
<body>

<input type="text" id="search">
<div id="result"></div>

<script id="source" language="javascript" type="text/javascript">

$(search).on("input", function(){

	$search= $("#search").val();
	if($search.length>0){
		$.get("search.php", {"search":$search}, function($data){
			$("#result").html($data);
		})
	}


});
	


</script>

<div class="container">
<?php

if(isset($_GET['alert']))
	{
		$al = $_GET['alert'];
		
			if($al == "delete")
			{
				$alert = '<div class="alert alert-success alert-dismissable">
				<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
						<strong>Success!</strong> Data is Deleted..
						</div>';
				$dictionary->alert($alert);
			}
			elseif($al == "update")
			{
			$alert = '<div class="alert alert-success alert-dismissable">
				<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
						<strong>Success!</strong> Data is Updated..
						</div>';
				$dictionary->alert($alert);
			}
			
			elseif($al == "insert")
			{
			$alert = '<div class="alert alert-success alert-dismissable">
				<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
						<strong>Success!</strong> Data is Inserted..
						</div>';
				$dictionary->alert($alert);
			}

			elseif($al == "null")
			{
			$alert = '<div class="alert alert-success alert-dismissable">
				<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
						<strong>Failed!</strong> No Data Entered..
						</div>';
				$dictionary->alert($alert);	
				
			}
			

			
	}
	?>
  <h2 align="center">Data Dictionary</h2>
<table align="center" class="table table-striped">
  <thead>
   <tr>
      	<td>&nbsp</td>
      	<td align="left"><a class = "btn btn-info bt-sm" href="test.php"> ADD WORD </a></td>
      	</tr>
  
    
      <tr>
      	<th>No</th>
        <th>Words</th>
        <th>Meanings</th>
        <th>Antonyms</th>
        <th>CRUD</th>
      </tr>
    </thead>
    <tbody>
     <?php
     //table dictionary
     $query = "SELECT * FROM thresaures ORDER BY id DESC";
     $dictionary->viewWord($query);
     ?>
     
    </tbody>
  </table>
</div>

</body>
</html>
