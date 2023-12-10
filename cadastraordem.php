<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulário de Ordem de Serviço</title>
</head>
<body>
    <h2>Formulário de Ordem de Serviço</h2>

    <form method="post" action="cadastro_ordem_scriptign.php">
        <label>ID Cliente:</label>
        <input type="number" name="idcliente" required><br>

        <label>Modelo:</label>
        <input type="text" name="modelo" required><br>

        <label>Marca:</label>
        <input type="text" name="marca" required><br>

        <label>Ano:</label>
        <input type="number" name="ano" required><br>

        <label>Cor:</label>
        <input type="text" name="cor" required><br>

        <label>Placa:</label>
        <input type="text" name="placa" required><br>

        <label>Data de Entrada:</label>
        <input type="date" name="dtentrada" required><br>

        <label>Descrição:</label><br>
        <textarea name="descricao" rows="4" cols="30" required></textarea><br>

        <input type="submit" value="Cadastrar">
    </form>

    <a href="principal.php" onclick="return confirmBack()"><button>Voltar</button></a>
    
</body>
</html>
