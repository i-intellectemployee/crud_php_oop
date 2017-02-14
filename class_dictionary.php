<?php

	class dictionary{
		
		private $db;
		
		function __construct($conn)
		{
				$this->db = $conn;
		}
		
		
		//INSERTING New words, meanings and antonym
		
		public function insertWord($word, $meaning, $antonym)
		{
			
			$data = $this->db->prepare("INSERT INTO thresaures (word, meaning, antonym) VALUES (:word, :meaning, :antonym)");
			$data->execute(array(":word"=>$word, ":meaning"=>$meaning, ":antonym"=>$antonym));
			return $data;
		}
		
		
		//UPDATE New words, meanings and antonyms
		
		public function updateWord($word, $meaning, $antonym, $id)
		{
			try{
				$data = $this->db->prepare("UPDATE thresaures SET word = :word , meaning = :meaning, antonym = :antonym WHERE id = :id");
				$data->execute(array(":word"=>$word, ":meaning"=>$meaning, ":antonym"=>$antonym, ":id"=>$id));
				return $data;
				
			} catch(Exception $e){
			
			}
		}

		public function searchWord($search, $max){

			$search = "%" . $search . "%";

			if($max == 0){
				$query = "SELECT * FROM thresaures WHERE word LIKE ?";
			}
			else{
				$query = "SELECT * FROM thresaures WHERE word LIKE ? LIMIT $max";
			}
			try{
				$data = $this->db->prepare($query);
				$data->bindParam(1, $search);
				$data->execute();
				
				}catch(PDOException $e){
					echo $e->getMessage();
				}

				$result = $data->fetchAll(PDO::FETCH_ASSOC);

				if($data->rowCount()!=0){

					foreach ($result as $row) {
						$this->word[] = $row['word'];
						$this->meaning[] = $row['meaning'];
						$this->antonym[] = $row['antonym'];
						$this->id[] = $row['id'];

					}

				}


			
		}



		//DELETE 
		
		public function deleteWord($id)
		{
		$data = $this->db->prepare("DELETE FROM thresaures WHERE id = :id");
		$data->execute(array(":id"=>$id));
		return $data;
		}

		//GET ID ROW
		
		public function getIDword($id)
		{
			$data = $this->db->prepare("SELECT * FROM thresaures WHERE id = :id");
			$data->execute(array(":id"=>$id));
			return $data;			
		}

		//EDIT RECORD

		public function editWord($id)
		{
			$data = $this->db->prepare("SELECT * FROM thresaures WHERE id = :id");
			$data->execute(array(":id"=>$id));
			$result = $data->fetch(PDO::FETCH_LAZY);
			?>
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
  
  
  <form method="post">
  <table align="center" class="table table-striped">
    


<tr>
	<td></td>
	<td><input type="text" class="form-control" name="id" value="<?php echo $result[0]; ?>" hidden></td>

</tr>	
	


<tr>
	<td><span class="label label-primary">WORD</span></td>
	<td><input type="text" class="form-control" name="word" value="<?php echo $result[1]; ?>"></td>

</tr>

<tr>
	<td>&nbsp</td>
	<td>&nbsp</td>
	</tr>



<tr>
	<td><span class="label label-primary" style="font-size: '30'">MEANING</span></td>
	<td><input type="text" class="form-control" name="meaning" value="<?php echo $result[2]; ?>"></td>

</tr>

<tr>
	<td>&nbsp</td>
	<td>&nbsp</td>
	</tr>



<tr>
	<td><span class="label label-primary">ANTONYM</span></td>
	<td><input type="text" class="form-control" name="antonym" value="<?php echo $result[3]; ?>"></td>

</tr>

<tr>
	<td>&nbsp</td>
	<td>&nbsp</td>
	</tr>


<tr>
	<td></td>

	<td><input type="submit" class="btn btn-info bt-sm" name="update" value="Update"></td>

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

<?php

	

		}
		
		//VIEW word, meaning and antonym
		
		public function viewWord($query)
		{
		$data = $this->db->prepare($query);
		$data->execute();
		$no = 1;
		
			if($data->rowCount()>0)
			{
				while($result = $data->fetch(PDO::FETCH_LAZY))
				{
					?>
					<tr>
						<td><?php echo $no;?></td>
						<td><?php echo $result->word; ?> </td>
						<td><?php echo $result->meaning; ?> </td>
						<td><?php echo $result->antonym; ?> </td>
						<td>
						<a href="edit.php?id= <?php echo $result->id; ?> " >EDIT</a>
						<a href="delete.php?id= <?php echo $result->id; ?>">DELETE</a>	
							
						</td>
					</tr>

					<?php
					
						$no++;
					
				}
			}
			else
			{
				echo "<h2>NO DATA</h2>";
			}
		}






		
		public function alert($alert)
		{
			echo $alert;
		}

		


		
	
	
	}
?>