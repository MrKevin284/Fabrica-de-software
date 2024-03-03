<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulário de Veículo</title>
</head>
<body>
    <h1>Formulário de Veículo</h1>
    <form action="cadastrar_veiculo_script.php" method="POST">
        <label for="modelo">Modelo:</label>
        <input type="text" id="modelo" name="modelo" required><br>

        <label for="marca">Marca:</label>
        <input type="text" id="marca" name="marca" require><br>

        <label for="ano">Ano:</label>
        <input type="number" id="ano" name="ano" pattern="\d{4}" required><br>

        <label for="cor">Cor:</label>
        <input type="text" id="cor" name="cor" required><br>

        <label for="placa">Placa:</label>
        <input type="text" id="placa" name="placa" minlength="7" maxlength="7"><br>

        <input type="submit" value="Enviar">
    </form>
    <div>
        <a href="principal.php" onclick="return confirmBack()"><button>Voltar</button></a>
    </div>
</body>
</html>
