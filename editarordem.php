<?php
include('conexao.php');

if (isset($_GET['id'])) {
    $id_ordem_servico = $_GET['id'];

    $query = "SELECT * FROM Ordem_servico WHERE id_ordem_servico = $id_ordem_servico";
    $resultado = mysqli_query($conn, $query);

    if ($resultado) {
        if(mysqli_num_rows($resultado) > 0) {
            $ordem_servico = mysqli_fetch_assoc($resultado);
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Ordem de Serviço</title>
</head>

<body>
    <div class="ordens-servico">
        <h1>Editar Ordem de Serviço</h1>
    </div>
    
    <form action="atualizarordem.php" method="post">
        <input type="hidden" name="id_ordem_servico" value="<?= $ordem_servico["id_ordem_servico"] ?>">
        
        <label for="id_cliente">ID Cliente:</label>
        <input type="number" name="id_cliente" value="<?= $ordem_servico["id_cliente"] ?>" required><br>
    
        <label for="id_adm">ID Administrador:</label>
        <input type="number" name="id_adm" value="<?= $ordem_servico["id_adm"] ?>"><br>
    
        <label for="id_veiculo">ID Veículo:</label>
        <input type="number" name="id_veiculo" value="<?= $ordem_servico["id_veiculo"] ?>" required><br>
        
        <label for="descricao">Descrição:</label><br>
        <textarea name="descricao" rows="4" required><?= $ordem_servico["descricao"] ?></textarea><br>

        <label for="data_entrada">Data de Entrada:</label>
        <input type="date" name="data_entrada" value="<?= $ordem_servico["data_entrada"] ?>" required><br>

        <label for="preco">Preço:</label>
        <input type="number" name="preco" value="<?= $ordem_servico["preco"] ?>" step="0.01"><br>

        <label for="status">Status:</label>
        <select name="status">
            <option value="Aberto" <?= ($ordem_servico["status"] == "Aberto") ? "selected" : "" ?>>Aberto</option>
            <option value="Em Progresso" <?= ($ordem_servico["status"] == "Em Progresso") ? "selected" : "" ?>>Em Progresso</option>
            <option value="Concluído" <?= ($ordem_servico["status"] == "Concluído") ? "selected" : "" ?>>Concluído</option>
        </select><br>


        <input type="submit" value="Atualizar">
    </form>

    <div>
        <a href="listarordem.php"><button>Voltar para Lista de Ordens de Serviço</button></a>
    </div>
</body>

</html>

<?php
        } else {
            echo "Ordem de serviço não encontrada.";
        }
    } else {
        echo "Erro na consulta: " . mysqli_error($conn);
    }
} else {
    echo "ID da ordem de serviço não fornecido.";
}
?>
