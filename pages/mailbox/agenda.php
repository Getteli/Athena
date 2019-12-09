<?php  

/* esse bloco de código em php verifica se existe a sessão, pois o usuário pode simplesmente não fazer o login e digitar na barra de endereço do seu navegador o caminho para a página principal do site (sistema), burlando assim a obrigação de fazer um login, com isso se ele não estiver feito o login não será criado a session, então ao verificar que a session não existe a página redireciona o mesmo para a index.php.*/


//fara a conexao com banco de dados
// include_once '../../dist/php/conexao.php';

//chama a info, para a versão do sistema
include_once '../../dist/php/info.php';

//chama a cachelogin, para verificar o cache se esta logado
// include_once '../../dist/php/cachelogin.php';


?>
<?php

// ------------------------------------------------ NOVO FILTRO--------------------------------------------------------------

	$parametro = $_GET['parametro'];
	$mes = $_GET['busca_mes'];
	$dia = $_GET['busca_dia'];
	$ano = $_GET['busca_ano'];

	
// se for numérico
if (is_numeric($parametro) || !empty($mes) || !empty($dia) || !empty($ano)) {
	
	// pesquiso em campos com numeros, essenciais
	$get = "SELECT * from agenda WHERE remedio1 = '1' AND lixo = '0' AND matricula_alu_agen='$parametro' OR matricula_prof_agen='$parametro' AND remedio1 = '1' AND lixo = '0' OR MONTH(data_agen) = '$mes' AND remedio1 = '1' AND lixo = '0' OR DAY(data_agen) = '$dia' AND remedio1 = '1' AND lixo = '0' OR YEAR(data_agen) = '$ano' AND remedio1 = '1' AND lixo = '0' ORDER BY id_agen DESC";

} /* se for string */
else if ((String)$parametro  || !empty($mes) || !empty($dia) || !empty($ano)) {

		$sql = "SELECT matricula_alu FROM aluno WHERE nome_alu like '%$parametro%'" ;
		$resultadobn = mysqli_query($con,$sql);
		
		$conteudoNome = mysqli_fetch_assoc($resultadobn);
		$totalNome = mysqli_num_rows($resultadobn);
		
		$matr = $conteudoNome['matricula_alu'];

	$get = "SELECT * from agenda WHERE remedio1 = '1' AND lixo = '0' AND matricula_alu_agen='$matr' OR titulo_agen like '%$parametro%' AND remedio1 = '1' AND lixo = '0' OR mensagem_age like '%$parametro%' AND remedio1 = '1' AND lixo = '0' OR MONTH(data_agen) = '$mes' AND remedio1 = '1' AND lixo = '0' OR DAY(data_agen) = '$dia' AND remedio1 = '1' AND lixo = '0' OR YEAR(data_agen) = '$ano' AND remedio1 = '1' AND lixo = '0' ORDER BY id_agen DESC";

}else{
	//assim que inicia, como não tem parametro, ele busca tudo
	$get = "SELECT * FROM agenda WHERE remedio1 = '1' AND lixo = '0' ORDER BY id_agen DESC";
}
	$resultado = mysqli_query($con,$get);
	$conteudo = mysqli_fetch_assoc($resultado);
	$total = mysqli_num_rows($resultado);


