<?php 
//importing required files 
require_once 'DbOperation.php';
require_once 'Firebase.php';
require_once 'Push.php';  

$db = new DbOperation();

$vai = 1;
$response = array(); 


if($_SERVER['REQUEST_METHOD']=='POST'){	
	//verificando os parâmetros requeridos
	if(isset($_POST['senha'])){

		//criando um novo push
		$push = null; 
		//primeiro verifique se o push tem uma imagem com ele
		if(isset($_POST['image'])){
			$push = new Push(
					$_POST['title'],
					$_POST['message'],
					$_POST['image']
				);
		}else{
			//se o impulso não tiver uma imagem, dar null no lugar da imagem
			$push = new Push(
					//$_POST['title'],
					"C.E.Castelinho",
					//$_POST['message'],
					"Você recebeu uma Mensagem do responsável",
					null
				);
		}

		//getting the push from push object
		$mPushNotification = $push->getPush(); 

		//getting the token from database object 
		$devicetoken = $db->getTokenByEmailP($_POST['senha']);

		//creating firebase class object 
		$firebase = new Firebase(); 

		//sending push notification and displaying result 
		echo $firebase->send($devicetoken, $mPushNotification);
	}else{
		$response['error']=true;
		$response['message']='Ainda não precisa';
	}
}else{
	$response['error']=true;
	$response['message']='Pedido Invalido';
}

echo json_encode($response);