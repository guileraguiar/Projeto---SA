<?php
require_once "../bd/connection_bd.php";

$codigo = $_GET["codigo"];

if (isset($codigo)) {

    $select = mysqli_query($conexao, "SELECT u_type FROM users");
    $deleteUsers = mysqli_query($conexao, "DELETE FROM users WHERE id_user='" . $codigo . "' AND u_type <> 2");
}
mysqli_close($conexao);
