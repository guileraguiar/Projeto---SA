<?php
$codigo = $_GET["codigo"];

require_once "../bd/connection_bd.php";

mysqli_query($conexao,"DELETE FROM equip WHERE id_equip =".$codigo );

mysqli_close($conexao);

header("Location: ../pages/user/tables/table_equip.php");
?>