<?php 
        include_once './conexao.php';

        header("Content-Type: application/json; charset=UTF-8",true);
        
        mysqli_set_charset($dbcon, "utf8");        

        $mes= $_GET["mes"];

        $matricula_alu_agen= $_GET["matricula_alu_agen"];
        
        $turma = $_GET["turma_aluno"];
        
        $ano = date('Y');

        $query = "SELECT *,DATE_FORMAT( data_agen , '%d/%c/%Y %H:%i:%s' ) AS data_agen FROM agenda WHERE MONTH(data_agen) = '$mes' AND matricula_alu_agen='$matricula_alu_agen' AND nome_aluno='' AND YEAR(data_agen) ='$ano' OR MONTH(data_agen) = '$mes' AND matricula_alu_agen is null AND nome_aluno='' AND YEAR(data_agen) ='$ano' OR MONTH(data_agen) = '$mes' AND matricula_alu_agen='$matricula_alu_agen' AND nome_aluno='3' AND YEAR(data_agen) ='$ano' OR MONTH(data_agen) = '$mes' AND matricula_alu_agen is null AND nome_aluno='3' AND turma_aluno = '3' AND YEAR(data_agen) ='$ano' OR MONTH(data_agen) = '$mes' AND matricula_alu_agen is null AND nome_aluno='3' AND turma_aluno='$turma' AND YEAR(data_agen) ='$ano' ORDER by id_agen DESC";

	$result = mysqli_query($dbcon,$query);

	while ($row = mysqli_fetch_assoc($result)) {
			
		$array[] = $row;

	}

	echo json_encode($array,JSON_UNESCAPED_UNICODE);
  
 ?>
