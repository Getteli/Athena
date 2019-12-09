<?php

include_once './conexao.php';

function createNovaChamada() {

    if (isset($_POST["chamada"])!= "") {
    
        // response array for json
        $response = array();
        $lancarsituacao = $_POST["chamada"];
        $lancarmataluno = $_POST["mataluno"];
        $lancarmatprof = $_POST["matprof"];
       
        $db = new DbConnect();
   
        $dia = date('d');
        $mes = date('m');
      
	$sql = "SELECT COUNT(*) AS total FROM frequencia WHERE MONTH(data_freq) = '$mes' and DAY(data_freq) = '$dia' and matricula_alu_freq='$lancarmataluno'";
	
	$dadosF = mysql_query($sql);
	
	while($totalF = mysql_fetch_assoc($dadosF)){
	
	$total = $totalF['total'];
	
	}
        
        if ($total < 1) {
     
        // mysql query
        $query = "INSERT INTO frequencia(chamada, matricula_alu_freq, matricula_prof_freq) VALUES ('$lancarsituacao','$lancarmataluno','$lancarmatprof')";

        $result = mysql_query($query) or die(mysql_error());
        
	        if ($result) {
	        
	            $response["error"] = false;
	            $response["message"] = "Nova chamada enviada!";

	            
	        }else {
	        
	            $response["error"] = true;
	            $response["message"] = "Falha ao enviar a nova nota!";
	            
	        }
        
        }else if ($total == 1){
        
        $response["error"] = true;
        $response["message"] = "já existe!";
        
        }
        
    }else {
        $response["error"] = true;
        $response["message"] = "Campo perdido, entre em contato com o suporte!";
    }
    
    echo json_encode($response, JSON_UNESCAPED_UNICODE);
}

createNovaChamada();
?>