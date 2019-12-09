<!DOCTYPE html lang="pt-br">
<html>
<head>
	<meta charset="utf-8">
        <link  rel="stylesheet" type="text/css" href="../style-form.css" />
        
        <script src="../jquery-3.1.1.min.js" type="text/javascript"></script>        
	<scrip  src="//ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js" type="text/javascript"></script>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.2.0/jquery-confirm.min.css" />
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.2.0/jquery-confirm.min.js"></script>   
</head>
<body>

<?php
//fara conexao com banco de dados
include_once '../conexao.php';

	// aqui vai receber tudo oq foi digitado e vai enviar para o banco
	$titulo= filter_input(INPUT_GET, "titulo_msg");
	$mensagem = filter_input(INPUT_GET, "Mensagem");
        $aluno = filter_input(INPUT_GET, "termo_aluno");

if(empty($aluno)){

	
	// verificar a conexao, se tudo estiver certo, vai executar a linha e enviar o novo registro, se nao vai informar qual o erro
	if ($con) {
	
		$query = mysqli_query($con, "insert into agenda(titulo_agen,mensagem_age,remedio1,dosagem1,horario1,remedio2,dosagem2,horario2,remedio3,dosagem3,horario3,colacao,almoco,lanche,janta,sono,evacuacao,evacuacaox,nome_aluno,turma_aluno) values('$titulo','$mensagem','sistema','3','3','3','3','3','3','3','3','3','3','3','3','3','3','3','3','3')");
			if ($query) {
					echo "<script type='text/javascript'>
					$.confirm({
					    title: 'Sucesso!',
					    content: 'Mensagem enviada com sucesso',
					    buttons: {
					        Ok: {
					            text: 'Ok',
					            btnClass: 'btn-blue',
					            keys: ['enter', 'shift'],
					            action: function(){
					                window.location = 'msg_financeiro.php';
					            }
					        }
					    }
					});
					</script>";	
			}else{
				die("Erro: ".mysql_error($con));
			}
	
	}else{
		die("Erro: ".mysql_error($con));
	}       
	        
	        include_once '/home/troiatec/public_html/athena/castelinho/scripts_app_ATHENA_CEC_V1.0.0/sendMultiplePush_inativo.php';

}else{


	// verificar a conexao, se tudo estiver certo, vai executar a linha e enviar o novo registro, se nao vai informar qual o erro
	if ($con) {
	
		$query = mysqli_query($con, "insert into agenda(titulo_agen,mensagem_age,remedio1,dosagem1,horario1,remedio2,dosagem2,horario2,remedio3,dosagem3,horario3,colacao,almoco,lanche,janta,sono,evacuacao,evacuacaox,matricula_alu_agen,nome_aluno,turma_aluno) values('$titulo','$mensagem','sistema','3','3','3','3','3','3','3','3','3','3','3','3','3','3','3','$aluno','3','3')");
			if ($query) {
					echo "<script type='text/javascript'>
					$.confirm({
					    title: 'Sucesso!',
					    content: 'Mensagem enviada com sucesso',
					    buttons: {
					        Ok: {
					            text: 'Ok',
					            btnClass: 'btn-blue',
					            keys: ['enter', 'shift'],
					            action: function(){
					                window.location = 'msg_financeiro.php';
					            }
					        }
					    }
					});
					</script>";
			}else{
				die("Erro: ".mysql_error($con));
			}
	
	}else{
		die("Erro: ".mysql_error($con));
	}
	
	        include_once '/home/troiatec/public_html/athena/castelinho/scripts_app_ATHENA_CEC_V1.0.0/sendSinglePushInativo.php';
	
}        

?>