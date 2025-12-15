<?php
session_start();
require_once '../model/review.class.php';

if (!isset($_SESSION['usuario_id'])) { 
    header('Location: login.php');
    exit;
}

$review = new Review();
$listaReview = $review->listar();
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Lista de Games</title>
    <style>
        .card {
            border: 1px solid #ccc;
            padding: 10px;
            margin: 10px;
            width: 250px; display: inline-block;
            vertical-align: top;
        }
        img {
            width: 100%;
            height: 150px;
            object-fit: cover;
        }
    </style>
</head>
<body>
    <h1>Reviews de Jogos</h1>
    <a href="cadastro.php">NOVA REVIEW</a> | 
    <a href="../controller/loginController.php?logout=1">SAIR</a>
    <hr>
    <?php foreach($listaReview as $item): ?>
        <div class="card">
            <?php 
               $img = (!empty($item['imagem_path'])) ? "../img/".$item['imagem_path'] : "https://via.placeholder.com/150";
            ?>
            <img src="<?php echo $img; ?>">
            <h3><?php echo $item['titulo']; ?> (Nota: <?php echo $item['nota']; ?>)</h3>
            <p><?php echo $item['analise']; ?></p>
            <form action="../controller/reviewController.php" method="POST">
                <input type="hidden" name="acao" value="excluir">
                <input type="hidden" name="id" value="<?php echo $item['id']; ?>">
                <button type="submit">Excluir</button>
            </form>
        </div>
    <?php endforeach; ?>
</body>
</html>