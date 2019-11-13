<?php

    require_once "../../bd/connection_bd.php";
    $busca = mysqli_query($conexao,"SELECT * FROM equip");
    $arrEquip = mysqli_fetch_all($busca, MYSQLI_ASSOC);  
    mysqli_close($conexao);

?>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Vizualização de Usuarios</title>
    <!-- CSS //-->
    <link rel="stylesheet" href="../../css/bootstrap.min.css">
    <link rel="stylesheet" href="../../css/imagem.css">
   
    <!-- Fontes //-->
    <link href="https://fonts.googleapis.com/css?family=Orbitron&display=swap" rel="stylesheet">
    <!-- font-family: 'Orbitron', sans-serif; //-->
    <link href="https://fonts.googleapis.com/css?family=Courgette&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Amaranth&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Press+Start+2P&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Permanent+Marker&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Creepster&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Playfair+Display&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Cinzel&display=swap" rel="stylesheet">


    
    <!-- Icone //-->
    <link rel="apple-touch-icon" sizes="60x60" href="../../images/logo/apple-icon-60x60.png">
    <link rel="apple-touch-icon" sizes="72x72" href="../../images/logo/apple-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="57x57" href="../../images/logo/apple-icon-57x57.png">
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
    <link rel="manifest" href="/manifest.">
    <meta name="msapplication-TileColor" tent="#ffffff">
    <meta name="msapplication-TileImage" content="/ms-icon-144x144.png">
    <meta name="theme-color" content="#ffffff">
    
    <!-- Importação JS //-->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>

</head>

<?php
    include '../../includes/navbar.php';
?>


<body class="fadeInPages" style="background-size: 100%;background-image: url(../../images/fundo.png);">
    <center>
        <div class="container fundobranco" style="margin-top: 50px;">
        <center><h1 class="fonteLabel">Tabelas de Equipamentos</h1></center>
        <table class="table table-striped table-dark" border="1">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Nome</th>
                <th scope="col">Ataque</th>
                <th scope="col">Vida</th>
                <th scope="col">Energia</th>
                <th scope="col">Preço</th>
                <th scope="col">Chance Critico</th>
            </tr>
            <tbody>
            <?php
                foreach($arrEquip as $chave => $valor){
                    echo "<tr>";
                    echo "<th>".$valor["id_equip"]."</th>";
                    echo "<th>".$valor["e_armor"]."</th>";
                    echo "<th>".$valor["e_attack"]."</th>";
                    echo "<th>".$valor["e_life"]."</th>";
                    echo "<th>".$valor["e_energy"]."</th>";
                    echo "<th>".$valor["e_price"]."</th>";
                    echo "<th>".$valor["e_crit_chance"]."</th>";
                    echo "<th>";
                    echo "<a href='../../actions/delete_equip.php?codigo=".$valor["id_equip"]."'>Excluir</a>";
                    echo "</th>";
                    echo "</tr>";
                }
            ?>
            </tbody>
            </thead>
        </table>
        </div>
    </center>
</body>
</htmls