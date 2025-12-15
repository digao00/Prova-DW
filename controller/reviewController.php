<?php
session_start();
require_once '../model/review.class.php';

if (!isset($_SESSION['usuario_id'])) {
    header('Location: ../layout/login.php');
    exit;
}

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['acao'])) {
    $review = new Review();

    if ($_POST['acao'] == 'cadastrar') {
        $imagemNome = 'sem_imagem.jpg';

        if (isset($_FILES['imagem']) && $_FILES['imagem']['error'] == 0) {
            $pastaDestino = '../img/';
            $novoNome = time() . '_' . $_FILES['imagem']['name'];
            
            if (move_uploaded_file($_FILES['imagem']['tmp_name'], $pastaDestino . $novoNome)) {
                $imagemNome = $novoNome;
            }
        }
        $review->titulo = $_POST['titulo']; 
        $review->analise = $_POST['analise']; 
        $review->nota = $_POST['nota']; 
        $review->imagemPath = $imagemNome; 
        $review->inserir();
        
        header('Location: ../layout/listagem.php');
    }

    if ($_POST['acao'] == 'excluir') {
        $review->id = $_POST['id'];
        $review->excluir();
        header('Location: ../layout/listagem.php');
    }
}
?>