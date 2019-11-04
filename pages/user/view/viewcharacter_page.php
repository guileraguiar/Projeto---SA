<?php
session_start();

?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Meu personagem</title>
        <!-- CSS //-->
        <link rel="stylesheet" href="../../../css/bootstrap.min.css">
        <link rel="stylesheet" href="../../../css/imagem.css">
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

            include '../../../includes/navbar_after.php';

        ?>
    </head>
    <header>
    </header>

    <body style="background-size: 100%;background-image: url(../../../images/fundo.png); ">
    <?php
        include "../../bd/connection_bd.php";
        $query_sel_char = "SELECT * FROM characters";
 
        $array_sel_char = mysqli_fetch_assoc($query_sel_char);

        if ($array_sel_char->rowCount()>0) {
            while ($sql_sel_char_dados = $array_sel_char->fetch()) {

      ?>
        <img src="../../../images/TITULO.png"class="mx-auto d-block titulo"  alt="">    
        <div class="container fundobranco" style="width:auto;">   
                <form action="#"  method="post">
                    <div class="form-row">
                        <div class="col">                              
                            <img src="http://localhost/SteelFreak/images/personagens/orc.jpg" width="210px" height="auto">                            
                            <center><label for="user" class="text-light fonteLabel">Apelido</label></center>
                            <input type="text" readonly="true" style="width:400px;   height:30px;text-align:center;" class=" mx-auto d-block" name="nickname"><br>
                            <?php echo $sql_sel_marcas_dados['c_nickname']; ?>
                            <center><label for="nivel"  class="text-light fonteLabel">Nível</label></center>
                            <input type="text" readonly="true" style="width:400px; height:30px;text-align:center;" class=" mx-auto d-block" name="nivel"><br>

                            <center><label for="raca"  class="text-light fonteLabel">Raça</label></center>
                            <input type="text" readonly="true" style="width:400px; height:30px;text-align:center;" class=" mx-auto d-block" name="raca"><br>

                            <center><label for="vida"  class="text-light fonteLabel">Vida</label></center>
                            <input type="text" readonly="true" style="width:400px; height:30px;text-align:center;" class=" mx-auto d-block" name="vida"><br>

                            <center><label for="forca"  class="text-light fonteLabel">Força</label></center>
                            <input type="text" readonly="true" style="width:400px; height:30px;text-align:center;" class=" mx-auto d-block" name="forca"><br>

                            <center><label for="defesa"  class="text-light fonteLabel">Resistência</label></center>
                            <input type="text" readonly="true" style="width:400px; height:30px;text-align:center;" class=" mx-auto d-block" name="defesa"><br>

                            <center><label for="estamina"  class="text-light fonteLabel">Estamina</label></center>
                            <input type="text" readonly="true" style="width:400px; height:30px;text-align:center;" class=" mx-auto d-block" name="estamina"><br>

                            <center><label for="critico"  class="text-light fonteLabel">% Crítico</label></center>
                            <input type="text" readonly="true" style="width:400px; height:30px;text-align:center;" class=" mx-auto d-block" name="critico"><br>

                            <center><label for="habilidades"  class="text-light fonteLabel">Habilidades Adquiridas</label></center>
                            <input type="text" readonly="true" style="width:400px; height:30px;text-align:center;" class=" mx-auto d-block" name="habilidades"><br>

                            <center><label for="dinheiro"  class="text-light fonteLabel">Dinheiro</label></center>
                            <input type="text" readonly="true" style="width:400px; height:30px;text-align:center;" class=" mx-auto d-block" name="dinheiro "><br>

                            <button type="submit" class="btn btn-light mx-auto d-block fonteLabel" href="http://localhost/SteelFreak/pages/user/view/changes/change_character.php" name="editar">Editar</button>

                        </div>
                    </div>
                </form>
                <p class="text-center text-danger">
                </p>
        </div>
        <?php

            } } ?>
    </body>
</html> 