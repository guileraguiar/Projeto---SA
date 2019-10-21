<?php 
session_start();
$_SESSION['user'] = $user;

 if(isset($_SESSION['user'])){
 $conexao = mysqli_connect("localhost", "root", "root", "db_agonizingvillage");

 $select = mysqli_query($conexao,"SELECT * FROM users WHERE u_user = '".$login["u_user"]."'");


 echo $login['u_email'];
 }

?>