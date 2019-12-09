<?php
//fara a conexao com banco de dados
include_once '../../dist/php/conexao.php';

	//recuperar o codigo do arquivo atraves do metodo GET
	$matricula = $_GET['Matricula'];
	$id = $_GET['id'];

	// testar se a conexão foi estabelecida
	if ($con) {
		$query = mysqli_query($con, "DELETE FROM arquivos WHERE matricula_alu='$matricula' AND id='$id'");
		// testar se o cod (query) funcionou
		if ($query) {
			header('Location: ' . $_SERVER['HTTP_REFERER']);
		}else{
		die("Erro: " . mysqli_error($con));
		}
	}else {
		die("Erro: " . mysqli_error($con));
	}
?>