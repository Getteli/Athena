<?php
include_once '../../dist/php/conexao.php';
	function filter( $dados ){
		$arr = Array();
		foreach((array)$dados AS $dado ) $arr[] = (int)$dado;
		return $arr;
	}
	if( $_SERVER['REQUEST_METHOD']=='POST' ){
		$arr = filter( $_POST['excluir'] );

	// testar se a conexão foi estabelecida
	if ($con) {
		$query = mysqli_query($con, 'DELETE FROM agenda WHERE id_agen IN('.implode( ',', $arr ).')');
		// testar se o cod (query) funcionou
		if ($query) {
			header('Location: ' . $_SERVER['HTTP_REFERER']);
		}else{
		die("Erro: " . mysqli_error($con));
		}
	}else {
		die("Erro: " . mysqli_error($con));
	}	}
?>