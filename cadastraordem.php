<!DOCTYPE html>
<html lang="pt-BR">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Formulário Ordem de Serviço</title>
    </head>
    <body>
        <h2>Cadastro de Ordem de Serviço</h2>
        <form action="cadastro_ordem_scriptign.php" method="POST">
        <label for="id_cliente">ID Cliente:</label>
        <input type="number" id="id_cliente" name="id_cliente" required><br>
        
        <label for="id_adm">ID Administrador:</label>
        <input type="number" id="id_adm" name="id_adm"><br>
        
        <label for="id_veiculo">ID Veículo:</label>
        <input type="number" id="id_veiculo" name="id_veiculo" required><br>

        <label for="descricao">Descrição:</label><br>
        <textarea id="descricao" name="descricao" rows="4" required></textarea><br>

        <label for="data_entrada">Data de Entrada:</label>
        <input type="date" id="data_entrada" name="data_entrada" required><br>

        <label for="preco">Preço:</label>
        <input type="number" id="preco" name="preco" step="0.01"><br>

        <input type="submit" value="Enviar">
    </form>
    <div>
        <a href="principal.php" onclick="return confirmBack()"><button>Voltar</button></a>
    </div>
</body>
</html>
