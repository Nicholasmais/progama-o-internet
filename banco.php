<?php 
include "pessoa.php";
include "produto.php";
class Banco{
  private $host = "127.0.0.1";
  private $user = "root";
  private $password = "648297315Nf!";
  private $banco = "pessoa";
  private $porta = "3306";
  private $con;

  public function __construct(){    
    $this->con = new mysqli(
      $this->host,
      $this->user,
      $this->password,
      $this->banco,
      $this->porta
    );
    if ( $this->con->connect_error) {
      die("Falha ao conectar: " .  $this->con->connect_error);
    }      
  }

  public function add_produto($produto){
    try{
      $tipo = $produto->getType();
      $nome = $produto->getNome();
      $descricao = $produto->getDescricao();
      $qtd = $produto->getQuantidade();
      $preco = $produto->getPreco();
      $estoque = $produto->getEstoque();
      $img = $produto->getImagem();
            
      $stmt = $this->con->prepare("INSERT INTO produto (type, nome, descricao, quantidade, preco, estoque, imagem) VALUES (?, ?, ?, ?, ?, ?, ?)");
      $stmt->bind_param(
        "ssssdis",
        $tipo,
        $nome,
        $descricao,
        $qtd,
        $preco,
        $estoque,
        $img
      );
    
      $stmt->execute();
      $resposta = array();
      $resposta['status'] = 'sucesso';
      $resposta['mensagem'] = 'Produto cadastrado com sucesso';
      header('Content-Type: application/json');
      echo json_encode($resposta);      
    }
    catch (Exception $e){
      $resposta = array();
      $resposta['status'] = 'erro';
      $resposta['mensagem'] = $e->getMessage();
      header('Content-Type: application/json');
      echo json_encode($resposta); 
    }
  }

  public function add_pessoa($pes){
    try{
      $nome = $pes->get_nome();
      $sobrenome = $pes->get_sobrenome();
      $email = $pes->get_email();
      $senha = $pes->get_senha();
      $sexo = $pes->get_sexo();
      $nascimento = $pes->get_nascimento();
      $stmt = $this->con->prepare("insert into pessoa(nome, sobrenome, email, senha, sexo, data_nascimento) values(?,?,?,?,?,?);");
      $stmt->bind_param(
        "ssssss",
        $nome,
        $sobrenome,
        $email,
        $senha,
        $sexo,
        $nascimento
      );
      return ["sucesso"=>$stmt->execute(), "status"=>1];
    }
    catch (Exception $e){
      return ["erro"=>$e, "status"=>0];
    }
  }

  public function update_pessoa($code, $pes){
    try{
      $nome = $pes->get_nome();
      $sobrenome = $pes->get_sobrenome();
      $email = $pes->get_email();
      $senha = $pes->get_senha();
      $sexo = $pes->get_sexo();
      $nascimento = $pes->get_nascimento();
      $stmt = $this->con->prepare("update pessoa set nome=?, sobrenome=?, email=?, senha=?, sexo=?, data_nascimento=? where codigo = ?;");
      $stmt->bind_param(
        "sssssss",
        $nome,
        $sobrenome,
        $email,
        $senha,
        $sexo,
        $nascimento,
        $code
      );
      return ["sucesso"=>$stmt->execute(), "status"=>1];
    }
    catch (Exception $e){
      return ["erro"=>$e, "status"=>0];
    }
  }

  public function get_products_by_id($id){   
    $stmt = $this->con->prepare("Select * from produto where id = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();        
    $linha = mysqli_fetch_object($result);    
    $produto = new Produto(
      $linha->type,
      $linha->nome,
      $linha->descricao,
      $linha->quantidade,
      $linha->preco,
      $linha->estoque,
      $linha->imagem
    );
    return $produto;
  }

  public function get_all_products(){
    $stmt = $this->con->prepare("SELECT * FROM produto");
    $stmt->execute();
    $result = $stmt->get_result();        
    $produtos = array();

    while ($linha = mysqli_fetch_object($result)) {
      $produto = new Produto(
        $linha->type,
        $linha->nome,
        $linha->descricao,
        $linha->quantidade,
        $linha->preco,
        $linha->estoque,
        $linha->imagem
      );
      $produtos[] = $produto;
    }
    return $produtos;
}

  public function get_pessoa(){   
    $stmt = $this->con->prepare("Select * from pessoa");
    $stmt->execute();
    $result = $stmt->get_result();
    $pessoa_array = array();
    $i=0;
    while ($linha = mysqli_fetch_object($result)) {
        $pessoa = new Pessoa();
        $pessoa->set_codigo($linha->codigo);
        $pessoa->set_nome($linha->nome);
        $pessoa->set_sobrenome($linha->sobrenome);
        $pessoa->set_email($linha->email);
        $pessoa->set_senha($linha->senha);
        $pessoa->set_sexo($linha->sexo);
        $pessoa->set_nascimento($linha->data_nascimento);
        $pessoa_array[$i] = $pessoa;
        $i++;
    }
    return $pessoa_array;
  }

  public function get_pessoa_by_id($id){   
    $stmt = $this->con->prepare("Select * from pessoa where codigo = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();        
    $linha = mysqli_fetch_object($result);    
    $pessoa = new Pessoa();
    $pessoa->set_codigo($linha->codigo);
    $pessoa->set_nome($linha->nome);
    $pessoa->set_sobrenome($linha->sobrenome);
    $pessoa->set_email($linha->email);
    $pessoa->set_senha($linha->senha);
    $pessoa->set_sexo($linha->sexo);
    $pessoa->set_nascimento($linha->data_nascimento);
    return $pessoa;       
  }

  public function excluir($id){
    $stmt = $this->con->prepare("DELETE from pessoa where codigo = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
  }
}
?>