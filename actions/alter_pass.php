<?php require_once "../bd/connection_bd.php";
session_start();
$select_query = mysqli_query($conexao, "SELECT * FROM users WHERE id_user =" . $_SESSION['user']['id_user']);

if (isset($_SESSION['user'])) {

    // var_dump($_SESSION['user']);
    // var_dump($_SESSION['user']['id_user']);
    $senhaUser = returnCritp($_POST["newPass"]);
    $csenhaUser = returnCritp($_POST["cNewPass"]);
    $senhaAtual = returnCritp($_POST["pass"]);
    $erro = null;

    if (!isset($senhaUser) || empty($senhaUser)) {
        $erro = 1;
    } elseif (!isset($csenhaUser) || empty($csenhaUser)) {
        $erro = 2;
    } elseif (!isset($senhaAtual) || empty($senhaAtual)) {
        $erro = 3;
    } elseif ($senhaUser != $csenhaUser) {
        $erro = 5;
    }

    while ($dados_users = mysqli_fetch_assoc($select_query)) {
        if ($senhaAtual != $dados_users['u_pass']) {
            $erro = 4;
        }
    }
    // $87nrBBr/CbukI;
    // '$usuario' AND u_pass = '$senhaUser'") or die("Algo de errado aconteceu!!");
    /* CONTINUAR DAQUI AMANHÃ 
    ------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------- */
    if (error($erro)) {
        $query = mysqli_query($conexao, "UPDATE users SET u_pass ='$senhaUser' WHERE id_user =" .  $_SESSION['user']['id_user']);
        $alterSuccess = 1;
        header("Location: ../public/index.php?pagina=alterPass&alterSuccess=" . $alterSuccess);
    } else {
        header("Location: ../public/index.php?pagina=alterPass&erro=" . $erro);
    }
}

/* Valida se tem erro */
function error($erro)
{
    if (isset($erro)) {
        return false;
    } else {
        return true;
    }
}

/* Recebe a string de senha do usuario e logo em seguida criptagra e retorna o valor criptorgafado */
function returnCritp($senhaUser)
{
    /* Dados do crypt */
    $salt = '72b302bf297a228a75730123efef7c41'; //banana
    $_saltCost = '8';

    return crypt($senhaUser, $_saltCost . $salt);
}
