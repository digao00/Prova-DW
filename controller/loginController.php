<?php
session_start();
require_once '../model/Usuario.class.php';

// Logout
if (isset($_GET['logout'])) {
    session_destroy();
    if (isset($_COOKIE['usuario_logado'])) {
        setcookie('usuario_logado', '', time() - 3600, '/');
    }
    header('Location: ../layout/login.php');
    exit;
}

// Login
if (isset($_POST['usuario']) && isset($_POST['senha'])) {
    $usuarioModel = new Usuario();
    $dados = $usuarioModel->verificarLogin($_POST['usuario'], $_POST['senha']);

    if ($dados) {
        $_SESSION['usuario_id'] = $dados['id'];
        if (isset($_POST['manter_conectado'])) {
            setcookie('usuario_logado', $dados['id'], time() + (86400 * 7), "/");
        }
        header('Location: ../layout/listagem.php');
    } else {
        echo "<script>alert('Login invalido'); window.location='../layout/login.php';</script>";
    }
} else {
    header('Location: ../layout/login.php');
}
?>