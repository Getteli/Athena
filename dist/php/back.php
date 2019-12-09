<?php
// session_start inicia a sess達o
session_start();
?>
<!DOCTYPE html>
<html>
<head><meta http-equiv="Content-Type" content="text/html; charset=euc-jp">
  
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>ATHENA | Bloqueado</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- jQuery 3.1.1 -->
  <script src="../../plugins/jQuery/jquery-3.1.1.min.js"></script>  
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="../../bootstrap/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../../dist/css/AdminLTE.min.css">

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
<body class="hold-transition lockscreen">
<!-- Automatic element centering -->
<div class="lockscreen-wrapper">
  <div class="lockscreen-logo">
    <a href="../index.php"><b>ATHENA</b>.suaescola</a>
  </div>
  <!-- User name -->
  <div class="lockscreen-name"><?php echo $logado ?></div>

  <!-- START LOCK SCREEN ITEM -->
  <div class="lockscreen-item">
    <!-- lockscreen image -->
    <!--<div class="lockscreen-image">
      <img src="../dist/img/user1-128x128.jpg" alt="User Image">
    </div>-->
    <!-- /.lockscreen-image -->

    <!-- lockscreen credentials (contains the form) -->
    <form action="../dist/php/back.php" class="lockscreen-credentials" method="post">
      <div class="input-group">
        <input type="hidden" name="email" value="<?php echo $logado ?>">
        <input type="password" name="senha" class="form-control" placeholder="senha">

        <div class="input-group-btn">
          <button type="submit" class="btn"><i class="fa fa-arrow-right text-muted"></i></button>
        </div>
      </div>
    </form>
    <!-- /.lockscreen credentials -->

  </div>
  <!-- /.lockscreen-item -->
  <div class="help-block text-center">
    Digite sua senha e retorne a sua sessão
  </div>

<?php 

// //fara a conexao com banco de dados
include_once 'conexao.php';

$email = filter_input(INPUT_POST, "email");
$senha = filter_input(INPUT_POST, "senha");


	// verificar a conexao, se tudo estiver certo, vai executar a linha e enviar o novo registro, se nao vai informar qual o erro
	 if ($con) {	

	 $query = mysqli_query($con, "SELECT email,senha FROM login_sistema WHERE senha ='$senha'");
         $linha = mysqli_fetch_assoc($query);
         
	 	if($email == $linha['email'] && $senha == $linha['senha']){
	 	
	 	$_SESSION['login'] = $email;
		$_SESSION['senha'] = $senha;
		
	$query = mysqli_query($con, "UPDATE login_sistema SET situacao='log' WHERE email ='$email' AND senha ='$senha'");		
	
			echo "<script type='text/javascript'>		
		                window.location = '../../pages/inicio.php';			           
			      </script>";
	 	}else{
		
	 		echo "<script type='text/javascript'>
				$.confirm({
				title: 'senha incorreta',
				content: 'senha incorreta, por favor tente novamente',
					buttons: {
						Ok: {
							text: 'Ok',
							btnClass: 'btn-blue',
							keys: ['enter', 'shift'],
							action: function(){
								window.history.back();
							}
						}
					}
				});
					</script>";
	 	}

	 }else{

	 	die("Erro: ".mysqli_error($con));
	 }
?>
  
  <div class="text-center">
    <a href="../index.php">ou faça login com uma conta diferente</a>
  </div>
  <div class="lockscreen-footer text-center">
    Copyright &copy; 2016 <b><a href="http://troiatecnologia.com.br/" class="text-black" target="_blank">Troia tecnologia</a></b><br>
    Todos os direitos reservados
  </div>
</div>
<!-- /.center -->

</body>
</html>
