    <?php
    include '../actions/verify/verify_login.php';
   ?>
        <!-- <img src="images/logo3.png" class="mx-auto d-block" alt="" height="200" width="200"> -->
        <br>
        <div class="container fundobranco account">
            <div class="row">
                <div class="col-sm-0" style='margin-left:5px; width:200px;' class='rounded float-left profileImage' alt='...'>
                </div>
                <div class="circle">
                    <img class="imgCircle" height="160" src="../public/images/geraldofrente.png">
                    <?php if ($userSession['u_type'] == 2) : ?>
                        <img class="ml-4 mt-5" height="160" src="../public/images/coroa.png">
                    <?php endif; ?>
                </div>
                <div class="col-sm-12">
                    <?php if ($userSession['u_type'] == 2) : ?>
                        <h4 class="minhaconta mt-3">Administrador/<?php echo $userSession["u_user"]?></h4>
                    <?php endif; ?>
                    <?php if ($userSession['u_type'] == 1) : ?>
                        <h4 class="minhaconta mt-3">Minha conta/<?php echo $userSession["u_user"]?></h4>
                    <?php endif; ?>
                    <br>
                </div>
            </div>

            <!-- Dados da conta //-->
            <div class="row no-gutters">
                <div class="col">
                    <h4 class="profileBTxt">|Usuário:</h4>
                </div>
                <div class="col">
                    <p class="profileTxt"><?php echo $userSession["u_user"]?>
                    </p>
                </div>
            </div>
            <div class="row no-gutters">
                <div class="col">
                    <h4 class="profileBTxt">|Senha:</h4>
                </div>
                <div class="col">
                    <p class="profileTxt">********
                        <a href="../public/index.php?pagina=alterPass"><input type="image" width="15px" src="images/botoes/iconeEditar.png" /></a>
                    </p>
                </div>
            </div>
            <div class="row no-gutters">
                <div class="col">
                    <h4 class="profileBTxt">|E-mail: </h4>
                </div>
                <div class="col">
                    <p class="profileTxt"><?php echo $userSession["u_email"]?></p>
                </div>
            </div>
            <div class="row no-gutters">
                <div class="col">
                    <h4 class="profileBTxt">|ID: </h4>
                </div>
                <div class="col">
                    <p class="profileTxt"><?php echo $userSession["id_user"]?></p>
                </div>
            </div>
            <br>
        </div>