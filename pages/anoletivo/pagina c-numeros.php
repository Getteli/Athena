<?php
  //fara a conexao com banco de dados
  include_once '../../dist/php/conexao.php';

  $busca = "SELECT mensagem_age FROM agenda";
  
  $total_reg = "2"; // número de registros por página

  //Se a página não for especificada a variável "pagina" tomará o valor 1, isso evita de exibir a página 0 de início:
  $pagina=$_GET['pagina'];
  if (!$pagina) {
  $pc = "1";
  } else {
  $pc = $pagina;
  }
  
  //Vamos determinar o valor inicial das buscas limitadas:
  $inicio = $pc - 1;
  $inicio = $inicio * $total_reg;
  
  //Vamos selecionar os dados e exibir a paginação:
  $limite = mysqli_query($con,"$busca LIMIT $inicio,$total_reg");
  $todos = mysqli_query($con,$busca);
 
  $tr = mysqli_num_rows($todos); // verifica o número total de registros
  $tp = $tr / $total_reg; // verifica o número total de páginas
 
  // vamos criar a visualização
  while ($dados = mysqli_fetch_array($limite)) {
  $nome = $dados["mensagem_age"];
  echo "Nome: $nome<br>";
  }
  
  // agora vamos criar os botões "Anterior e próximo"
  $anterior = $pc -1;
  $proximo = $pc +1;  
  
echo "  <a href=\"?pagina=$anterior \">ultima</a> &nbsp;";
  
 /*
    * O loop para exibir os valores à esquerda
    */
   for($i = $pc-$tr; $i <= $pc-1; $i++){
       if($i > 0)
        echo '<a href="?pagina='.$i.'"> '.$i.' </a>';
  }

  echo '<a href="?pagina='.$pc.'"><strong>'.$pc.'</strong></a>';

  for($i = $pc+1; $i < $pc+$tp; $i++){
       if($i <= $tp)
        echo '<a href="?pagina='.$i.'"> '.$i.' </a>';
  }

   /**
    * Depois o link da página atual
    */
   /**
    * O loop para exibir os valores à direita
    */

echo " | <a href=\"?pagina=$proximo \">proxima</a> | ";

?>