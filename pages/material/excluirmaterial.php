<?php
//fara a conexao com banco de dados
include_once '../conexao.php';

	// só é necessario o ID do registro q deseja excluir, pegar os seguintes parametros passados
	$idmaterial = filter_input(INPUT_GET, "IdMaterial");

	// testar se a conexão foi estabelecida
	if ($con) {
		$query = mysqli_query($con, "delete from material where id_material='$idmaterial'");
		// testar se o cod (query) funcionou
		if ($query) {
			header("location: busca_material.php");
		}else{
		die("Erro: " . mysqli_error($con));
		}
	}else {
		die("Erro: " . mysqli_error($con));
	}
?>