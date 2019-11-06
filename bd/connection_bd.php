<?php
    $servername = "localhost"; /* pode deixar localhost */
    $username = "root"; /* nome do usuario do banco de dados */ 
    $password = ""; /* senha do banco de dados caso exista senao deixa $password = "" */
    $dbname = "db_agonizingvillage"; /* nome do seu banco de dados*/

    // Criando a conexão com o banco de dados
    $conexao = new mysqli($servername, $username, $password, $dbname);
    // Checando a conexão com o banco de dados
    if (mysqli_connect_errno()) {
        /* Se ele der erro ele vai entrar e vai matar a conexão e em seguida printará na tela para mim o bug */
        die("Conexão falhou: " . mysqli_connect_errno());
    }
?>