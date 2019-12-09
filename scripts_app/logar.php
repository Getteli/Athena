<?php
	include_once 'conexao.php';
                // recupero do android para enviar ao banco
                $email=$_POST['email'];
		$senha=$_POST['senha'];
                // recupero do banco para enviar ao android
                $matricula= $_GET['matricula'];

               $sql = $dbcon->query ("SELECT * FROM aluno WHERE email_resp='$email' and matricula_alu='$senha' or email_resp2='$email' and matricula_alu='$senha'");
	if(mysqli_num_rows($sql) > 0) {

		

		
		 echo "login_ok,";


		} else {

                  $teste = $dbcon->query ("SELECT* FROM professor WHERE email_prof='$email' and matricula_prof='$senha'"); {

                       if(mysqli_num_rows($teste) > 0){

                              echo "login_ok2";
    
}

}
}
		?>