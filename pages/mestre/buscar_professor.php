<?php  

/* esse bloco de código em php verifica se existe a sessão, pois o usuário pode simplesmente não fazer o login e digitar na barra de endereço do seu navegador o caminho para a página principal do site (sistema), burlando assim a obrigação de fazer um login, com isso se ele não estiver feito o login não será criado a session, então ao verificar que a session não existe a página redireciona o mesmo para a index.php.
*/

//fara a conexao com banco de dados
include_once '../../dist/php/conexao.php';

//chama a info, para a versão do sistema
include_once '../../dist/php/info.php';

//chama a cachelogin, para verificar o cache se esta logado
include_once '../../dist/php/cachelogin.php';

?>
<?php
	
	$parametro = filter_input(INPUT_GET, "parametro");
	
// ------------------------------------------------ NOVO FILTRO--------------------------------------------------------------

// se for numérico
if (is_numeric($parametro) ||floor($parametro) ) {
  // pesquiso em campos com numeros, essenciais
  $get = "SELECT * from professor WHERE matricula_prof='$parametro' OR rg_prof='$parametro' OR cpf_prof='$parametro' ORDER BY id_professor DESC";

} /* se for string */
else if ((String)$parametro) {
  
  $get="SELECT * from professor WHERE nome_prof like '%$parametro%' OR email_prof like '%$parametro%' OR bairro_prof like '%$parametro%' OR disciplina_prof like '%$parametro%' OR formacao like '%$parametro%' ORDER BY id_professor DESC";

}else{
  //assim que inicia, como não tem parametro, ele busca tudo
  $get = "SELECT * FROM professor ORDER BY id_professor DESC";
}
  $resultado = mysqli_query($con,$get);
  $conteudo = mysqli_fetch_assoc($resultado);
  $total = mysqli_num_rows($resultado);


// ------------------------------------------------ NOVO FILTRO--------------------------------------------------------------

//total mostrado
$getm = "SELECT id_professor FROM professor ORDER BY id_professor DESC";
$resultadom = mysqli_query($con,$getm);
$totalm = mysqli_num_rows($resultadom);
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Athena | Professor</title>
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
  <!--redimensiona o buscador em formato mobile-->
  <style>
  @media (min-device-width: 340px) and (max-device-width: 901px){
  .has-feedback{
  width:326px;
  height:100px;
  margin-right:2.5%;
  margin-left:2.5%;
  }
  .red-btn{
  width:55px;
  
  }
  }
  @media (min-device-width: 359px) and (max-device-width: 495px){
  #red-tit{
  opacity:0;
  }
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
            <a href="../mailbox/agenda.php" >
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
          <a href="../mailbox/agenda.php">
            <i class="fa fa-envelope"></i> <span>Agenda</span>
            <span class="pull-right-container">
            </span>
          </a>
        </li>
        
        <li class="treeview">
          <a href="#">
            <i class="fa fa-users"></i>
            <span>Turma</span>
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
            <li><a href="cadastrar_professor.php"><i class="fa fa-circle-o"></i> Cadastrar</a></li>
            <li><a href="buscar_professor.php"><i class="fa fa-circle-o"></i> Buscar</a></li>
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
        professor
        <small><?php echo $totalm ?> professores cadastrados</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="../inicio.php"><i class="fa fa-dashboard"></i> Início</a></li>
        <li class="active">Buscar professor</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
  
          <div class="col-xs-12">
          <div class="box box-danger">
            <div class="box-header">
              <h3 id="red-tit" class="box-title">Buscar professor</h3>
              <!-- php paginação aluno -->
              <?php 
                
		$total_reg = "10"; // número de registros por página
		
		//Se a página não for especificada a variável "pagina" tomará o valor 1, isso evita de exibir a página 0 de início:
		$pagina=$_GET['pagina'];
		if (!$pagina) {
		$pc = "1";
		} else {
		$pc = $pagina;
		}
		//Vamos determinar o valor inicial das buscas limitadas:
		$inicio = $pc - 1;
		$inicio = $inicio * $total_reg;		
  
		//Vamos selecionar os dados e exibir a paginação:
		$limite = mysqli_query($con,"$get LIMIT $inicio,$total_reg");
		$todos = mysqli_query($con,$get);
		 
		$tr = mysqli_num_rows($todos); // verifica o número total de registros
		$tp = $tr / $total_reg; // verifica o número total de páginas
              ?>
              <div class="box-tools">
              	<form method="GET" action="<?php echo $_SERVER['PHP_SELF'];?>">
                <div class="input-group input-group-sm" style="width: 250px;">
                  <input type="text" name="parametro" class="form-control pull-right" placeholder="matricula,nome,cpf.." style="width:270px;">

                  <div class="input-group-btn">
                    <button type="submit" class="btn btn-danger"><i class="fa fa-search"></i></button>
                  </div>
                </div>
                </form>
              </div>
            </div>
           <!-- mostra os alunos -->        
           <div class="box-footer">
