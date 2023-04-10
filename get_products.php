<?php
include 'banco.php';

$banco = new Banco();

if (isset($_GET['id'])) {
  // Obtém o valor do parâmetro "id"
  $id = $_GET['id'];

  // Executa uma consulta SQL para obter os dados com o ID correspondente
  $products = $banco->get_products_by_id($id);
  $product_array = array(
    'type' => $products->getType(),
    'nome' => $products->getNome(),
    'descricao' => $products->getDescricao(),
    'quantidade' => $products->getQuantidade(),
    'preco' => $products->getPreco(),
    'estoque' => $products->getEstoque(),
    'imagem' => $products->getImagem()
  );
}
else {
  // Se o parâmetro "id" não foi definido, executa uma consulta SQL para obter todos os products
  $products = $banco->get_all_products();
  $product_array = array();
  foreach ($products as $product) {
    $product_object = new Produto(
      $product->getType(),
      $product->getNome(),
      $product->getDescricao(),
      $product->getQuantidade(),
      $product->getPreco(),
      $product->getEstoque(),
      $product->getImagem()
    );
    $product_array[] = $product_object; // adiciona o objeto como elemento do array
  }
}
// Retorna os dados como JSON
echo json_encode($product_array);

?>