<?php 
        include_once './conexao.php';

        header("Content-Type: application/json; charset=UTF-8",true);
        
        mysqli_set_charset($dbcon, "utf8");        

        $email = $_GET["email"];

        $query = "SELECT * FROM aluno WHERE email_resp='$email' or email_resp2='$email'";

	$result = mysqli_query($dbcon,$query);

	while ($row = mysqli_fetch_assoc($result)) {
			
		$array[] = $row;

	}
	echo json_encode($array,JSON_UNESCAPED_UNICODE);
  
 ?>