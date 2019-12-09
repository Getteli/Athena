<?php 
include_once '../conexao.php';
$matricula = $_GET['Matricula'];

        $querynm = "SELECT nome_alu FROM aluno WHERE matricula_alu ='$matricula'"; 
        
        $queryms = "SELECT titulo_agen, mensagem_age FROM agenda WHERE matricula_alu_agen ='$matricula'";
        
        $querynt = "SELECT nota, materia_not, epoca FROM nota WHERE matricula_alu_nota ='$matricula'";

$resultadonm = mysqli_query($con,$querynm);
$resultadoms = mysqli_query($con,$queryms);

$dados2 = mysqli_fetch_array($resultadoms);

$contar = mysqli_num_rows($resultadoms);
 
for($i=0;$i<1;$i++){   
$html[$i] = "";
    $html[$i] .= "<table>";
    $html[$i] .= "<tr>";
    $html[$i] .= "<td><b>Nome</b></td>";
    $html[$i] .= "<td><b>Titulo</b></td>";
    $html[$i] .= "<td><b>mensagem</b></td>";
    $html[$i] .= "</tr>";
    $html[$i] .= "</table>";
}
 
$i = 1;
while($ret = mysqli_fetch_array($resultadoms )){
 $nom= $resultadonm ['nome_alu '];
 $titulo = $ret['titulo_agen'];
  $mensagem = $ret['mensagem_age'];
    $html[$i] .= "<table>";
    $html[$i] .= "<tr>";
    $html[$i] .= "<td>$nom</td>";
    $html[$i] .= "<td>$mensagem </td>";
    $html[$i] .= "</tr>";
    $html[$i] .= "</table>";
    $i++;
}
 
$arquivo = 'relatorio.xls';
header ("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
header ("Last-Modified: " . gmdate("D,d M YH:i:s") . " GMT");
header ("Cache-Control: no-cache, must-revalidate");
header ("Pragma: no-cache");
header ("Content-type: application/x-msexcel");
header ("Content-Disposition: attachment; filename={$arquivo}" );
header ("Content-Description: PHP Generated Data" );
 
for($i=0;$i<=$contar;$i++){  
    echo $html[$i];
}
?>

