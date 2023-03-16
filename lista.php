<?php
 include "banco.php";
 $banco = new Banco();
 $pessoas = $banco->get_pessoa();
  if (isset($_GET["status"])){
    if($_GET["status"]){
      echo "Sucesso";
    }
    else{
      echo "ERRO";
    }
  } 
?>
<html>
    <head>
      <style>
        <?php include 'lista.css'; ?>
      </style>
    </head>
    <body>
        <table>
          <tr>
            <th>Nome</th>
            <th>Sobrenome</th>
            <th>Email</th>
            <th>Senha</th>
            <th>Sexo</th>
            <th>Data de nascimento</th>
            <th>Ação</th>
          </tr>
          <?php
            foreach($pessoas as $pessoa){
              echo "<tr>";
              echo "<td>" .$pessoa->get_nome(). "</td>";
              echo "<td>" .$pessoa->get_sobrenome(). "</td>";
              echo "<td>" .$pessoa->get_email(). "</td>";
              echo "<td>" .$pessoa->get_senha(). "</td>";
              echo "<td>" .$pessoa->get_sexo(). "</td>";
              echo "<td>" .$pessoa->get_nascimento(). "</td>";
              echo "<td>
                      <a href='editar.php?id=".$pessoa->get_codigo()."'>Editar</a>                
                      <a href='excluir.php?id=".$pessoa->get_codigo()."'>Excluir</a>
                    </td>";
              echo "</tr>";              
            }
          ?>          
        </table>
        <a href="index.php">Cadastrar</a>
    </body>
</html>
