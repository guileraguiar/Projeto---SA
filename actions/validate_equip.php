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
$armor = isset($_POST["armor"])?($_POST["armor"]):"";
$attack = isset($_POST["attack"])?($_POST["attack"]):"";
$life = isset($_POST["life"])?($_POST["life"]):"";
$energy = isset($_POST["energy"])?($_POST["energy"]):"";
$crit = isset($_POST["crit"])?($_POST["crit"]):"";
$price = isset($_POST["price"])?($_POST["price"]):"";

require_once "../../../bd/connection_bd.php";
$arrEquip = mysqli_query($conexao, "SELECT * FROM equip");

?>