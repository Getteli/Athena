<?php
//fara a conexao com banco de dados
include_once '../../dist/php/conexao.php';

	// só é necessario o ID do registro q deseja excluir, pegar os seguintes parametros passados
	$matricula = filter_input(INPUT_GET, "matricula");

	// testar se a conexão foi estabelecida
	if ($con) {
		$query = mysqli_query($con, "DELETE FROM professor WHERE matricula_prof='$matricula'");
		// testar se o cod (query) funcionou
		if ($query) {
			header("location: buscar_professor.php");
		}else{
		die("Erro: " . mysqli_error($con));
		}
	}else {
		die("Erro: " . mysqli_error($con));
	}
?>