<?php 
//importing required files 
require_once 'DbOperation.php';
require_once 'Firebase.php';
require_once 'Push.php'; 

include_once '../../pages/mailbox/salvaragenda.php';

$turmaagenda = filter_input(INPUT_POST, "turma");

$db = new DbOperation();

$response = array(); 

$Jorel = true;

if($Jorel = true){	
	//hecking the required params 
	if($Jorel = true) {
		//creating a new push
		$push = null; 
		//first check if the push has an image with it
		if($Jorel = false){
			$push = new Push(
					$_POST['title'],
					$_POST['message'],
					$_POST['image']
				);
		}else{
			//if the push don't have an image give null in place of image
			$push = new Push(
					//$_POST['title'],
                                        "C.E.Castelinho",
					//$_POST['message'],
                                        "Mensagem da Diretoria",
                                        null
				);
		}

		//getting the push from push object
		$mPushNotification = $push->getPush();

		//getting the token from database object 
		$devicetoken = $db->getAllTokensT($turmaagenda);

		//creating firebase class object 
		$firebase = new Firebase(); 

		//sending push notification and displaying result 
		$firebase->send($devicetoken, $mPushNotification, $headers);
		//echo "Mensagem Enviada com sucesso!";
	}else{
		$response['error']=true;
		$response['message']='Algum campo nao foi preenchido';
	}
}else{
	$response['error']=true;
	$response['message']='Pedido Invalido';
}

json_encode($response, JSON_UNESCAPED_UNICODE);