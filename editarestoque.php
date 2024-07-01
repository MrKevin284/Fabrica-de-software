<?php
include('conexao.php');

if (isset($_GET['id'])) {
    $id_produto = $_GET['id'];

    $query = "SELECT * FROM Estoque WHERE id_produto = $id_produto";
    $resultado = mysqli_query($conn, $query);

    if ($resultado) {
        if(mysqli_num_rows($resultado) > 0) {
            $produto = mysqli_fetch_assoc($resultado);
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Produto no Estoque</title>
</head>

<body>
    <div class="estoque">
        <h1>Editar Produto no Estoque</h1>
    </div>
    
    <form action="atualizarestoque.php" method="post">
        <input type="hidden" name="id_produto" value="<?= $produto["id_produto"] ?>">
        
        <label for="nome_produto">Nome do Produto:</label>
        <input type="text" name="nome_produto" value="<?= $produto["nome_produto"] ?>" required><br>
    
        <label for="quantidade">Quantidade:</label>
        <input type="text" name="quantidade" value="<?= $produto["quantidade"] ?>" required><br>
    
        <label for="descricao">Descrição:</label><br>
        <textarea name="descricao" rows="4" required><?= $produto["descricao"] ?></textarea><br>

        <label for="preco">Preço:</label>
        <input type="number" name="preco" value="<?= $produto["preco"] ?>" step="0.01"><br>

        <input type="submit" value="Atualizar">
    </form>

    <div>
        <a href="listarEstoque.php"><button>Voltar para Lista de Produtos no Estoque</button></a>
    </div>
</body>

</html>

<?php
        } else {
            echo "Produto não encontrado no estoque.";
        }
    } else {
        echo "Erro na consulta: " . mysqli_error($conn);
    }
} else {
    echo "ID do produto não fornecido.";
}
?>
