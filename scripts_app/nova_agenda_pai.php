<?php

include_once './conexao.php';



function createNovaAgenda() {
    if (isset($_POST["mensagem_agenda"])!= "") {
        // response array for json
        $response = array();
        $ref = $_POST["ref"];

        $lancartitulo = $_POST["titulo_agen"];
        $lancarmensagem = $_POST["mensagem_agenda"];
        $lancarremnom1 = "0";
        $lancarmremds1 = "0";
        $lancarremhr1 = "0";
        $lancarremnom2 = "0";
        $lancarremds2 = "0";
        $lancarremhr2 = "0";
        $lancarremnom3 = "0";
        $lancarremds3 = "0";
        $lancarremhr3 = "0";
        $lancarcolacao = "0";
        $lancaralmoco = "0";
        $lancarlanche = "0";
        $lancarjanta = "0";
        $lancarsono = "0";
        $lancareva = "0";
        $lancarevax = "0";
	//cria a variavel e pega a hora e data local
	date_default_timezone_set('America/Sao_Paulo');
	$data = date('Y-m-d H:i:s');
        $lancarmataluno = $_POST["mataluno"];
        $lancarmatprof = $_POST["matprof"];
        $lancarnaluno = $_POST["nome_aluno"];
        $lancartaluno = $_POST["turma_aluno"];
        $email_resp_agenda = $_POST["email_resp_agenda"];

        $db = new DbConnect();

if($ref == "Professor(a)"){

        // mysql query
        $query = "INSERT INTO agenda VALUES('','$lancartitulo','$lancarmensagem','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','$data','$lancarmataluno','$lancarmatprof','$lancarnaluno','$lancartaluno','$email_resp_agenda','0','0')";
        
}else{

        // se for escola vai executar esta query, com os valores com 1, para nao aparecer na agenda do prof.
        $query = "INSERT INTO agenda VALUES('','$lancartitulo','$lancarmensagem','1','1','1','1','1','1','1','1','1','1','1','1','1','1','1','1','$data','$lancarmataluno','$lancarmatprof','$lancarnaluno','$lancartaluno','$email_resp_agenda','0','0')";
}


        $result = mysql_query($query) or die(mysql_error());
        if ($result) {
            $response["error"] = false;
            $response["message"] = "Nova Agenda enviada!";
        } else {
            $response["error"] = true;
            $response["message"] = "Falha ao enviar a nova Agenda!";
        }
    } else {
        $response["error"] = true;
        $response["message"] = "Campo perdido, entre em contato com o suporte!";
    }
    
    // echo json response
    echo json_encode($response, JSON_UNESCAPED_UNICODE);
}

createNovaAgenda();
?>