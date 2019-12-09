<?php
include_once './conexao.php';

function getTurma(){
    $db = new DbConnect();
    // array for json response
    $response = array();
    $response["turma"] = array();
    
    // Mysql select query
    $result = mysql_query("SELECT * FROM turma");
    
    while($row = mysql_fetch_array($result)){
        // temporary array to create single category
        $tmp = array();
        $tmp["id"] = $row["id_turma"];
        $tmp["numero"] = $row["num_turma"];
        
        // push category to final json array
        array_push($response["turma"], $tmp);
    }
    
    // keeping response header to json
    header('Content-Type: application/json');
    
    // echoing json result
    echo json_encode($response);
}

getTurma();
?>