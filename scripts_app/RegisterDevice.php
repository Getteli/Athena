<?php 
        include_once 'conexao.php';
	require_once 'conexao.php';
	$response = array(); 

	if($_SERVER['REQUEST_METHOD']=='POST'){
		$token = $_POST['token'];
		$email = $_POST['email'];
		$senha = $_POST['senha'];
		$ref = $_POST['ref'];
		
	$sql = ("SELECT * FROM aluno WHERE matricula_alu='$senha'");
	$dados = mysqli_query($dbcon,$sql);
	$linha = mysqli_fetch_assoc($dados);


		$ativo = $linha['ativo'];							
		$turma = $linha['turma_fk'];
 
		$db = new DbOperation(); 

		$result = $db->registerDevice($email,$senha,$turma,$token,$ref,$ativo);

		if($result == 0){
			$response['error'] = false; 
			$response['message'] = 'Login efetuado com Sucesso!';
		}elseif($result == 2){
			$response['error'] = true; 
			$response['message'] = 'Login efetuado com Sucesso!';
		}else{
			$response['error'] = true;
			$response['message']='Dispositivo nao Registrado';
		}
	}else{
		$response['error']=true;
		$response['message']='Invalid Request...';
	}

	echo json_encode($response);