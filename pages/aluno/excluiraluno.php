<?php
//fara a conexao com banco de dados
include_once '../../dist/php/conexao.php';

	// só é necessario o ID do registro q deseja excluir, pegar os seguintes parametros passados
	$matricula = filter_input(INPUT_GET, "matricula");
	// testar se a conexão foi estabelecida
	if ($con) {
		// testar se o cod (query) funcionou	
		$queryarq = mysqli_query($con, "DELETE FROM arquivos WHERE matricula_alu='$matricula'");
		$queryfreq = mysqli_query($con, "DELETE FROM frequencia WHERE matricula_alu_freq='$matricula'");		
		$querynota = mysqli_query($con, "DELETE FROM nota WHERE matricula_alu_nota='$matricula'");		
		$querypont = mysqli_query($con, "DELETE FROM ponto WHERE matricula_alu_p='$matricula'");		
		$query = mysqli_query($con, "DELETE FROM aluno WHERE matricula_alu='$matricula'");

		if (($query||$queryarq) || ($query&&$queryarq&&$queryfreq&&$querynota&&$querypont) ) {
			header("location: buscar_aluno.php");
		}else{
		die("Erro: " . mysqli_error($con));
		}
	}else {
		die("Erro: " . mysqli_error($con));
	}
	
?>