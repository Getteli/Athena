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
  	
	//recebera os parametros para alterar o responsavel
	$idaluno= filter_input(INPUT_GET, "id");
	
	$sql="SELECT * FROM aluno WHERE id_aluno='$idaluno'";
	$get=mysqli_query($con,$sql);
	
	$linha = mysqli_fetch_assoc($get);	
	
	$matricula = $linha['matricula_alu'];
	$nome = $linha['nome_alu'];
	$sexo = $linha['sexo'];
	
	$dtaluno = inverteData($linha['data_nasc']);
	
	
	$rgalu = $linha['rg_alu'];
	$cpfalu = $linha['cpf_alu'];
	$turma = $linha['turma_fk'];
	$nomer1 = $linha['nome_resp'];
	$cpfr1 = $linha['cpf_resp'];
	$rgr1 = $linha['rg_resp'];
	
	$dtr1 = inverteData($linha['data_nasc_resp']);
	
	$emailr1 = $linha['email_resp'];
	$nomer2 = $linha['nome_resp2'];
	$cpfr2 = $linha['cpf_resp2'];
	$rgr2 = $linha['rg_resp2'];
	
	$dtr2 = inverteData($linha['data_nasc_resp2']);
	
	$emailr2 = $linha['email_resp2'];
	$nomerf = $linha['nome_respf'];
	$cpfrf = $linha['cpf_respf'];
	$rgrf = $linha['rg_respf'];
	
	$dtrf = inverteData($linha['data_nasc_respf']);
	
	$emailrf = $linha['email_respf'];
	$celrf = $linha['celular_respf'];
	$logradouro = $linha['logradouro_resp'];
	$bairror = $linha['bairro_resp'];
	$numr = $linha['num_resp'];
	$cepr = $linha['cep_resp'];
	$cidade = $linha['cidade_resp'];
	$telr = $linha['telefone_resp'];
	$celr = $linha['celular_resp'];
	$celr2 = $linha['celular_resp2'];
	$segnome = $linha['seg_nome'];
	$segcel = $linha['seg_celular'];
	$segcpf = $linha['seg_cpf'];
	$segnome2 = $linha['seg2_nome'];
	$segcel2 = $linha['seg2_celular'];
	$segcpf2 = $linha['seg2_cpf'];
		
	$situacao = $linha['ativo'];	
	
        $query = "SELECT nome_foto,foto_aluno,Tipo FROM aluno WHERE matricula_alu='$matricula'";
	$result = mysqli_query($con,$query);
	$photo = mysqli_fetch_array($result,MYSQLI_ASSOC); 
	$tipo = $photo['Tipo'];
	$nomefoto = $photo['nome_foto']; 
	$photo['foto_aluno']; 
	$base64 = base64_encode($photo['foto_aluno']);
	
	$queryarq = "SELECT COUNT(*) AS numarq FROM arquivos WHERE matricula_alu='$matricula'";	
	$sqlarq = mysqli_query($con,$queryarq);
	$tarq = mysqli_fetch_assoc($sqlarq);
						
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
            <a href="../mailbox/agenda.php">
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
            <li><a href="cadastrar_aluno.php"><i class="fa fa-circle-o"></i> Cadastrar</a></li>
            <li><a href="buscar_aluno.php"><i class="fa fa-circle-o"></i> Buscar</a></li>
            <li><a href="controle.php"><i class="fa fa-circle-o"></i> Controle</a></li>
            <li><a href="registro.php"><i class="fa fa-circle-o"></i> Registro</a></li>
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
        Aluno
        <small>alterar aluno</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="../inicio.php"><i class="fa fa-dashboard"></i> Início</a></li>
        <li><a href="buscar_aluno.php">Aluno</a></li>
        <li class="active">Alterar aluno</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
  
          <div class="col-md-9">
          <!-- Horizontal Form -->
          <div class="box box-warning">
            <div class="box-header with-border"> 
              <h3 class="box-title">Altere ou visualize este aluno</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form id="form" name="form" action="alteraraluno.php" enctype="multipart/form-data" data-ls-module="form" method="post" class="form-horizontal">
              <div class="box-body">
            <div class="widget-user-image bg-yellow">
            <div id="dium">
            <div id="didois">
            <label>
		<input style="display:none;" type="file" name="filefoto"  onchange="document.getElementById('preview').src = window.URL.createObjectURL(this.files[0])">
		<?php
		if ($nomefoto == ""){
		echo "<img id='preview' class='img-circle' style='cursor: pointer;' src='../../dist/img/add-img.png' width='130' height='130' />";         
		}else{
		echo "<img id='preview' class='img-circle' style='cursor: pointer;' src='data:image/jpeg;base64,". $base64."' width='130' height='130' />";         		
		}
		?>
            </label>  
            </div>  
            </div>  
            </div> 
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Pagamento<i class="text-green"></i></label>
                  
                <div class="col-sm-10">                
		<select name="ativo" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
			<option value="0" <?php echo $situacao=='0'?'selected':'';?> >Efetuado</option>			
			<option value="1" <?php echo $situacao=='1'?'selected':'';?> >Não Efetuado</option>						
		</select>
		</div>
		</div>
                <div class="form-group" id="dema">
                  <label for="inputEmail3" for="inputEmail3" class="col-sm-2 control-label">Matricula<i class="text-yellow">*</i></label>
                  
                  <div class="col-sm-10">
                    <span class="help-block" id="war-mat" style="display:none;"><i class="fa fa-bell-o text-yellow"> Por favor preencha este campo</i></span>                  
                    <input type="text" disabled id="MatriculaV" name="MatriculaB" class="form-control" placeholder="Matricula" style="width:250px;" value="<?php echo $matricula ?>" >
                    <input type="hidden" id="Matricula" name="Matricula" class="form-control" placeholder="Matricula" style="width:250px;" value="<?php echo $matricula ?>" >                    
                  </div>
                </div>                  
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Nome <i class="text-blue">*</i></label>
                  
                  <div class="col-sm-10">
                    <span class="help-block" id="war-na" style="display:none;"><i class="fa fa-bell-o text-yellow"> Por favor preencha este campo</i></span>                  
                    <input type="text" class="form-control" id="nomealu" name="NomeDoAluno" placeholder="Nome completo" value="<?php echo $nome ?>">
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
                  <input type="text" class="form-control" name="DataNasc" data-inputmask='"mask": "99/99/9999"' data-mask style="width:213px;" value="<?php echo $dtaluno ?>">
                </div>                  
                </div>
                  </div>
                <div class="form-group">                                  
                  <label for="inputPassword3" class="col-sm-2 control-label">RG <i class="text-blue"></i></label>

                  <div class="col-sm-10">
                    <span class="help-block" id="war-rga" style="display:none;"><i class="fa fa-bell-o text-yellow"> Por favor preencha este campo</i></span>
	            <input type="text" class="form-control" name="RGAluno" data-inputmask='"mask": "99.999.999.9"' data-mask style="width:250px;" value="<?php echo $rgalu ?>">
                  </div>                 
                </div>
                <div class="form-group">                                  
                  <label for="inputPassword3" class="col-sm-2 control-label">CPF <i class="text-blue"></i></label>

                  <div class="col-sm-10">
                    <span class="help-block" id="war-cpfa" style="display:none;"><i class="fa fa-bell-o text-yellow"> Por favor preencha este campo</i></span>                  
	            <input type="text" class="form-control" name="CPFAluno" data-inputmask='"mask": "999.999.999-99"' data-mask style="width:250px;" value="<?php echo $cpfalu ?>">
                  </div>                 
                </div>    
                <div class="form-group">                                  
                  <label for="inputPassword3" class="col-sm-2 control-label">Arquivo (<?php echo $tarq['numarq'] ?>)<i class="text-red"></i></label>

                  <div class="col-sm-10">
                    <span class="help-block" id="war-prof" style="display:none;"><i class="fa fa-bell-o text-yellow"> Por favor preencha este campo</i></span>  
                    <label class="btn btn-block btn-warning" for='file'>Selecionar um arquivo &#187;</label> <a href="<?php echo "listar.php?Matricula=" . $matricula?>" class="bt-enviar">Ver arquivo</a>
	            <input id="file" id="file" name="file[]" multiple="multiple" type="file"/>
                  </div>                 
                </div>    
                <div class="form-group">                                  
                  <label for="inputPassword3" class="col-sm-2 control-label">Turma<i class="text-blue">*</i></label>

                  <div class="col-sm-10">
                    <span class="help-block" id="war-turm" style="display:none;"><i class="fa fa-bell-o text-yellow"> Por favor selecione uma turma</i></span>                  
	            <select type="text" name="TurmaFk" class="btn btn-default dropdown-toggle" data-toggle="dropdown" style="width:100%;"> 
		        <?php 
			    $result= mysqli_query($con,'SELECT * FROM turma ORDER BY id_turma ASC'); ?>
			<?php while($row= mysqli_fetch_assoc($result)) { ?>
			    <option value="<?php echo $row['num_turma'] ?>" <?php if ($row['num_turma']==$turma) { ?>selected="selected"<?php } ?>>
			<?php echo htmlspecialchars($row['num_turma']); ?>
			    </option>
			<?php 
			    } 
		    	?>
	            </select>
                  </div>                 
                </div>                   
              <!-- FILIAÇÃO -->  
              <div class="box-footer">
              <h3>Filiação</h3>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Nome <i class="text-blue">*</i></label>
                  
                  <div class="col-sm-10">
                    <span class="help-block" id="war-nr1" style="display:none;"><i class="fa fa-bell-o text-yellow"> Por favor preencha este campo</i></span>                  
                    <input type="text" class="form-control" id="nomer1" name="NomeResp" placeholder="Nome completo do primeiro responsável" value="<?php echo $nomer1 ?>">
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">CPF <i class="text-blue">*</i></label>
                  
                  <div class="col-sm-10">
                    <span class="help-block" id="war-cpfr1" style="display:none;"><i class="fa fa-bell-o text-yellow"> Por favor preencha este campo</i></span>                  
                    <input type="text" class="form-control" id="cpfr1" name="CPFResp" placeholder="CPF do primeiro responsável" data-inputmask='"mask": "999.999.999-99"' data-mask style="width:250px;" value="<?php echo $cpfr1 ?>">
                  </div>
                </div>  
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">RG <i class="text-blue">*</i></label>
                  
                  <div class="col-sm-10">
                    <span class="help-block" id="war-rgr1" style="display:none;"><i class="fa fa-bell-o text-yellow"> Por favor preencha este campo</i></span>                  
                    <input type="text" class="form-control" id="rgr1" name="RGResp" placeholder="RG do primeiro responsável" data-inputmask='"mask": "99.999.999.9"' data-mask style="width:250px;" value="<?php echo $rgr1 ?>">
                  </div>
                </div>   
                <div class="form-group">
                  <label for="inputPassword3" class="col-sm-2 control-label">Nascimento <i class="text-blue">*</i></label>

                  <div class="col-sm-10">
                    <span class="help-block" id="war-dtr1" style="display:none;"><i class="fa fa-bell-o text-yellow"> Por favor preencha este campo</i></span>                                    
                <div class="input-group">
                  <div class="input-group-addon">
                    <i class="fa fa-calendar"></i>
                  </div>
                  <input type="text" class="form-control" name="DataNascResp" data-inputmask='"mask": "99/99/9999"' data-mask style="width:213px;" value="<?php echo $dtr1 ?>">
                </div>                  
                </div>
                </div>                                                         
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Email <i class="text-blue">*</i></label>
                  
                  <div class="col-sm-10">
                    <span class="help-block" id="war-er1" style="display:none;"><i class="fa fa-bell-o text-yellow"> Por favor preencha este campo</i></span>                  
                    <input type="email" class="form-control" id="emailr1" name="Email" placeholder="Email do primeiro responsável" value="<?php echo $emailr1 ?>">
                  </div>
                </div>  
                <div class="form-group">
                  <label for="inputPassword3" class="col-sm-2 control-label">Celular <i class="text-blue">*</i></label>

                  <div class="col-sm-10">
                    <span class="help-block" id="war-celr1" style="display:none;"><i class="fa fa-bell-o text-yellow"> Por favor preencha este campo</i></span>                                    
                <div class="input-group">
                  <div class="input-group-addon">
                    <i class="fa fa-phone"></i>
                  </div>
                  <input type="text" class="form-control" name="Celular" data-inputmask='"mask": "(99)9 9999-9999"' data-mask style="width:213px;" value="<?php echo $celr ?>">
                </div>                  
                </div>
                </div>
                <!--segundo responsável-->
              <div class="box-footer"> </div>  
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Nome <i class="text-blue"></i></label>
                  
                  <div class="col-sm-10">
                    <span class="help-block" id="war-nr2" style="display:none;"><i class="fa fa-bell-o text-yellow"> Por favor preencha este campo</i></span>                  
                    <input type="text" class="form-control" id="nomer2" name="NomeResp2" placeholder="Nome completo do segundo responsável" value="<?php echo $nomer2 ?>">
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">CPF <i class="text-blue"></i></label>
                  
                  <div class="col-sm-10">
                    <span class="help-block" id="war-cpfr2" style="display:none;"><i class="fa fa-bell-o text-yellow"> Por favor preencha este campo</i></span>                  
                    <input type="text" class="form-control" id="cpfr2" name="CPFResp2" placeholder="CPF do segundo responsável" data-inputmask='"mask": "999.999.999-99"' data-mask style="width:250px;" value="<?php echo $cpfr2 ?>">
                  </div>
                </div>  
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">RG <i class="text-blue"></i></label>
                  
                  <div class="col-sm-10">
                    <span class="help-block" id="war-rgr2" style="display:none;"><i class="fa fa-bell-o text-yellow"> Por favor preencha este campo</i></span>                  
                    <input type="text" class="form-control" id="rgr2" name="RGResp2" placeholder="RG do segundo responsável" data-inputmask='"mask": "99.999.999.9"' data-mask style="width:250px;" value="<?php echo $rgr2 ?>">
                  </div>
                </div>   
                <div class="form-group">
                  <label for="inputPassword3" class="col-sm-2 control-label">Nascimento <i class="text-blue"></i></label>

                  <div class="col-sm-10">
                    <span class="help-block" id="war-dtr2" style="display:none;"><i class="fa fa-bell-o text-yellow"> Por favor preencha este campo</i></span>                                    
                <div class="input-group">
                  <div class="input-group-addon">
                    <i class="fa fa-calendar"></i>
                  </div>
                  <input type="text" class="form-control" name="DataNascResp2" data-inputmask='"mask": "99/99/9999"' data-mask style="width:213px;" value="<?php echo $dtr2 ?>">
                </div>                  
                </div>
                </div>                                                         
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Email <i class="text-blue"></i></label>
                  
                  <div class="col-sm-10">
                    <span class="help-block" id="war-er2" style="display:none;"><i class="fa fa-bell-o text-yellow"> Por favor preencha este campo</i></span>                  
                    <input type="email" class="form-control" id="emailr2" name="Email2" placeholder="Email do segundo responsável" value="<?php echo $emailr2 ?>">
                  </div>
                </div>  
                <div class="form-group">
                  <label for="inputPassword3" class="col-sm-2 control-label">Celular <i class="text-blue"></i></label>

                  <div class="col-sm-10">
                    <span class="help-block" id="war-celr2" style="display:none;"><i class="fa fa-bell-o text-yellow"> Por favor preencha este campo</i></span>                                    
                <div class="input-group">
                  <div class="input-group-addon">
                    <i class="fa fa-phone"></i>
                  </div>
                  <input type="text" class="form-control" name="Celular2" data-inputmask='"mask": "(99)9 9999-9999"' data-mask style="width:213px;" value="<?php echo $celr2 ?>">
                </div>                  
                </div>
                </div>
              <!--Endereço-->
              <div class="box-footer"> </div>  
                <div class="form-group">
                  <label for="inputPassword3" class="col-sm-2 control-label">Telefone Fixo <i class="text-blue"></i></label>

                  <div class="col-sm-10">
                    <span class="help-block" id="war-nada" style="display:none;"><i class="fa fa-bell-o text-yellow"> Por favor preencha este campo</i></span>                                    
                <div class="input-group">
                  <div class="input-group-addon">
                    <i class="fa fa-phone"></i>
                  </div>
                  <input type="text" class="form-control" id="tel" name="TelFixo" data-inputmask='"mask": "(99) 9999-9999"' data-mask style="width:213px;" value="<?php echo $telr ?>">
                </div>                  
                </div>
                </div>    
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Endereço <i class="text-blue">*</i></label>
                  
                  <div class="col-sm-10">
                    <span class="help-block" id="war-end" style="display:none;"><i class="fa fa-bell-o text-yellow"> Por favor preencha este campo</i></span>                  
                    <input type="email" class="form-control" name="LogradouroResp" placeholder="Logradouro completo" value="<?php echo $logradouro ?>">
                  </div>
                </div>  
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">N° <i class="text-blue">*</i></label>
                  
                  <div class="col-sm-10">
                    <span class="help-block" id="war-n" style="display:none;"><i class="fa fa-bell-o text-yellow"> Por favor preencha este campo</i></span>                  
                    <input type="email" class="form-control" name="NumResp" placeholder="número do endereço" style="width:250px;" value="<?php echo $numr ?>">
                  </div>
                </div> 
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Bairro <i class="text-blue">*</i></label>
                  
                  <div class="col-sm-10">
                    <span class="help-block" id="war-bairr" style="display:none;"><i class="fa fa-bell-o text-yellow"> Por favor preencha este campo</i></span>                  
                    <input type="email" class="form-control" name="BairroResp" placeholder="Bairro completo" value="<?php echo $bairror ?>">
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
                  <input type="text" class="form-control" name="CEPResp" data-inputmask='"mask": "99999-999"' data-mask style="width:213px;" value="<?php echo $cepr ?>">
                </div>                  
                </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Cidade <i class="text-blue">*</i></label>
                  
                  <div class="col-sm-10">
                    <span class="help-block" id="war-cid" style="display:none;"><i class="fa fa-bell-o text-yellow"> Por favor preencha este campo</i></span>                  
                    <input type="email" class="form-control" name="CidadeResp" placeholder="Cidade completa" value="<?php echo $cidade ?>">
                  </div>
                </div>                
                </div>
              <!--responsável financeiro-->
              <div class="box-footer">
               <h3>Financeiro</h3>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Nome <i class="text-blue">*</i></label>
                  
                  <div class="col-sm-10">
                    <span class="help-block" id="war-nrf" style="display:none;"><i class="fa fa-bell-o text-yellow"> Por favor preencha este campo</i></span>                  
                    <input type="text" class="form-control" id="nomerf" name="NomeRespf" placeholder="Nome completo do responsável financeiro" value="<?php echo $nomerf ?>">
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">CPF <i class="text-blue">*</i></label>
                  
                  <div class="col-sm-10">
                    <span class="help-block" id="war-cpfrf" style="display:none;"><i class="fa fa-bell-o text-yellow"> Por favor preencha este campo</i></span>                  
                    <input type="text" class="form-control" id="cpfrf" name="CPFRespf" placeholder="CPF do responsável financeiro" data-inputmask='"mask": "999.999.999-99"' data-mask style="width:250px;" value="<?php echo $cpfrf ?>">
                  </div>
                </div>  
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">RG <i class="text-blue">*</i></label>
                  
                  <div class="col-sm-10">
                    <span class="help-block" id="war-rgrf" style="display:none;"><i class="fa fa-bell-o text-yellow"> Por favor preencha este campo</i></span>                  
                    <input type="text" class="form-control" id="rgrf" name="RGRespf" placeholder="RG do responsável financeiro" data-inputmask='"mask": "99.999.999.9"' data-mask style="width:250px;" value="<?php echo $rgrf ?>">
                  </div>
                </div>   
                <div class="form-group">
                  <label for="inputPassword3" class="col-sm-2 control-label">Nascimento <i class="text-blue">*</i></label>

                  <div class="col-sm-10">
                    <span class="help-block" id="war-dtrf" style="display:none;"><i class="fa fa-bell-o text-yellow"> Por favor preencha este campo</i></span>                                    
                <div class="input-group">
                  <div class="input-group-addon">
                    <i class="fa fa-calendar"></i>
                  </div>
                  <input type="text" class="form-control" name="DataNascRespf" data-inputmask='"mask": "99/99/9999"' data-mask style="width:213px;" value="<?php echo $dtrf ?>">
                </div>                  
                </div>
                </div>                                                         
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Email <i class="text-blue">*</i></label>
                  
                  <div class="col-sm-10">
                    <span class="help-block" id="war-erf" style="display:none;"><i class="fa fa-bell-o text-yellow"> Por favor preencha este campo</i></span>                  
                    <input type="email" class="form-control" id="emailrf" name="Emailf" placeholder="Email do responsável financeiro" value="<?php echo $emailrf ?>">
                  </div>
                </div>  
                <div class="form-group">
                  <label for="inputPassword3" class="col-sm-2 control-label">Celular <i class="text-blue">*</i></label>

                  <div class="col-sm-10">
                    <span class="help-block" id="war-celrf" style="display:none;"><i class="fa fa-bell-o text-yellow"> Por favor preencha este campo</i></span>                                    
                <div class="input-group">
                  <div class="input-group-addon">
                    <i class="fa fa-phone"></i>
                  </div>
                  <input type="text" class="form-control" name="Celularf" data-inputmask='"mask": "(99)9 9999-9999"' data-mask style="width:213px;" value="<?php echo $celrf ?>">
                </div>                  
                </div>
                </div>              
              </div>
              <!-- Segurança -->
              <div class="box-footer">
              <h3>Segurança</h3>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Nome <i class="text-blue"></i></label>
                  
                  <div class="col-sm-10">
                    <span class="help-block" id="war-turm" style="display:none;"><i class="fa fa-bell-o text-yellow"> Por favor preencha este campo</i></span>                  
                    <input type="text" class="form-control" name="RespSegNome1" placeholder="Nome completo do primeiro resp. de segurança" value="<?php echo $segnome ?>">
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputPassword3" class="col-sm-2 control-label">Contato<i class="text-blue"></i></label>

                  <div class="col-sm-10">
                    <span class="help-block" id="war-n" style="display:none;"><i class="fa fa-bell-o text-yellow"> Por favor preencha este campo</i></span>                                    
                <div class="input-group">
                  <div class="input-group-addon">
                    <i class="fa fa-phone"></i>
                  </div>
                  <input type="text" class="form-control" name="RespSegTel1" data-inputmask='"mask": "(99)9 9999-9999"' data-mask style="width:213px;" value="<?php echo $segcel ?>">
                </div>                  
                </div>
                </div> 
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">CPF <i class="text-blue"></i></label>
                  
                  <div class="col-sm-10">
                    <span class="help-block" id="war-turm" style="display:none;"><i class="fa fa-bell-o text-yellow"> Por favor preencha este campo</i></span>                  
                    <input type="text" class="form-control" name="RespSegCpf1" placeholder="CPF do primeiro resp. de segurança " data-inputmask='"mask": "999.999.999-99"' data-mask style="width:250px;" value="<?php echo $segcpf ?>">
                  </div>
                </div>  
              <!-- segundo resp de segurança-->  
              <div class="box-footer"></div>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Nome <i class="text-blue"></i></label>
                  
                  <div class="col-sm-10">
                    <span class="help-block" id="war-turm" style="display:none;"><i class="fa fa-bell-o text-yellow"> Por favor preencha este campo</i></span>                  
                    <input type="text" class="form-control" name="RespSegNome2" placeholder="Nome completo do segundo resp. de segurança" value="<?php echo $segnome2 ?>">
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputPassword3" class="col-sm-2 control-label">Contato<i class="text-blue"></i></label>

                  <div class="col-sm-10">
                    <span class="help-block" id="war-n" style="display:none;"><i class="fa fa-bell-o text-yellow"> Por favor preencha este campo</i></span>                                    
                <div class="input-group">
                  <div class="input-group-addon">
                    <i class="fa fa-phone"></i>
                  </div>
                  <input type="text" class="form-control" name="RespSegTel2" data-inputmask='"mask": "(99)9 9999-9999"' data-mask style="width:213px;" value="<?php echo $segcel2 ?>">
                </div>                  
                </div>
                </div> 
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">CPF <i class="text-blue"></i></label>
                  
                  <div class="col-sm-10">
                    <span class="help-block" id="war-turm" style="display:none;"><i class="fa fa-bell-o text-yellow"> Por favor preencha este campo</i></span>                  
                    <input type="text" class="form-control" name="RespSegCpf2" placeholder="CPF do segundoresp. de segurança " data-inputmask='"mask": "999.999.999-99"' data-mask style="width:250px;" value="<?php echo $segcpf2 ?>">
                  </div>
                </div>               
              </div>
              <!-- /.box-body -->
              <div class="box-footer">
                <a href="#" onclick="alerta2()" class="btn btn-danger">Excluir</a>
		<a id="btn_excluir" style="display:none;" href="<?php echo 'excluiraluno.php?matricula=' . $matricula ?>"/>                                
                <a href="<?php echo "nota.php?Matricula=" . $matricula ?>" class="btn btn-info">Notas</a>
                <a href="<?php echo "freq.php?Matricula=" . $matricula ?>" class="btn btn-info">Frequência</a>                
                <button type="button" onclick="alerta1()" class="btn btn-warning pull-right">Alterar</button>
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
                <li><a href="#">O campo marcado com <i class="text-yellow">*</i> não pode ser alterado.</i></a></li>
                <li><a href="#">O arquivo pode ser adicionado diversos arquivos em pdf ou outro formato (ex. cartão de vacina, certidões, histórico médico...).</i></a></li>                
                <li><a href="#">O campo pagamento verifica o estatus de pagamento.</a></li>                
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
title: 'Alterar aluno',
content: 'Apagar aluno?',
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
var nome = form.NomeDoAluno.value;
var sexo = form.sexo.value;
var dtnasca = form.DataNasc.value;
var rgaluno = form.RGAluno.value;
var cpfaluno = form.CPFAluno.value;
var turma = form.TurmaFk.value;
var nome1 = form.NomeResp.value;
var cpf1 = form.CPFResp.value;
var rg1 = form.RGResp.value;
var dtnasc1 = form.DataNascResp.value;
var email1 = form.Email.value;
var cel1 = form.Celular.value;
var ende = form.LogradouroResp.value;
var num = form.NumResp.value;
var bairro = form.BairroResp.value;
var cep = form.CEPResp.value;
var cidade = form.CidadeResp.value;
var nomef = form.NomeRespf.value;
var cpfrf = form.CPFRespf.value;
var rgrf = form.RGRespf.value;
var dtnascrf = form.DataNascRespf.value;
var emailrf = form.Emailf.value;
var celrf = form.Celularf.value;

