<?php
require_once "../bd/connection_bd.php";

$codigo = $_GET["codigo"];

$select = mysqli_query($conexao,"SELECT u_type FROM users");
mysqli_query($conexao,"DELETE FROM users WHERE id_user='".$codigo."' AND u_type <> 2");

    if(mysqli_affected_rows($conexao)){
        $msgDel = 1;
        header("Location:../public/index.php?pagina=viewUsers&msgDel='. $msgDel.'");
    }else{
        $msgDel = 2;
        header("Location:../public/index.php?pagina=viewUsers&msgDel='. $msgDel.'");
    }

mysqli_close($conexao);

//header("Location: ../public/index.php?pagina=viewUsers");

?>