<?php
//puxando dados da tablea register_page.php
$usuario = isset($_POST["user"]) ? ($_POST["user"]) : "";
$senhaUser = MD5(isset($_POST["pass"]) ? ($_POST["pass"]) : "");
$csenhaUser = MD5(isset($_POST["cpass"]) ? ($_POST["cpass"]) : "");
$emailUser = isset($_POST["email"]) ? ($_POST["email"]) : "";

require_once "../bd/connection_bd.php"; 

$select = mysqli_query($conexao,"SELECT * FROM users");

$query_select = mysqli_query($conexao,"SELECT * FROM users WHERE u_user = '$usuario' OR u_email='$emailUser'");
$array = mysqli_fetch_assoc($query_select);

if ($usuario == "" || $usuario == null) {
    $erro = 1;
} elseif ($array['u_user'] == $usuario) {
    $erro = 2;
} elseif ($senhaUser != $csenhaUser) {
    $erro = 3;
} elseif ($array['u_email'] == $emailUser) {
    $erro = 4;
} elseif (isset($erro)) {
    $query = "INSERT INTO users (u_user,u_pass,u_email) VALUES ('$usuario','$senhaUser','$emailUser')";
    $insert = mysqli_query($conexao, $query);
}

if ($erro) {
    header("Location: ../public/index.php?pagina=register&erro=".$erro);
}

?>