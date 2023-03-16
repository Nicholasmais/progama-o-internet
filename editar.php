<?php 
  include "banco.php";
  $id = $_GET["id"];
  $banco = new Banco();    
  $pessoa = $banco->get_pessoa_by_id($id);  
?>
<form action="update.php" method="post">
    <input type="hidden" name="codigo" value="<?php echo $pessoa->get_codigo()?>">
    <div class="container">
      <div class="header">
        <h2>Editar Usuário <?php echo $pessoa->get_codigo()?></h2>
        <p>É gratuito e sempre será.</p>
      </div>
      <hr>
      <div class="nome">
        <label for="input-nome">Nome</label>
        <input id="input-nome" type="text" name="nome" value="<?php echo $pessoa->get_nome()?>">
      </div>
      <div class="sobrenome">
        <label for="input-sobrenome">Sobrenome</label>
        <input id="input-sobrenome" type="text" name="sobrenome" value="<?php echo $pessoa->get_sobrenome()?>">
      </div>
      <div class="email">
        <label for="input-email">Email</label>
        <input id="input-email" type="text" name="email" value="<?php echo $pessoa->get_email()?>">
      </div>
      <div class="senha">
        <label for="input-senha">Senha</label>
        <input id="input-senha" type="password" name="senha" value="<?php echo $pessoa->get_senha()?>">
      </div>
      <div class="sexo">
        <label for="input-sexo">Nome</label>
        <select id="select-sexo" name="select" value="<?php echo $pessoa->get_sexo()?>">
          <option value="M">Masculino</option>
          <option value="F">Feminino</option>
        </select>
      </div>
      <div class="nascimento">
        <label for="input-nascimento">Data nascimento</label>
        <input id="input-nascimento" type="date" name="nascimento" value="<?php echo $pessoa->get_nascimento()?>">
      </div>
      <a href="lista.php">Voltar</a>
      <button>Salvar</button>
    </div>
  </form>