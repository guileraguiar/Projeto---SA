<pre>
<?php
$usuario = isset($_POST["user"])?($_POST["user"]):"";
$senhaUser = isset($_POST["pass"])?($_POST["pass"]):"";
$csenhaUser = isset($_POST["cpass"])?($_POST["cpass"]):"";
$emailUser = isset($_POST["email"])?($_POST["email"]):"";

$conexao = mysqli_connect("localhost", "root", "", "db_agonizingVillage");
$select = mysqli_query($conexao,"SELECT * FROM estudante");
// $arrayUsers = mysqli_fetch_all($select,MYSQLI_ASSOC);
// print_r($arrayUsers);
echo $emailUser;
if($senhaUser == $csenhaUser){
    
    $query = mysqli_query($conexao,"INSERT INTO usuario VALUES(DEFAULT,'$usuario','$senhaUser','$emailUser')") or die(mysqli_error($conexao));
}else{
    echo "<script>alert('Senhas não condizem!');</script>";
    header("Location:../pages/user/register_page.php");
}
mysqli_close($conexao);
?></pre>