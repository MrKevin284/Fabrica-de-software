<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastrar Produto no Estoque</title>
</head>

<body>
    <div class="estoque">
        <h1>Cadastrar Produto no Estoque</h1>
    </div>

    <form action="cadastrar_estoque_scriptign.php" method="POST">
        <label for="nome_produto">Nome do Produto:</label>
        <input type="text" id="nome_produto" name="nome_produto" required><br>

        <label for="quantidade">Quantidade:</label>
        <input type="number" id="quantidade" name="quantidade" required><br>

        <label for="descricao">Descrição:</label><br>
        <textarea id="descricao" name="descricao" rows="4" required></textarea><br>

        <label for="preco">Preço:</label>
        <input type="number" id="preco" name="preco" step="0.01" required><br>

        <input type="submit" value="Cadastrar">
    </form>

    <div>
        <a href="principal.php"><button>Voltar</button></a>
    </div>
</body>

</html>
