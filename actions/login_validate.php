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
    $verify = mysqli_query($conexao,"SELECT FROM users WHERE u_user='".$usuario."' AND u_pass = '".$senhaUser."'");
  
    if (mysqli_num_rows($nLinhas) == 1) {
        header("Location: ../public/index.php?pagina=menu");
    }
} else { 
    header("Location: ../public/index.php?pagina=login&erro=" . $erro);
}

/* Valida se tem erro */
function erro($erro)
{
    if (isset($erro)) {
        return false;
    }else{
        return true;
    }
}

?>