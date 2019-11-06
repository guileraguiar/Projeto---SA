<?php
$codigo = $_GET["codigo"];

require_once "../bd/connection_bd.php";

mysqli_query($conexao,"DELETE FROM users WHERE id_user=".$codigo);

mysqli_close($conexao);

header("Location: ../pages/user/table_user.php");

?>