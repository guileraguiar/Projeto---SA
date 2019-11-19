<?php

//puxando dados da tablea register_page.php
$usuario = isset($_POST["user"]) ? ($_POST["user"]) : "";
$senhaUser = MD5(isset($_POST["pass"]) ? ($_POST["pass"]) : "");
$csenhaUser = MD5(isset($_POST["cpass"]) ? ($_POST["cpass"]) : "");
$emailUser = isset($_POST["email"]) ? ($_POST["email"]) : "";

require_once "../bd/connection_bd.php";

$select = mysqli_query($conexao, "SELECT * FROM users");

$query_select = mysqli_query($conexao, "SELECT * FROM users WHERE u_user = '$usuario' OR u_email='$emailUser'");
$array = mysqli_fetch_assoc($query_select);


$erro = null;
if ($usuario == "" || $usuario == null) {
    $erro = 'erro no nome';
    if (isset($erro)) {
        echo "<div class='alert alert-danger' role='alert'>
        " . $erro . "
      </div>";
    }
    
} elseif ($login) {
    $erro = 'erro login';
}









