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
/*inverte data*/
function inverteData($data){
    if(count(explode("/",$data)) > 1){
        return implode("-",array_reverse(explode("/",$data)));
    }elseif(count(explode("-",$data)) > 1){
        return implode("/",array_reverse(explode("-",$data)));
    }
}
	//recebe o id do prof
	$idprof= filter_input(INPUT_GET, "id");
	
	$sql="SELECT * FROM professor WHERE id_professor='$idprof'";
	$get=mysqli_query($con,$sql);
	
	$linha = mysqli_fetch_assoc($get);	
	
	$matricula = $linha['matricula_prof'];
	$nome_prof = $linha['nome_prof'];
	$sexo = $linha['sexo'];
	$cpf_prof = $linha['cpf_prof'];
	$rg_prof = $linha['rg_prof'];
	$email_prof = $linha['email_prof'];
	$cep_prof = $linha['cep_prof'];
	$logradouro = $linha['logradouro_prof'];
	$cidade = $linha['cidade_prof'];
	$bairro = $linha['bairro_prof'];
	$numero = $linha['num_prof'];
	$celular = $linha['celular_prof'];
	$telefone = $linha['telefone_prof'];
	$disciplina = $linha['disciplina_prof'];
	$formacao = $linha['formacao'];
	$dt_nasc= inverteData($linha['data_nasc']);
	
	$query = "SELECT nome_foto,foto_prof,Tipo FROM professor WHERE matricula_prof='$matricula'";
	$result = mysqli_query($con,$query);  
	$photo = mysqli_fetch_array($result,MYSQLI_ASSOC);   
	$tipo = $photo['tipo'];
	$nomefoto = $photo['nome_foto']; 
	$photo['foto_prof'];   
	$base64 = base64_encode($photo['foto_prof']);
	
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
        Professor
        <small>Alteração professor</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="../inicio.php"><i class="fa fa-dashboard"></i> Início</a></li>
        <li class="active">Alterar professor</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
  
          <div class="col-md-9">
          <!-- Horizontal Form -->
          <div class="box box-danger">
            <div class="box-header with-border">
              <h3 class="box-title">Altere este professor</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form action="alterarprof.php" id="form" name="form" method="POST" enctype="multipart/form-data" data-ls-module="form" class="form-horizontal">
              <div class="box-body">
            <div class="widget-user-image bg-red">
            <div id="dium">
            <div id="didois">
            <label>
		<input style="display:none;" type="file" name="filefoto"  onchange="document.getElementById('preview').src = window.URL.createObjectURL(this.files[0])">
		<?php
		if ($nomefoto == ""){
		echo "<img id='preview' class='img-circle' style='cursor: pointer;' src='../../dist/img/add-img2.png' width='130' height='130' />";         
		}else{
		echo "<img id='preview' class='img-circle' style='cursor: pointer;' src='data:image/jpeg;base64,". $base64."' width='130' height='130' />";         		
		}
		?>
            </label>  
            </div>  
            </div>  
            </div> 

                <div class="form-group" id="dema">
                  <label for="inputEmail3" for="inputEmail3" class="col-sm-2 control-label">Matricula<i class="text-yellow">*</i></label>
                  
                  <div class="col-sm-10">
                    <span class="help-block" id="war-mat" style="display:none;"><i class="fa fa-bell-o text-yellow"> Por favor preencha este campo</i></span> 
                    <input type="hidden" id="Matricula" name="Matricula" class="form-control" placeholder="Matricula" value="<?php echo $matricula ?>">                 
                    <input type="text" disabled id="Matricula" name="Matricula" class="form-control" placeholder="Matricula" style="width:250px;" value="<?php echo $matricula ?>">
                  </div>
                </div>                  
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Nome <i class="text-blue">*</i></label>
                  
                  <div class="col-sm-10">
                    <span class="help-block" id="war-na" style="display:none;"><i class="fa fa-bell-o text-yellow"> Por favor preencha este campo</i></span>                  
                    <input type="text" class="form-control" id="nomeprof" name="NomeDoProf" placeholder="Nome completo" value="<?php echo $nome_prof ?>">
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputPassword3" class="col-sm-2 control-label">Sexo <i class="text-blue">*</i></label>

                  <div class="col-sm-10">
                    <span class="help-block" id="war-sex" style="display:none;"><i class="fa fa-bell-o text-yellow"> Por favor Selecione uma opção</i></span>                                    
			<select type="text" name="sexo" id="sexo" class="btn btn-default dropdown-toggle" data-toggle="dropdown" style="width:100%;">
			      <option value="M" <?php echo $sexo=='M'?'selected':'';?> >Masculino</option>
			      <option value="F" <?php echo $sexo=='F'?'selected':'';?> >Feminino</option>
			      <option value="O" <?php echo $sexo=='O'?'selected':'';?> >Outros</option> 
			</select>
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputPassword3" class="col-sm-2 control-label">Nascimento <i class="text-blue">*</i></label>

                  <div class="col-sm-10">
                    <span class="help-block" id="war-dta" style="display:none;"><i class="fa fa-bell-o text-yellow"> Por favor preencha este campo</i></span>                                    
                <div class="input-group">
                  <div class="input-group-addon">
                    <i class="fa fa-calendar"></i>
                  </div>
                  <input type="text" class="form-control" name="Dt_Nasc_Prof" data-inputmask='"mask": "99/99/9999"' data-mask style="width:213px;" value="<?php echo $dt_nasc ?>">
                </div>                  
                </div>
                  </div>
                <div class="form-group">                                  
                  <label for="inputPassword3" class="col-sm-2 control-label">RG <i class="text-blue">*</i></label>

                  <div class="col-sm-10">
                    <span class="help-block" id="war-rg" style="display:none;"><i class="fa fa-bell-o text-yellow"> Por favor preencha este campo</i></span>                  
	            <input type="text" class="form-control" name="RGProf" data-inputmask='"mask": "99.999.999.9"' data-mask style="width:250px;" value="<?php echo $rg_prof ?>">
                  </div>                 
                </div>
                <div class="form-group">                                  
                  <label for="inputPassword3" class="col-sm-2 control-label">CPF <i class="text-blue">*</i></label>

                  <div class="col-sm-10">
                    <span class="help-block" id="war-cpf" style="display:none;"><i class="fa fa-bell-o text-yellow"> Por favor preencha este campo</i></span>                  
	            <input type="text" class="form-control" name="CPFProf" data-inputmask='"mask": "999.999.999-99"' data-mask style="width:250px;" value="<?php echo $cpf_prof ?>">
                  </div>                 
                </div>    
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Formação<i class="text-blue"></i></label>
                  
                  <div class="col-sm-10">
                    <span class="help-block" id="war-nr1" style="display:none;"><i class="fa fa-bell-o text-yellow"> Por favor preencha este campo</i></span>                  
                    <input type="text" class="form-control" id="forma" name="Formacao" placeholder="Formação do docente" value="<?php echo $formacao ?>">
                  </div>
                </div>   
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Disciplina<i class="text-blue"></i></label>
                  
                  <div class="col-sm-10">
                    <span class="help-block" id="war-nr1" style="display:none;"><i class="fa fa-bell-o text-yellow"> Por favor preencha este campo</i></span>                  
                    <input type="text" class="form-control" id="disc" name="Disciplina" placeholder="Disciplina que o docente exercitará" value="<?php echo $disciplina ?>">
                  </div>
                </div>                                
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Email <i class="text-blue">*</i></label>
                  
                  <div class="col-sm-10">
                    <span class="help-block" id="war-em" style="display:none;"><i class="fa fa-bell-o text-yellow"> Por favor preencha este campo</i></span>                  
                    <input type="email" class="form-control" id="email" name="EmailProf" placeholder="Email do docente" value="<?php echo $email_prof ?>">
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputPassword3" class="col-sm-2 control-label">Telefone Fixo <i class="text-blue"></i></label>

                  <div class="col-sm-10">
                    <span class="help-block" id="war-nada" style="display:none;"><i class="fa fa-bell-o text-yellow"> Por favor preencha este campo</i></span>                                    
                <div class="input-group">
                  <div class="input-group-addon">
                    <i class="fa fa-phone"></i>
                  </div>
                  <input type="text" class="form-control" id="tel" name="Telefone" data-inputmask='"mask": "(99) 9999-9999"' data-mask style="width:213px;" value="<?php echo $telefone ?>">
                </div>                  
                </div>
                </div>
                <div class="form-group">
                  <label for="inputPassword3" class="col-sm-2 control-label">Celular <i class="text-blue">*</i></label>

                  <div class="col-sm-10">
                    <span class="help-block" id="war-cel" style="display:none;"><i class="fa fa-bell-o text-yellow"> Por favor preencha este campo</i></span>                                    
                <div class="input-group">
                  <div class="input-group-addon">
                    <i class="fa fa-phone"></i>
                  </div>
                  <input type="text" class="form-control" name="Celular" data-inputmask='"mask": "(99)9 9999-9999"' data-mask style="width:213px;" value="<?php echo $celular ?>">
                </div>                  
                </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Endereço <i class="text-blue">*</i></label>
                  
                  <div class="col-sm-10">
                    <span class="help-block" id="war-end" style="display:none;"><i class="fa fa-bell-o text-yellow"> Por favor preencha este campo</i></span>                  
                    <input type="email" class="form-control" name="Logradouro" placeholder="Endereço completo" value="<?php echo $logradouro ?>">
                  </div>
                </div>                  
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">N° <i class="text-blue">*</i></label>
                  
                  <div class="col-sm-10">
                    <span class="help-block" id="war-n" style="display:none;"><i class="fa fa-bell-o text-yellow"> Por favor preencha este campo</i></span>                  
                    <input type="email" class="form-control" name="Numero" placeholder="número do endereço" style="width:250px;" value="<?php echo $numero ?>">
                  </div>
                </div>                 
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Bairro <i class="text-blue">*</i></label>
                  
                  <div class="col-sm-10">
                    <span class="help-block" id="war-bairr" style="display:none;"><i class="fa fa-bell-o text-yellow"> Por favor preencha este campo</i></span>                  
                    <input type="email" class="form-control" name="Bairro" placeholder="Bairro completo" value="<?php echo $bairro ?>">
                  </div>
                </div>                
                <div class="form-group">
                  <label for="inputPassword3" class="col-sm-2 control-label">CEP <i class="text-blue">*</i></label>

                  <div class="col-sm-10">
                    <span class="help-block" id="war-cep" style="display:none;"><i class="fa fa-bell-o text-yellow"> Por favor preencha este campo</i></span>                                    
                <div class="input-group">
                  <div class="input-group-addon">
                    <i class="fa fa-home"></i>
                  </div>
                  <input type="text" class="form-control" name="Cep" data-inputmask='"mask": "99999-999"' data-mask style="width:213px;" value="<?php echo $cep_prof ?>">
                </div>                  
                </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Cidade <i class="text-blue">*</i></label>
                  
                  <div class="col-sm-10">
                    <span class="help-block" id="war-cid" style="display:none;"><i class="fa fa-bell-o text-yellow"> Por favor preencha este campo</i></span>                  
                    <input type="email" class="form-control" name="Cidade" placeholder="Cidade completa" value="<?php echo $cidade ?>">
                  </div>
                </div>                

              <!-- /.box-body -->
              <div class="box-footer">
                <button type="button" onclick="alerta2()" class="btn btn-default">Excluir</button>
		<a id="btn_excluir" style="display:none;" href="<?php echo 'excluirprof.php?matricula=' . $matricula ?>"></a>                
                <button type="button" onclick="alerta1()" class="btn btn-danger pull-right">Alterar</button>
              </div>
              <!-- /.box-footer -->
            </form>  
	</div>
      </div>
      </div>
      <!-- /.row -->
      <div class="row">
        <div class="col-md-3">
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
                <li><a href="#">Os campos marcados com <i class="text-blue">*</i> são obrigatórios.</a></li>
              </ul>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>          
        </div>
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
<!-- temporizador -->
<script src="../../dist/js/temporizador.js"></script>
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

