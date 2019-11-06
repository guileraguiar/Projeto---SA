<?php 
session_start();
$userSession = $_SESSION['user'];
require_once "../bd/connection_bd.php";

if(isset($userSession)){

  $select = mysqli_query($conexao,"SELECT u_user FROM users WHERE u_user = ".$userSession["u_user"]."");

  $selectEmail = mysqli_query($conexao,"SELECT u_email FROM users WHERE u_user = ".$userSession["u_email"]."");

  $selectEmail = mysqli_query($conexao,"SELECT u_email FROM users WHERE u_user = ".$userSession["id_user"]."");

    echo $userSession["u_user"];
    echo $userSession["u_email"];
    echo $userSession["id_user"];
}

?>