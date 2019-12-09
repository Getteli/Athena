<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>athena | Alunos</title>
  <!-- favicon -->
  <link rel="shortcut icon" href="../../dist/img/favicon.png" type="image/x-icon" />
    
  <meta name="apple-mobile-web-app-capable" content="yes"> 
  <meta name="mobile-web-app-capable" content="yes">
  <!-- manifest -->
  <link rel="manifest" href="../../dist/js/manifest.json">
  <!-- bookmark_bubble -->
  <script type="text/javascript" src="../../dist/js/bookmark_bubble.js"></script>    
  
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- jQuery 3.1.1 -->
  <script src="../../plugins/jQuery/jquery-3.1.1.min.js"></script>
  <!-- jQuery UI 1.11.4 -->
  <script src="https://code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script>
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="../../bootstrap/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../../dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="../../dist/css/skins/_all-skins.min.css">
  <!-- ChecBox Material -->
  <!--<link rel="stylesheet" href="../../dist/css/cb/style.css">-->
  <!--<link rel="stylesheet" href="../../dist/css/cb/style.scss">-->
  <!--<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css">-->

  <!-- jvectormap -->
  <link rel="stylesheet" href="../../plugins/jvectormap/jquery-jvectormap-1.2.2.css">
  <!-- Date Picker -->
  <link rel="stylesheet" href="../../plugins/datepicker/datepicker3.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="../../plugins/daterangepicker/daterangepicker.css">
  <!-- bootstrap wysihtml5 - text editor -->
  <link rel="stylesheet" href="../../plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">
  <!-- cb material -->
  <link rel="stylesheet" href="../../dist/css/cb/checkb.css">
  
<style>
.widget-user-image{
position:block;
float:left;
width:100%;
margin-bottom:60px;
}
#dium{
float:left;
position: relative;
left: 50%;
}
#didois{
float:left;
position: relative;
border: 5px solid #fff;
border-radius: 70px;
top:40px;
left:-50%;
background-color:#fff;
}
.img-circle{
cursor:pointer;
}
/* Esconde o input */
input[type='file'] {
  display: none
}

</style>
<scrip  src="//ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js" type="text/javascript"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.2.0/jquery-confirm.min.css" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.2.0/jquery-confirm.min.js"></script>     


  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  <header class="main-header">
    <!-- Logo -->
    <a href="../inicio.php" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>S</b>SE</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>ATHENA</b>.SSE</span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <!-- Messages: style can be found in dropdown.less-->
          <li class="dropdown messages-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <i class="fa fa-envelope-o"></i>
              <span class="label label-danger noti"></span>
            </a>       
          </li>

          <!-- Control Sidebar Toggle Button -->
          <li class="dropdown user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-gears"></i></a>
            
            <ul class="dropdown-menu">
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-left" style="margin-right: 10px;">
                  <a href="../../dist/php/bloq.php" class="btn btn-warning" title="Bloquear"><i class="fa fa-unlock-alt"></i></a>
                </div>
                <div class="pull-right">
                  <a href="../../dist/php/logout.php" class="btn btn-danger" title="Deslogar"><i class="fa  fa-power-off"></i></a>
                </div>
              </li>  
            </ul>
                             
          </li>
          
        </ul>
      </div>
      
    </nav>
  </header>
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img class="image"/>
        </div>      
        <div class="pull-left info">
          <span><?php echo $logado ?></span>
        </div>    
      </div>
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">MENU DE NAVEGAÇÃO</li>

        <li>
          <a href="../inicio.php">
            <i class="fa fa-home"></i> <span>Inicio</span>
          </a>
        </li>
        
        <li>
          <a href="../mailbox/agenda.php">
            <i class="fa fa-envelope"></i> <span>Agenda</span>
            <span class="pull-right-container">
            </span>
          </a>
        </li>
        
        <li class="treeview">
          <a href="#">
            <i class="fa fa-users"></i>
            <span>Turmas</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="../class/cadastrar_turma.php"><i class="fa fa-circle-o"></i> Cadastrar</a></li>
            <li><a href="../class/buscar_turma.php"><i class="fa fa-circle-o"></i> Buscar</a></li>
          </ul>
        </li>
        
        <li class="treeview">
          <a href="#">
            <i class="fa fa-child"></i>
            <span>Alunos</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="cadastrar_aluno.php"><i class="fa fa-circle-o"></i> Cadastrar</a></li>
            <li><a href="buscar_aluno.php"><i class="fa fa-circle-o"></i> Buscar</a></li>
            <li><a href="#"><i class="fa fa-circle-o"></i> Controle</a></li>
            <li><a href="#"><i class="fa fa-circle-o"></i> Registro</a></li>
          </ul>
        </li>
        
        <li class="treeview">
          <a href="#">
            <i class="fa fa-mortar-board"></i> <span>Professores</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="#"><i class="fa fa-circle-o"></i> Cadastrar</a></li>
            <li><a href="#"><i class="fa fa-circle-o"></i> Buscar</a></li>
          </ul>
        </li>

        <li>
          <a href="../calendario.php">
            <i class="fa fa-calendar"></i> <span>Calendário</span>
          </a>
        </li>

        <li>
          <a href="#">
            <i class="fa fa-credit-card"></i> <span>Financeiro</span>
          </a>
        </li>        

        <li>
          <a href="#">
            <i class="fa fa-folder-open"></i> <span>Fim do ano letivo</span>
          </a>
        </li>       
        
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>
  
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Aluno
        <small>Alterar aluno</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="../inicio.php"><i class="fa fa-dashboard"></i> Inicio</a></li>
        <li><a href="#">Aluno</a></li>
        <li class="active">Alterar aluno</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
  

