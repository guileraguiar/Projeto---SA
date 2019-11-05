<?php
$codigo = $_GET["codigo"];

$conexao = mysqli_connect("localhost", "root", "", "db_agonizingvillage");

mysqli_query($conexao,"DELETE FROM users WHERE id_user=".$codigo);

mysqli_close($conexao);

header("Location: ../pages/user/table_user.php");

?>