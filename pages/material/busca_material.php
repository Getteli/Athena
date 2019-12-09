<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<title></title>
	<link rel="stylesheet" type="text/css" href="../style-form.css" />
	
</head>
<?php
//fara a conexao com banco de dados
include_once '../conexao.php';

	$parametro = filter_input(INPUT_GET, "parametro");

	// criar o filtro de pesquisa
	if ($parametro) {
		$dados = mysqli_query($con,"select * from material where id_material like '$parametro%' order by id_material");
	} else {
		$dados = mysqli_query($con,"select * from material order by id_material");
	} 

	// onde ficara a linha com todos os dados
	$linha = mysqli_fetch_assoc($dados);
	$total = mysqli_num_rows($dados);

?>
<body>


<p>
	<form action="<?php echo $_SERVER['PHP_SELF'];?>">
		<input type="text" name="parametro" />
		<input type="submit" value="Buscar" />
	</form>
</p>


<table border="1">	
	<tr class="tr_bsc">
		<td class="td_bsc">Material</td>
		<td class="td_bsc">Turma</td>
	</tr>
<?php 

if ($total) { do{

?>
	<tr>
		<td><?php echo $linha['nome_material'] ?></td>
		<td><?php echo $linha['turma'] ?></td>

		<!-- para alterar os outros eu terei apenas de copiar essas linhas alterando os parametros passados, e excluir tbm -->
		<td><a href="<?php echo "paginaalterarmaterial.php?IdMaterial=" . $linha['id_material'] . "&Material=" . $linha['nome_material'] . "&Turma=" . $linha['turma'] ?>">Alterar</a></td>
		<td><a href="<?php echo "excluirmaterial.php?IdMaterial=" . $linha['id_material'] ?>">Excluir</a></td>
	</tr>

<?php 
} while ($linha = mysqli_fetch_assoc($dados)); 

	mysqli_free_result($dados);
}

	mysqli_close($con);
?>

</body>
</html>