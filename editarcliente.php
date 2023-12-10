<?php
include('conexao.php');

if (isset($_GET['id'])) {
    $idcliente = $_GET['id'];

    $query = "SELECT * FROM clientes WHERE idcliente = $idcliente";
    $resultado = mysqli_query($conn, $query);

    if ($resultado->num_rows > 0) {
        $cliente = mysqli_fetch_assoc($resultado);
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Cliente</title>
</head>

<body>
    <div class="clientes">
        <h1>Editar Cliente</h1>
    </div>

    <form action="atualizarcliente.php" method="post">
        <input type="hidden" name="idcliente" value="<?= $cliente["idcliente"] ?>">

        <label for="nome">Nome:</label>
        <input type="text" name="nome" value="<?= $cliente["nome"] ?>" required> <br>

        <label for="telefone">Telefone:</label>
        <input type="text" name="telefone" value="<?= $cliente["telefone"] ?>" required> <br>

        <label for="cpf">CPF:</label>
        <input type="text" name="cpf" value="<?= $cliente["cpf"] ?>" required> <br>

        <input type="submit" value="Atualizar">
    </form>

    <div>
        <a href="lista_clientes.php"><button>Voltar para Lista de Clientes</button></a>
    </div>
</body>

</html>
<?php
    } else {
        echo "Cliente não encontrado.";
    }
} else {
    echo "ID do cliente não fornecido.";
}
?>
