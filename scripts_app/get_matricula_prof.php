<?php
include_once './conexao.php';
        header("Content-Type: application/json; charset=UTF-8",true);

function getMatriculaProf(){
    $db = new DbConnect();
    mysql_set_charset('utf8');
    // array for json response
    $response = array();
    $response["professor"] = array();
    $turma= $_GET["turma"];

    // Mysql select query
    $result = mysql_query("SELECT * FROM turma WHERE num_turma='$turma'");
    
    while($row = mysql_fetch_array($result)){
        // temporary array to create single category
        $tmp = array();
        $tmp["id"] = $row["id_turma"];
        $tmp["matricula"] = $row["matricula_prof_turm"];
        $tmp["nome"] = $row["turno_turma"];
        $tmp["turma"] = $row["num_turma"];


        // push category to final json array
        array_push($response["professor"], $tmp);
    }
    
    // keeping response header to json    
    // echoing json result
    echo json_encode($response, JSON_UNESCAPED_UNICODE);
}

getMatriculaProf();
?>