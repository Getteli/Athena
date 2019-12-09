<?php
include_once './conexao.php';
        header("Content-Type: application/json; charset=UTF-8",true);
 
function getSoma(){
    $db = new DbConnect();
    mysql_set_charset('utf8');
    // array for json response
    $response = array();
    $response["aluno"] = array();
    $materia = $_GET["materia"];
    $matricula = $_GET["matricula"];
    $ano = date('Y');

	$result = mysql_query( "SELECT SUM(nota), (SUM(nota) / 3) AS valor_soma, TRUNCATE( (SUM(nota) / 3), 2) FROM nota WHERE matricula_alu_nota='$matricula' AND materia_not='$materia' AND YEAR(data_not)='$ano'");

    
    while($row = mysql_fetch_assoc($result)){
    
    
    	$array[] = $row;
    	
	/*    
	$sum = $row['valor_soma'];
	
    
    	$mediaf['numero_formatado'] = number_format($sum, 2, '.', '');
    
    	echo "A MÉDIA DAS NOTAS É : " . $mediaf['numero_formatado'];
    	*/

    }
    
    echo json_encode($array, JSON_UNESCAPED_UNICODE);
}

getSoma();
?>