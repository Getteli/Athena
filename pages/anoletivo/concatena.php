<?php

$nome = filter_input(INPUT_POST, "nome") . " " .  filter_input(INPUT_POST, "sobrenome"); 
$email = filter_input(INPUT_POST, "email");
$telefone = filter_input(INPUT_POST, "telefone");
$assunto = filter_input(INPUT_POST, "assunto");
$unidade = filter_input(INPUT_POST, "unidade");


echo $nome;

?>