<pre>
<?php
session_start();
$usuario = isset($_POST["user"])?($_POST["user"]):"";
$senhaUser = MD5(isset($_POST["pass"])?($_POST["pass"]):"");
$csenhaUser = MD5(isset($_POST["cpass"])?($_POST["cpass"]):"");
$emailUser = isset($_POST["email"])?($_POST["email"]):"";

$conexao = mysqli_connect("localhost", "root", "root", "db_agonizingVillage");
$select = mysqli_query($conexao,"SELECT * FROM estudante");
// $arrayUsers = mysqli_fetch_all($select,MYSQLI_ASSOC);
// print_r($arrayUsers);
echo $emailUser;
if($senhaUser == $csenhaUser){
    
    $query = mysqli_query($conexao,"INSERT INTO usuario VALUES(DEFAULT,'$usuario','$senhaUser','$emailUser')") or die(mysqli_error($conexao));
}else{
    
    // if((isset($_POST["email"])) && (isset($_POST["pass"]))){
    //     $escapeEmail = mysqli_real_escape_string($conn, $_POST['email']);
    //     $escapeUsuario = mysqli_real_escape_string($conn, $_POST['pass']);
    // }else{
        $_SESSION['registerErro'] = "Senhas nao conferem";
        header("Location:../pages/user/register_page.php");
}
mysqli_close($conexao);
?></pre>