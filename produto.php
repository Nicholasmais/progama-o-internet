<?php 

class Produto implements JsonSerializable{
  private $type;
  private $nome;
  private $descricao;
  private $quantidade;
  private $preco;
  private $estoque;
  private $imagem;

  public function __construct($type,$nome, $descricao, $quantidade, $preco, $estoque, $imagem) {
    $this->type = $type;
    $this->nome = $nome;
    $this->descricao = $descricao;
    $this->quantidade = $quantidade;
    $this->preco = $preco;
    $this->estoque = $estoque;
    $this->imagem = $imagem;
  }

  // getters
  public function getType() {
    return $this->type;
  }

  public function getNome() {
    return $this->nome;
  }

  public function getDescricao() {
    return $this->descricao;
  }

  public function getQuantidade() {
    return $this->quantidade;
  }

  public function getPreco() {
    return $this->preco;
  }

  public function getEstoque() {
    return $this->estoque;
  }

  public function getImagem() {
    return $this->imagem;
  }

  // setters
  public function setType($type) {
    $this->type = $type;
  }

  public function setNome($nome) {
    $this->nome = $nome;
  }

  public function setDescricao($descricao) {
    $this->descricao = $descricao;
  }

  public function setQuantidade($quantidade) {
    $this->quantidade = $quantidade;
  }

  public function setPreco($preco) {
    $this->preco = $preco;
  }

  public function setEstoque($estoque) {
    $this->estoque = $estoque;
  }

  public function setImagem($imagem) {
    $this->imagem = $imagem;
  }

  public function jsonSerialize() {
    return [
      'type' => $this->type,
      'nome' => $this->nome,
      'descricao' => $this->descricao,
      'quantidade' => $this->quantidade,
      'preco' => $this->preco,
      'estoque' => $this->estoque,
      'imagem' => $this->imagem
    ];
  }
}
?>