// ------------------------------------------------ NOVO FILTRO--------------------------------------------------------------
//--- query para buscar mensagens novas
        $query_c = "SELECT id_agen FROM agenda WHERE visu='0' and remedio1='1'";
	$result_c = mysqli_query($con,$query_c);
	$count = mysqli_num_rows($result_c);	
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
        Agenda
        <small><?php
	if ($count > 1){
        echo $count . " novas mensagens</small>";	
	}else if($count == 0){        
        echo "Nenhuma mensagem nova</small>";		
	}else if($count < 2){
        echo $count . " nova mensagem</small>";		
	}        
        ?>
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
          <a href="escrever.php" class="btn btn-primary btn-block margin-bottom">Escrever</a>

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
                <li class="active"><a href="agenda.php"><i class="fa fa-inbox"></i> Caixa de entrada <i class="fa fa-exclamation text-yellow"></i>
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
              <h3 id="red-tit" class="box-title">Caixa de entrada</h3>

              <div class="box-tools pull-right">
                <div class="has-feedback">
			<!-- search form -->
			<form action="<?php echo $_SERVER['PHP_SELF'];?>" method="get">
				<div class="input-group">
					<input type="text" name="parametro" class="form-control" placeholder="nome, matricula..">
					<span class="input-group-btn" style="width:0;">
						<button type="submit" name="search" id="search-btn" class="btn btn-primary" title="Buscar"><i class="fa fa-search"></i></button>
		               		<select name="busca_dia" class="btn btn-primary red-btn">
				         <option value="">Dia</option>
			                 <option value="01">01</option>
			                 <option value="02">02</option>
      			                 <option value="03">03</option>
			                 <option value="04">04</option>
			                 <option value="05">05</option>
			                 <option value="06">06</option>
			                 <option value="07">07</option>
			                 <option value="08">08</option>
			                 <option value="09">09</option>
			                 <option value="10">10</option>
			                 <option value="11">11</option>
			                 <option value="12">12</option>
			                 <option value="13">13</option>
			                 <option value="14">14</option>
			                 <option value="15">15</option>
			                 <option value="16">16</option>
			                 <option value="17">17</option>
			                 <option value="18">18</option>
			                 <option value="19">19</option>
			                 <option value="20">20</option>
			                 <option value="21">21</option>
			                 <option value="22">22</option>
			                 <option value="23">23</option>
			                 <option value="24">24</option>
			                 <option value="25">25</option>
			                 <option value="26">26</option>
			                 <option value="27">27</option>
			                 <option value="28">28</option>
			                 <option value="29">29</option>
			                 <option value="30">30</option>
			                 <option value="31">31</option>
			                </select>
			                <select name="busca_mes" class="btn btn-primary red-btn">
				         <option value="">Mês</option>
			                 <option value="1">Janeiro</option>
			                 <option value="2">Fevereiro</option>
			                 <option value="3">Março</option>
			                 <option value="4">Abril</option>
			                 <option value="5">Maio</option>
			                 <option value="6">Junho</option>
			                 <option value="7">Julho</option>
			                 <option value="8">Agosto</option>
			                 <option value="9">Setembro</option>
			                 <option value="10">Outubro</option>
			                 <option value="11">Novembro</option>
			                 <option value="12">Dezembro</option>
			                </select>	
			                <select name="busca_ano" class="btn btn-primary red-btn">
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
				</div>
			</form>      
                </div>
              </div>
              <!-- /.box-tools -->
            </div>
            <!-- /.box-header -->
            <div class="box-body no-padding">
              <div class="mailbox-controls">
                <script>
                function recarr(){
	              	window.location = 'agenda.php';
	        }      	
                </script>

              </div>
              <!-- php busca agenda -->
              <?php 
                
		$total_reg = "20"; // número de registros por página
		
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
              <div class="table-responsive mailbox-messages">
                <table class="table table-hover table-striped" id="tbex">
                  <tbody>
                  <form id="form" action="lixo_x.php" method="post">  
                  <?php
			// vamos criar a visualização
			while ($dados = mysqli_fetch_array($limite)) {
			$id = $dados["id_agen"];
			$assunto = $dados["titulo_agen"];
			$msg = $dados["mensagem_age"];     
			$dt = $dados["data_agen"];
			$visu = $dados["visu"];
			$era = $dados["email_resp_agenda"];
			$naluno = $dados["nome_aluno"];
			$turma = $dados["turma_aluno"];
                  ?>
                   
                  <tr>
                    <td><input type="checkbox" id="myCheck" class="checkbox" name="excluir[]" value="<?php echo $id ?>"></td>
                    <td>
                    <?php
                    if ($visu == "0"){
                    echo "<a href='ler_agenda.php?id=".$id."' title='não lido'><i class='fa fa-envelope'></i></a>";
                    }
                    ?>
                    </td>
                    <td>
                    <a href="#" onclick="alerta3(<?php echo $id ?>)"><i class="fa fa-trash-o text-red"></i></a>
                    <a style="display:none;" id="<?php echo $id ?>" href="<?php echo "lixo.php?IdAgenda=" . $id ?>"><i class="fa fa-trash-o text-red"></i></a>
                    </td>
                    <td class="mailbox-name"><a <?php echo "href='ler_agenda.php?id=".$id."'" ?>>
<?php
			if($dados['remedio1'] == "sistema" || $dados['remedio1'] == "turmaagendasistema"){
			
				echo "Sistema";
			
			}else if($dados['remedio1'] == "0"){
				$emailResp = $dados['email_resp_agenda'];
				
				$sql4 = "SELECT * FROM aluno WHERE email_resp = '$emailResp' OR email_resp2 = '$emailResp' OR email_respf = '$emailResp'";
				$dados4 = mysqli_query($con,$sql4);
					
				$linha4 = mysqli_fetch_assoc($dados4);
				
				if($emailResp == $linha4['email_resp']){
				
					echo "Resp. " . $linha4['nome_resp'];			
				
				}else if($emailResp == $linha4['email_resp2']){
				
					echo "Resp. " . $linha4['nome_resp2'];							
				
				}else{
				
					echo "Resp. " . $linha4['nome_respf'];							
				
				}
				
			//remedio 1 é escola, nem vai aparecer aqui, apenas na busca_agenda_rp
			}else if($dados['remedio1'] == "1"){
			
				$nomeAlu = $dados['matricula_alu_agen'];
				
				$sql5 = "SELECT nome_alu FROM aluno WHERE matricula_alu = '$nomeAlu'";
				$dados5 = mysqli_query($con,$sql5);
					
				$linha5 = mysqli_fetch_assoc($dados5);
	
				echo "Aluno(a) e " . $linha5['nome_alu'];
							
			}else if($dados['matricula_prof_agen']){
			
				$nomeProf = $dados['matricula_prof_agen'];
			
				$sql3 = "SELECT nome_prof FROM professor WHERE matricula_prof = '$nomeProf'";
				$dados3 = mysqli_query($con,$sql3);
				
				$linha3 = mysqli_fetch_assoc($dados3);

				echo "Prof. " . $linha3['nome_prof'];
			
			}
?>
                    
                    </a></td>
                    <td class="mailbox-subject"><b> <?php echo mb_strimwidth($assunto, 0,23, " ...","UTF-8"); ?></b></td>
                    <td class="mailbox-subject"> <?php echo mb_strimwidth($msg, 0,41, " ...","UTF-8"); ?></td>
                    <td class="mailbox-attachment"></td>
                    <td class="mailbox-date"><?php echo date('d/m/Y H:i:s',strtotime($dt = $dados["data_agen"])); ?></td>
                  </tr>
		<?php } ?>

                  </tbody>
                </table>
                <!-- /.table -->
              </div>
              <!-- /.mail-box-messages -->
            </div>
            <!-- /.box-body -->
            <div class="box-footer no-padding">
              <div class="mailbox-controls">
                <!-- Check all button -->
                <?php
                if($tr <= 0){
                echo "<button type='button' class='btn btn-default btn-sm disabled'><i class='fa fa-trash-o'></i></button>";
                echo "<button type='button' class='btn btn-default btn-sm checkbox-toggle disabled' title='Selecionar'><i class='fa fa-square-o'></i></button>";
                }else{
                echo "<button type='button' id='excluirall' onclick='alerta1()' class='btn btn-default btn-sm'><i class='fa fa-trash-o'></i></button>";
                echo "<button type='button' class='btn btn-default btn-sm checkbox-toggle seall' onClick='toggle(this)' title='Selecionar'><i class='fa fa-square-o'></i></button>";
                }
                ?>
                 </form>
		<a href="#" onclick="alerta2()" id="sealltudo" style="display:none;">selecionar tudo e excluir</a>
                <button type="button" class="btn btn-default btn-sm" title="Recarregar" onClick="recarr();"><i class="fa fa-refresh"></i></button>
                <div class="pull-right">
                  <?php echo $tr."/".$total_reg ?>
                  <div class="btn-group">
                  <?php 
		    // agora vamos criar os botões "Anterior e próximo"
		    $anterior = $pc -1;
		    $proximo = $pc +1; 
		    switch($tp){
		    	case ($tp < 0):
		    	        echo " <a href='agenda.php?pagina=$anterior&parametro=$parametro&search=&busca_dia=$dia&busca_mes=$mes&busca_ano=$ano' class='btn btn-default btn-sm disabled' title='Anterior'><i class='fa fa-chevron-left'></i></a>";
                    		echo " <a href='agenda.php?pagina=$proximo&parametro=$parametro&search=&busca_dia=$dia&busca_mes=$mes&busca_ano=$ano' class='btn btn-default btn-sm disabled' title='Próximo'><i class='fa fa-chevron-right'></i></a>";
                    	break;
		    	case ($tp <= 1):
		    	        echo " <a href='agenda.php?pagina=$anterior&parametro=$parametro&search=&busca_dia=$dia&busca_mes=$mes&busca_ano=$ano' class='btn btn-default btn-sm disabled' title='Anterior'><i class='fa fa-chevron-left'></i></a>";
                    		echo " <a href='agenda.php?pagina=$proximo&parametro=$parametro&search=&busca_dia=$dia&busca_mes=$mes&busca_ano=$ano' class='btn btn-default btn-sm disabled' title='Próximo'><i class='fa fa-chevron-right'></i></a>";
                    	break;                     	
                    	case ($pc == 1):
		    	        echo " <a href='agenda.php?pagina=$anterior&parametro=$parametro&search=&busca_dia=$dia&busca_mes=$mes&busca_ano=$ano' class='btn btn-default btn-sm disabled' title='Anterior'><i class='fa fa-chevron-left'></i></a>";
                    		echo " <a href='agenda.php?pagina=$proximo&parametro=$parametro&search=&busca_dia=$dia&busca_mes=$mes&busca_ano=$ano' class='btn btn-default btn-sm' title='Próximo'><i class='fa fa-chevron-right'></i></a>";
                    	break;                    	
                    	case ( $tp > $pc):
		    	        echo " <a href='agenda.php?pagina=$anterior&parametro=$parametro&search=&busca_dia=$dia&busca_mes=$mes&busca_ano=$ano' class='btn btn-default btn-sm' title='Anterior'><i class='fa fa-chevron-left'></i></a>";
                    		echo " <a href='agenda.php?pagina=$proximo&parametro=$parametro&search=&busca_dia=$dia&busca_mes=$mes&busca_ano=$ano' class='btn btn-default btn-sm' title='Próximo'><i class='fa fa-chevron-right'></i></a>";                    		                    	
			break;                      	       	
                    	case ($pc >= $tp):
		    	        echo " <a href='agenda.php?pagina=$anterior&parametro=$parametro&search=&busca_dia=$dia&busca_mes=$mes&busca_ano=$ano' class='btn btn-default btn-sm' title='Anterior'><i class='fa fa-chevron-left'></i></a>";
                    		echo " <a href='agenda.php?pagina=$proximo&parametro=$parametro&search=&busca_dia=$dia&busca_mes=$mes&busca_ano=$ano' class='btn btn-default btn-sm disabled' title='Próximo'><i class='fa fa-chevron-right'></i></a>";                    		                    	
			break;		
		    }   

                   ?>
                  </div>
                  <!-- /.btn-group -->
                </div>
                <!-- /.pull-right -->
              </div>
            </div>
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

function alerta1(){
if(jQuery("input:checkbox[class=checkbox]:checked").length) {
	return	$.confirm({
	title: 'Agenda',
	content: 'Prosseguir com a Exclusão desta(s) mensagem(ns)?',
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
}


// function alerta do href
function alerta2(){
return	$.confirm({
title: 'Agenda',
content: 'Prosseguir com a Exclusão destas mensagens?',
buttons: {
Sim: {
text: 'Sim',
btnClass: 'btn-blue',
action: function (){
window.location = "lixo_alla.php";
}
},
cancelar: function () {
				            
}
}
});
}
// function alerta do href2
function alerta3(id){
return	$.confirm({
title: 'Agenda',
content: 'Prosseguir com a Exclusão desta mensagem?',
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
//mascarar method GET
if(typeof window.history.replaceState == 'function') {
        window.history.replaceState({}, "Hide", "http://athena.troiatecnologia.com.br/new_sistem/pages/mailbox/agenda.php");
}		
</script>


</body>
</html>
