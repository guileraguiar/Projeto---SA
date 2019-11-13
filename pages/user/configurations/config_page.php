<?php 
session_start();
require_once '../../../bd/connection_bd.php';
require_once '../../../includes/header.php';

if (isset($_SESSION['user'])){
    $userSession = $_SESSION['user'];
    
    $select = mysqli_query($conexao,"SELECT * FROM users WHERE u_user ='".$userSession["u_user"]."'");
    if($userSession['u_type']==2){
        include '../../../includes/navbar_admin.php';
    }else if($userSession['u_type']==1){
        include '../../../includes/navbar_after.php';
        }
    }else{
    include '../../../includes/navbar.php';
}
?>

<html lang="en">
<head>
<!-- <script>
$(document).ready( function(){
    $("#btEdit").click(function(){
        $("#altSenha").show("slow")
       
    })
    $(".btCancel").click( function (){
        $("#altSenha").hide("slow");
                    
    })

});
</script> -->
</head>
    <body class="fadeInPages" style="background-size: 100%;background-image: url(../../../images/fundo.png); ">
    <div class="container fundobranco" style="width:auto; height:auto; margin-top:20px;">
        <div class="row" style="padding:20px;">
            
           <div class="col">
                 <center><h4 class="minhaconta">Configurações de Usuário</h4></center>
            </div>
        </div>
        <br>
        <!-- Dados da conta //-->
        <div class="row no-gutters">
            <div class="col">
                <h4 class="profileBTxt">|Usuário:</h4>
            </div>
            <div class="col">
                <p class="profileTxt"><?php echo $userSession["u_user"]?></p>
            </div>
            <div class="col">
                <form action="http://localhost/SteelFreak/pages/user/alter_pass.php">                   
                <button type="onclick" class="btn btn-dark mx-auto d-block" name="altPass">Editar</button>
                </form>
            </div>
        </div>

        <div class="row no-gutters">
            <div class="col">
                <h4 class="profileBTxt">|Senha:</h4>
            </div>
            <div class="col">
                <p class="profileTxt"><?php echo $userSession["u_pass"] ?></p>
            </div>
            <div class="col">               
               
