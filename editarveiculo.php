<?php
include('conexao.php');

if (isset($_GET['id_veiculo'])) {
    $id_veiculo = $_GET['id_veiculo'];

    $query = "SELECT * FROM Veiculo WHERE id_veiculo = $id_veiculo";
    $resultado = mysqli_query($conn, $query);

    if ($resultado) {
        if(mysqli_num_rows($resultado) > 0) {
            $veiculo = mysqli_fetch_assoc($resultado);
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Veiculos</title>
</head>

<body>
    <div class="Veiculos">
        <h1>Editar Cliente</h1>
    </div>

    <form action="atualizarveiculo.php" method="post">
        <input type="hidden" name="id_veiculo" value="<?= $veiculo["id_veiculo"] ?>">

        <label for="nome">Nome:</label>
        <input type="text" name="modelo" value="<?= $veiculo["modelo"] ?>" required> <br>

        <label for="ano">Ano:</label>
        <input type="text" name="ano" value="<?= $veiculo["ano"] ?>" required> <br>

        <label for="cor">Cor:</label>
        <input type="text" name="cor" value="<?= $veiculo["cor"] ?>" required> <br>

        <label for="placa">Placa:</label>
        <input type="text" name="placa" value="<?= $veiculo["placa"] ?>"> <br>

        <label for="marca">Marca:</label>
        <input type="text" name="marca" value="<?= $veiculo["marca"] ?>"> <br>

        <input type="submit" value="Atualizar">
    </form>

    <div>
        <a href="listarveiculo.php"><button>Voltar para Lista de Veiculos</button></a>
    </div>
</body>

</html>

<?php
        } else {
            echo "Veiculo não encontrado.";
        }
    } else {
        echo "Erro na consulta: " . mysqli_error($conn);
    }
} else {
    echo "ID do veiculo não fornecido.";
}
?>
