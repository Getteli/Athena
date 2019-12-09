<?php 
        include_once './conexao.php';

        header("Content-Type: application/json; charset=UTF-8",true);

        mysqli_set_charset($dbcon, "utf8");

        $epoca = $_GET["epoca"];
        $matricula_alu_nota= $_GET["matricula_alu_nota"];
        $materia= $_GET["materia"];

	$ano = date('Y');
	
	$query = "Select *,DATE_FORMAT( data_not , '%d/%c/%Y' ) AS data_not  from nota where epoca='$epoca' and matricula_alu_nota='$matricula_alu_nota' and materia_not='$materia' AND YEAR(data_not) ='$ano' ORDER by id_nota DESC"; 
        

	$result = mysqli_query($dbcon,$query);

	while ($row = mysqli_fetch_assoc($result)) {
			
		$array[] = $row;	
	}
	
	echo json_encode($array, JSON_UNESCAPED_UNICODE);
  
 ?>