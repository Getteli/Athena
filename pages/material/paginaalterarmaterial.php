<!DOCTYPE html lang="pt-br">
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<title>ATHENA C.E. CASTELINHO | ALTERAR MATERIAL</title>
      	<link rel="stylesheet" type="text/css" href="../style-form.css" />
	
<?php
//fara a conexao com banco de dados
include_once '../conexao.php';

	//recebera os parametros para alterar o responsavel
	$idmaterial = filter_input(INPUT_GET, "IdMaterial");
	$material = filter_input(INPUT_GET, "Material");
	$turma = filter_input(INPUT_GET, "Turma");

	
$get=mysqli_query($con,"SELECT * FROM turma ORDER BY id_turma ASC");

$option = '';
while($row = mysqli_fetch_assoc($get)){

  $option .= '<option value = "'.$row['num_turma'].'">'.$row['num_turma'].'</option>';
}
?>
</head>
<body>
<h1>Alterar Material</h1>
<p>
<form action="alterarmaterial.php">
		<input type="hidden" name="IdMaterial" value="<?php echo $idmaterial ?>" />
		Material:<input type="text" name="Material" value="<?php echo $material ?>" class="camp_txt"/><br/>
		Turma:<select type="text" name="Turma" class="select_"> <?php echo $option; ?> </select><br/>

		<input type="submit" value="ALTERAR"/>
</form>
</p>
</body>
</html>