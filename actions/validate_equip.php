<?php
session_start();
//puxar dados da tabela para register_equip.php
$armor = isset($_POST["armor"])?($_POST["armor"]);
$attack = isset($_POST["attack"])?($_POST["attack"]);
$life = isset($_POST["life"])?($_POST["life"]);
$energy = isset($_POST["energy"])?($_POST["energy"]);
$crit = isset($_POST["chancCrit"])?($_POST["chancCrit"]);
$price = isset($_POST["price"])?($_POST["price"]);
?>