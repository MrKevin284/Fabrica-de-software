<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<header>
<h1>Cadastrar</h1>
</header>
<body>
  <div class="form_box">

  <form action="cadastroAdm.php" method="post">
    <span>Nome:</span>
    <input type="text" name="nome_cadastro" maxlength="25" placeholder="Nome" required><br>

    <span>Senha</span>
    <input type="password" name="senha_cadastro" minlength="8" maxlength="15" placeholder="Senha" required><br>

    <button type="submit">Cadastrar</button>

  </form>

  </div>
</body>
<footer>

</footer>
</html>