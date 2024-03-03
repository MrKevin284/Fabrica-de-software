<?php

//refazer isso do zero
include 'conexao.php';

$descricao = $_POST["descricao"];
$data_entrada = $_POST["data_entrada"];
$preco = $_POST["preco"];
$id_cliente = $_POST["id_cliente"];
$id_adm = $_POST["id_adm"];
$id_veiculo = $_POST["id_veiculo"];

$checkClienteQuery = "SELECT id_cliente FROM Cliente WHERE id_cliente = '$id_cliente'";
$result = $conn->query($checkClienteQuery);

if ($result->num_rows == 0) {
    echo '<script>alert("O cliente com ID ' . $id_cliente . ' não existe."); window.location.href = "cadastraordem.php";</script>';
    exit();
}

$query = "INSERT INTO Ordem_servico (descricao, data_entrada, preco, id_cliente, id_adm, id_veiculo) VALUES (?, ?, ?, ?, ?, ?)";
$stmt = $conn->prepare($query);
$stmt->bind_param("ssiiii", $descricao, $data_entrada, $preco, $id_cliente, $id_adm, $id_veiculo);

try {
    $stmt->execute();
    echo '<script>alert("Ordem de serviço cadastrada com sucesso!"); window.location.href = "cadastraordem.php";</script>';
} catch (mysqli_sql_exception $e) {
    echo '<script>alert("Erro ao cadastrar no banco de dados: ' . $e->getMessage() . '"); window.location.href = "cadastraordem.php";</script>';
}

