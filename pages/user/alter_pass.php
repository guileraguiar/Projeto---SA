<?php
session_start();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>

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
include '../../includes/navbar.php';

?>
</head>
<header>
</header>
<body class="fadeInPages" style="background-image: url(../../images/fundo.png); ">
    <img src="../../images/TITULO.png"class="mx-auto d-block titulo"  alt="">    
    <div class="container fundobranco" style="width:500px;">   
            <form action="../../actions/alter_pass.php"  method="post">
                <div class="form-row">
                    <div class="col">    

                        <center><label for="user" class="text-light fonteLabel">Usuario</label></center>
                        <input type="text" style="width:400px;  height:30px;text-align:center;" class=" mx-auto d-block form-control" maxlength="100" placeholder="usuario" name="user" ><br>

                        <center><label for="pass" class="text-light fonteLabel">Nova senha</label></center>
                        <input type="text" style="width:400px;  height:30px;text-align:center;" class=" mx-auto d-block form-control" maxlength="100" placeholder="Nova senha" name="pass" ><br>

                        <center><label for="cpass"  class="text-light fonteLabel">Confirmar senha</label></center>
                        <input type="password" style="width:400px; height:30px;text-align:center;" class="form-control mx-auto d-block" minlength="6" placeholder="Confirmar nova senha" name="cpass" ><br>
                        
                        <button type="submit" class="btn btn-light mx-auto d-block fonteLabel" name="alterar">Alterar</button>

                    </div>
                </div>
            </form>
    </div>
</body>
</html>