<?php 
session_start();
    $login = $_SESSION['user'];
    
    if (isset($_SESSION['user'])){
        require_once "../bd/connection_bd.php";
        $senhaBanco = mysqli_query($conexao,"SELECT u_pass FROM users WHERE u_user = '".$login["u_user"]."'");
        
        $senhaUser = MD5(isset($_POST["newPass"])?($_POST["newPass"]):"");
        $csenhaUser = MD5(isset($_POST["cNewPass"])?($_POST["cNewPass"]):"");
        $senhaAtual = MD5(isset($_POST["pass"])?($_POST["pass"]):"");

        if($senhaAtual != $login['u_pass']){
             echo"<script language='javascript' type='text/javascript'>
             alert('As senhas devem coincidir!!');window.location.href='../pages/user/alter_pass.php';</script>";

        }else if (($login['u_pass'] == $senhaAtual) && ($senhaUser == $csenhaUser)){
            $select = mysqli_query($conexao,"SELECT * FROM users WHERE u_user = '".$login["u_user"]."'");
            $query = mysqli_query($conexao,"UPDATE users SET u_pass ='$senhaUser' WHERE u_user = '".$login["u_user"]."'");
        
            echo"<script language='javascript' type='text/javascript'>
            alert('Senha alterada com sucesso!!');window.location.
             href='../pages/user/success_pass.php'</script>";
    }
}
?>