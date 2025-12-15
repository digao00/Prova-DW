<?php
class Conexao {
    private $conexao;
    private const dsn = "pgsql:dbname=review;host=localhost";
    private const user = "postgres";
    private const pass = 003512;

    public function getConexao() {
        try {
            $this->conexao = new PDO(Conexao::dsn, Conexao::user, Conexao::pass);
            return $this->conexao;
        }
        catch (Exception $e) {
            die('Erro de Conexão: ' . $e->getMessage());
        }
    }

    function fecharConexao(){
        if (isset($this->conexao)) {
            $this->conexao = null;
        }
    }
}

?>