<img src="images/logo3.png" class="mx-auto d-block" alt="" height="200" width="200">
<div class="container fundobranco" style="width:500px; margin-bottom:50px; ">
    <form action="../actions/register_validate.php" method="post">
        <div class="form-row">
            <div class="col">


                <center><label for="user" class="text-light fonteLabel">Usuário*</label></center>
                <input type="text" class="form-control" minlength="3" maxlength="20" placeholder="Usuário" name="user" pattern="[a-zA-Z0-9]+"><br>
                <!-- pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{5,}"  implementado no final-->
                <center><label for="pass" class="text-light fonteLabel">Senha*</label></center>
                <input type="password" class="form-control" minlength="1" maxlength="20" placeholder="Senha" name="pass"><br>

                <center><label for="pass" class="text-light fonteLabel">Confirmar senha*</label></center>
                <input type="password" class="form-control" minlength="1" maxlength="20" placeholder="Senha" name="cpass"><br>

                <center><label for="email" class="text-light fonteLabel">E-mail*</label></center>
                <input type="email" class="form-control" maxlength="30" placeholder="seuemail@exemplo.com" name="email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$"><br>
                <?php

                $erro = (isset($_GET['erro'])) ? $_GET['erro'] : null;
                if (isset($erro)) {
                    switch ($erro) {
                        case 1:
                            $msg = "Usuário preenchido incorretamente!";
                            break;
                        case 2:
                            $msg = "Campo senha preenchido incorretamente!";
                            break;
                        case 3:
                            $msg = "Campo confimação senha preenchido incorretamente!";
                            break;
                        case 4:
                            $msg = "E-mail preenchido incorretamente!";
                            break;
                        case 5:
                            $msg = "Usuário escolhido já existente!";
                            break;
                        case 6:
                            $msg = "E-mail preenchido já existente!";
                            break;
                        case 7:
                            $msg = "Senhas não se coincidem!";
                            break;
                        default:
                            //header("Location:index.php?pagina=menu");
                            $msg = "sucesso!";
                            break;
                    }
                    if (isset($msg)) {
                        echo "<center><div class='alert alert-danger' role='alert'>
                        " . $msg . "
                        </div></center>";
                    }
                }
                ?>
                    <button type="submit" class="btn btn-light mx-auto d-block fonteLabel">Enviar</button>

            </div>
        </div>
    </form>
</div>