<?php
//fara a conexao com banco de dados
include_once '../../dist/php/conexao.php';

//chama a info, para a versão do sistema
include_once '../../dist/php/info.php';

//recupera os dados enviados atraves do formulario

//Files
$filefoto = $_FILES['filefoto'];
//NOME TEMPORARIO
$file_foto = $_FILES["filefoto"]["tmp_name"];
 //NOME DO ARQUIVO NO COMPUTADOR
$file_namefoto = $_FILES["filefoto"]["name"];
//TIPO DO ARQUIVO
$file_typefoto = $_FILES["filefoto"]["type"];

$file_foto2 = $_FILES["tst"]["tmp_name"];
 //NOME DO ARQUIVO NO COMPUTADOR
$file_namefoto2 = $_FILES["tst"]["name"];
//TIPO DO ARQUIVO
$file_typefoto2 = $_FILES["tst"]["type"];


       if(isset($_FILES['file']))
         {     
  
//NOME TEMPORÁRIO
$file_tmp = $_FILES["file"]["tmp_name"];
 //NOME DO ARQUIVO NO COMPUTADOR
$file_name = $_FILES["file"]["name"];
//TAMANHO DO ARQUIVO
$file_size = $_FILES["file"]["size"];
//MIME DO ARQUIVO
$file_type = $_FILES["file"]["type"];

}

//recupera os dados enviados atraves do formulário
//ALUNO
$matricula = filter_input(INPUT_POST, "Matricula");
$nome_aluno = filter_input(INPUT_POST, "NomeDoAluno");
$sexo = filter_input(INPUT_POST, "sexo");
$dt_nasc = filter_input(INPUT_POST, "DataNasc");
$rg_aluno = filter_input(INPUT_POST, "RGAluno");
$cpf_aluno = filter_input(INPUT_POST, "CPFAluno");
$turma_fk = filter_input(INPUT_POST, "TurmaFk");
$pag = filter_input(INPUT_POST, "ativo");

//alterar o campo ativo no app, sobre o pagamento
$geta = "SELECT ativo_l FROM login WHERE matricula_alu = '$matricula'";
$exec = mysqli_query($con,$geta);
$conteudo = mysqli_fetch_assoc($exec);
	
if($conteudo['ativo_l'] != $pag){
	$update = mysqli_query($con,"UPDATE login set ativo_l = '$pag' WHERE matricula_alu='$matricula';");
}

//FILIAÇÃO
$nome_resp = filter_input(INPUT_POST, "NomeResp");
$cpf_resp = filter_input(INPUT_POST, "CPFResp");
$rg_resp = filter_input(INPUT_POST, "RGResp");
$dt_nasc_resp = filter_input(INPUT_POST, "DataNascResp");

//verifica se o email foi alterado ou nao, para saber se precisa reenviar um email de confirmação
$email_resp = filter_input(INPUT_POST, "Email");

  $sqlc = "SELECT * FROM aluno WHERE email_resp='$email_resp'";
  $dados = mysqli_query($con,$sqlc);
  $linha = mysqli_fetch_assoc($dados);

