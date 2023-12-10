<?php
include('conexao.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    if (isset($_POST['idordem'])) {
        $idordem = $_POST['idordem'];

        $idcliente = mysqli_real_escape_string($conn, $_POST['idcliente']);
        $modelo = mysqli_real_escape_string($conn, $_POST['modelo']);
        $marca = mysqli_real_escape_string($conn, $_POST['marca']);
        $ano = mysqli_real_escape_string($conn, $_POST['ano']);
        $cor = mysqli_real_escape_string($conn, $_POST['cor']);
        $placa = mysqli_real_escape_string($conn, $_POST['placa']);
        $dtentrada = mysqli_real_escape_string($conn, $_POST['dtentrada']);
        $descricao = mysqli_real_escape_string($conn, $_POST['descricao']);
        $status = mysqli_real_escape_string($conn, $_POST['status']);

        $query = "UPDATE ordensservico SET idcliente=$idcliente, modelo='$modelo', marca='$marca', ano=$ano, cor='$cor', placa='$placa', dtentrada='$dtentrada', descricao='$descricao', status='$status' WHERE idordem=$idordem";

        if (mysqli_query($conn, $query)) {
            echo "<script>alert('Ordem de serviço atualizada com sucesso!'); window.location.href='listarordem.php';</script>";
        } else {
            echo "<script>alert('Erro ao atualizar ordem de serviço: " . mysqli_error($conn) . "'); window.history.back();</script>";
        }
    } else {
        echo "<script>alert('ID da ordem de serviço não fornecido.'); window.history.back();</script>";
    }
} else {
    echo "<script>alert('Acesso inválido ao script.'); window.history.back();</script>";
}

?>
