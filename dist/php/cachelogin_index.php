<!-- <?php 

$lifetime= 3600 * 24000; // Defini para 1000 Dias

session_start();

setcookie(session_name(),session_id(),time()+$lifetime);

if((!isset ($_SESSION['login']) == true) and (!isset ($_SESSION['senha']) == true)){

//continua a pagina

}else{

	 $query = mysqli_query($con, "SELECT situacao FROM login_sistema WHERE email ='".$_SESSION['login']."' AND senha ='".$_SESSION['senha']."'");
         $linha = mysqli_fetch_assoc($query);
         
	if($linha['situacao'] == "blq"){
	
		header('location:pages/lockscreen.php');	
	
	}else if ($linha['situacao'] == "log"){
	
		header('location:pages/inicio.php');
	
	}	

}

?> -->