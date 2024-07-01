<?php
include 'conexao.php';

$nome = $_POST["nome"];
$telefone = $_POST["telefone"];
$cpf = $_POST["cpf"];
$endereco = $_POST["endereco"];
$numero= $_POST["numero"];

$stmt = $conn->prepare("INSERT INTO Cliente (nome, telefone, cpf, endereco, numero) VALUES (?, ?, ?, ?, ?)");
$stmt->bind_param("sissi", $nome, $telefone, $cpf, $endereco, $numero);

try {
    $stmt->execute();
    echo '<script>alert("Cadastro realizado com sucesso!"); window.location.href = "cadastracliente.php";</script>';
} catch (mysqli_sql_exception $e) {
    echo '<script>alert("Erro ao cadastrar no banco de dados: ' . $e->getMessage() . '"); window.location.href = "cadastracliente.php";</script>';
}

?>
