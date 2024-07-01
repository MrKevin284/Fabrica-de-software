<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
<div class="form_login">
    <form action="autenticar.php" method="post">
        <h1>Login</h1>
        <span>Login:</span>
        <input type="text" name="nome_login" id="nome_login" required ><br>
        <span>Senha:</span>
        <input type="password" name="senha_login" id="senha_login" required >
        <div class="senha">
        <button type="submit">Entrar</button>
    </div>
    <div class="link_cadastro">
        Não tem conta? <a href="cadastrarAdm.php">Cadastrar-se</a>
    </div>
</body>
</html>
