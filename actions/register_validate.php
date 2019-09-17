<?php
$usuario = isset(($_POST["user"])?($_POST["user"]:""));
$senhaUser = isset(($_POST["pass"])?($_POST["pass"]:""));
$csenhaUser = isset(($_POST["cpass"])?($_POST["cpass"]:""));
$emailUser = isset(($_POST["email"])?($_POST["email"]:""));

if($senhaUser == $csenhaUser){
    $conexao = mysqli_connect("localhost", "root", "", "db_agonizingVillage");
    $query = mysqli_query($conexao,"INSERT INTO usuario VALUES(DEFAULT,'$usuario','$senhaUser','$emailUser')") or die(mysqli_error($conexao));
}else{
    echo "<script>alert('Senhas não condizem!');</script>";
}

?>