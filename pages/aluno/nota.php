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

// recebe a matricula do aluno
$matricula = $_GET['Matricula'];

$parametro = filter_input(INPUT_GET, "parametro");
$ano = filter_input(INPUT_GET, "termo_ano");
//se nao pesquisar por ano, colocar o ano padrão do sistema
if(empty($ano)){
$ano = date('Y');
}		

// ------------------------------------------------ NOVO FILTRO--------------------------------------------------------------

// criar o filtro de pesquisa
//se o parametro pesquisado for númerico, pesquisar no campo nota
if(is_numeric($parametro)){

$get = "SELECT * FROM nota WHERE (nota = '$parametro') AND matricula_alu_nota = '$matricula' AND YEAR(data_not) = '$ano' ";
$dados = mysqli_query($con,$get);


}else 
//se o parametro pesquisado for String
if ((String)$parametro) {
  
//primeiro pesquisar no campo epoca
$get = "SELECT * FROM nota WHERE (epoca = '$parametro') AND matricula_alu_nota = '$matricula' AND YEAR(data_not) = '$ano'";
$dados = mysqli_query($con,$get);
$total = mysqli_num_rows($dados); 

//se epoca for vazio, pesquisar na materia
if($total == 0){
//pesquisar no campo materia, caso seja realmente materia e caia aqui, pesquiso a média
$get = "SELECT * FROM nota WHERE (materia_not = '$parametro') AND matricula_alu_nota = '$matricula' AND YEAR(data_not) = '$ano'";
$dados = mysqli_query($con,$get);

// var que indica q a pesquisa foi materia
$pemedia = "foim";

//média
$result = mysqli_query($con,"SELECT SUM(nota), (SUM(nota) / 3) AS valor_soma, TRUNCATE( (SUM(nota) / 3), 2) FROM nota WHERE matricula_alu_nota='$matricula' AND materia_not='$parametro' AND YEAR(data_not) = '$ano'");           
$linha2 = mysqli_fetch_assoc($result);
        
$media =  $linha2['TRUNCATE( (SUM(nota) / 3), 2)'];

}

}else{

//assim q entrar na pagina, o parametro sera vazio, por tanto buscar tudo deste aluno  
$get = "SELECT * FROM nota WHERE matricula_alu_nota = '$matricula' AND YEAR(data_not) = '$ano'";
$dados = mysqli_query($con,$get);  

}
$linha = mysqli_fetch_assoc($dados);
$total = mysqli_num_rows($dados); 
// ------------------------------------------------ NOVO FILTRO--------------------------------------------------------------
//pesquisar nome do aluno
$consultana = "SELECT nome_alu FROM aluno WHERE matricula_alu='$matricula'";
$resultadona = mysqli_query($con,$consultana);

$nomeA = mysqli_fetch_assoc($resultadona);

$nomeAluno = $nomeA['nome_alu'];

?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Athena | Aluno</title>
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
            <li><a href="cadastrar_aluno.php"><i class="fa fa-circle-o"></i> Cadastrar</a></li>
            <li><a href="buscar_aluno.php"><i class="fa fa-circle-o"></i> Buscar</a></li>
            <li><a href="controle.php"><i class="fa fa-circle-o"></i> Controle</a></li>
            <li><a href="registro.php"><i class="fa fa-circle-o"></i> Registro</a></li>
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
        <?php echo $nomeAluno ?>
        <small> notas</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="../inicio.php"><i class="fa fa-dashboard"></i> Início</a></li>
        <li><a href="buscar_aluno.php">Aluno</a></li>
        <li class="active">ver notas</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
      
         <div class="col-md-12">
          <div class="box box-warning">
            <div class="box-header">
              <h3 id="red-tit" class="box-title">Notas</h3>  
                  
              <div class="box-tools pull-right">
                <div class="has-feedback">
		<!-- search form -->
		<form action="<?php echo $_SERVER['PHP_SELF'];?>">
		<!-- input-group -->
		<div class="input-group">
		<!-- buscador -->
		<input type="text" name="parametro" placeholder="materia, 1°trim.." class="form-control"/>
		<span class="input-group-btn" style="width:0;">
		<button type="submit" name="search" id="search-btn" class="btn btn-warning" title="Buscar"><i class="fa fa-search"></i></button>	
		<!-- nome do aluno -->
		<input type="hidden" name="Nome" value="<?php echo $nomeAluno ?>"/>
		<!-- matricula do aluno -->
		<input type="hidden" name="Matricula" value="<?php echo $matricula ?>"/>
		<!-- select buscar ano -->
		<select name="termo_ano" class="btn btn-warning dropdown-toggle">
		  <option value="">Ano</option>
		  <option value="2017">2017</option>
		  <option value="2018">2018</option>
		  <option value="2019">2019</option>
		  <option value="2020">2020</option>
		  <option value="2021">2021</option>
		  <option value="2022">2022</option>
		  <option value="2023">2023</option>
		  <option value="2024">2024</option>
		  <option value="2025">2025</option>
		  <option value="2026">2026</option>
		  <option value="2027">2027</option>
		  <option value="2028">2028</option>
	        </select>        
	        </span>
	        <!-- / .input-group btn -->	        
	        </div>
	        <!-- / .input-group -->
	        
	        </form>
	        
	        </div>
	        <!-- / .has-feedback -->
	      </div>     
	      <!-- /.box-tools pull-right -->      
    	    </div>
    	    <!-- / .box-header -->
    	    
            <div class="box-body table-responsive no-padding">
              <table class="table table-hover">            
                <tr>
                  <th>Nota</th>
                  <th>Materia</th>
                  <th>Trimestre</th>
                  <th>Professor</th>
                  <th>Data</th>
                  <th>Alterar</th>
                  <th>Excluir</th>                  
                </tr>
