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

	$parametro = filter_input(INPUT_GET, "parametro");
	
// ------------------------------------------------ NOVO FILTRO--------------------------------------------------------------

// se for numérico
if (is_numeric($parametro) ||floor($parametro) ) {
	// pesquiso em campos com numeros, essenciais
	$get = "SELECT * from turma WHERE num_alu_turma='$parametro' ORDER BY num_turma ";

} /* se for string */
else if ((String)$parametro) {
	
	$get="SELECT * from turma WHERE num_turma like '%$parametro%' OR turno_turma like '%$parametro%' ORDER BY num_turma ";

}else{
	//assim que inicia, como não tem parametro, ele busca tudo
	$get = "SELECT * FROM turma ORDER BY num_turma ";
}
	$resultado = mysqli_query($con,$get);
	$conteudo = mysqli_fetch_assoc($resultado);
	$total = mysqli_num_rows($resultado);

// ------------------------------------------------ NOVO FILTRO--------------------------------------------------------------



	$turma = filter_input(INPUT_GET, "num_turma");
	
// ------------------------------------------------ BUSCAR ALUNO --------------------------------------------------------------

	//assim que inicia, como não tem parametro, ele busca tudo
	$geta = "SELECT * FROM aluno WHERE turma_fk='$turma' ORDER BY nome_alu ";

	$resultadoa = mysqli_query($con,$geta);
	$conteudoa = mysqli_fetch_assoc($resultadoa);
	$totala = mysqli_num_rows($resultadoa);


// ------------------------------------------------ BUSCAR ALUNO --------------------------------------------------------------


// ------------------------------------------------ INFORMAÇÃO DO ALUNO--------------------------------------------------------------

  //recebera os parametros para passar o aluno
  $idap = filter_input(INPUT_GET, "id");  
        
  $getap = "SELECT * FROM aluno WHERE id_aluno='$idap'";

  $resultadoap = mysqli_query($con,$getap);
  $conteudoap = mysqli_fetch_assoc($resultadoap);
  $totalap = mysqli_num_rows($resultadoap);

  $matriculaap = $conteudoap['matricula_alu'];
  $nomeap = $conteudoap['nome_alu'];
  $turma_fk = $conteudoap['turma_fk'];

//query para buscar a foto do aluno
        $query = "SELECT nome_foto,foto_aluno,Tipo FROM aluno WHERE matricula_alu='$matriculaap'";

  $result = mysqli_query($con,$query);
  
  $photo = mysqli_fetch_array($result,MYSQLI_ASSOC); 
  
  $tipo = $photo['tipo'];
  
  $nomefoto = $photo['nome_foto']; 

  $photo['foto_aluno']; 
  
  $base64 = base64_encode($photo['foto_aluno']);
  
//query para buscar a frequencia do aluno 
  $sql = "SELECT * FROM frequencia WHERE matricula_alu_freq = '$matriculaap' AND chamada = 'P'";

  $situacaof = mysqli_query($con,$sql);
  $conteudof = mysqli_fetch_assoc($situacaof);
  $totalf = mysqli_num_rows($situacaof);
  
  $totalM = $totalf / 220;

  $totalD = ($totalM * 100);

  $totalR = number_format($totalD, 2, ',', ' ') . "%";

//query para buscar as notas de cada materia do aluno
  //inglês
  $get_nota_in = "SELECT SUM(nota), (SUM(nota) / 3) AS valor_soma, TRUNCATE( (SUM(nota) / 3), 2) FROM nota WHERE matricula_alu_nota='$matriculaap' AND materia_not='inglês'";
  
  $exec_gni = mysqli_query($con,$get_nota_in);
  $media_in = mysqli_fetch_assoc($exec_gni);
  
  //psicomotricidade
  $get_nota_psi = "SELECT SUM(nota), (SUM(nota) / 3) AS valor_soma, TRUNCATE( (SUM(nota) / 3), 2) FROM nota WHERE matricula_alu_nota='$matriculaap' AND materia_not='psicomotricidade'";
  
  $exec_gnp = mysqli_query($con,$get_nota_psi);
  $media_psi = mysqli_fetch_assoc($exec_gnp);
  
  //capoeira
  $get_nota_ca = "SELECT SUM(nota), (SUM(nota) / 3) AS valor_soma, TRUNCATE( (SUM(nota) / 3), 2) FROM nota WHERE matricula_alu_nota='$matriculaap' AND materia_not='capoeira'";
  
  $exec_gnc = mysqli_query($con,$get_nota_ca);
  $media_ca = mysqli_fetch_assoc($exec_gnc);  
  
  //ballet
  $get_nota_ba = "SELECT SUM(nota), (SUM(nota) / 3) AS valor_soma, TRUNCATE( (SUM(nota) / 3), 2) FROM nota WHERE matricula_alu_nota='$matriculaap' AND materia_not='ballet'";
  
  $exec_gnb = mysqli_query($con,$get_nota_ba);
  $media_bal = mysqli_fetch_assoc($exec_gnb); 
