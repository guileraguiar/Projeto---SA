<?php
session_start();
$usuario = isset($_POST["user"])?($_POST["user"]):"";
$senhaUser = MD5(isset($_POST["pass"])?($_POST["pass"]):"");
$csenhaUser = MD5(isset($_POST["cpass"])?($_POST["cpass"]):"");
$emailUser = isset($_POST["email"])?($_POST["email"]):"";

$conexao = mysqli_connect("localhost", "root", "root", "db_agonizingVillage");
$select = mysqli_query($conexao,"SELECT * FROM usuario");
$conexao = mysqli_connect("localhost", "root", "root", "db_agonizingvillage");
$select = mysqli_query($conexao,"SELECT * FROM users");
// $arrayUsers = mysqli_fetch_all($select,MYSQLI_ASSOC);
// print_r($arrayUsers);

//redimensionamento do erro
$linkError = "../pages/user/register_page.php";
$ConfirmationErrorMSG = "erro inesperado"; 

echo $emailUser;
//verifica se email a ser cadastrado já existe

//if($emailUser != ""){
 //   $query = mysqli_query($conexao,"SELECT * FROM users WHERE email='$emailUser'");
 //   $numeros = mysql_affected_rows($query);
 //   if($numeros ==){
  //      $emailError = "E-mail já cadastrado!!";
 //       header("Location: $linkError?msg=$emailError");
  //      exit;
  //      }
//}

if($senhaUser == $csenhaUser){
    $query = mysqli_query($conexao,"INSERT INTO users VALUES('$emailUser', '$usuario', '$senhaUser',DEFAULT)") or die(mysqli_error($conexao));
    $linkError = "../pages/user/login_page.php?code=254";
}else{
    header("Location:../pages/user/register_page.php");
    $ConfirmationErrorMSG = "Senhas não coincidem";
}

header("Location: $linkError?msg=$ConfirmationErrorMSG");
mysqli_close($conexao);
?>




