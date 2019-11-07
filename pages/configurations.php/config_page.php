<?php 
session_start();
require_once '../../bd/connection_bd.php';
require_once '../../includes/header.php';

if (isset($_SESSION['user'])){
    $userSession = $_SESSION['user'];
    
    $select = mysqli_query($conexao,"SELECT * FROM users WHERE u_user ='".$userSession["u_user"]."'");
    if($userSession['u_type']==2){
        include '../../includes/navbar_admin.php';
    }else if($userSession['u_type']==1){
        include '../../includes/navbar_after.php';
        }
    }else{
    include '../../includes/navbar.php';
}
?>

<html lang="en">
    <body class="fadeInPages" style="background-size: 100%;background-image: url(../../images/fundo.png); ">
        <div>
        <img src="../../images/TITULO.png"class="mx-auto d-block titulo"  alt=""> 
            <div class="container">
                <form action="http://localhost/SteelFreak/pages/user/alter_pass.php">
                    <button type="onclick" class="btn btn-dark mx-auto d-block">Alterar Senha</button>
                </form>
            </div>
        </div>
    </body>
</html>
