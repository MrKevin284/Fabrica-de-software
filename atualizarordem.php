<?php
include('conexao.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    if (isset($_POST['idordem'])) {
        $idordem = $_POST['idordem'];

        $idcliente = $_POST['idcliente'];
        $modelo = $_POST['modelo'];
        $marca = $_POST['marca'];
        $ano = $_POST['ano'];
        $cor = $_POST['cor'];
        $placa = $_POST['placa'];
        $dtentrada = $_POST['dtentrada'];
        $custo = $_POST["custo"];
        $descricao = $_POST['descricao'];
        $status = $_POST['status'];

        $query = "UPDATE ordensservico SET idcliente=$idcliente, modelo='$modelo', marca='$marca', ano=$ano, cor='$cor', placa='$placa', dtentrada='$dtentrada', custo='$custo', descricao='$descricao', status='$status' WHERE idordem=$idordem";

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
