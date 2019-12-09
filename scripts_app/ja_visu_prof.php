<?php 
        header("Content-Type: application/json; charset=UTF-8",true);

        include_once './conexao.php';

        mysqli_set_charset($dbcon, "utf8");        

        $matricula = $_GET["matricula"];

        $query = "UPDATE agenda SET visu ='1' WHERE matricula_prof_agen ='$matricula' AND remedio1='0'";

	$result = mysqli_query($dbcon,$query);	
	
	while ($row = mysqli_fetch_assoc($result)){
	
	$array[] = $row;
		
			
	}
			
	echo json_encode($array);	
  
 ?>