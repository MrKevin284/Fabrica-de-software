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
            <th>Modelo</th>
            <th>Marca</th>
            <th>Ano</th>
            <th>Cor</th>
            <th>Placa</th>
            <th>Data de Entrada</th>
            <th>Custo</th>
            <th>Descrição</th>
            <th>Status</th>
            <th>Ações</th>
        </tr>

        <?php

        $query = "SELECT * FROM ordensservico";
        $resultado = mysqli_query($conn, $query);

        if ($resultado->num_rows > 0) :
            while ($row = mysqli_fetch_assoc($resultado)) :
        ?>
                <tr>
                    <td><?= $row["idordem"] ?></td>
                    <td><?= $row["idcliente"] ?></td>
                    <td><?= $row["modelo"] ?></td>
                    <td><?= $row["marca"] ?></td>
                    <td><?= $row["ano"] ?></td>
                    <td><?= $row["cor"] ?></td>
                    <td><?= $row["placa"] ?></td>
                    <td><?= $row["dtentrada"] ?></td>
                    <td><?= $row["custo"] ?></td>
                    <td><?= $row["descricao"] ?></td>
                    <td><?= $row["status"] ?></td>
                    <td>
                        <a href="editarordem.php?id=<?= $row["idordem"] ?>"><button>Editar</button></a>
                    </td>
                </tr>
            <?php endwhile; ?>
        <?php else : ?>
            <tr>
                <td colspan='12'>Nenhuma ordem de serviço encontrada.</td>
            </tr>
        <?php endif; ?>
    </table>

    <div>
        <a href="principal.php" onclick="return confirmBack()"><button>Voltar</button></a>
        <div class="links">
        <button><a href="cadastraordem.php">Cadastrar ordem de serviço</button><br>
        </div>
    </div>
</body>

</html>
