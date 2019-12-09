<?php
//fara a conexao com banco de dados
include_once '../../dist/php/conexao.php';


	//ao receber o id da agenda, faço um select e verifico se é msg para escola e se ja foi visualizada
	$queryv = mysqli_query($con,"SELECT remedio1, visu FROM agenda WHERE remedio1='1'");
	$linhav = mysqli_fetch_assoc($queryv);
	
	$remedio = $linhav['remedio1'];
	$visu = $linhav['visu'];
	
	
	// testar se a conexao foi estabelecida
	if ($con) {
			
	//verifica se é msg enviada ao sistema e se ja foi visualizada
	if($remedio == '1' && $visu == '0'){
		$queryu = mysqli_query($con, "UPDATE agenda SET visu='2' WHERE remedio1='1'");
	}else{
	//caso ele seja visu == 1, então ele ja foi visualizado e nao precisa dessa alteração.
	}
	
		$query = mysqli_query($con, "UPDATE agenda set lixo = '1' WHERE remedio1='1'");
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