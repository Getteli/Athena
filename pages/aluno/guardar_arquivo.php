<?php 
//fara a conexao com banco de dados
include_once '../conexao.php';
 
//recupera os dados enviados atraves do formulário
//NOME TEMPORÁRIO
$file_tmp = $_FILES["file"]["tmp_name"];
 //NOME DO ARQUIVO NO COMPUTADOR
$file_name = $_FILES["file"]["name"];
//TAMANHO DO ARQUIVO
$file_size = $_FILES["file"]["size"];
//MIME DO ARQUIVO
$file_type = $_FILES["file"]["type"];
 
 
//lemos o  conteudo do arquivo usando afunção do PHP  file_get_contents
$binario = file_get_contents($file_tmp);
// evitamos erro de sintaxe do MySQL
$binario = mysqli_real_escape_string($con,$binario);
 
//montamos o SQL para envio dos dados
$sql = "INSERT INTO arquivos(id, rg, NmArquivo , Arquivo , Tipo , Tamanho , DtHrEnvio )
VALUES ('NULL', '$rg_resp ', '$file_name', '$binario', '$file_type', '$file_size',CURRENT_TIMESTAMP)";
//executamos a instução SQL
mysqli_query($con,"$sql") or die (mysql_error());

?>