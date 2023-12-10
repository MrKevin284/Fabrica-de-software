<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Cliente</title>
</head>
<body>

<div class="form">
    <h2>Formulario de Cliente</h2>

    <form action="cadastrar_cliente_scriptign.php" method="post">
      <label for="nome">Nome:</label>
      <input type="text" id="nome" name="nome" required><br>

      <label for="telefone">Telefone:</label>
      <input type="text" id="telefone" name="telefone" required><br>

      <label for="cpf">CPF:</label>
      <input type="text" id="cpf" name="cpf" required><br>

      <input type="submit" value="Cadastrar">
    </form>
             
         <a href="principal.php" onclick="return confirmBack()"><button>Voltar</button></a>

</div>  
</body>
</html>
