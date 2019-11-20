    <?php
  
    $userSession = $_SESSION['user'];
    if (isset($userSession)) :
        $select = mysqli_query($conexao, "SELECT * FROM users WHERE u_user = " . $userSession["u_user"] . "");
        ?>
        <br>
        <div class="container fundobranco w-50 p-12" style="width:auto; height:auto; margin-top:20px;">
            <div class="row" style="padding:20px;">
                <div class="col-sm-5"style='margin-left:5px; width:200px;' class='rounded float-left profileImage' alt='...'>
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
                        <a href="../alter_pass.php"><input type="image" width="15px" src="images/botoes/iconeEditar.png" /></a>
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