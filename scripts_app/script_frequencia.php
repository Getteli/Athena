<?php 
        include_once './conexao.php';

        header("Content-Type: application/json; charset=UTF-8",true);
		
        mysqli_set_charset($dbcon, "utf8");

        $mes= $_GET["mes"];

        $matricula_alu_freq= $_GET["matricula_alu_freq"];
        
        
        $data = date('Y-m-d');
        
	$ano= date('Y');

        $query = "SELECT *,DATE_FORMAT( data_freq , '%d/%c/%Y' ) AS data_freq FROM frequencia WHERE MONTH(data_freq) = '$mes' and matricula_alu_freq='$matricula_alu_freq' AND YEAR(data_freq) ='$ano' ORDER by id_freq DESC";
	$query2 = "SELECT COUNT(*) AS total FROM frequencia WHERE chamada='P' AND YEAR(data_freq) ='$ano'";
	
	$result = mysqli_query($dbcon,$query);
	$result2 = mysqli_query($dbcon,$query2);
	
	$row2 = mysqli_fetch_assoc($result2);

	while ($row = mysqli_fetch_assoc($result)){
	
	$array[] = $row + $row2;
		
			
	}
			
	echo json_encode($array);

 ?>
