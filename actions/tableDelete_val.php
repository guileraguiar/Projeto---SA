<?php
require_once "../bd/connection_bd.php";

$codigo = $_GET["codigo"];
$tipo = $_GET['tipo'];

// var_dump($codigo);
// var_dump($tipo);

if (isset($codigo) && isset($tipo)) {
    if($tipo !=2) {
        $select = mysqli_query($conexao, "SELECT u_type FROM users");
        $deleteUsers = mysqli_query($conexao, "DELETE FROM users WHERE id_user='" . $codigo . "' AND u_type <> 2");
        // $rows_delete = mysqli_num_rows($deleteUsers);
        if ($deleteUsers) {
            $msgDel = 1;
            header("Location:../public/index.php?pagina=viewUsers&msgDel=" . $msgDel);
        }
    }else{
        $msgDel = 2;
        header("Location:../public/index.php?pagina=viewUsers&msgDel=" . $msgDel);
    }
}
mysqli_close($conexao);
