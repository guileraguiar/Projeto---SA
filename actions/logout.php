<?php
session_start();
if (isset($_SESSION['user'])){
    session_destroy();
    $erro = 3;
    header('Location:../public/index.php?pagina=login&erro='.$erro);
    exit();
}

?>