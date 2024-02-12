<?php
include 'conexao.php';

$nome = $_POST["nome"];
$quantidade = $_POST["quantidade"];
$descricao = $_POST["descricao"];
$preco = $_POST["preco"];

$query = "INSERT INTO Estoque (nome_produto, quantidade, descricao, preco) VALUES (?, ?, ?, ?)";

$stmt = $conn->prepare($query);
$stmt->bind_param("ssss", $nome, $quantidade, $descricao, $preco);

try {
    $stmt->execute();

    echo '<script>alert("Item cadastrado com sucesso!"); window.location.href = "cadastraiten.php";</script>';
} catch (mysqli_sql_exception $e) {
    echo '<script>alert("Erro ao cadastrar no banco de dados: ' . $e->getMessage() . '"); window.location.href = "cadastraiten.php";</script>';
}

?>
