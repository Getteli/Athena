<?php
//fara a conexao com banco de dados
include_once '../../dist/php/conexao.php';


	// testar se a conexão foi estabelecida
	if ($con) {
		$query = mysqli_query($con, "delete from agenda where lixo='1'");
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