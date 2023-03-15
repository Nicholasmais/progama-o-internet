<?php 
require_once "banco.php";

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

$banco = new Banco();

$res = $banco->add_pessoa($pessoa);

if(array_values($res)[1]){
  header("location: index.php?status=1");
}
else{
  header("location: index.php?status=0");
}
?>