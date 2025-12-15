<?php
require_once 'conexao.class.php';

class Usuario {
    private $con;
    
    public function __construct() {
        $this->con = (new Conexao())->getConexao();
    }

    public function verificarLogin($login, $senha) {
        $senhaHash = md5($senha); 
        $sql = "SELECT * FROM usuarios WHERE login = :login AND senha = :senha";
        $stmt = $this->con->prepare($sql);
        $stmt->bindValue(':login', $login);
        $stmt->bindValue(':senha', $senhaHash);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}
?>