<?php
require_once "../bd/connection_bd.php";

echo "<h1>".$_GET["codigo"]."</h1>";
$codigo = $_GET["codigo"];

mysqli_query($conexao,"DELETE FROM users WHERE id_user='".$codigo."' OR u_type <> 2");

mysqli_close($conexao);

//header("Location: ../public/index.php?pagina=viewUsers");

?>