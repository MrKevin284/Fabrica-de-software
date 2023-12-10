<?php
include('conexao.php');

if (isset($_GET['id'])) {
    $idproduto = $_GET['id'];

    $query = "SELECT * FROM estoque WHERE idproduto = $idproduto";
    $resultado = mysqli_query($conn, $query);

    if ($resultado->num_rows > 0) {
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

    <form action="atualizarproduto.php" method="post">
        <input type="hidden" name="idproduto" value="<?= $produto["idproduto"] ?>">

        <label for="nomeproduto">Nome do Produto:</label>
        <input type="text" name="nomeproduto" value="<?= $produto["nomeproduto"] ?>" required> <br>

        <label for="quantidade">Quantidade:</label>
        <input type="text" name="quantidade" value="<?= $produto["quantidade"] ?>" required> <br>

        <label for="descricao">Descrição:</label>
        <textarea name="descricao" required><?= $produto["descricao"] ?></textarea> <br>

        <input type="submit" value="Atualizar">
    </form>

    <div>
        <a href="lista_estoque.php"><button>Voltar para Lista de Produtos no Estoque</button></a>
    </div>
</body>

</html>
<?php
    } else {
        echo "Produto não encontrado no estoque.";
    }
} else {
    echo "ID do produto não fornecido.";
}
?>
