<?php
include "banco.php";
$banco = new Banco();

$codigo = $_POST['codigo'];
$nome = $_POST['nome'];
$sobrenome = $_POST['sobrenome'];
$email = $_POST['email'];
$senha = $_POST['senha'];
$sexo = $_POST['select'];
$nascimento = $_POST['nascimento'];

$pessoa = new Pessoa();
$pessoa->set_nome($nome);
$pessoa->set_sobrenome($sobrenome);
$pessoa->set_email($email);
$pessoa->set_senha($senha);
$pessoa->set_sexo($sexo);
$pessoa->set_nascimento($nascimento);

$res = $banco->update_pessoa($codigo, $pessoa);

if(array_values($res)[1]){
  header("location: lista.php?status=1");
}
else{
  header("location: lista.php?status=0");
}
?>