<?php
//fara a conexao com banco de dados
include_once '../../dist/php/conexao.php';


	// testar se a conexão foi estabelecida
	if ($con) {
		$query = mysqli_query($con, "UPDATE agenda set lixo = '1' WHERE remedio1='0'");
		$query4 = mysqli_query($con, "UPDATE agenda set lixo = '1' WHERE turma_aluno=''");		
		// testar se o cod (query) funcionou
		if ($query && $query4) {
			header('Location: ' . $_SERVER['HTTP_REFERER']);
		}else{
		die("Erro: " . mysqli_error($con));
		}
	}else {
		die("Erro: " . mysqli_error($con));
	}
?>