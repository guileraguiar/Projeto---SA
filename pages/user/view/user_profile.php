<head>
<?php
session_start();
        
        include '../../../includes/navbar_after.php';
        require '../../../includes/header.php';
?>
<html>
    <body style="background-size: 100%;background-image: url(../../../images/telaprofile.png); ">
        
        
        <?php
        require_once "../../../bd/connection_bd.php";
          $userSession = $_SESSION['user'];
                   
          if(isset($userSession)): 
            $slChar = mysqli_query($conexao,"SELECT * FROM characters,race WHERE users_id_user = $userSession[id_user]");
            $select = mysqli_query($conexao,"SELECT u_user FROM users WHERE u_user = ".$userSession["u_user"]."");
            $selectEmail = mysqli_query($conexao,"SELECT u_email FROM users WHERE u_user = ".$userSession["u_email"]."");
            $selectEmail = mysqli_query($conexao,"SELECT id_user FROM users WHERE u_user = ".$userSession["id_user"]."");
            $selectEmail = mysqli_query($conexao,"SELECT u_pass FROM users WHERE u_user = ".$userSession["u_pass"]."");
            $arrayChar= mysqli_fetch_assoc($slChar);
           
            
            
        
          ?> 
        <br>
        <div class="container fundobranco w-50 p-12" style="width:auto; height:auto; margin-top:20px;">
            <div class="row" style="padding:20px;">
                <div class="col-sm-5"><img src="http://localhost/SteelFreak/images/personagens/<?php echo $arrayChar["c_picture"]; ?>" style='margin-left:5px; width:200px;' class='rounded float-left profileImage' alt='...'> 
                </div>
                <div class="col-sm-7">
                    <h4 style="margin-top:80px;" class="minhaconta">Minha conta / <?php echo $userSession["u_user"] ?></h4>
                </div>
            </div>
            <!-- Dados da conta //-->
            <div style="margin-top:10px ;" class="row no-gutters">
                <div class="col">
                    <h4 class="profileBTxt">|Usuário:</h4>
                </div>
                <div class="col">
                    <p class="profileTxt"><?php echo $userSession["u_user"] ?>
                    <a href="../../../actions/Rename/rename_login.php"><input type="image" width="15px" src="../../../images/botoes/iconeEditar.png"/></a>
                    </p>
                </div>
            </div>            
            <div class="row no-gutters">
                <div class="col">
                    <h4 class="profileBTxt">|Senha:</h4>
                </div>
                <div class="col">
                    <p class="profileTxt">********
                    <a href="../alter_pass.php"><input type="image" width="15px" src="../../../images/botoes/iconeEditar.png"/></a>
                    </p>
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
            <br>
            <div class="row no-gutters">
                <div class="col">
                    <h4 class="profileBTxt">|Apelido: </h4>
                </div>
                <div class="col">
                    <p class="profileTxt" ><?php echo $arrayChar["c_nickname"] ?> </p>
                </div>
        </div>
        <div class="row no-gutters">
            <div class="col">
                <h4 class="profileBTxt">|Raça: </h4>
            </div>
            <div class="col">
                <p class="profileTxt" ><?php echo $arrayChar["r_name"] ?></p>
            </div>
        </div>
        </div>
    </body>
    <?php
          endif;
    ?>
</html>