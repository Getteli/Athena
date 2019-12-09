<?php  

/* esse bloco de código em php verifica se existe a sessão, pois o usuário pode simplesmente não fazer o login e digitar na barra de endereço do seu navegador o caminho para a página principal do site (sistema), burlando assim a obrigação de fazer um login, com isso se ele não estiver feito o login não será criado a session, então ao verificar que a session não existe a página redireciona o mesmo para a index.php.*/

//fara a conexao com banco de dados
include_once 'dist/php/conexao.php';

//chama a cachelogin, para verificar o cache se esta logado
include_once 'dist/php/cachelogin_index.php';

?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>ATHENA | Entrar</title>
  <script src="https://www.gstatic.com/firebasejs/4.1.5/firebase.js"></script>
  <script src="token.js" type="text/javascript"></script>  
  <!-- favicon -->
  <link rel="shortcut icon" href="dist/img/favicon.png" type="image/x-icon" />
    
  <meta name="apple-mobile-web-app-capable" content="yes"> 
  <meta name="mobile-web-app-capable" content="yes">
  <!-- manifest -->
  <link rel="manifest" href="dist/js/manifest.json">
  <link rel="manifest2" href="/manifest2.json">
  <!-- bookmark_bubble -->
  <script type="text/javascript" src="dist/js/bookmark_bubble.js"></script>    
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- jQuery 3.1.1 -->
  <script src="plugins/jQuery/jquery-3.1.1.min.js"></script>  
  <!-- jQuery UI 1.11.4 -->
  <script src="https://code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script>  
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="plugins/iCheck/square/blue.css">
  
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

<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <a href="#"><b>ATHENA</b>.suaescola</a>
  </div>
  <!-- /.login-logo -->
  <div class="login-box-body">
    <p class="login-box-msg">Entre para começar sua sessão</p>

    <form action="dist/php/login.php" method="post">
      <div class="form-group has-feedback">
      <label for="email"></label>
        <input type="email" name="email" class="form-control" placeholder="E-mail" required name="email">
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
      <label for="senha"></label>
        <input type="password" name="senha" class="form-control" placeholder="Senha" required name="senha">
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>
      <div class="row">
<!--         <div class="col-xs-8">
          <div class="checkbox icheck">
            <label>
              <input type="checkbox"> Remember Me
            </label>
          </div>
        </div>
 -->        <!-- /.col -->
        <div class="col-xs-4">
          <button type="submit" class="btn btn-primary btn-block btn-flat">ENTRAR</button>
        </div>
        <!-- /.col -->
      </div>
    </form>

<!--     <div class="social-auth-links text-center">
      <p>- OR -</p>
      <a href="#" class="btn btn-block btn-social btn-facebook btn-flat"><i class="fa fa-facebook"></i> Sign in using
        Facebook</a>
      <a href="#" class="btn btn-block btn-social btn-google btn-flat"><i class="fa fa-google-plus"></i> Sign in using
        Google+</a>
    </div> -->
    <!-- /.social-auth-links -->

    <a href="recsenha.html">Esqueceu sua senha?</a><br>
    <!--<a href="register.html" class="text-center">Registrar novo membro</a>-->

  </div>
  <!-- /.login-box-body -->
</div>
<!-- /.login-box -->


<script>
// function alerta do href2
function alerta3(){
return	$.confirm({
title: 'Agenda',
content: 'Prosseguir com a Exclusão desta mensagem?',
buttons: {
Sim: {
text: 'Sim',
btnClass: 'btn-blue',
action: function (){
document.getElementById('ex').click();
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