$nome_resp2 = filter_input(INPUT_POST, "NomeResp2");
$cpf_resp2 = filter_input(INPUT_POST, "CPFResp2");
$rg_resp2 = filter_input(INPUT_POST, "RGResp2");
$dt_nasc_resp2 = filter_input(INPUT_POST, "DataNascResp2");

//verifica se o email2 foi alterado ou nao, para saber se precisa reenviar um email de confirmação
$email_resp2 = filter_input(INPUT_POST, "Email2");

  $sqlc2 = "SELECT * FROM aluno WHERE email_resp2='$email_resp2'";
  $dados2 = mysqli_query($con,$sqlc2);
  $linha2 = mysqli_fetch_assoc($dados2);

//FINANCEIRO
$nome_respf = filter_input(INPUT_POST, "NomeRespf");
$cpf_respf = filter_input(INPUT_POST, "CPFRespf");
$rg_respf = filter_input(INPUT_POST, "RGRespf");
$dt_nasc_respf = filter_input(INPUT_POST, "DataNascRespf");

//verifica se o emailF foi alterado ou nao, para saber se precisa reenviar um email de confirmação
$email_respf = filter_input(INPUT_POST, "Emailf");

  $sqlc3 = "SELECT * FROM aluno WHERE email_respf='$email_respf'";
  $dados3 = mysqli_query($con,$sqlc3);
  $linha3 = mysqli_fetch_assoc($dados3);

$tel_fixo_resp = filter_input(INPUT_POST, "TelFixo");
$celular_resp = filter_input(INPUT_POST, "Celular");
$celular_resp2 = filter_input(INPUT_POST, "Celular2");
$celular_respf = filter_input(INPUT_POST, "Celularf");
$logradouro_resp = filter_input(INPUT_POST, "LogradouroResp");
$cep_resp = filter_input(INPUT_POST, "CEPResp");
$bairro_resp = filter_input(INPUT_POST, "BairroResp");
$cidade_resp = filter_input(INPUT_POST, "CidadeResp");
$num_resp = filter_input(INPUT_POST, "NumResp");

$resp_Seg_nome1 = filter_input(INPUT_POST, "RespSegNome1");
$resp_seg_tel1 = filter_input(INPUT_POST, "RespSegTel1");
$resp_seg_cpf1 = filter_input(INPUT_POST, "RespSegCpf1");
$resp_Seg_nome2 = filter_input(INPUT_POST, "RespSegNome2");
$resp_seg_tel2 = filter_input(INPUT_POST, "RespSegTel2");
$resp_seg_cpf2 = filter_input(INPUT_POST, "RespSegCpf2");

/*formatacao da data*/
function inverteData($data){
    if(count(explode("/",$data)) > 1){
        return implode("-",array_reverse(explode("/",$data)));
    }elseif(count(explode("-",$data)) > 1){
        return implode("/",array_reverse(explode("-",$data)));
    }
}
     
$dateFormat = inverteData($dt_nasc);

$dateFormat2 = inverteData($dt_nasc_resp);

$dateFormat4 = inverteData($dt_nasc_respf);
     
if ($dt_nasc_resp2 !=""){
  $dateFormat3 = inverteData($dt_nasc_resp2);     
}else{
  $dt_nasc_resp2 = "0000-00-00";
}
     
//query para buscar se numero maximo ja foi alcançado
$get_turm = "SELECT num_alu_turma FROM turma WHERE num_turma='$turma_fk'";
$query_t = mysqli_query($con,$get_turm);
$conteudo_t = mysqli_fetch_assoc($query_t);
$num_turma = $conteudo_t['num_alu_turma'];

$get_alu= "SELECT id_aluno FROM aluno WHERE turma_fk='$turma_fk'";
$query_a = mysqli_query($con,$get_alu);
$total_a = mysqli_num_rows($query_a);

