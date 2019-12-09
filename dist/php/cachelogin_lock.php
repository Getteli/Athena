<!-- <?php

$lifetime= 3600 * 24000; // Defini para 1000 Dias

session_start();

setcookie(session_name(),session_id(),time()+$lifetime);
  
if((!isset ($_SESSION['login']) == true) and (!isset ($_SESSION['senha']) == true)){
	unset($_SESSION['login']);
	unset($_SESSION['senha']);
	header('location:../index.php');
	
}else{


         $query = mysqli_query($con, "SELECT situacao FROM login_sistema WHERE email ='".$_SESSION['login']."' AND senha ='".$_SESSION['senha']."'");
         $linha = mysqli_fetch_assoc($query);
         
	if($linha['situacao'] == "log"){
	
		header('location:inicio.php');
	
	}else if($linha['situacao'] == ""){
	
		header('location:../index.php');	
	
	}else if ($linha['situacao'] == "blq"){

		$logado = $_SESSION['login'];
	
	}  
	
}
?> -->