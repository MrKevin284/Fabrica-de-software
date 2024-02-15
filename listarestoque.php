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
            <th>ID</th>
            <th>Nome do Produto</th>
            <th>Quantidade</th>
            <th>Descrição</th>
            <th>Preço</th>
            <th>Ações</th>
        </tr>

        <?php
        $query = "SELECT * FROM Estoque";
        $resultado = mysqli_query($conn, $query);

        if (mysqli_num_rows($resultado) > 0) :
            while ($row = mysqli_fetch_assoc($resultado)) :
        ?>
                <tr>
                    <td><?= $row["id_produto"] ?></td>
                    <td><?= $row["nome_produto"] ?></td>
                    <td><?= $row["quantidade"] ?></td>
                    <td><?= $row["descricao"] ?></td>
                    <td><?= $row["preco"] ?></td>
                    <td>
                        <a href="editarestoque.php?id=<?= $row["id_produto"] ?>"><button>Editar</button></a>
                    </td>
                </tr>
            <?php endwhile; ?>
        <?php else : ?>
            <tr>
                <td colspan='6'>Nenhum produto encontrado no estoque.</td>
            </tr>
        <?php endif; ?>
    </table>

    <div>
        <a href="principal.php"><button>Voltar</button></a>
    </div>
</body>

</html>
