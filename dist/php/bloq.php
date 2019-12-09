<?php
session_start(); // previamente chamada 

// //fara a conexao com banco de dados
include_once 'conexao.php';

if(isset($_SESSION['login'])){

    $query = mysqli_query($con, "UPDATE login_sistema SET situacao='blq' WHERE email ='".$_SESSION['login']."'");		

    // se você possui algum cookie relacionado com o login deve ser removido
    header("location: ../../pages/lockscreen.php");
}

?>