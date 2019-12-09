<?php 
        include_once './conexao.php';

        header("Content-Type: application/json; charset=UTF-8",true);
        
        mysqli_set_charset($dbcon, "utf8");        

	//$id = $_GET["id"];

        $mes= $_GET["mes"];

        $matricula_prof_agen= $_GET["matricula_prof_agen"];

	//$query = "Select * from agenda where id between ($id+1) and ($id+999)";

        $query = "SELECT *,DATE_FORMAT( data_agen , '%d/%c/%Y %H:%i:%s' ) AS data_agen  FROM agenda WHERE MONTH(data_agen) = '$mes' AND matricula_prof_agen='$matricula_prof_agen'  AND remedio1='0' ORDER by id_agen DESC";

	$result = mysqli_query($dbcon,$query);

	while ($row = mysqli_fetch_assoc($result)) {
			
		$array[] = $row;	
	}

	echo json_encode($array, JSON_UNESCAPED_UNICODE);
  
 ?>