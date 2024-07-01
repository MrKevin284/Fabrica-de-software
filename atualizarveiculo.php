<?php
include('conexao.php');

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['idcliente'])) {

        $id_veiculo = $_POST['id_veiculo'];
        $modelo = $_POST['modelo'];
        $marca = $_POST['marca'];
        $ano = $_POST['ano'];
        $cor = $_POST['cor'];
        $placa = $_POST['placa'];

        $query = "UPDATE Veiculo SET modelo=?, marca=?, ano=?, cor=?,placa=? WHERE id_veiculo=?";
        $stmt = mysqli_prepare($conn, $query);

        mysqli_stmt_bind_param($stmt, "sssssi", $modelo, $marca, $ano, $cor, $placa, $id_veiculo);

        try {
          $stmt->execute();
          echo '<script>alert("Veiculo atualizado com sucesso"); window.location.href = "listarveiculo.php";</script>';
      } catch (mysqli_sql_exception $e) {
          echo '<script>alert("Erro ao atualizar o veiculo: ' . $e->getMessage() . '"); window.location.href = "listarveiculo.php";</script>';
      }

        mysqli_stmt_close($stmt);

      } else {
          echo '<script>alert("ID do veiculo não fornecido ou o formulário não foi submetido corretamente"); window.location.href = "listarveiculo.php";</script>';
      }
