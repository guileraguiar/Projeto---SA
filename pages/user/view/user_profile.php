    <?php
    $userSession = $_SESSION['user'];
    include '../actions/verify/verify_login.php';
    if (isset($userSession)) :
        $select = mysqli_query($conexao, "SELECT * FROM users WHERE u_user = " . $userSession["u_user"] . "");
        ?>
        <img src="images/logo3.png" class="mx-auto d-block" alt="" height="200" width="200">
        <br>
        <div class="container fundobranco account">
            <div class="row" style="padding:20px;">
                <div class="col-sm-0"style='margin-left:5px; width:200px;' class='rounded float-left profileImage' alt='...'>
                </div>
                <div class="col-sm-12">
                    <h4 style="margin-top:40px;" class="minhaconta">Minha conta/<?php echo $userSession["u_user"] ?></h4>
                    <br>
                </div>
            </div>
            <!-- Dados da conta //-->
            <div style="margin-top:10px ;" class="row no-gutters">
                <div class="col">
                    <h4 class="profileBTxt">|Usuário:</h4>
                </div>
                <div class="col">
                    <p class="profileTxt"><?php echo $userSession["u_user"] ?>
                        <a href="../../../actions/Rename/rename_login.php"><input type="image" width="15px" src="images/botoes/iconeEditar.png" /></a>
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
                    <p class="profileTxt"><?php echo $userSession["u_email"] ?></p>
                </div>
            </div>
            <div class="row no-gutters">
                <div class="col">
                    <h4 class="profileBTxt">|ID: </h4>
                </div>
                <div class="col">
                    <p class="profileTxt"><?php echo $userSession["id_user"] ?></p>
                </div>
            </div>
            <br>
        </div>
    <?php
    endif;
    ?>