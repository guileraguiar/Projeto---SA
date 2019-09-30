<?php

    //conexao com o banco de dados 
    $emailUser = isset($_POST["email"])?($_POST["email"]):"";
    $User = isset($_POST["user"])?($_POST["user"]):"";
    $senhaUser = md5((isset($_POST["pass"])?($_POST["pass"]):""));

    $local = "localhost";
    $userRoot = "root";
    $passRoot = "root";
    $db_name = "db_agonizingVillage";
    $conexao = mysqli_connect($local, $userRoot , $passRoot,$db_name) or die (mysqli_error()); 


    //configuração
    $link = "../pages/user/login_page.php";
    $msg = "Erro inesperado"; 
?>
<?php
    //consulta com o banco 
    if ((isset($_POST["user"]) && isset($_POST["pass"])) || (isset($_SESSION["userLogado"]))){
        if (isset($_POST["user"]) && isset($_POST["pass"])){
            $select1 = mysqli_query($conexao,"SELECT * FROM users WHERE u_user = '$User' AND u_pass = '$senhaUser'") or die(mysqli_error());
            if (mysqli_num_rows($select1) != 0){
                if ($select = mysqli_fetch_assoc($select1)){
                    $_SESSION["userLogado"] = $select['id_user'];
                    header("Location:login_validate.php");
                }else{
                    $msg = "Usuario ou senha incorretos!!";
                    header("Location: $link?msg=$msg");
                }
            }else{
                $msg = "Usuario ou senha incorretos!!";
                header("Location: $link?msg=$msg"); 
            }
        }else{
            $QueryLogado = mysqli_fetch_assoc(mysqli_query($conexao,"SELECT id_user, u_user, u_pass FROM users"));
            echo "<script>alert(' Bem vindo ".$QueryLogado['u_user']."!!');</script>";
        }
    }else{
        header('Location: ../menu.php');
    }

    mysqli_close($conexao);
  
?>