<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de itens</title>
</head>
<body>
<div class="form">
    <h2>Formulario de itens</h2>

    <form action="cadastrar_item_scriptign.php" method="post">
      <label for="nome">Nome:</label>
      <input type="text" id="nome" name="nome" required><br>

      <label for="quantidade">Quantidade:</label>
      <input type="text" id="quantidade" name="quantidade" required><br>

      <label for="descricao">Descrição:</label><br>
      <textarea id="descricao" name="descricao" rows="4" cols="30"></textarea><br>

      <input type="submit" value="Cadastrar">
    </form>
             
         <a href="principal.php" onclick="return confirmBack()"><button>Voltar</button></a>

</div>
</body>
</html>