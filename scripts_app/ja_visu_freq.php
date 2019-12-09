<?php 
        header("Content-Type: application/json; charset=UTF-8",true);

        include_once './conexao.php';

        mysqli_set_charset($dbcon, "utf8");        

        $matricula = $_GET["matricula"];

        $query = "UPDATE frequencia set visu='1' WHERE matricula_alu_freq='$matricula'";

	$result = mysqli_query($dbcon,$query);	
	
	while ($row = mysqli_fetch_assoc($result)){
	
	$array[] = $row;
		
			
	}
			
	echo json_encode($array);	
  
 ?>