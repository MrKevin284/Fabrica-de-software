<?php
include 'conexao.php';

$modelo = $_POST["modelo"];
$marca = $_POST["marca"];
$ano = $_POST["ano"];
$cor = $_POST["cor"];
$placa = $_POST["placa"];

$query = "INSERT INTO Veiculo (modelo, marca, ano, cor, placa) VALUES (?, ?, ?, ?, ?)";

$stmt = $conn->prepare($query);
$stmt->bind_param("ssiss", $modelo, $marca, $ano, $cor, $placa);

try {
    $stmt->execute();
    echo '<script>alert("Carro cadastrado com sucesso!"); window.location.href = "cadastraveiculo.php";</script>';
} catch (mysqli_sql_exception $e) {
    echo '<script>alert("Erro ao cadastrar no banco de dados: ' . $e->getMessage() . '"); window.location.href = "cadastraveiculo.php";</script>';
}
?>
