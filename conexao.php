<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "oficina";

// Conexão com o banco de dados
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Verifica a conexão
if (!$conn) {
    die("Conexão com o banco de dados falhou: " . mysqli_connect_error());
}
?>
