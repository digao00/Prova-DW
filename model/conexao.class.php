<?php

class Conexao{
    private const dsn = "pgsql:dbname=review;host=localhost";
    private const dbuser = "postgres";
    private const dbpass = "postgres";
    private $con;

    function getConexao(){
        return $this->con;
    }

    function conectar(){
        try{
            $this->con = new PDO(Conexao::dsn, Conexao::dbuser, Conexao::dbpass);
        }
        catch(Exception $e){
            die('Erro ao conectar:'.$e->getMessage());
        }
        return $this->con;
    }

    function fecharConexao(){
        if ( isset( $this->conexao) ){
            $this->conexao = null;
        }
    }

}


