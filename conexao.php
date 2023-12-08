<?php
$conexao = mysqli_connect('localhost', 'root', '', 'oficina');
if (!$conexao) {
    echo "Não é possível conectar";
}
?>