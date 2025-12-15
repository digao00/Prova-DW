<?php
require_once 'conexao.class.php';

class Review {
    private $con;
    private $id;
    private $titulo;
    private $analise;
    private $nota;
    private $imagemPath;

    public function __construct() {
        $this->con = (new Conexao())->getConexao();
    }

    public function listar() {
        $sql = "SELECT * FROM reviews ORDER BY id DESC";
        $stmt = $this->con->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function inserir() {
        $sql = "INSERT INTO reviews (titulo, analise, nota, imagem_path) VALUES (:titulo, :analise, :nota, :imagemPath)";
        $stmt = $this->con->prepare($sql);
        $stmt->bindValue(':titulo', $this->titulo);
        $stmt->bindValue(':analise', $this->analise);
        $stmt->bindValue(':nota', $this->nota);
        $stmt->bindValue(':imagemPath', $this->imagemPath);
        return $stmt->execute();
    }

    public function excluir() {
        $sql = "DELETE FROM reviews WHERE id = :id";
        $stmt = $this->con->prepare($sql);
        $stmt->bindValue(':id', $this->id);
        return $stmt->execute();
    }
}
?>