<?php
include_once './conexao.php';

        header("Content-Type: application/json; charset=UTF-8",true);

function logout(){

	$db = new DbConnect();
	mysql_set_charset('utf8');
	// array for json response
	$email = $_POST['email'];
    
	// Mysql select query
	$get = "SELECT * FROM aluno WHERE email_resp='$email' OR email_resp2='$email' OR email_respf='$email'";
	$dados = mysql_query($get);
	
	$linha = mysql_fetch_assoc($dados);
	
	if(empty($linha['email_resp']) || empty($linha['email_resp2']) || empty($linha['email_respf'])){
	
		$get = "SELECT * FROM professor WHERE email_prof='$email'";
		$dados = mysql_query($get);
		
		$linha = mysql_fetch_assoc($dados);
	
		$headers = "MIME-Version: 1.1\r\n";
		$headers .= "From: Castelinho - <castelinhosistema@gmail.com>\r\n";
		$headers .= "Content-type: text/html; charset=iso-8859-1\r\n";
		$headers  .= "Content-type: text/html; charset=UTF-8\r\n";
		header('Content-type: text/html; charset=UTF-8\r\n');	
		
		$subject = "Recuperação de senha- CEC Castelinho";           
		$mensagem  = "Olá! {$linha['nome_prof']}<br />
		Este e-mail solicitou recuperação de senha<br />
		<strong>Sua senha é</strong>: {$linha['matricula_prof']}<br /> <br />
		Obrigado!<br />
		Caso não seja o {$linha['nome_prof']} por favor, ignore este e-mail.<br/> 
		Esta é uma mensagem automática, por favor não responda!";
	                          
	 	
		$send_contact=mail($linha['email_prof'], $subject, $mensagem, $headers); 
		echo "foi! prof";
	
	}else{
	
		if($email == $linha['email_resp']){
		
				
			$headers = "MIME-Version: 1.1\r\n";
			$headers .= "From: Castelinho - <castelinhosistema@gmail.com>\r\n";
			$headers .= "Content-type: text/html; charset=iso-8859-1\r\n";
			$headers  .= "Content-type: text/html; charset=UTF-8\r\n";
			header('Content-type: text/html; charset=UTF-8\r\n');	
			
			$subject = "Recuperação de senha- CEC Castelinho";           
			$mensagem  = "Olá! {$linha['nome_resp']}<br />
			Este e-mail solicitou recuperação de senha<br />
			<strong>Sua senha é</strong>: {$linha['matricula_alu']}<br /> <br />
			Obrigado!<br />
			Caso não seja o {$linha['nome_resp']} por favor, ignore este e-mail.<br/> 
			Esta é uma mensagem automática, por favor não responda!";
		                          
		 	
			$send_contact=mail($linha['email_resp'], $subject, $mensagem, $headers);
		echo "foi email1";
		
		}else if($email == $linha['email_resp2']){
		
			$headers = "MIME-Version: 1.1\r\n";
			$headers .= "From: Castelinho - <castelinhosistema@gmail.com>\r\n";
			$headers .= "Content-type: text/html; charset=iso-8859-1\r\n";
			$headers  .= "Content-type: text/html; charset=UTF-8\r\n";
			header('Content-type: text/html; charset=UTF-8\r\n');	
			
			$subject = "Recuperação de senha- CEC Castelinho";           
			$mensagem  = "Olá! {$linha['nome_resp2']}<br />
			Este e-mail solicitou recuperação de senha<br />
			<strong>Sua senha é</strong>: {$linha['matricula_alu']}<br /> <br />
			Obrigado!<br />
			Caso não seja o {$linha['nome_resp2']} por favor, ignore este e-mail.<br/> 
			Esta é uma mensagem automática, por favor não responda!";
		                          
		 	
			$send_contact=mail($linha['email_resp2'], $subject, $mensagem, $headers);
		echo"foi email2";
		
		}else if($email == $linha['email_respf']){
		
			$headers = "MIME-Version: 1.1\r\n";
			$headers .= "From: Castelinho - <castelinhosistema@gmail.com>\r\n";
			$headers .= "Content-type: text/html; charset=iso-8859-1\r\n";
			$headers  .= "Content-type: text/html; charset=UTF-8\r\n";
			header('Content-type: text/html; charset=UTF-8\r\n');	
			
			$subject = "Recuperação de senha- CEC Castelinho";           
			$mensagem  = "Olá! {$linha['nome_respf']}<br />
			Este e-mail solicitou recuperação de senha<br />
			<strong>Sua senha é</strong>: {$linha['matricula_alu']}<br /> <br />
			Obrigado!<br />
			Caso não seja o {$linha['nome_respf']} por favor, ignore este e-mail.<br/> 
			Esta é uma mensagem automática, por favor não responda!";
		                          
		 	
			$send_contact=mail($linha['email_respf'], $subject, $mensagem, $headers);
		echo"foi emailf";
		
		}
	
	}
		
	// keeping response header to json    
	// echoing json result
	echo json_encode($response, JSON_UNESCAPED_UNICODE);
}

logout(); 
?>