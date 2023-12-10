<?php
include('conexao.php');

if (isset($_GET['idproduto'])) {

    $idproduto = $_GET['idproduto'];

    $sql = "DELETE FROM estoque WHERE idproduto = $idproduto";

    if ($conn->query($sql) === TRUE) {
       echo '<script>alert("Item deletado com sucesso!"); window.location.href = "listarestoque.php";</script>';
    } else {
        echo '<script>alert("Erro ao deletar item: ' . $conn->error . '");</script>';
    }
} else {
    echo "ID do produto não fornecido na requisição.";
}
?>