if($num_turma == $total_a){

echo "<script type='text/javascript'>
	$.confirm({
		title: 'Erro!',
		content: 'A turma escolhida já alcançou o numero máximo de alunos',
		buttons: {
			Ok: {
			text: 'Ok',
			btnClass: 'btn-blue',
			keys: ['enter', 'shift'],
				action: function(){
				 window.history.back();
				}
			}
		}
	});
</script>";

}else{
// verificar a conexão, se tudo estiver certo, vai executar a linha e enviar o novo registro, se nao vai informar qual o erro
if ($con) {

//SE O ARQUIVO FOR ZERO E SE FOTO FOR VAZIA
if ($file_size == 0 && $file_namefoto ==""){
  
$query = mysqli_query($con, "update aluno set nome_alu='$nome_aluno', sexo='$sexo', data_nasc='$dateFormat',rg_alu='$rg_aluno', cpf_alu='$cpf_aluno', turma_fk='$turma_fk',nome_resp='$nome_resp',cpf_resp='$cpf_resp',rg_resp='$rg_resp',data_nasc_resp='$dateFormat2',email_resp='$email_resp',nome_resp2='$nome_resp2',cpf_resp2='$cpf_resp2',rg_resp2='$rg_resp2',data_nasc_resp2='$dateFormat3',email_resp2='$email_resp2',nome_respf='$nome_respf',cpf_respf='$cpf_respf',rg_respf='$rg_respf',data_nasc_respf='$dateFormat4',email_respf='$email_respf',telefone_resp='$tel_fixo_resp',celular_resp='$celular_resp',celular_resp2='$celular_resp2',celular_respf='$celular_respf',logradouro_resp='$logradouro_resp',cep_resp='$cep_resp',bairro_resp='$bairro_resp',cidade_resp='$cidade_resp',num_resp='$num_resp',seg_nome='$resp_Seg_nome1',seg_celular='$resp_seg_tel1',seg_cpf='$resp_seg_cpf1',seg2_nome='$resp_Seg_nome2',seg2_celular='$resp_seg_tel2',seg2_cpf='$resp_seg_cpf2',ativo='$pag' WHERE matricula_alu='$matricula';");
  				
if ($query) {
		
if($email_resp != $linha['email_resp'] || $email_resp2 != $linha2['email_resp2'] || $email_respf != $linha3['email_respf']){
  iconv_set_encoding("internal_encoding", "UTF-8");

  $headers = "MIME-Version: 1.1\r\n";
  $headers .= "From: Castelinho - <castelinhosistema@gmail.com>\r\n";
  $headers .= "Content-type: text/html; charset=iso-8859-1\r\n";
  $headers  .= "Content-type: text/html; charset=iso-8859-1\r\n";
  ('Content-type: text/html; charset=iso-8859-1\r\n');
	 
  $subject = "Confirmação de cadastro - CEC Castelinho";           
  $mensagem1  = "Responsável {$nome_resp}<br />
  <strong>Usuario</strong>: {$email_resp}<br />
  <strong>Senha</strong>: {$matricula}<br /> <br />
  Obrigado!<br /> <br /> 
  Esta é uma mensagem automática, por favor não responda!Teste";
  $subject = utf8_decode($subject);
  $mensagem1 = utf8_decode($mensagem1);

  $mensagem2 = "Responsável {$nome_resp2}<br />
  <strong>Usuario</strong>: {$email_resp2}<br />
  <strong>Senha</strong>: {$matricula}<br /> <br />
  Obrigado!<br /> <br /> 
  Esta é uma mensagem automática, por favor não responda!";
  $mensagem2 = utf8_decode($mensagem2);

  $mensagem3 = "Responsável {$nome_respf}<br /> 
  <strong>Usuario</strong>: {$email_respf}<br />
  <strong>Senha</strong>: {$matricula}<br /> <br />
  Obrigado!<br /> <br />  
  Esta é uma mensagem automática, por favor não responda!";
  $mensagem3 = utf8_decode($mensagem3);	            
	 
  $send_contact=mail($email_resp, $subject, $mensagem1, $headers);
  $send_contact= mail($email_resp2, $subject, $mensagem2, $headers);
  $send_contact=mail($email_respf, $subject, $mensagem3, $headers);
		
}

              
echo "<script type='text/javascript'>
$.confirm({
title: 'Sucesso!',
content: 'Aluno alterado com sucesso',
buttons: {
Ok: {
text: 'Ok',
btnClass: 'btn-blue',
keys: ['enter', 'shift'],
action: function(){
window.location = 'buscar_aluno.php';
}
}
}
});
</script>";

}else{
  die("Erro6: ".mysqli_error($con));
}
  
}
//SE A FOTO FOR VAZIA E SE ARQUIVO CONTER ALGO  
else if ($file_namefoto == '' && $file_size != 0 ){
					
  
$query = mysqli_query($con, "update aluno set nome_alu='$nome_aluno', sexo='$sexo', data_nasc='$dateFormat',rg_alu='$rg_aluno', cpf_alu='$cpf_aluno', turma_fk='$turma_fk',nome_resp='$nome_resp',cpf_resp='$cpf_resp',rg_resp='$rg_resp',data_nasc_resp='$dateFormat2',email_resp='$email_resp',nome_resp2='$nome_resp2',cpf_resp2='$cpf_resp2',rg_resp2='$rg_resp2',data_nasc_resp2='$dateFormat3',email_resp2='$email_resp2',nome_respf='$nome_respf',cpf_respf='$cpf_respf',rg_respf='$rg_respf',data_nasc_respf='$dateFormat4',email_respf='$email_respf',telefone_resp='$tel_fixo_resp',celular_resp='$celular_resp',celular_resp2='$celular_resp2',celular_respf='$celular_respf',logradouro_resp='$logradouro_resp',cep_resp='$cep_resp',bairro_resp='$bairro_resp',cidade_resp='$cidade_resp',num_resp='$num_resp',seg_nome='$resp_Seg_nome1',seg_celular='$resp_seg_tel1',seg_cpf='$resp_seg_cpf1',seg2_nome='$resp_Seg_nome2',seg2_celular='$resp_seg_tel2',seg2_cpf='$resp_seg_cpf2',ativo='$pag' WHERE matricula_alu='$matricula';");


	for($i = 0; $i < count($file_tmp); $i++)
        { 
        
         		
				
		//montamos o SQL para envio dos dados
		$sql = "INSERT INTO arquivos(id, nome_alu, matricula_alu, rg, NmArquivo , Arquivo , Tipo , Tamanho , DtHrEnvio )
		VALUES ('NULL', '$nome_aluno', '$matricula', '$rg_respf', '$file_name[$i]', '$file_tmp[$i]', '$file_type[$i]', '$file_size[$i]',CURRENT_TIMESTAMP)";
		
		//executamos a instução SQL
		mysqli_query($con,"$sql") or die (mysqli_error($con));
       
 
}
		
if ($query) {
	                
if($email_resp != $linha['email_resp'] || $email_resp2 != $linha2['email_resp2'] || $email_respf != $linha3['email_respf']){
iconv_set_encoding("internal_encoding", "UTF-8");
$headers = "MIME-Version: 1.1\r\n";
$headers .= "From: Castelinho - <castelinhosistema@gmail.com>\r\n";
$headers .= "Content-type: text/html; charset=iso-8859-1\r\n";
$headers  .= "Content-type: text/html; charset=iso-8859-1\r\n";
('Content-type: text/html; charset=iso-8859-1\r\n');
	 
$subject = "Confirmação de cadastro - CEC Castelinho";           
$mensagem1  = "Responsável {$nome_resp}<br />
<strong>Usuario</strong>: {$email_resp}<br />
<strong>Senha</strong>: {$matricula}<br /> <br />
Obrigado!<br /> <br /> 
Esta é uma mensagem automática, por favor não responda!";
	            
	            
$mensagem2 = "Responsável {$nome_resp2}<br />
<strong>Usuario</strong>: {$email_resp2}<br />
<strong>Senha</strong>: {$matricula}<br /> <br />
Obrigado!<br /> <br /> 
Esta é uma mensagem automática, por favor não responda!";
	            
$mensagem3 = "Responsável {$nome_respf}<br />
<strong>Usuario</strong>: {$email_respf}<br />
<strong>Senha</strong>: {$matricula}<br /> <br />
Obrigado!<br /> <br /> 
Esta é uma mensagem automática, por favor não responda!";
$subject = utf8_decode($subject);
$mensagem1 = utf8_decode($mensagem1);
$mensagem2 = utf8_decode($mensagem2);
$mensagem3 = utf8_decode($mensagem3);	
	 
$send_contact=mail($email_resp, $subject, $mensagem1, $headers);
$send_contact= mail($email_resp2, $subject, $mensagem2, $headers);
$send_contact=mail($email_respf, $subject, $mensagem3, $headers);
		
}

echo "<script type='text/javascript'>
$.confirm({
title: 'Sucesso!',
content: 'Aluno alterado com sucesso',
buttons: {
Ok: {
text: 'Ok',
btnClass: 'btn-blue',
keys: ['enter', 'shift'],
action: function(){
window.location = 'buscar_aluno.php';
}
}
}
});
</script>";			
}else{
  die("Erro5:".mysqli_error($con));
}			
					
}
//SE CONTER FOTO E ARQUIVO FOR VAZIO
else if ($file_namefoto != '' && $file_size == 0){
					
$binariofoto = file_get_contents($file_foto);
// evitamos erro de sintaxe do MySQL
$binariofoto = mysqli_real_escape_string($con,$binariofoto);
     
$query = mysqli_query($con, "update aluno set nome_alu='$nome_aluno', sexo='$sexo', nome_foto='$file_namefoto', foto_aluno='$binariofoto', Tipo='$file_typefoto',data_nasc='$dateFormat',rg_alu='$rg_aluno', cpf_alu='$cpf_aluno', turma_fk='$turma_fk',nome_resp='$nome_resp',cpf_resp='$cpf_resp',rg_resp='$rg_resp',data_nasc_resp='$dateFormat2',email_resp='$email_resp',nome_resp2='$nome_resp2',cpf_resp2='$cpf_resp2',rg_resp2='$rg_resp2',data_nasc_resp2='$dateFormat3',email_resp2='$email_resp2',nome_respf='$nome_respf',cpf_respf='$cpf_respf',rg_respf='$rg_respf',data_nasc_respf='$dateFormat4',email_respf='$email_respf',telefone_resp='$tel_fixo_resp',celular_resp='$celular_resp',celular_resp2='$celular_resp2',celular_respf='$celular_respf',logradouro_resp='$logradouro_resp',cep_resp='$cep_resp',bairro_resp='$bairro_resp',cidade_resp='$cidade_resp',num_resp='$num_resp',seg_nome='$resp_Seg_nome1',seg_celular='$resp_seg_tel1',seg_cpf='$resp_seg_cpf1',seg2_nome='$resp_Seg_nome2',seg2_celular='$resp_seg_tel2',seg2_cpf='$resp_seg_cpf2',ativo='$pag' WHERE matricula_alu='$matricula';");
		
		
if ($query) {
if($email_resp != $linha['email_resp'] || $email_resp2 != $linha2['email_resp2'] || $email_respf != $linha3['email_respf']){
iconv_set_encoding("internal_encoding", "UTF-8");
$headers = "MIME-Version: 1.1\r\n";
$headers .= "From: Castelinho - <castelinhosistema@gmail.com>\r\n";
$headers .= "Content-type: text/html; charset=iso-8859-1\r\n";
$headers  .= "Content-type: text/html; charset=iso-8859-1\r\n";
('Content-type: text/html; charset=iso-8859-1\r\n');
 
$subject = "Confirmação de cadastro - CEC Castelinho";           
$mensagem1  = "Responsável {$nome_resp}<br />
<strong>Usuario</strong>: {$email_resp}<br />
<strong>Senha</strong>: {$matricula}<br /> <br />
Obrigado!<br /> <br /> 
Esta é uma mensagem automática, por favor não responda!";
	            	            
$mensagem2 = "Responsável {$nome_resp2}<br />
<strong>Usuario</strong>: {$email_resp2}<br />
<strong>Senha</strong>: {$matricula}<br /> <br />
Obrigado!<br /> <br /> 
Esta é uma mensagem automática, por favor não responda!";
	            
$mensagem3 = "Responsável {$nome_respf}<br />
<strong>Usuario</strong>: {$email_respf}<br />
<strong>Senha</strong>: {$matricula}<br /> <br />
Obrigado!<br /> <br /> 
Esta é uma mensagem automática, por favor não responda!";
$subject = utf8_decode($subject);
$mensagem1 = utf8_decode($mensagem1);
$mensagem2 = utf8_decode($mensagem2);
$mensagem3 = utf8_decode($mensagem3);		            

$send_contact=mail($email_resp, $subject, $mensagem1, $headers);
$send_contact= mail($email_resp2, $subject, $mensagem2, $headers);
$send_contact=mail($email_respf, $subject, $mensagem3, $headers);
		
}

echo "<script type='text/javascript'>
$.confirm({
title: 'Sucesso!',
content: 'Aluno alterado com sucesso',
buttons: {
Ok: {
text: 'Ok',
btnClass: 'btn-blue',
keys: ['enter', 'shift'],
action: function(){
window.location = 'buscar_aluno.php';
}
}
}
});
</script>";
}else{
  die("Erro4:".mysqli_error($con));
}
}
//SE CONTER FOTO E CONTER ARQUIVO
else if ($file_namefoto != '' && $file_size != 0 ){
					
$binariofoto =file_get_contents($file_foto);
// evitamos erro de sintaxe do MySQL
$binariofoto = mysqli_real_escape_string($con,$binariofoto);
  
$query = mysqli_query($con, "update aluno set nome_alu='$nome_aluno', sexo='$sexo', nome_foto='$file_namefoto', foto_aluno='$binariofoto', Tipo='$file_typefoto',data_nasc='$dateFormat',rg_alu='$rg_aluno', cpf_alu='$cpf_aluno', turma_fk='$turma_fk',nome_resp='$nome_resp',cpf_resp='$cpf_resp',rg_resp='$rg_resp',data_nasc_resp='$dateFormat2',email_resp='$email_resp',nome_resp2='$nome_resp2',cpf_resp2='$cpf_resp2',rg_resp2='$rg_resp2',data_nasc_resp2='$dateFormat3',email_resp2='$email_resp2',nome_respf='$nome_respf',cpf_respf='$cpf_respf',rg_respf='$rg_respf',data_nasc_respf='$dateFormat4',email_respf='$email_respf',telefone_resp='$tel_fixo_resp',celular_resp='$celular_resp',celular_resp2='$celular_resp2',celular_respf='$celular_respf',logradouro_resp='$logradouro_resp',cep_resp='$cep_resp',bairro_resp='$bairro_resp',cidade_resp='$cidade_resp',num_resp='$num_resp',seg_nome='$resp_Seg_nome1',seg_celular='$resp_seg_tel1',seg_cpf='$resp_seg_cpf1',seg2_nome='$resp_Seg_nome2',seg2_celular='$resp_seg_tel2',seg2_cpf='$resp_seg_cpf2',ativo='$pag' WHERE matricula_alu='$matricula';");


	for($i = 0; $i < count($file_tmp); $i++)
        { 
        
         		
				
		//montamos o SQL para envio dos dados
		$sql = "INSERT INTO arquivos(id, nome_alu, matricula_alu, rg, NmArquivo , Arquivo , Tipo , Tamanho , DtHrEnvio )
		VALUES ('NULL', '$nome_aluno', '$matricula', '$rg_respf', '$file_name[$i]', '$file_tmp[$i]', '$file_type[$i]', '$file_size[$i]',CURRENT_TIMESTAMP)";
		
		//executamos a instução SQL
		mysqli_query($con,"$sql") or die (mysqli_error($con));
       
 
}		
		
if ($query) {
if($email_resp != $linha['email_resp'] || $email_resp2 != $linha2['email_resp2'] || $email_respf != $linha3['email_respf']){
iconv_set_encoding("internal_encoding", "UTF-8");
$headers = "MIME-Version: 1.1\r\n";
$headers .= "From: Castelinho - <castelinhosistema@gmail.com>\r\n";
$headers .= "Content-type: text/html; charset=iso-8859-1\r\n";
$headers  .= "Content-type: text/html; charset=iso-8859-1\r\n";
('Content-type: text/html; charset=iso-8859-1\r\n');
 
$subject = "Confirmação de cadastro - CEC Castelinho";           
$mensagem1  = "Responsável {$nome_resp}<br />
<strong>Usuario</strong>: {$email_resp}<br />
<strong>Senha</strong>: {$matricula}<br /> <br />
Obrigado!<br /> <br /> 
Esta é uma mensagem automática, por favor não responda!";
	            
	            
$mensagem2 = "Responsável {$nome_resp2}<br />
<strong>Usuario</strong>: {$email_resp2}<br />
<strong>Senha</strong>: {$matricula}<br /> <br />
Obrigado!<br /> <br /> 
Esta é uma mensagem automática, por favor não responda!";
	            
$mensagem3 = "Responsável {$nome_respf}<br />
<strong>Usuario</strong>: {$email_respf}<br />
<strong>Senha</strong>: {$matricula}<br /> <br />
Obrigado!<br /> <br /> 
Esta é uma mensagem automática, por favor não responda!";
$subject = utf8_decode($subject);
$mensagem1 = utf8_decode($mensagem1);
$mensagem2 = utf8_decode($mensagem2);
$mensagem3 = utf8_decode($mensagem3);		            

$send_contact=mail($email_resp, $subject, $mensagem1, $headers);
$send_contact= mail($email_resp2, $subject, $mensagem2, $headers);
$send_contact=mail($email_respf, $subject, $mensagem3, $headers);
		
}
              
echo "<script type='text/javascript'>
$.confirm({
title: 'Sucesso!',
content: 'Aluno alterado com sucesso',
buttons: {
Ok: {
text: 'Ok',
btnClass: 'btn-blue',
keys: ['enter', 'shift'],
action: function(){
window.location = 'buscar_aluno.php';
}
}
}
});
</script>";
}else{
  die("Erro3:".mysqli_error($con));
}									
   
}else{
  die("Erro9: ".mysqli_error($con)); 
}
}else{
  die("Erro1: ".mysqli_error($con)); 
}
}
?>  
  
      </div>
    </section>
    <!-- /.content -->
  </div>
    <!-- /.content-wrapper -->
  <footer class="main-footer">
    <div class="pull-right hidden-xs">
      <b>Versão</b> <?php echo $versao ?>
    </div>
    <strong>Copyright &copy; 2016 <a href="http://troiatecnologia.com.br/" target="_Blank">Troia Tecnologia</a>.</strong> Todos os direitos reservados.
    <strong style="margin-left: 10px;">
	<i class="fa fa-phone"></i> &nbsp; Suporte: (21) 3146-4031 &nbsp; <i class="fa fa-envelope"></i> &nbsp; suporte@troiatecnologia.com.br
    </strong>
  </footer>

