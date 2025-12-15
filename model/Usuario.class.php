<?php
require_once 'conexao.class.php';

class Usuario {
    private $con;
    private $login;
    private $senha;

    public function __get($name){
        return $this->$name;
    }

    public function __set($name, $value){
        $this->$name = $value;
    }

    public function verificarLogin() {
        $senhaHash = md5($this->senha); 
        $sql = "SELECT * FROM usuarios WHERE login = :login AND senha = :senha";
        $stmt = $this->con->prepare($sql);
        $stmt->bindValue(':login', $this->login);
        $stmt->bindValue(':senha', $senhaHash);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}
?>