<?php
session_start();
require_once '../model/usuario.class.php';

if (isset($_GET['logout'])) {
    session_destroy();
    header('Location: ../layout/login.php');
    exit;
}

if (isset($_POST['usuario']) && isset($_POST['senha'])) {
    $usuario = new Usuario();
    $dados = $usuario->verificarLogin($_POST['usuario'], $_POST['senha']);

    if ($dados) {
        $_SESSION['usuario_id'] = $dados['id'];
        header('Location: ../layout/listagem.php');
    }
    else {
        echo "<script>alert('Login invalido'); window.location='../layout/login.php';</script>";
    }
}
else {
    if(isset( $_SESSION['login'])){
        header('Location: ../layout/listagem.php');
    }
    else {
        header('Location: ../layout/login.php');
    }
}
?>