<?php 

while ($conteudo = mysqli_fetch_array($limite)) {

$id = $conteudo['id_professor'];
$matricula = $conteudo['matricula_prof'];
$nome = $conteudo['nome_prof'];
$turma = $conteudo['turma_fk'];

?>                  
        <a href="<?php echo 'alterar_professor.php?id='.$id ?>"><div class="col-md-3 col-sm-6 col-xs-12">            
          <div class="info-box">
          
            <span class="info-box-icon">
            
<?php
        $query = "SELECT nome_foto,foto_prof,Tipo FROM professor WHERE matricula_prof='$matricula'";

	$result = mysqli_query($con,$query);
	
	$photo = mysqli_fetch_array($result,MYSQLI_ASSOC); 
	
	$tipo = $photo['Tipo'];
	
	$nomefoto = $photo['nome_foto']; 

	$photo['foto_prof']; 
	
	$base64 = base64_encode($photo['foto_prof']);
	
   	if($nomefoto == ""){
   	echo "<img id='preview' class='bg-red' style='cursor: pointer; width:100%; height:99%; margin-top:-9.51px;' src='../../dist/img/add-img2.png' />";   	
   	}else{
   	echo "<img id='preview' style='cursor: pointer; width:100%; height:100%; margin-top:-9.6px;' src='data:image/jpeg;base64,". $base64 ."' />";
   	}
?>
            </span>

            <div class="info-box-content">
              <span class="info-box-text"><?php echo $nome ?></span>
              <span class="progress-description"><?php echo $turma ?></span>              
              <span class="info-box-number"><?php echo $matricula ?></span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->                                 
        </div></a>
        <!-- /.col -->
<?php 
} 

?>            
	</div>		             
	<div class="box-footer">
	<!-- /.col-xs-12 -->   
                <div class="pull-right">
                  <?php echo $tr."/".$total_reg ?>
                  <div class="btn-group">
                  <?php 
		    // agora vamos criar os botões "Anterior e próximo"
		    $anterior = $pc -1;
		    $proximo = $pc +1; 
		    switch($tp){
		    	case ($tp < 0):
		    	        echo " <a href='buscar_aluno.php?pagina=$anterior&parametro=$parametro' class='btn btn-default btn-sm disabled' title='Anterior'><i class='fa fa-chevron-left'></i></a>";
                    		echo " <a href='buscar_aluno.php?pagina=$proximo&parametro=$parametro' class='btn btn-default btn-sm disabled' title='Próximo'><i class='fa fa-chevron-right'></i></a>";
                    	break;
		    	case ($tp <= 1):
		    	        echo " <a href='buscar_aluno.php?pagina=$anterior&parametro=$parametro' class='btn btn-default btn-sm disabled' title='Anterior'><i class='fa fa-chevron-left'></i></a>";
                    		echo " <a href='buscar_aluno.php?pagina=$proximo&parametro=$parametro' class='btn btn-default btn-sm disabled' title='Próximo'><i class='fa fa-chevron-right'></i></a>";
                    	break;                     	
                    	case ($pc == 1):
		    	        echo " <a href='buscar_aluno.php?pagina=$anterior&parametro=$parametro' class='btn btn-default btn-sm disabled' title='Anterior'><i class='fa fa-chevron-left'></i></a>";
                    		echo " <a href='buscar_aluno.php?pagina=$proximo&parametro=$parametro' class='btn btn-default btn-sm' title='Próximo'><i class='fa fa-chevron-right'></i></a>";
                    	break;                    	
                    	case ( $tp > $pc):
		    	        echo " <a href='buscar_aluno.php?pagina=$anterior&parametro=$parametro' class='btn btn-default btn-sm' title='Anterior'><i class='fa fa-chevron-left'></i></a>";
                    		echo " <a href='buscar_aluno.php?pagina=$proximo&parametro=$parametro' class='btn btn-default btn-sm' title='Próximo'><i class='fa fa-chevron-right'></i></a>";                    		                    	
			break;                      	       	
                    	case ($pc >= $tp):
		    	        echo " <a href='buscar_aluno.php?pagina=$anterior&parametro=$parametro' class='btn btn-default btn-sm' title='Anterior'><i class='fa fa-chevron-left'></i></a>";
                    		echo " <a href='buscar_aluno.php?pagina=$proximo&parametro=$parametro' class='btn btn-default btn-sm disabled' title='Próximo'><i class='fa fa-chevron-right'></i></a>";                    		                    	
			break;		
		    }   

                   ?>
	</div>      

          </div>
	 </div>                   
        </div>	
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
//mascarar method GET
if(typeof window.history.replaceState == 'function') {
        window.history.replaceState({}, "Hide", "http://athena.troiatecnologia.com.br/new_sistem/pages/mestre/buscar_professor.php");
}     
</script>
</body>
</html>