<!-- Page Script -->
<script>
  $(function () {

    //Datemask dd/mm/aaaa
    $("#datemask").inputmask("dd/mm/aaaa", {"placeholder": "dd/mm/aaaa"});
    
    $("[data-mask]").inputmask();    
  });

// function alerta do href
function alerta2(){
return	$.confirm({
title: 'Alterar professor',
content: 'Apagar professor?',
buttons: {
Sim: {
text: 'Sim',
btnClass: 'btn-red',
action: function (){
document.getElementById('btn_excluir').click();
}
},
cancelar: function () {
				            
}
}
});
}
// function alerta para enviar
function alerta1(){
var matr = form.Matricula.value;
var nome = form.NomeDoProf.value;
var sexo = form.sexo.value;
var dtnasca = form.Dt_Nasc_Prof.value;
var cpf = form.CPFProf.value;
var rg = form.RGProf.value;
var email = form.EmailProf.value;
var cel = form.Celular.value;
var ende = form.Logradouro.value;
var num = form.Numero.value;
var bairro = form.Bairro.value;
var cep = form.Cep.value;
var cidade = form.Cidade.value;

return	$.confirm({
title: 'Alterar professor',
content: 'Prosseguir com a alteração?',
buttons: {
Sim: {
text: 'Sim',
btnClass: 'btn-blue',
action: function (){


if(nome == ""){
document.getElementById("war-na").style.display="inline";
form.NomeDoProf.focus();
return true;								        
}else{
document.getElementById("war-na").style.display="none";
}

if(sexo == "0"){
document.getElementById("war-sex").style.display="inline";
form.sexo.focus();
return true;								        
}else{
document.getElementById("war-sex").style.display="none";
}

if(dtnasca == ""){
document.getElementById("war-dta").style.display="inline";
form.Dt_Nasc_Prof.focus();
return true;								        
}else{
document.getElementById("war-dta").style.display="none";
}

if(rg == ""){
document.getElementById("war-rg").style.display="inline";
form.RGProf.focus();
return true;								        
}else{
document.getElementById("war-rg").style.display="none";
}

if(cpf == ""){
document.getElementById("war-cpf").style.display="inline";
form.CPFProf.focus();
return true;								        
}else{
document.getElementById("war-cpf").style.display="none";
}

if(email == ""){
document.getElementById("war-em").style.display="inline";
form.EmailProf.focus();
return true;								        
}else{
document.getElementById("war-em").style.display="none";
}

if(cel == ""){
document.getElementById("war-cel").style.display="inline";
form.Celular.focus();
return true;								        
}else{
document.getElementById("war-cel").style.display="none";
}

if(ende == ""){
document.getElementById("war-end").style.display="inline";
form.Logradouro.focus();
return true;								        
}else{
document.getElementById("war-end").style.display="none";
}

if(num == ""){
document.getElementById("war-n").style.display="inline";
form.Numero.focus();
return true;								        
}else{
document.getElementById("war-n").style.display="none";
}

if(bairro == ""){
document.getElementById("war-bairr").style.display="inline";
form.Bairro.focus();
return true;								        
}else{
document.getElementById("war-bairr").style.display="none";
}

if(cep == ""){
document.getElementById("war-cep").style.display="inline";
form.Cep.focus();
return true;								        
}else{
document.getElementById("war-cep").style.display="none";
}

if(cidade == ""){
document.getElementById("war-cid").style.display="inline";
form.Cidade.focus();
return true;								        
}else{
document.getElementById("war-cid").style.display="none";
}

document.getElementById('form').submit();
}
},
cancelar: function () {
				            
}
}
});
}			

