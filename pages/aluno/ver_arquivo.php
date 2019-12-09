<?php
//fara a conexao com banco de dados
include_once '../../dist/php/conexao.php';
 
//recuperar o codigo do arquivo atraves do metodo GET
$matricula = $_GET['Matricula'];
$id = $_GET['id'];

$consulta = "SELECT Arquivo,Tipo,NmArquivo FROM arquivos WHERE matricula_alu='$matricula' AND id='$id'";
$resultado = mysqli_query($con,$consulta);
 
$dados = mysqli_fetch_array($resultado,MYSQLI_ASSOC);

$tipo = $dados['Tipo'];
$Arquivo = $dados['Arquivo']; 
$NmArquivo= $dados['NmArquivo']; 

//EXIBE ARQUIVO  - se o navegador nao oferecer suporte para a extensao sera solicita dowload do arquivo
header("Content-type: ".$tipo."");
header("Content-Disposition: filename=".$NmArquivo."");
echo $Arquivo ;
 
?>