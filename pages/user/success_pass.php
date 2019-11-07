<?php
session_start();
            include '../../includes/header.php';
            include '../../includes/navbar.php';

        ?>
<html>
    <body style="background-size: 100%;background-image: url(../../images/fundo.png); ">
        <img src="../../images/TITULO.png"class="mx-auto d-block titulo"  alt="">    
        <div class="container fundobranco" style="width:500px;">   
            <h1 class=" mx-auto d-block fonteLabel">ALTERAÇÃO EFETUADA COM SUCESSO!!</h1>
            <form action="http://localhost/SteelFreak/pages/user/login_page.php">
                <center><button class="btn btn-light mx-auto d-block fonteLabel" type="submit">voltar</button></center>
            </form>
        </div>
    </body>
</html>