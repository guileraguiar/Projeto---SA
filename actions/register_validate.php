<?php
require_once "../bd/connection_bd.php";
$query_user = mysqli_query($conexao, "SELECT * FROM users");

//puxando dados da tablea register_page.php
$usuario = $_POST["user"];
$senhaUser = $_POST["pass"];
$csenhaUser = $_POST["cpass"];
$emailUser = $_POST["email"];
$erro = null;

if (!isset($usuario) || empty($usuario)) {
    $erro = 1;
} elseif (!isset($senhaUser) || empty($senhaUser)) {
    $erro = 2;
} elseif (!isset($csenhaUser) || empty($csenhaUser)) {
    $erro = 3;
} elseif ($senhaUser != $csenhaUser) {
    $erro = 7;
} elseif (!isset($emailUser) || empty($emailUser)) {
    $erro = 4;
}
/* Valida se tem usuario/email repetido */
while ($dados_users = mysqli_fetch_assoc($query_user)) {
    if ($dados_users['u_user'] == $usuario) {
        $erro = 5;
    } elseif ($dados_users['u_email'] == $emailUser) {
        $erro = 6;
    }
}
/* insere no banco */
if (erro($erro)) {
    /* Dados do crypt */
    $salt = '72b302bf297a228a75730123efef7c41'; //banana
    $_saltCost = '8';

    $value = crypt($senhaUser, $_saltCost . $salt);
    // if (crypt($senhaUser, $_saltCost . $salt) ==  $value) {
    //     echo "ss";
    // }
    $query = "INSERT INTO users (u_user, u_pass, u_email) VALUES ('$usuario','$value','$emailUser')";
    $insert = mysqli_query($conexao, $query);
    $registerSuccess = 1;
    header("Location: ../public/index.php?pagina=login&registerSuccess=" . $registerSucces);
} else {
    header("Location: ../public/index.php?pagina=register&erro=" . $erro);
}

/* Valida se tem erro */
function erro($erro)
{
    if (isset($erro)) {
        return false;
    }
    return true;
}
