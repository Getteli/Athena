<?php
include_once './conexao.php';
        header("Content-Type: application/json; charset=UTF-8",true);

function getMatricula(){
    $db = new DbConnect();
    mysql_set_charset('utf8');
    // array for json response
    $response = array();
    $response["professor"] = array();
    $email= $_GET["email"];

    // Mysql select query
    $result = mysql_query("SELECT * FROM professor WHERE email_prof='$email'");
    
    while($row = mysql_fetch_array($result)){
        // temporary array to create single category
        $tmp = array();
        $tmp["id"] = $row["id_professor"];
        $tmp["matricula"] = $row["matricula_prof"];
        $tmp["nome"] = $row["nome_prof"];
        $tmp["turma"] = $row["turma"];


        // push category to final json array
        array_push($response["professor"], $tmp);
    }
    
    // keeping response header to json    
    // echoing json result
    echo json_encode($response, JSON_UNESCAPED_UNICODE);
}

getMatricula();
?>