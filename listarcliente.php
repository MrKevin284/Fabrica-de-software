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
            <th>Endereço</th>
            <th>Nº</th>
            <th>Ações</th>
        </tr>

        <?php
        $query = "SELECT * FROM Cliente";
        $resultado = mysqli_query($conn, $query);

        if (mysqli_num_rows($resultado) > 0) :
            while ($row = mysqli_fetch_assoc($resultado)) :
        ?>
                <tr>
                    <td><?= $row["id_cliente"] ?></td>
                    <td><?= $row["nome"] ?></td>
                    <td><?= $row["telefone"] ?></td>
                    <td><?= $row["cpf"] ?></td>
                    <td><?= $row["endereco"] ?></td>
                    <td><?= $row["numero"] ?></td>
                    <td>
                        <a href="editarcliente.php?id=<?= $row["id_cliente"] ?>"><button>Editar</button></a>
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
    <button><a href="cadastracliente.php">Cadastrar cliente</button><br>
        <a href="principal.php" onclick="return confirmBack()"><button>Voltar</button></a>
    </div>
</body>
</html>
