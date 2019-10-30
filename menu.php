<!DOCTYPE html>
<html lang="en">
<!-- sucesso ao cadastrar-->
<?php
session_start()
?>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Menu</title>
    <!-- CSS //-->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/imagem.css">
   
    <!-- Fontes //-->
    <link href="https://fonts.googleapis.com/css?family=Courgette&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Amaranth&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Press+Start+2P&display=swap" rel="stylesheet">
    
    <!-- Icone //-->
    <link rel="apple-touch-icon" sizes="60x60" href="images/logo/apple-icon-60x60.png">
    <link rel="apple-touch-icon" sizes="72x72" href="images/logo/apple-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="57x57" href="images/logo/apple-icon-57x57.png">
    <link rel="apple-touch-icon" sizes="76x76" href="images/logo/apple-icon-76x76.png">
    <link rel="apple-touch-icon" sizes="114x114" href="images/logo/apple-icon-114x114.png">
    <link rel="apple-touch-icon" sizes="120x120" href="images/logo/apple-icon-120x120.png">
    <link rel="apple-touch-icon" sizes="144x144" href="images/logo/apple-icon-144x144.png">
    <link rel="apple-touch-icon" sizes="152x152" href="images/logo/apple-icon-152x152.png">
    <link rel="apple-touch-icon" sizes="180x180" href="images/logo/apple-icon-180x180.png">
    <link rel="icon" type="image/png" sizes="192x192"  href="images/logo/android-icon-192x192.png">
    <link rel="icon" type="image/png" sizes="32x32" href="images/logo/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="96x96" href="images/logo/favicon-96x96.png">
    <link rel="icon" type="image/png" sizes="16x16" href="images/logo/favicon-16x16.png">
    <link rel="manifest" href="/manifest.json">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="/ms-icon-144x144.png">
    <meta name="theme-color" content="#ffffff">
    
    <!-- Importação JS //-->
    <scripit src="https://code.jquery.com/jquery-3.4.1.min.js">
     <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    
  
    
        <?php 
        $userSession = $_SESSION['user'];
            if(isset($userSession)){
                include 'includes/navbar_after.php';
            }else{
                include 'includes/navbar.php';
            }
            
        //    if(isset($_GET["code"])){
        //        $erro = $_GET["code"];
        //        
        //            if($erro == 777){
        //                echo "<script>alert('Login efetuado com sucesso!!');</script>";
        //            }
        //        }
        ?>

</head>
<body class="fadeIn" style="background-size: 100%;background-image: url(images/fundo.png); ">
<img src="images/TITULO.png"class="mx-auto d-block titulo"  alt=""> 
    <div class="container fundobranco" style="width:750px; margin-bottom:50px;">
        <center style="margin-top:50px;"><h1>Bem Vindo!</h1></center>
        <center><div class="containerBranco"  style="width:600px; margin-top:50px; margin-bottom:50px;">    
            <br>
            <form action="http://localhost/SteelFreak/pages/user/register_page.php">
                <center><h4>Já tem a sua conta? Não? Crie agora!</h4></center>
                <button type="onclick" class="btn btn-dark mx-auto d-block" href="http://localhost/SteelFreak/pages/user/register_page.php">Cadastrar</button>
            </form>
            <br>
            <form action="http://localhost/SteelFreak/pages/user/login_page.php">
                <center><h4>Calma lá, você já tem? Então entre agora!</h4></center>
                <button type="submit" class="btn btn-dark mx-auto d-block" href="http://localhost/SteelFreak/pages/user/login_page.php">Login</button>
            </form>
            <br>
            <form action="http://localhost/SteelFreak/pages/user/login_admin.php">
                <center><h4>És Administrador? Entre por aqui!</h4></center>    
                <button type="onclick" class="btn btn-dark mx-auto d-block" href="http://localhost/SteelFreak/pages/user/register_page.php">Entrar como ADMIN</button>
            </form>
            <br>
            <form action="http://localhost/SteelFreak/pages/battle/introBattle.php">
                <center><h4>Dúvidas sobre o funcionamento das batalhas? Comece com uma simples demonstração agora mesmo!</h4></center>
                <button type="submit" class="btn btn-dark mx-auto d-block">Introdução</button>
            </form>
            <br>
        </div>
            <br>
            <br>
            <br>
            <center><h5>Você Sábia?</h5></center>
            <center><p style="color:white; font-family: 'Courgette', cursive;">O jogo Agonizing Village 2 foi inspirado em The Witcher 3, tanto com o 
                nome do personagem Geraldo do Rio(Geralt of Rivia), como também, o seu ambiente, totalmente inspirado no game.
            </p></center>
            <br>
            <br>
            <br>
            <center><h5>Você Sábia?</h5></center>
            <center><p style="color:white; font-family: 'Courgette', cursive;">A logo de Agonizing Village 2 é uma referência ao seu jogo 
                anterior (Agonizing Village), referindo-se ao lobo Fenrir, na qual Fenrir estava em apuros, e você poderia decidir se iria salva-lo, ou deixa-lo sozinho
                em seu sofrimento...
            </p><img style="width:300px;" src="images/logoav2.png" alt=""></center>
        </div>
    </body>
</html>