<?php
session_start();
if((isset($_POST["email"])) && (isset($_POST["pass"]))){
    $escapeEmail = mysqli_real_escape_string($conn, $_POST['email']);
    $escapeUsuario = mysqli_real_escape_string($conn, $_POST['pass']);
}else{
    $_SESSION['loginErro'] = "Usuário ou senha Inválido";
    header("Location: ../pages/user/login_page.php");
}


?>