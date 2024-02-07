<?php
include('conexao.php');

$login = isset($_POST['nome_login']) ? $_POST['nome_login'] : '';
$senha = isset($_POST['senha_login']) ? $_POST['senha_login'] : '';

if ($login == '' || $senha == '') {
    echo "<script>alert('O campo login e senha são obrigatórios')</script>";
} else {
    $select = "SELECT nome, senha FROM Administrador WHERE nome = ? AND senha = ? LIMIT 1";
    $stmt = mysqli_prepare($conn, $select);

    if ($stmt) {
        // Prevenir SQL Injection
        mysqli_stmt_bind_param($stmt, "ss", $login, $senha);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_bind_result($stmt, $dbLogin, $dbSenha);
        mysqli_stmt_fetch($stmt);

        if ($login == $dbLogin && $senha == $dbSenha) {
            session_start();
            $_SESSION['nome'] = $dbLogin;
            header("location: principal.php");
        } else {
            echo "<script>alert('Login ou senha inválidos')</script>";
            echo "<script>window.location.href='index.php'</script>";
        }

        mysqli_stmt_close($stmt);
    } else {
        echo "<script>alert('Erro na consulta SQL')</script>";
        echo "<script>window.location.href='index.php'</script>";
    }
}


