<?php
//fara a conexao com banco de dados
include_once '../../dist/php/conexao.php';


	// só é necessario o ID do registro q deseja excluir, pegar os seguintes parametros passados
	$id = filter_input(INPUT_GET, "idNota");	
	$matricula = filter_input(INPUT_GET, "Matricula");

	// testar se a conexão foi estabelecida
	if ($con) {
		$query = mysqli_query($con, "DELETE FROM nota WHERE matricula_alu_nota='$matricula' AND id_nota='$id'");
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
