<?php
session_start();
$usuario = isset($_POST["user"])?($_POST["user"]):"";
$senhaUser = MD5(isset($_POST["pass"])?($_POST["pass"]):"");
$csenhaUser = MD5(isset($_POST["cpass"])?($_POST["cpass"]):"");
$emailUser = isset($_POST["email"])?($_POST["email"]):"";

$conexao = mysqli_connect("localhost", "root", "root", "db_agonizingVillage");
$select = mysqli_query($conexao,"SELECT * FROM usuario");
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
    
    $query = mysqli_query($conexao,"INSERT INTO usuario VALUES('$emailUser', '$usuario', '$senhaUser',DEFAULT)") or die(mysqli_error($conexao));
    $linkError = "../menu.php";
}else{
    
    // if((isset($_POST["email"])) && (isset($_POST["pass"]))){
    //     $escapeEmail = mysqli_real_escape_string($conn, $_POST['email']);
    //     $escapeUsuario = mysqli_real_escape_string($conn, $_POST['pass']);
    // }else{
        echo "<center>senhas não coincidem</center>";
        $ConfirmationErrorMSG = "Senhas não coincidem";
}
header("Location: $linkError?msg=$ConfirmationErrorMSG");
mysqli_close($conexao);
?>