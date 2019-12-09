<?php 
        include_once './conexao.php';

        mysqli_set_charset($dbcon, "utf8");

	$id = $_GET["id"];

	$query = "Select * from aluno where id_aluno between ($id+1) and ($id+999)";

	$result = mysqli_query($dbcon,$query);

	while ($row = mysqli_fetch_assoc($result)) {
			
		$array[] = $row;	
	}

	header('Content-Type:Application/json');
	echo json_encode($array);
  
 ?>
