<?php 
        header("Content-Type: application/json; charset=UTF-8",true);

        include_once './conexao.php';

        mysqli_set_charset($dbcon, "utf8");        

        $id = $_GET["id"];

        $query = "SELECT foto_aluno FROM aluno WHERE id_aluno='$id'";

	$result = mysqli_query($dbcon,$query);
	
	$photo = mysqli_fetch_array($result); 
	
	header('Content-Type:image/jpeg'); 
	
	echo $photo['foto_aluno']; 
	
  
 ?>