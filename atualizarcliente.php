<?php
include('conexao.php');

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['idcliente'])) {
    $idcliente = $_POST['idcliente'];
    $nome = $_POST['nome'];
    $telefone = $_POST['telefone'];
    $cpf = $_POST['cpf'];
    $endereco = $_POST['endereco'];
    $num = $_POST['num'];

    $query = "UPDATE Cliente SET nome=?, telefone=?, cpf=?, endereco=?, numero=? WHERE id_cliente=?";
    $stmt = mysqli_prepare($conn, $query);
    mysqli_stmt_bind_param($stmt, "sssssi", $nome, $telefone, $cpf, $endereco, $num, $idcliente);

    try {
        $stmt->execute();
        echo '<script>alert("Cliente atualizado com sucesso"); window.location.href = "listarcliente.php";</script>';
    } catch (mysqli_sql_exception $e) {
        echo '<script>alert("Erro ao atualizar o cliente: ' . $e->getMessage() . '"); window.location.href = "listarcliente.php";</script>';
    }

    mysqli_stmt_close($stmt);
} else {
    echo "ID do cliente não fornecido ou o formulário não foi submetido corretamente.";
}
?>
