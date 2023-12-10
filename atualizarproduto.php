<?php
include('conexao.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    if (isset($_POST['idproduto'])) {
        $idproduto = $_POST['idproduto'];

        $nomeproduto = $_POST['nomeproduto'];
        $quantidade = $_POST['quantidade'];
        $descricao = $_POST['descricao'];

        $query = "UPDATE estoque SET nomeproduto=?, quantidade=?, descricao=? WHERE idproduto=?";
        $stmt = mysqli_prepare($conn, $query);

        mysqli_stmt_bind_param($stmt, "sisi", $nomeproduto, $quantidade, $descricao, $idproduto);

        if (mysqli_stmt_execute($stmt)) {
            echo "<script>alert('Produto no estoque atualizado com sucesso!'); window.location.href='listarestoque.php';</script>";
        } else {
            echo "<script>alert('Erro ao atualizar produto no estoque: " . mysqli_error($conn) . "'); window.history.back();</script>";
        }

        mysqli_stmt_close($stmt);
    } else {
        echo "<script>alert('ID do produto não fornecido.'); window.history.back();</script>";
    }
} else {
    echo "<script>alert('Acesso inválido ao script.'); window.history.back();</script>";
}
?>