//load img e matricula
function readURL(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function (e) {
        $(input).next()
        .attr('src', e.target.result)
    };
    reader.readAsDataURL(input.files[0]);
    }
    else {
        var img = input.value;
        $(input).next().attr('src',img);
    }
} 

function verificaMostraBotao(){
    $('input[type=file]').each(function(index){
        if ($('input[type=file]').eq(index).val() != ""){
            readURL(this);
            $('.hide').show();
        }
    });
}

$('input[type=file]').on("change", function(){
  verificaMostraBotao();
});

$('.hide').on("click", function(){
    $(document.body).append($('<input />', {type: "file" }).change(verificaMostraBotao));
    $(document.body).append($('<img />'));
    $('.hide').hide();
});



    function validate() {
        if (document.getElementById('myCheck').checked) {  
            $.alert("Matricula Automatica");
            document.getElementById("Matricula").value= "";
            document.getElementById("Matricula").disabled = true; //DESABILITADO 
	    document.getElementById("dema").style.display="none";            
                                             
        } else {
            $.alert("Digite a Matricula");
            document.getElementById("Matricula").disabled = false; //HABILITADO
	    document.getElementById("dema").style.display="block";            
            
        }                   
    }
//mascarar method GET
if(typeof window.history.replaceState == 'function') {
        window.history.replaceState({}, "Hide", "http://athena.troiatecnologia.com.br/new_sistem/pages/mestre/alterar_professor.php");
}         
</script>
</body>
</html>