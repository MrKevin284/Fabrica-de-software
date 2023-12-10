<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "oficina";

$conn = mysqli_connect($servername, $username, $password, $dbname);

if (!$conn) {
    die("Conexão com o banco de dados falhou: " . mysqli_connect_error());
}
?>
