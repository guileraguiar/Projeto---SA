<?php

    require_once "../../../bd/connection_bd.php";
    $busca = mysqli_query($conexao,"SELECT * FROM equip");
    $arrEquip = mysqli_fetch_all($busca, MYSQLI_ASSOC);  
    mysqli_close($conexao);

    include '../../../includes/navbar.php';
    include '../../../includes/header.php';
?>
<html>
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
                        echo "<a href='../../actions/delete.php?codigo=".$valor["id_equip"]."'>Excluir</a>";
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
</html>