<?php 
session_start();
    $usuario = $_SESSION['user'];
    
    if (isset($_SESSION['user'])){
        $conexao = mysqli_connect("localhost", "root", "","db_agonizingVillage") or die ("Erro");
        
        $senhaBanco = mysqli_query($conexao,"SELECT u_pass FROM users WHERE u_user = '$usuario'");
        $atualSenha =  $senhaBanco;

        //Vai selecionar a senha do usuário que estiver na linha que corresponde à variável $usuario
        
        $senhaUser = MD5(isset($_POST["newPass"])?($_POST["newPass"]):"");
        $csenhaUser = MD5(isset($_POST["cNewPass"])?($_POST["cNewPass"]):"");
        $senhaAtual = MD5(isset($_POST["pass"])?($_POST["pass"]):"");

        if($senhaAtual != $atualSenha){
            echo"<script language='javascript' type='text/javascript'>
            alert('As senhas devem coincidir!!');window.location.href='../pages/user/alter_pass.php';</script>";
        }else (($atualSenha == $senhaAtual) && ($senhaUser == $csenhaUser)){
            $select = mysqli_query($conexao,"SELECT * FROM users WHERE u_user = '$usuario' AND  u_pass = '$senhaUser'");
            $query = mysqli_query($conexao,"UPDATE users SET u_pass ='$senhaUser' WHERE u_user = '$usuario'");
            $alter = mysqli_query($conexao,$query);
        
            echo"<script language='javascript' type='text/javascript'>
                alert('Senha alterada com sucesso!!');window.location.
                 href='../pages/user/success_pass.php'</script>";
    }
}

// senha banco = senha digitada no cp1
// nova senha = nova senha 
// 
?>