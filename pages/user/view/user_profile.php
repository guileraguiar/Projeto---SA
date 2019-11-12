<head>
<?php
session_start();
        
        include '../../../includes/navbar_after.php';
        require '../../../includes/header.php';
?>
<html>
    <body style="background-size: 100%;background-image: url(../../../images/telaprofile.png); ">
          <?php

          $userSession = $_SESSION['user'];
          $conexao = mysqli_connect("localhost", "root", "", "db_agonizingvillage");
          
          if(isset($userSession)):
          
            $select = mysqli_query($conexao,"SELECT u_user FROM users WHERE u_user = ".$userSession["u_user"]."");
          
            $selectEmail = mysqli_query($conexao,"SELECT u_email FROM users WHERE u_user = ".$userSession["u_email"]."");
          
            $selectEmail = mysqli_query($conexao,"SELECT id_user FROM users WHERE u_user = ".$userSession["id_user"]."");

            $selectEmail = mysqli_query($conexao,"SELECT u_pass FROM users WHERE u_user = ".$userSession["u_pass"]."");
        
          ?> 
        <br>
        <div class="container fundobranco" style="width:900px; height:420px; margin-top:20px;">
            <div class="row" style="padding:20px;">
                <div class="col-sm-3"><img src="../../../images/personagens/character1.gif" style="margin-left:30px; width:100px;" class="rounded float-left profileImage" alt="..."> 
                </div>
                <div class="col-sm-9">
                    <h4 class="minhaconta">Minha conta</h4>
                </div>
            </div>
            <br>
            <!-- Dados da conta //-->
            <div class="row no-gutters">
                <div class="col">
                    <h4 class="profileBTxt">|Usuário:</h4>
                </div>
                <div class="col">
                    <p class="profileTxt" ><?php echo $userSession["u_user"] ?></p>
                </div>
            </div>
            <div class="row no-gutters">
                <div class="col">
                    <h4 class="profileBTxt">|E-mail: </h4>
                </div>
                <div class="col">
                    <p class="profileTxt" ><?php echo $userSession["u_email"] ?></p>
                </div>
            </div>
            <div class="row no-gutters">
                <div class="col">
                    <h4 class="profileBTxt">|ID: </h4>
                </div>
                <div class="col">
                    <p class="profileTxt" ><?php echo $userSession["id_user"] ?></p>
                </div>
            </div>
            <hr>
            <!-- Dados do personagem (ainda não está funcionando) //-->
            <div class="row no-gutters">
            <div class="col">
                <h4 class="profileBTxt" style="margin-left:400px;">|Apelido: </h4>
            </div>
            <div class="col">
                <p class="profileTxt" ></p>
            </div>
        </div>
        <div class="row no-gutters">
            <div class="col">
                <h4 class="profileBTxt" style="margin-left:400px;">|Raça: </h4>
            </div>
            <div class="col">
                <p class="profileTxt" ></p>
            </div>
        </div>
        </div>
    </body>
    <?php
          endif;
    ?>
</html>