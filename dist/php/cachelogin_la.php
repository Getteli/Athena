<!-- <?php

$lifetime= 3600 * 24000; // Defini para 1000 Dias

session_start();

setcookie(session_name(),session_id(),time()+$lifetime);
  
if((!isset ($_SESSION['login']) == true) and (!isset ($_SESSION['senha']) == true)){
	unset($_SESSION['login']);
	unset($_SESSION['senha']);
	header('location:../../index.php');
	
}else{
	$id = $_GET['id'];
	if(empty($id)){
	header('location:agenda.php');	
	}
        $queryID = mysqli_query($con, "SELECT id_agen,remedio1 FROM agenda WHERE id_agen='$id'");
        $linhaID = mysqli_fetch_assoc($queryID);

	if($linhaID['id_agen'] == $id && ($linhaID['remedio1'] == "1" || $linhaID['remedio1'] == "turmaagendasistema" || $linhaID['remedio1'] == "sistema") ){

			//VAI CONTINUAR O SCRIPT
			$query = mysqli_query($con, "SELECT situacao FROM login_sistema WHERE email ='".$_SESSION['login']."' AND senha ='".$_SESSION['senha']."'");
		        $linha = mysqli_fetch_assoc($query);
		         
			if($linha['situacao'] == "blq"){
			
				header('location:../lockscreen.php');	
			
			}else if($linha['situacao'] == ""){
			
				header('location:../../index.php');	
			
			}else if ($linha['situacao'] == "log"){
			
				$logado = $_SESSION['login'];
			
			}
		
	}else{
		// SE NAO FOR, EU REDIRECIONO
		header('location:agenda.php');	
	}


      

}
?> -->