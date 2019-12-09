<?php  

/* esse bloco de código em php verifica se existe a sessão, pois o usuário pode simplesmente não fazer o login e digitar na barra de endereço do seu navegador o caminho para a página principal do site (sistema), burlando assim a obrigação de fazer um login, com isso se ele não estiver feito o login não será criado a session, então ao verificar que a session não existe a página redireciona o mesmo para a index.php.*/

//fara a conexao com banco de dados
include_once '../../dist/php/conexao.php';

//chama a info, para a versão do sistema
include_once '../../dist/php/info.php';

//chama a cachelogin, para verificar o cache se esta logado
include_once '../../dist/php/cachelogin.php';

?>
<?php
            	//query para buscar as turmas e colocar no select
		$sql = "SELECT * FROM turma ORDER BY id_turma ASC";
		$get=mysqli_query($con,$sql);
		
		$option = '';
		
		while($row = mysqli_fetch_assoc($get)){
			$option .= '<option value = "'.$row['num_turma'].'">'.$row['num_turma'].'</option>';
		}
		
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

  <!-- jvectormap -->
  <link rel="stylesheet" href="../../plugins/jvectormap/jquery-jvectormap-1.2.2.css">
  <!-- Date Picker -->
  <link rel="stylesheet" href="../../plugins/datepicker/datepicker3.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="../../plugins/daterangepicker/daterangepicker.css">
  <!-- bootstrap wysihtml5 - text editor -->
  <link rel="stylesheet" href="../../plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">

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
            <a href="agenda.php">
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
        Escrever
      </h1>
      <ol class="breadcrumb">
        <li><a href="../inicio.php"><i class="fa fa-dashboard"></i> Início</a></li>
        <li class="active">Agenda</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-md-3">
          <a href="agenda.php" class="btn btn-primary btn-block margin-bottom">Voltar para Caixa de Entrada</a>

          <div class="box box-solid">
            <div class="box-header with-border">
              <h3 class="box-title">Pastas</h3>

              <div class="box-tools">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
              </div>
            </div>
            <div class="box-body no-padding">
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
          <div class="box box-solid">
            <div class="box-header with-border">
              <h3 class="box-title">Informações</h3>

              <div class="box-tools">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
              </div>
            </div>
            <div class="box-body no-padding">
              <ul class="nav nav-pills nav-stacked">
                <li><a href="#"><i class="fa fa-exclamation text-yellow"></i>A caixa de entrada contém mensagens recebidas dos responsáveis</a></li>
                <li><a href="#"><i class="fa fa-exclamation text-yellow"></i>A pasta de dia a dia contém mensagens enviada entre professores e responsáveis.</a></li>
                <li><a href="#"><i class="fa fa-exclamation text-blue"></i><b>Não selecionando turma e aluno a mensagem será enviada a todos da creche.
									   Você pode selecionar apenas a turma e enviar mensagem para todos os alunos.</b></a></li>
                
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
              <h3 class="box-title">Escreva na agenda</h3> <i class="fa fa-exclamation text-blue"></i>
            </div>
            <!-- /.box-header -->	
            <div class="box-body">
            	<form method="post">
            	<?php
		    
		if($_SERVER['REQUEST_METHOD'] == 'POST') {
		
		        $Ch = $_POST['challengeX']; 
		          		        
		        $sqlb="SELECT * FROM aluno WHERE turma_fk='$Ch'";
		        $test = mysqli_query($con,$sqlb);
		        
		        $optiona = '';
		        
			while($row = mysqli_fetch_assoc($test)){
			  $optiona .= '<option value = "'.$row['matricula_alu'].'">'.$row['nome_alu'].'</option>';
			}
		}
		?>            	
              <div class="form-group">            	
	        <select id="label" name="challengeX" onchange="this.form.submit()" class="btn btn-info dropdown-toggle" data-toggle="dropdown" style="width:100%;">
		        <option value="0">Selecionar Turma</option>
			<?php 
			$result= mysqli_query($con,'SELECT * FROM turma ORDER BY id_turma ASC'); ?>
			<?php while($row= mysqli_fetch_assoc($result)) { ?>
			<option value="<?php echo $row['num_turma'] ?>" <?php if ($row['num_turma']== $Ch) { ?>selected="selected"<?php } ?>>
			<?php echo htmlspecialchars($row['num_turma']); ?>
			</option>
			<?php 
			} 
			?>
	        </select>
		</form>	            
	      </div>	                  
            <form action="salvaragenda.php" method="post" id="form">            
              <div class="form-group">
		<input type="hidden" name="turma" value="<?php echo $Ch ?>">  
		 <span class="help-block" id="war-alu" style="display:none;"><i class="fa fa-bell-o text-yellow"> Por favor Selecione um Aluno</i></span>              
        	<select type="text" name="termo_aluno" class="btn btn-info dropdown-toggle" data-toggle="dropdown" style="width:100%;">
		       	<option value="0">Selecionar Aluno</option>
			<?php echo $optiona; ?> 
		</select>    
	      </div>
              <div class="form-group">
              <span class="help-block" id="war-ass" style="display:none;"><i class="fa fa-bell-o text-yellow"> Por favor preencha este campo</i></span>
                <input class="form-control" name="titulo" placeholder="Assunto:">
              </div>
              <div class="form-group">
              <span class="help-block" id="war-msg" style="display:none;"><i class="fa fa-bell-o text-yellow"> Por favor preencha este campo</i></span>
                    <textarea id="compose-textarea" class="form-control" name="msg" style="height: 300px"></textarea>
                    
              </div>

            </div>
            <!-- /.box-body -->
            <div class="box-footer">
              <div class="pull-right">
                <button type="button" onclick="alerta1()" class="btn btn-primary"><i class="fa fa-envelope-o"></i> Enviar</button>
              </div>
              <button type="reset" class="btn btn-default"><i class="fa fa-times"></i> Descartar</button>
            </div>
            <!-- /.box-footer -->
            </form>
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


// function alerta do form
function alerta1(){
var assunto = form.titulo.value;
var msg = form.msg.value;
return	$.confirm({
title: 'Agenda',
content: 'Deseja continuar?',
buttons: {
Sim: {
text: 'Sim',
btnClass: 'btn-blue',
action: function (){

if (assunto == "") {
document.getElementById("war-ass").style.display="inline";
form.titulo.focus();
return true;
}else{
document.getElementById("war-ass").style.display="none";
}

if (msg == "") {
document.getElementById("war-msg").style.display="inline";
form.msg.focus();
return true;
}else{
document.getElementById("war-msg").style.display="none";
}

document.getElementById('form').submit();
}
},
cancelar: function () {
				            
}
}
});
}
// function alerta do href2
function alerta3(){
return	$.confirm({
title: 'Agenda',
content: 'Prosseguir com a Exclusão desta mensagem?',
buttons: {
Sim: {
text: 'Sim',
btnClass: 'btn-blue',
action: function (){
document.getElementById('ex').click();
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