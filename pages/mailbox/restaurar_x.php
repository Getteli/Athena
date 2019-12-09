<?php
include_once '../../dist/php/conexao.php';
	function filter( $dados ){
		$arr = Array();
		foreach((array)$dados AS $dado ) $arr[] = (int)$dado;
		return $arr;
	}
	if( $_SERVER['REQUEST_METHOD']=='POST' ){
		$arr = filter( $_POST['excluir'] );

	//ao receber o id da agenda via array[x], faz um select e verifico se e msg para escola e se ja foi visualizada
	$queryv = mysqli_query($con,'SELECT remedio1, visu FROM agenda WHERE remedio1 ="1" AND id_agen IN('.implode( ',', $arr ).')');
	$linhav = mysqli_fetch_assoc($queryv);
	
	$remedio = $linhav['remedio1'];
	$visu = $linhav['visu'];
	
	
	// testar se a conexao foi estabelecida
	if ($con) {
				
	//verifica se e msg enviada ao sistema e se ja foi visualizada
	if($remedio == '1' && $visu == '2'){
		$queryu = mysqli_query($con, 'UPDATE agenda SET visu="0" WHERE id_agen IN('.implode( ',', $arr ).')');
	}else{
	//caso ele seja visu == 1, entao ele ja foi visualizado e nao precisa dessa alteracao.
	}
	
		$query = mysqli_query($con, 'UPDATE agenda SET lixo = "0" WHERE id_agen IN('.implode( ',', $arr ).')');
		// testar se o cod (query) funcionou
		if ($query) {
			header('Location: ' . $_SERVER['HTTP_REFERER']);
		}else{
		die("Erro: " . mysqli_error($con));
		}
	}else {
		die("Erro: " . mysqli_error($con));
	}
	}
?>