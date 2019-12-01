<?php
session_start();
//criando a conexão com o banco de dados
require_once "../bd/connection_bd.php";

//puxando dados da página login_page.php 
$usuario = $_POST["user"];
$senhaUser = $_POST["pass"];
$erro = null;

//validando login, e criando uma sessão
if (!isset($usuario) || empty($usuario)) {
    $erro = 1;
} elseif (!isset($senhaUser) || empty($senhaUser)) {
    $erro = 2;
}

// '$usuario' AND u_pass = '$senhaUser'") or die("Algo de errado aconteceu!!");
if (erro($erro)) {
    /* Dados do crypt */
    $salt = '72b302bf297a228a75730123efef7c41'; //banana
    $_saltCost = '8';
    $senha_crypt = crypt($senhaUser, $_saltCost . $salt);

    $verify = mysqli_query($conexao, "SELECT * FROM users WHERE u_user='" . $usuario . "' AND u_pass = '" . $senha_crypt . "'");
    $verify_line = mysqli_num_rows($verify);
    if (($verify_line) == 1) {
        $array = mysqli_fetch_all($verify, MYSQLI_ASSOC);

        $_SESSION['user'] = $array[0];
        header("Location: ../public/index.php?pagina=menu");
    } else {
        header("Location: ../public/index.php?pagina=login&erro=" . $erro);
    }
} else {
    header("Location: ../public/index.php?pagina=login&erro=" . $erro);
}

/* Valida se tem erro */
function erro($erro)
{
    if (isset($erro)) {
        return false;
    } else {
        return true;
    }
}
