<?php
<<<<<<< Updated upstream
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
=======
if(isset($_POST["armor"])){
    $armor = $_POST["armor"];
    $attack = $_POST["attack"];
    $life = $_POST["life"];
    $energy = $_POST["energy"];
    $crit = $_POST["crit"];
    $price = $_POST["price"];
>>>>>>> Stashed changes

    require_once "../bd/connection_bd.php";
    
    $select = mysqli_query($conexao,  "SELECT * FROM equip");
    echo "<pre>";
    print_r($select);
    echo "</pre>";
    $query = mysqli_query($conexao,  "INSERT INTO equip (id_equip,e_armor,e_attack,e_life,e_energy,e_price,e_crit_chance,type_equip) VALUES(DEFAULT,'$armor', $attack, $life, $energy, $price, $crit,2)");


    mysqli_close($conexao);

}
?>