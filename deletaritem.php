<?php
include('conexao.php');

if (isset($_GET['id'])) {
    $id_produto = $_GET['id'];

    $sql = "DELETE FROM Estoque WHERE id_produto = $id_produto";

    if ($conn->query($sql) === TRUE) {
        echo '<script>alert("Item deletado com sucesso!"); window.location.href = "listarestoque.php";</script>';
    } else {
        echo '<script>alert("Erro ao deletar item: ' . $conn->error . '"); window.location.href = "listarestoque.php";</script>';
    }
} else {
    echo "ID do produto não fornecido na requisição.";
}
?>
