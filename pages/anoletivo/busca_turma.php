<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<title></title>	
        <link  rel="stylesheet" type="text/css" href="../style-form.css" />
        <script  src="../ajax.js" type="text/javascript"></script>
        <scrip  src="//ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js" type="text/javascript"></script>
        <script  src="../instrucao.js"></script>
        <script  src="../instrucao2.js"></script>
                <script src="../jquery-3.1.1.min.js" type="text/javascript"></script>        
	<scrip  src="//ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js" type="text/javascript"></script>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.2.0/jquery-confirm.min.css" />
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.2.0/jquery-confirm.min.js"></script>  

</head>
<?php
//fara a conexao com banco de dados
include_once '../conexao.php';

	$parametro = filter_input(INPUT_GET, "parametro");
	
// ------------------------------------------------ NOVO FILTRO--------------------------------------------------------------

// se for numérico
if (is_numeric($parametro) ||floor($parametro) ) {
	// pesquiso em campos com numeros, essenciais
	$get = "SELECT * from turma WHERE num_alu_turma='$parametro' ORDER BY id_turma DESC";

} /* se for string */
else if ((String)$parametro) {
	
	$get="SELECT * from turma WHERE num_turma like '%$parametro%' OR turno_turma like '%$parametro%' ORDER BY id_turma DESC";

}else{
	//assim que inicia, como não tem parametro, ele busca tudo
	$get = "SELECT * FROM turma ORDER BY id_turma DESC";
}
	$resultado = mysqli_query($con,$get);
	$conteudo = mysqli_fetch_assoc($resultado);
	$total = mysqli_num_rows($resultado);

// ------------------------------------------------ NOVO FILTRO--------------------------------------------------------------

?>
<body>

<div class="ath_left"> 
<table id="consulta-aluno">
  <tr>
    <form action="<?php echo $_SERVER['PHP_SELF'];?>">

    <input type="text" class="camp_txt2" name="parametro" />
    <input type="submit" class="bt-enviar" value="Buscar" />
  </form>
  </tr>
  <tr>
<p><?php echo $total ?> Turmas cadastradas</p>
<?php 

if ($total) { do{

//query q busca o numero exato de alunos cadastrado na turma
$nome_t = $conteudo['num_turma'];

	$get_total = "SELECT id_aluno FROM aluno WHERE turma_fk='$nome_t'";

	$resultado_t = mysqli_query($con,$get_total);
	$conteudo_total= mysqli_num_rows($resultado_t);
?>

	
    <p><a href="#" onclick="abrirPag('<?php echo "busca_alu.php?id=" . $conteudo['id_turma'] . "&num_turma=" . $conteudo['num_turma'] ?>');"><?php echo $conteudo['num_turma'] ?></a> <br/> <?php echo $conteudo['turno_turma'] . " | " . $conteudo_total." alunos" ?></p>

<?php 
} while ( $conteudo = mysqli_fetch_assoc($resultado)); 

  mysqli_free_result($resultado);}

  mysqli_close($con);
?>

  
  </tr>
  </table>
  </div>

  <div class="ath_center">
<div id="dados_alunos" style=" position:relative; width:auto; float:left; ">
  
  <p>Busque pela turma especifica no menu ao lado</p>


</div>

<div id="dados_alunos2" style=" position:static; width:69%; float:right;">


</div>

</div>
<script type="text/javascript">

	function alerta(){
		return	$.confirm({
		    title: 'Passar aluno',
		    content: 'Deseja passar ess aluno de ano?',
		    buttons: {
		        Sim: {
		       	text: 'Sim',
		       	btnClass: 'btn-blue',
		        action: function (){
				formu = document.getElementById('form');
				formu.submit();		
		        	}
		        },
		        cancelar: function () {
		            
		        }
		    }
		});
	}
</script>
</body>

</html>