<?php
session_start();

if(isset($_POST["armor"]));
$armor = isset($_POST["armor"])
$attack = isset($_POST["attack"]);
$life = isset($_POST["life"]);
$energy = isset($_POST["energy"]);
$crit = isset($_POST["crit"]);
$price = isset($_POST["price"]);

$conexao = mysqli_connect("localhost", "root", "", "db_agonizingvillage");





//puxar dados da tabela para register_equip.php


$conexao = mysqli_connect("localhost", "root", "", "bd_agonizingvillage");
$busca = mysqli_query($conexao,"SELECT * FROM equip")
$arrEquip = mysqli_fetch_all($busca,MYSQLI_ASSOC);
mysqli_close($conexao);


?>