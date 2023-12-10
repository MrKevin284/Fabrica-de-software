<?php
include('conexao.php');
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Clientes</title>
</head>

<body>
    <div class="clientes">
        <h1>Lista de Clientes</h1>
    </div>

    <table border="1">
        <tr>
            <th>ID</th>
            <th>Nome</th>
            <th>Telefone</th>
            <th>CPF</th>
            <th>Ações</th>
        </tr>

        <?php
        $query = "SELECT * FROM clientes";
        $resultado = mysqli_query($conn, $query);

        if (mysqli_num_rows($resultado) > 0) :
            while ($row = mysqli_fetch_assoc($resultado)) :
        ?>
                <tr>
                    <td><?= $row["idcliente"] ?></td>
                    <td><?= $row["nome"] ?></td>
                    <td><?= $row["telefone"] ?></td>
                    <td><?= $row["cpf"] ?></td>
                    <td>
                        <a href="editarcliente.php?id=<?= $row["idcliente"] ?>"><button>Editar</button></a>
                    </td>
                </tr>
            <?php endwhile; ?>
        <?php else : ?>
            <tr>
                <td colspan='5'>Nenhum cliente encontrado.</td>
            </tr>
        <?php endif; ?>
    </table>

    <div>
        <a href="principal.php" onclick="return confirmBack()"><button>Voltar</button></a>
        <script src="funcoes.js"></script>
    </div>
</body>

</html>
