<?php
  include "banco.php";
  include "produto.php";
  $banco = new Banco();
  $json = $_POST['json'];
  $obj = json_decode($json);
  if(json_last_error() !== JSON_ERROR_NONE) {
    echo "Erro ao fazer o parse do JSON: " . json_last_error_msg();
  }
  foreach($obj as $prod){
    $produto = new Produto(
      $prod->type,
      $prod->nome,
      $prod->desc,
      $prod->qtd,
      $prod->preco,
      $prod->estoque,
      urldecode($prod->img)
    );
    $banco->add_produto($produto);
  }
?>