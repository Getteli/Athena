<?php
//fara a conexao com banco de dados
include_once '../../dist/php/conexao.php';


	// testar se a conex達o foi estabelecida
	if ($con) {
		$query = mysqli_query($con, "UPDATE agenda set lixo = '1' WHERE remedio1 = 'sistema' OR remedio1 = 'turmaagendasistema'");
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