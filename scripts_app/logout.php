<?php
include_once './conexao.php';
        header("Content-Type: application/json; charset=UTF-8",true);

function logout(){
    $db = new DbConnect();
    mysql_set_charset('utf8');
    // array for json response
    $email= $_GET["email"];

    // Mysql select query
    $result = mysql_query("DELETE FROM login WHERE email_login = '$email'");
    

    // keeping response header to json    
    // echoing json result
    echo json_encode($response, JSON_UNESCAPED_UNICODE);
}

logout();
?>