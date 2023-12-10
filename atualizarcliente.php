<?php
include('conexao.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['idcliente'])) {
        $idcliente = $_POST['idcliente'];

        $nome = $_POST['nome'];
        $telefone = $_POST['telefone'];
        $cpf = $_POST['cpf'];

        $query = "UPDATE clientes SET nome='$nome', telefone='$telefone', cpf='$cpf' WHERE idcliente=$idcliente";

        if (mysqli_query($conn, $query)) {
            echo "<script>alert('Cliente atualizado com sucesso!'); window.location.href='listarcliente.php';</script>";
        } else {
            echo "<script>alert('Erro ao atualizar cliente: " . mysqli_error($conn) . "'); window.history.back();</script>";
        }
    } else {
        echo "<script>alert('ID do cliente não fornecido.'); window.history.back();</script>";
    }
} else {
    echo "<script>alert('Acesso inválido ao script.'); window.history.back();</script>";
}
?>
