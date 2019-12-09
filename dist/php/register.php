<!DOCTYPE html lang="pt-br">
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<script src="../../plugins/jQuery/jquery-3.1.1.min.js"></script>       
	
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.2.0/jquery-confirm.min.css" />

	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.2.0/jquery-confirm.min.js"></script>   
	<scrip  src="//ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js" type="text/javascript"></script>
</head>
<body>

<?php 

// //fara a conexao com banco de dados
include_once 'conexao.php';

$email = filter_input(INPUT_POST, "email");
$senha = filter_input(INPUT_POST, "senha");

	// verificar a conexao, se tudo estiver certo, vai executar a linha e enviar o novo registro, se nao vai informar qual o erro
	 if ($con) {	
	 
	 $query = mysqli_query($con, "SELECT email FROM login_sistema WHERE email ='$email'");
         $linha = mysqli_fetch_assoc($query);
         
	 	if($email == $linha['email']){
	 	
			echo "<script type='text/javascript'>
				$.confirm({
				title: 'Email já cadastrado',
				content: 'Esse email já foi cadastrado, tente outro email por favor',
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
		}else{		
			      
		 $query = mysqli_query($con, "INSERT INTO login_sistema VALUES ('','$email', '$senha')");         
		 
		 	if($query){
				echo "<script type='text/javascript'>
					$.confirm({
					title: 'Registrado com sucesso!',
					content: 'parabéns, conta cadastrada com sucesso',
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
		 	}
	 	}

	 }else{

	 	die("Erro: ".mysqli_error($con));
	 }
?>

</body>
</html>