<button class="btn btn-dark mx-auto d-block" type="button" data-toggle="collapse" data-target="#collapseExample">Editar</button>
  

                    <div class="collapse" id="collapseExample">
                        <div class="col">  
                            <form action=""  method="post" id="altSenha">
                        <center>  
                                    <center><label for="user" class="text-light fonteLabel">Senha Atual</label></center>
                                    <input type="password" style="width:400px;  height:30px;text-align:center;" class=" mx-auto d-block form-control" maxlength="100" placeholder="Atual senha" name="pass" required><br>
                                    <center><label for="pass" class="text-light fonteLabel">Nova senha</label></center>
                                    <input type="password" style="width:400px;  height:30px;text-align:center;" class=" mx-auto d-block form-control" maxlength="100" placeholder="Nova senha" name="newPass" required><br>
                                    <center><label for="cpass"  class="text-light fonteLabel">Confirmar senha</label></center>
                                    <input type="password" style="width:400px; height:30px;text-align:center;" class="form-control mx-auto d-block" minlength="6" placeholder="Confirmar nova senha" name="cNewPass" required><br>                                    
                                    <button type="submit" class="btn btn-light mx-auto d-block fonteLabel" name="alterar">Alterar</button>
                            </form>
                        </div>
                    </div></center>
                
            </div>
        </div>

        <div class="row no-gutters">
            <div class="col">
                <h4 class="profileBTxt">|E-mail: </h4>
            </div>
            <div class="col">
                <p class="profileTxt" ><?php echo $userSession["u_email"] ?></p>
            </div>
            <div class="col">
                <form action="http://localhost/SteelFreak/pages/user/alter_pass.php">                   
                <button type="onclick" class="btn btn-dark mx-auto d-block" name="altPass">Editar</button>
                </form>
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
        <div class="row" style="padding:20px;">
            
           <div class="col">
                 <center><h4 class="minhaconta">Configurações de Personagem</h4></center>
            </div>
        </div>
        <br>
        <!-- Dados da conta //-->
        <div class="row no-gutters">
            <div class="col">
                <h4 class="profileBTxt">|Apelido:</h4>
            </div>
            <div class="col">
                <p class="profileTxt"><?php echo $userSession["u_user"]?></p>
            </div>
            <div class="col">
                <form action="http://localhost/SteelFreak/pages/user/alter_pass.php">                   
                <button type="onclick" class="btn btn-dark mx-auto d-block" name="altPass">Editar</button>
                </form>
            </div>
        </div>

        <div class="row no-gutters">
            <div class="col">
                <h4 class="profileBTxt">|Raça: </h4>
            </div>
            <div class="col">
                <p class="profileTxt" ><?php echo $userSession["u_email"] ?></p>
            </div>
        </div>

        <div class="row no-gutters">
            <div class="col">
                <h4 class="profileBTxt">|Nível:</h4>
            </div>
            <div class="col">
                <p class="profileTxt"><?php echo $userSession["u_pass"] ?></p>
            </div>
        </div>

        <div class="row no-gutters">
            <div class="col">
                <h4 class="profileBTxt">|Experiência: </h4>
            </div>
            <div class="col">
                <p class="profileTxt" ><?php echo $userSession["u_email"] ?></p>
            </div>
        </div>
        
        <div class="row no-gutters">
            <div class="col">
                <h4 class="profileBTxt">|Vida: </h4>
            </div>
            <div class="col">
                <p class="profileTxt" ><?php echo $userSession["u_email"] ?></p>
            </div>
            <div class="col">
                <form action="http://localhost/SteelFreak/pages/user/alter_pass.php">                   
                <button type="onclick" class="btn btn-dark mx-auto d-block" name="altPass">Editar</button>
                </form>
            </div>
        </div>

        <div class="row no-gutters">
            <div class="col">
                <h4 class="profileBTxt">|Energia: </h4>
            </div>
            <div class="col">
                <p class="profileTxt" ><?php echo $userSession["u_email"] ?></p>
            </div>
        </div>

        <div class="row no-gutters">
            <div class="col">
                <h4 class="profileBTxt">|Força: </h4>
            </div>
            <div class="col">
                <p class="profileTxt" ><?php echo $userSession["u_email"] ?></p>
            </div>
            <div class="col">
                <form action="http://localhost/SteelFreak/pages/user/alter_pass.php">                   
                <button type="onclick" class="btn btn-dark mx-auto d-block" name="altPass">Editar</button>
                </form>
            </div>
        </div>

        <div class="row no-gutters">
            <div class="col">
                <h4 class="profileBTxt">|Defesa: </h4>
            </div>
            <div class="col">
                <p class="profileTxt" ><?php echo $userSession["u_email"] ?></p>
            </div>
            <div class="col">
                <form action="http://localhost/SteelFreak/pages/user/alter_pass.php">                   
                <button type="onclick" class="btn btn-dark mx-auto d-block" name="altPass">Editar</button>
                </form>
            </div>
        </div>

        <div class="row no-gutters">
            <div class="col">
                <h4 class="profileBTxt">|Crítico: </h4>
            </div>
            <div class="col">
                <p class="profileTxt" ><?php echo $userSession["u_email"] ?></p>
            </div>
        </div>

        <div class="row no-gutters">
            <div class="col">
                <h4 class="profileBTxt">|Dinheiro: </h4>
            </div>
            <div class="col">
                <p class="profileTxt" ><?php echo $userSession["u_email"] ?></p>
            </div>
        </div>
           
    </div>
    <img src="../../../images/TITULO.png"class="mx-auto d-block titulo"  alt=""> 
            <div class="container">
    </body>
</html>
