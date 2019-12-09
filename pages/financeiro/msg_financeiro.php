<!DOCTYPE html lang="pt-br">
<html>
<head>
	<title>ATHENA C.E. CASTELINHO | NOVA AGENDA</title>
	<meta charset="utf-8">
        <link rel="stylesheet" type="text/css" href="http://athena.troiatecnologia.com.br/castelinho/SISTEMA ATHENA_CEC_V1.0.5/style-form.css" />
                <script src="../jquery-3.1.1.min.js" type="text/javascript"></script>        
	<scrip  src="//ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js" type="text/javascript"></script>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.2.0/jquery-confirm.min.css" />
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.2.0/jquery-confirm.min.js"></script> 
</head>
<body>
<h1>Notificar Responsáveis</h1>
<p style="font-size:14pt;">Envie uma mensagem para o(s) responsável(is) com mensalidade em atraso.</p>
<p style="font-size:14pt;">Não Selecionando nenhum aluno a mensagem será enviada para todos os responsáveis com atraso.</p>


<?php 
//fará a conexão com banco de dados
include_once '../conexao.php';

//query para buscar as turmas e colocar no select
$sql = "SELECT * FROM aluno WHERE ativo='1' ORDER BY id_aluno DESC";
$get=mysqli_query($con,$sql);

$option = '';

while($row = mysqli_fetch_assoc($get)){
	$option .= '<option value = "'.$row['matricula_alu'].'">'.$row['nome_alu'].'</option>';
}

?>
<p>
<div id="challenge">
</div>
 <table id="tb_resp_aluno" border="0" cellspacing="10" cellpadding="10">
 <tr>
 <td>
<div class="form_dir">
	<form id="form" name="form" action="enviar_msgf.php"> <!-- Esse action, é o arquivo salvar q vai receber tudo oq foi digitado e vai enviar para o banco de dados-->
		<select id="label" name="termo_aluno" style="height: 30px; width: 70%; background-color: #ffffff; font-size: 13px;">
		         <option value="0">Selecionar Responsável</option>
		         <?php echo $option; ?>
	        </select>
</div>
</table>
<table id="tb_resp_aluno" border="0" cellspacing="10" cellpadding="10">
		<tr>
		<td><span><label for="titulo">Título da Mensagem:</label></span><br/>
                <input type="text" name="titulo_msg" id="titulo" class="camp_txt" required name="titulo"></td>
                </tr>
                <tr>
                <td><span><label for="msg">Mensagem:</label></span><br/>
                <textarea name="Mensagem" id="msg" class="camp_mens" required name="msg"></textarea></td>
                </tr>
</table>
		<input type="button" class="bt-enviar" value="ENVIAR" onclick="alerta()"/>
	</form>		
</p>
<script type="text/javascript">

	function alerta(){
	        var titulo = form.titulo.value;
	        var mensagem = form.msg.value;
		return	$.confirm({
		    title: 'Financeiro',
		    content: 'Deseja mesmo enviar essa mensagem?',
		    buttons: {
		        Sim: {
		       	text: 'Sim',
		       	btnClass: 'btn-blue',
		        action: function (){
			        if (titulo == "") {
       	       				form.titulo.focus();
      	       				return true;
			        }else if(mensagem == ""){
					form.msg.focus();
      	       				return true;								        
			        }
				document.getElementById('form').submit();
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