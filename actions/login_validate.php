<?php
    session_start();
    //conexao com o banco de dados 
    $emailUser = isset($_POST["email"])?($_POST["email"]):"";
    $usuario = isset($_POST["user"])?($_POST["user"]):"";
    $senhaUser = md5((isset($_POST["pass"])?($_POST["pass"]):""));

    $local = "localhost";
    $userRoot = "root";
    $passRoot = "root";
    $db_name = "db_agonizingVillage";
    $conexao = mysqli_connect($local, $userRoot , $passRoot,$db_name) or die (mysqli_error()); 
    $Signin = $_POST["logar"];

    //configuração
    $link = "../pages/user/login_page.php";
    $msg = "Erro inesperado"; 
?>
<?php
    if (isset($Signin)) {
            
        $verifica = mysqli_query($conexao,"SELECT * FROM users WHERE u_user = 
        '$usuario' AND u_pass = '$senhaUser'") or die("Algo de errado aconteceu!!");
        if (mysqli_num_rows($verifica)<=0){
            echo"<script language='javascript' type='text/javascript'>
            alert('Login e/ou senha incorretos');window.location
            .href='../pages/user/login_page.php';</script>";
            die();
        }else{
            $array = mysqli_fetch_all($verifica,MYSQLI_ASSOC);
            $_SESSION['user'] = $array;
            ///print_r($_SESSION['user']);
            header("Location:../menu.php");
        }
    }
?>