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
          <span></span>
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
        Professor
        <small>alterar professor</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="../inicio.php"><i class="fa fa-dashboard"></i> Inicio</a></li>
        <li><a href="#">Professor</a></li>
        <li class="active">Alterar professor</li>
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


/*formatacao da data*/
function inverteData($data){
    if(count(explode("/",$data)) > 1){
        return implode("-",array_reverse(explode("/",$data)));
    }elseif(count(explode("-",$data)) > 1){
        return implode("/",array_reverse(explode("-",$data)));
    }
}

//recupera os dados enviados atraves do formulario
//Files
$filefoto = $_FILES['filefoto'];
//NOME TEMPORARIO
$file_foto = $_FILES["filefoto"]["tmp_name"];
 //NOME DO ARQUIVO NO COMPUTADOR
$file_namefoto = $_FILES["filefoto"]["name"];
//TIPO DO ARQUIVO
$file_typefoto = $_FILES["filefoto"]["type"];

  $matricula = filter_input(INPUT_POST, "Matricula");
  $nome_prof = filter_input(INPUT_POST, "NomeDoProf");
  $sexo = filter_input(INPUT_POST, "sexo");
  $cpf_prof = filter_input(INPUT_POST, "CPFProf");
  $rg_prof = filter_input(INPUT_POST, "RGProf");
  
  //verifica se o email foi alterado ou nao, para saber se precisa reenviar um email de confirmação
  $email_prof = filter_input(INPUT_POST, "EmailProf");
    
    $sqlc = "SELECT * FROM professor WHERE email_prof='$email_prof'";
    $dados = mysqli_query($con,$sqlc);
    $linha = mysqli_fetch_assoc($dados);

  
  $cep_prof = filter_input(INPUT_POST, "Cep");
  $logradouro_prof = filter_input(INPUT_POST, "Logradouro");
  $cidade_prof = filter_input(INPUT_POST, "Cidade");
  $bairro_prof = filter_input(INPUT_POST, "Bairro");
  $numero_prof = filter_input(INPUT_POST, "Numero");
  $celular_prof = filter_input(INPUT_POST, "Celular");
  $telefone_prof = filter_input(INPUT_POST, "Telefone");
  $disciplina_prof = filter_input(INPUT_POST, "Disciplina");
  $formacao_prof = filter_input(INPUT_POST, "Formacao");
  $dt_nasc= filter_input(INPUT_POST, "Dt_Nasc_Prof");

  $dateFormat = inverteData($dt_nasc);

  if ($con) {
  
  if ($file_namefoto != ""){
  
$binariofoto = file_get_contents($file_foto);
// evitamos erro de sintaxe do MySQL
$binariofoto = mysqli_real_escape_string($con,$binariofoto);
    $query = mysqli_query($con, "update professor set matricula_prof='$matricula', nome_prof='$nome_prof',sexo='$sexo',nome_foto='$file_namefoto',foto_prof='$binariofoto',tipo='$file_typefoto',data_nasc='$dateFormat', cpf_prof='$cpf_prof', rg_prof='$rg_prof', email_prof='$email_prof', cep_prof='$cep_prof', logradouro_prof='$logradouro_prof', cidade_prof='$cidade_prof', bairro_prof='$bairro_prof', num_prof='$numero_prof', celular_prof='$celular_prof', telefone_prof='$telefone_prof', disciplina_prof='$disciplina_prof', formacao='$formacao_prof' where matricula_prof='$matricula';");
    if ($query) {
    
    if($email_prof != $linha['email_prof']){
      iconv_set_encoding("internal_encoding", "UTF-8");   
      //nao reenvio o email
        $headers = "MIME-Version: 1.1\r\n";
              $headers .= "From: Castelinho - <castelinhosistema@gmail.com>\r\n";
              $headers .= "Content-type: text/html; charset=iso-8859-1\r\n";
              $headers  .= "Content-type: text/html; charset=iso-8859-1 \r\n";
              ('Content-type: text/html; charset=iso-8859-1\r\n');  
   
              $subject = "Confirmação de cadastro - CEC Castelinho";           
              $mensagem1  = "Professor  {$nome_prof}<br />
              <strong>Usuario</strong>: {$email_prof}<br />
              <strong>Senha</strong>: {$matricula}<br /> <br />
              Obrigado!<br /> <br /> 
              Esta é uma mensagem automática, por favor não responda!";
    $subject = utf8_decode($subject);
          $mensagem1 = utf8_decode($mensagem1);                           
   
              $send_contact=mail($email_prof, $subject, $mensagem1, $headers); 
    }

         echo "<script type='text/javascript'>
          $.confirm({
              title: 'Sucesso!',
              content: 'Professor alterado com sucesso',
              buttons: {
                  Ok: {
                      text: 'Ok',
                      btnClass: 'btn-blue',
                      keys: ['enter', 'shift'],
                      action: function(){
                          window.location = 'buscar_professor.php';
                      }
                  }
              }
          });
          </script>";
            
            
    }else{
      die("Erro4: ". mysqli_error($con));
    }
  }else if ($file_namefoto == ""){
  

    $query = mysqli_query($con, "update professor set matricula_prof='$matricula', nome_prof='$nome_prof',sexo='$sexo',data_nasc='$dateFormat', cpf_prof='$cpf_prof', rg_prof='$rg_prof', email_prof='$email_prof', cep_prof='$cep_prof', logradouro_prof='$logradouro_prof', cidade_prof='$cidade_prof', bairro_prof='$bairro_prof', num_prof='$numero_prof', celular_prof='$celular_prof', telefone_prof='$telefone_prof', disciplina_prof='$disciplina_prof', formacao='$formacao_prof' where matricula_prof='$matricula';");
    if ($query) {
    
    if($email_prof != $linha['email_prof']){
      iconv_set_encoding("internal_encoding", "UTF-8");   
      //nao reenvio o email
        $headers = "MIME-Version: 1.1\r\n";
              $headers .= "From: Castelinho - <castelinhosistema@gmail.com>\r\n";
              $headers .= "Content-type: text/html; charset=iso-8859-1\r\n";
              $headers  .= "Content-type: text/html; charset=iso-8859-1\r\n";
              ('Content-type: text/html; charset=iso-8859-1\r\n');  
   
              $subject = "Confirmação de cadastro - CEC Castelinho";           
              $mensagem1  = "Professor  {$nome_prof}<br />
              <strong>Usuario</strong>: {$email_prof}<br />
              <strong>Senha</strong>: {$matricula}<br /> <br />
              Obrigado!<br /> <br /> 
              Esta é uma mensagem automática, por favor não responda!";
    $subject = utf8_decode($subject);
          $mensagem1 = utf8_decode($mensagem1);                           
   
              $send_contact=mail($email_prof, $subject, $mensagem1, $headers); 
    }

                          
 
          echo "<script type='text/javascript'>
          $.confirm({
              title: 'Sucesso!',
              content: 'Professor alterado com sucesso',
              buttons: {
                  Ok: {
                      text: 'Ok',
                      btnClass: 'btn-blue',
                      keys: ['enter', 'shift'],
                      action: function(){
                          window.location = 'buscar_professor.php';
                      }
                  }
              }
          });
          </script>";
            

    }else{
      die("Erro3: ". mysqli_error($con));
    }
  
  }else{
    die("Erro2: ". mysqli_error($con));
  }
  
  }else{
    die("Erro1: ". mysqli_error($con));
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