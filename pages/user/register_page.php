<?php
session_start();
    include '../../includes/header.php';
    include '../../includes/navbar.php';
?>
<html>
    <body class="fadeInPages" style="background-size: 100%;background-image: url(../../images/fundo.png); ">
        <img src="../../images/TITULO.png"class="mx-auto d-block titulo"  alt="">
        <div class="container fundobranco" style="width:500px; margin-bottom:50px; ">   
            <form action="../../actions/register_validate.php" method="post">
                <div class="form-row">
                    <div class="col">    

                        <center><label for="user" class="text-light fonteLabel">Usuário</label></center>
                        <input type="text" class="form-control" minlength="3"  maxlength="20" placeholder="Usuário" name="user" pattern="[a-zA-Z0-9]+" required><br>
                        <!-- pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{5,}"  implementado no final-->
                        <center><label for="pass" class="text-light fonteLabel">Senha</label></center>
                        <input type="password" class="form-control" minlength="1" maxlength="20" placeholder="Senha" name="pass" required><br>

                        <center><label for="pass" class="text-light fonteLabel">Confirmar senha</label></center>
                        <input type="password" class="form-control" minlength="1" maxlength="20" placeholder="Senha" name="cpass" required><br>

                        <center><label for="email" class="text-light fonteLabel">E-mail</label></center>
                        <input type="email" class="form-control" maxlength="30" placeholder="seuemail@exemplo.com" name="email"  required pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$" ><br>

                        <button type="submit" class="btn btn-light mx-auto d-block fonteLabel">Enviar</button>

                    </div>
                </div>
            </form>
        </div>
    </body>
    <?php
    //require_once '../../includes/footer.php';
    ?>
</html>