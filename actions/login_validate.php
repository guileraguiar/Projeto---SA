<?php
session_start();

    $emailUser = $_POST["email"];
    $senhaUser = md5($_POST["pass"];
    $signIN = $_POST["logar"];
    $conexao = mysqli_connect("localhost", "root", "root", "db_agonizingVillage");
    $db = mysql_select_db('db_agonizingVillage');
    
    if(isset($_POST[$logar])) {

        $query = mysql_query($conexao,"SELECT * FROM usuario WHERE  = 
        '$usuario' AND senha = '$senhaUser'") or die(mysqli_error($conexao);

      if (mysql_num_rows($verifica)<=0){
        echo"<script language='javascript' type='text/javascript'>
        alert('Login e/ou senha incorretos');window.location
        .href='login.html';</script>";
        die();
      }else{
        setcookie("login",$usuario);
        header("Location:../../menu.html");
      }
    }
    

  
?>