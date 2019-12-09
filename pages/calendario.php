<?php  

/* esse bloco de código em php verifica se existe a sessão, pois o usuário pode simplesmente não fazer o login e digitar na barra de endereço do seu navegador o caminho para a página principal do site (sistema), burlando assim a obrigação de fazer um login, com isso se ele não estiver feito o login não será criado a session, então ao verificar que a session não existe a página redireciona o mesmo para a index.php.*/

//fara a conexao com banco de dados
// include_once '../dist/php/conexao.php';

//chama a info, para a versão do sistema
include_once '../dist/php/info.php';

//chama a cachelogin, para verificar o cache se esta logado
// include_once '../dist/php/cachelogin.php';

?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Athena | Calendário</title>
  <!-- favicon -->
  <link rel="shortcut icon" href="../dist/img/favicon.png" type="image/x-icon" />
    
  <meta name="apple-mobile-web-app-capable" content="yes"> 
  <meta name="mobile-web-app-capable" content="yes">
  <!-- manifest -->
  <link rel="manifest" href="../dist/js/manifest.json">
  <!-- bookmark_bubble -->
  <script type="text/javascript" src="../dist/js/bookmark_bubble.js"></script>      
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- jQuery 3.1.1 -->
  <script src="../plugins/jQuery/jquery-3.1.1.min.js"></script>
  <!-- jQuery UI 1.11.4 -->
  <script src="https://code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script>
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="../dist/css/skins/_all-skins.min.css">

  <!-- jvectormap -->
  <link rel="stylesheet" href="../plugins/jvectormap/jquery-jvectormap-1.2.2.css">
  <!-- Date Picker -->
  <link rel="stylesheet" href="../plugins/datepicker/datepicker3.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="../plugins/daterangepicker/daterangepicker.css">
  <!-- bootstrap wysihtml5 - text editor -->
  <link rel="stylesheet" href="../plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">

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
    <a href="inicio.php" class="logo">
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
            <a href="mailbox/agenda.php">
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
                  <a href="../dist/php/bloq.php" class="btn btn-warning" title="Bloquear"><i class="fa fa-unlock-alt"></i></a>
                </div>
                <div class="pull-right">
                  <a href="../dist/php/logout.php" class="btn btn-danger" title="Deslogar"><i class="fa  fa-power-off"></i></a>
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
          <a href="inicio.php">
            <i class="fa fa-home"></i> <span>Início</span>
          </a>
        </li>
        
        <li>
          <a href="mailbox/agenda.php">
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
            <li><a href="class/cadastrar_turma.php"><i class="fa fa-circle-o"></i> Cadastrar</a></li>
            <li><a href="class/buscar_turma.php"><i class="fa fa-circle-o"></i> Buscar</a></li>
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
            <li><a href="aluno/cadastrar_aluno.php"><i class="fa fa-circle-o"></i> Cadastrar</a></li>
            <li><a href="aluno/buscar_aluno.php"><i class="fa fa-circle-o"></i> Buscar</a></li>
            <li><a href="aluno/controle.php"><i class="fa fa-circle-o"></i> Controle</a></li>
            <li><a href="aluno/registro.php"><i class="fa fa-circle-o"></i> Registro</a></li>
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
            <li><a href="mestre/cadastrar_professor.php"><i class="fa fa-circle-o"></i> Cadastrar</a></li>
            <li><a href="mestre/buscar_professor.php"><i class="fa fa-circle-o"></i> Buscar</a></li>
          </ul>
        </li>

        <li>
          <a href="calendario.php">
            <i class="fa fa-calendar"></i> <span>Calendário</span>
          </a>
        </li>

        <li>
          <a href="#">
            <i class="fa fa-credit-card"></i> <span>Financeiro</span>
          </a>
        </li>        

        <li>
          <a href="anoletivo/reorganizacao.php">
            <i class="fa fa-folder-open"></i> <span>Fim do ano letivo</span>
          </a>
        </li>       
        
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Calendário
        <small>calendário escolar</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="inicio.php"><i class="fa fa-dashboard"></i> Início</a></li>
        <li class="active">Calendário</li>
      </ol>
    </section>
      
        <div class="row">
        <section style="margin:0 41px 0 20px;">
        <iframe src="https://calendar.google.com/calendar/embed?height=700&wkst=1&bgcolor=%23FFFFFF&src=casteinhosistema%40gmail.com&color=%232952A3&src=89phk17jnkssg2im6k13mlqh7k%40group.calendar.google.com&color=%232F6309&src=37dhi6b3uq204314rhnanfobo4%40group.calendar.google.com&color=%232F6213&src=1mln49d1nagjpcg2mn6ifvn0vs%40group.calendar.google.com&color=%23865A5A&src=pt.brazilian%23holiday%40group.v.calendar.google.com&color=%23711616&src=ctt2hqs42124nj5a9ugp53eheg%40group.calendar.google.com&color=%23060D5E&src=cdcd2k3ol1f1pdkqb84shds5nk%40group.calendar.google.com&color=%23B1440E&src=v9an7ku1kd84asfdi0eitdj2qo%40group.calendar.google.com&color=%23AB8B00&src=l51bphj8qdihb223au1pikus84%40group.calendar.google.com&color=%235A6986&ctz=America%2FSao_Paulo" style="border:none;overflow:hidden;margin:10px 10px 10px 10px;" width="100%" height="500" scrolling="no" frameborder="0" allowTransparency="true">
        </iframe>
        </section>
        
        <section style="margin: 10px 45px 10px 45px;">
		<a href="https://calendar.google.com/calendar/render?tab=cc#eventpage_6" target="_blank" class="btn btn-success btn-block margin-bottom">Adicionar evento *</a>
        </section>
        
        <section style="margin: 10px 45px 10px 45px;">
        	<span>* Adicione um evento para seu calendário através do Google Calendar. Adicione conforme a cor de sua respectiva turma</span>
        </section>
                
	</div>
	
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
<script src="../bootstrap/js/bootstrap.min.js"></script>
<!-- Sparkline -->
<script src="../plugins/sparkline/jquery.sparkline.min.js"></script>
<!-- jvectormap -->
<script src="../plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
<script src="../plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
<!-- jQuery Knob Chart -->
<script src="../plugins/knob/jquery.knob.js"></script>
<!-- daterangepicker -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.11.2/moment.min.js"></script>
<script src="../plugins/daterangepicker/daterangepicker.js"></script>
<!-- datepicker -->
<script src="../plugins/datepicker/bootstrap-datepicker.js"></script>
<!-- temporizador -->
<script src="../dist/js/temporizador.js"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="../plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
<!-- Slimscroll -->
<script src="../plugins/slimScroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="../plugins/fastclick/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="../dist/js/adminlte.min.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="../dist/js/pages/dashboard.js"></script>

</body>
</html>
