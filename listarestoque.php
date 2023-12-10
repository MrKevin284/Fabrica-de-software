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
            <th>Ações</th>
        </tr>

        <?php
        // Substitua 'sua_conexao' pelo seu objeto de conexão real $conn
        $query = "SELECT * FROM estoque";
        $resultado = mysqli_query($conn, $query);

        if ($resultado->num_rows > 0) :
            while ($row = mysqli_fetch_assoc($resultado)) :
        ?>
                <tr>
                    <td><?= $row["idproduto"] ?></td>
                    <td><?= $row["nomeproduto"] ?></td>
                    <td><?= $row["quantidade"] ?></td>
                    <td><?= $row["descricao"] ?></td>
                    <td>
                        <a href="editar_produto.php?id=<?= $row["idproduto"] ?>"><button>Editar</button></a>
                        <form style="display:inline-block;" action="deletar_produto.php" method="post" onsubmit="return confirm('Tem certeza que deseja excluir este produto?');">
                            <input type="hidden" name="idproduto" value="<?= $row["idproduto"] ?>">
                            <input type="submit" value="Deletar">
                        </form>
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
