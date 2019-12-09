<?php
   //Incluir a classe excelwriter
include_once '../conexao.php';   
include_once 'excelwriter.inc.php';
 

 $matricula = $_GET['Matricula'];
   //Você pode colocar aqui o nome do arquivo que você deseja salvar.
    $excel=new ExcelWriter("excel3.xls");
 
    if($excel==false){
        echo $excel->error;
   }
 
   //Escreve o nome dos campos de uma tabela
   $myArr=array('NOME','Turma','Data De Nascimento');
   $excel->writeLine($myArr);
  if ($con) {
   $consulta = "select * from aluno WHERE matricula_alu ='$matricula' order by id";
   $resultado = mysql_query($con, $consulta);
   if($resultado==true){
      while($linha = mysql_fetch_array($resultado)){
         $myArr=array($linha['nome_alu'],$linha['turma_fk'],$linha['data_nasc']);
         $excel->writeLine($myArr);
      }
   }

       $excel->close();
    echo "O arquivo foi salvo com sucesso. <a href="excel3.xls">excel.xls</a>";
 
    }else{
      die("Erro: ". mysqli_error($con));
  }

 ?>