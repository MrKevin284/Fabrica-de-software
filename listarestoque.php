<?php
include('conexao.php');
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Produtos em Estoque</title>
</head>

<body>
    <div class="estoque">
        <h1>Lista de Produtos em Estoque</h1>
    </div>

    <table border="1">
        <tr>
            <th>ID Produto</th>
            <th>Nome do Produto</th>
            <th>Quantidade</th>
            <th>Descrição</th>
            <th>Preço</th>
            <th>Ações</th>

        </tr>

        <?php
        $query = "SELECT * FROM Estoque";
        $resultado = mysqli_query($conn, $query);

        if ($resultado->num_rows > 0) :
            while ($row = mysqli_fetch_assoc($resultado)) :
        ?>
                <tr>
                    <td><?= $row["id_produto"] ?></td>
                    <td><?= $row["nome_produto"] ?></td>
                    <td><?= $row["quantidade"] ?></td>
                    <td><?= $row["descricao"] ?></td>
                    <td><?= $row["preco"] ?></td>
                    <td>
                    <a href="editar_produto.php?id=<?= $row["id_produto"] ?>"><button>Editar</button></a>
                    <a href="deletaritem.php?idproduto=<?= $row["id_produto"] ?>" onclick="return confirm('Tem certeza que deseja excluir este produto?');"><button>Deletar</button></a>
                    </td>

                </tr>
            <?php endwhile; ?>
        <?php else : ?>
            <tr>
                <td colspan='5'>Nenhum produto encontrado no estoque.</td>
            </tr>
        <?php endif; ?>
    </table>

    <div>
        <a href="principal.php" onclick="return confirmBack()"><button>Voltar</button></a>
        <script src="funcoes.js"></script>
    </div>
</body>
</html>
