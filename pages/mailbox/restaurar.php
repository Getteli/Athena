<?php
//fara a conexao com banco de dados
include_once '../../dist/php/conexao.php';

	// só é necessario o ID do registro q deseja excluir, pegar os seguintes parametros passados
	$idagenda = filter_input(INPUT_GET, "IdAgenda");

	//ao receber o id da agenda, faço um select e verifico se é msg para escola e se ja foi visualizada
	$queryv = mysqli_query($con,"SELECT remedio1, visu FROM agenda WHERE id_agen='$idagenda'");
	$linhav = mysqli_fetch_assoc($queryv);
	
	$remedio = $linhav['remedio1'];
	$visu = $linhav['visu'];
	
	
	// testar se a conexão foi estabelecida
	if ($con) {
			
	//verifica se é msg enviada ao sistema e se ela esta com valor 2, q indica q ela foi ao lixo e nao visualizada e voltou para a caixa de entrada, por tanto volta ao valor inicial, q é 0, q nao foi visualizada ainda.
	if($remedio == '1' && $visu == '2'){
		$queryu = mysqli_query($con, "UPDATE agenda SET visu='0' WHERE id_agen='$idagenda'");
	}else{
	//caso ele seja visu == 1, então ele ja foi visualizado e nao precisa dessa alteração.
	}
	
		$query = mysqli_query($con, "UPDATE agenda SET lixo='0' WHERE id_agen='$idagenda'");
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