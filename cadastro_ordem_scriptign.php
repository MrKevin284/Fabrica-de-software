<?php

//refazer isso do zero
include 'conexao.php';

$id_ordem_servico = $_POST["id_ordem_servico"];
$nome = $_POST["nome"];
$modelo = $_POST["modelo"];
$marca = $_POST["marca"];
$ano = $_POST["ano"];
$cor = $_POST["cor"];
$placa = $_POST["placa"];
$data_entrada = $_POST["data_entrada"];
$custo = $_POST["custo"];
$descricao = $_POST["descricao"];

$checkClienteQuery = "SELECT id_ordem_servico FROM Ordem_servico WHERE id_ordem_servico = '$id_ordem_servico'";
$result = $conn->query($checkClienteQuery);

if ($result->num_rows == 0) {
    echo '<script>alert("O cliente com ID ' . $idcliente . ' não existe."); window.location.href = "cadastraordem.php";</script>';
    exit();
}

$query = "INSERT INTO Ordem_servico (id_ordem_servico, nome, descricao, data_entrada, preco) VALUES (?, ?, ?, ?, ?)";

$stmt = $conn->prepare($query);
$stmt->bind_param("issss", $idcliente, $modelo, $marca, $ano, $cor, $placa, $data_entrada, $custo, $descricao);

try {
    $stmt->execute();

    echo '<script>alert("Ordem de serviço cadastrada com sucesso!"); window.location.href = "cadastraordem.php";</script>';
} catch (mysqli_sql_exception $e) {
    echo '<script>alert("Erro ao cadastrar no banco de dados: ' . $e->getMessage() . '"); window.location.href = "cadastraordem.php";</script>';
}
?>
