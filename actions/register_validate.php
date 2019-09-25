<?php
session_start();
$usuario = isset($_POST["user"])?($_POST["user"]):"";
$senhaUser = MD5(isset($_POST["pass"])?($_POST["pass"]):"");
$csenhaUser = MD5(isset($_POST["cpass"])?($_POST["cpass"]):"");
$emailUser = isset($_POST["email"])?($_POST["email"]):"";

$conexao = mysqli_connect("localhost", "root", "root", "db_agonizingVillage");
$select = mysqli_query($conexao,"SELECT * FROM usuario");
$conexao = mysqli_connect("localhost", "root", "", "db_agonizingvillage");
$select = mysqli_query($conexao,"SELECT * FROM users");
// $arrayUsers = mysqli_fetch_all($select,MYSQLI_ASSOC);
// print_r($arrayUsers);

//redimensionamento do erro
$linkError = "../pages/user/register_page.php";
$ConfirmationErrorMSG = "Erro inesperado"; 

echo $emailUser;

//verifica se email a ser cadastrado já existe

$verifyEmail = mysql_query("SELECT * FROM usuario WHERE email = '$emailUser'");

if(mysql_num_rows($verifyEmail) == 1){
    echo "email já cadastrado";
    echo "<script>emailfailed()</script>";
    header("Location: ../pages/user/register_page.php";)
  }

if($senhaUser == $csenhaUser){
    $query = mysqli_query($conexao,"INSERT INTO users VALUES('$emailUser', '$usuario', '$senhaUser',DEFAULT)") or die(mysqli_error($conexao));
}else{
    $_SESSION['registerErro'] = "Senhas nao conferem";
    header("Location:../pages/user/register_page.php");
}
header("Location: $linkError?msg=$ConfirmationErrorMSG");
mysqli_close($conexao);
?>