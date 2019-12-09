<?php

include_once 'conexao.php';

	$query_c = "SELECT COUNT(*) AS total FROM agenda WHERE visu='0' AND remedio1='1'";
	$result_c = mysqli_query($con,$query_c);
	$count = mysqli_fetch_assoc($result_c);

	if($count['total'] == "0") {
	
	}else{
	echo $count['total'];
	}
		
?>