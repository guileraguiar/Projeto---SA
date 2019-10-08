<?php
session_start();
//puxando dados da tablea register_page.php
$usuario = isset($_POST["user"])?($_POST["user"]):"";
$senhaUser = MD5(isset($_POST["pass"])?($_POST["pass"]):"");
$csenhaUser = MD5(isset($_POST["cpass"])?($_POST["cpass"]):"");
$emailUser = isset($_POST["email"])?($_POST["email"]):"";

//conexão com o banco de dados
$conexao = mysqli_connect("localhost", "root", "root","db_agonizingVillage") or die ("Erro");

$query_select = mysqli_query($conexao,"SELECT * FROM users WHERE u_user = '$usuario' OR u_email='$emailUser'");
$array = mysqli_fetch_assoc($query_select);

if($usuario == "" || $usuario == null){
     echo"<script language='javascript' type='text/javascript'>
     alert('O campo usuario deve ser preenchido');window.location.href='../pages/user/register_page.php';</script>";

}
elseif($array['u_user'] == $usuario){

    echo"<script language='javascript' type='text/javascript'>
    alert('O usuário cadastrado já existe!!'); window.location.href='../pages/user/register_page.php';</script>";
  //  die();

}
elseif($array['u_email'] == $emailUser){

    echo"<script language='javascript' type='text/javascript'>
    alert('O email cadastrado já existe!!'); window.location.href='../pages/user/register_page.php';</script>";
  //  die();

}
else{
    $query = "INSERT INTO users (u_user,u_pass,u_email) VALUES ('$usuario','$senhaUser','$emailUser')";
    $insert = mysqli_query($conexao, $query);
        
    if($insert){
        echo"<script language='javascript' type='text/javascript'>
        alert('O seu cadastro foi efetuado com sucesso!!');window.location.
        href='../pages/user/login_page.php'</script>";
    }else{
        echo"<script language='javascript' type='text/javascript'>
        alert('Não foi possível efetuar esse cadastro!!'); window.location.href='../pages/user/login_page.php'</script>";
    }
}
?>








