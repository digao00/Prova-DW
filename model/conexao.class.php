<?php
class Conexao {
    private $conexao;
    private const dsn = "pgsql:dbname=review;host=localhost";
    private const user = "postgres";
    private const pass = "postgres";

    public function getConexao() {
        try {
            $this->conexao = new PDO(Conexao::dsn, Conexao::user, Conexao::pass);
        }
        catch (Exception $e) {
            die('Erro de Conexão: ' . $e->getMessage());
        }
        return $this->conexao;
    }

    function fecharConexao(){
        if (isset( $this->conexao)) {
            $this->conexao = null;
        }
    }
}

?>