<?php

include_once './conexao.php';

function createNovaNota() {
    if (isset($_POST["media"])!= "") {
        // response array for json
        $response = array();
        $lancarnota = $_POST["media"];
        $lancarepoca = $_POST["epoca"];
        $lancarmateria = $_POST["materia"];
        $lancarmataluno = $_POST["mataluno"];
        $lancarmatprof = $_POST["matprof"];

        $db = new DbConnect();
        
                // mysql query
        $query = "SELECT nota FROM nota WHERE materia_not='$lancarmateria' and epoca='$lancarepoca' and matricula_alu_nota='$lancarmataluno'";
        $result = mysql_query($query) or die(mysql_error());
        $tst= mysql_fetch_array($result,MYSQLI_ASSOC); 
        $tst['nota'];
       if ($tst =="") {
              
        // mysql query
        $query = "INSERT INTO nota(nota,epoca,materia_not,matricula_alu_nota, matricula_prof_nota) VALUES('$lancarnota','$lancarepoca','$lancarmateria','$lancarmataluno','$lancarmatprof')";
        $result = mysql_query($query) or die(mysql_error());
       if ($result) {
            $response["error"] = false;
            $response["message"] = "Nova Nota enviada!";
        } else {
            $response["error"] = true;
            $response["message"] = "Falha ao enviar a nova nota!";
        }
        }else if ($tst !=""){
        $response["error"] = true;
         $response["message"] = "Já Existe Uma Nota Nessa Materia Neste Trimestre!";
         }

    } else {
        $response["error"] = true;
        $response["message"] = "Campo perdido, entre em contato com o suporte!";
    }
    
    // echo json response
	header('Content-Type:Application/json; charset=UTF-8');
$str = str_replace('\u','u',$decoded);
$strJSON = preg_replace('/u([\da-fA-F]{4})/', '&#x\1;', $str);
    echo json_encode($response, JSON_UNESCAPED_UNICODE);
}

createNovaNota();
?>