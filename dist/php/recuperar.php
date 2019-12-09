<!DOCTYPE html lang="pt-br">
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <link  rel="stylesheet" type="text/css" href="../css/style-form.css" />
        
        <script src="../js/jquery-3.1.1.min.js" type="text/javascript"></script>        
	<scrip  src="//ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js" type="text/javascript"></script>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.2.0/jquery-confirm.min.css" />
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.2.0/jquery-confirm.min.js"></script>   
</head>
<body>

<?php

// //fara a conexao com banco de dados
include_once 'conexao.php';

	$email = filter_input(INPUT_POST, "email");
	
if($con){

	// Mysql select query
	$query = mysqli_query($con, "SELECT * FROM login_sistema WHERE email='$email'");
        $linha = mysqli_fetch_assoc($query);
		
	if($query && $email = $linha['email']){

	
			iconv_set_encoding("internal_encoding", "UTF-8");		
			$headers = "MIME-Version: 1.1\r\n";
			$headers .= "From: Sua escola- <suaescola@gmail.com>\r\n";
			$headers .= "Content-type: text/html; charset=iso-8859-1\r\n";
			$headers  .= "Content-type: text/html; charset=iso-8859-1\r\n";
			('Content-type: text/html; charset=iso-8859-1\r\n');	
			
			$subject = "Recuperação de senha- Sua Escola";           
			$mensagem  = "Olá! {$linha['email']}<br />
			Este e-mail solicitou recuperação de senha<br />
			<strong>Sua senha é</strong>: {$linha['senha']}<br /> <br />
			Obrigado!<br />
			Caso não seja o {$linha['email']} por favor, ignore este e-mail.<br/> 
			Esta é uma mensagem automática, por favor não responda!";
			
      			$subject = utf8_decode($subject);
			$mensagem = utf8_decode($mensagem);
		 	
			$send_contact=mail($linha['email'], $subject, $mensagem, $headers);
			
	            			echo "<script type='text/javascript'>
					$.confirm({
					    title: 'Enviado!',
					    content: 'sua recuperação de senha foi enviado para este email : ". $linha['email']."',
					    buttons: {
					        Ok: {
					            text: 'Ok',
					            btnClass: 'btn-blue',
					            keys: ['enter', 'shift'],
					            action: function(){
					                window.location = '../../index.html';
					            }
					        }
					    }
					});
					</script>";
					
	}else{
		            		echo "<script type='text/javascript'>
					$.confirm({
					    title: 'Erro!',
					    content: 'este e-mail não se encontra em nosso sistema, entre em contato com o suporte por favor, ou tente novamente',
					    buttons: {
					        Ok: {
					            text: 'Ok',
					            btnClass: 'btn-blue',
					            keys: ['enter', 'shift'],
					            action: function(){
					                window.history.back();
					            }
					        }
					    }
					});					
					</script>";
	}
}else{

 	die("Erro: ".mysqli_error($con));

}

?>

</body>
</html>