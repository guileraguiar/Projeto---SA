<?php 
session_start();

    $userSession = $_SESSION['user'];
    if (isset($_SESSION['user'])){
        $senhaUser = MD5(isset($_POST["pass"])?($_POST["pass"]):"");
        $csenhaUser = MD5(isset($_POST["cpass"])?($_POST["cpass"]):"");
        $usuario = (isset($_POST["user"])?($_POST["user"]):"");

        if($senhaUser != $csenhaUser){
            echo"<script language='javascript' type='text/javascript'>
            alert('As senhas devem coincidir!!');window.location.href='../pages/user/alter_pass.php';</script>";
        }else{
            $conexao = mysqli_connect("localhost", "root", "","db_agonizingVillage") or die ("Erro");
            $select = mysqli_query($conexao,"SELECT * FROM users WHERE u_user = '$usuario' AND  u_pass = '$senhaUser'");

            $query = mysqli_query($conexao,"UPDATE users SET u_pass ='$senhaUser' WHERE u_user = '$usuario'");
            $alter = mysqli_query($conexao,$query);

                echo"<script language='javascript' type='text/javascript'>
                alert('Senha alterada com sucesso!!');window.location.
                href='../pages/user/success_pass.php'</script>";
    }
}
?>