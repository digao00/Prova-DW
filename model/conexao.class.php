<?php
class Conexao {
    private $con;
    private $driver = "pgsql";
    private $host = "localhost";
    private $dbname = "review"; 
    private $user = "postgres"; 
    private $pass = "poastgres";

    public function getConexao() {
        if ($this->con == null) {
            try {
                $dsn = "$this->driver:host=$this->host;dbname=$this->dbname";
                $this->con = new PDO($dsn, $this->user, $this->pass);
                $this->con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            } catch (PDOException $e) {
                die('Erro de Conexão: ' . $e->getMessage());
            }
        }
        return $this->con;
    }
}
?>