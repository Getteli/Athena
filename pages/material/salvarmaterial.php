<?php
//fara a conexao com banco de dados
include_once '../conexao.php';

	// aqui vai receber tudo oq foi digitado e vai enviar para o banco
	$material = filter_input(INPUT_GET, "Material");
	$material2 = filter_input(INPUT_GET, "Material2");
	$material3 = filter_input(INPUT_GET, "Material3");
	$material4 = filter_input(INPUT_GET, "Material4");
	$material5 = filter_input(INPUT_GET, "Material5");
	$material6 = filter_input(INPUT_GET, "Material6");
	$material7 = filter_input(INPUT_GET, "Material7");
	$material8 = filter_input(INPUT_GET, "Material8");
	$material9 = filter_input(INPUT_GET, "Material9");
	$material10 = filter_input(INPUT_GET, "Material10");
	$material11 = filter_input(INPUT_GET, "Material11");
	$material12 = filter_input(INPUT_GET, "Material12");
	$material13 = filter_input(INPUT_GET, "Material13");
	$material14 = filter_input(INPUT_GET, "Material14");
	$material15 = filter_input(INPUT_GET, "Material15");
	$material16 = filter_input(INPUT_GET, "Material16");
	$material17 = filter_input(INPUT_GET, "Material17");
	$material18 = filter_input(INPUT_GET, "Material18");
	$material19 = filter_input(INPUT_GET, "Material19");
	$material20 = filter_input(INPUT_GET, "Material20");

	$turma = filter_input(INPUT_GET, "Turma");
