<?php  

/* esse bloco de código em php verifica se existe a sessão, pois o usuário pode simplesmente não fazer o login e digitar na barra de endereço do seu navegador o caminho para a página principal do site (sistema), burlando assim a obrigação de fazer um login, com isso se ele não estiver feito o login não será criado a session, então ao verificar que a session não existe a página redireciona o mesmo para a index.php.*/

//fara a conexao com banco de dados
include_once '../../dist/php/conexao.php';

//chama a info, para a versão do sistema
include_once '../../dist/php/info.php';

//chama a cachelogin, para verificar o cache se esta logado
include_once '../../dist/php/cachelogin_lad.php';

?>
<?php
//Aqui recebe tudo que vem da agenda
	$id = $_GET['id'];
	$matalu = $_GET['matalu'];
	$matprof = $_GET['matprof'];	
	$remetente = "";
	$destinatario = "";
	
	$sqlna = "SELECT nome_alu FROM aluno WHERE matricula_alu = '$matalu'";
	$dadosna = mysqli_query($con,$sqlna);
			
	$linhana = mysqli_fetch_assoc($dadosna);	
	//
	$sqlnp = "SELECT nome_prof FROM professor WHERE matricula_prof = '$matprof'";
	$dadosnp = mysqli_query($con,$sqlnp);
			
	$linhanp = mysqli_fetch_assoc($dadosnp);

	$sqlre = "SELECT * FROM agenda WHERE id_agen = '$id'";
	$dadosre = mysqli_query($con,$sqlre);	
	
	$linhare = mysqli_fetch_assoc($dadosre);
	
	//faz uma pequena verificação antes de prosseguir
	$sist = $linhare['remedio1'];
	
	$nomealu = $linhana['nome_alu'];
	$nomeprof = $linhanp['nome_prof'];
		
	if(empty($nomeprof)){
	$nomeprof = "Escola";
	}
	
	if(empty($nomealu) && $sist == "turmaagendasistema"){
	$nomealu = $linhare['turma_aluno'];
	}	
	
	if(empty($nomealu) && $sist == "sistema"){
	$nomealu = "Todos";
	}
	
	if($linhare['remedio1'] == "0"){
				$emailResp = $linhare['email_resp_agenda'];
				
				$sql4 = "SELECT * FROM aluno WHERE email_resp = '$emailResp' OR email_resp2 = '$emailResp' OR email_respf = '$emailResp'";
				$dados4 = mysqli_query($con,$sql4);
					
				$linha4 = mysqli_fetch_assoc($dados4);
				
				if($emailResp == $linha4['email_resp']){
				
					$nomeresp = $linha4['nome_resp'];			
				
				}else if($emailResp == $linha4['email_resp2']){
				
					$nomeresp = $linha4['nome_resp2'];							
				
				}else{
				
					$nomeresp = $linha4['nome_respf'];							
				
				}	
		$remetente = $nomeresp;
		$destinatario = $nomeprof;
			
	}else{
		$remetente = $nomeprof;
		$destinatario = $nomealu;
		
	$remedio1 = $linhare['remedio1'];
	$dosagem1 = $linhare['dosagem1'];
	$horario1 = $linhare['horario1'];
	$remedio2 = $linhare['remedio2'];
	$dosagem2 = $linhare['dosagem2'];
	$horario2 = $linhare['horario2'];
	$remedio3 = $linhare['remedio3'];
	$dosagem3 = $linhare['dosagem3'];
	$horario3 = $linhare['horario3'];
	$colacao = $linhare['colacao'];
	$almoco = $linhare['almoco'];	
	$lanche = $linhare['lanche'];	
	$janta = $linhare['janta'];
	$sono = $linhare['sono'];
	$evacuacao = $linhare['evacuacao'];		
	$evacuacaox = $linhare['evacuacaox'];	
			
	}
	
	$assunto = $linhare['titulo_agen'];
	$msg = $linhare['mensagem_age'];
	$dt = $linhare['data_agen'];
	$matalu = $linhare['matricula_alu_agen'];					
	
		
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Athena | Agenda</title>
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
  
