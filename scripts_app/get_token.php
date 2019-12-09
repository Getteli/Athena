<?php
include_once './conexao.php';
        header("Content-Type: application/json; charset=UTF-8",true);

function getToken(){
    $db = new DbConnect();
    mysql_set_charset('utf8');
    // array for json response
    $response = array();
    $response["login"] = array();
    $email= $_GET["email"];

    // Mysql select query
    $result = mysql_query("SELECT token FROM login WHERE email_login='$email'");
    
    while($row = mysql_fetch_array($result)){
        // temporary array to create single category
        $tmp = array();
        $tmp["token"] = $row["token"];
        
        // push category to final json array
        array_push($response["login"], $tmp);
    }
    
    // keeping response header to json    
    // echoing json result
    echo json_encode($response, JSON_UNESCAPED_UNICODE);

$deus = $tmp["token"];
echo "---------------------------------------------------------- aqui tem o token novamente armazenado em uma variavel: ";
echo $deus;
return array($tmp["token"]);

}

getToken();
?>