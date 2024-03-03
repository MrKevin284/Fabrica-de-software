<?php
include('conexao.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    if (isset($_POST['id_ordem_servico'])) {
        $id_ordem_servico = $_POST['id_ordem_servico'];

        $descricao = $_POST['descricao'];
        $data_entrada = $_POST['data_entrada'];
        $preco = $_POST['preco'];
        $status = $_POST['status'];
        $id_cliente = $_POST['id_cliente'];
        $id_adm = $_POST['id_adm'];
        $id_veiculo = $_POST['id_veiculo'];

        $query = "UPDATE Ordem_servico SET descricao='$descricao', data_entrada='$data_entrada', preco=$preco, status='$status', id_cliente=$id_cliente, id_adm=$id_adm, id_veiculo=$id_veiculo WHERE id_ordem_servico=$id_ordem_servico";

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
