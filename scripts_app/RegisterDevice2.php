<?php 
	require_once 'conexao.php';
	$response = array(); 

	if($_SERVER['REQUEST_METHOD']=='POST'){

		$token = $_POST['token'];
		$email = $_POST['email'];
		$senha = $_POST['senha'];
		$ref = $_POST['ref'];

		$db = new DbOperation(); 

		$result = $db->registerDevice2($email,$senha,$token,$ref);

		if($result == 0){
			$response['error'] = false; 
			$response['message'] = 'Login efetuado com Sucesso';
		}elseif($result == 2){
			$response['error'] = false; 
			$response['message'] = 'Login efetuado com Sucesso';
		}else{
			$response['error'] = true;
			$response['message']='Dispositivo não registrado';
		}
	}else{
		$response['error']=true;
		$response['message']='Pedido Invalido...';
	}

	echo json_encode($response);