<?php 
include "pessoa.php";
class Banco{
  private $host = "127.0.0.1";
  private $user = "root";
  private $password = "";
  private $banco = "pessoa";
  private $porta = "3307";
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

  public function excluir($id){
  echo $id;
    // $stmt = $this->con->prepare("DELETE from pessoa where codigo = ?");
  // $stmt->bind_param("s", $id);
  // $stmt->execute();
  }
}
?>