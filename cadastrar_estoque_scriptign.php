<?php
include('conexao.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome_produto = $_POST['nome_produto'];
    $quantidade = $_POST['quantidade'];
    $descricao = $_POST['descricao'];
    $preco = $_POST['preco'];

    $query = "INSERT INTO Estoque (nome_produto, quantidade, descricao, preco) VALUES ('$nome_produto', $quantidade, '$descricao', $preco)";

    if (mysqli_query($conn, $query)) {
        echo "<script>alert('Produto cadastrado com sucesso!'); window.location.href='cadastrarestoque.php';</script>";
    } else {
        echo "<script>alert('Erro ao cadastrar produto: " . mysqli_error($conn) . "'); window.history.back();</script>";
    }
} else {
    echo "<script>alert('Acesso inválido ao script.'); window.history.back();</script>";
}
?>
