<?php 
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

  public function add_pessoa(Pessoa $pes){
    $stmt = $this->con->prepare("insert into pessoa(nome, sobrenome, email, senha, sexo, data_nascimento) values(?,?,?,?,?,?);");
    $stmt->bind_param(
      "ssssss",
      $pes->get_nome(),
      $pes->get_sobrenome(),
      $pes->get_email(),
      $pes->get_senha(),
      $pes->get_sexo(),
      $pes->get_nascimento()
    );
    return $stmt->execute();
  }
}
?>