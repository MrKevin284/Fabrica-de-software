<?php
include 'conexao.php';

// Coleta os dados do formulário
$nome = $_POST["nome"];
$telefone = $_POST["telefone"];
$cpf = $_POST["cpf"];

// Prepara a consulta SQL para inserção dos dados usando declarações preparadas
$stmt = $conn->prepare("INSERT INTO clientes (Nome, Telefone, CPF) VALUES (?, ?, ?)");
$stmt->bind_param("sss", $nome, $telefone, $cpf);

// Executa a consulta e verifica se foi bem-sucedida
try {
    $stmt->execute();
    echo '<script>alert("Cadastro realizado com sucesso!"); window.location.href = "cadastracliente.php";</script>';
} catch (mysqli_sql_exception $e) {
    // Se ocorrer uma exceção, exiba uma mensagem de erro
    echo '<script>alert("Erro ao cadastrar no banco de dados: ' . $e->getMessage() . '"); window.location.href = "cadastracliente.php";</script>';
}

// Fecha a declaração preparada
$stmt->close();

// Fecha a conexão com o banco de dados
$conn->close();
?>
