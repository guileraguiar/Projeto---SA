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
?>
<html>
    <head>
        <title>autentication</title>
        <script type="text/javascript">

        function emailfailed(){
            setTimeout("window.location='../pages/user/login_page.php'",1000);
        }
        </script>
    </head>
    <body>
    </body>
</html>
<?php
//verifica se email a ser cadastrado já existe

if ($_GET["email"]==$emailUser){
    $query = mysqli_query($conexao,"SELECT * FROM users WHERE email='$emailUser'");
    $numeros = mysqli_num_rows($query);
        if ($numeros>"0"){
        $emailError = "E-mail já cadastrado!!";
        }
        header("Location: $linkError?msg=$emailError");
    exit;
    }

if($senhaUser == $csenhaUser){
    $query = mysqli_query($conexao,"INSERT INTO users VALUES('$emailUser', '$usuario', '$senhaUser',DEFAULT)") or die(mysqli_error($conexao));
    echo "<script>function success()</script>";
    $linkError = "../menu.php";
}else{
    header("Location:../pages/user/register_page.php");
    $ConfirmationErrorMSG = "Senhas não coincidem";
}

header("Location: $linkError?msg=$ConfirmationErrorMSG");
mysqli_close($conexao);
?>




