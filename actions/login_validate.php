<?php
    //conexao com o banco de dados 
    session_start();

    $emailUser = isset($_POST["email"])?($_POST["email"]):"";
    $senhaUser = MD5(isset($_POST["pass"])?($_POST["pass"]):"");

    $local = "localhost";
    $userRoot = "root";
    $passRoot = "root";
    $db_name = "db_agonizingvillage";
    $conexao = mysqli_connect($local, $userRoot , $passRoot,$db_name) or die (mysqli_error()); 
?>

<!-- redimensiona a pagina em 5 segunda (5000 milisegundos) caso login correto, ou incorreto-->
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
<?php

    //consulta com o banco 
        $select = mysqli_query($conexao,"SELECT * FROM usuario WHERE  email = '$emailUser' AND senha = '$senhaUser'") or die(mysqli_error());
        $rowsBD = mysqli_num_rows($select);

      if (($emailUser != "") && ($senhaUser != "")){
        $_SESSION["email"] = $_POST["email"];
        $_SESSION["pass"] = $_POST["pass"];
        
    }else{
        echo "<center>Usuário ou senha incorretos!</center>";
        echo "<script>loginfailed()</script>";
    }

    header("Location:../menu.php");
   

    mysqli_close($conexao);
  
?>