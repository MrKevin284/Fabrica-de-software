<?php
include("conexao.php");
session_start();


$nome = isset($_POST['nome_cadastro']) ? $_POST['nome_cadastro'] : '';
$senha = isset($_POST['senha_cadastro']) ? $_POST['senha_cadastro'] : '';
$login_error ='';

if (strlen($nome) <= 3 ) {
  $login_error = "Nome de usuário inválido. nome deve conter mais caracteres.";
  header('Location:cadastrarAdm.php');
  exit();
}

$nome = htmlspecialchars($nome, ENT_QUOTES, 'UTF-8');
$senha_hashed = password_hash($senha, PASSWORD_ARGON2ID);

if (empty($login_error)) {
  $verificar_nome = "SELECT nome FROM Administrador WHERE nome = '$nome'";
  $query_verificar = mysqli_query($conn, $verificar_nome);

  if (!$query_verificar) {
    die("Erro na consulta: " . mysqli_error($conn));
}

$dados = mysqli_fetch_row($query_verificar);

if (!$dados) {
    $incluir = "INSERT INTO Administrador(nome, senha)
                VALUES ('$nome', '$senha_hashed')";
    $query_incluir = mysqli_query($conn, $incluir);

    if ($query_incluir) {
        echo "<script>alert('Cadastro realizado com sucesso.'); window.location.href='index.php';</script>";
        exit();
    } else {
        die("Erro ao inserir dados: " . mysqli_error($conn));
    }
} else {
    $cpf_error = "CPF  já cadastrado no sistema.";
}




}