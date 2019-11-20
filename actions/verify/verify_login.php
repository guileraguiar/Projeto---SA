<?php
session_start();
include '../bd/connection_bd.php'; 
if(!isset($SESSION["user"])){
    header("Location:index.php?pagina=menu");
}
?>