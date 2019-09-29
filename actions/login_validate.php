<?php
    //conexao com o banco de dados 
    session_start();

    $emailUser = isset($_POST["email"])?($_POST["email"]):"";
    $User = isset($_POST["user"])?($_POST["user"]):"";
    $senhaUser = md5((isset($_POST["pass"])?($_POST["pass"]):""));

    $local = "localhost";
    $userRoot = "root";
    $passRoot = "";
    $db_name = "db_agonizingVillage";
    $conexao = mysqli_connect($local, $userRoot , $passRoot,$db_name) or die (mysqli_error()); 


    //configuração
    $link = "../pages/user/login_page.php";
    $msg = "Erro inesperado"; 
?>

<!-- redimensiona a pagina em 5 segunda (1000 milisegundos) caso login correto, ou incorreto-->
<html>
    <head>
        <title>autentication</title>
        <script type="text/javascript">

        function loginfailed(){
            setTimeout("window.location='../pages/user/login_page.php'",1000);
        }
        </script>
    </head>
    <body>
    </body>
</html>
<?php

    //consulta com o banco 
        $select = mysqli_query($conexao,"SELECT * FROM users WHERE u_user = '$User' AND u_pass = '$senhaUser'") or die(mysqli_error());
        $rowsBD = mysqli_num_rows($select);
        
    if ($rowsBD==1){
        $_SESSION["user"] = $_POST["user"];
        $_SESSION["pass"] = $_POST["pass"];

        $link = "../menu.php?code=777";
    }else{
        echo "<center>Usuário ou senha incorretos!</center>";
        $msg = "Usuário ou senha incorretos.";
    }

    header("Location: $link?msg=$msg");
   

    mysqli_close($conexao);
  
?>