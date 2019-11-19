<?php
session_start();
    require_once "../bd/connection_bd.php";
if (isset($_SESSION['user'])){
    $userSession = $_SESSION['user'];
    
    $select = mysqli_query($conexao,"SELECT * FROM users WHERE u_user ='".$userSession["u_user"]."'");
    if($userSession['u_type']==2){
        include '../includes/navbar_admin.php';
    }else if($userSession['u_type']==1){
        include '../includes/navbar_after.php';
        }
    }else{
    include '../includes/navbar.php';
}
?>