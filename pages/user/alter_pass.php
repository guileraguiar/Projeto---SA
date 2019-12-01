<?php
include '../actions/verify/verify_users.php';
?>
<img src="images/logo3.png" class="mx-auto d-block" alt="" height="200" width="200">
<h4 class="minhaconta midH4">Trocar Senha /<?php echo $userSession["u_user"] ?></h4>
<div class="container fundobranco alterPass">
    <div class="col">
    </div>
    <form action="../actions/alter_pass.php" method="post">
        <div class="col">
            <center><label for="user" class="text-light fonteLabel">Senha Atual</label></center>
            <input type="password" style="width:400px;  height:30px;text-align:center;" class=" mx-auto d-block form-control" maxlength="100" placeholder="Atual senha" name="pass"><br>
            <center><label for="pass" class="text-light fonteLabel">Nova senha</label></center>
            <input type="password" style="width:400px;  height:30px;text-align:center;" class=" mx-auto d-block form-control" maxlength="100" placeholder="Nova senha" name="newPass"><br>
            <center><label for="cpass" class="text-light fonteLabel">Confirmar senha</label></center>
            <input type="password" style="width:400px; height:30px;text-align:center;" class="form-control mx-auto d-block" placeholder="Confirmar nova senha" name="cNewPass"><br>
            <button type="submit" class="btn btn-light mx-auto d-block fonteLabel" name="alterar">Alterar</button>
            <?php
            $erro = (isset($_GET['erro'])) ? $_GET['erro'] : null;
            if (isset($erro)) {
                switch ($erro) {
                    case 1:
                        $msg = "Preencha o campo 'Nova senha'!";
                        break;
                    case 2:
                        $msg = "Preencha o campo 'Confirmação de senha'!";
                        break;
                    case 3:
                        $msg = "Preencha o campo 'Senha Atual'";
                        break;
                    case 4:
                        $msg = "Senha Atual preenchida incorretamente";
                        break;
                    case 5:
                        $msg = "Nova senha e Confirmação de senha não coincidem";
                        break;
                    default:
                        $msg = null;
                        break;
                }
                if (isset($msg)) {
                    echo "<center><div class='alert alert-danger' style='margin-top:3%; width:70%;' role='alert'>
                            " . $msg . "
                            </div></center>";
                }
            }
            $alterSuccess = (isset($_GET['alterSuccess'])) ? $_GET['alterSuccess'] : null;
            if (isset($alterSuccess)) {
                $success = "Senha alterada com sucesso!";
                echo "<center><div class='alert alert-success' role='alert'>
                            " . $success . "
                            </div></center>";
            }
            ?>
        </div>
    </form>
</div>