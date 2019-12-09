<?php

include_once './conexao.php';
	header('Content-Type:Application/json; charset=UTF-8');


function createNovaAgenda() {
    if (isset($_POST["colacao"])!= "") {
        // response array for json
        $response = array();
        $lancartitulo = $_POST["titulo_agenda"];
        $lancarmensagem = $_POST["mensagem_agenda"];
        $lancarremnom1 = $_POST["rem_nome1"];
        $lancarmremds1 = $_POST["rem_dosa1"];
        $lancarremhr1 = $_POST["rem_hora1"];
        $lancarremnom2 = $_POST["rem_nome2"];
        $lancarremds2 = $_POST["rem_dosa2"];
        $lancarremhr2 = $_POST["rem_hora2"];
        $lancarremnom3 = $_POST["rem_nome3"];
        $lancarremds3 = $_POST["rem_dosa3"];
        $lancarremhr3 = $_POST["rem_hora3"];
        $lancarcolacao = $_POST["colacao"];
        $lancaralmoco = $_POST["almoco"];
        $lancarlanche = $_POST["lanche"];
        $lancarjanta = $_POST["janta"];
        $lancarsono = $_POST["sono"];
        $lancareva = $_POST["evacuacao"];
        $lancarevax = $_POST["evacuacaox"];
        $lancarmataluno = $_POST["mataluno"];
        $lancarmatprof = $_POST["matprof"];

        $db = new DbConnect();

        // mysql query
        $query = "INSERT INTO agenda(titulo_agen,mensagem_age,remedio1,dosagem1,horario1,remedio2,dosagem2,horario2,remedio3,dosagem3,horario3,colacao,almoco,lanche,janta,sono,evacuacao,evacuacaox,matricula_alu_agen,matricula_prof_agen) VALUES('$lancartitulo','$lancarmensagem','$lancarremnom1','$lancarmremds1','$lancarremhr1','$lancarremnom2','$lancarremds2','$lancarremhr2','$lancarremnom3','$lancarremds3','$lancarremhr3','$lancarcolacao','$lancaralmoco','$lancarlanche','$lancarjanta','$lancarsono','$lancareva','$lancarevax','$lancarmataluno','$lancarmatprof')";
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