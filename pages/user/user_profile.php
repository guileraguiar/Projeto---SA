<?php
session_start();

?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Minha conta</title>
        <!-- CSS //-->
        <link rel="stylesheet" href="../../css/bootstrap.min.css">
        <link rel="stylesheet" href="../../css/imagem.css">
        <!-- Fontes //-->
        <link href="https://fonts.googleapis.com/css?family=Amaranth&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Press+Start+2P&display=swap" rel="stylesheet">
        <!-- Icone //-->
        <link rel="apple-touch-icon" sizes="57x57" href="../../images/logo/apple-icon-57x57.png">
        <link rel="apple-touch-icon" sizes="60x60" href="../../images/logo/apple-icon-60x60.png">
        <link rel="apple-touch-icon" sizes="72x72" href="../../images/logo/apple-icon-72x72.png">
        <link rel="apple-touch-icon" sizes="76x76" href="../../images/logo/apple-icon-76x76.png">
        <link rel="apple-touch-icon" sizes="114x114" href="../../images/logo/apple-icon-114x114.png">
        <link rel="apple-touch-icon" sizes="120x120" href="../../images/logo/apple-icon-120x120.png">
        <link rel="apple-touch-icon" sizes="144x144" href="../../images/logo/apple-icon-144x144.png">
        <link rel="apple-touch-icon" sizes="152x152" href="../../images/logo/apple-icon-152x152.png">
        <link rel="apple-touch-icon" sizes="180x180" href="../../images/logo/apple-icon-180x180.png">
        <link rel="icon" type="image/png" sizes="192x192"  href="../../images/logo/android-icon-192x192.png">
        <link rel="icon" type="image/png" sizes="32x32" href="../../images/logo/favicon-32x32.png">
        <link rel="icon" type="image/png" sizes="96x96" href="../../images/logo/favicon-96x96.png">
        <link rel="icon" type="image/png" sizes="16x16" href="../../images/logo/favicon-16x16.png">
        <link rel="manifest" href="/manifest.json">
        <meta name="msapplication-TileColor" content="#ffffff">
        <meta name="msapplication-TileImage" content="/ms-icon-144x144.png">
        <meta name="theme-color" content="#ffffff">
        <!-- Importação JS //-->
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
        
        <?php 

        include '../../includes/navbar_after.php';

        ?>
    </head>
    <header>
    </header>
    <body style="background-size: 100%;background-image: url(../../images/cyberpunk.jpg); ">
        <div class="container fundobranco" style="width:600px; height:300px; margin-top:90px;"> 
        <center><h4 style="color:white;">imagem do personagem</h4></center>  
            <br>
          <?php

          $userSession = $_SESSION['user'];
          $conexao = mysqli_connect("localhost", "root", "", "db_agonizingvillage");
          
          if(isset($userSession)){
          
            $select = mysqli_query($conexao,"SELECT u_user FROM users WHERE u_user = ".$userSession["u_user"]."");
          
            $selectEmail = mysqli_query($conexao,"SELECT u_email FROM users WHERE u_user = ".$userSession["u_email"]."");
          
            $selectEmail = mysqli_query($conexao,"SELECT id_user FROM users WHERE u_user = ".$userSession["id_user"]."");

            $selectEmail = mysqli_query($conexao,"SELECT u_pass FROM users WHERE u_user = ".$userSession["u_pass"]."");
        
          ?> 
          
                <center><h4 style="color:white;">Usuário:<?php echo $userSession["u_user"] ?></h4></center>
                <br> 
                <center><h4 style="color:white;">E-mail:<?php echo $userSession["u_email"] ?></h4></center> 
                <br>
                <center><h4 style="color:white;">ID:<?php echo $userSession["id_user"] ?></h4></center>
                <br>        
            </form>
        </div>
    </body>
    <?php
          }
?>
</html>