<?php 
//importing required files 
require_once 'DbOperation.php';
require_once 'Firebase.php';
require_once 'Push.php';  

$db = new DbOperation();

$vai = 1;
$response = array(); 


if($_SERVER['REQUEST_METHOD']=='POST'){	
	//hecking the required params 
	if(isset($_POST['email']) || isset($_POST['email2']) || isset($_POST['email3'])){

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
					"você tem uma nova frequência do(a) seu(sua) filho(a)",
					null
				);
		}

		//getting the push from push object
		$mPushNotification = $push->getPush(); 

		//getting the token from database object 
		$devicetoken = $db->getTokenByEmail($_POST['email'],$_POST['email2'],$_POST['email3']);

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