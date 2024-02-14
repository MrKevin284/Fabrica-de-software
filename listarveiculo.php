<?php
include('conexao.php');
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Veículos</title>
</head>

<body>
    <div class="veiculos">
        <h1>Lista de Veículos</h1>
    </div>

    <table border="1">
        <tr>
            <th>ID</th>
            <th>Modelo</th>
            <th>Marca</th>
            <th>Ano</th>
            <th>Cor</th>
            <th>Placa</th>
            <th>Ações</th>
        </tr>

        <?php
        
        $query = "SELECT * FROM Veiculo";
        $resultado = mysqli_query($conn, $query);

        if ($resultado->num_rows > 0) :
            while ($row = mysqli_fetch_assoc($resultado)) :
        ?>
                <tr>
                    <td><?= $row["id_veiculo"] ?></td>
                    <td><?= $row["modelo"] ?></td>
                    <td><?= $row["marca"] ?></td>
                    <td><?= $row["ano"] ?></td>
                    <td><?= $row["cor"] ?></td>
                    <td><?= $row["placa"] ?></td>
                    <td>
                        <a href="atualizarveiculo.php"><button>Editar</button></a>
                    </td>
                </tr>
            <?php endwhile; ?>
        <?php else : ?>
            <tr>
                <td colspan='6'>Nenhum veículo encontrado.</td>
            </tr>
        <?php endif; ?>
    </table>

    <div>
        <a href="principal.php" onclick="return confirmBack()"><button>Voltar</button></a>
    </div>
</body>

</html>
