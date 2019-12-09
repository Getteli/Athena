<!DOCTYPE html lang="pt-br">
<html>
<head>
	<title>ATHENA C.E. CASTELINHO | ALTERAR PROFESSOR</title>
	<script src="../jquery-3.1.1.min.js" type="text/javascript"></script>
	<script src="../jquery.maskedinput.js" type="text/javascript"></script>
        <link rel="stylesheet" type="text/css" href="../style-form.css" />
                <script  src="../ajax.js" type="text/javascript"></script>
        <scrip  src="//ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js" type="text/javascript"></script>
       
<?php
include_once '../conexao.php';


	//recebera os parametros para passar o aluno
	$id = filter_input(INPUT_GET, "id_aluno");	
	$matricula = filter_input(INPUT_GET, "matricula");
	$turma_fk = filter_input(INPUT_GET, "turma");
        
        $get = "SELECT * FROM aluno WHERE matricula_alu='$matricula' ORDER BY id_aluno DESC";

	$resultado = mysqli_query($con,$get);
	$conteudo = mysqli_fetch_assoc($resultado);
	$total = mysqli_num_rows($resultado);
        

?>


<script type="text/javascript">
Var loadFile = função (evento) {
    Var output = document.getElementById ('visualização');
    Output.src = URL.createObjectURL (event.target.files [0]);
  }; 

</Script>

</head>
<body>

<form id="form" name="form" action="passaraluno.php" enctype="multipart/form-data" data-ls-module="form" method="post">
<table border="0" cellspacing="10" cellpadding="10">		
		
<tr>
<div id="foto">
<?php

//query para buscar a foto do aluno
        $query = "SELECT nome_foto,foto_aluno,Tipo FROM aluno WHERE matricula_alu='$matricula'";

	$result = mysqli_query($con,$query);
	
	$photo = mysqli_fetch_array($result,MYSQLI_ASSOC); 
	
	$tipo = $photo['tipo'];
	
	$nomeoto = $photo['nome_foto']; 

	$photo['foto_aluno']; 
	
	$base64 = base64_encode($photo['foto_aluno']);
	
//query para buscar a frequencia do aluno	
	$sql = "SELECT * FROM frequencia WHERE matricula_alu_freq = '$matricula' AND chamada = 'P'";

	$situacaof = mysqli_query($con,$sql);
	$conteudof = mysqli_fetch_assoc($situacaof);
	$total = mysqli_num_rows($situacaof);
	
	$totalM = $total / 220;

	$totalD = ($totalM * 100);

	$totalR = number_format($totalD, 2, ',', ' ') . "%";

//query para buscar as notas de cada materia do aluno
	//inglês
	$get_nota_in = "SELECT SUM(nota), (SUM(nota) / 3) AS valor_soma, TRUNCATE( (SUM(nota) / 3), 2) FROM nota WHERE matricula_alu_nota='$matricula' AND materia_not='inglês'";
	
	$exec_gni = mysqli_query($con,$get_nota_in);
	$media_in = mysqli_fetch_assoc($exec_gni);
	
	//psicomotricidade
	$get_nota_psi = "SELECT SUM(nota), (SUM(nota) / 3) AS valor_soma, TRUNCATE( (SUM(nota) / 3), 2) FROM nota WHERE matricula_alu_nota='$matricula' AND materia_not='psicomotricidade'";
	
	$exec_gnp = mysqli_query($con,$get_nota_psi);
	$media_psi = mysqli_fetch_assoc($exec_gnp);
	
	//capoeira
	$get_nota_ca = "SELECT SUM(nota), (SUM(nota) / 3) AS valor_soma, TRUNCATE( (SUM(nota) / 3), 2) FROM nota WHERE matricula_alu_nota='$matricula' AND materia_not='capoeira'";
	
	$exec_gnc = mysqli_query($con,$get_nota_ca);
	$media_ca = mysqli_fetch_assoc($exec_gnc);	
	
	//ballet
	$get_nota_ba = "SELECT SUM(nota), (SUM(nota) / 3) AS valor_soma, TRUNCATE( (SUM(nota) / 3), 2) FROM nota WHERE matricula_alu_nota='$matricula' AND materia_not='ballet'";
	
	$exec_gnb = mysqli_query($con,$get_nota_ba);
	$media_bal = mysqli_fetch_assoc($exec_gnb);	
		
?>
<div style="float:right; background:#f8f9fa; width:30%; height:200px;">
<p>FREQUÊNCIA: <?php echo $totalR ?></p>
</div>

<div style="padding-left:10px; float:right; background:#f8f9fa;width:30%; height:200px;">
<p>NOTAS</p>
<p>inglês: <?php echo $media_in['TRUNCATE( (SUM(nota) / 3), 2)'] ?></p>
<p>Psicomotricidade: <?php echo $media_psi['TRUNCATE( (SUM(nota) / 3), 2)'] ?></p>
<p>Capoeira: <?php echo $media_ca['TRUNCATE( (SUM(nota) / 3), 2)'] ?></p>
<p>Ballet: <?php echo $media_bal['TRUNCATE( (SUM(nota) / 3), 2)'] ?></p>

</div>

  <label style="cursor:pointer; position:relative; float:left;">
<img id="preview" src="data:image/jpeg;base64,<?php echo $base64; ?>" width="106" height="122"/>
  </label>
</div>
</tr>		
<tr>
<br><br><br><br><br><br><br>
	<p><?php echo $conteudo['nome_alu'] . "<br><p style='font-size:13px;'>" . $conteudo['turma_fk']."</p>" ?></p>
</tr>

  <tr>
    <input type="hidden" name="Matricula" value="<?php echo $matricula ?>" />
    Turma:<br><select name="TurmaFk" class="select_form" style="width:30%;">
        <?php 
	    $result= mysqli_query($con,'SELECT * FROM turma ORDER BY id_turma ASC'); ?>
	<?php while($row= mysqli_fetch_assoc($result)) { ?>
	    <option value="<?php echo $row['num_turma'] ?>" <?php if ($row['num_turma']==$turma_fk) { ?>selected="selected"<?php } ?>>
	<?php echo htmlspecialchars($row['num_turma']); ?>
	    </option>
	<?php 
	    } 
    	?>
    	</select>
</tr>
</table>
		
	<input type="button" class="bt-enviar" value="Passar"/ onclick="return alerta();">
</form>
</body>
</html>