</div>
<!-- ./wrapper -->


<script>

var title = document.title;

$(document).ready(function() {
  changeTitle();
});
  
  function changeTitle() {
    $.get("../acao.php", function(resultado){
    if (resultado == "") {
    var newTitle = ''+ title;
     document.title = newTitle;
    }else{
    var newTitle = '(' + resultado + ') ' + title;
    document.title = newTitle;
   } })
}

function newUpdate() {
    update = setInterval(changeTitle, 500000);
}
var docBody = document.getElementById('body-athena');
docBody.onload = newUpdate;
</script>



<script>
/**
 * EXECUTA A FUNÇÃO "ATUALIZA" PARA VERIFICAR SE HÁ ALGUMA NOTIFICAÇÃO
 */
$(document).ready(function() {
  atualiza();
});
  /**
   * FUNÇÃO ATUALIZA QUE BUCA A PÁGINA AÇÃO PARA IMPRIMIR NA ID NOTIFICAÇÃO
   */

function atualiza(){
  $.get("../acao.php", function(resultado){
    $('.noti').html(resultado);
  })
/**
* FUNÇÃO E TEMPO DE ATUALIZAÇÃO DA ID NOTIFICAÇÃO
*/
  setInterval('atualiza()', 500000);
}
</script>



<!-- Bootstrap 3.3.7 -->
<script src="../../bootstrap/js/bootstrap.min.js"></script>
<!-- Sparkline -->
<script src="../../plugins/sparkline/jquery.sparkline.min.js"></script>
<!-- jvectormap -->
<script src="../../plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
<script src="../../plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
<!-- jQuery Knob Chart -->
<script src="../../plugins/knob/jquery.knob.js"></script>
<!-- daterangepicker -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.11.2/moment.min.js"></script>
<script src="../../plugins/daterangepicker/daterangepicker.js"></script>
<!-- datepicker -->
<script src="../../plugins/datepicker/bootstrap-datepicker.js"></script>
<!-- CheckBox Material -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/prefixfree/1.0.7/prefixfree.min.js"></script>
<script src="../../dist/js/cb/index.js"></script>
<!-- InputMask -->
<script src="../../plugins/input-mask/jquery.inputmask.js"></script>
<script src="../../plugins/input-mask/jquery.inputmask.date.extensions.js"></script>
<script src="../../plugins/input-mask/jquery.inputmask.extensions.js"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="../../plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
<!-- Slimscroll -->
<script src="../../plugins/slimScroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="../../plugins/fastclick/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="../../dist/js/adminlte.min.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="../../dist/js/pages/dashboard.js"></script>

</body>
</html>