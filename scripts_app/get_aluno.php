<?php
include_once './conexao.php';
        header("Content-Type: application/json; charset=UTF-8",true);

function getAlunos(){
    $db = new DbConnect();
    mysql_set_charset('utf8');
    // array for json response
    $response = array();
    $response["aluno"] = array();
    $turma = $_GET["turma"];

    // Mysql select query
    $result = mysql_query("SELECT * FROM aluno WHERE turma_fk='$turma'");
    
    while($row = mysql_fetch_array($result)){
        // temporary array to create single category
        $tmp = array();
        $tmp["id"] = $row["id_aluno"];
        $tmp["nome"] = $row["nome_alu"];
        $tmp["emailal"] = $row["email_resp"];
        $tmp["emailal2"] = $row["email_resp2"];
        $tmp["emailal3"] = $row["email_respf"];
        $tmp["matricula"] = $row["matricula_alu"];
        
        // push category to final json array
        array_push($response["aluno"], $tmp);
    }
    
    // keeping response header to json    
    // echoing json result
    echo json_encode($response, JSON_UNESCAPED_UNICODE);
}

getAlunos();
?>