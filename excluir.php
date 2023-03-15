<?php 
include "banco.php";
if (isset($_GET["id"])){
  $id = $_GET["id"];
  $banco = new Banco();
  $banco->excluir($id);  
  header("location: lista.php");
}
?>