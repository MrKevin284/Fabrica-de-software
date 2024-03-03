<?php
include('conexao.php');
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Ordens de Serviço</title>
</head>

<body>
    <div class="ordens-servico">
        <h1>Lista de Ordens de Serviço</h1>
    </div>

    <table border="1">
        <tr>
            <th>ID</th>
            <th>ID Cliente</th>
            <th>ID Administrador</th>
            <th>ID Veículo</th>
            <th>Descrição</th>
            <th>Data de Entrada</th>
            <th>Preço</th>
            <th>Status</th>
            <th>Ações</th>
        </tr>

        <?php

        $query = "SELECT * FROM Ordem_servico";
        $resultado = mysqli_query($conn, $query);

        if (mysqli_num_rows($resultado) > 0) :
            while ($row = mysqli_fetch_assoc($resultado)) :
        ?>
                <tr>
                    <td><?= $row["id_ordem_servico"] ?></td>
                    <td><?= $row["id_cliente"] ?></td>
                    <td><?= $row["id_adm"] ?></td>
                    <td><?= $row["id_veiculo"] ?></td>
                    <td><?= $row["descricao"] ?></td>
                    <td><?= $row["data_entrada"] ?></td>
                    <td><?= $row["preco"] ?></td>
                    <td><?= $row["status"] ?></td>
                    <td>
                        <a href="editarordem.php?id=<?= $row["id_ordem_servico"] ?>"><button>Editar</button></a>
                    </td>
                </tr>
            <?php endwhile; ?>
        <?php else : ?>
            <tr>
                <td colspan='10'>Nenhuma ordem de serviço encontrada.</td>
            </tr>
        <?php endif; ?>
    </table>

    <div>
    <button><a href="cadastraordem.php">Cadastrar ordem de serviço</button><br>
        <a href="principal.php" onclick="return confirmBack()"><button>Voltar</button></a>
    </div>
</body>

</html>
