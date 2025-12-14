<?php
require_once 'conexao.class.php';

class Review {
    private $con;

    public function __construct() {
        $this->con = (new Conexao())->getConexao();
    }

    public function listar() {
        $sql = "SELECT * FROM reviews ORDER BY id DESC";
        $stmt = $this->con->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function inserir($titulo, $analise, $nota, $imagemPath) {
        $sql = "INSERT INTO reviews (titulo, analise, nota, imagem_path) VALUES (:titulo, :analise, :nota, :imagemPath)";
        $stmt = $this->con->prepare($sql);
        $stmt->bindValue(':titulo', $titulo);
        $stmt->bindValue(':analise', $analise);
        $stmt->bindValue(':nota', $nota);
        $stmt->bindValue(':imagemPath', $imagemPath);
        return $stmt->execute();
    }

    public function excluir($id) {
        $sql = "DELETE FROM reviews WHERE id = :id";
        $stmt = $this->con->prepare($sql);
        $stmt->bindValue(':id', $id);
        return $stmt->execute();
    }
}
?>