<style media="print">
.naprint {
display: none;
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
<body id="body-athena" class="hold-transition skin-blue sidebar-mini">
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
            <a href="agenda.php" >
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
            <i class="fa fa-home"></i> <span>Início</span>
          </a>
        </li>
        
        <li>
          <a href="agenda.php">
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
            <li><a href="../aluno/cadastrar_aluno.php"><i class="fa fa-circle-o"></i> Cadastrar</a></li>
            <li><a href="../aluno/buscar_aluno.php"><i class="fa fa-circle-o"></i> Buscar</a></li>
            <li><a href="../aluno/controle.php"><i class="fa fa-circle-o"></i> Controle</a></li>
            <li><a href="../aluno/registro.php"><i class="fa fa-circle-o"></i> Registro</a></li>
          </ul>
        </li>
        
        <li class="treeview">
          <a href="#">
            <i class="fa fa-mortar-board"></i> 
            <span>Professores</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="../mestre/cadastrar_professor.php"><i class="fa fa-circle-o"></i> Cadastrar</a></li>
            <li><a href="../mestre/buscar_professor.php"><i class="fa fa-circle-o"></i> Buscar</a></li>
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
          <a href="../anoletivo/reorganizacao.php">
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
        Ler agenda
      </h1>
      <ol class="breadcrumb">
        <li><a href="../inicio.php"><i class="fa fa-dashboard"></i> Início</a></li>
        <li class="active">Ler</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-md-3">
          <a href="escrever.php" class="btn btn-primary btn-block margin-bottom naprint">Escrever</a>

          <div class="box box-solid">
            <div class="box-header with-border">
              <h3 class="box-title">Pastas</h3>

              <div class="box-tools">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
              </div>
            </div>
            <div class="box-body no-padding naprint">
              <ul class="nav nav-pills nav-stacked">
                <li><a href="agenda.php"><i class="fa fa-inbox"></i> Caixa de entrada <i class="fa fa-exclamation text-yellow"></i>
                  <span class="label label-primary pull-right noti"></span></a></li>
                <li><a href="enviados.php"><i class="fa fa-envelope-o"></i> Enviados</a></li>
                <li><a href="diaadia.php"><i class="fa fa-file-text-o"></i> Dia a dia <i class="fa fa-exclamation text-yellow"></i></a></li>
                <li><a href="lixeira.php"><i class="fa fa-trash-o"></i> Lixeira</a></li>
              </ul>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /. box -->
          <div class="box box-solid collapsed-box">
            <div class="box-header with-border">
              <h3 class="box-title">Informações</h3>

              <div class="box-tools">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i>
                </button>
              </div>
            </div>
            <div class="box-body no-padding">
              <ul class="nav nav-pills nav-stacked">
                <li><a href="#"><i class="fa fa-exclamation text-yellow"></i>A caixa de entrada contém mensagens recebidas dos responsáveis</a></li>
                <li><a href="#"><i class="fa fa-exclamation text-yellow"></i>A pasta de dia a dia contém mensagens enviada entre professores e responsáveis.</a></li>
              </ul>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
        <div class="col-md-9">
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title"><?php echo $assunto ?></h3>

              <div class="box-tools pull-right">
                <!--<a href="#" class="btn btn-box-tool" data-toggle="tooltip" title="Anterior"><i class="fa fa-chevron-left"></i></a>
                <a href="#" class="btn btn-box-tool" data-toggle="tooltip" title="Próximo"><i class="fa fa-chevron-right"></i></a>-->
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body no-padding">
              <div class="mailbox-read-info">
                <h5><b>De: </b> <?php echo $remetente ."</br><b> Para: </b> ". $destinatario ?> 
                  <span class="mailbox-read-time pull-right"><?php echo $dt ?></span></h5>
              </div>
              <!-- /.mailbox-read-info -->
              <!-- /.mailbox-controls -->
              <div class="mailbox-read-message">
		<p><?php echo $msg ?></p>
		<p><?php
			if($linhare['remedio1'] == "sistema" || $linhare['remedio1'] == "turmaagendasistema" || $linhare['remedio1'] == "1"){		
				//nao aparecerá nada
			}else{
				if($linhare['remedio1'] != "0"){
				
				if(!empty($remedio1)){
				echo "<b>Remédio:&nbsp</b>" . $remedio1 . "</br>";
				echo "<b>Dosagem:&nbsp</b>" . $dosagem1 . "</br>";
				echo "<b>Hora:&nbsp</b>" . $horario1 . "</br>";				
				}
				if(!empty($remedio2)){
				echo "<b>Remédio:&nbsp</b>" . $remedio2 . "</br>";
				echo "<b>Dosagem:&nbsp</b>" . $dosagem2 . "</br>";
				echo "<b>Hora:&nbsp</b>" . $horario2 . "</br>";				
				}
				if(!empty($remedio3)){
				echo "<b>Remédio:&nbsp</b>" . $remedio3 . "</br>";
				echo "<b>Dosagem:&nbsp</b>" . $dosagem3 . "</br>";
				echo "<b>Hora:&nbsp</b>" . $horario3 . "</br>";				
				}
				
				echo "<b>Colação:&nbsp</b>" . $colacao . "</br>";
				echo "<b>Almoço:&nbsp</b>" . $almoco . "</br>";
				echo "<b>Lanche:&nbsp</b>" . $lanche . "</br>";
				echo "<b>Janta:&nbsp</b>" . $janta . "</br>";
				echo "<b>Sono:&nbsp</b>" . $sono . "</br>";
				echo "<b>Evacuação:&nbsp</b>" . $evacuacao . "&nbsp<b>qnt:</b>" . $evacuacaox;
				}			
			}	

		?></p>
              </div>
              <!-- /.mailbox-read-message -->
            </div>
            <!-- /.box-body -->

            <div class="box-footer naprint">
              <div class="pull-right">
                <button type="button" onclick="recarr()" class="btn btn-default"><i class="fa fa-reply"></i> Voltar</button>
                <a href="<?php echo "responder.php?matalu=" . $matalu ?>" class="btn btn-default naprint"><i class="fa fa-share"></i> Responder</a>
              </div>
              <button type="button" id="btn_ex" onclick="alerta1()" class="btn btn-default" title="Excluir"><i class="fa fa-trash-o"></i></button>
              <a style="display:none;" id="a_ex" href="<?php echo "lixoagenda.php?IdAgenda=" . $id ?>"></a>              
              <button type="button" id="btn_print" class="btn btn-default" title="Imprimir"><i class="fa fa-print"></i></button>
            </div>
            <!-- /.box-footer -->
          </div>
          <!-- /. box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
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
	<i class="fa fa-phone"></i> &nbsp; Suporte: <?php echo $suporte ?> &nbsp; <i class="fa fa-envelope"></i> &nbsp; <?php echo $emailsp ?>
    </strong>
  </footer>

</div>
<!-- ./wrapper -->

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
<!-- temporizador -->
<script src="../../dist/js/temporizador.js"></script>
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

<!-- Page Script -->
<script>
// Listen for click on toggle checkbox
$(document).ready(function () {
  $('body').on('click', '.seall', function () {
    if ($(this).hasClass('allChecked')) {
    /*checkbox desmarcado*/
    	document.getElementById("sealltudo").style.display="none";
        $('input[type="checkbox"]', '#tbex').prop('checked', false);
        $(".fa", this).removeClass("fa-check-square-o").addClass('fa-square-o');  
	//document.getElementById("excluirall").style.display="none";                          
    } else {
    //checkbox marcado 
	document.getElementById("sealltudo").style.display="inline";
        $('input[type="checkbox"]', '#tbex').prop('checked', true);     
        $(".fa", this).removeClass("fa-square-o").addClass('fa-check-square-o');
	//document.getElementById("excluirall").style.display="inline";
    }
    $(this).toggleClass('allChecked');
  })
});

// function alerta do href
function alerta1(){
return	$.confirm({
title: 'Agenda',
content: 'Deseja realmente excluir?',
buttons: {
Sim: {
text: 'Sim',
btnClass: 'btn-blue',
action: function (){
document.getElementById('a_ex').click();
}
},
cancelar: function () {
				            
}
}
});
}

//voltar
function recarr(){
window.history.back();
}  
		
//imprimir
var btn_print = document.querySelector('#btn_print');
btn_print.addEventListener('click', function(){print();})		

//mascarar method GET
if(typeof window.history.replaceState == 'function') {
        window.history.replaceState({}, "Hide", "http://athena.troiatecnologia.com.br/new_sistem/pages/mailbox/ler_agendad.php");
}     
</script>
</body>
</html>