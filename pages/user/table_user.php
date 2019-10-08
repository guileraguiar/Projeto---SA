<?php

    $conexao=mysqli_connect("localhost", "root", "root", "db_agonizingvillage");
    $busca=mysqli_query($conexao,"SELECT * FROM users");
    $arrUser=mysqli_fetch_all($busca, MYSQLI_ASSOC);
    mysqli_close($conexao);
?>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Vizualização de Usuarios</title>
</head>
<body>
    <center>
        <table border="1">
            <tr>
                <td>Código</td>
                <td>Nome</td>
                <td>Email</td>
                <td>Ação</td>
            </tr>
            <?php
                foreach($arrUser as $chave => $valor){
                    echo "<tr>";
                    echo "<td>".$valor["id_user"]."</td>";
                    echo "<td>".$valor["u_user"]."</td>";
                    echo "<td>".$valor["u_email"]."</td>";
                    echo "<td>";
                    echo "<a href='../../actions/delete.php?codigo=".$valor["id_user"]."'>Excluir</a>";
                    echo "</td>";
                    echo "</tr>";
                }
            ?>
        </table>
    </center>
</body>
</html>