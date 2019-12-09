<!DOCTYPE html>
<html>
<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	
	<title></title>	
        <link  rel="stylesheet" type="text/css" href="../style-form.css" />
        <script  src="../ajax.js" type="text/javascript"></script>
        <scrip  src="//ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js" type="text/javascript"></script>
        <script  src="../instrucao2.js"></script>

</head>
<?php
//fara a conexao com banco de dados
include_once '../conexao.php';

	$turma = filter_input(INPUT_GET, "num_turma");
	
// ------------------------------------------------ NOVO FILTRO--------------------------------------------------------------

	//assim que inicia, como não tem parametro, ele busca tudo
	$get = "SELECT * FROM aluno WHERE turma_fk='$turma' ORDER BY id_aluno DESC";

	$resultado = mysqli_query($con,$get);
	$conteudo = mysqli_fetch_assoc($resultado);
	$total = mysqli_num_rows($resultado);


// ------------------------------------------------ NOVO FILTRO--------------------------------------------------------------

?>
<body>

<div> 
<table>
  <tr>
<p><?php echo $total ?> Alunos nesta turma</p>
<?php 

if ($total) { do{

?>
    <p style="font-size:12px;"><a href="#" onclick="abrirPagd('<?php echo "paginapassaraluno.php?id_aluno=" . $conteudo['id_aluno'] . "&matricula=" . $conteudo['matricula_alu'] . "&turma=" . $conteudo['turma_fk'] ?>');"><?php echo $conteudo['nome_alu'] ?></a> <br/> <?php echo $conteudo['matricula_alu'] ?></p>

<?php 
} while ( $conteudo = mysqli_fetch_assoc($resultado)); 

  mysqli_free_result($resultado);}

  mysqli_close($con);
?>

  
  </tr>
  </table>
  </div>

</body>

</html>