<?php 
include 'actions/verify/verify_navConfView.php';
?>
<html lang="pt-BR">
<head>
<?php require_once '../../../includes/header.php'; ?>
<script>
$(document).ready( function(){
    $("#btEdit").click(function(){
        $("#altSenha").show("slow")
       
    })
    $("#btCancel").click( function (){
        $("#altSenha").hide("slow");
                    
    })

});
</script>
</head>
    <body class="fadeInPages" style="background-size: 100%;background-image: url(../../../images/fundo.png); ">
    <img src="../../../images/TITULO.png"class="mx-auto d-block titulo"  alt="">
    <div class="container fundobranco w-50 p-12" style="width:auto; height:auto; margin-top:20px; margin-bottom:20px;">
        <div class="row" style="padding:20px;">
           <div class="col">
                 <center><h4 class="minhaconta">Meu Personagem/ <?php echo $userSession["u_user"] ?></h4></center>
            </div>
        </div>
        <br>
        <!-- Dados do Personagem //-->
        <div class="row no-gutters">
            <div class="col">
                <h4 class="profileBTxt">|Apelido:</h4>
            </div>
            <div class="col">
                <p class="profileTxt"><?php echo $userSession["u_user"]?><a href="navegação"><input type="image" style=" margin-left:10px" width="15px" src="../../../images/botoes/iconeEditar.png"/></a></p>
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
                <p class="profileTxt" ><?php echo $userSession["u_email"] ?><a href="navegação"><input type="image" style=" margin-left:10px" width="15px" src="../../../images/botoes/iconeEditar.png"/></a></p>
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
                <p class="profileTxt" ><?php echo $userSession["u_email"] ?><a href="navegação"><input type="image" style=" margin-left:10px" width="15px" src="../../../images/botoes/iconeEditar.png"/></a></p></p>
            </div>
        </div>

        <div class="row no-gutters">
            <div class="col">
                <h4 class="profileBTxt">|Defesa: </h4>
            </div>
            <div class="col">
                <p class="profileTxt" ><?php echo $userSession["u_email"] ?><a href="navegação"><input type="image" style=" margin-left:10px" width="15px" src="../../../images/botoes/iconeEditar.png"/></a></p>
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
        <br>
    </div>
    </body>
</html>