// verificar a conexao, se tudo estiver certo, vai executar a linha e enviar o novo registro, se nao vai informar qual o erro
if ($con) {


           if(empty($material2)){

$query = mysqli_query($con, "INSERT INTO material(nome_material, turma)
                              SELECT '$material','$turma'");
		if ($query) {
					echo "<script type='text/javascript'>
					window.alert('Adicionado com sucesso!');
					window.location = 'paginanovomaterial.php';
					</script>";
		}else{
			die("Erro: ".mysqli_error($con));
		}

           }else

//------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------           
           
           if(empty($material3)){

$query = mysqli_query($con, "INSERT INTO material(nome_material, turma)
                              SELECT '$material','$turma'
                               UNION ALL
                              SELECT '$material2','$turma'");
		if ($query) {
								echo "<script type='text/javascript'>
					window.alert('Adicionado com sucesso!');
					window.location = 'paginanovomaterial.php';
					</script>";
		}else{
			die("Erro: ".mysqli_error($con));
		}

           }else
//------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------           

           if(empty($material4)){

$query = mysqli_query($con, "INSERT INTO material(nome_material, turma)
                              SELECT '$material','$turma'
                               UNION ALL
                              SELECT '$material2','$turma'
                               UNION ALL
                              SELECT '$material3','$turma'");
		if ($query) {
								echo "<script type='text/javascript'>
					window.alert('Adicionado com sucesso!');
					window.location = 'paginanovomaterial.php';
					</script>";
		}else{
			die("Erro: ".mysqli_error($con));
		}

           }else 
//------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------           

           if(empty($material5)){

$query = mysqli_query($con, "INSERT INTO material(nome_material, turma)
                              SELECT '$material','$turma'
                               UNION ALL
                              SELECT '$material2','$turma'
                               UNION ALL
                              SELECT '$material3','$turma'
                               UNION ALL
                              SELECT '$material4','$turma'");
		if ($query) {
					echo "<script type='text/javascript'>
					window.alert('Adicionado com sucesso!');
					window.location = 'paginanovomaterial.php';
					</script>";
		}else{
			die("Erro: ".mysqli_error($con));
		}

           }else 
 //------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------           
          
           if(empty($material6)){

$query = mysqli_query($con, "INSERT INTO material(nome_material, turma)
                              SELECT '$material','$turma'
                               UNION ALL
                              SELECT '$material2','$turma'
                               UNION ALL
                              SELECT '$material3','$turma'
                               UNION ALL
                              SELECT '$material4','$turma'
                               UNION ALL
                              SELECT '$material5','$turma'");
		if ($query) {
					echo "<script type='text/javascript'>
					window.alert('Adicionado com sucesso!');
					window.location = 'paginanovomaterial.php';
					</script>";
		}else{
			die("Erro: ".mysqli_error($con));
		}

           }else 
//------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------           
           if(empty($material7)){

$query = mysqli_query($con, "INSERT INTO material(nome_material, turma)
                              SELECT '$material','$turma'
                               UNION ALL
                              SELECT '$material2','$turma'
                               UNION ALL
                              SELECT '$material3','$turma'
                               UNION ALL
                              SELECT '$material4','$turma'
                               UNION ALL
                              SELECT '$material5','$turma'
                               UNION ALL
                              SELECT '$material6','$turma'");
		if ($query) {
					echo "<script type='text/javascript'>
					window.alert('Adicionado com sucesso!');
					window.location = 'paginanovomaterial.php';
					</script>";		}else{
			die("Erro: ".mysqli_error($con));
		}

           }else       
         
//------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------           
            if(empty($material8)){

$query = mysqli_query($con, "INSERT INTO material(nome_material, turma)
                              SELECT '$material','$turma'
                               UNION ALL
                              SELECT '$material2','$turma'
                               UNION ALL
                              SELECT '$material3','$turma'
                               UNION ALL
                              SELECT '$material4','$turma'
                               UNION ALL
                              SELECT '$material5','$turma'
                               UNION ALL
                              SELECT '$material6','$turma'
                               UNION ALL
                              SELECT '$material7','$turma'");
		if ($query) {
					echo "<script type='text/javascript'>
					window.alert('Adicionado com sucesso!');
					window.location = 'paginanovomaterial.php';
					</script>";		}else{
			die("Erro: ".mysqli_error($con));
		}

           }else 
//------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------           
           
           if(empty($material9)){

$query = mysqli_query($con, "INSERT INTO material(nome_material, turma)
                              SELECT '$material','$turma'
                               UNION ALL
                              SELECT '$material2','$turma'
                               UNION ALL
                              SELECT '$material3','$turma'
                               UNION ALL
                              SELECT '$material4','$turma'
                               UNION ALL
                              SELECT '$material5','$turma'
                               UNION ALL
                              SELECT '$material6','$turma'
                               UNION ALL
                              SELECT '$material7','$turma'
                               UNION ALL
                              SELECT '$material8','$turma'");
		if ($query) {
					echo "<script type='text/javascript'>
					window.alert('Adicionado com sucesso!');
					window.location = 'paginanovomaterial.php';
					</script>";		}else{
			die("Erro: ".mysqli_error($con));
		}

           }else
//------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------           
           
           if(empty($material10)){

$query = mysqli_query($con, "INSERT INTO material(nome_material, turma)
                              SELECT '$material','$turma'
                               UNION ALL
                              SELECT '$material2','$turma'
                               UNION ALL
                              SELECT '$material3','$turma'
                               UNION ALL
                              SELECT '$material4','$turma'
                               UNION ALL
                              SELECT '$material5','$turma'
                               UNION ALL
                              SELECT '$material6','$turma'
                               UNION ALL
                              SELECT '$material7','$turma'
                               UNION ALL
                              SELECT '$material8','$turma'
                               UNION ALL
                              SELECT '$material9','$turma'");
		if ($query) {
					echo "<script type='text/javascript'>
					window.alert('Adicionado com sucesso!');
					window.location = 'paginanovomaterial.php';
					</script>";		}else{
			die("Erro: ".mysqli_error($con));
		}

           }else    
//------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------           
           
           if(empty($material11)){

$query = mysqli_query($con, "INSERT INTO material(nome_material, turma)
                              SELECT '$material','$turma'
                               UNION ALL
                              SELECT '$material2','$turma'
                               UNION ALL
                              SELECT '$material3','$turma'
                               UNION ALL
                              SELECT '$material4','$turma'
                               UNION ALL
                              SELECT '$material5','$turma'
                               UNION ALL
                              SELECT '$material6','$turma'
                               UNION ALL
                              SELECT '$material7','$turma'
                               UNION ALL
                              SELECT '$material8','$turma'
                               UNION ALL
                              SELECT '$material9','$turma'
                               UNION ALL
                              SELECT '$material10','$turma'");
		if ($query) {
					echo "<script type='text/javascript'>
					window.alert('Adicionado com sucesso!');
					window.location = 'paginanovomaterial.php';
					</script>";
							}else{
			die("Erro: ".mysqli_error($con));
		}

           }else                             
//------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------           
           
           if(empty($material12)){

$query = mysqli_query($con, "INSERT INTO material(nome_material, turma)
                              SELECT '$material','$turma'
                               UNION ALL
                              SELECT '$material2','$turma'
                               UNION ALL
                              SELECT '$material3','$turma'
                               UNION ALL
                              SELECT '$material4','$turma'
                               UNION ALL
                              SELECT '$material5','$turma'
                               UNION ALL
                              SELECT '$material6','$turma'
                               UNION ALL
                              SELECT '$material7','$turma'
                               UNION ALL
                              SELECT '$material8','$turma'
                               UNION ALL
                              SELECT '$material9','$turma'
                               UNION ALL
                              SELECT '$material10','$turma'
                               UNION ALL
                              SELECT '$material11','$turma'");
		if ($query) {
					echo "<script type='text/javascript'>
					window.alert('Adicionado com sucesso!');
					window.location = 'paginanovomaterial.php';
					</script>";		}else{
			die("Erro: ".mysqli_error($con));
		}

           }else

//------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------           
           
           if(empty($material13)){

$query = mysqli_query($con, "INSERT INTO material(nome_material, turma)
                              SELECT '$material','$turma'
                               UNION ALL
                              SELECT '$material2','$turma'
                               UNION ALL
                              SELECT '$material3','$turma'
                               UNION ALL
                              SELECT '$material4','$turma'
                               UNION ALL
                              SELECT '$material5','$turma'
                               UNION ALL
                              SELECT '$material6','$turma'
                               UNION ALL
                              SELECT '$material7','$turma'
                               UNION ALL
                              SELECT '$material8','$turma'
                               UNION ALL
                              SELECT '$material9','$turma'
                               UNION ALL
                              SELECT '$material10','$turma'
                               UNION ALL
                              SELECT '$material11','$turma'
                               UNION ALL
                              SELECT '$material12','$turma'");
		if ($query) {
					echo "<script type='text/javascript'>
					window.alert('Adicionado com sucesso!');
					window.location = 'paginanovomaterial.php';
					</script>";		}else{
			die("Erro: ".mysqli_error($con));
		}

           }else

                                                  
//------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------           
           
           if(empty($material14)){

$query = mysqli_query($con, "INSERT INTO material(nome_material, turma)
                              SELECT '$material','$turma'
                               UNION ALL
                              SELECT '$material2','$turma'
                               UNION ALL
                              SELECT '$material3','$turma'
                               UNION ALL
                              SELECT '$material4','$turma'
                               UNION ALL
                              SELECT '$material5','$turma'
                               UNION ALL
                              SELECT '$material6','$turma'
                               UNION ALL
                              SELECT '$material7','$turma'
                               UNION ALL
                              SELECT '$material8','$turma'
                               UNION ALL
                              SELECT '$material9','$turma'
                               UNION ALL
                              SELECT '$material10','$turma'
                               UNION ALL
                              SELECT '$material11','$turma'
                               UNION ALL
                              SELECT '$material12','$turma'
                               UNION ALL
                              SELECT '$material13','$turma'");
		if ($query) {
					echo "<script type='text/javascript'>
					window.alert('Adicionado com sucesso!');
					window.location = 'paginanovomaterial.php';
					</script>";		}else{
			die("Erro: ".mysqli_error($con));
		}

           }else
//------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------           
           
           if(empty($material15)){

$query = mysqli_query($con, "INSERT INTO material(nome_material, turma)
                              SELECT '$material','$turma'
                               UNION ALL
                              SELECT '$material2','$turma'
                               UNION ALL
                              SELECT '$material3','$turma'
                               UNION ALL
                              SELECT '$material4','$turma'
                               UNION ALL
                              SELECT '$material5','$turma'
                               UNION ALL
                              SELECT '$material6','$turma'
                               UNION ALL
                              SELECT '$material7','$turma'
                               UNION ALL
                              SELECT '$material8','$turma'
                               UNION ALL
                              SELECT '$material9','$turma'
                               UNION ALL
                              SELECT '$material10','$turma'
                               UNION ALL
                              SELECT '$material11','$turma'
                               UNION ALL
                              SELECT '$material12','$turma'
                               UNION ALL
                              SELECT '$material13','$turma'
                               UNION ALL
                              SELECT '$material14','$turma'");
		if ($query) {
					echo "<script type='text/javascript'>
					window.alert('Adicionado com sucesso!');
					window.location = 'paginanovomaterial.php';
					</script>";		}else{
			die("Erro: ".mysqli_error($con));
		}

           }else
//------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------           
           
           if(empty($material16)){

$query = mysqli_query($con, "INSERT INTO material(nome_material, turma)
                              SELECT '$material','$turma'
                               UNION ALL
                              SELECT '$material2','$turma'
                               UNION ALL
                              SELECT '$material3','$turma'
                               UNION ALL
                              SELECT '$material4','$turma'
                               UNION ALL
                              SELECT '$material5','$turma'
                               UNION ALL
                              SELECT '$material6','$turma'
                               UNION ALL
                              SELECT '$material7','$turma'
                               UNION ALL
                              SELECT '$material8','$turma'
                               UNION ALL
                              SELECT '$material9','$turma'
                               UNION ALL
                              SELECT '$material10','$turma'
                               UNION ALL
                              SELECT '$material11','$turma'
                               UNION ALL
                              SELECT '$material12','$turma'
                               UNION ALL
                              SELECT '$material13','$turma'
                               UNION ALL
                              SELECT '$material14','$turma'
                               UNION ALL
                              SELECT '$material15','$turma'");
		if ($query) {
					echo "<script type='text/javascript'>
					window.alert('Adicionado com sucesso!');
					window.location = 'paginanovomaterial.php';
					</script>";		}else{
			die("Erro: ".mysqli_error($con));
		}

           }else
//------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------           
           
           if(empty($material17)){

$query = mysqli_query($con, "INSERT INTO material(nome_material, turma)
                              SELECT '$material','$turma'
                               UNION ALL
                              SELECT '$material2','$turma'
                               UNION ALL
                              SELECT '$material3','$turma'
                               UNION ALL
                              SELECT '$material4','$turma'
                               UNION ALL
                              SELECT '$material5','$turma'
                               UNION ALL
                              SELECT '$material6','$turma'
                               UNION ALL
                              SELECT '$material7','$turma'
                               UNION ALL
                              SELECT '$material8','$turma'
                               UNION ALL
                              SELECT '$material9','$turma'
                               UNION ALL
                              SELECT '$material10','$turma'
                               UNION ALL
                              SELECT '$material11','$turma'
                               UNION ALL
                              SELECT '$material12','$turma'
                               UNION ALL
                              SELECT '$material13','$turma'
                               UNION ALL
                              SELECT '$material14','$turma'
                               UNION ALL
                              SELECT '$material15','$turma'
                               UNION ALL
                              SELECT '$material16','$turma'");
		if ($query) {
					echo "<script type='text/javascript'>
					window.alert('Adicionado com sucesso!');
					window.location = 'paginanovomaterial.php';
					</script>";		}else{
			die("Erro: ".mysqli_error($con));
		}

           }else
//------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------           
           
           if(empty($material18)){

$query = mysqli_query($con, "INSERT INTO material(nome_material, turma)
                              SELECT '$material','$turma'
                               UNION ALL
                              SELECT '$material2','$turma'
                               UNION ALL
                              SELECT '$material3','$turma'
                               UNION ALL
                              SELECT '$material4','$turma'
                               UNION ALL
                              SELECT '$material5','$turma'
                               UNION ALL
                              SELECT '$material6','$turma'
                               UNION ALL
                              SELECT '$material7','$turma'
                               UNION ALL
                              SELECT '$material8','$turma'
                               UNION ALL
                              SELECT '$material9','$turma'
                               UNION ALL
                              SELECT '$material10','$turma'
                               UNION ALL
                              SELECT '$material11','$turma'
                               UNION ALL
                              SELECT '$material12','$turma'
                               UNION ALL
                              SELECT '$material13','$turma'
                               UNION ALL
                              SELECT '$material14','$turma'
                               UNION ALL
                              SELECT '$material15','$turma'
                               UNION ALL
                              SELECT '$material16','$turma'
                               UNION ALL
                              SELECT '$material17','$turma'");
		if ($query) {
					echo "<script type='text/javascript'>
					window.alert('Adicionado com sucesso!');
					window.location = 'paginanovomaterial.php';
					</script>";		}else{
			die("Erro: ".mysqli_error($con));
		}

           }else
//------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------           
           
           if(empty($material19)){

$query = mysqli_query($con, "INSERT INTO material(nome_material, turma)
                              SELECT '$material','$turma'
                               UNION ALL
                              SELECT '$material2','$turma'
                               UNION ALL
                              SELECT '$material3','$turma'
                               UNION ALL
                              SELECT '$material4','$turma'
                               UNION ALL
                              SELECT '$material5','$turma'
                               UNION ALL
                              SELECT '$material6','$turma'
                               UNION ALL
                              SELECT '$material7','$turma'
                               UNION ALL
                              SELECT '$material8','$turma'
                               UNION ALL
                              SELECT '$material9','$turma'
                               UNION ALL
                              SELECT '$material10','$turma'
                               UNION ALL
                              SELECT '$material11','$turma'
                               UNION ALL
                              SELECT '$material12','$turma'
                               UNION ALL
                              SELECT '$material13','$turma'
                               UNION ALL
                              SELECT '$material14','$turma'
                               UNION ALL
                              SELECT '$material15','$turma'
                               UNION ALL
                              SELECT '$material16','$turma'
                               UNION ALL
                              SELECT '$material17','$turma'
                               UNION ALL
                              SELECT '$material18','$turma'");
		if ($query) {
					echo "<script type='text/javascript'>
					window.alert('Adicionado com sucesso!');
					window.location = 'paginanovomaterial.php';
					</script>";		}else{
			die("Erro: ".mysqli_error($con));
		}

           }else
                                                    
//------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------           
           
           if(empty($material20)){

$query = mysqli_query($con, "INSERT INTO material(nome_material, turma)
                              SELECT '$material','$turma'
                               UNION ALL
                              SELECT '$material2','$turma'
                               UNION ALL
                              SELECT '$material3','$turma'
                               UNION ALL
                              SELECT '$material4','$turma'
                               UNION ALL
                              SELECT '$material5','$turma'
                               UNION ALL
                              SELECT '$material6','$turma'
                               UNION ALL
                              SELECT '$material7','$turma'
                               UNION ALL
                              SELECT '$material8','$turma'
                               UNION ALL
                              SELECT '$material9','$turma'
                               UNION ALL
                              SELECT '$material10','$turma'
                               UNION ALL
                              SELECT '$material11','$turma'
                               UNION ALL
                              SELECT '$material12','$turma'
                               UNION ALL
                              SELECT '$material13','$turma'
                               UNION ALL
                              SELECT '$material14','$turma'
                               UNION ALL
                              SELECT '$material15','$turma'
                               UNION ALL
                              SELECT '$material16','$turma'
                               UNION ALL
                              SELECT '$material17','$turma'
                               UNION ALL
                              SELECT '$material18','$turma'
                               UNION ALL
                              SELECT '$material19','$turma'");
		if ($query) {
					echo "<script type='text/javascript'>
					window.alert('Adicionado com sucesso!');
					window.location = 'paginanovomaterial.php';
					</script>";		}else{
			die("Erro: ".mysqli_error($con));
		}

           }
               
}           

?>