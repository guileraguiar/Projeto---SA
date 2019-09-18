<?php
session_start();

    $emailUser = $_POST["email"];
    $senhaUser = $_POST["pass"];
    $conexao = mysqli_connect("localhost", "root", "", "db_agonizingVillage");
    $db = mysql_select_db('db_agonizingVillage');
    $select_db = "SELECT email FROM usuario WHERE email = '$emailUser'";
    $select_all = mysql_query($select_db,$conexao);
    $array = mysql_fetch_array($select_all);
    $logarray = $array['email'];

  
?>