<?php
include 'conexao.php';

$nome = $_POST["nome"];
$telefone = $_POST["telefone"];
$cpf = $_POST["cpf"];

$stmt = $conn->prepare("INSERT INTO clientes (Nome, Telefone, CPF) VALUES (?, ?, ?)");
$stmt->bind_param("sss", $nome, $telefone, $cpf);

try {
    $stmt->execute();
    echo '<script>alert("Cadastro realizado com sucesso!"); window.location.href = "cadastracliente.php";</script>';
} catch (mysqli_sql_exception $e) {
    echo '<script>alert("Erro ao cadastrar no banco de dados: ' . $e->getMessage() . '"); window.location.href = "cadastracliente.php";</script>';
}

?>
