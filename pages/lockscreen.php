<?php  

/* esse bloco de código em php verifica se existe a sessão, pois o usuário pode simplesmente não fazer o login e digitar na barra de endereço do seu navegador o caminho para a página principal do site (sistema), burlando assim a obrigação de fazer um login, com isso se ele não estiver feito o login não será criado a session, então ao verificar que a session não existe a página redireciona o mesmo para a index.php.*/

//fara a conexao com banco de dados
include_once '../dist/php/conexao.php';

//chama a cachelogin, para verificar o cache se esta logado
include_once '../dist/php/cachelogin_lock.php';


?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Athena| Bloqueado</title>
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
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../dist/css/AdminLTE.min.css">

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
  <div class="text-center">
    <a href="../dist/php/logout.php">ou faça login com uma conta diferente</a>
  </div>
  <div class="lockscreen-footer text-center">
    Copyright &copy; 2016 <b><a href="http://troiatecnologia.com.br/" class="text-black" target="_blank">Troia tecnologia</a></b><br>
    Todos os direitos reservados
  </div>
</div>
<!-- /.center -->

<!-- jQuery 3.1.1 -->
<script src="../plugins/jQuery/jquery-3.1.1.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="../bootstrap/js/bootstrap.min.js"></script>
</body>
</html>
