<?php 
session_start();
$userSession = $_SESSION["user"];
    if (isset($_SESSION['user'])){
         $senha = (isset($_POST["cpass"])?($_POST["cpass"]):"");
         $usuario = (isset($_POST["user"])?($_POST["user"]):"");

             $conexao = mysqli_connect("localhost", "root", "root","db_agonizingVillage") or die ("Erro");
             $select = mysqli_query($conexao,"SELECT * FROM users WHERE u_user = '$usuario'");

             $query = mysqli_query($conexao,"UPDATE users SET u_user ='$usuario' WHERE u_user = '$usuario'");
             $alter = mysqli_query($conexao,$query);

                 echo"<script language='javascript' type='text/javascript'>
                 alert('Usuário alterado com sucesso!!');window.location.
                 href='../pages/user/success_pass.php'</script>";
     }
 
?>