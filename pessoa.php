<?php 
class Pessoa{
  private $codigo;
  private $nome;
  private $sobrenome;
  private $email;
  private $senha;
  private $sexo;
  private $nascimento;

  public function get_codigo(){
    return $this->codigo;    
  }

  public function set_codigo($codigo){
    $this->codigo = $codigo;    
  }

  public function get_nome(){
    return $this->nome;    
  }

  public function set_nome($nome){
    $this->nome = $nome;    
  }

  public function get_sobrenome(){
    return $this->sobrenome;    
  }

  public function set_sobrenome($sobrenome){
    $this->sobrenome = $sobrenome;    
  }

  public function get_email(){
    return $this->email;    
  }

  public function set_email($email){
    $this->email = $email;    
  }

  public function get_senha(){
    return $this->senha;    
  }

  public function set_senha($senha){
    $this->senha = $senha;    
  }

  public function get_sexo(){
    return $this->sexo;    
  }

  public function set_sexo($sexo){
    $this->sexo = $sexo;    
  }

  public function get_nascimento(){
    return $this->nascimento;    
  }

  public function set_nascimento($nascimento){
    $this->nascimento = $nascimento;    
  }

  public function __toString(){
    return "{Nome: " . $this->nome . ", Sobrenome: " . $this->sobrenome . ", Email: " . $this->email . ", Senha: " . $this->senha . ", Sexo: " . $this->sexo . ", Nascimento: " . $this->nascimento . "}";
  }
}

?>