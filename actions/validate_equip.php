<?php
if(isset($_POST["armor"])){
    $armor = $_POST["armor"];
    $attack = $_POST["attack"];
    $life = $_POST["life"];
    $energy = $_POST["energy"];
    $crit = $_POST["crit"];
    $price = $_POST["price"];
    $type = $_POST["type_equip"];

    require_once "../bd/connection_bd.php";
    
    $select = mysqli_query($conexao,  "SELECT * FROM equip");
    //echo "<pre>";
    //print_r($select);
    //echo "</pre>";

    
    $query = mysqli_query($conexao,  "INSERT INTO equip (id_equip,e_armor,e_attack,e_life,e_energy,e_price,e_crit_chance,type_equip) VALUES(DEFAULT,'$armor', $attack, $life, $energy, $price, $crit, $type)");
    
    //header("Location: ../pages/user/register_equip.php");

    mysqli_close($conexao);

    //echo "<script language='javascript' type='text/javascript'>
    //alert('Cadastro dos equipamentos feito com sucesso! ');window.location.href='../pages/user/tables///table_equip.php';</script>";


}
?> 