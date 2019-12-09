<?php
include_once './conexao.php';
        header("Content-Type: application/json; charset=UTF-8",true);

function getMatricula(){
    $db = new DbConnect();
    mysql_set_charset('utf8');
    // array for json response
    $response = array();
    $response['error'] = false; 
    $response["aluno"] = array();

    // Mysql select query
    $result = mysql_query("SELECT * FROM aluno");
    
    while($row = mysql_fetch_array($result)){
        // temporary array to create single category
        $tmp = array();
        $tmp["matricula_alu"] = $row["matricula_alu"];
 


        // push category to final json array
        array_push($response["aluno"], $tmp);
    }
    
    // keeping response header to json    
    // echoing json result
    echo json_encode($response, JSON_UNESCAPED_UNICODE);
}

getMatricula();
?>