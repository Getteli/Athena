<?php 
//importing required files 
require_once 'DbOperation.php';
require_once 'Firebase.php';
require_once 'Push.php';  

include_once '../pages/financeiro/enviar_msgf.php';

$aluno = filter_input(INPUT_GET, "termo_aluno");

$db = new DbOperation();

$response = array(); 

$Jorel = true;


if($Jorel = true){	
	//hecking the required params 
	if($Jorel = true){

		//creating a new push
		$push = null; 
		//first check if the push has an image with it
		if(isset($_POST['image'])){
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
		$devicetoken = $db->getTokenByEmaila($aluno);

		//creating firebase class object 
		$firebase = new Firebase(); 

		//sending push notification and displaying result 
		$firebase->send($devicetoken, $mPushNotification);
	}else{
		$response['error']=true;
		$response['message']='Ainda nao precisa';
	}
}else{
	$response['error']=true;
	$response['message']='Pedido Invalido';
}

json_encode($response);