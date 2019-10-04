<?php
$nick = isset($_POST["nickname"])?($_POST["nickname"]):"";
$race = isset($_POST["raca"])?($_POST["raca"]):"";
$picture = isset($_POST["personagem"])?($_POST["personagem"]):"";

$local = "localhost";
$userRoot = "root";
$passRoot = "root";
$db_name = "db_agonizingVillage";
$conexao = mysqli_connect($local, $userRoot , $passRoot,$db_name) or die (mysqli_error());

switch ($picture) {
    case "person1":
        echo "Escolheu foto 1";
        break;
    case "person2":
        echo "Escolheu foto 2";
        break;
    case "person3":
        echo "Escolheu foto 3";
        break;
}

?>