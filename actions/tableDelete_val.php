<?php
require_once "../bd/connection_bd.php";

$codigo = $_GET["codigo"];

if (isset($codigo)) {

    
  

    
}

function erro($erro)
{
    if (isset($erro)) {
        return false;
    }
    return true;
}

mysqli_close($conexao);
// header("Location:../public/index.php?pagina=viewUsers&msgDel='. $msgDel.'");
// header("Location:../public/index.php?pagina=viewUsers&msgDel='. $msgDel.'");
//header("Location: ../public/index.php?pagina=viewUsers");
