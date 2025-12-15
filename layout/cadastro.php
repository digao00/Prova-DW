<?php
session_start();
if (!isset($_SESSION['usuario_id'])) {
    header('Location: login.php');
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head><meta charset="UTF-8"><title>Cadastro</title></head>
<body>
    <h1>Nova Review</h1>
    <form action="../controller/reviewController.php" method="POST" enctype="multipart/form-data">
        <input type="hidden" name="acao" value="cadastrar">
        Título: <input type="text" name="titulo" required><br><br>
        Nota: <input type="number" name="nota" min="0" max="10" required><br><br>
        Análise: <textarea name="analise" required></textarea><br><br>
        Imagem: <input type="file" name="imagem" required><br><br>
        <button type="submit">Salvar</button>
        <a href="listagem.php">Voltar</a>
    </form>
</body>
</html>