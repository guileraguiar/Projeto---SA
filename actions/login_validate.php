<?php
    session_start();
    //puxando dados da página login_page.php 
    $emailUser = isset($_POST["email"])?($_POST["email"]):"";
    $usuario = isset($_POST["user"])?($_POST["user"]):"";
    $senhaUser = md5((isset($_POST["pass"])?($_POST["pass"]):""));
    $Signin = isset($_POST["logar"])?($_POST["logar"]):"";

    //criando a conexão com o banco de dados
    require_once "../bd/connection_bd.php";

?>
<?php
    //validando login, e criando uma sessão
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
            $_SESSION['user'] = $array[0];
            header("Location:../public/index.php?pagina=menu");
        }
    }
?>