<?php 
//fara a conexao com banco de dados
include_once '../conexao.php';

	$idmaterial = filter_input(INPUT_GET, "IdMaterial");
	$material = filter_input(INPUT_GET, "Material");
	$turma = filter_input(INPUT_GET, "Turma");

	if ($con) {
		$query = mysqli_query($con, "update material set nome_material='$material', turma='$turma' where id_material='$idmaterial';");
		if ($query) {
					echo "<script type='text/javascript'>
					window.alert('Alterado com sucesso!');
					window.location = 'busca_material.php';
					</script>";
		}else{
			die("Erro: ". mysqli_error($con));
		}
	}else{
		die("Erro: ". mysqli_error($con));
	}
?>