// ------------------------------------------------ INFORMAÇÃO DO ALUNO--------------------------------------------------------------


//total mostrado
$getm = "SELECT id_aluno FROM aluno ORDER BY nome_alu ";
$resultadom = mysqli_query($con,$getm);
$totalm = mysqli_num_rows($resultadom);
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Athena | Fim do ano letivo</title>
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
  <link rel="stylesheet" href="../../dist/css/cb/checkb.css">
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
  
  @media (min-device-width: 359px) and (max-device-width: 901px){
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
          <a href="reorganizacao.php">
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
        Fim de ano letivo
        <small><?php echo $totalm ?> alunos cadastrados</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="../inicio.php"><i class="fa fa-dashboard"></i> Início</a></li>
        <li class="active">Fim de ano letivo</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-md-3">

          <div class="box box-solid">
            <div class="box-header with-border">
              <h3 class="box-title">Turmas</h3>

              <div class="box-tools">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
              </div>
            </div>
            <div class="box-body no-padding">
		      <div class="mailbox-controls">            
			    <div class="input-group pull-right">
				<form action="<?php echo $_SERVER['PHP_SELF'];?>" method="GET">
				  <input type="text" class="form-control" name="parametro" placeholder="numero,turma.."/ style="width:auto;">
				  <span class="input-group-btn">		  
				  <button type="submit" name="search" id="search-btn" class="btn btn-primary" title="Buscar"><i class="fa fa-search"></i></button>
				  </span>
				</form>
				</div>		  	
			  </div>
		    </div>
            <div class="box-body no-padding">
              <div class="mailbox-controls">
		<?php 
		
		if ($total) { do{
		
		//query q busca o numero exato de alunos cadastrado na turma
		$nome_t = $conteudo['num_turma'];
		
			$get_total = "SELECT id_aluno FROM aluno WHERE turma_fk='$nome_t'";
		
			$resultado_t = mysqli_query($con,$get_total);
			$conteudo_total= mysqli_num_rows($resultado_t);
			
			$num_turma = $conteudo['num_turma'];
			$turno = $conteudo['turno_turma'];
		?>
		
			
		    <p><a href="reorganizacao.php?parametro=<?php echo $parametro ?>&num_turma=<?php echo $num_turma ?>"><?php echo $num_turma ?></a> <br/> <?php echo $turno . " | " . $conteudo_total." alunos" ?></p>
		
		<?php 
		} while ( $conteudo = mysqli_fetch_assoc($resultado)); 
		
		  mysqli_free_result($resultado);
		  }
		  
		?>
	      </div>
            </div>  
            <!-- /.box-body -->
          </div>
          <!-- /. box -->
          
          <div class="box box-solid ">
            <div class="box-header with-border">
              <h3 class="box-title">Alunos </h3><small><?php echo "( ".$turma." )" ?></small>

              <div class="box-tools">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
              </div>
            </div>
            <div class="box-body no-padding">
             <div class="mailbox-controls">
		<?php 
		
		if ($totala) { do{
		
		$id = $conteudoa['id_aluno'];
		$nomealu = $conteudoa['nome_alu'];
		$matriculaalu = $conteudoa['matricula_alu'];
		$num_turmaa = $conteudoa['turma_fk'];
		
		?>
		    <p style="font-size:13px;"><a href="reorganizacao.php?parametro=<?php echo $parametro ?>&num_turma=<?php echo $num_turmaa ?>&id=<?php echo $id ?>" ><?php echo $nomealu ?></a> <br/> <?php echo $matriculaalu ?></p>
		
		<?php 
		} while ( $conteudoa = mysqli_fetch_assoc($resultadoa)); 
		
		  mysqli_free_result($resultadoa);
		  
		}
		
		?>
	    </div>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
                    
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
                <li><a href="#"><i class="fa fa-exclamation text-blue"></i><b>ATENÇÃO:</b> é recomendável que acesse esta área ao final de seu ano letivo para a <b>REORGANIZAÇÃO</b> das turmas. Passe de ano os alunos conforme o quadro de notas e frequência do mesmo.</a></li>
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
              <h3 class="box-title"><?php echo $nomeap ?></h3>

              <div class="box-tools pull-right">
                <div class="has-feedback">
                </div>
	      </div>
              <!-- /.box-tools -->
            </div>
            <!-- /.box-header -->
            <div class="box-body no-padding">
              <div class="mailbox-controls">
              </div>
              <div class="box-body">
                <form id="form" action="passaraluno.php" method="post">  
            <div class="widget-user-image bg-blue">
            <div id="dium">
            <div id="didois">
            <label>
		<?php
		if ($nomefoto == ""){
		echo "<img id='preview' class='img-circle' style='cursor: pointer;' src='../../dist/img/add-img3.png' width='130' height='130' />";         
		}else{
		echo "<img id='preview' class='img-circle' style='cursor: pointer;' src='data:image/jpeg;base64,". $base64."' width='130' height='130' />";         		
		}
		?>
            </label>  
 
            </div>  
            </div>  
            </div>                    
         <input type="hidden" class="form-control" name="Matricula" value="<?php echo $matriculaap ?>">            
           <div class="box-footer">
              <h3>Notas</h3>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Inglês<i class="text-blue"></i></label>
                  
                  <div class="col-sm-10">
                    <span class="help-block" id="war-nr1" style="display:none;"><i class="fa fa-bell-o text-yellow"> Por favor preencha este campo</i></span>                  
                    <input type="text" disabled class="form-control" value="<?php echo $media_in['TRUNCATE( (SUM(nota) / 3), 2)'] ?>">
                  </div>
                </div>  
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Psicomotricidade<i class="text-blue"></i></label>
                  
                  <div class="col-sm-10">
                    <span class="help-block" id="war-nr1" style="display:none;"><i class="fa fa-bell-o text-yellow"> Por favor preencha este campo</i></span>                  
                    <input type="text" disabled class="form-control" value="<?php echo $media_psi['TRUNCATE( (SUM(nota) / 3), 2)'] ?>">
                  </div>
                </div>  
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Capoeira<i class="text-blue"></i></label>
                  
                  <div class="col-sm-10">
                    <span class="help-block" id="war-nr1" style="display:none;"><i class="fa fa-bell-o text-yellow"> Por favor preencha este campo</i></span>                  
                    <input type="text" disabled class="form-control" value="<?php echo $media_ca['TRUNCATE( (SUM(nota) / 3), 2)'] ?>">
                  </div>
                </div>  
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Ballet<i class="text-blue"></i></label>
                  
                  <div class="col-sm-10">
                    <span class="help-block" id="war-nr1" style="display:none;"><i class="fa fa-bell-o text-yellow"> Por favor preencha este campo</i></span>                  
                    <input type="text" disabled class="form-control" value="<?php echo $media_bal['TRUNCATE( (SUM(nota) / 3), 2)'] ?>">
                  </div>
                </div>                                                                              
            </div>
           <div class="box-footer">
              <h3>Frequência</h3>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Presença<i class="text-blue"></i></label>
                  
                  <div class="col-sm-10">
                    <span class="help-block" id="war-nr1" style="display:none;"><i class="fa fa-bell-o text-yellow"> Por favor preencha este campo</i></span>                  
                    <input type="text" disabled class="form-control" value="<?php echo $totalR ?>">
                  </div>
                </div>               
           </div>               
           <div class="box-footer">
              <h3>Turma</h3><small> se a frequência e notas estiverem a cima da média, passe este aluno de turma</small>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Classe<i class="text-blue"></i></label>
                  
                  <div class="col-sm-10">
                    <span class="help-block" id="war-nr1" style="display:none;"><i class="fa fa-bell-o text-yellow"> Por favor preencha este campo</i></span>                  
	            <select type="text" name="TurmaFk" class="btn btn-default dropdown-toggle" data-toggle="dropdown" style="width:100%;"> 
		      <?php 
		      $result= mysqli_query($con,'SELECT * FROM turma ORDER BY id_turma ASC'); ?>
		  <?php while($row= mysqli_fetch_assoc($result)) { ?>
		      <option value="<?php echo $row['num_turma'] ?>" <?php if ($row['num_turma']==$turma_fk) { ?>selected="selected"<?php } ?>>
		  <?php echo htmlspecialchars($row['num_turma']); ?>
		      </option>
		  <?php 
		      } 
		      ?>
	            </select>
	          </div>
                </div>               
           </div>              
              <!-- /.box-body -->
              <div class="box-footer">
              <?php
              if(empty($nomeap)){
              echo "<button type='button' class='btn btn-info pull-right disabled'>Passar</button>";
              }else{
              echo "<button type='button' onclick='alerta1()' class='btn btn-info pull-right'>Passar</button>";
              }  
              ?>  
              </div>
              <!-- /.box-footer -->
            </form>  
              </div>
              <!-- /.box-body -->
            </div>
            <!-- /.box-body -->
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

loadFile = function (event) {
    output = document.getElementById ('visualização');
    Output.src = URL.createObjectURL (event.target.files [0]);
}; 


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
title: 'Fim do ano letivo',
content: 'Passar este(a) aluno(a) de turma?',
buttons: {
Sim: {
text: 'Sim',
btnClass: 'btn-blue',
action: function (){

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