<?php 
if (isset($_GET["status"])){
    $res = isset($_GET["status"]);
    if ($res){
      echo "Sucesso";
    }
    else{
      echo "Erro";
    }
  }
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
  <form action="cadastrar.php" method="post">
    <div class="container">
      <div class="header">
        <h2>Cadastrar</h2>
        <p>É gratuito e sempre será.</p>
      </div>
      <hr>
      <div class="nome">
        <label for="input-nome">Nome</label>
        <input id="input-nome" type="text" name="nome">
      </div>
      <div class="sobrenome">
        <label for="input-sobrenome">Sobrenome</label>
        <input id="input-sobrenome" type="text" name="sobrenome">
      </div>
      <div class="email">
        <label for="input-email">Email</label>
        <input id="input-email" type="text" name="email">
      </div>
      <div class="senha">
        <label for="input-senha">Senha</label>
        <input id="input-senha" type="password" name="senha">
      </div>
      <div class="sexo">
        <label for="input-sexo">Nome</label>
        <select id="select-sexo" name="select">
          <option value="M">Masculino</option>
          <option value="F">Feminino</option>
        </select>
      </div>
      <div class="nascimento">
        <label for="input-nascimento">Data nascimento</label>
        <input id="input-nascimento" type="date" name="nascimento">
      </div>
      <button>Cadastrar</button>
    </div>
  </form>
  <a href="lista.php">Ver cadastros</a>
</body>
</html>