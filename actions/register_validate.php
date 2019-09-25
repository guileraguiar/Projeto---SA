<?php
session_start();
$usuario = isset($_POST["user"])?($_POST["user"]):"";
$senhaUser = MD5(isset($_POST["pass"])?($_POST["pass"]):"");
$csenhaUser = MD5(isset($_POST["cpass"])?($_POST["cpass"]):"");
$emailUser = isset($_POST["email"])?($_POST["email"]):"";

$conexao = mysqli_connect("localhost", "root", "", "db_agonizingvillage");
$select = mysqli_query($conexao,"SELECT * FROM users");
// $arrayUsers = mysqli_fetch_all($select,MYSQLI_ASSOC);
// print_r($arrayUsers);
echo $emailUser;
if($senhaUser == $csenhaUser){
    $query = mysqli_query($conexao,"INSERT INTO users VALUES('$emailUser', '$usuario', '$senhaUser',DEFAULT)") or die(mysqli_error($conexao));
}else{
    $_SESSION['registerErro'] = "Senhas nao conferem";
    header("Location:../pages/user/register_page.php");
}
mysqli_close($conexao);
?>