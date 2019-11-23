<?php
session_start();
require_once "../bd/connection_bd.php";
$userSession = $_SESSION['user'];
$select_query = mysqli_query($conexao, "SELECT u_pass FROM users");
if (isset($_SESSION['user'])) {

    $senhaUser = $_POST["newPass"];
    $csenhaUser = $_POST["cNewPass"];
    $senhaAtual = $_POST["pass"];
    $erro = null;
    if (!isset($senhaUser) || empty($senhaUser)) {
        $erro = 1;
    } elseif (!isset($csenhaUser) || empty($csenhaUser)) {
        $erro = 2;
    }elseif (!isset($senhaAtual) || empty($senhaAtual)) {
        $erro = 3;
    }
    
    while ($dados_users = mysqli_fetch_assoc($select_query)) {
        if ($dados_users['u_pass'] != $senhaAtual) {
            $erro = 4;
        }elseif ($senhaUser != $csenhaUser) {
            $erro = 5;
        }
    }
    // '$usuario' AND u_pass = '$senhaUser'") or die("Algo de errado aconteceu!!");
    if (erro($erro)) {
        $query = mysqli_query($conexao, "UPDATE users SET u_pass ='$senhaUser' WHERE u_user = '" . $login["u_user"] . "'");
        $alterSuccess = 1;
        header("Location: ../public/index.php?pagina=login&registerSuccess=".$alterSuccess);
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
}
//     if ($senhaAtual != $login['u_pass']) {
//         echo "<script language='javascript' type='text/javascript'>
//              alert('As senhas devem coincidir!!');window.location.href='index.php?codigo=alterPass';</script>";
//     } else if (($login['u_pass'] == $senhaAtual) && ($senhaUser == $csenhaUser)) {
//         $select = mysqli_query($conexao, "SELECT * FROM users WHERE u_user = '" . $login["u_user"] . "'");
//         $query = mysqli_query($conexao, "UPDATE users SET u_pass ='$senhaUser' WHERE u_user = '" . $login["u_user"] . "'");

//         echo "<script language='javascript' type='text/javascript'>
//             alert('Senha alterada com sucesso!!');window.location.
//              href='index.php?codigo=menu'</script>";
//     }
// }

?>