return	$.confirm({
title: 'Alterar aluno',
content: 'Prosseguir com a alteração?',
buttons: {
Sim: {
text: 'Sim',
btnClass: 'btn-blue',
action: function (){

if(nome == ""){
document.getElementById("war-na").style.display="inline";
form.NomeDoAluno.focus();
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
form.DataNasc.focus();
return true;								        
}else{
document.getElementById("war-dta").style.display="none";
}

if(turma == "0"){
document.getElementById("war-turm").style.display="inline";
form.TurmaFk.focus();
return true;								        
}else{
document.getElementById("war-turm").style.display="none";
}

if(nome1 == ""){
document.getElementById("war-nr1").style.display="inline";
form.NomeResp.focus();
return true;								        
}else{
document.getElementById("war-nr1").style.display="none";
}

if(cpf1 == ""){
document.getElementById("war-cpfr1").style.display="inline";
form.CPFResp.focus();
return true;								        
}else{
document.getElementById("war-cpfr1").style.display="none";
}

if(rg1 == ""){
document.getElementById("war-rgr1").style.display="inline";
form.RGResp.focus();
return true;								        
}else{
document.getElementById("war-rgr1").style.display="none";
}

if(dtnasc1 == ""){
document.getElementById("war-dtr1").style.display="inline";
form.DataNascResp.focus();
return true;								        
}else{
document.getElementById("war-dtr1").style.display="none";
}

if(email1 == ""){
document.getElementById("war-er1").style.display="inline";
form.Email.focus();
return true;								        
}else{
document.getElementById("war-er1").style.display="none";
}

if(cel1== ""){
document.getElementById("war-celr1").style.display="inline";
form.Celular.focus();
return true;								        
}else{
document.getElementById("war-celr1").style.display="none";
}

if(ende == ""){
document.getElementById("war-end").style.display="inline";
form.LogradouroResp.focus();
return true;								        
}else{
document.getElementById("war-end").style.display="none";
}

if(num == ""){
document.getElementById("war-n").style.display="inline";
form.NumResp.focus();
return true;								        
}else{
document.getElementById("war-n").style.display="none";
}

if(bairro == ""){
document.getElementById("war-bairr").style.display="inline";
form.BairroResp.focus();
return true;								        
}else{
document.getElementById("war-bairr").style.display="none";
}

if(cep == ""){
document.getElementById("war-cep").style.display="inline";
form.CEPResp.focus();
return true;								        
}else{
document.getElementById("war-cep").style.display="none";
}

if(cidade == ""){
document.getElementById("war-cid").style.display="inline";
form.Cidaderesp.focus();
return true;								        
}else{
document.getElementById("war-cid").style.display="none";
}

if(nomef == ""){
document.getElementById("war-nrf").style.display="inline";
form.NomeRespf.focus();
return true;								        
}else{
document.getElementById("war-nrf").style.display="none";
}

if(cpfrf == ""){
document.getElementById("war-cpfrf").style.display="inline";
form.CPFRespf.focus();
return true;								        
}else{
document.getElementById("war-cpfrf").style.display="none";
}

if(rgrf == ""){
document.getElementById("war-rgrf").style.display="inline";
form.RGRespf.focus();
return true;								        
}else{
document.getElementById("war-rgrf").style.display="none";
}

if(dtnascrf == ""){
document.getElementById("war-dtrf").style.display="inline";
form.DataNascRespf.focus();
return true;								        
}else{
document.getElementById("war-dtrf").style.display="none";
}

if(emailrf == ""){
document.getElementById("war-erf").style.display="inline";
form.Emailf.focus();
return true;								        
}else{
document.getElementById("war-erf").style.display="none";
}

if(celrf == ""){
document.getElementById("war-celrf").style.display="inline";
form.Celularf.focus();
return true;								        
}else{
document.getElementById("war-celrf").style.display="none";
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
        window.history.replaceState({}, "Hide", "http://athena.troiatecnologia.com.br/new_sistem/pages/aluno/alterar_aluno.php");
}    
</script>
</body>
</html>