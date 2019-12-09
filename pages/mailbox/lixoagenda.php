<?php
//fara a conexao com banco de dados
include_once '../../dist/php/conexao.php';

	// só é necessario o ID do registro q deseja excluir, pegar os seguintes parametros passados
	$idagenda = filter_input(INPUT_GET, "IdAgenda");

	// testar se a conexão foi estabelecida
	if ($con) {

		$query = mysqli_query($con, "UPDATE agenda SET lixo='1' WHERE id_agen='$idagenda'");
		// testar se o cod (query) funcionou
		if ($query) {
			header('Location: agenda.php');
		}else{
		die("Erro: " . mysqli_error($con));
		}
	}else {
		die("Erro: " . mysqli_error($con));
	}
?>