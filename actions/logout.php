<?php
session_start();
if (isset($_SESSION['user'])){
    session_destroy();
    header('Location:../public/index.php?pagina=menu');
    exit();
}

?>