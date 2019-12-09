<?php
include_once './conexao.php';
        header("Content-Type: application/json; charset=UTF-8",true);

function getMatricula(){
    $db = new DbConnect();
    mysql_set_charset('utf8');
    // array for json response
    $response = array();
    $response["aluno"] = array();
    $email= $_GET["email"];

    // Mysql select query
    $result = mysql_query("SELECT * FROM aluno WHERE email_resp='$email' or email_resp2='$email'");
    
    while($row = mysql_fetch_array($result)){
        // temporary array to create single category
        $tmp = array();
        $tmp["id"] = $row["id_aluno"];
        $tmp["matricula"] = $row["matricula_alu"];
        $tmp["nome"] = $row["nome_alu"];
        $tmp["turma"] = $row["turma_fk"];

        // push category to final json array
        array_push($response["aluno"], $tmp);
    }
    
    // keeping response header to json    
    // echoing json result
    echo json_encode($response, JSON_UNESCAPED_UNICODE);
}

getMatricula();
?>