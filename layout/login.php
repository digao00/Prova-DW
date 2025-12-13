<!DOCTYPE html>
<html lang="pt-br">
<head><meta charset="UTF-8"><title>Login</title></head>
<body>
    <h1>Login</h1>
    <form action="../controlador/login.ctrl.php" method="POST">
        Usuário: <input type="text" name="usuario" required><br><br>
        Senha: <input type="password" name="senha" required><br><br>
        <input type="checkbox" name="manter_conectado" value="1"> Manter logado<br><br>
        <button type="submit">Entrar</button>
    </form>
</body>
</html>