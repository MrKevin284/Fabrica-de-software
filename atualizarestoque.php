<?php
include('conexao.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    if (isset($_POST['id_produto'])) {
        $id_produto = $_POST['id_produto'];

        $nome_produto = $_POST['nome_produto'];
        $quantidade = $_POST['quantidade'];
        $descricao = $_POST['descricao'];
        $preco = $_POST['preco'];

        $query = "UPDATE Estoque SET nome_produto='$nome_produto', quantidade=$quantidade, descricao='$descricao', preco=$preco WHERE id_produto=$id_produto";

        if (mysqli_query($conn, $query)) {
            echo "<script>alert('Produto atualizado com sucesso!'); window.location.href='listarEstoque.php';</script>";
        } else {
            echo "<script>alert('Erro ao atualizar produto: " . mysqli_error($conn) . "'); window.history.back();</script>";
        }
    } else {
        echo "<script>alert('ID do produto não fornecido.'); window.history.back();</script>";
    }
} else {
    echo "<script>alert('Acesso inválido ao script.'); window.history.back();</script>";
}
?>
