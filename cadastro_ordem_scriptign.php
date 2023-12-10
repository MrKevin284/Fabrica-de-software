<?php
include 'conexao.php';

$idcliente = $_POST["idcliente"];
$modelo = $_POST["modelo"];
$marca = $_POST["marca"];
$ano = $_POST["ano"];
$cor = $_POST["cor"];
$placa = $_POST["placa"];
$dtentrada = $_POST["dtentrada"];
$descricao = $_POST["descricao"];

$checkClienteQuery = "SELECT idcliente FROM clientes WHERE idcliente = '$idcliente'";
$result = $conn->query($checkClienteQuery);

if ($result->num_rows == 0) {
    echo '<script>alert("O cliente com ID ' . $idcliente . ' não existe."); window.location.href = "cadastraordem.php";</script>';
    exit();
}

$query = "INSERT INTO ordensservico (idcliente, modelo, marca, ano, cor, placa, dtentrada, descricao) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";

$stmt = $conn->prepare($query);
$stmt->bind_param("isssssss", $idcliente, $modelo, $marca, $ano, $cor, $placa, $dtentrada, $descricao);

try {
    $stmt->execute();

    echo '<script>alert("Ordem de serviço cadastrada com sucesso!"); window.location.href = "cadastraordem.php";</script>';
} catch (mysqli_sql_exception $e) {
    echo '<script>alert("Erro ao cadastrar no banco de dados: ' . $e->getMessage() . '"); window.location.href = "cadastraordem.php";</script>';
}
?>
