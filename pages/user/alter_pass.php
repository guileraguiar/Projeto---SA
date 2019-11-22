<div class="container fundobranco" style="width:500px;">
    <div class="col">
        <center>
            <h4 style="margin-top:20px; margin-bottom:30px;" class="minhaconta">Trocar Senha /<?php echo $userSession["u_user"] ?></h4>
        </center>
    </div>
    <form action="../../actions/alter_pass.php" method="post">
        <div class="col">

            <center><label for="user" class="text-light fonteLabel">Senha Atual</label></center>
            <input type="password" style="width:400px;  height:30px;text-align:center;" class=" mx-auto d-block form-control" maxlength="100" placeholder="Atual senha" name="pass" required><br>

            <center><label for="pass" class="text-light fonteLabel">Nova senha</label></center>
            <input type="password" style="width:400px;  height:30px;text-align:center;" class=" mx-auto d-block form-control" maxlength="100" placeholder="Nova senha" name="newPass" required><br>

            <center><label for="cpass" class="text-light fonteLabel">Confirmar senha</label></center>
            <input type="password" style="width:400px; height:30px;text-align:center;" class="form-control mx-auto d-block" minlength="6" placeholder="Confirmar nova senha" name="cNewPass" required><br>

            <button type="submit" class="btn btn-light mx-auto d-block fonteLabel" name="alterar">Alterar</button>
            <?php
            $alterSuccess = (isset($_GET['alterSuccess'])) ? $_GET['alterSuccess'] : null;
            if (isset($alterSucess)) {
                $success = "Senha alterada com sucesso!";
                if (isset($success)) {
                    echo "<center><div class='alert alert-success' role='alert'>
                            " . $success . "
                            </div></center>";
                }
            }
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
                        $msg = "Senha Atual preenchida incorretamente'";
                        break;
                    case 5:
                        $msg = "Nova senha e Confirmação de senha não coincidem";
                        break;
                    default:
                        $msg = "Verifique o preenchimento dos campos!";
                        break;
                        break;
                }
                if (isset($msg)) {
                    echo "<center><div class='alert alert-danger' role='alert'>
                            " . $msg . "
                            </div></center>";
                }
            }
            ?>
        </div>
    </form>
</div>