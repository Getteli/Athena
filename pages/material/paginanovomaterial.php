<!DOCTYPE html lang="pt-br">
<html>
<head>
	<title>ATHENA C.E. CASTELINHO | NOVO MATERIAL</title>
	<meta charset="utf-8">
        <link rel="stylesheet" type="text/css" href="../style-form.css" />
</head>
<?php 
//fara a conexao com banco de dados
include_once '../conexao.php';

$sql = "SELECT * FROM turma ORDER BY id_turma ASC";
$get=mysqli_query($con,$sql);

$option = '';
while($row = mysqli_fetch_assoc($get)){

  $option .= '<option value = "'.$row['num_turma'].'">'.$row['num_turma'].'</option>';
}

?>
<body>
<h1>Novo Material</h1>
<p>
	<form action="salvarmaterial.php"> <!-- Esse action, é o arquivo salvar q vai receber tudo oq foi digitado e vai enviar para o banco de dados-->
		Material:<input type="text" name="Material" class="camp_txt"/><br/>
                         <input type="text" name="Material2" class="camp_txt"/><br/>
                         <input type="text" name="Material3" class="camp_txt"/><br/>
                         <input type="text" name="Material4" class="camp_txt"/><br/>
                         <input type="text" name="Material5" class="camp_txt"/><br/>
                         <input type="text" name="Material6" class="camp_txt"/><br/>
                         <input type="text" name="Material7" class="camp_txt"/><br/>
                         <input type="text" name="Material8" class="camp_txt"/><br/>
                         <input type="text" name="Material9" class="camp_txt"/><br/>
                         <input type="text" name="Material10" class="camp_txt"/><br/>
                         <input type="text" name="Material11" class="camp_txt"/><br/>
                         <input type="text" name="Material12" class="camp_txt"/><br/>
                         <input type="text" name="Material13" class="camp_txt"/><br/>
                         <input type="text" name="Material14" class="camp_txt"/><br/>
                         <input type="text" name="Material15" class="camp_txt"/><br/>
                         <input type="text" name="Material16" class="camp_txt"/><br/>
                         <input type="text" name="Material17" class="camp_txt"/><br/>
                         <input type="text" name="Material18" class="camp_txt"/><br/>
                         <input type="text" name="Material19" class="camp_txt"/><br/>
                         <input type="text" name="Material20" class="camp_txt"/><br/>

		Turma:<select type="text" name="Turma" class="select_"> <?php echo $option; ?> </select><br/>
		<input type="submit" value="ADICIONAR"/>
	</form>	
</p>

</body>
</html>