<?php 

if ($total) { do{
//cria as variaveis para apresentar
$id = $linha['id_nota'];
$nota = $linha['nota'];
$materia = $linha['materia_not'];
$epoca = $linha['epoca'];

//busca o nome do prof conforme a matricula
$matProf = $linha['matricula_prof_nota'];
	$sql3 = "SELECT nome_prof FROM professor WHERE matricula_prof = '$matProf'";
	$dados3 = mysqli_query($con,$sql3);				
	$linha3 = mysqli_fetch_assoc($dados3);
$nomeprof = $linha3['nome_prof'];
	
?>
	<tr>
		<td><?php echo $nota ?></td>
		<td><?php echo $materia ?></td>
		<td><?php echo $epoca ?></td>
		<td><?php echo $nomeprof ?></td>
		<!-- se um dia o cliente quiser a data, só descomentar --> 
		<td><?php echo date('d/m/Y H:i:s',strtotime($linha['data_not'])); ?> </td>
                <td>
                    <a href="#" onclick="alerta1(<?php echo $id ?>)" title="Alterar"><i class="fa fa-exchange text-blue"></i></a>
                    <a style="display:none;" id="<?php echo $id ?>" href="<?php echo 'alterar_nota.php?idNota=' . $id . '&Matricula=' . $matricula ?>"></a>
                </td>
                <td>
                    <a href="#" onclick="alerta2(<?php echo $id ?>)" title="Excluir"><i class="fa fa-trash-o text-red"></i></a>
                    <a style="display:none;" id="<?php echo 'ex'.$id ?>" href="<?php echo 'excluirnota.php?idNota=' . $id . '&Matricula=' . $matricula ?>"></a>                  
                </td>
	</tr>
<?php 
} while ( $linha = mysqli_fetch_assoc($dados)); 

mysqli_free_result($dados);
}
?>
              </table>
              <!-- /. table table-hover -->  
            </div>
            <!-- /. box-body table-responsive no-padding -->
                  	              
	    </div>
	    <!-- /.box box-warning -->
	    </div>
    	    <!-- / .col-xs-12 -->

       </div>
      <!-- /.row -->        
<?php
if($pemedia == 'foim' && (!empty($materia))){
echo "
      <div class='row'>
        <div class='col-md-5'>
          <!-- /. box -->
          <div class='box box-solid'>
            <div class='box-header with-border'>
              <h3 class='box-title'>Média</h3>

              <div class='box-tools'>
                <button type='button' class='btn btn-box-tool' data-widget='collapse'><i class='fa fa-minus'></i>
                </button>
              </div>
            </div>
            <div class='box-body no-padding'>
              <ul class='nav nav-pills nav-stacked'>
                <li><a href='#'>A média do(a) aluno(a) em <b>". $materia ."</b> é de <b>". $media ."</b>. Para passar é necessário que a média seja maior que <b>7.00</b>.</a></li>            
              </ul>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /. col-md-3 -->
      </div>
      <!-- /. row -->
      ";
}      
?>      
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
// function alerta para alterar turma
function alerta1(id){
return	$.confirm({
title: 'Nota',
content: 'Alterar esta nota?',
buttons: {
Sim: {
text: 'Sim',
btnClass: 'btn-blue',
action: function (){
document.getElementById(id).click();
}
},
cancelar: function () {
				            
}
}
});
}

// function alerta para excluir turma
function alerta2(id){
return	$.confirm({
title: 'Nota',
content: 'Deseja realmente excluir esta nota?',
buttons: {
Sim: {
text: 'Sim',
btnClass: 'btn-red',
action: function (){
var ide = "ex" + id;
document.getElementById(ide).click();
}
},
cancelar: function () {
				            
}
}
});
}
//mascarar method GET
if(typeof window.history.replaceState == 'function') {
        window.history.replaceState({}, "Hide", "http://athena.troiatecnologia.com.br/new_sistem/pages/aluno/nota.php");
}    
</script>
</body>
</html>