<?php
include('conexao.php');

if (isset($_GET['id'])) {
    $idordem = $_GET['id'];

    $query = "SELECT * FROM ordensservico WHERE idordem = $idordem";
    $resultado = mysqli_query($conn, $query);

    if ($resultado->num_rows > 0) {
        $ordem = mysqli_fetch_assoc($resultado);
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Ordem de Serviço</title>
</head>

<body>
    <div class="ordens-servico">
        <h1>Editar Ordem de Serviço</h1>
    </div>

    <form action="atulizarordem.php" method="post">
        <input type="hidden" name="idordem" value="<?= $ordem["idordem"] ?>">

        <label for="idcliente">ID Cliente:</label>
        <input type="text" name="idcliente" value="<?= $ordem["idcliente"] ?>" required> <br>

        <label for="modelo">Modelo:</label>
        <input type="text" name="modelo" value="<?= $ordem["modelo"] ?>" required> <br>

        <label for="marca">Marca:</label>
        <input type="text" name="marca" value="<?= $ordem["marca"] ?>" required> <br>

        <label for="ano">Ano:</label>
        <input type="text" name="ano" value="<?= $ordem["ano"] ?>" required> <br>

        <label for="cor">Cor:</label>
        <input type="text" name="cor" value="<?= $ordem["cor"] ?>" required> <br>

        <label for="placa">Placa:</label>
        <input type="text" name="placa" value="<?= $ordem["placa"] ?>" required> <br>

        <label for="dtentrada">Data de Entrada:</label>
        <input type="date" name="dtentrada" value="<?= $ordem["dtentrada"] ?>" required> <br>

        <label>Custo:</label>
        <input type="text" name="custo" step="0.01" value="<?= $ordem["custo"]?>" required><br>

        <label for="descricao">Descrição:</label><br>
        <textarea name="descricao" rows="4" cols="30" required><?= $ordem["descricao"] ?></textarea> <br>

        <label for="status">Status:</label>
        <select name="status">
            <option value="concluido" <?= ($ordem["status"] == "concluido") ? "selected" : "" ?>>Concluído</option>
            <option value="pendente" <?= ($ordem["status"] == "pendente") ? "selected" : "" ?>>Pendente</option>
        </select> <br>

        <input type="submit" value="Atualizar">
    </form>

    <div>
        <a href="listarordem.php"><button>Voltar para Lista de Ordens de Serviço</button></a>
    </div>
</body>

</html>
<?php
    } else {
        echo "Ordem de serviço não encontrada.";
    }
} else {
    echo "ID da ordem de serviço não fornecido.";
}
?>
